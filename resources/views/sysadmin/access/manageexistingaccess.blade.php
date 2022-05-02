@extends('sysadmin.layout')
@section('tab-content')

<div class="card">
	<div class="card-body">
        <div class="h4">{{__('Manage Existing Access')}}</div>
        @include('sysadmin.partials.filter')
		<p></p>
        <table class="table table-bordered filtertable" id="filtertable" style="width: 100%; overflow-x: auto; "></table>
	</div>    
</div>   
@include('sysadmin/access/partials/access-edit-modal')
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
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>  
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
                            url: "{{ route('sysadmin.access.manageexistingaccesslist') }}",
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
                            {title: 'ID', ariaTitle: 'ID', target: 0, type: 'string', data: 'employee_id', name: 'employee_demo.employee_id', searchable: true},
                            {title: 'Name', ariaTitle: 'Name', target: 0, type: 'string', data: 'employee_name', name: 'employee_demo.employee_name', searchable: true},
                            {title: 'eMail', ariaTitle: 'eMail', target: 0, type: 'string', data: 'email', name: 'users.email', searchable: true},
                            {title: 'Job Title', ariaTitle: 'Job Title', target: 0, type: 'string', data: 'job_title', name: 'employee_demo.job_title', searchable: true},
                            {title: 'Organization', ariaTitle: 'Organization', target: 0, type: 'string', data: 'organization', name: 'employee_demo.organization', searchable: true},
                            {title: 'Level 1', ariaTitle: 'Level 1', target: 0, type: 'string', data: 'level1_program', name: 'employee_demo.level1_program', searchable: true},
                            {title: 'Level 2', ariaTitle: 'Level 2', target: 0, type: 'string', data: 'level2_division', name: 'employee_demo.level2_division', searchable: true},
                            {title: 'Level 3', ariaTitle: 'Level 3', target: 0, type: 'string', data: 'level3_branch', name: 'employee_demo.level3_branch', searchable: true},
                            {title: 'Level 4', ariaTitle: 'Level 4', target: 0, type: 'string', data: 'level4', name: 'employee_demo.level4', searchable: true},
                            {title: 'Dept', ariaTitle: 'Dept', target: 0, type: 'string', data: 'deptid', name: 'employee_demo.deptid', searchable: true},
                            {title: 'Access Level', ariaTitle: 'Access Level', target: 0, type: 'string', data: 'longname', name: 'roles.longname', searchable: true},
                            {title: 'Action', ariaTitle: 'Action', target: 0, type: 'string', data: 'action', name: 'action', orderable: false, searchable: false},
                            {title: 'User ID', ariaTitle: 'User ID', target: 0, type: 'num', data: 'id', name: 'users.id', searchable: false, visible: false},
                            {title: 'Role ID', ariaTitle: 'Role ID', target: 0, type: 'num', data: 'role_id', name: 'model_has_roles.role_id', searchable: false, visible: false},
                            {title: 'Reason', ariaTitle: 'Reason', target: 0, type: 'num', data: 'reason', name: 'model_has_roles.reason', searchable: false, visible: false},
                       ]
                    }
                );

                // $('.body').on('click'), '#modalbutton' 
                // {
                //     $('#email').val($(this).data('email'));
                //     $('#accessselect').val($(this).data('role_id'));
                //     $('#id').val($(this).data('id'));
                //     $('#reason').val($(this).data('reason'));
                // }

                // $('#modalbutton').click(function()
                // {
                //     $('#email').val($(this).data('email'));
                //     $('#accessselect').val($(this).data('role_id'));
                //     $('#id').val($(this).data('id'));
                //     $('#reason').val($(this).data('reason'));
                    

                //     // var userid = $(this).data('id');

                //     // $.ajax({
                //     //     url: '{{"(sysadmin.access.accessedit"}}',
                //     //     type: 'post',
                //     //     data: 
                //     //     {
                //     //         id: userid
                //     //     },
                //     //     success: function(response)
                //     //     {
                //     //         $('.modal-body').html(response);
                //     //     }
                //     // })
                // });

                // $(document).on('click', '#modalbutton', function()
                // {
                //     var v_id = $('#employee_id').text();
                //     var v_roleid = $('#role_id').text();
                //     var v_email = $('#email').text();
                //     var v_reason = $('#reason').text();

                //     $('#editModal').modal('show');
                //     // $('#accessselect').val(v_roleid);
                //     // $('#reason').val(v_reason);
                //     // $('#email').val(v_email);
                    
                // });





            });

        }
    </script>
@endpush



