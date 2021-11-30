@extends('poc.layout')
@section('tab-content')
<div class="row-container">
  <p>Proof of Concept</p>
  <p>https://analytics-test.psa.gov.bc.ca/</p>
    <iframe src="https://analytics-test.psa.gov.bc.ca/" frameborder="0" scrolling="no" style="overflow:hidden;height:40vh;width:60vh" >
    </iframe>
</div>
<div class="row-container">
  <p>https://analytics-test.psa.gov.bc.ca/Account/Login?ReturnUrl=%2F</p>
    <iframe src="https://analytics-test.psa.gov.bc.ca/Account/Login?ReturnUrl=%2F" frameborder="0" scrolling="no" style="overflow:hidden;height:40vh;width:60vh" >
    </iframe>
</div>
<div class="row-container">
  <br>
  <p>Another sample (BC CDC)</p>
    <iframe src="https://experience.arcgis.com/experience/a6f23959a8b14bfa989e3cda29297ded" frameborder="0" scrolling="no" style="overflow:hidden;height:80vh;width:100vh" >
    </iframe>
</div>
@endsection
