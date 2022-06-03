<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Client;

class POCController extends Controller
{
    public function employeedemo()
    {
      $authtoken = base64_encode(env('ODS_DEMO_CLIENT_ID') . ':' . env('ODS_DEMO_CLIENT_SECRET'));
      $criteria_dt = Carbon::now()->format('c');
      $criteria_dt = Carbon::create(2022, 4, 7, 0, 0, 7, 'PDT')->format('c');
      // dd(Carbon::now()->format('c'));


      // dd(base64_decode($authtoken));

      // $authtoken='YmNlcGVyZm9ybTo3ajNLNWQyZDJUMWE2czVFMXcycA==';
      // $response = Http::dd()->acceptJson()
      $response = Http::acceptJson()
      // ->withHeaders(['Content-Type' => 'application/x-www-form-urlencoded'])
      // ->withDigestAuth(env('ODS_DEMO_CLIENT_ID'),env('ODS_DEMO_CLIENT_SECRET'))
      // ->withToken($authtoken)
      ->withBasicAuth(env('ODS_DEMO_CLIENT_ID'),env('ODS_DEMO_CLIENT_SECRET'))
      ->withOptions(['query' => [
        // '$top' => 200, 
        // '$skip' => 0, 
        // '$select' => 'EMPLID,EMPL_RCD,EFFDT,EFFSEQ,BUSINESS_UNIT,DEPTID',
        // '$filter' => "BUSINESS_UNIT eq 'BC010' and EMPLID eq '000005'",
        // '$filter' => "date_updated gt '" . $criteria_dt . "'",
        '$orderby' => 'EMPLID,EMPL_RCD,EFFDT,EFFSEQ',
      ], 
        // 'debug' => true, 
      ])
      ->get(env('ODS_EMPLOYEE_DEMO_URI'));
      // ->get(env('ODS_EMPLOYEE_DEMO_URI') . '?$EMPLID=000136');
      // ->get(env('ODS_EMPLOYEE_DEMO_URI') . '?EMPLID=000136&$top=10&$skip=10');
      // ->paginate(100);
        // return view('poc.odsorghierarchy', ['response' => $response['value']]);

      // $authtoken = base64_encode(env('ODS_DEMO_CLIENT_ID') . ':' . env('ODS_DEMO_CLIENT_SECRET'));

      // <script type="text/javascript">
      // $.get(env('ODS_EMPLOYEE_DEMO_URI'), { "@authtoken": $authtoken }, function(data) {
      //     $("#result").html(JSON.stringify(data));
      //   });
      // </script>




      // $client = new Client();
      // $response = $client
      // ->request('GET', env('ODS_EMPLOYEE_DEMO_URI'), ['auth' => [env('ODS_DEMO_CLIENT_ID'), env('ODS_DEMO_CLIENT_SECRET')],
      // 'query' => ['$top' => 12, '$skip=12', ], ])
      // ;
      // dd($response);






      // if($response->successful()){
      //   // dd('Succcess!');
      //   // dd($response->collect());
      //   // dd($response->json());
      //   // dd($response->object());
      //   // dd($response->headers());
      //   // dd($response->header('Content-Type'));
      //   // dd($response['value']->count());
      //   // dd($response);
      //   dd($response->json());
      // }else{
      //   // dd('Failed!');
      //   if($response->serverError()){
      //     dd('Failed:  Server:  ' . $response->serverError());
      //   }
      //   if($response->clientError()){
      //     dd('Failed:  Client:  ' . $response->clientError());
      //   }
      //   dd('Failed:  Unknown error.');
      // }



        // dd($response->count());
        // dd($response['value']);
        dd($response['value']);
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

  // public function store_ods_demo(Request $request)
  // {
  //   $demo_id = $request->input('id');
  //   $demo_firstname = $request->input('first_name');
  //   $demo_lastname = $request->input('last_name');
  // }

}
