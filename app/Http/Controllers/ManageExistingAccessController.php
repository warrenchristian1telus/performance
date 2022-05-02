<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
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
use Illuminate\Database\Query\Builder;

class ManageExistingAccessController extends Controller
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
        $roles = DB::table('roles')
        ->whereIntegerInRaw('id', [3, 4])
        ->pluck('longname', 'id');

        return view('sysadmin.access.manageexistingaccess', compact ('request', 'criteriaList', 'roles'));
    }

    public function getList(Request $request) {
        if ($request->ajax()) {
            $level0 = $request->dd_level0 ? OrganizationTree::where('id', $request->dd_level0)->first() : null;
            $level1 = $request->dd_level1 ? OrganizationTree::where('id', $request->dd_level1)->first() : null;
            $level2 = $request->dd_level2 ? OrganizationTree::where('id', $request->dd_level2)->first() : null;
            $level3 = $request->dd_level3 ? OrganizationTree::where('id', $request->dd_level3)->first() : null;
            $level4 = $request->dd_level4 ? OrganizationTree::where('id', $request->dd_level4)->first() : null;


            $query = User::withoutGlobalScopes()
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->leftjoin('employee_demo', 'users.guid', '=', 'employee_demo.guid')
            ->where('model_has_roles.model_type', 'App\Models\User')
            ->whereIn('model_has_roles.role_id', [3, 4])
            ->when($level0, function($q) use($level0) {return $q->where('organization', $level0->name);})
            ->when($level1, function($q) use($level1) {return $q->where('level1_program', $level1->name);})
            ->when($level2, function($q) use($level2) {return $q->where('level2_division', $level2->name);})
            ->when($level3, function($q) use($level3) {return $q->where('level3_branch', $level3->name);})
            ->when($level4, function($q) use($level4) {return $q->where('level4', $level4->name);})
            ->when($request->criteria == 'name', function($q) use($request){return $q->where('employee_name', 'like', "%" . $request->search_text . "%");})
            ->when($request->criteria == 'emp', function($q) use($request){return $q->where('employee_id', 'like', "%" . $request->search_text . "%");})
            ->when($request->criteria == 'job', function($q) use($request){return $q->where('job_title', 'like', "%" . $request->search_text . "%");})
            ->when($request->criteria == 'dpt', function($q) use($request){return $q->where('deptid', 'like', "%" . $request->search_text . "%");})
            // ->when([$request->criteria == 'all', $request->search_text], function($q) use ($request) 
            ->when($request->criteria == 'all', function($q) use ($request) {
                return $q->where(function ($query2) use ($request) {
                    if($request->search_text) {
                        $query2->where('employee_id', 'like', "%" . $request->search_text . "%")
                        ->orWhere('employee_name', 'like', "%" . $request->search_text . "%")
                        ->orWhere('job_title', 'like', "%" . $request->search_text . "%")
                        ->orWhere('deptid', 'like', "%" . $request->search_text . "%");
                    }
                });
            })
            ->select (
                'employee_demo.employee_id',
                'employee_demo.employee_name', 
                'users.email',
                'employee_demo.job_title',
                'employee_demo.organization',
                'employee_demo.level1_program',
                'employee_demo.level2_division',
                'employee_demo.level3_branch',
                'employee_demo.level4',
                'employee_demo.deptid',
                'model_has_roles.role_id',
                'model_has_roles.reason',
                'roles.longname',
                'model_has_roles.model_id',
            );
            return Datatables::of($query)
            ->addIndexColumn()
            ->addcolumn('action', function($row){
                return '<button 
                class="btn btn-xs btn-primary modalbutton" 
                role="button" 
                data-roleid="{{ $row->role_id }}" 
                data-modelid="{{ $row->model_id }}" 
                data-reason="{{ $row->reason }}" 
                data-email="{{ $row->email }}" 
                data-toggle="modal"
                data-target="#editModal"
                role="button">Update</button>';
            })
            ->rawColumns(['action'])
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

    public function get_access_entry($roleId, $modelId) {
        return DB::table('model_has_roles')
        ->whereIn('model_id', [3, 4])
        ->where('model_type', '=', 'App\Models\User')
        ->where('role_id', '=', $roleId)
        ->where('model_id', '=', $modelId);
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
    public function edit($id) {
        $users = User::where('id', '=', $id)
        ->select('email')
        ->get();
        $email = $users->first()->email;
        $roles = DB::table('roles')
        ->whereIntegerInRaw('id', [3, 4])
        ->get();
        $access = DB::table('model_has_roles')
        ->where('model_id', '=', $id)
        ->where('model_has_roles.model_type', 'App\Models\User')
        ->get();
        return view('sysadmin.access.partials.access-edit-modal', compact('roles', 'access', 'email'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }
}
