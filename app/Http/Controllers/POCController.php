<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class POCController extends Controller
{
  public function bidashboard()
  {
      return view('poc.bidashboard');
  }

  public function odstest()
  {
    $response = Http::withHeaders(['Content-Type' => 'application/x-www-form-urlencoded'])->withBasicAuth(env('ODS_DEMO_CLIENT_ID'),env('ODS_DEMO_CLIENT_SECRET'))->get(env('ODS_DEMO_URI_1'));
    return view('poc.odstest', ['response' => $response['value']]);
  }

  public function odstest2()
  {
    $response2 = Http::withHeaders(['Content-Type' => 'application/x-www-form-urlencoded'])->withBasicAuth(env('ODS_DEMO_CLIENT_ID'),env('ODS_DEMO_CLIENT_SECRET'))->get(env('ODS_DEMO_URI_2'));
    return view('poc.odstest2', ['response2' => $response2['value']]);
  }
}
