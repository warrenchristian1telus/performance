<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\GoalController;
use App\Models\Organization;
use App\Models\User;
use App\Models\Goal;
use App\Models\GoalType;
use App\Models\OrgNode;
use Carbon\Carbon;


class SysadminController extends Controller
{
    public function current(Request $request)
    {
        $level0 = null;
        if($request->level0) {
            $level0 = $request->level0;
        } else {
            $level0 = $this->getOrgLevel0();
        }
        $jobTitles = $this->getJobTitles();

        $query = DB::table('employee_demo')
        ->select('employee_id', 'guid', 'employee_name', 'job_title', 'organization','level1_program', 'level2_division', 'level3_branch', 'level4')
        ->wherein('employee_status', ['A', 'L', 'P', 'S']);

         // if ($request->has('jobTitles') && $request->jobTitles) {
         //     $query = $query->where('job_title', $request->jobTitles);
         // }

         if ($request->has('dd_level0') && $request->dd_level0 && $request->dd_level0 != 'all') {
             $query = $query->where('organization', $request->dd_level0);
         }

         if ($request->has('dd_level1') && $request->dd_level1 && $request->dd_level1 != 'all') {
             $query = $query->where('level1_program', $request->dd_level1);
         }

         if ($request->has('dd_level2') && $request->dd_level2 && $request->dd_level2 != 'all') {
             $query = $query->where('level2_division', $request->dd_level2);
         }

         if ($request->has('dd_level3') && $request->dd_level3 && $request->dd_level3 != 'all') {
             $query = $query->where('level3_branch', $request->dd_level3);
         }

         if ($request->has('dd_level4') && $request->dd_level4 && $request->dd_level4 != 'all') {
             $query = $query->where('level4', $request->dd_level4);
         }

         // if ($request->has('activeSince') && $request->activeSince && $request->activeSince != 'any') {
         //     $query = $query->where('activeSince', $request->activeSince);
         // }

        $iEmpl = $query->orderBy('employee_name')->paginate(10);

        return view('sysadmin.employees.current', compact('level0', 'iEmpl', 'jobTitles', 'request'));
    }

    public function previous(Request $request)
    {
        $level0 = null;
        if($request->level0) {
            $level0 = $request->level0;
        } else {
            $level0 = $this->getOrgLevel0();
        }
        $jobTitles = $this->getJobTitles();

        $query = DB::table('employee_demo')
        ->select('employee_id', 'guid', 'employee_name', 'job_title', 'organization','level1_program', 'level2_division', 'level3_branch', 'level4')
        ->wherenotin('employee_status', ['A', 'L', 'P', 'S']);

        // if ($request->has('jobTitles') && $request->jobTitles) {
        //     $query = $query->where('job_title', $request->jobTitles);
        // }

        if ($request->has('dd_level0') && $request->dd_level0 && $request->dd_level0 != 'all') {
            $query = $query->where('organization', $request->dd_level0);
        }

        if ($request->has('dd_level1') && $request->dd_level1 && $request->dd_level1 != 'all') {
            $query = $query->where('level1_program', $request->dd_level1);
        }

        if ($request->has('dd_level2') && $request->dd_level2 && $request->dd_level2 != 'all') {
            $query = $query->where('level2_division', $request->dd_level2);
        }

        if ($request->has('dd_level3') && $request->dd_level3 && $request->dd_level3 != 'all') {
            $query = $query->where('level3_branch', $request->dd_level3);
        }

        if ($request->has('dd_level4') && $request->dd_level4 && $request->dd_level4 != 'all') {
            $query = $query->where('level4', $request->dd_level4);
        }

       $iEmpl = $query->orderBy('employee_name')->paginate(10);

        return view('sysadmin.employees.previous', compact('level0', 'iEmpl', 'jobTitles', 'request'));
    }

    public function shareemployee(Request $request)
    {
        $this->getDropdownValues($mandatoryOrSuggested, $goalTypes);
        $level0 = $this->getOrgLevel0();

        $sharedElements = [['key' => 'all', 'value' => 'All']];

        $jobTitles = DB::table('employee_demo')
        ->select('position_title')
        ->distinct()
        ->get();

        $sEmpl = DB::table('goals')
        ->leftjoin('employee_demo', 'employee_demo.employee_id', '=', 'goals.user_id')
        ->where('employee_demo.employee_name', '!=', '')
        ->select('goals.user_id', 'employee_demo.employee_name', 'employee_demo.position_title', 'employee_demo.organization', 'employee_demo.level1_program', 'employee_demo.level2_division', 'employee_demo.level3_branch', 'employee_demo.level4')
        ->distinct()
        ->paginate(8);

        return view('sysadmin.shared.shareemployee', compact('level0', 'sEmpl', 'jobTitles', 'sharedElements', 'request'));
    }

