<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Goals\CreateGoalRequest;
use App\Models\Goal;
use App\Models\GoalType;
use Illuminate\Support\Facades\Auth;
use App\DataTables\GoalsDataTable;
use App\Models\GoalComment;
use App\Models\LinkedGoal;

class GoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(GoalsDataTable $goalDataTable, Request $request)
    {
        $goaltypes = GoalType::all();
        $query = Goal::where('user_id', Auth::id())
            ->with('user')
            ->with('goalType');
        $type = 'past';
        if ($request->is("goal/current")) {
            $goals = $query->where('status', 'active')
                ->paginate(4);
            $type = 'current';
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
        $goal = Goal::where('user_id', Auth::id())
            ->where('id', $id)
            ->with('goalType')
            ->with('comments')
            ->firstOrFail();


        $linkedGoalsIds = LinkedGoal::where('user_goal_id', $id)->pluck('supervisor_goal_id');

        $supervisorGoals = Goal::whereIn('id', [997, 998, 999])->with('goalType')
            ->whereNotIn('id', $linkedGoalsIds)
            ->with('comments')->get();
        $linkedGoals
            = Goal::with('goalType', 'comments')
            ->whereIn('id', $linkedGoalsIds)
            ->get();


        return view('goal.show', compact('goal', 'linkedGoals', 'supervisorGoals'));
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function library()
    {

        $organisationGoals = Goal::whereIn('id', [997, 998, 999])->with('goalType')
            ->with('comments')->get();
        return view('goal.library', compact('organisationGoals'));
    }

    public function saveFromLibrary(Request $request)
    {
        $goal = Goal::find($request->selected_goal);
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
}
