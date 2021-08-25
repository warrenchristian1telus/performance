@extends('my-team.layout-direct-report')
@section('breadcrumb')
&nbsp;
@endsection
@section('page-content')
    <h1 class="my-4">{{ $userName }}'s Direct Reports</h1>
    {{$directReports->table()}}
@endsection
@push('js')
    {{$directReports->scripts()}}
@endpush