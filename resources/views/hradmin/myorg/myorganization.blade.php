@extends('hradmin.layout')
@section('tab-content')

<div class="card" style="width: 2550px; ">
	<div class="card-body" style="width: 2500px">
		<h2 class="mb-4">{{__('All BC Public Service Employees')}}</h2>
		@include('hradmin.partials.filter')
		<p></p>
        <table class="table table-bordered myorgtable" id="myorgtable" style="width: 2500px; overflow-x: auto; ">
            <thead>
                <tr>
                    <th style="width: 200px; "> Employee Name </th>
                    <th style="width: 200px; "> Job Title </th>
                    <th style="width: 300px; "> Organization </th>
                    <th style="width: 300px; "> Program </th>
                    <th style="width: 300px; "> Division </th>
                    <th style="width: 300px; "> Branch </th>
                    <th style="width: 300px; "> Level 4 </th>
                    <th style="width: 100px; "> Department </th>
                    <th style="width: 100px; "> Active Goals </th>
                    <th style="width: 100px; "> Next Conversation </th>
                    <th style="width: 100px; "> Excused </th>
                    <th style="width: 100px; "> Shared Status </th>
                    <th style="width: 100px; "> Direct Reports </th>
                    <th style="width: 0px; "> Employee ID </th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
	</div>    
</div>   
@endsection


@push('css')
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <x-slot name="css">
        <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css" rel="stylesheet">
        <style>
        .text-truncate-30 {
            white-space: wrap; 
            overflow: hidden;
            text-overflow: ellipsis;
            width: 30em;
        }
    
        .text-truncate-10 {
            white-space: wrap; 
            overflow: hidden;
            text-overflow: ellipsis;
            width: 5em;
        }
        #myorgtable_filter label {
            text-align: right !important;
        }
    </style>
    </x-slot>
    
@endpush
@push('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
    <script src="//cdn.ckeditor.com/4.17.2/basic/ckeditor.js"></script>
    <script type="text/javascript">
        $(function ()
        {
            var table = $('.myorgtable').DataTable
            (
                {
                    retrieve: true,
                    processing: true,
                    serverSide: true,
                    ajax: 
                    {
                        url: "{{ route('hradmin.myorg.myorganization') }}",
                        data: function (d) 
                        {
                            d.dd_level0 = $('#dd_level0').val();
                            d.dd_level1 = $('#dd_level1').val();
                            d.dd_level2 = $('#dd_level2').val();
                            d.dd_level3 = $('#dd_level3').val();
                            d.dd_level4 = $('#dd_level4').val();
                            d.criteria = $('#criteria').val();
                            d.search_text = $('#search_text').val();
                        }
                    },
                    "rowCallback": function( row, data ) 
                    {
                    },
                    columns: 
                    [
                        {data: 'employee_name', name: 'employee_name', searchable: true},
                        {data: 'job_title', name: 'job_title', searchable: true},
                        {data: 'organization', name: 'level0', searchable: true},
                        {data: 'level1_program', name: 'level1', searchable: true},
                        {data: 'level2_division', name: 'level2', searchable: true},
                        {data: 'level3_branch', name: 'level3', searchable: true},
                        {data: 'level4', name: 'level4', searchable: true},
                        {data: 'deptid', name: 'deptid', searchable: true},
                        {data: 'activeGoals', name: 'activeGoals', searchable: false},
                        {data: 'nextConversationDue', name: 'nextConversationDue', searchable: false},
                        {data: 'excused', name: 'excused', searchable: false},
                        {data: 'shared', name: 'shared', searchable: false},
                        {data: 'reportees', name: 'reportees', searchable: false},
                        {data: 'id', name: 'id', visible: false, searchable: false},
                    ]
                }
            );
        });
    </script>
@endpush



