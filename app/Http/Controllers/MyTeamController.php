<?php

namespace App\Http\Controllers;

use App\DataTables\MyEmployeesDataTable;
use App\Models\Goal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function myEmployees(MyEmployeesDataTable $myEmployeesDataTable)
    {
        // return view('my-team/my-employees');
        $goals = Goal::where('user_id', Auth::id())
            ->with('user')
            ->with('goalType')->get();
        return $myEmployeesDataTable->render('my-team/my-employees',compact('goals'));
    }

    public function performanceStatistics()
    {
        $goals = Goal::where('user_id', Auth::id())
            ->with('user')
            ->with('goalType')->get();
        return view('my-team/performance-statistics', compact('goals'));
    }
    public function goalsHierarchy()
    {
        $goals = Goal::where('user_id', Auth::id())
            ->with('user')
            ->with('goalType')->get();
        return view('my-team/goals-hierarchy', compact('goals'));
    }
}
