@extends('my-team.layout-direct-report')
@section('breadcrumb')
My Team >
My Employees >
@foreach($supervisorList ?? [] as $supervisor) 
    {{ $supervisor }} >
    {{ $supervisor }}'s Direct Reports >
@endforeach
{{ $userName }} >
<span class="text-primary">
    {{ $userName }}'s Direct Reports
</span>
@endsection
@section('page-content')
    <h1 class="my-4">{{ $userName }}'s Direct Reports</h1>
    {{$directReports->table()}}
@endsection
@push('js')
    {{$directReports->scripts()}}
@endpush