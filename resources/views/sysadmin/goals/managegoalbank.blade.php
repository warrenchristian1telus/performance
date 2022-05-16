@extends('sysadmin.layout')
@section('tab-content')
<div class="col-md-8"> @include('sysadmin.partials.tabs')</div>

<div class="card" >
	<div class="card-body">
        <div class="h4">{{__('Manage Goal Bank')}}</div>
        @include('sysadmin.partials.filter')
		<p></p>
        <table class="table table-bordered filtertable" id="filtertable" style="width: 100%; overflow-x: auto; "></table>
	</div>    
</div>   
@endsection


@push('css')
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <x-slot name="css">
        <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css" rel="stylesheet">
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
            #filtertable_filter label {
                text-align: right !important;
            }
        </style>
    </x-slot>
    
@endpush
@push('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
        $(document).ready()
        {
            $(function ()
            {
                var table = $('.filtertable').DataTable
                (
                    {
                        processing: true,
                        serverSide: true,
                        scrollX: true,
                        stateSave: true,
                        deferRender: true,
                        ajax: 
                        {
                            url: "{{ route('sysadmin.goals.managegoalbanklist') }}",
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
                        columns: 
                        [
                            {title: 'Goal Title', ariaTitle: 'Goal Title', target: 0, type: 'string', data: 'title', name: 'title', searchable: true},
                            {title: 'Goal Type', ariaTitle: 'Goal Type', target: 0, type: 'string', data: 'goal_type_name', name: 'goal_type_name', searchable: false},
                            {title: 'Mandatory', ariaTitle: 'Mandatory', target: 0, type: 'string', data: 'mandatory', name: 'mandatory', searchable: false},
                            {title: 'Goal Creation Date', ariaTitle: 'Goal Creation Date', target: 0, type: 'date', data: 'created_at', name: 'goals.created_at', searchable: false},
                            {title: 'Created By', ariaTitle: 'Created By', target: 0, type: 'string', data: 'creator_name', name: 'creator_name', searchable: false},
                            {title: 'Audience', ariaTitle: 'Audience', target: 0, type: 'num', data: 'audience', name: 'audience', searchable: false},
                            {title: 'Action', ariaTitle: 'Action', target: 0, type: 'string', data: 'action', name: 'action', orderable: false, searchable: false},
                            {title: 'Goal ID', ariaTitle: 'Goal ID', target: 0, type: 'string', data: 'id', name: 'id', searchable: false, visible: false},
                        ]
                    }
                );
            });
        }
    </script>
@endpush



