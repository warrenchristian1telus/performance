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
            $(function(){
                var table = $('.filtertable').DataTable
                (
                    {
                        processing: true,
                        serverSide: true,
                        scrollX: true,
                        stateSave: true,
                        deferRender: true,
                        ajax: {
                            url: "{{ route('sysadmin.access.manageexistingaccesslist') }}",
                            data: function(d) {
                                d.dd_level0 = $('#dd_level0').val();
                                d.dd_level1 = $('#dd_level1').val();
                                d.dd_level2 = $('#dd_level2').val();
                                d.dd_level3 = $('#dd_level3').val();
                                d.dd_level4 = $('#dd_level4').val();
                                d.criteria = $('#criteria').val();
                                d.search_text = $('#search_text').val();
                            }
                        },
                        columns: [
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
                            {title: 'Model ID', ariaTitle: 'Model ID', target: 0, type: 'num', data: 'model_id', name: 'model_has_roles.model_id', searchable: false, visible: false},
                            {title: 'Role ID', ariaTitle: 'Role ID', target: 0, type: 'num', data: 'role_id', name: 'model_has_roles.role_id', searchable: false, visible: false},
                            {title: 'Reason', ariaTitle: 'Reason', target: 0, type: 'num', data: 'reason', name: 'model_has_roles.reason', searchable: false, visible: false},
                       ]
                    }
                );

            });

            // $('.modalbutton').on('click', function(){
            //     const c_role_id = $(this).attr('data-roleid');
            //     const c_model_id = $(this).attr('data-modelid');
            //     // $ajax({
            //     //     url: 'sysadmin/access/get_access_entry/'+role_id+'/'+model_id,
            //     //     type: 'GET',
            //         // data: {
            //         //     "role_id: role_id",
            //         //     "model_type: model_type",
            //         //     "model_id: model_id",
            //         //     "reason: reason", 
            //         // },
            //     //     success:function(data){ 
            //     //         console.log(data);
            //     //         $('#reason').html(data.reason);
            //     //         $('#accessselect').html(data.role_id);
            //     //     }
            //     // });
            // });


        }
    </script>
@endpush


@push('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>  
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('js/bootstrap-multiselect.min.js')}} "></script>
    <script type="text/javascript">
        $(document).ready() 
        {
            // $('body').popover({
            //     selecttor: ['data-toggle'],
            //     trigger: 'hover',
            // });

            button.find('#search_text').val('9876784hfufgurjjh');
            $('#accessselect').val('IUYHGYTRFRED');

        }
     
            $('#editModal').on('show.bs.modal', function(e) {
                var button = $(event.relatedTarget);
                var roleId = button.data('data-roleid');
                var modelId = button.data('data-modelid');
                var reason = button.data('data-reason');
                var email = button.data('data-email');
                var modal = $(this);
                modal.find('#reason').val(reason);
                modal.find('#reason').val('IOUJHUYT');
                modal.find('#access_form input').val('WERTYUI');
                modal.find('#access_form reason').val('YTGFHJBN');
                $('#reason').val(reason);
                $('#reason').val('ASDFGHJKL');
                $('.reason').val(reason);
                $('.reason').val('ASDFGHJKL');
                var modalTitle = modal.querySelector('.modal-title');
                modalTitle.textContent = 'TRFGHGJH$RERYUUJJHG JJG H G G';
                var modalBodyInput = modal.querySelector('.modal-body input');
                modalBodyInput.value = 'POLKJIJHUYHGFYTFGTYF';
                $('#accessselect').val('ssHUYsHYfdTRF');
                $('#accessselect').val('IUYHGTFRTYUI');
                var anyValue = button.getAttribute('data-reason');
                console.log( $('select[name=accessselect]').val() );
                $('.accessselect').val('ssHUYsHYfdTRF');
                $('.accessselect').val('IUYHGTFRTYUI');

                button.find('#search_text').val('9876784hfufgurjjh');
                $('#search_text').val('KIUYHGBNMKYGHBNMJKIUYG');


                // $("#viewConversationModal").find("textarea").val('');
                // $("#viewConversationModal").find("input, textarea").prop("readonly", false);
                // $('#viewConversationModal').data('is-frozen', 0);

            })



        $(document).on('show.bs.modal'), '#editModal', function(e) {
                $('#reason').val('ASD UHYGFR EDFFGHJKL');
                $('#editModal').find('input, textarea').prop('readonly', false);
                $("#editModal").find("x-input").val('JIUHJUHYGTGF');
                $('.reason').val('kajskdjas');
                $('.reason').val('ASDFGHJKL');
                $('#accessselect').val('ssHUYsHYfdTRF');
                $('#accessselect').val('IUYHGTFRTYUI');
                $(this).find('#access_form').find('[name=reason]').val('YMCA');
                $('#search_text').val('OIUYTNHYH');
                console.log( $('select[name=accessselect]').val() );

            }



    </script>
@endpush



