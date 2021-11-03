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
use App\Models\DashboardNotification;
use App\Scopes\NonLibraryScope;
use Carbon\Carbon;
use Illuminate\Support\Str;

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
        $user = Auth::user();
        $query = Goal::where('user_id', $authId)
            ->with('user')
            ->with('goalType');
        $type = 'past';
        if ($request->is("goal/current")) {
            $goals = $query->where('status', 'active')
                ->paginate(4);
            $type = 'current';
            return view('goal.index', compact('goals', 'type', 'goaltypes', 'user'));
        } else if ($request->is("goal/supervisor")) {
            //$user = Auth::user();
            // TO remove already copied goals.
            // $referencedGoals = Goal::where('user_id', $authId)->whereNotNull('referenced_from')->pluck('referenced_from');
            $goals = $user->sharedGoals()
                /* ->whereNotIn('goals.id', $referencedGoals ) */
                ->paginate(4);
            $type = 'supervisor';
            return view('goal.index', compact('goals', 'type', 'goaltypes', 'user'));
        }
        $goals = $query->where('status', '<>', 'active')
            ->paginate(4);
        return view('goal.index', compact('goals', 'type', 'goaltypes', 'user'));
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

            $user = User::findOrFail($goal->user_id);
            if ($goal->last_supervisor_comment == 'Y' and ($goal->user_id == session()->get('original-auth-id') or session()->get('original-auth-id') == null)) {
              $goal->last_supervisor_comment = 'N';
              $goal->save();
            }

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

    public function goalBank(Request $request) {
        $query = Goal::withoutGlobalScope(NonLibraryScope::class)
            ->where('is_library', true)
            ->with('goalType')
            ->with('user');
        if ($request->has('is_mandatory') && $request->is_mandatory !== null) {
            $query = $query->where('is_mandatory', $request->is_mandatory);
            if (!$request->is_mandatory) {
                $query = $query->orWhereNull('is_mandatory');
            }
        }

        if ($request->has('goal_type') && $request->goal_type) {
            $query = $query->whereHas('goalType', function($query) use ($request) {
                return $query->where('id', $request->goal_type);
            });
        }

        if ($request->has('title') && $request->title) {
            $query = $query->where('title', "LIKE", "%$request->title%");
        }

        if ($request->has('date_added') && $request->date_added && Str::lower($request->date_added) !== 'any') {
            $dateRange = explode("-",$request->date_added);
            $dateRange[0] = trim($dateRange[0]);
            $dateRange[1] = trim($dateRange[1]);

            $startDate = Carbon::createFromFormat('M d, Y', $dateRange[0]);
            $endDate = Carbon::createFromFormat('M d, Y', $dateRange[1]);

            $query = $query->whereDate('created_at', '>=', $startDate);
            $query = $query->whereDate('created_at', '<=', $endDate);
        }


        $bankGoals = $query->get();
        $this->getDropdownValues($mandatoryOrSuggested, $createdBy, $goalTypes);
        return view('goal.bank', compact('bankGoals', 'goalTypes', 'mandatoryOrSuggested', 'createdBy'));
    }

    private function getDropdownValues(&$mandatoryOrSuggested, &$createdBy, &$goalTypes) {
        $mandatoryOrSuggested = [
            [
                "id" => '',
                "name" => 'Any'
            ],
            [
                "id" => '1',
                "name" => 'Mandatory'
            ],
            [
                "id" => '0',
                "name" => 'Suggested'
            ]
        ];

        $createdBy = [
            [
                "id" => "0",
                "name" => "Any"
            ],
            [
                "id" => "1",
                "name" => "Supervisor"
            ],
            [
                "id" => "2",
                "name" => "Organization"
            ]
        ];


        $goalType = GoalType::all()->pluck('name', 'id')->toArray();
        array_unshift($goalType, "Any");
        $goalTypes = [];
        foreach($goalType as $id => $type) {
            $goalTypes[] = [
                "id" => $id,
                "name" => $type
            ];
        }
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
        $newGoal->start_date = $goal->start_date;
        $newGoal->target_date = $goal->target_date;
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

        if (session()->get('original-auth-id') != null) {
          $comment->user_id = session()->get('original-auth-id');
        }
        else {
          $comment->user_id = Auth::id();
        }

        $comment->comment = $request->comment;

        $comment->save();

        $user = User::findOrFail($goal->user_id);

        if (($goal->last_supervisor_comment != 'Y') and (session()->get('original-auth-id') != null) and ($user->reporting_to == session()->get('original-auth-id'))) {
          //update flag
          $goal->last_supervisor_comment = 'Y';
          $goal->save();
          }

        if ((session()->get('original-auth-id') != null) and ($user->reporting_to == session()->get('original-auth-id'))) {
          //add dashboard notification
          $newNotify = new DashboardNotification;
          $newNotify->user_id = Auth::id();
          $newNotify->notification_type = 'G';
          $newNotify->comment = $comment->user->name . ' added a comment to your goal.';
          $newNotify->related_id = $goal->id;
          $newNotify->save();
          }

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
