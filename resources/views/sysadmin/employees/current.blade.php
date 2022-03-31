@extends('sysadmin.layout')
@section('tab-content')
<div>
    <div class="h4 p-3">{{__('Current Employees')}}</div>
    <div class="p-3">
        <div class="row">
            <div class="col">
                <p>Below is a list of all employees in the BC Public Service who are currently active in the performance development process.</p>
            </div>
        </div>
    </div>
</div>
<div>
    <div class="card card-primary shadow mb-3" style="overflow-x: auto;">
        <div>
            <form action="" method="get" id="filter-menu">
                @csrf
                <table class="uk-table m-3">
                    <tbody>
                        @include('sysadmin.partials.organization_filter')
                        <tr style="text-align: left;" class="p-2 form-group">
                            <td style="text-align: left; width: 300px;" class="p-2 form-group">
                                <label for='jobTitle'>Job Titles</label>
                                <select class="form-control" name="jobTitle" id="jobTitle">
                                    <option value="all">All</option>
                                    @foreach ($jobTitles as $j1)
                                        @if ($request->jobTitle == $j1->job_title)
                                            <option value="{{ $j1->title }}" selected>{{ $j1->job_title }}</option>
                                        @else
                                            <option value="{{ $j1->title }}">{{ $j1->job_title }}</option>
                                        @endif
                                    @endforeach
                               </select>
                            </td>
                            <td style="text-align: left; width: 300px; " class="p-2 form-group">
                                <label for='activeSince'>
                                    Active Since
                                </label>
                                <input type="date" class="form-control" name="activeSince" value="{{request()->activeSince ?? ''}}">
                            </td>
                            <td style="text-align: left; width: 300px; " class="p-2 form-group">
                                <label for='searchText'>
                                    Search
                                </label>
                                <input type="text" name="searchText" class="form-control" value="{{request()->searchText}}">
                            </td>
                            <td style="text-align: left; width: 200px; " class"p-2 form-group">
                                <button class="btn btn-primary mt-4 px-5" name="searchBtn2" id="searchBtn2">Filter</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                {{ csrf_field() }}
            </form>
        </div>
        <div id="collapseOne" class="collapse {{$iEmpl ? 'show' : ''}}" aria-labelledby="headingOne" data-parent="#accordionLibrary">
            <div class="table table-wrapper d-flex" style="width: 2600px ">
                <div class="md-card-content" style="overflow-x: auto; ">
                    <table class="uk-table m-3" style="width: 2600px; overflow-x: auto; ">
                        <thead>
                            <tr>
                                <th style="text-align: left; width: 300px; "> Employee Name</th>
                                <th style="text-align: left; width: 300px; "> Job Title</th>
                                <th style="text-align: left; width: 400px; "> Organization</th>
                                <th style="text-align: left; width: 400px; "> Organization Level 1</th>
                                <th style="text-align: left; width: 400px; "> Organization Level 2</th>
                                <th style="text-align: left; width: 400px; "> Organization Level 3</th>
                                <th style="text-align: left; width: 400px; "> Organization Level 4</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($iEmpl as $o)
                            <tr>
                                <td style="text-align: left; width: 300px; ">
                                    {{-- <a href='# class="edit-goal-detail highlighter" data-id="{{$o->guid}}"'>{{ $o->employee_name }}</a> --}}
                                    {{ $o->employee_name }}
                                </td>
                                <td style="text-align: left; width: 300px; ">
                                    {{-- <a href='# class="edit-goal-detail highlighter" data-id="{{$o->guid}}"'>{{ $o->job_title }}</a> --}}
                                    {{ $o->job_title }}
                                </td>
                                <td style="text-align: left; width: 400px; ">
                                    {{-- <a href='# class="edit-goal-detail highlighter" data-id="{{$o->guid}}"'>{{ $o->organization }}</a> --}}
                                    {{ $o->organization }}
                                </td>
                                <td style="text-align: left; width: 400px; ">
                                    {{-- <a href='# class="edit-goal-detail highlighter" data-id="{{$o->guid}}"'>{{ $o->level1_program }}</a> --}}
                                    {{ $o->level1_program }}
                                </td>
                                <td style="text-align: left; width: 400px; ">
                                    {{-- <a href='# class="edit-goal-detail highlighter" data-id="{{$o->guid}}"'>{{ $o->level2_division }}</a> --}}
                                    {{ $o->level2_division }}
                                </td>
                                <td style="text-align: left; width: 400px; ">
                                    {{-- <a href='# class="edit-goal-detail highlighter" data-id="{{$o->guid}}"'>{{ $o->level3_branch }}</a> --}}
                                    {{ $o->level3_branch }}
                                </td>
                                <td style="text-align: left; width: 400px; ">
                                    {{-- <a href='# class="edit-goal-detail highlighter" data-id="{{$o->guid}}"'>{{ $o->level4 }}</a> --}}
                                    {{ $o->level4 }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{ $iEmpl->links() }}
</div>

@include('sysadmin.partials.organization_script')

{{-- @push('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endpush

@push('js')
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>
    $(document).on('click', '#searchBtn', function(e) {
    $("#filter-menu").submit();
    });
    $('#filter-menu select, #filter-menu input').change(function () {
        $("#filter-menu").submit();
    });
</script>
@endpush --}}

@endsection
