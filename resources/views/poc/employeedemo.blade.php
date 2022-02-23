@extends('poc.layout')
@section('tab-content')
<div class="row-container">
  <p>ODS Data on https://analytics-testapi.psa.gov.bc.ca/apiserver/api.rsc/Datamart_ePerform_employee_demo/ </p>
  <!-- <table border=1>
    <tr>
      <td>Date Posted</td>
      <td>Employee ID</td>
      <td>Employee Record</td>
      <td>First Name</td>
      <td>Last Name</td>
    </tr>
    @foreach ($response as $item)
    <tr>
      <td>{{$item['date_posted']}}</td>
      <td>{{$item['employee_id']}}</td>
      <td>{{$item['Empl_Record']}}</td>
      <td>{{$item['employee_first_name']}}</td>
      <td>{{$item['employee_last_name']}}</td>
    </tr>
    @endforeach
  </table> -->
  <!-- <p>Raw Data</p> -->
  @dd($response);
</div>
<div class="row-container b">
  <p>Datamart_TMPerform_ps_employee_demo</p>
</div>
@endsection
