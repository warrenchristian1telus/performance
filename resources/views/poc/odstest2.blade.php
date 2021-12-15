@extends('poc.layout')
@section('tab-content')
<div class="row-container">
  <p>Data on Performance employee_demo</p>
  @dd(DB::table('employee_demo')->get());
  <!-- @dd(EmployeeDemo::all()->get()); -->
</div>
@endsection
