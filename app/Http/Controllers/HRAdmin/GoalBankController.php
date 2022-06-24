<?php

namespace App\Http\Controllers\HRAdmin;


use App\Models\User;
use App\Models\Goal;
use App\Models\GoalType;
use App\Models\Tag;
use App\Models\GoalBankOrg;
use App\Models\EmployeeDemo;
use Illuminate\Http\Request;
use App\Models\OrganizationTree;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\Goals\CreateGoalRequest;
use Carbon\Carbon;


class GoalBankController extends Controller
{
    public function createindex(Request $request) 
    {

        $goalTypes = GoalType::all()->toArray();
        $this->getDropdownValues($mandatoryOrSuggested);
        $tags = Tag::all(["id","name"])->toArray();

        $errors = session('errors');

        $old_selected_emp_ids = []; // $request->selected_emp_ids ? json_decode($request->selected_emp_ids) : [];
        $old_selected_org_nodes = []; // $request->old_selected_org_nodes ? json_decode($request->selected_org_nodes) : [];

        $eold_selected_emp_ids = []; // $request->eselected_emp_ids ? json_decode($request->eselected_emp_ids) : [];
        $eold_selected_org_nodes = []; // $request->eold_selected_org_nodes ? json_decode($request->eselected_org_nodes) : [];

        if ($errors) {
            $old = session()->getOldInput();

            $request->dd_level0 = isset($old['dd_level0']) ? $old['dd_level0'] : null;
            $request->dd_level1 = isset($old['dd_level1']) ? $old['dd_level1'] : null;
            $request->dd_level2 = isset($old['dd_level2']) ? $old['dd_level2'] : null;
            $request->dd_level3 = isset($old['dd_level3']) ? $old['dd_level3'] : null;
            $request->dd_level4 = isset($old['dd_level4']) ? $old['dd_level4'] : null;

            $request->criteria = isset($old['criteria']) ? $old['criteria'] : null;
            $request->search_text = isset($old['search_text']) ? $old['search_text'] : null;
            
            $request->orgCheck = isset($old['orgCheck']) ? $old['orgCheck'] : null;
            $request->userCheck = isset($old['userCheck']) ? $old['userCheck'] : null;

            $old_selected_emp_ids = isset($old['selected_emp_ids']) ? json_decode($old['selected_emp_ids']) : [];
            $old_selected_org_nodes = isset($old['selected_org_nodes']) ? json_decode($old['selected_org_nodes']) : [];

            $request->edd_level0 = isset($old['edd_level0']) ? $old['edd_level0'] : null;
            $request->edd_level1 = isset($old['edd_level1']) ? $old['edd_level1'] : null;
            $request->edd_level2 = isset($old['edd_level2']) ? $old['edd_level2'] : null;
            $request->edd_level3 = isset($old['edd_level3']) ? $old['edd_level3'] : null;
            $request->edd_level4 = isset($old['edd_level4']) ? $old['edd_level4'] : null;

            $request->ecriteria = isset($old['ecriteria']) ? $old['ecriteria'] : null;
            $request->esearch_text = isset($old['esearch_text']) ? $old['esearch_text'] : null;
            
            $request->eorgCheck = isset($old['eorgCheck']) ? $old['eorgCheck'] : null;
            $request->euserCheck = isset($old['euserCheck']) ? $old['euserCheck'] : null;

            $eold_selected_emp_ids = isset($old['eselected_emp_ids']) ? json_decode($old['eselected_emp_ids']) : [];
            $eold_selected_org_nodes = isset($old['eselected_org_nodes']) ? json_decode($old['eselected_org_nodes']) : [];
        } 

        // no validation and move filter variable to old 
        if ($request->btn_search) {
            session()->put('_old_input', [
                'dd_level0' => $request->dd_level0,
                'dd_level1' => $request->dd_level1,
                'dd_level2' => $request->dd_level2,
                'dd_level3' => $request->dd_level3,
                'dd_level4' => $request->dd_level4,
                'criteria' => $request->criteria,
                'search_text' => $request->search_text,
                'orgCheck' => $request->orgCheck,
                'userCheck' => $request->userCheck,
            ]);
        }

        if ($request->ebtn_search) {
            session()->put('_old_input', [
                'edd_level0' => $request->edd_level0,
                'edd_level1' => $request->edd_level1,
                'edd_level2' => $request->edd_level2,
                'edd_level3' => $request->edd_level3,
                'edd_level4' => $request->edd_level4,
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
        $request->session()->flash('userCheck', $request->userCheck);  // Dynamic load 
        
        $elevel0 = $request->edd_level0 ? OrganizationTree::where('id', $request->edd_level0)->first() : null;
        $elevel1 = $request->edd_level1 ? OrganizationTree::where('id', $request->edd_level1)->first() : null;
        $elevel2 = $request->edd_level2 ? OrganizationTree::where('id', $request->edd_level2)->first() : null;
        $elevel3 = $request->edd_level3 ? OrganizationTree::where('id', $request->edd_level3)->first() : null;
        $elevel4 = $request->edd_level4 ? OrganizationTree::where('id', $request->edd_level4)->first() : null;
        $request->session()->flash('euserCheck', $request->euserCheck);  // Dynamic load 

        $request->session()->flash('elevel0', $elevel0);
        $request->session()->flash('elevel1', $elevel1);
        $request->session()->flash('elevel2', $elevel2);
        $request->session()->flash('elevel3', $elevel3);
        $request->session()->flash('elevel4', $elevel4);

        // Matched Employees 
        $demoWhere = $this->baseFilteredWhere($request, $level0, $level1, $level2, $level3, $level4);
        $sql = clone $demoWhere; 
        $matched_emp_ids = $sql->select([ 
            'employee_demo.employee_id'
            , 'employee_demo.employee_name'
            , 'employee_demo.job_title'
            , 'employee_demo.employee_email'
            , 'employee_demo.organization'
            , 'employee_demo.level1_program'
            , 'employee_demo.level2_division'
            , 'employee_demo.level3_branch'
            , 'employee_demo.level4'
            , 'employee_demo.deptid'
            , 'employee_demo.job_title'
        ])
        ->orderBy('employee_demo.employee_id')
        ->pluck('employee_demo.employee_id');        
        
        $ematched_emp_ids = [];

        $criteriaList = $this->search_criteria_list();
        $ecriteriaList = $this->search_criteria_list();

        return view('hradmin.goalbank.createindex', compact('criteriaList', 'ecriteriaList', 'matched_emp_ids', 'ematched_emp_ids', 'old_selected_emp_ids', 'eold_selected_emp_ids', 'old_selected_org_nodes', 'eold_selected_org_nodes', 'goalTypes', 'mandatoryOrSuggested', 'tags') );
    
    }


    public function index(Request $request) 
    {
        $goalTypes = GoalType::all()->toArray();
        $this->getDropdownValues($mandatoryOrSuggested);

        $errors = session('errors');

        $old_selected_emp_ids = []; // $request->selected_emp_ids ? json_decode($request->selected_emp_ids) : [];
        $old_selected_org_nodes = []; // $request->old_selected_org_nodes ? json_decode($request->selected_org_nodes) : [];
        $tags = Tag::all(["id","name"])->toArray();

        if ($errors) {
            $old = session()->getOldInput();

            $request->dd_level0 = isset($old['dd_level0']) ? $old['dd_level0'] : null;
            $request->dd_level1 = isset($old['dd_level1']) ? $old['dd_level1'] : null;
            $request->dd_level2 = isset($old['dd_level2']) ? $old['dd_level2'] : null;
            $request->dd_level3 = isset($old['dd_level3']) ? $old['dd_level3'] : null;
            $request->dd_level4 = isset($old['dd_level4']) ? $old['dd_level4'] : null;

            $request->search_text = isset($old['search_text']) ? $old['search_text'] : null;
            
            $request->orgCheck = isset($old['orgCheck']) ? $old['orgCheck'] : null;
            $request->userCheck = isset($old['userCheck']) ? $old['userCheck'] : null;

            $old_selected_emp_ids = isset($old['selected_emp_ids']) ? json_decode($old['selected_emp_ids']) : [];
            $old_selected_org_nodes = isset($old['selected_org_nodes']) ? json_decode($old['selected_org_nodes']) : [];

            $request->edd_level0 = isset($old['edd_level0']) ? $old['edd_level0'] : null;
            $request->edd_level1 = isset($old['edd_level1']) ? $old['edd_level1'] : null;
            $request->edd_level2 = isset($old['edd_level2']) ? $old['edd_level2'] : null;
            $request->edd_level3 = isset($old['edd_level3']) ? $old['edd_level3'] : null;
            $request->edd_level4 = isset($old['edd_level4']) ? $old['edd_level4'] : null;

            $old_selected_emp_ids = isset($old['selected_emp_ids']) ? json_decode($old['selected_emp_ids']) : [];
            $old_selected_org_nodes = isset($old['selected_org_nodes']) ? json_decode($old['selected_org_nodes']) : [];

        } 

        // no validation and move filter variable to old 
        if ($request->btn_search) {
            session()->put('_old_input', [
                'dd_level0' => $request->dd_level0,
                'dd_level1' => $request->dd_level1,
                'dd_level2' => $request->dd_level2,
                'dd_level3' => $request->dd_level3,
                'dd_level4' => $request->dd_level4,
                'criteria' => $request->criteria,
                'search_text' => $request->search_text,
                'orgCheck' => $request->orgCheck,
                'userCheck' => $request->userCheck,
            ]);
        }

        if ($request->ebtn_search) {
            session()->put('_old_input', [
                'edd_level0' => $request->edd_level0,
                'edd_level1' => $request->edd_level1,
                'edd_level2' => $request->edd_level2,
                'edd_level3' => $request->edd_level3,
                'edd_level4' => $request->edd_level4,
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
        $request->session()->flash('userCheck', $request->userCheck);  // Dynamic load 
        
        $elevel0 = $request->edd_level0 ? OrganizationTree::where('id', $request->edd_level0)->first() : null;
        $elevel1 = $request->edd_level1 ? OrganizationTree::where('id', $request->edd_level1)->first() : null;
        $elevel2 = $request->edd_level2 ? OrganizationTree::where('id', $request->edd_level2)->first() : null;
        $elevel3 = $request->edd_level3 ? OrganizationTree::where('id', $request->edd_level3)->first() : null;
        $elevel4 = $request->edd_level4 ? OrganizationTree::where('id', $request->edd_level4)->first() : null;

        $request->session()->flash('elevel0', $elevel0);
        $request->session()->flash('elevel1', $elevel1);
        $request->session()->flash('elevel2', $elevel2);
        $request->session()->flash('elevel3', $elevel3);
        $request->session()->flash('elevel4', $elevel4);

        // Matched Employees 
        $demoWhere = $this->baseFilteredWhere($request, $level0, $level1, $level2, $level3, $level4);
        $sql = clone $demoWhere; 
        $matched_emp_ids = $sql->select([ 'employee_demo.employee_id', 'employee_demo.employee_name', 'employee_demo.job_title', 'employee_demo.employee_email', 
                'employee_demo.organization', 'employee_demo.level1_program', 'employee_demo.level2_division',
                'employee_demo.level3_branch','employee_demo.level4', 'employee_demo.deptid', 'employee_demo.job_title'])
            ->orderBy('employee_id')
                ->pluck('employee_demo.employee_id');        
        
        $criteriaList = $this->search_criteria_list();
        $roles = DB::table('roles')
        ->whereIntegerInRaw('id', [3, 4])
        ->pluck('longname', 'id');

        return view('hradmin.goalbank.index', compact('criteriaList','matched_emp_ids', 'old_selected_emp_ids', 'old_selected_org_nodes', 'roles', 'goalTypes', 'mandatoryOrSuggested', 'tags') );
    
    }

    public function getgoalorgs(Request $request, $goal_id) {
        $level0 = $request->dd_level0 ? OrganizationTree::where('id', $request->dd_level0)->first() : null;
        $level1 = $request->dd_level1 ? OrganizationTree::where('id', $request->dd_level1)->first() : null;
        $level2 = $request->dd_level2 ? OrganizationTree::where('id', $request->dd_level2)->first() : null;
        $level3 = $request->dd_level3 ? OrganizationTree::where('id', $request->dd_level3)->first() : null;
        $level4 = $request->dd_level4 ? OrganizationTree::where('id', $request->dd_level4)->first() : null;
        if ($request->ajax()) {
            $query = GoalBankOrg::where('goal_id', '=', $goal_id)
            ->when( $level0, function ($q) use($level0) {
                return $q->where('goal_bank_orgs.organization', '=', $level0->name);
            })
            ->when( $level1, function ($q) use($level1) {
                return $q->where('goal_bank_orgs.level1_program', $level1->name);
            })
            ->when( $level2, function ($q) use($level2) {
                return $q->where('goal_bank_orgs.level2_division', $level2->name);
            })
            ->when( $level3, function ($q) use($level3) {
                return $q->where('goal_bank_orgs.level3_branch', $level3->name);
            })
            ->when( $level4, function ($q) use($level4) {
                return $q->where('goal_bank_orgs.level4', $level4->name);
            })
            ->select (
                'organization',
                'level1_program',
                'level2_division',
                'level3_branch',
                'level4',
                'goal_id',
                'id'
            );
            return Datatables::of($query)
            ->addIndexColumn()
            ->addcolumn('action', function($row) {
                $btn = '<a href="/hradmin/goalbank/deleteorg/' . $row->id . '" class="btn btn-xs btn-danger" onclick="return confirm(`Are you sure?`)" aria-label="Delete Org" id="delete_org" value="'. $row->id .'"><i class="fa fa-trash"></i></a>';
                return $btn;
            })
            ->rawColumns(['goal_type_name', 'created_by', 'action'])
             ->make(true);
        }
    }

    public function deleteorg(Request $request, $id)
    {
        $query = GoalBankOrg::where('id', '=', $id)
        ->delete();

        return redirect()->back();
    }

    public function deleteindividual(Request $request, $id)
    {
        $query = DB::table('goals_shared_with')
        ->where('id', '=', $id)
        ->delete();

        return redirect()->back();
    }

    public function editpage(Request $request, $id) 
    {
        $goalTypes = GoalType::all()->toArray();
        $this->getDropdownValues($mandatoryOrSuggested);

        $errors = session('errors');

        $old_selected_emp_ids = []; // $request->selected_emp_ids ? json_decode($request->selected_emp_ids) : [];
        $old_selected_org_nodes = []; // $request->old_selected_org_nodes ? json_decode($request->selected_org_nodes) : [];
        $tags = Tag::all(["id","name"])->toArray();

        if ($errors) {
            $old = session()->getOldInput();

            $request->dd_level0 = isset($old['dd_level0']) ? $old['dd_level0'] : null;
            $request->dd_level1 = isset($old['dd_level1']) ? $old['dd_level1'] : null;
            $request->dd_level2 = isset($old['dd_level2']) ? $old['dd_level2'] : null;
            $request->dd_level3 = isset($old['dd_level3']) ? $old['dd_level3'] : null;
            $request->dd_level4 = isset($old['dd_level4']) ? $old['dd_level4'] : null;

            $request->search_text = isset($old['search_text']) ? $old['search_text'] : null;
            
            $request->orgCheck = isset($old['orgCheck']) ? $old['orgCheck'] : null;
            $request->userCheck = isset($old['userCheck']) ? $old['userCheck'] : null;

            $old_selected_emp_ids = isset($old['selected_emp_ids']) ? json_decode($old['selected_emp_ids']) : [];
            $old_selected_org_nodes = isset($old['selected_org_nodes']) ? json_decode($old['selected_org_nodes']) : [];

            $request->edd_level0 = isset($old['edd_level0']) ? $old['edd_level0'] : null;
            $request->edd_level1 = isset($old['edd_level1']) ? $old['edd_level1'] : null;
            $request->edd_level2 = isset($old['edd_level2']) ? $old['edd_level2'] : null;
            $request->edd_level3 = isset($old['edd_level3']) ? $old['edd_level3'] : null;
            $request->edd_level4 = isset($old['edd_level4']) ? $old['edd_level4'] : null;

            $old_selected_emp_ids = isset($old['selected_emp_ids']) ? json_decode($old['selected_emp_ids']) : [];
            $old_selected_org_nodes = isset($old['selected_org_nodes']) ? json_decode($old['selected_org_nodes']) : [];

        } 

        // no validation and move filter variable to old 
        if ($request->btn_search) {
            session()->put('_old_input', [
                'dd_level0' => $request->dd_level0,
                'dd_level1' => $request->dd_level1,
                'dd_level2' => $request->dd_level2,
                'dd_level3' => $request->dd_level3,
                'dd_level4' => $request->dd_level4,
                'criteria' => $request->criteria,
                'search_text' => $request->search_text,
                'orgCheck' => $request->orgCheck,
                'userCheck' => $request->userCheck,
            ]);
        }

        if ($request->ebtn_search) {
            session()->put('_old_input', [
                'edd_level0' => $request->edd_level0,
                'edd_level1' => $request->edd_level1,
                'edd_level2' => $request->edd_level2,
                'edd_level3' => $request->edd_level3,
                'edd_level4' => $request->edd_level4,
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
        $request->session()->flash('userCheck', $request->userCheck);  // Dynamic load 
        
        $elevel0 = $request->edd_level0 ? OrganizationTree::where('id', $request->edd_level0)->first() : null;
        $elevel1 = $request->edd_level1 ? OrganizationTree::where('id', $request->edd_level1)->first() : null;
        $elevel2 = $request->edd_level2 ? OrganizationTree::where('id', $request->edd_level2)->first() : null;
        $elevel3 = $request->edd_level3 ? OrganizationTree::where('id', $request->edd_level3)->first() : null;
        $elevel4 = $request->edd_level4 ? OrganizationTree::where('id', $request->edd_level4)->first() : null;

        $request->session()->flash('elevel0', $elevel0);
        $request->session()->flash('elevel1', $elevel1);
        $request->session()->flash('elevel2', $elevel2);
        $request->session()->flash('elevel3', $elevel3);
        $request->session()->flash('elevel4', $elevel4);

        // Matched Employees 
        $demoWhere = $this->baseFilteredWhere($request, $level0, $level1, $level2, $level3, $level4);
        $sql = clone $demoWhere; 
        $matched_emp_ids = $sql->select([ 'employee_demo.employee_id', 'employee_demo.employee_name', 'employee_demo.job_title', 'employee_demo.employee_email', 
                'employee_demo.organization', 'employee_demo.level1_program', 'employee_demo.level2_division',
                'employee_demo.level3_branch','employee_demo.level4', 'employee_demo.deptid', 'employee_demo.job_title'])
            ->orderBy('employee_id')
                ->pluck('employee_demo.employee_id');        
        
        $criteriaList = $this->search_criteria_list();
        $ecriteriaList = $this->search_criteria_list();
        $roles = DB::table('roles')
        ->whereIntegerInRaw('id', [3, 4])
        ->pluck('longname', 'id');
        $goal_id = $id;

        $goaldetail = Goal::withoutGlobalScopes()->find($request->id);

        return view('hradmin.goalbank.editgoal', compact('criteriaList', 'ecriteriaList', 'matched_emp_ids', 'old_selected_emp_ids', 'old_selected_org_nodes', 'roles', 'goalTypes', 'mandatoryOrSuggested', 'tags', 'goaldetail', 'request', 'goal_id') );
    
    }

    public function editone(Request $request, $id) 
    {
        $goalTypes = GoalType::all()->toArray();
        $this->getDropdownValues($mandatoryOrSuggested);

        $errors = session('errors');

        $old_selected_emp_ids = []; // $request->selected_emp_ids ? json_decode($request->selected_emp_ids) : [];
        $old_selected_org_nodes = []; // $request->old_selected_org_nodes ? json_decode($request->selected_org_nodes) : [];
        $tags = Tag::all(["id","name"])->toArray();

        if ($errors) {
            $old = session()->getOldInput();

            $request->dd_level0 = isset($old['dd_level0']) ? $old['dd_level0'] : null;
            $request->dd_level1 = isset($old['dd_level1']) ? $old['dd_level1'] : null;
            $request->dd_level2 = isset($old['dd_level2']) ? $old['dd_level2'] : null;
            $request->dd_level3 = isset($old['dd_level3']) ? $old['dd_level3'] : null;
            $request->dd_level4 = isset($old['dd_level4']) ? $old['dd_level4'] : null;

            $request->search_text = isset($old['search_text']) ? $old['search_text'] : null;
            
            $request->orgCheck = isset($old['orgCheck']) ? $old['orgCheck'] : null;
            $request->userCheck = isset($old['userCheck']) ? $old['userCheck'] : null;

            $old_selected_emp_ids = isset($old['selected_emp_ids']) ? json_decode($old['selected_emp_ids']) : [];
            $old_selected_org_nodes = isset($old['selected_org_nodes']) ? json_decode($old['selected_org_nodes']) : [];

            $request->edd_level0 = isset($old['edd_level0']) ? $old['edd_level0'] : null;
            $request->edd_level1 = isset($old['edd_level1']) ? $old['edd_level1'] : null;
            $request->edd_level2 = isset($old['edd_level2']) ? $old['edd_level2'] : null;
            $request->edd_level3 = isset($old['edd_level3']) ? $old['edd_level3'] : null;
            $request->edd_level4 = isset($old['edd_level4']) ? $old['edd_level4'] : null;

            $old_selected_emp_ids = isset($old['selected_emp_ids']) ? json_decode($old['selected_emp_ids']) : [];
            $old_selected_org_nodes = isset($old['selected_org_nodes']) ? json_decode($old['selected_org_nodes']) : [];

        } 

        // no validation and move filter variable to old 
        if ($request->btn_search) {
            session()->put('_old_input', [
                'dd_level0' => $request->dd_level0,
                'dd_level1' => $request->dd_level1,
                'dd_level2' => $request->dd_level2,
                'dd_level3' => $request->dd_level3,
                'dd_level4' => $request->dd_level4,
                'criteria' => $request->criteria,
                'search_text' => $request->search_text,
                'orgCheck' => $request->orgCheck,
                'userCheck' => $request->userCheck,
            ]);
        }

        if ($request->ebtn_search) {
            session()->put('_old_input', [
                'edd_level0' => $request->edd_level0,
                'edd_level1' => $request->edd_level1,
                'edd_level2' => $request->edd_level2,
                'edd_level3' => $request->edd_level3,
                'edd_level4' => $request->edd_level4,
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
        $request->session()->flash('userCheck', $request->userCheck);  // Dynamic load 
        
        $elevel0 = $request->edd_level0 ? OrganizationTree::where('id', $request->edd_level0)->first() : null;
        $elevel1 = $request->edd_level1 ? OrganizationTree::where('id', $request->edd_level1)->first() : null;
        $elevel2 = $request->edd_level2 ? OrganizationTree::where('id', $request->edd_level2)->first() : null;
        $elevel3 = $request->edd_level3 ? OrganizationTree::where('id', $request->edd_level3)->first() : null;
        $elevel4 = $request->edd_level4 ? OrganizationTree::where('id', $request->edd_level4)->first() : null;

        $request->session()->flash('elevel0', $elevel0);
        $request->session()->flash('elevel1', $elevel1);
        $request->session()->flash('elevel2', $elevel2);
        $request->session()->flash('elevel3', $elevel3);
        $request->session()->flash('elevel4', $elevel4);

        // Matched Employees 
        $demoWhere = $this->baseFilteredWhere($request, $level0, $level1, $level2, $level3, $level4);
        $sql = clone $demoWhere; 
        $matched_emp_ids = $sql->select([ 
            'employee_demo.employee_id'
            , 'employee_demo.employee_name'
            , 'employee_demo.job_title'
            , 'employee_demo.employee_email'
            , 'employee_demo.organization'
            , 'employee_demo.level1_program'
            , 'employee_demo.level2_division'
            , 'employee_demo.level3_branch'
            , 'employee_demo.level4'
            , 'employee_demo.deptid'])
        ->orderBy('employee_id')
        ->pluck('employee_demo.employee_id');        
        
        $criteriaList = $this->search_criteria_list();
        $ecriteriaList = $this->search_criteria_list();
        $roles = DB::table('roles')
        ->whereIntegerInRaw('id', [3, 4])
        ->pluck('longname', 'id');
        $goal_id = $id;

        $goaldetail = Goal::withoutGlobalScopes()->find($request->id);

        return view('hradmin.goalbank.editone', compact('criteriaList', 'ecriteriaList', 'matched_emp_ids', 'old_selected_emp_ids', 'old_selected_org_nodes', 'roles', 'goalTypes', 'mandatoryOrSuggested', 'tags', 'goaldetail', 'request', 'goal_id') );
    
    }

    public function savenewgoal(CreateGoalRequest $request) 
    {
        $request->userCheck = $request->selected_emp_ids;

        $current_user = User::find(Auth::id());

        $resultrec = Goal::withoutGlobalScopes()
        ->create(
            ['goal_type_id' => $request->input('goal_type_id')
            , 'is_library' => true
            , 'is_shared' => true
            , 'title' => $request->input('title')
            , 'what' => $request->input('what')
            , 'measure_of_success' => $request->input('measure_of_success')
            , 'start_date' => $request->input('start_date')
            , 'target_date' => $request->input('target_date')
            , 'measure_of_success' => $request->input('measure_of_success')
            , 'user_id' => $current_user->id
            , 'created_by' => $current_user->id
            ]
        );
        
        $resultrec->tags()->sync($request->tag_ids);

        $employee_ids = ($request->userCheck) ? $request->userCheck : [];

        if($request->opt_audience == "byEmp") {
            $selected_emp_ids = $request->selected_emp_ids ? json_decode($request->selected_emp_ids) : [];
            $toRecipients = EmployeeDemo::select('users.id')
            ->join('users', 'employee_demo.guid', 'users.guid')
            ->whereIn('employee_demo.employee_id', $selected_emp_ids )
            ->distinct()
            ->select ('users.id')
            ->orderBy('employee_demo.employee_name')
            ->get() ;
            foreach ($toRecipients as $newId) {
                $result = DB::table('goals_shared_with')
                ->updateOrInsert(
                    ['goal_id' => $resultrec->id
                    , 'user_id' => $newId->id
                    ],
                    []
                );
            }
        }

        if($request->opt_audience == "byOrg") {
            $selected_org_nodes = $request->selected_org_nodes ? json_decode($request->selected_org_nodes) : [];
            $organizationList = OrganizationTree::select('id', 'organization', 'level1_program', 'level2_division', 'level3_branch', 'level4')
            ->whereIn('id', $selected_org_nodes)
            ->distinct()
            ->orderBy('id')
            ->get();
            foreach($organizationList as $org1) {
                $result = DB::table('goal_bank_orgs')
                ->insert(
                    ['goal_id' => $resultrec->id
                    // , 'version' => '5'
                    , 'version' => '1'
                    , 'organization' => $org1->organization
                    , 'level1_program' => $org1->level1_program
                    , 'level2_division' => $org1->level2_division
                    , 'level3_branch' => $org1->level3_branch
                    , 'level4' => $org1->level4
                    , 'created_at' => date('Y-m-d H:i:s')
                    , 'updated_at' => date('Y-m-d H:i:s') ],
                );
                if(!$result){
                    break;
                }
            }
        }
        return redirect()->route('hradmin.goalbank.createindex')
            ->with('success', 'Create new goal bank successful.');
    }

    public function loadOrganizationTree(Request $request) {

        $level0 = $request->dd_level0 ? OrganizationTree::where('id', $request->dd_level0)->first() : null;
        $level1 = $request->dd_level1 ? OrganizationTree::where('id', $request->dd_level1)->first() : null;
        $level2 = $request->dd_level2 ? OrganizationTree::where('id', $request->dd_level2)->first() : null;
        $level3 = $request->dd_level3 ? OrganizationTree::where('id', $request->dd_level3)->first() : null;
        $level4 = $request->dd_level4 ? OrganizationTree::where('id', $request->dd_level4)->first() : null;

        list($sql_level0, $sql_level1, $sql_level2, $sql_level3, $sql_level4) = 
            $this->baseFilteredSQLs($request, $level0, $level1, $level2, $level3, $level4);
        
        $rows = $sql_level4->groupBy('organization_trees.id')->select('organization_trees.id')
            ->union( $sql_level3->groupBy('organization_trees.id')->select('organization_trees.id') )
            ->union( $sql_level2->groupBy('organization_trees.id')->select('organization_trees.id') )
            ->union( $sql_level1->groupBy('organization_trees.id')->select('organization_trees.id') )
            ->union( $sql_level0->groupBy('organization_trees.id')->select('organization_trees.id') )
            ->pluck('organization_trees.id'); 
        $orgs = OrganizationTree::whereIn('id', $rows->toArray() )->get()->toTree();

        // Employee Count by Organization
        $countByOrg = $sql_level4->groupBy('organization_trees.id')->select('organization_trees.id', DB::raw("COUNT(*) as count_row"))
        ->union( $sql_level3->groupBy('organization_trees.id')->select('organization_trees.id', DB::raw("COUNT(*) as count_row")) )
        ->union( $sql_level2->groupBy('organization_trees.id')->select('organization_trees.id', DB::raw("COUNT(*) as count_row")) )
        ->union( $sql_level1->groupBy('organization_trees.id')->select('organization_trees.id', DB::raw("COUNT(*) as count_row")) )
        ->union( $sql_level0->groupBy('organization_trees.id')->select('organization_trees.id', DB::raw("COUNT(*) as count_row") ) )
        ->pluck('count_row', 'organization_trees.id');  
        
        // // Employee ID by Tree ID
        $empIdsByOrgId = [];
        $demoWhere = $this->baseFilteredWhere($request, $level0, $level1, $level2, $level3, $level4);
        $sql = clone $demoWhere; 
        $rows = $sql->join('organization_trees', function($join) use($request) {
                $join->on('employee_demo.organization', '=', 'organization_trees.organization')
                    ->on('employee_demo.level1_program', '=', 'organization_trees.level1_program')
                    ->on('employee_demo.level2_division', '=', 'organization_trees.level2_division')
                    ->on('employee_demo.level3_branch', '=', 'organization_trees.level3_branch')
                    ->on('employee_demo.level4', '=', 'organization_trees.level4');
                })
                ->select('organization_trees.id','employee_demo.employee_id')
                ->groupBy('organization_trees.id', 'employee_demo.employee_id')
                ->orderBy('organization_trees.id')->orderBy('employee_demo.employee_id')
                ->get();

        $empIdsByOrgId = $rows->groupBy('id')->all();

        if($request->ajax()){
            return view('hradmin.goalbank.partials.recipient-tree', compact('orgs','countByOrg','empIdsByOrgId') );
        } 

    }


    public function eloadOrganizationTree(Request $request) {

        $elevel0 = $request->edd_level0 ? OrganizationTree::where('id', $request->edd_level0)->first() : null;
        $elevel1 = $request->edd_level1 ? OrganizationTree::where('id', $request->edd_level1)->first() : null;
        $elevel2 = $request->edd_level2 ? OrganizationTree::where('id', $request->edd_level2)->first() : null;
        $elevel3 = $request->edd_level3 ? OrganizationTree::where('id', $request->edd_level3)->first() : null;
        $elevel4 = $request->edd_level4 ? OrganizationTree::where('id', $request->edd_level4)->first() : null;

            list($esql_level0, $esql_level1, $esql_level2, $esql_level3, $esql_level4) = 
                $this->ebaseFilteredSQLs($request, $elevel0, $elevel1, $elevel2, $elevel3, $elevel4);
            
            $rows = $esql_level4->groupBy('organization_trees.id')->select('organization_trees.id')
                ->union( $esql_level3->groupBy('organization_trees.id')->select('organization_trees.id') )
                ->union( $esql_level2->groupBy('organization_trees.id')->select('organization_trees.id') )
                ->union( $esql_level1->groupBy('organization_trees.id')->select('organization_trees.id') )
                ->union( $esql_level0->groupBy('organization_trees.id')->select('organization_trees.id') )
                ->pluck('organization_trees.id'); 

            $eorgs = OrganizationTree::whereIn('id', $rows->toArray() )->get()->toTree();
            
            $eempIdsByOrgId = [];
            $eempIdsByOrgId = $rows->groupBy('id')->all();

        if($request->ajax()){
            return view('hradmin.goalbank.partials.recipient-tree2', compact('eorgs','eempIdsByOrgId') );
        } 
    
    }

  
    public function getDatatableEmployees(Request $request) {


        if($request->ajax()){

            $level0 = $request->dd_level0 ? OrganizationTree::where('id', $request->dd_level0)->first() : null;
            $level1 = $request->dd_level1 ? OrganizationTree::where('id', $request->dd_level1)->first() : null;
            $level2 = $request->dd_level2 ? OrganizationTree::where('id', $request->dd_level2)->first() : null;
            $level3 = $request->dd_level3 ? OrganizationTree::where('id', $request->dd_level3)->first() : null;
            $level4 = $request->dd_level4 ? OrganizationTree::where('id', $request->dd_level4)->first() : null;
    
            $demoWhere = $this->baseFilteredWhere($request, $level0, $level1, $level2, $level3, $level4);

            $sql = clone $demoWhere; 

            $employees = $sql->select([ 
                'employee_id'
                , 'employee_name'
                , 'job_title'
                , 'employee_email'
                , 'employee_demo.organization'
                , 'employee_demo.level1_program'
                , 'employee_demo.level2_division'
                , 'employee_demo.level3_branch'
                , 'employee_demo.level4'
                , 'employee_demo.deptid']);

            return Datatables::of($employees)
                ->addColumn('select_users', static function ($employee) {
                        return '<input pid="1335" type="checkbox" id="userCheck'. 
                            $employee->employee_id .'" name="userCheck[]" value="'. $employee->employee_id .'" class="dt-body-center">';
                })->rawColumns(['select_users','action'])
                ->make(true);
        }
    }


    public function addnewgoal(Request $request) 
    {
        $selected_org_nodes = $request->selected_org_nodes ? json_decode($request->selected_org_nodes) : [];
        $current_user = User::find(Auth::id());

            $organizationList = OrganizationTree::select('id', 'organization', 'level1_program', 'level2_division', 'level3_branch', 'level4')
            ->whereIn('id', $selected_org_nodes)
            ->distinct()
            ->orderBy('id')
            ->get();

            $resultrec = Goal::create(
                ['goal_type_id' => $request->input('goal_type_id')
                , 'is_library' => true
                , 'is_shared' => true
                , 'title' => $request->input('title')
                , 'what' => $request->input('what')
                , 'measure_of_success' => $request->input('measure_of_success')
                , 'start_date' => $request->input('start_date')
                , 'target_date' => $request->input('target_date')
                , 'measure_of_success' => $request->input('measure_of_success')
                , 'user_id' => $current_user->id
                , 'created_by' => $current_user->id
                ]
            );

            $resultrec->tags()->sync($request->tag_ids);
    
            foreach($organizationList as $org1) {
                $result = DB::table('goal_bank_orgs')
                ->insert(
                    ['goal_id' => $resultrec->id
                    // , 'version' => '5'
                    , 'version' => '1'
                    , 'organization' => $org1->organization
                    , 'level1_program' => $org1->level1_program
                    , 'level2_division' => $org1->level2_division
                    , 'level3_branch' => $org1->level3_branch
                    , 'level4' => $org1->level4
                    , 'created_at' => date('Y-m-d H:i:s')
                    , 'updated_at' => date('Y-m-d H:i:s') ],
                );
                if(!$result){
                    break;
                }
            }

        return redirect()->route('hradmin.goalbank.index')
            ->with('success', 'Add new goal successful.');
    }

    public function updategoal(CreateGoalRequest $request) 
    {
        $selected_org_nodes = $request->selected_org_nodes ? json_decode($request->selected_org_nodes) : [];
        $current_user = Auth::id();

            $organizationList = OrganizationTree::select('id', 'organization', 'level1_program', 'level2_division', 'level3_branch', 'level4')
            ->whereIn('id', $selected_org_nodes)
            ->distinct()
            ->orderBy('id')
            ->get();

            $resultrec = Goal::withoutGlobalScopes()->findorfail( $request->goal_id );
            $resultrec->update(
                ['goal_type_id' => $request->input('goal_type_id')
                , 'title' => $request->input('title')
                , 'what' => $request->input('what')
                , 'measure_of_success' => $request->input('measure_of_success')
                , 'start_date' => $request->input('start_date')
                , 'target_date' => $request->input('target_date')
                , 'measure_of_success' => $request->input('measure_of_success')
                ]
            );

            $resultrec->tags()->sync($request->tag_ids);
    
            foreach($organizationList as $org1) {
                $result = DB::table('goal_bank_orgs')
                ->updateorinsert(
                    ['goal_id' => $resultrec->id
                    , 'organization' => $org1->organization
                    , 'level1_program' => $org1->level1_program
                    , 'level2_division' => $org1->level2_division
                    , 'level3_branch' => $org1->level3_branch
                    , 'level4' => $org1->level4
                    ],
                );
                if(!$result){
                    break;
                }
            }

        return redirect()->route('hradmin.goalbank.manageindex')
            ->with('success', 'Goal update successful.');

    }

    public function updategoalone(CreateGoalRequest $request) 
    {
        $selected_emp_ids = $request->selected_emp_ids ? json_decode($request->selected_emp_ids) : [];
        $request->userCheck = $selected_emp_ids;
        $selected_org_nodes = $request->selected_org_nodes ? json_decode($request->selected_org_nodes) : [];
        $current_user = Auth::id();

        $resultrec = Goal::withoutGlobalScopes()->findorfail( $request->goal_id );
        $resultrec->update(
            ['goal_type_id' => $request->input('goal_type_id')
            , 'title' => $request->input('title')
            , 'what' => $request->input('what')
            , 'measure_of_success' => $request->input('measure_of_success')
            , 'start_date' => $request->input('start_date')
            , 'target_date' => $request->input('target_date')
            , 'measure_of_success' => $request->input('measure_of_success')
            ]
        );

        $resultrec->tags()->sync($request->tag_ids);

        $employee_ids = ($request->userCheck) ? $request->userCheck : [];

        $toRecipients = EmployeeDemo::select('users.id')
        ->join('users', 'employee_demo.guid', 'users.guid')
        ->whereIn('employee_demo.employee_id', $selected_emp_ids )
        ->distinct()
        ->select ('users.id')
        ->orderBy('employee_demo.employee_name')
        ->get() ;

        foreach ($toRecipients as $newId) {
            $result = DB::table('goals_shared_with')
            ->updateOrInsert(
                ['goal_id' => $resultrec->id
                , 'user_id' => $newId->id
                ],
                []
            );
        }

        return redirect()->route('hradmin.goalbank.manageindex')
            ->with('success', 'Goal update successful.');

    }

   public function getUsers(Request $request)
    {

        $search = $request->search;
        $users =  User::whereRaw("lower(name) like '%". strtolower($search)."%'")
                    ->whereNotNull('email')->paginate();

        return ['data'=> $users];
    }


    public function getOrganizations(Request $request) {

        $orgs = OrganizationTree::join('admin_orgs', function($join) {
            $join->on('organization_trees.organization', '=', 'admin_orgs.organization')
            ->on('organization_trees.level1_program', '=', 'admin_orgs.level1_program')
            ->on('organization_trees.level2_division', '=', 'admin_orgs.level2_division')
            ->on('organization_trees.level3_branch', '=', 'admin_orgs.level3_branch')
            ->on('organization_trees.level4', '=', 'admin_orgs.level4');
        })
        ->where('admin_orgs.user_id', '=', Auth::id())
        ->orderby('organization_trees.name','asc')->select('organization_trees.id','organization_trees.name')
        ->where('organization_trees.level',0)
        ->when( $request->q , function ($q) use($request) {
            return $q->whereRaw("LOWER(name) LIKE '%" . strtolower($request->q) . "%'");
        })
        ->get();

        $formatted_orgs = [];
        foreach ($orgs as $org) {
            $formatted_orgs[] = ['id' => $org->id, 'text' => $org->name ];
        }

        return response()->json($formatted_orgs);
    } 

    public function egetOrganizations(Request $request) {

        $eorgs = OrganizationTree::join('admin_orgs', function($join) {
            $join->on('organization_trees.organization', '=', 'admin_orgs.organization')
            ->on('organization_trees.level1_program', '=', 'admin_orgs.level1_program')
            ->on('organization_trees.level2_division', '=', 'admin_orgs.level2_division')
            ->on('organization_trees.level3_branch', '=', 'admin_orgs.level3_branch')
            ->on('organization_trees.level4', '=', 'admin_orgs.level4');
        })
        ->where('admin_orgs.user_id', '=', Auth::id())
        ->orderby('organization_trees.name','asc')->select('organization_trees.id','organization_trees.name')
        ->where('organization_trees.level',0)
        ->when( $request->q , function ($q) use($request) {
            return $q->whereRaw("LOWER(name) LIKE '%" . strtolower($request->q) . "%'");
        })
        ->get();

        $eformatted_orgs = [];
        foreach ($eorgs as $org) {
            $eformatted_orgs[] = ['id' => $org->id, 'text' => $org->name ];
        }

        return response()->json($eformatted_orgs);
    } 

    public function getPrograms(Request $request) {

        $level0 = $request->level0 ? OrganizationTree::join('admin_orgs', function($join) {
            $join->on('organization_trees.organization', '=', 'admin_orgs.organization')
            ->on('organization_trees.level1_program', '=', 'admin_orgs.level1_program')
            ->on('organization_trees.level2_division', '=', 'admin_orgs.level2_division')
            ->on('organization_trees.level3_branch', '=', 'admin_orgs.level3_branch')
            ->on('organization_trees.level4', '=', 'admin_orgs.level4');
        })
        ->where('admin_orgs.user_id', '=', Auth::id())
        ->where('organization_trees.id',$request->level0)->first() : null;

        $orgs = OrganizationTree::join('admin_orgs', function($join) {
            $join->on('organization_trees.organization', '=', 'admin_orgs.organization')
            ->on('organization_trees.level1_program', '=', 'admin_orgs.level1_program')
            ->on('organization_trees.level2_division', '=', 'admin_orgs.level2_division')
            ->on('organization_trees.level3_branch', '=', 'admin_orgs.level3_branch')
            ->on('organization_trees.level4', '=', 'admin_orgs.level4');
        })
        ->where('admin_orgs.user_id', '=', Auth::id())
        ->orderby('organization_trees.name','asc')->select(DB::raw('min(organization_trees.id) as id'),'organization_trees.name')
        ->where('organization_trees.level',1)
        ->when( $request->q , function ($q) use($request) {
            return $q->whereRaw("LOWER(organization_trees.name) LIKE '%" . strtolower($request->q) . "%'");
            })
        ->when( $level0 , function ($q) use($level0) {
            return $q->where('organization_trees.organization', $level0->name );
        })
        ->groupBy('organization_trees.name')
        ->get();

        $formatted_orgs = [];
        foreach ($orgs as $org) {
            $formatted_orgs[] = ['id' => $org->id, 'text' => $org->name ];
        }

        return response()->json($formatted_orgs);
    } 

    public function egetPrograms(Request $request) {

        $elevel0 = $request->elevel0 ? OrganizationTree::join('admin_orgs', function($join) {
            $join->on('organization_trees.organization', '=', 'admin_orgs.organization')
            ->on('organization_trees.level1_program', '=', 'admin_orgs.level1_program')
            ->on('organization_trees.level2_division', '=', 'admin_orgs.level2_division')
            ->on('organization_trees.level3_branch', '=', 'admin_orgs.level3_branch')
            ->on('organization_trees.level4', '=', 'admin_orgs.level4');
        })
        ->where('admin_orgs.user_id', '=', Auth::id())
        ->where('organization_trees.id',$request->elevel0)->first() : null;

        $eorgs = OrganizationTree::join('admin_orgs', function($join) {
            $join->on('organization_trees.organization', '=', 'admin_orgs.organization')
            ->on('organization_trees.level1_program', '=', 'admin_orgs.level1_program')
            ->on('organization_trees.level2_division', '=', 'admin_orgs.level2_division')
            ->on('organization_trees.level3_branch', '=', 'admin_orgs.level3_branch')
            ->on('organization_trees.level4', '=', 'admin_orgs.level4');
        })
        ->where('admin_orgs.user_id', '=', Auth::id())
        ->orderby('organization_trees.name','asc')->select(DB::raw('min(organization_trees.id) as id'),'organization_trees.name')
            ->where('organization_trees.level',1)
            ->when( $request->q , function ($q) use($request) {
                return $q->whereRaw("LOWER(organization_trees.name) LIKE '%" . strtolower($request->q) . "%'");
                })
            ->when( $elevel0 , function ($q) use($elevel0) {
                return $q->where('organization_trees.organization', $elevel0->name );
            })
            ->groupBy('organization_trees.name')
            ->get();

        $eformatted_orgs = [];
        foreach ($eorgs as $org) {
            $eformatted_orgs[] = ['id' => $org->id, 'text' => $org->name ];
        }

        return response()->json($eformatted_orgs);
    } 

    public function getDivisions(Request $request) {

        $level0 = $request->level0 ? OrganizationTree::join('admin_orgs', function($join) {
            $join->on('organization_trees.organization', '=', 'admin_orgs.organization')
            ->on('organization_trees.level1_program', '=', 'admin_orgs.level1_program')
            ->on('organization_trees.level2_division', '=', 'admin_orgs.level2_division')
            ->on('organization_trees.level3_branch', '=', 'admin_orgs.level3_branch')
            ->on('organization_trees.level4', '=', 'admin_orgs.level4');
        })
        ->where('admin_orgs.user_id', '=', Auth::id())
        ->where('organization_trees.id', $request->level0)->first() : null;
        $level1 = $request->level1 ? OrganizationTree::join('admin_orgs', function($join) {
            $join->on('organization_trees.organization', '=', 'admin_orgs.organization')
            ->on('organization_trees.level1_program', '=', 'admin_orgs.level1_program')
            ->on('organization_trees.level2_division', '=', 'admin_orgs.level2_division')
            ->on('organization_trees.level3_branch', '=', 'admin_orgs.level3_branch')
            ->on('organization_trees.level4', '=', 'admin_orgs.level4');
        })
        ->where('admin_orgs.user_id', '=', Auth::id())
        ->where('organization_trees.id', $request->level1)->first() : null;

        $orgs = OrganizationTree::join('admin_orgs', function($join) {
            $join->on('organization_trees.organization', '=', 'admin_orgs.organization')
            ->on('organization_trees.level1_program', '=', 'admin_orgs.level1_program')
            ->on('organization_trees.level2_division', '=', 'admin_orgs.level2_division')
            ->on('organization_trees.level3_branch', '=', 'admin_orgs.level3_branch')
            ->on('organization_trees.level4', '=', 'admin_orgs.level4');
        })
        ->where('admin_orgs.user_id', '=', Auth::id())
        ->orderby('organization_trees.name','asc')->select(DB::raw('min(organization_trees.id) as id'),'organization_trees.name')
            ->where('organization_trees.level',2)
            ->when( $request->q , function ($q) use($request) {
                return $q->whereRaw("LOWER(organization_trees.name) LIKE '%" . strtolower($request->q) . "%'");
                })
            ->when( $level0 , function ($q) use($level0) {
                return $q->where('organization_trees.organization', $level0->name) ;
            })
            ->when( $level1 , function ($q) use($level1) {
                return $q->where('organization_trees.level1_program', $level1->name );
            })
            ->groupBy('organization_trees.name')
            ->limit(300)
            ->get();

        $formatted_orgs = [];
        foreach ($orgs as $org) {
            $formatted_orgs[] = ['id' => $org->id, 'text' => $org->name ];
        }

        return response()->json($formatted_orgs);
    } 

    public function egetDivisions(Request $request) {

        $elevel0 = $request->elevel0 ? OrganizationTree::join('admin_orgs', function($join) {
            $join->on('organization_trees.organization', '=', 'admin_orgs.organization')
            ->on('organization_trees.level1_program', '=', 'admin_orgs.level1_program')
            ->on('organization_trees.level2_division', '=', 'admin_orgs.level2_division')
            ->on('organization_trees.level3_branch', '=', 'admin_orgs.level3_branch')
            ->on('organization_trees.level4', '=', 'admin_orgs.level4');
        })
        ->where('admin_orgs.user_id', '=', Auth::id())
        ->where('organization_trees.id', $request->elevel0)->first() : null;
        $elevel1 = $request->elevel1 ? OrganizationTree::join('admin_orgs', function($join) {
            $join->on('organization_trees.organization', '=', 'admin_orgs.organization')
            ->on('organization_trees.level1_program', '=', 'admin_orgs.level1_program')
            ->on('organization_trees.level2_division', '=', 'admin_orgs.level2_division')
            ->on('organization_trees.level3_branch', '=', 'admin_orgs.level3_branch')
            ->on('organization_trees.level4', '=', 'admin_orgs.level4');
        })
        ->where('admin_orgs.user_id', '=', Auth::id())
        ->where('organization_trees.id', $request->elevel1)->first() : null;

        $eorgs = OrganizationTree::join('admin_orgs', function($join) {
            $join->on('organization_trees.organization', '=', 'admin_orgs.organization')
            ->on('organization_trees.level1_program', '=', 'admin_orgs.level1_program')
            ->on('organization_trees.level2_division', '=', 'admin_orgs.level2_division')
            ->on('organization_trees.level3_branch', '=', 'admin_orgs.level3_branch')
            ->on('organization_trees.level4', '=', 'admin_orgs.level4');
        })
        ->where('admin_orgs.user_id', '=', Auth::id())
        ->orderby('organization_trees.name','asc')->select(DB::raw('min(organization_trees.id) as id'),'organization_trees.name')
            ->where('organization_trees.level',2)
            ->when( $request->q , function ($q) use($request) {
                return $q->whereRaw("LOWER(organization_trees.name) LIKE '%" . strtolower($request->q) . "%'");
                })
            ->when( $elevel0 , function ($q) use($elevel0) {
                return $q->where('organization_trees.organization', $elevel0->name) ;
            })
            ->when( $elevel1 , function ($q) use($elevel1) {
                return $q->where('organization_trees.level1_program', $elevel1->name );
            })
            ->groupBy('organization_trees.name')
            ->limit(300)
            ->get();

        $eformatted_orgs = [];
        foreach ($eorgs as $org) {
            $eformatted_orgs[] = ['id' => $org->id, 'text' => $org->name ];
        }

        return response()->json($eformatted_orgs);
    } 

    public function getBranches(Request $request) {

        $level0 = $request->level0 ? OrganizationTree::join('admin_orgs', function($join) {
            $join->on('organization_trees.organization', '=', 'admin_orgs.organization')
            ->on('organization_trees.level1_program', '=', 'admin_orgs.level1_program')
            ->on('organization_trees.level2_division', '=', 'admin_orgs.level2_division')
            ->on('organization_trees.level3_branch', '=', 'admin_orgs.level3_branch')
            ->on('organization_trees.level4', '=', 'admin_orgs.level4');
        })
        ->where('admin_orgs.user_id', '=', Auth::id())
        ->where('id', $request->level0)->first() : null;
        $level1 = $request->level1 ? OrganizationTree::join('admin_orgs', function($join) {
            $join->on('organization_trees.organization', '=', 'admin_orgs.organization')
            ->on('organization_trees.level1_program', '=', 'admin_orgs.level1_program')
            ->on('organization_trees.level2_division', '=', 'admin_orgs.level2_division')
            ->on('organization_trees.level3_branch', '=', 'admin_orgs.level3_branch')
            ->on('organization_trees.level4', '=', 'admin_orgs.level4');
        })
        ->where('admin_orgs.user_id', '=', Auth::id())
        ->where('organization_trees.id', $request->level1)->first() : null;
        $level2 = $request->level2 ? OrganizationTree::join('admin_orgs', function($join) {
            $join->on('organization_trees.organization', '=', 'admin_orgs.organization')
            ->on('organization_trees.level1_program', '=', 'admin_orgs.level1_program')
            ->on('organization_trees.level2_division', '=', 'admin_orgs.level2_division')
            ->on('organization_trees.level3_branch', '=', 'admin_orgs.level3_branch')
            ->on('organization_trees.level4', '=', 'admin_orgs.level4');
        })
        ->where('admin_orgs.user_id', '=', Auth::id())
        ->where('organization_trees.id', $request->level2)->first() : null;

        $orgs = OrganizationTree::join('admin_orgs', function($join) {
            $join->on('organization_trees.organization', '=', 'admin_orgs.organization')
            ->on('organization_trees.level1_program', '=', 'admin_orgs.level1_program')
            ->on('organization_trees.level2_division', '=', 'admin_orgs.level2_division')
            ->on('organization_trees.level3_branch', '=', 'admin_orgs.level3_branch')
            ->on('organization_trees.level4', '=', 'admin_orgs.level4');
        })
        ->where('admin_orgs.user_id', '=', Auth::id())
        ->orderby('organization_trees.name','asc')->select(DB::raw('min(organization_trees.id) as id'),'organization_trees.name')
            ->where('organization_trees.level',3)
            ->when( $request->q , function ($q) use($request) {
                return $q->whereRaw("LOWER(organization_trees.name) LIKE '%" . strtolower($request->q) . "%'");
                })
            ->when( $level0 , function ($q) use($level0) {
                return $q->where('organization_trees.organization', $level0->name) ;
            })
            ->when( $level1 , function ($q) use($level1) {
                return $q->where('organization_trees.level1_program', $level1->name );
            })
            ->when( $level2 , function ($q) use($level2) {
                return $q->where('organization_trees.level2_division', $level2->name );
            })
            ->groupBy('organization_trees.name')
            ->limit(300)
            ->get();

        $formatted_orgs = [];
        foreach ($orgs as $org) {
            $formatted_orgs[] = ['id' => $org->id, 'text' => $org->name ];
        }

        return response()->json($formatted_orgs);
    } 

    public function egetBranches(Request $request) {
        $elevel0 = $request->elevel0 ? OrganizationTree::join('admin_orgs', function($join) {
            $join->on('organization_trees.organization', '=', 'admin_orgs.organization')
            ->on('organization_trees.level1_program', '=', 'admin_orgs.level1_program')
            ->on('organization_trees.level2_division', '=', 'admin_orgs.level2_division')
            ->on('organization_trees.level3_branch', '=', 'admin_orgs.level3_branch')
            ->on('organization_trees.level4', '=', 'admin_orgs.level4');
        })
        ->where('admin_orgs.user_id', '=', Auth::id())
        ->where('organization_trees.id', $request->elevel0)->first() : null;
        $elevel1 = $request->elevel1 ? OrganizationTree::join('admin_orgs', function($join) {
            $join->on('organization_trees.organization', '=', 'admin_orgs.organization')
            ->on('organization_trees.level1_program', '=', 'admin_orgs.level1_program')
            ->on('organization_trees.level2_division', '=', 'admin_orgs.level2_division')
            ->on('organization_trees.level3_branch', '=', 'admin_orgs.level3_branch')
            ->on('organization_trees.level4', '=', 'admin_orgs.level4');
        })
        ->where('admin_orgs.user_id', '=', Auth::id())
        ->where('organization_trees.id', $request->elevel1)->first() : null;
        $elevel2 = $request->elevel2 ? OrganizationTree::join('admin_orgs', function($join) {
            $join->on('organization_trees.organization', '=', 'admin_orgs.organization')
            ->on('organization_trees.level1_program', '=', 'admin_orgs.level1_program')
            ->on('organization_trees.level2_division', '=', 'admin_orgs.level2_division')
            ->on('organization_trees.level3_branch', '=', 'admin_orgs.level3_branch')
            ->on('organization_trees.level4', '=', 'admin_orgs.level4');
        })
        ->where('admin_orgs.user_id', '=', Auth::id())
        ->where('organization_trees.id', $request->elevel2)->first() : null;

        $eorgs = OrganizationTree::join('admin_orgs', function($join) {
            $join->on('organization_trees.organization', '=', 'admin_orgs.organization')
            ->on('organization_trees.level1_program', '=', 'admin_orgs.level1_program')
            ->on('organization_trees.level2_division', '=', 'admin_orgs.level2_division')
            ->on('organization_trees.level3_branch', '=', 'admin_orgs.level3_branch')
            ->on('organization_trees.level4', '=', 'admin_orgs.level4');
        })
        ->where('admin_orgs.user_id', '=', Auth::id())
        ->orderby('organization_trees.name','asc')->select(DB::raw('min(organization_trees.id) as id'),'organization_trees.name')
            ->where('organization_trees.level',3)
            ->when( $request->q , function ($q) use($request) {
                return $q->whereRaw("LOWER(organization_trees.name) LIKE '%" . strtolower($request->q) . "%'");
                })
            ->when( $elevel0 , function ($q) use($elevel0) {
                return $q->where('organization_trees.organization', $elevel0->name) ;
            })
            ->when( $elevel1 , function ($q) use($elevel1) {
                return $q->where('organization_trees.level1_program', $elevel1->name );
            })
            ->when( $elevel2 , function ($q) use($elevel2) {
                return $q->where('organization_trees.level2_division', $elevel2->name );
            })
            ->groupBy('organization_trees.name')
            ->limit(300)
            ->get();

        $eformatted_orgs = [];
        foreach ($eorgs as $org) {
            $eformatted_orgs[] = ['id' => $org->id, 'text' => $org->name ];
        }

        return response()->json($eformatted_orgs);
    } 

    public function getLevel4(Request $request) {
        $level0 = $request->level0 ? OrganizationTree::join('admin_orgs', function($join) {
            $join->on('organization_trees.organization', '=', 'admin_orgs.organization')
            ->on('organization_trees.level1_program', '=', 'admin_orgs.level1_program')
            ->on('organization_trees.level2_division', '=', 'admin_orgs.level2_division')
            ->on('organization_trees.level3_branch', '=', 'admin_orgs.level3_branch')
            ->on('organization_trees.level4', '=', 'admin_orgs.level4');
        })
        ->where('admin_orgs.user_id', '=', Auth::id())
        ->where('organization_trees.id', $request->level0)->first() : null;
        $level1 = $request->level1 ? OrganizationTree::join('admin_orgs', function($join) {
            $join->on('organization_trees.organization', '=', 'admin_orgs.organization')
            ->on('organization_trees.level1_program', '=', 'admin_orgs.level1_program')
            ->on('organization_trees.level2_division', '=', 'admin_orgs.level2_division')
            ->on('organization_trees.level3_branch', '=', 'admin_orgs.level3_branch')
            ->on('organization_trees.level4', '=', 'admin_orgs.level4');
        })
        ->where('admin_orgs.user_id', '=', Auth::id())
        ->where('organization_trees.id', $request->level1)->first() : null;
        $level2 = $request->level2 ? OrganizationTree::join('admin_orgs', function($join) {
            $join->on('organization_trees.organization', '=', 'admin_orgs.organization')
            ->on('organization_trees.level1_program', '=', 'admin_orgs.level1_program')
            ->on('organization_trees.level2_division', '=', 'admin_orgs.level2_division')
            ->on('organization_trees.level3_branch', '=', 'admin_orgs.level3_branch')
            ->on('organization_trees.level4', '=', 'admin_orgs.level4');
        })
        ->where('admin_orgs.user_id', '=', Auth::id())
        ->where('organization_trees.id', $request->level2)->first() : null;
        $level3 = $request->level3 ? OrganizationTree::join('admin_orgs', function($join) {
            $join->on('organization_trees.organization', '=', 'admin_orgs.organization')
            ->on('organization_trees.level1_program', '=', 'admin_orgs.level1_program')
            ->on('organization_trees.level2_division', '=', 'admin_orgs.level2_division')
            ->on('organization_trees.level3_branch', '=', 'admin_orgs.level3_branch')
            ->on('organization_trees.level4', '=', 'admin_orgs.level4');
        })
        ->where('admin_orgs.user_id', '=', Auth::id())
        ->where('organization_trees.id', $request->level3)->first() : null;

        $orgs = OrganizationTree::join('admin_orgs', function($join) {
            $join->on('organization_trees.organization', '=', 'admin_orgs.organization')
            ->on('organization_trees.level1_program', '=', 'admin_orgs.level1_program')
            ->on('organization_trees.level2_division', '=', 'admin_orgs.level2_division')
            ->on('organization_trees.level3_branch', '=', 'admin_orgs.level3_branch')
            ->on('organization_trees.level4', '=', 'admin_orgs.level4');
        })
        ->where('admin_orgs.user_id', '=', Auth::id())
        ->orderby('organization_trees.name','asc')->select(DB::raw('min(organization_trees.id) as id'),'organization_trees.name')
            ->where('organization_trees.level',4)
            ->when( $request->q , function ($q) use($request) {
                return $q->whereRaw("LOWER(organization_trees.name) LIKE '%" . strtolower($request->q) . "%'");
                })
            ->when( $level0 , function ($q) use($level0) {
                return $q->where('organization_trees.organization', $level0->name) ;
            })
            ->when( $level1 , function ($q) use($level1) {
                return $q->where('organization_trees.level1_program', $level1->name );
            })
            ->when( $level2 , function ($q) use($level2) {
                return $q->where('organization_trees.level2_division', $level2->name );
            })
            ->when( $level3 , function ($q) use($level3) {
                return $q->where('organization_trees.level3_branch', $level3->name );
            })
            ->groupBy('organization_trees.name')
            ->limit(300)
            ->get();

        $formatted_orgs = [];
        foreach ($orgs as $org) {
            $formatted_orgs[] = ['id' => $org->id, 'text' => $org->name ];
        }

        return response()->json($formatted_orgs);
    } 

    public function egetLevel4(Request $request) {
        $elevel0 = $request->elevel0 ? OrganizationTree::join('admin_orgs', function($join) {
            $join->on('organization_trees.organization', '=', 'admin_orgs.organization')
            ->on('organization_trees.level1_program', '=', 'admin_orgs.level1_program')
            ->on('organization_trees.level2_division', '=', 'admin_orgs.level2_division')
            ->on('organization_trees.level3_branch', '=', 'admin_orgs.level3_branch')
            ->on('organization_trees.level4', '=', 'admin_orgs.level4');
        })
        ->where('admin_orgs.user_id', '=', Auth::id())
        ->where('organization_trees.id', $request->elevel0)->first() : null;
        $elevel1 = $request->elevel1 ? OrganizationTree::join('admin_orgs', function($join) {
            $join->on('organization_trees.organization', '=', 'admin_orgs.organization')
            ->on('organization_trees.level1_program', '=', 'admin_orgs.level1_program')
            ->on('organization_trees.level2_division', '=', 'admin_orgs.level2_division')
            ->on('organization_trees.level3_branch', '=', 'admin_orgs.level3_branch')
            ->on('organization_trees.level4', '=', 'admin_orgs.level4');
        })
        ->where('admin_orgs.user_id', '=', Auth::id())
        ->where('organization_trees.id', $request->elevel1)->first() : null;
        $elevel2 = $request->elevel2 ? OrganizationTree::join('admin_orgs', function($join) {
            $join->on('organization_trees.organization', '=', 'admin_orgs.organization')
            ->on('organization_trees.level1_program', '=', 'admin_orgs.level1_program')
            ->on('organization_trees.level2_division', '=', 'admin_orgs.level2_division')
            ->on('organization_trees.level3_branch', '=', 'admin_orgs.level3_branch')
            ->on('organization_trees.level4', '=', 'admin_orgs.level4');
        })
        ->where('admin_orgs.user_id', '=', Auth::id())
        ->where('organization_trees.id', $request->elevel2)->first() : null;
        $elevel3 = $request->elevel3 ? OrganizationTree::join('admin_orgs', function($join) {
            $join->on('organization_trees.organization', '=', 'admin_orgs.organization')
            ->on('organization_trees.level1_program', '=', 'admin_orgs.level1_program')
            ->on('organization_trees.level2_division', '=', 'admin_orgs.level2_division')
            ->on('organization_trees.level3_branch', '=', 'admin_orgs.level3_branch')
            ->on('organization_trees.level4', '=', 'admin_orgs.level4');
        })
        ->where('admin_orgs.user_id', '=', Auth::id())
        ->where('organization_trees.id', $request->elevel3)->first() : null;

        $eorgs = OrganizationTree::join('admin_orgs', function($join) {
            $join->on('organization_trees.organization', '=', 'admin_orgs.organization')
            ->on('organization_trees.level1_program', '=', 'admin_orgs.level1_program')
            ->on('organization_trees.level2_division', '=', 'admin_orgs.level2_division')
            ->on('organization_trees.level3_branch', '=', 'admin_orgs.level3_branch')
            ->on('organization_trees.level4', '=', 'admin_orgs.level4');
        })
        ->where('admin_orgs.user_id', '=', Auth::id())
        ->orderby('organization_trees.name','asc')->select(DB::raw('min(organization_trees.id) as id'),'organization_trees.name')
            ->where('organization_trees.level',4)
            ->when( $request->q , function ($q) use($request) {
                return $q->whereRaw("LOWER(organization_trees.name) LIKE '%" . strtolower($request->q) . "%'");
                })
            ->when( $elevel0 , function ($q) use($elevel0) {
                return $q->where('organization_trees.organization', $elevel0->name) ;
            })
            ->when( $elevel1 , function ($q) use($elevel1) {
                return $q->where('organization_trees.level1_program', $elevel1->name );
            })
            ->when( $elevel2 , function ($q) use($elevel2) {
                return $q->where('organization_trees.level2_division', $elevel2->name );
            })
            ->when( $elevel3 , function ($q) use($elevel3) {
                return $q->where('organization_trees.level3_branch', $elevel3->name );
            })
            ->groupBy('organization_trees.name')
            ->limit(300)
            ->get();

        $eformatted_orgs = [];
        foreach ($eorgs as $org) {
            $eformatted_orgs[] = ['id' => $org->id, 'text' => $org->name ];
        }
        return response()->json($eformatted_orgs);
    } 

    public function getEmployees(Request $request,  $id) {
        $level0 = $request->dd_level0 ? OrganizationTree::where('id', $request->dd_level0)->first() : null;
        $level1 = $request->dd_level1 ? OrganizationTree::where('id', $request->dd_level1)->first() : null;
        $level2 = $request->dd_level2 ? OrganizationTree::where('id', $request->dd_level2)->first() : null;
        $level3 = $request->dd_level3 ? OrganizationTree::where('id', $request->dd_level3)->first() : null;
        $level4 = $request->dd_level4 ? OrganizationTree::where('id', $request->dd_level4)->first() : null;

        list($sql_level0, $sql_level1, $sql_level2, $sql_level3, $sql_level4) = 
            $this->baseFilteredSQLs($request, $level0, $level1, $level2, $level3, $level4);
       
        $rows = $sql_level4->where('organization_trees.id', $id)
            ->union( $sql_level3->where('organization_trees.id', $id) )
            ->union( $sql_level2->where('organization_trees.id', $id) )
            ->union( $sql_level1->where('organization_trees.id', $id) )
            ->union( $sql_level0->where('organization_trees.id', $id) );

        $employees = $rows->get();

        $parent_id = $id;
        
        return view('hradmin.employeeshares.partials.employee', compact('parent_id', 'employees') ); 
    }

    public function egetEmployees(Request $request,  $id) {
        $elevel0 = $request->edd_level0 ? OrganizationTree::where('id', $request->edd_level0)->first() : null;
        $elevel1 = $request->edd_level1 ? OrganizationTree::where('id', $request->edd_level1)->first() : null;
        $elevel2 = $request->edd_level2 ? OrganizationTree::where('id', $request->edd_level2)->first() : null;
        $elevel3 = $request->edd_level3 ? OrganizationTree::where('id', $request->edd_level3)->first() : null;
        $elevel4 = $request->edd_level4 ? OrganizationTree::where('id', $request->edd_level4)->first() : null;

        list($esql_level0, $esql_level1, $esql_level2, $esql_level3, $esql_level4) = 
            $this->ebaseFilteredSQLs($request, $elevel0, $elevel1, $elevel2, $elevel3, $elevel4);
       
        $rows = $esql_level4->where('organization_trees.id', $id)
            ->union( $esql_level3->where('organization_trees.id', $id) )
            ->union( $esql_level2->where('organization_trees.id', $id) )
            ->union( $esql_level1->where('organization_trees.id', $id) )
            ->union( $esql_level0->where('organization_trees.id', $id) );

        $eemployees = $rows->get();

        $parent_id = $id;
        
        return view('hradmin.employeeshares.partials.employee', compact('parent_id', 'employees') ); 
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

    protected function baseFilteredWhere($request, $level0, $level1, $level2, $level3, $level4) {
        // Base Where Clause
        $demoWhere = EmployeeDemo::join('admin_orgs', function($join) {
            $join->on('employee_demo.organization', '=', 'admin_orgs.organization')
            ->on('employee_demo.level1_program', '=', 'admin_orgs.level1_program')
            ->on('employee_demo.level2_division', '=', 'admin_orgs.level2_division')
            ->on('employee_demo.level3_branch', '=', 'admin_orgs.level3_branch')
            ->on('employee_demo.level4', '=', 'admin_orgs.level4');
        })
        ->where('admin_orgs.user_id', '=', Auth::id())
        ->when( $level0, function ($q) use($level0) {
            return $q->where('employee_demo.organization', $level0->name);
        })
        ->when( $level1, function ($q) use($level1) {
            return $q->where('employee_demo.level1_program', $level1->name);
        })
        ->when( $level2, function ($q) use($level2) {
            return $q->where('employee_demo.level2_division', $level2->name);
        })
        ->when( $level3, function ($q) use($level3) {
            return $q->where('employee_demo.level3_branch', $level3->name);
        })
        ->when( $level4, function ($q) use($level4) {
            return $q->where('employee_demo.level4', $level4->name);
        })
        ->when( $request->search_text && $request->criteria == 'all', function ($q) use($request) {
            $q->where(function($query) use ($request) {
                
                return $query->whereRaw("LOWER(employee_demo.employee_id) LIKE '%" . strtolower($request->search_text) . "%'")
                    ->orWhereRaw("LOWER(employee_demo.employee_name) LIKE '%" . strtolower($request->search_text) . "%'")
                    ->orWhereRaw("LOWER(employee_demo.job_title) LIKE '%" . strtolower($request->search_text) . "%'")
                    ->orWhereRaw("LOWER(employee_demo.deptid) LIKE '%" . strtolower($request->search_text) . "%'");
            });
        })
        ->when( $request->search_text && $request->criteria == 'emp', function ($q) use($request) {
            return $q->whereRaw("LOWER(employee_demo.employee_id) LIKE '%" . strtolower($request->search_text) . "%'");
        })
        ->when( $request->search_text && $request->criteria == 'name', function ($q) use($request) {
            return $q->whereRaw("LOWER(employee_demo.employee_name) LIKE '%" . strtolower($request->search_text) . "%'");
        })
        ->when( $request->search_text && $request->criteria == 'job', function ($q) use($request) {
            return $q->whereRaw("LOWER(employee_demo.job_title) LIKE '%" . strtolower($request->search_text) . "%'");
        })
        ->when( $request->search_text && $request->criteria == 'dpt', function ($q) use($request) {
            return $q->whereRaw("LOWER(employee_demo.deptid) LIKE '%" . strtolower($request->search_text) . "%'");
        });

        return $demoWhere;
    }

    protected function ebaseFilteredWhere($request, $elevel0, $elevel1, $elevel2, $elevel3, $elevel4) {
        // Base Where Clause
        $demoWhere = EmployeeDemo::join('admin_orgs', function($join) {
            $join->on('employee_demo.organization', '=', 'admin_orgs.organization')
            ->on('employee_demo.level1_program', '=', 'admin_orgs.level1_program')
            ->on('employee_demo.level2_division', '=', 'admin_orgs.level2_division')
            ->on('employee_demo.level3_branch', '=', 'admin_orgs.level3_branch')
            ->on('employee_demo.level4', '=', 'admin_orgs.level4');
        })
        ->where('admin_orgs.user_id', '=', Auth::id())
        ->when( $elevel0, function ($q) use($elevel0) {
            return $q->where('employee_demo.organization', $elevel0->name);
        })
        ->when( $elevel1, function ($q) use($elevel1) {
            return $q->where('employee_demo.level1_program', $elevel1->name);
        })
        ->when( $elevel2, function ($q) use($elevel2) {
            return $q->where('employee_demo.level2_division', $elevel2->name);
        })
        ->when( $elevel3, function ($q) use($elevel3) {
            return $q->where('employee_demo.level3_branch', $elevel3->name);
        })
        ->when( $elevel4, function ($q) use($elevel4) {
            return $q->where('employee_demo.level4', $elevel4->name);
        });
        return $demoWhere;
    }

    protected function baseFilteredSQLs($request, $level0, $level1, $level2, $level3, $level4) {
        // Base Where Clause
        $demoWhere = $this->baseFilteredWhere($request, $level0, $level1, $level2, $level3, $level4);

        $sql_level0 = clone $demoWhere; 
        $sql_level0->join('organization_trees', function($join) use($level0) {
            $join->on('employee_demo.organization', '=', 'organization_trees.organization')
                ->where('organization_trees.level', '=', 0);
            });
            
        $sql_level1 = clone $demoWhere; 
        $sql_level1->join('organization_trees', function($join) use($level0, $level1) {
            $join->on('employee_demo.organization', '=', 'organization_trees.organization')
                ->on('employee_demo.level1_program', '=', 'organization_trees.level1_program')
                ->where('organization_trees.level', '=', 1);
            });
            
        $sql_level2 = clone $demoWhere; 
        $sql_level2->join('organization_trees', function($join) use($level0, $level1, $level2) {
            $join->on('employee_demo.organization', '=', 'organization_trees.organization')
                ->on('employee_demo.level1_program', '=', 'organization_trees.level1_program')
                ->on('employee_demo.level2_division', '=', 'organization_trees.level2_division')
                ->where('organization_trees.level', '=', 2);    
            });    
            
        $sql_level3 = clone $demoWhere; 
        $sql_level3->join('organization_trees', function($join) use($level0, $level1, $level2, $level3) {
            $join->on('employee_demo.organization', '=', 'organization_trees.organization')
                ->on('employee_demo.level1_program', '=', 'organization_trees.level1_program')
                ->on('employee_demo.level2_division', '=', 'organization_trees.level2_division')
                ->on('employee_demo.level3_branch', '=', 'organization_trees.level3_branch')
                ->where('organization_trees.level', '=', 3);    
            });
            
        $sql_level4 = clone $demoWhere; 
        $sql_level4->join('organization_trees', function($join) use($level0, $level1, $level2, $level3, $level4) {
            $join->on('employee_demo.organization', '=', 'organization_trees.organization')
                ->on('employee_demo.level1_program', '=', 'organization_trees.level1_program')
                ->on('employee_demo.level2_division', '=', 'organization_trees.level2_division')
                ->on('employee_demo.level3_branch', '=', 'organization_trees.level3_branch')
                ->on('employee_demo.level4', '=', 'organization_trees.level4')
                ->where('organization_trees.level', '=', 4);
            });
        return  [$sql_level0, $sql_level1, $sql_level2, $sql_level3, $sql_level4];
    }

    protected function ebaseFilteredSQLs($request, $elevel0, $elevel1, $elevel2, $elevel3, $elevel4) {
        // Base Where Clause
        $demoWhere = $this->ebaseFilteredWhere($request, $elevel0, $elevel1, $elevel2, $elevel3, $elevel4);

        $esql_level0 = clone $demoWhere; 
        $esql_level0->join('organization_trees', function($join) use($elevel0) {
            $join->on('employee_demo.organization', '=', 'organization_trees.organization')
                ->where('organization_trees.level', '=', 0);
            });
            
        $esql_level1 = clone $demoWhere; 
        $esql_level1->join('organization_trees', function($join) use($elevel0, $elevel1) {
            $join->on('employee_demo.organization', '=', 'organization_trees.organization')
                ->on('employee_demo.level1_program', '=', 'organization_trees.level1_program')
                ->where('organization_trees.level', '=', 1);
            });
            
        $esql_level2 = clone $demoWhere; 
        $esql_level2->join('organization_trees', function($join) use($elevel0, $elevel1, $elevel2) {
            $join->on('employee_demo.organization', '=', 'organization_trees.organization')
                ->on('employee_demo.level1_program', '=', 'organization_trees.level1_program')
                ->on('employee_demo.level2_division', '=', 'organization_trees.level2_division')
                ->where('organization_trees.level', '=', 2);    
            });    
            
        $esql_level3 = clone $demoWhere; 
        $esql_level3->join('organization_trees', function($join) use($elevel0, $elevel1, $elevel2, $elevel3) {
            $join->on('employee_demo.organization', '=', 'organization_trees.organization')
                ->on('employee_demo.level1_program', '=', 'organization_trees.level1_program')
                ->on('employee_demo.level2_division', '=', 'organization_trees.level2_division')
                ->on('employee_demo.level3_branch', '=', 'organization_trees.level3_branch')
                ->where('organization_trees.level', '=', 3);    
            });
            
        $esql_level4 = clone $demoWhere; 
        $esql_level4->join('organization_trees', function($join) use($elevel0, $elevel1, $elevel2, $elevel3, $elevel4) {
            $join->on('employee_demo.organization', '=', 'organization_trees.organization')
                ->on('employee_demo.level1_program', '=', 'organization_trees.level1_program')
                ->on('employee_demo.level2_division', '=', 'organization_trees.level2_division')
                ->on('employee_demo.level3_branch', '=', 'organization_trees.level3_branch')
                ->on('employee_demo.level4', '=', 'organization_trees.level4')
                ->where('organization_trees.level', '=', 4);
            });

        return  [$esql_level0, $esql_level1, $esql_level2, $esql_level3, $esql_level4];
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manageindex(Request $request)
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

        $criteriaList = array(
            'all' => 'All',
            'gt' => 'Goal Title', 
            'cby'=> 'Created By',
        );

        return view('hradmin.goalbank.manageindex', compact ('request', 'criteriaList'));
    }

    public function managegetList(Request $request) {
        if ($request->ajax()) {
            $query = Goal::withoutGlobalScopes()
            ->join('users', 'goals.user_id', '=', 'users.id')
            ->leftjoin('employee_demo', 'users.guid', '=', 'employee_demo.guid')
            ->join('admin_orgs', function($join) {
                $join->on('employee_demo.organization', '=', 'admin_orgs.organization')
                ->on('employee_demo.level1_program', '=', 'admin_orgs.level1_program')
                ->on('employee_demo.level2_division', '=', 'admin_orgs.level2_division')
                ->on('employee_demo.level3_branch', '=', 'admin_orgs.level3_branch')
                ->on('employee_demo.level4', '=', 'admin_orgs.level4');
            })
            ->where('admin_orgs.user_id', '=', Auth::id())
            ->where('is_library', true)
            ->when( $request->search_text && $request->criteria == 'all', function ($q) use($request) {
                $q->where(function($query) use ($request) {
                    return $query->whereRaw("LOWER(goals.title) LIKE '%" . strtolower($request->search_text) . "%'")
                        ->orWhereRaw("LOWER(employee_demo.employee_name) LIKE '%" . strtolower($request->search_text) . "%'");
                });
            })
            ->when( $request->search_text && $request->criteria == 'gt', function ($q) use($request) {
                return $q->whereRaw("LOWER(goals.title) LIKE '%" . strtolower($request->search_text) . "%'");
            })
            ->when( $request->search_text && $request->criteria == 'cby', function ($q) use($request) {
                return $q->whereRaw("LOWER(employee_demo.employee_name) LIKE '%" . strtolower($request->search_text) . "%'");
            })
            ->distinct()
            ->select
            (
                'goals.id',
                'goals.title',
                'goals.created_at',
            )
            ->addselect(['goal_type_name' => GoalType::select('name')->whereColumn('goal_type_id', 'goal_types.id')->limit(1)])
            ->addselect(['creator_name' => User::select('name')->whereColumn('goals.user_id', 'users.id')->limit(1)]);
            return Datatables::of($query)
            ->addIndexColumn()
            ->addColumn('mandatory', function ($row) {
                return $row->is_mandatory ? "Mandatory" : "Suggested";
            })
            ->editColumn('created_at', function ($row) {
                return $row->created_at ? $row->created_at->format('F d, Y') : null;
            })
            ->addColumn('audience', function ($row) {
                return $row->sharedWith()->count();
            })
            ->addcolumn('action', function($row) {
                $btn = '<a href="' . route('hradmin.goalbank.editpage', $row->id) . '" class="view-modal btn btn-xs btn-primary" aria-label="Edit Goal for Organization" value="'. $row->id .'"><i class="fas fa-users"></i>&nbsp;Edit</a>';
                $btn = $btn . '&nbsp;<a href="' . route('hradmin.goalbank.editone', $row->id) . '" class="view-modal btn btn-xs btn-primary" aria-label="Edit Goal For Individuals" value="'. $row->id .'"><i class="fas fa-user-edit"></i>&nbsp;Edit</a>';
                $btn = $btn . '&nbsp;&nbsp;&nbsp;<a href="/hradmin/goalbank/deletegoal/' . $row->id . '" class="view-modal btn btn-xs btn-danger" onclick="return confirm(`Are you sure?`)" aria-label="Delete" id="delete_goal" value="'. $row->id .'"><i class="fa fa-trash"></i></a>';
                return $btn;
            })
            ->rawColumns(['goal_type_name', 'goals.created_by', 'action'])
            ->make(true);
        }
    }

    public function getgoalinds(Request $request, $goal_id) {
        $level0 = $request->dd_level0 ? OrganizationTree::where('id', $request->dd_level0)->first() : null;
        $level1 = $request->dd_level1 ? OrganizationTree::where('id', $request->dd_level1)->first() : null;
        $level2 = $request->dd_level2 ? OrganizationTree::where('id', $request->dd_level2)->first() : null;
        $level3 = $request->dd_level3 ? OrganizationTree::where('id', $request->dd_level3)->first() : null;
        $level4 = $request->dd_level4 ? OrganizationTree::where('id', $request->dd_level4)->first() : null;
        if ($request->ajax()) {
            $query = Goal::withoutGlobalScopes()
            ->where('goals.id', '=', $goal_id)
            ->leftjoin('goals_shared_with', 'goals.id', '=', 'goals_shared_with.goal_id')
            ->join('users', 'users.id', '=', 'goals_shared_with.user_id')
            ->leftjoin('employee_demo', 'employee_demo.guid', '=', 'users.guid')
            ->select (
                'employee_demo.employee_id',
                'employee_demo.employee_name',
                'employee_demo.job_title',
                'employee_demo.organization',
                'employee_demo.level1_program',
                'employee_demo.level2_division',
                'employee_demo.level3_branch',
                'employee_demo.level4',
                'employee_demo.deptid',
                'goals.id as goal_id',
                'goals_shared_with.id as share_id'
            );
            return Datatables::of($query)
            ->addIndexColumn()
            ->addcolumn('action', function($row) {
                $btn = '<a href="/hradmin/goalbank/deleteindividual/' . $row->share_id . '" class="view-modal btn btn-xs btn-danger" onclick="return confirm(`Are you sure?`)" aria-label="Delete" id="delete_user" value="'. $row->share_id .'"><i class="fa fa-trash"></i></a>';
                return $btn;
            })
            ->rawColumns(['action'])
             ->make(true);
        }
    }

    private function getDropdownValues(&$mandatoryOrSuggested) {
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

    }

    public function get_access_entry($roleId, $modelId) {
        return DB::table('model_has_roles')
        ->whereIn('model_id', [3, 4])
        ->where('model_type', '=', 'App\Models\User')
        ->where('role_id', '=', $roleId)
        ->where('model_id', '=', $modelId);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function manageEdit($id) {
        // $users = User::where('id', '=', $id)
        // ->select('email')
        // ->get();
        // $email = $users->first()->email;
        // $roles = DB::table('roles')
        // ->whereIntegerInRaw('id', [3, 4])
        // ->get();
        // $access = DB::table('model_has_roles')
        // ->where('model_id', '=', $id)
        // ->where('model_has_roles.model_type', 'App\Models\User')
        // ->get();
        return view('hradmin.goalbank.partials.access-edit-modal', compact('roles', 'access', 'email'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function manageUpdate(Request $request) {
        // if($request->accessselect) {
        //     if($request->accessselect == 4) {
        //         $query = DB::table('model_has_roles')
        //         ->where('model_id', '=', $request->model_id)
        //         ->whereIn('role_id', [3, 4])
        //         ->update(['role_id' => $request->accessselect, 'reason' => $request->reason]);
        //         $orgs = DB::table('admin_orgs')
        //         ->where('user_id', '=', $request->input('model_id'))
        //         ->delete();
        //     }
        //     if($request->accessselect == 3) {
        //         $query = DB::table('model_has_roles')
        //         ->where('model_id', '=', $request->model_id)
        //         ->where('role_id', 3)
        //         ->update(['reason' => $request->reason]);
        //     }
        // } else {
        //     $query = DB::table('model_has_roles')
        //     ->where('model_id', '=', $request->model_id)
        //     ->update(['reason' => $request->reason]);
        // }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function manageDestroy(Request $request) {
        // $query = DB::table('model_has_roles')
        // ->where('model_id', '=', $request->input('model_id'))
        // ->wherein('role_id', [3, 4])
        // ->delete();
        // // if($query) {
        //     $orgs = DB::table('admin_orgs')
        //     ->where('user_id', '=', $request->input('model_id'))
        //     ->delete();
        // // }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deletegoal(Request $request, $goal_id) {
        $query1 = DB::table('goal_tags')
        ->where('goal_tags.goal_id', '=', $goal_id)
        ->whereExists(function($exist) {
            $exist->select(DB::raw(1))
            ->from('goals')
            ->join('users', 'users.id', '=', 'goals.user_id')
            ->join('employee_demo', 'employee_demo.guid', '=', 'users.guid')
            ->join('admin_orgs', function($join) {
                $join->on('employee_demo.organization', '=', 'admin_orgs.organization')
                ->on('employee_demo.level1_program', '=', 'admin_orgs.level1_program')
                ->on('employee_demo.level2_division', '=', 'admin_orgs.level2_division')
                ->on('employee_demo.level3_branch', '=', 'admin_orgs.level3_branch')
                ->on('employee_demo.level4', '=', 'admin_orgs.level4');
            })
            ->where('admin_orgs.user_id', '=', Auth::id())
            ->where('goals.id', '=', 'goal_tags.goal_id')
        }
        ->where('is_library', true)
        ->delete();
        $query2 = GoalBankOrg::where('goal_id', '=', $goal_id)
        ->whereExists(function($exist) {
            $exist->select(DB::raw(1))
            ->from('goals')
            ->join('users', 'users.id', '=', 'goals.user_id')
            ->join('employee_demo', 'employee_demo.guid', '=', 'users.guid')
            ->join('admin_orgs', function($join) {
                $join->on('employee_demo.organization', '=', 'admin_orgs.organization')
                ->on('employee_demo.level1_program', '=', 'admin_orgs.level1_program')
                ->on('employee_demo.level2_division', '=', 'admin_orgs.level2_division')
                ->on('employee_demo.level3_branch', '=', 'admin_orgs.level3_branch')
                ->on('employee_demo.level4', '=', 'admin_orgs.level4');
            })
            ->where('admin_orgs.user_id', '=', Auth::id())
            ->where('goals.id', '=', 'goal_bank_orgs.goal_id')
        }
        ->where('is_library', true)
        ->delete();
        $query3 = DB::table('goals_shared_with')
        ->where('goals_shared_with.goal_id', '=', $goal_id)
        ->whereExists(function($exist) {
            $exist->select(DB::raw(1))
            ->from('goals')
            ->join('users', 'users.id', '=', 'goals.user_id')
            ->join('employee_demo', 'employee_demo.guid', '=', 'users.guid')
            ->join('admin_orgs', function($join) {
                $join->on('employee_demo.organization', '=', 'admin_orgs.organization')
                ->on('employee_demo.level1_program', '=', 'admin_orgs.level1_program')
                ->on('employee_demo.level2_division', '=', 'admin_orgs.level2_division')
                ->on('employee_demo.level3_branch', '=', 'admin_orgs.level3_branch')
                ->on('employee_demo.level4', '=', 'admin_orgs.level4');
            })
            ->where('admin_orgs.user_id', '=', Auth::id())
            ->where('goals.id', '=', 'goals_shared_with.goal_id')
        }
        ->where('is_library', true)
        ->delete();
        $query4 = DB::table('goals')
        ->where('goals.id', '=', $goal_id)
        ->whereExists(function($exist) {
            $exist->select(DB::raw(1))
            ->from('users', 'users.id', '=', 'goals.user_id')
            ->join('employee_demo', 'employee_demo.guid', '=', 'users.guid')
            ->join('admin_orgs', function($join) {
                $join->on('employee_demo.organization', '=', 'admin_orgs.organization')
                ->on('employee_demo.level1_program', '=', 'admin_orgs.level1_program')
                ->on('employee_demo.level2_division', '=', 'admin_orgs.level2_division')
                ->on('employee_demo.level3_branch', '=', 'admin_orgs.level3_branch')
                ->on('employee_demo.level4', '=', 'admin_orgs.level4');
            })
            ->where('admin_orgs.user_id', '=', Auth::id())
            ->where('goals.id', '=', 'goals_shared_with.goal_id')
        }
        ->where('is_library', true)
        ->delete();
        return redirect()->back();
    }

}