    public function manageshares(Request $request)
    {
        return view('sysadmin.shared.manageshares');
    }

    public function excuseemployee(Request $request)
    {
        return view('sysadmin.excused.excuseemployee');
    }

    public function manageexcused(Request $request)
    {
        return view('sysadmin.excused.manageexcused');
    }

    public function managegoals(Request $request)
    {
        return view('sysadmin.goals.managegoals');
    }

    public function unlockconversation(Request $request)
    {
        return view('sysadmin.unlock.unlockconversation');
    }

    public function manageunlocked(Request $request)
    {
        return view('sysadmin.unlock.manageunlocked');
    }

    public function createnotification(Request $request)
    {
        return view('sysadmin.notifications.createnotification');
    }

    public function viewnotifications(Request $request)
    {
        return view('sysadmin.notifications.viewnotifications');
    }

    public function createaccess(Request $request)
    {
        return view('sysadmin.access.createaccess');
    }

    public function manageaccess(Request $request)
    {
        return view('sysadmin.access.manageaccess');
    }

    public function goalsummary(Request $request)
    {
        return view('sysadmin.statistics.goalsummary');
    }

    public function conversationsummary(Request $request)
    {
        return view('sysadmin.statistics.conversationsummary');
    }

    public function sharedsummary(Request $request)
    {
        return view('sysadmin.statistics.sharedsummary');
    }

    public function excusedsummary(Request $request)
    {
        return view('sysadmin.statistics.excusedsummary');
    }


    public function myorg(Request $request)
    {
        $level0 = $this->getOrgLevel0();
        $this->getSearchCriterias($crit);

        $iEmpl = DB::table('employee_demo')
        ->select('employee_id', 'guid', 'employee_name', 'job_title', 'organization','level1_program', 'level2_division', 'level3_branch', 'level4', 'deptid', 'request')
        ->orderby('employee_name')
        ->paginate(10);


        return view('sysadmin.myorg', compact('level0', 'crit', 'iEmpl'));
    }

    public function statistics(Request $request)
    {
        return view('sysadmin.statistics');
    }

    public function addgoal(Request $request)
    {

        $tree = OrgNode::with('children')
        ->whereExists(function ($query) {
            $query->select(DB::raw(1))
            ->from('employee_demo')
            ->where('employee_demo.deptid', 'deptid');
        }
        )
        ->get();
         // dd($tree->count());

        $level0Value = 'all';
        $level1Value = 'all';
        $level2Value = 'all';
        $level3Value = 'all';
        $level4Value = 'all';

        $this->getDropdownValues($mandatoryOrSuggested, $goalTypes);
        $level0 = $this->getOrgLevel0();

        $authId = Auth::id();
        $goaltypes = GoalType::all();
        $user = User::find($authId);
        $bankgoals = DB::table('goals')
        ->where('is_library', true)
        ->leftjoin('users', 'goals.user_id', '=', 'users.id')
        ->leftjoin('employee_demo', 'goals.user_id', '=', 'employee_demo.employee_id')
        ->leftjoin('goal_types', 'goals.goal_type_id', '=', 'goal_types.id')
        ->select('goals.*', 'users.name', 'employee_demo.deptid', 'employee_demo.level1_program', 'employee_demo.level2_division', 'employee_demo.level3_branch', 'employee_demo.level4',
        DB::raw('(CASE
        WHEN is_mandatory = 0 THEN "Suggested"
        WHEN is_mandatory = 1 THEN "Mandatory"
        ELSE "Any"
        END) AS MandatoryValue'),
        'goal_types.name AS GoalTypeValue',
        DB::raw('(SELECT COUNT(*) FROM goals_shared_with WHERE goals_shared_with.goal_id = goals.id) AS Audience')
        )
        ->paginate(8);

        $newGoal = new Goal;
        $newGoal->user_id = Auth::id();

        $aud_org = $this->getOrgLevel0();

        $aud_level1 =  DB::table('employee_demo')
        ->select('level1_program')
        ->where(trim('level1_program'), '<>', '')
        ->groupby('level1_program')
        ->get();
        // $aud_level1 =  DB::table('organizations')
        // ->select('level1')
        // ->where(trim('level1'), '<>', '')
        // ->whereExists(function ($query) {
        //     $query->select(DB::raw(1))
        //     ->from('employee_demo')
        //     ->whereColumn('employee_demo.deptid', 'organizations.deptid');
        // }
        // )
        // ->groupby('level1')
        // ->get();

        // return view('sysadmin.goal-bank', compact('level1','level2','level3','level4', 'bankgoals', 'goalTypes', 'mandatoryOrSuggested', 'newGoal', 'aud_org', 'aud_level1'));
        return view('sysadmin.goal-bank', compact('level0', 'bankgoals', 'goalTypes', 'mandatoryOrSuggested', 'newGoal', 'aud_org', 'aud_level1', 'request'));
    }

