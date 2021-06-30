<?php

namespace App\Http\Controllers;

use App\DataTables\MyEmployeesDataTable;
use Illuminate\Http\Request;

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
        return $myEmployeesDataTable->render('my-team/my-employees');
    }

    public function performanceStatistics()
    {
        return view('my-team/performance-statistics');
    }
    public function goalsHierarchy()
    {
        return view('my-team/goals-hierarchy');
    }
}
