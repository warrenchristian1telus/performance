<?php

namespace App\Http\Controllers;

use App\Models\SharedProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class DashboardController extends Controller
{
    public function index() {
        $greetings = "";

        /* This sets the $time variable to the current hour in the 24 hour clock format */
        $time = date("H");
    
        /* Set the $timezone variable to become the current timezone */
        $timezone = date("e");
    
        /* If the time is less than 1200 hours, show good morning */
        if ($time < "12") {
            $greetings = "Good Morning";
        } else
    
        /* If the time is grater than or equal to 1200 hours, but less than 1700 hours, so good afternoon */
        if ($time >= "12" && $time < "17") {
            $greetings = "Good Afternoon";
        } else
    
        /* Should the time be between or equal to 1700 and 1900 hours, show good evening */
        if ($time >= "17" && $time < "19") {
            $greetings = "Good Evening";
        } else
    
        if ($time >= "19") {
            $greetings = "Hello";
        }

        $tab = (Route::current()->getName() == 'dashboard.notifications') ? 'notifications' : 'todo';
        $supervisorTooltip = 'If your current supervisor within My Performance is incorrect, please have your supervisor submit an AskMyHR ticket and choose the category: <span class="text-primary">My Team of Organization > HR Software > Systems Support > Position / Reporting Updates</span>';
        $sharedList = SharedProfile::where('shared_id', Auth::id())->with('sharedWithUser')->get();
        return view('dashboard.index', compact('greetings', 'tab', 'supervisorTooltip', 'sharedList'));
    }
}