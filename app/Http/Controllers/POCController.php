<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class POCController extends Controller
{
    public function bidashboard()
    {
        return view('poc.bidashboard');
    }
}
