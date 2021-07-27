<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class ResourcesController extends Controller
{
    public function userguide()
    {
         return view('resources.user-guide');
    }
    public function goalsetting()
    {
         return view('resources.goal-setting');
    }
    public function conversations()
    {
         return view('resources.conversations');
    }
    public function contact()
    {
         return view('resources.contact');
    }
}
