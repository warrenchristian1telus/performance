<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
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
    public function current()
    {
        $level0 = $this->getOrgLevel0();
        $jobTitles = $this->getJobTitles();

        $iEmpl = DB::table('employee_demo')
        ->select('employee_id', 'guid', 'employee_name', 'job_title', 'organization','level1_program', 'level2_division', 'level3_branch', 'level4')
         ->wherein('employee_status', ['A', 'L', 'P', 'S'])
        // ->wherein('date_deleted', [0, null])
        ->paginate(10);

        return view('sysadmin.employees.current', compact('level0', 'iEmpl', 'jobTitles'));
    }

    public function previous()
    {
        $level0 = $this->getOrgLevel0();
        $jobTitles = $this->getJobTitles();

        $iEmpl = DB::table('employee_demo')
        ->select('employee_id', 'guid', 'employee_name', 'job_title', 'organization','level1_program', 'level2_division', 'level3_branch', 'level4')
        // ->where('date_deleted')
        ->wherenotin('employee_status', ['A', 'L', 'P', 'S'])
        ->paginate(10);

        return view('sysadmin.employees.previous', compact('level0', 'iEmpl', 'jobTitles'));
    }

    public function shareemployee()
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

        return view('sysadmin.shared.shareemployee', compact('level0', 'sEmpl', 'jobTitles', 'sharedElements'));
    }

    public function manageshares()
    {
        return view('sysadmin.shared.manageshares');
    }

    public function excuseemployee()
    {
        return view('sysadmin.excused.excuseemployee');
    }

    public function manageexcused()
    {
        return view('sysadmin.excused.manageexcused');
    }

    public function managegoals()
    {
        return view('sysadmin.goals.managegoals');
    }

    public function unlockconversation()
    {
        return view('sysadmin.unlock.unlockconversation');
    }

    public function manageunlocked()
    {
        return view('sysadmin.unlock.manageunlocked');
    }

    public function createnotification()
    {
        return view('sysadmin.notifications.createnotification');
    }

    public function viewnotifications()
    {
        return view('sysadmin.notifications.viewnotifications');
    }

    public function createaccess()
    {
        return view('sysadmin.access.createaccess');
    }

    public function manageaccess()
    {
        return view('sysadmin.access.manageaccess');
    }

    public function goalsummary()
    {
        return view('sysadmin.statistics.goalsummary');
    }

    public function conversationsummary()
    {
        return view('sysadmin.statistics.conversationsummary');
    }

    public function sharedsummary()
    {
        return view('sysadmin.statistics.sharedsummary');
    }

    public function excusedsummary()
    {
        return view('sysadmin.statistics.excusedsummary');
    }










    public function myorg()
    {
        $level0 = $this->getOrgLevel0();
        $this->getSearchCriterias($crit);

        $iEmpl = DB::table('employee_demo')
        ->select('employee_id', 'guid', 'employee_name', 'job_title', 'organization','level1_program', 'level2_division', 'level3_branch', 'level4', 'deptid')
        ->orderby('employee_name')
        ->paginate(10);


        return view('sysadmin.myorg', compact('level0', 'crit', 'iEmpl'));
    }

    public function statistics()
    {
        return view('sysadmin.statistics');
    }

    public function addgoal()
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
        return view('sysadmin.goal-bank', compact('level0', 'bankgoals', 'goalTypes', 'mandatoryOrSuggested', 'newGoal', 'aud_org', 'aud_level1'));
    }

    public function goaledit($id)
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

        return view('sysadmin.goal-edit', compact('bankgoal', 'goalTypes', 'mandatoryOrSuggested', 'aud_org', 'aud_level1'));
    }

    public function access()
    {
        return view('sysadmin.access');
    }

    public function conversations()
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




        return view('sysadmin.conversations', compact('level0', 'eelevel0', 'openConversations', 'closedConversations'));
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

    public function getOrgLevel0() {
        $level0 = DB::table('employee_demo')
        ->select(DB::raw("REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (organization, '.', ''), '\"', ''), '\'', ''), '-', ''), ',', ''), ' ', ''), '&', ''), '/', '') as key0"), 'organization')
        ->where(trim('organization'), '<>', '')
        ->groupby('organization')
        ->get('key0', 'organization');
        return $level0;
    }

    public function getOrgLevel1($id0) {
        if ($id0 == 'all') {
            $level1 = [['key1' => 'all', 'level1_program' => 'All']];
            $level2 = [['key2' => 'all', 'level2_division' => 'All']];
            $level3 = [['key3' => 'all', 'level3_branch' => 'All']];
            $level4 = [['key4' => 'all', 'level4' => 'All']];
        }else{
            $level1 = DB::table('employee_demo')
            ->select(DB::raw("REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (level1_program, '.', ''), '\"', ''), '\'', ''), '-', ''), ',', ''), ' ', ''), '&', ''), '/', '') as key1"), 'level1_program')
            ->where(trim('level1_program'), '<>', '')
            ->where(DB::raw("REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (organization, '.', ''), '\"', ''), '\'', ''), '-', ''), ',', ''), ' ', ''), '&', ''), '/', '')"), $id0)
            ->groupby('level1_program')
            ->pluck('level1_program', 'key1');
        };
        return $level1;
    }

    public function getOrgLevel2($id0, $id1) {
        if ($id1 == 'all') {
            $level2 = [['key2' => 'all', 'level2_division' => 'All']];
            $level3 = [['key3' => 'all', 'level3_branch' => 'All']];
            $level4 = [['key4' => 'all', 'level4' => 'All']];
        }else{
            $level2 = DB::table('employee_demo')
            ->select(DB::raw("REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (level2_division, '.', ''), '\"', ''), '\'', ''), '-', ''), ',', ''), ' ', ''), '&', ''), '/', '') as key2"), 'level2_division')
            ->where(trim('level2_division'), '<>', '')
            ->where(DB::raw("REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (organization, '.', ''), '\"', ''), '\'', ''), '-', ''), ',', ''), ' ', ''), '&', ''), '/', '')"), $id0)
            ->where(DB::raw("REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (level1_program, '.', ''), '\"', ''), '\'', ''), '-', ''), ',', ''), ' ', ''), '&', ''), '/', '')"), $id1)
            ->groupby('level2_division')
            ->pluck('level2_division', 'key2');
        };
        return json_encode($level2);
    }


    public function getOrgLevel3($id0, $id1, $id2) {
        if ($id2 == 'all') {
            $level3 = [['key3' => 'all', 'level3_branch' => 'All']];
            $level4 = [['key4' => 'all', 'level4' => 'All']];
        }else{
            $level3 = DB::table('employee_demo')
            ->select(DB::raw("REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (level3_branch, '.', ''), '\"', ''), '\'', ''), '-', ''), ',', ''), ' ', ''), '&', ''), '/', '') as key3"), 'level3_branch')
            ->where(trim('level3_branch'), '<>', '')
            ->where(DB::raw("REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (organization, '.', ''), '\"', ''), '\'', ''), '-', ''), ',', ''), ' ', ''), '&', ''), '/', '')"), $id0)
            ->where(DB::raw("REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (level1_program, '.', ''), '\"', ''), '\'', ''), '-', ''), ',', ''), ' ', ''), '&', ''), '/', '')"), $id1)
            ->where(DB::raw("REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (level2_division, '.', ''), '\"', ''), '\'', ''), '-', ''), ',', ''), ' ', ''), '&', ''), '/', '')"), $id2)
            ->groupby('level3_branch')
            ->pluck('level3_branch', 'key3');
        };
        return json_encode($level3);
    }

    public function getOrgLevel4($id0, $id1, $id2, $id3) {
        if ($id3 == 'all') {
            $level4 = [['key4' => 'all', 'level4' => 'All']];
        }else{
            $level4 = DB::table('employee_demo')
            ->select(DB::raw("REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (level4, '.', ''), '\"', ''), '\'', ''), '-', ''), ',', ''), ' ', ''), '&', ''), '/', '') as key4"), 'level4')
            ->where(trim('level4'), '<>', '')
            ->where(DB::raw("REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (organization, '.', ''), '\"', ''), '\'', ''), '-', ''), ',', ''), ' ', ''), '&', ''), '/', '')"), $id0)
            ->where(DB::raw("REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (level1_program, '.', ''), '\"', ''), '\'', ''), '-', ''), ',', ''), ' ', ''), '&', ''), '/', '')"), $id1)
            ->where(DB::raw("REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (level2_division, '.', ''), '\"', ''), '\'', ''), '-', ''), ',', ''), ' ', ''), '&', ''), '/', '')"), $id2)
            ->where(DB::raw("REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (REPLACE (level3_branch, '.', ''), '\"', ''), '\'', ''), '-', ''), ',', ''), ' ', ''), '&', ''), '/', '')"), $id3)
            ->groupby('level4')
            ->pluck('level4', 'key4');
        };
        return json_encode($level4);
    }

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
