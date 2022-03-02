<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyTeamGoalController extends Controller {

    public function shareMyGoals() {
        $goals = Goal::where('user_id', Auth::id())
            ->where('status', 'active')
            ->with('user')
            ->with('sharedWith')
            ->with('goalType')->get();
        $myTeamController = new MyTeamController();
        $employees = $myTeamController->myEmployeesAjax();
        return view('my-team.goals.index', compact('goals', 'employees'));
    }
}