<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Goals\CreateGoalRequest;
use App\Models\Goal;
use App\Models\GoalType;
use Illuminate\Support\Facades\Auth;
use App\DataTables\GoalsDataTable;
use App\Http\Requests\Goals\EditSuggestedGoalRequest;
use App\Models\GoalComment;
use App\Models\LinkedGoal;
use App\Models\User;
use App\Scopes\NonLibraryScope;
use Illuminate\Contracts\Session\Session;

class GoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(GoalsDataTable $goalDataTable, Request $request)
    {
        $authId = Auth::id();
        $goaltypes = GoalType::all();
        $query = Goal::where('user_id', $authId)
            ->with('user')
            ->with('goalType');
        $type = 'past';
        if ($request->is("goal/current")) {
            $goals = $query->where('status', 'active')
                ->paginate(4);
            $type = 'current';
            return view('goal.index', compact('goals', 'type', 'goaltypes'));
        } else if ($request->is("goal/supervisor")) {
            $user = Auth::user();
            // TO remove already copied goals.
            // $referencedGoals = Goal::where('user_id', $authId)->whereNotNull('referenced_from')->pluck('referenced_from');
            $goals = $user->sharedGoals()
                /* ->whereNotIn('goals.id', $referencedGoals ) */
                ->paginate(4);
            
            $type = 'supervisor';
            return view('goal.index', compact('goals', 'type', 'goaltypes'));
        }
        $goals = $query->where('status', '<>', 'active')
            ->paginate(4);
        return view('goal.index', compact('goals', 'type', 'goaltypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $goaltypes = GoalType::all();
        return view('goal.create', compact('goaltypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateGoalRequest $request)
    {
        $input = $request->validated();

        $input['user_id'] = Auth::id();

        Goal::create($input);

        return response()->json(['success' => true, 'message' => 'Goal Created successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // TODO: Manage Auth when we are clear with Supervisor Logic.
        $goal = Goal::withoutGlobalScope(NonLibraryScope::class)->/* where('user_id', Auth::id())
            -> */where('id', $id)
            ->with('goalType')
            ->with('comments')
            ->firstOrFail();


        $linkedGoalsIds = LinkedGoal::where('user_goal_id', $id)->pluck('supervisor_goal_id');

        /* $supervisorGoals = Goal::whereIn('id', [997, 998, 999])->with('goalType')
            ->whereNotIn('id', $linkedGoalsIds)
            ->with('comments')->get(); */
        $linkedGoals
            = Goal::with('goalType', 'comments')
            ->whereIn('id', $linkedGoalsIds)
            ->get();


        return view('goal.show', compact('goal', 'linkedGoals'));
    }

    public function getSupervisorGoals($id) {
        $goal = Goal::findOrFail($id);
        $linkedGoalsIds = LinkedGoal::where('user_goal_id', $id)->pluck('supervisor_goal_id');

        $supervisorGoals = Goal::whereIn('id', [997, 998, 999])->with('goalType')
            ->whereNotIn('id', $linkedGoalsIds)
            ->with('comments')->get();
        
        return view('goal.partials.supervisor-goal-content', compact('goal', 'supervisorGoals'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $goal = Goal::where('user_id', Auth::id())
            ->where('id', $id)
            ->with('goalType')
            ->firstOrFail();

        $goaltypes = GoalType::all(['id', 'name']);

        return view('goal.edit', compact("goal", "goaltypes"));
        // return redirect()->route('goal.edit', $id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateGoalRequest $request, $id)
    {
        $goal = Goal::findOrFail($id);
        $input = $request->validated();

        $goal->update($input);

        return redirect()->route('goal.index');
    }

    public function getSuggestedGoal($id) {
        return $this->respondeWith(Goal::withoutGlobalScope(NonLibraryScope::class)->findOrFail($id));
    }

    public function updateSuggestedGoal(EditSuggestedGoalRequest $request, $id)
    {
        $goal = Goal::withoutGlobalScope(NonLibraryScope::class)->findOrFail($id);
        $input = $request->validated();

        $goal->update($input);

        return redirect()->route('my-team.suggested-goals');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $goal = Goal::withoutGlobalScope(NonLibraryScope::class)->find($id);
        if (!$goal) {
            abort(404);
        }
        if ($goal->user_id !== Auth::id()) {
            abort(403);
        }

        $goal->delete();

        return redirect()->back();
    }

    public function library(Request $request)
    {
        $query = Goal::whereIn('id', [997, 998, 999]);
        $expanded = false;
        $currentSearch = "";
        if($request->has('search') && $request->search != '') {
            // $searchText = explode(' ', $request->search);
            $searchText = $request->search;
            $query->Where(function ($qq) use ($searchText) {
                foreach ($searchText as $search) {
                    $qq->orWhere(function ($q) use ($search) {
                        $q->orWhere('title', 'LIKE', '%' . $search . '%');
                        $q->orWhere('what', 'LIKE', '%' . $search . '%');
                        $q->orWhere('why', 'LIKE', '%' . $search . '%');
                        $q->orWhere('how', 'LIKE', '%' . $search . '%');
                        $q->orWhere('measure_of_success', 'LIKE', '%' . $search . '%');
                    });
                }
            });
            
            $expanded = true;
            $currentSearch = implode(' ',$request->search);
        }
        $sQuery = clone $query;

        /* $supervisorGoals = $sQuery->whereIn('id', [998])->with('goalType')
                            ->with('comments')->get(); */
        $organizationGoals = $query->whereIn('id', [997, 999])->with('goalType')
                            ->with('comments')->get();

        $user = Auth::user();
        // $sQuery = $user->sharedGoals()->withoutGlobalScope(NonLibraryScope::class);
        $sQuery = Goal::withoutGlobalScope(NonLibraryScope::class)->where('user_id', $user->reportingManager->id);
                        
        // TODO: For User Experience 
        // $sQuery = Goal::where('id', 998);
        // TODO: remove duplicate if once we resolve organizational goals
        if ($request->has('search') && $request->search != '') {
            // $searchText = explode(' ', $request->search);
            $searchText = $request->search;
            $sQuery->Where(function ($qq) use ($searchText) {
                foreach ($searchText as $search) {
                    $qq->orWhere(function ($q) use ($search) {
                        $q->orWhere('title', 'LIKE', '%' . $search . '%');
                        $q->orWhere('what', 'LIKE', '%' . $search . '%');
                        $q->orWhere('why', 'LIKE', '%' . $search . '%');
                        $q->orWhere('how', 'LIKE', '%' . $search . '%');
                        $q->orWhere('measure_of_success', 'LIKE', '%' . $search . '%');
                    });
                }
            });

            $expanded = true;
            $currentSearch = implode(' ', $request->search);
        };
        // TODO: For UserExperience Test
        // $supervisorGoals = $sQuery->where('is_library', 1)->with('goalType')
        $supervisorGoals = $sQuery->with('goalType')
        ->with('comments')->get();
        return view('goal.library', compact('organizationGoals', 'supervisorGoals', 'currentSearch', 'expanded'));
    }

    public function showForLibrary(Request $request, $id) {
        if ($request->has("add") && $request->add) {
            $showAddBtn = true;
        }
        $goal = Goal::withoutGlobalScope(NonLibraryScope::class)->find($id);
        return view('goal.partials.show', compact('goal', 'showAddBtn'));
    }

    public function saveFromLibrary(Request $request)
    {
        $goal = Goal::withoutGlobalScope(NonLibraryScope::class)->find($request->selected_goal);
        $newGoal = new Goal;
        $newGoal->title = $goal->title;
        $newGoal->why = $goal->why;
        $newGoal->what = $goal->what;
        $newGoal->how = $goal->how;
        $newGoal->measure_of_success = $goal->measure_of_success;
        $newGoal->start_date = $request->start_date;
        $newGoal->target_date = $request->target_date;
        $newGoal->status = $goal->status;
        $newGoal->goal_type_id = $goal->goal_type_id;
        $newGoal->user_id = Auth::id();
        $newGoal->save();

        return response()->json(['success' => true, 'data' => $newGoal, 'message' => 'Goal Added Successfully']);
    }

    public function addComment(Request $request, $id)
    {
        //TODO: Who can add comment ?
        $goal = Goal::findOrFail($id);
        $comment = new GoalComment;


        $comment->goal_id = $goal->id;
        $comment->user_id = Auth::id();
        $comment->parent_id = $request->parent_id ?? null;

        $comment->comment = $request->comment;

        $comment->save();

        return redirect()->back();
    }

    public function updateStatus($id, $status)
    {
        $goal = Goal::findOrFail($id);
        $goal->status = $status;

        $goal->save();
        return redirect()->back();
    }

    public function linkGoal(Request $request)
    {
        $linkedGoalIds = $request->linked_goal_id;
        if ($request->linked_goal_id) {

            $linkedGoalIds = explode(',', $linkedGoalIds);
            foreach ($linkedGoalIds as $key => $value) {
                LinkedGoal::updateOrCreate([
                    'user_goal_id' => $request->current_goal_id,
                    'supervisor_goal_id' => $value,
                ]);
            }
        }

        return redirect()->back();
    }

    public function copyGoal(Request $request, $id) {
        $goal = Goal::findOrFail($id);
        $userId = Auth::Id();

        // TODO: For UserExperience Test
        /* if (!$goal->sharedWith()->where('users.id', $userId)->exists()) {
            abort(403, __('You do not have access to the resource'));
        } */

        $newGoal = $goal->replicate();
        $newGoal->user_id = $userId;
        $newGoal->is_shared = 0;
        $newGoal->referenced_from = $goal->id;
        $newGoal->save();

        return redirect()->route('goal.current');
    }
}