    public function goaledit($id, Request $request)
    {
        $goaltypes = GoalType::all();
        $this->getDropdownValues($mandatoryOrSuggested, $goalTypes);
        $bankgoal = DB::table('goals')
        ->where('id', $id)
        ->first();

        $aud_org = DB::table('organizations')
        ->select('organization')
        ->where(trim('organization'), '<>', '')
        ->whereExists(function ($query) {
            $query->select(DB::raw(1))
            ->from('employee_demo')
            ->whereColumn('employee_demo.deptid', 'organizations.deptid');
        }
        )
        ->groupby('organization')
        ->get();

        $aud_level1 =  DB::table('organizations')
        ->select('level1')
        ->where(trim('level1'), '<>', '')
        ->whereExists(function ($query) {
            $query->select(DB::raw(1))
            ->from('employee_demo')
            ->whereColumn('employee_demo.deptid', 'organizations.deptid');
        }
        )
        ->groupby('level1')
        ->get();

        return view('sysadmin.goal-edit', compact('bankgoal', 'goalTypes', 'mandatoryOrSuggested', 'aud_org', 'aud_level1', 'request'));
    }

    public function access(Request $request)
    {
        return view('sysadmin.access');
    }

    public function conversations(Request $request)
    {
        $level0 = $this->getOrgLevel0();
        $eelevel0 = $this->getOrgLevel0();

        $openConversations = DB::table('conversations')
        ->leftjoin('employee_demo', 'employee_demo.employee_id', '=', 'conversations.user_id')
        ->select('conversations.id', 'conversations.conversation_topic_id', 'conversations.date', 'employee_demo.organization', 'employee_demo.level1_program', 'employee_demo.level2_division', 'employee_demo.level3_branch', 'employee_demo.level4')
        ->where(function ($query) {
            $query->where('conversations.supervisor_signoff_id', null)
            ->orwhere('conversations.user_id', null);
        })
        ->paginate(8);

        $closedConversations = DB::table('conversations')
        ->leftjoin('employee_demo', 'employee_demo.employee_id', '=', 'conversations.user_id')
        ->select('conversations.id', 'conversations.conversation_topic_id', 'conversations.date', 'employee_demo.organization', 'employee_demo.level1_program', 'employee_demo.level2_division', 'employee_demo.level3_branch', 'employee_demo.level4')
        ->where('conversations.supervisor_signoff_id', '!=', null)
        ->where('conversations.user_id', '!=', null)
        ->paginate(8);




        return view('sysadmin.conversations', compact('level0', 'eelevel0', 'openConversations', 'closedConversations', 'request'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function goalupdate(CreateGoalRequest $request, $id)
    {
        $goal = Goal::withoutGlobalScope(NonLibraryScope::class)->findOrFail($id);
        $input = $request->validated();

        $goal->update($input);

        return redirect()->route('url()->previous()');
    }

    /**
    * Add new goal to the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function goaladd(CreateGoalRequest $request)
    {
        $input = $request->validated();

        $input['user_id'] = Auth::id();

        Goal::create($input);

        return response()->json(['success' => true, 'message' => 'Goal Created successfully']);
    }

    public function getOrgLevel0()
    {
        $query = DB::table('employee_demo')
        ->select('organization as key0', 'organization')
        ->where(trim('organization'), '<>', '')
        ->groupby('organization');

        // if(request()->is('sysadmin/employees/current')) {
        //     $query = $query->wherein('employee_status', ['A', 'L', 'P', 'S']);
        // }
        //
        // if (request()->is('sysadmin/employees/previous')) {
        //     $query = $query->wherenotin('employee_status', ['A', 'L', 'P', 'S']);
        // }

        $level0 = $query->get('key0', 'organization');

        return $level0;
    }

    // public function getOrgLevel0_Orig() {
    //     $level0 = DB::table('employee_demo')
    //     ->select(DB::raw("REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (organization, '.', ''), '\"', ''), '\'', ''), '-', ''), ',', ''), ' ', ''), '&', ''), '/', '') as key0"), 'organization')
    //     ->where(trim('organization'), '<>', '')
    //     ->groupby('organization')
    //     ->get('key0', 'organization');
    //     return $level0;
    // }

    public function getOrgLevel1($id0) {
        if ($id0 == 'all') {
            $level1 = [['key1' => 'all', 'level1_program' => 'All']];
        } else {
            $query = DB::table('employee_demo')
            ->select('level1_program as key1', 'level1_program')
            ->where(trim('level1_program'), '<>', '')
            ->where('organization', $id0);
            // dd(Route::getCurrentRoute()->uri());
            // dd(Route::getCurrentRoute()->uri());
            // if (request()->path() == 'sysadmin/employees/current') {
            //     $query = $query->wherein('employee_status', ['A', 'L', 'P', 'S']);
            // }
            // if (request()->path() == 'sysadmin/employees/previous') {
            //     $query = $query->wherenotin('employee_status', ['A', 'L', 'P', 'S']);
            // }
            $level1 = $query->groupby('level1_program')->pluck('level1_program', 'key1');
        }
        return $level1;
    }

    // public function getOrgLevel1($id0) {
    //     if ($id0 == 'all') {
    //         $level1 = [['key1' => 'all', 'level1_program' => 'All']];
    //         $level2 = [['key2' => 'all', 'level2_division' => 'All']];
    //         $level3 = [['key3' => 'all', 'level3_branch' => 'All']];
    //         $level4 = [['key4' => 'all', 'level4' => 'All']];
    //     }else{
    //         $level1 = DB::table('employee_demo')
    //         ->select(DB::raw("REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (level1_program, '.', ''), '\"', ''), '\'', ''), '-', ''), ',', ''), ' ', ''), '&', ''), '/', '') as key1"), 'level1_program')
    //         ->where(trim('level1_program'), '<>', '')
    //         ->where(DB::raw("REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (organization, '.', ''), '\"', ''), '\'', ''), '-', ''), ',', ''), ' ', ''), '&', ''), '/', '')"), $id0)
    //         ->groupby('level1_program')
    //         ->pluck('level1_program', 'key1');
    //     };
    //     return $level1;
    // }

    public function getOrgLevel2($id0, $id1) {
        if ($id1 == 'all') {
            $level2 = [['key2' => 'all', 'level2_division' => 'All']];
        }else{
            $query = DB::table('employee_demo')
            ->select("level2_division as key2", 'level2_division')
            ->where(trim('level2_division'), '<>', '')
            ->where('organization', $id0)
            ->where('level1_program', $id1)
            ->groupby('level2_division');
            // if(request()->is('sysadmin/employees/current/*')) {
            //     $query = $query->wherein('employee_status', ['A', 'L', 'P', 'S']);
            // }
            // if (request()->is('sysadmin/level1/*')) {
            //     $query = $query->wherenotin('employee_status', ['A', 'L', 'P', 'S']);
            // }
            $level2 = $query->pluck('level2_division', 'key2');
        };
        return $level2;
    }

    // public function getOrgLevel2($id0, $id1) {
    //     if ($id1 == 'all') {
    //         $level2 = [['key2' => 'all', 'level2_division' => 'All']];
    //         $level3 = [['key3' => 'all', 'level3_branch' => 'All']];
    //         $level4 = [['key4' => 'all', 'level4' => 'All']];
    //     }else{
    //         $level2 = DB::table('employee_demo')
    //         ->select(DB::raw("REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (level2_division, '.', ''), '\"', ''), '\'', ''), '-', ''), ',', ''), ' ', ''), '&', ''), '/', '') as key2"), 'level2_division')
    //         ->where(trim('level2_division'), '<>', '')
    //         ->where(DB::raw("REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (organization, '.', ''), '\"', ''), '\'', ''), '-', ''), ',', ''), ' ', ''), '&', ''), '/', '')"), $id0)
    //         ->where(DB::raw("REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (level1_program, '.', ''), '\"', ''), '\'', ''), '-', ''), ',', ''), ' ', ''), '&', ''), '/', '')"), $id1)
    //         ->groupby('level2_division')
    //         ->pluck('level2_division', 'key2');
    //     };
    //     return json_encode($level2);
    // }

    public function getOrgLevel3($id0, $id1, $id2) {
        if ($id2 == 'all') {
            $level3 = [['key3' => 'all', 'level3_branch' => 'All']];
        }else{
            $query = DB::table('employee_demo')
            ->select("level3_branch as key3", 'level3_branch')
            ->where(trim('level3_branch'), '<>', '')
            ->where('organization', $id0)
            ->where('level1_program', $id1)
            ->where('level2_division', $id2)
            ->groupby('level3_branch');
            $level3 = $query->pluck('level3_branch', 'key3');
        };
        return $level3;
    }

    // public function getOrgLevel3($id0, $id1, $id2) {
    //     if ($id2 == 'all') {
    //         $level3 = [['key3' => 'all', 'level3_branch' => 'All']];
    //         $level4 = [['key4' => 'all', 'level4' => 'All']];
    //     }else{
    //         $level3 = DB::table('employee_demo')
    //         ->select(DB::raw("REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (level3_branch, '.', ''), '\"', ''), '\'', ''), '-', ''), ',', ''), ' ', ''), '&', ''), '/', '') as key3"), 'level3_branch')
    //         ->where(trim('level3_branch'), '<>', '')
    //         ->where(DB::raw("REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (organization, '.', ''), '\"', ''), '\'', ''), '-', ''), ',', ''), ' ', ''), '&', ''), '/', '')"), $id0)
    //         ->where(DB::raw("REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (level1_program, '.', ''), '\"', ''), '\'', ''), '-', ''), ',', ''), ' ', ''), '&', ''), '/', '')"), $id1)
    //         ->where(DB::raw("REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (level2_division, '.', ''), '\"', ''), '\'', ''), '-', ''), ',', ''), ' ', ''), '&', ''), '/', '')"), $id2)
    //         ->groupby('level3_branch')
    //         ->pluck('level3_branch', 'key3');
    //     };
    //     return json_encode($level3);
    // }

    public function getOrgLevel4($id0, $id1, $id2, $id3) {
        if ($id3 == 'all') {
            $level4 = [['key4' => 'all', 'level4' => 'All']];
        }else{
            $query = DB::table('employee_demo')
            ->select("level4 as key4", 'level4')
            ->where(trim('level4'), '<>', '')
            ->where('organization', $id0)
            ->where('level1_program', $id1)
            ->where('level2_division', $id2)
            ->where('level3_branch', $id3)
            ->groupby('level4');
            $level4 = $query->pluck('level4', 'key4');
    };
        return $level4;
    }

    // public function getOrgLevel4($id0, $id1, $id2, $id3) {
    //     if ($id3 == 'all') {
    //         $level4 = [['key4' => 'all', 'level4' => 'All']];
    //     }else{
    //         $level4 = DB::table('employee_demo')
    //         ->select(DB::raw("REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (level4, '.', ''), '\"', ''), '\'', ''), '-', ''), ',', ''), ' ', ''), '&', ''), '/', '') as key4"), 'level4')
    //         ->where(trim('level4'), '<>', '')
    //         ->where(DB::raw("REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (organization, '.', ''), '\"', ''), '\'', ''), '-', ''), ',', ''), ' ', ''), '&', ''), '/', '')"), $id0)
    //         ->where(DB::raw("REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (level1_program, '.', ''), '\"', ''), '\'', ''), '-', ''), ',', ''), ' ', ''), '&', ''), '/', '')"), $id1)
    //         ->where(DB::raw("REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (level2_division, '.', ''), '\"', ''), '\'', ''), '-', ''), ',', ''), ' ', ''), '&', ''), '/', '')"), $id2)
    //         ->where(DB::raw("REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (level3_branch, '.', ''), '\"', ''), '\'', ''), '-', ''), ',', ''), ' ', ''), '&', ''), '/', '')"), $id3)
    //         ->groupby('level4')
    //         ->pluck('level4', 'key4');
    //     };
    //     return json_encode($level4);
    // }

    public function getJobTitles() {
        $jobTitles = DB::table('employee_demo')
        ->select(DB::raw("REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (job_title, '.', ''), '\"', ''), '\'', ''), '-', ''), ',', ''), ' ', ''), '&', ''), '/', '') as pkey"), 'job_title')
        ->where(trim('job_title'), '<>', '')
        ->groupby('job_title')
        ->pluck('pkey', 'job_title');
        return json_encode($jobTitles);
    }

    private function getDropdownValues(&$mandatoryOrSuggested, &$goalTypes) {
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

    private function getSearchCriterias(&$Criterias) {
        $Criterias = [
            [
                "id" => 'all',
                "name" => 'All'
            ],
            [
                "id" => 'emp',
                "name" => 'Employee ID'
            ],
            [
                "id" => 'cls',
                "name" => 'Classification'
            ],
            [
                "id" => 'dpt',
                "name" => 'Department ID'
            ],
        ];
    }




}
