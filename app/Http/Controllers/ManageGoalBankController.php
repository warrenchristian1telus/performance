<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Goal;
use App\Models\GoalType;
use App\Models\Conversation;
use App\Models\EmployeeDemo;
use App\Models\OrganizationTree;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;


class ManageGoalBankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $errors = session('errors');

        if ($errors) {
            $old = session()->getOldInput();
            $request->dd_level0 = isset($old['dd_level0']) ? $old['dd_level0'] : null;
            $request->dd_level1 = isset($old['dd_level1']) ? $old['dd_level1'] : null;
            $request->dd_level2 = isset($old['dd_level2']) ? $old['dd_level2'] : null;
            $request->dd_level3 = isset($old['dd_level3']) ? $old['dd_level3'] : null;
            $request->dd_level4 = isset($old['dd_level4']) ? $old['dd_level4'] : null;
            $request->criteria = isset($old['criteria']) ? $old['criteria'] : null;
            $request->search_text = isset($old['search_text']) ? $old['search_text'] : null;
        } 

        if ($request->btn_search) {
            session()->put('_old_input', [
                'dd_level0' => $request->dd_level0,
                'dd_level1' => $request->dd_level1,
                'dd_level2' => $request->dd_level2,
                'dd_level3' => $request->dd_level3,
                'dd_level4' => $request->dd_level4,
                'criteria' => $request->criteria,
                'search_text' => $request->search_text,
            ]);
        }

        $level0 = $request->dd_level0 ? OrganizationTree::where('id', $request->dd_level0)->first() : null;
        $level1 = $request->dd_level1 ? OrganizationTree::where('id', $request->dd_level1)->first() : null;
        $level2 = $request->dd_level2 ? OrganizationTree::where('id', $request->dd_level2)->first() : null;
        $level3 = $request->dd_level3 ? OrganizationTree::where('id', $request->dd_level3)->first() : null;
        $level4 = $request->dd_level4 ? OrganizationTree::where('id', $request->dd_level4)->first() : null;

        $request->session()->flash('level0', $level0);
        $request->session()->flash('level1', $level1);
        $request->session()->flash('level2', $level2);
        $request->session()->flash('level3', $level3);
        $request->session()->flash('level4', $level4);

        $criteriaList = $this->search_criteria_list();

        return view('sysadmin.goals.managegoalbank', compact ('request', 'criteriaList'));
    }

    public function getList(Request $request)
    {
        if ($request->ajax()) 
        {
            // $level0 = $request->dd_level0 ? OrganizationTree::where('id', $request->dd_level0)->first() : null;
            // $level1 = $request->dd_level1 ? OrganizationTree::where('id', $request->dd_level1)->first() : null;
            // $level2 = $request->dd_level2 ? OrganizationTree::where('id', $request->dd_level2)->first() : null;
            // $level3 = $request->dd_level3 ? OrganizationTree::where('id', $request->dd_level3)->first() : null;
            // $level4 = $request->dd_level4 ? OrganizationTree::where('id', $request->dd_level4)->first() : null;


            // $query = Goal::join('goals', 'users.id', '=', 'goals.user_id')
            // ->leftjoin('employee_demo', 'users.guid', '=', 'employee_demo.guid')
            // ->when($level0, function($q) use($level0) {return $q->where('organization', $level0->name);})
            // ->when($level1, function($q) use($level1) {return $q->where('level1_program', $level1->name);})
            // ->when($level2, function($q) use($level2) {return $q->where('level2_division', $level2->name);})
            // ->when($level3, function($q) use($level3) {return $q->where('level3_branch', $level3->name);})
            // ->when($level4, function($q) use($level4) {return $q->where('level4', $level4->name);})
            // ->when($request->criteria == 'name', function($q) use($request){return $q->where('employee_name', 'like', "%" . $request->search_text . "%");})
            // ->when($request->criteria == 'emp', function($q) use($request){return $q->where('employee_id', 'like', "%" . $request->search_text . "%");})
            // ->when($request->criteria == 'job', function($q) use($request){return $q->where('job_title', 'like', "%" . $request->search_text . "%");})
            // ->when($request->criteria == 'dpt', function($q) use($request){return $q->where('deptid', 'like', "%" . $request->search_text . "%");})
            // ->when($request->criteria == 'all', function($q) use ($request) 
            // {
            //     return $q->where(function ($query2) use ($request) 
            //     {
            //         $query2->where('employee_id', 'like', "%" . $request->search_text . "%")
            //         ->orWhere('employee_name', 'like', "%" . $request->search_text . "%")
            //         ->orWhere('job_title', 'like', "%" . $request->search_text . "%")
            //         ->orWhere('deptid', 'like', "%" . $request->search_text . "%");
            //     });
            // })
            // $query = DB::table('goals')
            $query = Goal::withoutGlobalScopes()
            ->where('is_library', true)
            ->select
            (
                'id',
                'title',
                'created_at',
            )
            ->addselect(['goal_type_name' => GoalType::select('name')->whereColumn('goal_type_id', 'goal_types.id')->limit(1)])
            ->addselect(['creator_name' => User::select('name')->whereColumn('user_id', 'users.id')->limit(1)])
            ;
            return Datatables::of($query)
            ->addIndexColumn()
            ->addColumn('mandatory', function ($row) {
                return $row->is_mandatory ? "Yes" : "No";
            })
            ->editColumn('created_at', function ($row) {
                return $row->created_at ? $row->created_at->format('F d, Y') : null;
            })
            ->addColumn('audience', function ($row) {
                return $row->sharedWith()->count();
            })
            ->addcolumn('action', function($row) {
                return '<a href="#" class="view-modal btn btn-xs btn-primary" value="'. $row->id .'">View</a>';
            })
            ->rawColumns(['goaltype', 'created_by', 'action'])
            ->make(true);
        }
    }

    protected function search_criteria_list() {
        return [
            'all' => 'All',
            'emp' => 'Employee ID', 
            'name'=> 'Employee Name',
            'job' => 'Job Title', 
            'dpt' => 'Department ID'
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
}
