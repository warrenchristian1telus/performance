<?php

namespace App\Http\Controllers;

use App\DataTables\MyEmployeesDataTable;
use App\Http\Requests\ShareMyGoalRequest;
use App\Models\Goal;
use App\Models\User;
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
            ->with('sharedWith')
            ->with('goalType')->get();
        $employees = $this->myEmployeesAjax();
        // dd($goals[0]->sharedWith);
        return $myEmployeesDataTable->render('my-team/my-employees',compact('goals', 'employees'));
    }

    public function myEmployeesAjax() {
        // TODO: Map Once we have relationship
        return User::whereIn("id", [1,2,3])->get();
    }

    public function performanceStatistics()
    {
        $goals = Goal::where('user_id', Auth::id())
            ->with('user')
            ->with('goalType')->get();
        $employees = $this->myEmployeesAjax();
        return view('my-team/performance-statistics', compact('goals', 'employees'));
    }
    public function goalsHierarchy()
    {
        $goals = Goal::where('user_id', Auth::id())
            ->with('user')
            ->with('goalType')->get();
        $employees = $this->myEmployeesAjax();
        
        return view('my-team/goals-hierarchy', compact('goals', 'employees'));
    }

    public function syncGoals(ShareMyGoalRequest $request) {
        $input = $request->validated();
        if($request->has("share_with")) {
            $shareWith = $request->share_with;
            foreach ($shareWith as $goalId => $userIds) {
                $goal = Goal::find($goalId);
                $goal->sharedWith()->sync(array_filter($userIds));
            }
        }
        if($request->has("is_shared")) {
            $isSharedArray = $input['is_shared'];
            foreach ($isSharedArray as $goalId => $isShared) {
                if (!(bool) $isShared) {
                    $goal = Goal::find($goalId);
                    $goal->sharedWith()->detach();
                }
            }
            // dd((bool)$input['is_shared'][995]); 
        }
        return redirect()->back();
    }

    public function viewProfileAs($id, Request $request) {
        // TODO: Get it from Database.
        if(in_array($id, [1,2,3])) {
            session()->put('view-profile-as', $id);
            if (!session()->has('original-auth-id')) {
                session()->put('original-auth-id', Auth::id());
            }
            Auth::loginUsingId($id);
        }
        return (url()->previous() === Route('my-team.my-employee')) ? redirect()->route('goal.current') : redirect()->back();
    }

    public function returnToMyProfile() {
        Auth::loginUsingId(session()->get('original-auth-id'));
        session()->forget('original-auth-id');
        session()->forget('view-profile-as');
        return redirect()->route('my-team.my-employee');
    }
}
