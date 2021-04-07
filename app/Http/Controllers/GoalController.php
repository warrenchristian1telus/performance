<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Goals\CreateGoalRequest;
use App\Models\Goal;
use App\Models\GoalType;
use Illuminate\Support\Facades\Auth;
use App\DataTables\GoalsDataTable;
use App\Models\GoalComment;

class GoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(GoalsDataTable $goalDataTable, Request $request)
    {
        $query = Goal::where('user_id', Auth::id())
            ->with('user')
            ->with('goalType');
        if ($request->is("goal/current")) {
            $goals = $query->where('status', 'active')
                ->paginate(4);

            return view('goal.index', compact('goals'));
        }
        $goals = $query->where('status', '<>', 'active')
            ->paginate(4);
        return view('goal.index', compact('goals'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $goaltypes = GoalType::all(['id', 'name']);
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

        return redirect()->route('goal.index');
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
        
        return view('goal.show', compact('goal'));
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



    public function addComment(Request $request, $id) {
        //TODO: Who can add comment ?
        $goal = Goal::findOrFail($id);
        $comment = new GoalComment;


        $comment->goal_id = $goal->id;
        $comment->user_id = Auth::id();

        $comment->comment = $request->comment;

        $comment->save();

        return redirect()->back();
    }

    public function updateStatus($id, $status) {
        $goal = Goal::findOrFail($id);
        $goal->status = $status;

        $goal->save();
        return redirect()->back();
    }
}
