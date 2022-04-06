<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class POCController extends Controller
{
    public function employeedemo(unsigned &$top, unsigned)
    {
      $response = Http::withHeaders(['Content-Type' => 'application/x-www-form-urlencoded'])
        ->withBasicAuth(env('ODS_DEMO_CLIENT_ID'),env('ODS_DEMO_CLIENT_SECRET'))
        // ->withOptions(['top' => 100, 'skip' => 100])
        ->get(env('ODS_EMPLOYEE_DEMO_URI') . '?$top=100&$skip=100');
        // ->paginate(100);
        // return view('poc.odsorghierarchy', ['response' => $response['value']]);

        // dd($response->count());
        // dd($response['value']);
        dd(count($response['value']));
        // dd($response);
        return view('poc.employeedemo', ['response' => $response['value']]);
    }
    public function odsorghierarchy()
    {
      $response = Http::withHeaders(['Content-Type' => 'application/x-www-form-urlencoded'])
        ->withBasicAuth(env('ODS_DEMO_CLIENT_ID'),env('ODS_DEMO_CLIENT_SECRET'))
        ->get(env('ODS_DEMO_URI_3'));
        // return view('poc.odsorghierarchy', ['response' => $response['value']]);

        dd($response['value']);
        // dd($response);
        return view('poc.odsorghierarchy', ['response' => $response['value']]);
    }
  public function odsorghierarchy2()
  {
    // $response = Http::withHeaders(['Content-Type' => 'application/x-www-form-urlencoded'])
    // $response = Http::withHeaders(['Content-Type' => 'text/html'])
    // $response = Http::get(['Content-Type' => 'text/html'])
    $response = Http::withHeaders(['Content-Type' => 'application/x-www-form-urlencoded'])
      ->withBasicAuth(env('ODS_DEMO_CLIENT_ID'),env('ODS_DEMO_CLIENT_SECRET'))
      ->get(env('ODS_DEMO_URI_4'));
      // dd(json_decode($response, true));
      // dd(json_encode($response));
      // dd($response.html(JSON.stringfy()));
      // dd($response['value']);
      dd($response['value']);
    return view('poc.odsorghierarchy2', ['response' => $response['value']]);
  }
  public function odsorghierarchy3()
  {
    $response = Http::withHeaders(['Content-Type' => 'application/x-www-form-urlencoded'])
      ->withBasicAuth(env('ODS_DEMO_CLIENT_ID'),env('ODS_DEMO_CLIENT_SECRET'))
      ->get(env('ODS_DEMO_URI_5'));
      dd($response['value']);
    return view('poc.odsorghierarchy3', ['response' => $response['value']]);
  }
  public function odspushtest()
  {
    $response = Http::withHeaders(['Content-Type' => 'application/x-www-form-urlencoded'])
      ->withBasicAuth(env('ODS_DEMO_CLIENT_ID'),env('ODS_DEMO_CLIENT_SECRET'))->get(env('ODS_DEMO_URI_2'));
    return view('poc.odspushtest', ['response' => $response['value']]);
  }
  public function bidashboard()
  {
      return view('poc.bidashboard');
  }

  public function odstest()
  {
    $now = \carbon\carbon::now()->subdays(30);
    // $response = Http::withHeaders(['Content-Type' => 'application/x-www-form-urlencoded'])->withBasicAuth(env('ODS_DEMO_CLIENT_ID'),env('ODS_DEMO_CLIENT_SECRET'))->get(env('ODS_DEMO_URI_1'))
    //   ->where(DB::raw("(DATE_FORMAT(date_posted, '%Y-%m-%d 00:00:00'))"), ">=", $now);
    // $response = Http::withHeaders(['Content-Type' => 'application/x-www-form-urlencoded'])->withBasicAuth(env('ODS_DEMO_CLIENT_ID'),env('ODS_DEMO_CLIENT_SECRET'))->get(env('ODS_DEMO_URI_1'))
    //   ->where("deptid", "=", "039-3965");
    // $response = Http::withHeaders(['Content-Type' => 'application/x-www-form-urlencoded'])->withBasicAuth(env('ODS_DEMO_CLIENT_ID'),env('ODS_DEMO_CLIENT_SECRET'))->get(env('ODS_DEMO_URI_1'));
    // $response = Http::withHeaders(['Content-Type' => 'application/x-www-form-urlencoded'])->withBasicAuth(env('ODS_DEMO_CLIENT_ID'),env('ODS_DEMO_CLIENT_SECRET'))->where("deptid", "=", "039-3965")->get(env('ODS_DEMO_URI_1'));
    $response = Http::withHeaders(['Content-Type' => 'application/x-www-form-urlencoded'])
      ->withBasicAuth(env('ODS_DEMO_CLIENT_ID'),env('ODS_DEMO_CLIENT_SECRET'))->get(env('ODS_DEMO_URI_1'), ['deptid' => '039-3965']);
    return view('poc.odstest', ['response' => $response['value']]);
  }

  public function odstest2()
  {
    $response = Http::withHeaders(['Content-Type' => 'application/x-www-form-urlencoded'])
      ->withBasicAuth(env('ODS_DEMO_CLIENT_ID'),env('ODS_DEMO_CLIENT_SECRET'))->get(env('ODS_DEMO_URI_3'));
    return view('poc.odstest2', ['response' => $response['value']]);
  }

  public function store_ods_demo(Request $request)
  {
    $demo_id = $request->input('id');
    $demo_firstname = $request->input('first_name');
    $demo_lastname = $request->input('last_name');
  }

}
