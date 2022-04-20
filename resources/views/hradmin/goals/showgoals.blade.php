@extends('hradmin.layout')
@section('tab-content')

<div class="card" style="width: 2850px; ">
	<div class="card-body" style="width: 2800px">
		<h2 class="mb-4">{{__('Manage Existing Goals')}}</h2>
		@include('hradmin.partials.filter')
		<p></p>
        <table class="table table-bordered goaltable" id="goaltable" style="width: 2800px; overflow-x: auto; ">
            <thead>
                <tr>
                    <th style="width: 400px; "> Goal Title </th>
                    <th style="width: 200px; "> Goal Type </th>
                    <th style="width: 100px; "> Mandatory </th>
                    <th style="width: 100px; "> Goal Start Date </th>
                    <th style="width: 100px; "> Goal Target Date </th>
                    <th style="width: 200px; "> Created By </th>
                    <th style="width: 100px; "> Audience </th>
                    <th style="width: 300px; "> Organization </th>
                    <th style="width: 300px; "> Program </th>
                    <th style="width: 300px; "> Division </th>
                    <th style="width: 300px; "> Branch </th>
                    <th style="width: 300px; "> Level 4 </th>
                    <th style="width: 100px; "> Action </th>
                    <th style="width: 0px; "> Goal ID </th>
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
            var table = $('.goaltable').DataTable
            (
                {
                    retrieve: true,
                    processing: true,
                    serverSide: true,
                    ajax: 
                    {
                        url: "{{ route('hradmin.goals.listgoals') }}",
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
                        {data: 'title', name: 'title', searchable: true},
                        {data: 'goaltype', name: 'goaltype', searchable: true},
                        {data: 'mandatory', name: 'is_mandatory', searchable: false},
                        {data: 'start_date', name: 'start_date', searchable: false},
                        {data: 'target_date', name: 'target_date', searchable: false},
                        {data: 'createdby', name: 'createdby', searchable: false},
                        {data: 'audience', name: 'audience', searchable: false},
                        {data: 'organization', name: 'oraganization', searchable: true},
                        {data: 'level1_program', name: 'level1', searchable: true},
                        {data: 'level2_division', name: 'level2', searchable: true},
                        {data: 'level3_branch', name: 'level3', searchable: true},
                        {data: 'level4', name: 'level4', searchable: true},
                        {data: 'action', name: 'action', orderable: false, searchable: true},
                        {data: 'id', name: 'id', visible: false, searchable: false},
                    ]
                }
            );
        });
    </script>
@endpush



