<div class="card px-3 pb-3" id='listitem'>
    <div class="p-0">
        <div class="accordion-option">
            @error('userCheck')                
            <span class="text-danger">
                {{  'The recipient is required.'  }}
            </span>
            @enderror
        </div>
    </div>


    <div class="card" id="listdata">
        <div class="card-body">
            <h6></h6>
            <table class="table table-bordered" id="aemployee-list-table"></table>
        </div>    
    </div>   
</div>


@push('css')

    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css" rel="stylesheet">
	<style>
	#aemployee-list-table_filter label {
		text-align: right !important;
        padding-right: 10px;
	} 
    </style>
@endpush

@push('js')
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>

    <script>
    
        $(document).ready(function() {
            var user_selected = [];

            var oTable = $('#aemployee-list-table').DataTable({
                scrollX: true,
                retrieve: true,
                searching: false,
                processing: true,
                serverSide: true,
                select: true,
                order: [[1, 'asc']],
                ajax: {
                    url: '{{ route('sysadmin.goalbank.aemployee.list') }}',
                    data: function (d) {
                        d.add_level0 = $('#add_level0').val();
                        d.add_level1 = $('#add_level1').val();
                        d.add_level2 = $('#add_level2').val();
                        d.add_level3 = $('#add_level3').val();
                        d.add_level4 = $('#add_level4').val();
                        d.acriteria = $('#acriteria').val();
                        d.asearch_text = $('#asearch_text').val();
                    }
                },
                "fnDrawCallback": function() {
                    list = ( $('#aemployee-list-table input:checkbox') );
                    $.each(list, function( index, item ) {
                        var index = $.inArray( item.value , ag_selected_employees);
                        if ( index === -1 ) {
                            $(item).prop('checked', false); // unchecked
                        } else {
                            $(item).prop('checked', true);  // checked 
                        }
                    });

                    // update the check all checkbox status 
                    if (ag_selected_employees.length == 0) {
                        $('#employee-list-select-all').prop("checked", false);
                        $('#employee-list-select-all').prop("indeterminate", false);   
                    } else if (ag_selected_employees.length == ag_matched_employees.length) {
                        $('#employee-list-select-all').prop("checked", true);
                        $('#employee-list-select-all').prop("indeterminate", false);   
                    } else {
                        $('#employee-list-select-all').prop("checked", false);
                        $('#employee-list-select-all').prop("indeterminate", true);    
                    }

                },
                "rowCallback": function( row, data ) {
                },
                columns: [
                    {title: '<input name="aselect_all" value="1" id="aemployee-list-select-all" type="checkbox" />', ariaTitle: 'aemployee-list-select-all', target: 0, type: 'string', data: 'aselect_users', name: 'aselect_users', orderable: false, searchable: false},
                    {title: 'ID', ariaTitle: 'ID', target: 0, type: 'string', data: 'employee_id', name: 'employee_id', className: 'dt-nowrap'},
                    {title: 'Name', ariaTitle: 'Name', target: 0, type: 'string', data: 'employee_name', name: 'employee_name', className: 'dt-nowrap'},
                    {title: 'Classification', ariaTitle: 'Classification', target: 0, type: 'string', data: 'jobcode_desc', name: 'jobcode_desc', className: 'dt-nowrap'},
                    {title: 'Email', ariaTitle: 'Email', target: 0, type: 'string', data: 'employee_email', name: 'employee_email', className: 'dt-nowrap'},
                    {title: 'Organization', ariaTitle: 'Organization', target: 0, type: 'string', data: 'organization', name: 'organization', className: 'dt-nowrap'},
                    {title: 'Level 1', ariaTitle: 'Level 1', target: 0, type: 'string', data: 'level1_program', name: 'level1_program', className: 'dt-nowrap'},
                    {title: 'Level 2', ariaTitle: 'Level 2', target: 0, type: 'string', data: 'level2_division', name: 'level2_division', className: 'dt-nowrap'},
                    {title: 'Level 3', ariaTitle: 'Level 3', target: 0, type: 'string', data: 'level3_branch', name: 'level3_branch', className: 'dt-nowrap'},
                    {title: 'Level 4', ariaTitle: 'Level 4', target: 0, type: 'string', data: 'level4', name: 'level4', className: 'dt-nowrap'},
                    {title: 'Dept', ariaTitle: 'Dept', target: 0, type: 'string', data: 'deptid', data: 'deptid', name: 'deptid', className: 'dt-nowrap'},
                ],
            });


            $('#aemployee-list-table tbody').on( 'click', 'input:checkbox', function () {

                // if the input checkbox is selected 
                var id = this.value;
                var index = $.inArray(id, ag_selected_employees);
                if(this.checked) {
                    ag_selected_employees.push( id );
                } else {
                    ag_selected_employees.splice( index, 1 );
                }

                // update the check all checkbox status 
                if (ag_selected_employees.length == 0) {
                    $('#employee-list-select-all').prop("checked", false);
                    $('#employee-list-select-all').prop("indeterminate", false);   
                } else if (ag_selected_employees.length == ag_matched_employees.length) {
                    $('#employee-list-select-all').prop("checked", true);
                    $('#employee-list-select-all').prop("indeterminate", false);   
                } else {
                    $('#employee-list-select-all').prop("checked", false);
                    $('#employee-list-select-all').prop("indeterminate", true);    
                }
            });

            // // Handle click on "Select all" control
            // $('#employee-list-select-all').on('click', function() {
            //     console.log('Selected All BBB');
            //     // Check/uncheck all checkboxes in the table
            //     $('#employee-list-table tbody input:checkbox').prop('checked', this.checked);
            //     if (this.checked) {
            //         g_selected_employees = g_matched_employees.map((x) => x);
            //         $('#employee-list-select-all').prop("checked", true);
            //         $('#employee-list-select-all').prop("indeterminate", false);    
            //     } else {
            //         g_selected_employees = [];
            //         $('#employee-list-select-all').prop("checked", false);
            //         $('#employee-list-select-all').prop("indeterminate", false);    
            //     }    
            // });

        });

    </script>
@endpush

