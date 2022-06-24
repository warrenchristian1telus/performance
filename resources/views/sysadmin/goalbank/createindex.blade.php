<x-side-layout title="{{ __('Dashboard') }}">
    <div name="header" class="container-header p-n2 "> 
        <div class="container-fluid">
            <h3>Goal Bank</h3>
            @include('sysadmin.goalbank.partials.tabs')
        </div>
    </div>

	<p class="px-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tincidunt, nibh nec interdum fermentum, est metus rutrum elit, in molestie ex massa ut urna. Duis dignissim tortor ipsum, dignissim rutrum quam gravida sed. Mauris auctor malesuada luctus. Praesent vitae ante et diam gravida lobortis. Donec eleifend euismod scelerisque. Curabitur laoreet erat sit amet tortor rutrum tristique. Sed lobortis est ac mauris lobortis euismod. Morbi tincidunt porta orci eu elementum. Donec lorem lacus, hendrerit a augue sed, tempus rhoncus arcu. Praesent a enim vel eros elementum porta. Nunc ut leo eu augue dapibus efficitur ac ac risus. Maecenas risus tellus, tincidunt vitae finibus vel, ornare vel neque. Curabitur imperdiet orci ac risus tempor semper. Integer nec varius urna, sit amet rhoncus diam. Aenean finibus, sapien eu placerat tristique, sapien dui maximus neque, id tempor dui magna eget lorem. Suspendisse egestas mauris non feugiat bibendum.</p>
	<p class="px-3">Cras quis augue quis risus auctor facilisis quis ac ligula. Fusce vehicula consequat dui, et egestas augue sodales aliquam. In hac habitasse platea dictumst. Curabitur sit amet nulla nibh. Morbi mollis malesuada diam ut egestas. Pellentesque blandit placerat nisi ac facilisis. Vivamus consequat, nisl a lacinia ultricies, velit leo consequat magna, sit amet condimentum justo nibh id nisl. Quisque mattis condimentum cursus. Nullam eget congue augue, a molestie leo. Aenean sollicitudin convallis arcu non maximus. Curabitur ut lacinia nisi. Nam cursus venenatis lacus aliquet dapibus. Nulla facilisi.</p>

	<form id="notify-form" action="{{ route('sysadmin.goalbank.savenewgoal') }}" method="post">
		@csrf

        <div class="container-fluid">
			<br>
			<h6 class="text-bold">Step 1. Enter Goal Details</h6>
			<br>

			<div class="row">
				<div class="col col-md-2">
					<x-dropdown :list="$goalTypes" label="Goal Type" name="goal_type_id" />
				</div>
				<div class="col col-md-8">
					<x-input label="Goal Title" name="title" tooltip='A short title (1-3 words) used to reference the goal throughout the Performance platform.' />
					<small class="text-danger error-title"></small>
				</div>
				<div class="col col-md-2">
					<x-dropdown :list="$mandatoryOrSuggested" label="Mandatory/Suggested" name="is_mandatory" :selected="request()->is_mandatory"></x-dropdown>
				</div>
			</div>
			<div class="row">
				<div class="col-md-2">
					<x-dropdown :list="$tags" label="Tags" name="tag_ids[]" class="tags" multiple/>
					<small  class="text-danger error-tag_ids"></small>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<x-textarea label="Description" name="what" tooltip='A concise opening statement of what you plan to achieve. For example, "My goal is to deliver informative MyPerformance sessions to ministry audiences".'  />
					<small class="text-danger error-what"></small>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<x-textarea label="Measures of Success" name="measure_of_success" tooltip='A qualitative or quantitative measure of success for your goal. For example, "Deliver a minimum of 2 sessions per month that reach at least 100 people"'/>
					<small class="text-danger error-measure_of_success"></small>
				</div>
			</div>
			<div class="row">
				<div class="col col-md-2">
					<x-input label="Start Date " class="error-start" type="date" name="start_date"  />
					<small  class="text-danger error-start_date"></small>
				</div>
				<div class="col col-md-2">
					<x-input label="End Date " class="error-target" type="date" name="target_date"  />
					<small  class="text-danger error-target_date"></small>
				</div>
			</div>
		</div>

        <div class="container-fluid">
			<br>
			<h6 class="text-bold">Step 2. Select audience</h6>
			<br>

			<div class="card col-md-4" >
				<div class="card-body">
					<div class="row">
						<div class="col">
							<label>
								<input type="radio" id="opt_audience1" name="opt_audience" value="byEmp" checked> Individual(s)
							</label>
						</div>
						<div class="col">
							<label>
								<input type="radio" id="opt_audience2" name="opt_audience" value="byOrg"> Business Unit(s)
							</label>
						</div>
					</div>
				</div>
			</div>

			<input type="hidden" id="selected_emp_ids" name="selected_emp_ids" value="">
			<input type="hidden" id="selected_org_nodes" name="selected_org_nodes" value="">
			<input type="hidden" id="eselected_emp_ids" name="eselected_emp_ids" value="">
			<input type="hidden" id="eselected_org_nodes" name="eselected_org_nodes" value="">

			@include('sysadmin.goalbank.partials.filter')
			@include('sysadmin.goalbank.partials.filter2')

			<div class="pl-2" id='itemgroup1'>
				<nav>
					<div class="nav nav-tabs" id="nav-tab" role="tablist">
						<a class="nav-item nav-link active" id="nav-list-tab" data-toggle="tab" href="#nav-list" role="tab" aria-controls="nav-list" aria-selected="true">List</a>
						<a class="nav-item nav-link" id="nav-tree-tab" data-toggle="tab" href="#nav-tree" role="tab" aria-controls="nav-tree" aria-selected="false">Tree</a>
					</div>
				</nav>
				<div class="tab-content" id="nav-tabContent">
					<div class="tab-pane fade show active" id="nav-list" role="tabpanel" aria-labelledby="nav-list-tab">
						@include('sysadmin.goalbank.partials.recipient-list')
					</div>
					<div class="tab-pane fade" id="nav-tree" role="tabpanel" aria-labelledby="nav-tree-tab" loaded="">
						<div class="mt-2 fas fa-spinner fa-spin fa-3x fa-fw loading-spinner" id="tree-loading-spinner" role="status" style="display:none">
							<span class="sr-only">Loading...</span>
						</div>
					</div>
				</div>
			</div>

			<div class="pl-2" id='itemgroup2'>
				<nav>
					<div class="nav nav-tabs" id="enav-tab" role="tablist">
						<a class="nav-item nav-link" id="enav-tree-tab" data-toggle="tab" href="#enav-tree" role="tab" aria-controls="enav-tree" aria-selected="false">Tree</a>
					</div>
				</nav>
				<div id="enav-tree" aria-labelledby="enav-tree-tab" loaded="loaded">
					<div class="mt-2 fas fa-spinner fa-spin fa-3x fa-fw loading-spinner" id="etree-loading-spinner" role="status" style="display:none">
						<span class="sr-only">Loading...</span>
					</div>
				</div>
			</div>
		</div>

        <div class="container-fluid">
			<br>
			<h6 class="text-bold">Step 3. Finish</h6>
			<br>
			<div class="row">
				<div class="col-md-3 mb-2">
					<button class="btn btn-primary mt-2" type="button" onclick="confirmSaveChangesModal()" name="btn_confirm" value="btn_confirm">Add Goal</button>
					<button class="btn btn-secondary mt-2">Cancel</button>
				</div>
			</div>
		</div>

		<!----modal starts here--->
		<div id="saveGoalModal" class="modal" role='dialog'>
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Confirmation</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<p>Default ?</p>
					</div>
					<div class="modal-footer">
						<button class="btn btn-primary mt-2" type="submit" id="btn_send" name="btn_send" value="btn_send">Add New Goal</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					</div>
					
				</div>
			</div>
		</div>
		<!--Modal ends here--->	

	</form>

	<h6 class="m-20">&nbsp;</h6>
	<h6 class="m-20">&nbsp;</h6>
	<h6 class="m-20">&nbsp;</h6>

    @push('css')
        <link rel="stylesheet" href="{{ asset('css/bootstrap-multiselect.min.css') }}">
    @endpush

	<x-slot name="css">
		<style>

			.select2-container .select2-selection--single {
				height: 38px !important;
			}EmployeeID

			.select2-container--default .select2-selection--single .select2-selection__arrow {
				height: 38px !important;
			}

			.pageLoader{
				/* background: url(../images/loader.gif) no-repeat center center; */
				position: fixed;
				top: 0;
				left: 0;
				height: 100%;
				width: 100%;
				z-index: 9999999;
				background-color: #ffffff8c;

			}

			.pageLoader .spinner {
				/* background: url(../images/loader.gif) no-repeat center center; */
				position: fixed;
				top: 25%;
				left: 47%;
				/* height: 100%;
				width: 100%; */
				width: 10em;
				height: 10em;
				z-index: 9000000;
			}

		</style>
	</x-slot>


	<x-slot name="js">

		<script src="{{ asset('js/bootstrap-multiselect.min.js')}} "></script>
		<script src="//cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>
	
	
		<script>
			let g_matched_employees = {!!json_encode($matched_emp_ids)!!};
			let g_selected_employees = {!!json_encode($old_selected_emp_ids)!!};
			let g_selected_orgnodes = {!!json_encode($old_selected_org_nodes)!!};
			let eg_selected_orgnodes = {!!json_encode($eold_selected_org_nodes)!!};
			let g_employees_by_org = [];

			function confirmSaveChangesModal() {
				let count = 0;
				if($('#opt_audience1').prop('checked')) {
					count = g_selected_employees.length;
				};
				if($('#opt_audience2').prop('checked')) {
					count = g_selected_orgnodes.length;
				};
				if (count == 0) {
					$('#saveGoalModal .modal-body p').html('Are you sure to create goal without an audience?');
				} else {
					$('#saveGoalModal .modal-body p').html('Are you sure to create goal and assign to selected audience?');
				}
				$('#saveGoalModal').modal();
			}

			$(document).ready(function(){

				$('#eblank5th').hide();
				$('#ecriteria_group').hide();
				$('#esearch_text_group').hide();

				switchTree();

				function switchTree(){
					if($('#opt_audience2').prop('checked')) {
						$('#filter1').hide();
						$('#nav-tab').hide();
						$('#nav-tabContent').hide();
						$('#nav-list').hide();
						$('#nav-tree').hide();
						
						$('#filter2').show();
						$('#enav-tab').show();
						$('#enav-tree').show();
					} else {
						$('#filter1').show();
						$('#nav-tab').show();
						$('#nav-tabContent').show();
						$('#nav-list').show();
						$('#nav-tree').show();
						
						$('#filter2').hide();
						$('#enav-tab').hide();
						$('#enav-tree').hide();
					}
				}

				$("#opt_audience1").change(function (e){
					e.preventDefault();
					switchTree();
				});

				$("#opt_audience2").change(function (e){
					e.preventDefault();
					switchTree();
				});


				$(".tags").multiselect({
                	enableFiltering: true,
                	enableCaseInsensitiveFiltering: true
            	});

				$('#pageLoader').hide();

				$('#notify-form').keydown(function (e) {
					if (e.keyCode == 13) {
						e.preventDefault();
						return false;
					}
				});

				$('#notify-form').submit(function() {
					// console.log('Search Button Clicked');			

					// assign back the selected employees to server
					var text = JSON.stringify(g_selected_employees);
					$('#selected_emp_ids').val( text );
					var text2 = JSON.stringify(g_selected_orgnodes);
					$('#selected_org_nodes').val( text2 );
					return true; // return false to cancel form action
				});

				// Tab  -- LIST Page  activate
				$("#nav-list-tab").on("click", function(e) {
					table  = $('#employee-list-table').DataTable();
					table.rows().invalidate().draw();
				});

				CKEDITOR.replace('what', {
					toolbar: [ ["Bold", "Italic", "Underline", "-", "NumberedList", "BulletedList", "-", "Outdent", "Indent"] ],disableNativeSpellChecker: false});

				CKEDITOR.replace('measure_of_success', {
					toolbar: [ ["Bold", "Italic", "Underline", "-", "NumberedList", "BulletedList", "-", "Outdent", "Indent"] ],disableNativeSpellChecker: false});

				// Tab  -- TREE activate
				$("#nav-tree-tab").on("click", function(e) {
					target = $('#nav-tree'); 
                    ddnotempty = $('#dd_level0').val() + $('#dd_level1').val() + $('#dd_level2').val() + $('#dd_level3').val() + $('#dd_level4').val();
                    if(ddnotempty) {
                        // To do -- ajax called to load the tree
                        if($.trim($(target).attr('loaded'))=='') {
                            $.when( 
                                $.ajax({
                                    url: '/sysadmin/goalbank/org-tree',
                                    type: 'GET',
                                    data: $("#notify-form").serialize(),
                                    dataType: 'html',
                                    success: function (result) {
                                        $(target).html(''); 
                                        $(target).html(result);

                                        $('#nav-tree').attr('loaded','loaded');
                                    },
                                    error: function () {
                                        alert("error");
                                        $(target).html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
                                    }
                                })
                                
                            ).then(function( data, textStatus, jqXHR ) {
                                //alert( jqXHR.status ); // Alerts 200
                                nodes = $('#accordion-level0 input:checkbox');
                                redrawTreeCheckboxes();	
                            }); 
                        
                        } else {
                            redrawTreeCheckboxes();
                        }
                    } else {
						// alert("error");
                        $(target).html('<i class="glyphicon glyphicon-info-sign"></i> Tree result is too big.  Please apply organization filter before clicking on Tree.');
					}
				});

				function redrawTreeCheckboxes() {
					// redraw the selection 
					nodes = $('#accordion-level0 input:checkbox');
					$.each( nodes, function( index, chkbox ) {
						if (g_employees_by_org.hasOwnProperty(chkbox.value)) {
							all_emps = g_employees_by_org[ chkbox.value ].map( function(x) {return x.employee_id} );
							b = all_emps.every(v=> g_selected_employees.indexOf(v) !== -1);
							if (all_emps.every(v=> g_selected_employees.indexOf(v) !== -1)) {
								$(chkbox).prop('checked', true);
								$(chkbox).prop("indeterminate", false);
							} else if (all_emps.some(v=> g_selected_employees.indexOf(v) !== -1)) {
								$(chkbox).prop('checked', false);
								$(chkbox).prop("indeterminate", true);
							} else {
								$(chkbox).prop('checked', false);
								$(chkbox).prop("indeterminate", false);
							}
						} 
					});

					// reset checkbox state
					reverse_list = nodes.get().reverse();
					$.each( reverse_list, function( index, chkbox ) {
						if (g_employees_by_org.hasOwnProperty(chkbox.value)) {
							pid = $(chkbox).attr('pid');
							do {
								value = '#orgCheck' + pid;
								toggle_indeterminate( value );
								pid = $('#orgCheck' + pid).attr('pid');    
							} 
							while (pid);
						}
					});
				}

				function eredrawTreeCheckboxes() {
					// redraw the selection 
					//console.log('eredraw triggered');
					enodes = $('#eaccordion-level0 input:checkbox');
					$.each( enodes, function( index, chkbox ) {
						if (eg_employees_by_org.hasOwnProperty(chkbox.value)) {
							eall_emps = eg_employees_by_org[ chkbox.value ].map( function(x) {return x.employee_id} );
							b = eall_emps.every(v=> eg_selected_orgnodes.indexOf(v) !== -1);

							if (eall_emps.every(v=> eg_selected_orgnodes.indexOf(v) !== -1)) {
								$(chkbox).prop('checked', true);
								$(chkbox).prop("indeterminate", false);
							} else if (eall_emps.some(v=> eg_selected_orgnodes.indexOf(v) !== -1)) {
								$(chkbox).prop('checked', false);
								$(chkbox).prop("indeterminate", true);
							} else {
								$(chkbox).prop('checked', false);
								$(chkbox).prop("indeterminate", false);
							}
						} else {
							if ( $(chkbox).attr('name') == 'userCheck[]') {
								if (eg_selected_orgnodes.includes(chkbox.value)) {
									$(chkbox).prop('checked', true);
								} else {
									$(chkbox).prop('checked', false);
								}
							}
						}
					});

					// reset checkbox state
					ereverse_list = enodes.get().reverse();
					$.each( ereverse_list, function( index, chkbox ) {
						if (eg_employees_by_org.hasOwnProperty(chkbox.value)) {
							pid = $(chkbox).attr('pid');
							do {
								value = '#eorgCheck' + pid;
								etoggle_indeterminate( value );
								pid = $('#eorgCheck' + pid).attr('pid');    
							} 
							while (pid);
						}
					});

				}

				// Set parent checkbox
				function toggle_indeterminate( prev_input ) {
					// Loop to checked the child
					var c_indeterminated = 0;
					var c_checked = 0;
					var c_unchecked = 0;
					prev_location = $(prev_input).parent().attr('href');
					nodes = $(prev_location).find("input:checkbox[name='orgCheck[]']");
					$.each( nodes, function( index, chkbox ) {
						if (chkbox.checked) {
							c_checked++;
						} else if ( chkbox.indeterminate ) {
							c_indeterminated++;
						} else {
							c_unchecked++;
						}
					});
					
					if (c_indeterminated > 0) {
						$(prev_input).prop('checked', false);
						$(prev_input).prop("indeterminate", true);
					} else if (c_checked > 0 && c_unchecked > 0) {
						$(prev_input).prop('checked', false);
						$(prev_input).prop("indeterminate", true);
					} else if (c_checked > 0 && c_unchecked == 0 ) {
						$(prev_input).prop('checked', true);
						$(prev_input).prop("indeterminate", false);
					} else {
						$(prev_input).prop('checked', false);
						$(prev_input).prop("indeterminate", false);
					}
				}

				// Set parent checkbox
				function etoggle_indeterminate( prev_input ) {
					// Loop to checked the child
					var c_indeterminated = 0;
					var c_checked = 0;
					var c_unchecked = 0;
					prev_location = $(prev_input).parent().attr('href');
					nodes = $(prev_location).find("input:checkbox[name='eorgCheck[]']");
					$.each( nodes, function( index, chkbox ) {
						if (chkbox.checked) {
							c_checked++;
						} else if ( chkbox.indeterminate ) {
							c_indeterminated++;
						} else {
							c_unchecked++;
						}
					});
					
					if (c_indeterminated > 0) {
						$(prev_input).prop('checked', false);
						$(prev_input).prop("indeterminate", true);
					} else if (c_checked > 0 && c_unchecked > 0) {
						$(prev_input).prop('checked', false);
						$(prev_input).prop("indeterminate", true);
					} else if (c_checked > 0 && c_unchecked == 0 ) {
						$(prev_input).prop('checked', true);
						$(prev_input).prop("indeterminate", false);
					} else {
						$(prev_input).prop('checked', false);
						$(prev_input).prop("indeterminate", false);
					}
				}

				$('#btn_search').click(function(e) {
					e.preventDefault();
					user_selected = [];
					// $('#employee-list-table').DataTable().ajax.url(" {{ route('sysadmin.goalbank.employee.list','loaded') }} ").load;
					$('#employee-list-table').DataTable().rows().invalidate().draw();

					// $('#nav-tab').show();
					// $('#nav-list-tab').show();
					// $('#nav-tree-tab').show();
					// $('#nav-tabContent').show();
					// $('#listitem').show();
					// $('#listdata').show();
					// $('#itemgroup1').show();
					// $('#itemgroup2').show();
					// if($.fn.dataTable.isDataTable('#employee-list-table')) {
					// 	$('#employee-list-table').DataTable().clear();
					// 	$('#employee-list-table').DataTable().destroy();
					// 	$('#employee-list-table').empty();
					// }

					// $('#employee-list-table').DataTable( {
					// 	scrollX: true,
					// 	retrieve: true,
					// 	searching: false,
					// 	processing: true,
					// 	serverSide: true,
					// 	select: true,
					// 	order: [[1, 'asc']],
					// 	// processing: true,
					// 	// serverSide: true,
					// 	// scrollX: true,
					// 	// stateSave: true,
					// 	// deferRender: true,
					// 	ajax: {
					// 		url: "{{ route('sysadmin.goalbank.employee.list', '') }}",
					// 		type: 'GET',
					// 		data: function(d) {
					// 			d.dd_level0 = $('#dd_level0').val();
					// 			d.dd_level1 = $('#dd_level1').val();
					// 			d.dd_level2 = $('#dd_level2').val();
					// 			d.dd_level3 = $('#dd_level3').val();
					// 			d.dd_level4 = $('#dd_level4').val();
					// 			d.criteria = $('#criteria').val();
					// 			d.search_text = $('#search_text').val();
					// 		}
					// 	},
					// 	"fnDrawCallback": function() {
					// 		list = ( $('#employee-list-table input:checkbox') );
					// 		$.each(list, function( index, item ) {
					// 			var index = $.inArray( item.value , g_selected_employees);
					// 			if ( index === -1 ) {
					// 				$(item).prop('checked', false); // unchecked
					// 			} else {
					// 				$(item).prop('checked', true);  // checked 
					// 			}
					// 		});

					// 		// update the check all checkbox status 
					// 		if (g_selected_employees.length == 0) {
					// 			$('#employee-list-select-all').prop("checked", false);
					// 			$('#employee-list-select-all').prop("indeterminate", false);   
					// 		} else if (g_selected_employees.length == g_matched_employees.length) {
					// 			$('#employee-list-select-all').prop("checked", true);
					// 			$('#employee-list-select-all').prop("indeterminate", false);   
					// 		} else {
					// 			$('#employee-list-select-all').prop("checked", false);
					// 			$('#employee-list-select-all').prop("indeterminate", true);    
					// 		}
					// 	},
					// 	"rowCallback": function( row, data ) {
					// 	},
					// 	columns: [
                    // 		{title: '<input name="select_all" value="1" id="employee-list-select-all" type="checkbox" />', ariaTitle: 'employee-list-select-all', target: 0, type: 'string', data: 'select_users', name: 'select_users', orderable: false, searchable: false},
					// 		{title: 'ID', ariaTitle: 'ID', target: 0, type: 'string', data: 'employee_id', name: 'employee_id', className: 'dt-nowrap'},
					// 		{title: 'Name', ariaTitle: 'Name', target: 0, type: 'string', data: 'employee_name', name: 'employee_name', className: 'dt-nowrap'},
					// 		{title: 'Job Title', ariaTitle: 'Job Title', target: 0, type: 'string', data: 'jobcode_desc', name: 'jobcode_desc', className: 'dt-nowrap'},
					// 		{title: 'Email', ariaTitle: 'Email', target: 0, type: 'string', data: 'employee_email', name: 'employee_email', className: 'dt-nowrap'},
					// 		{title: 'Organization', ariaTitle: 'Organization', target: 0, type: 'string', data: 'organization', name: 'organization', className: 'dt-nowrap'},
					// 		{title: 'Level 1', ariaTitle: 'Level 1', target: 0, type: 'string', data: 'level1_program', name: 'level1_program', className: 'dt-nowrap'},
					// 		{title: 'Level 2', ariaTitle: 'Level 2', target: 0, type: 'string', data: 'level2_division', name: 'level2_division', className: 'dt-nowrap'},
					// 		{title: 'Level 3', ariaTitle: 'Level 3', target: 0, type: 'string', data: 'level3_branch', name: 'level3_branch', className: 'dt-nowrap'},
					// 		{title: 'Level 4', ariaTitle: 'Level 4', target: 0, type: 'string', data: 'level4', name: 'level4', className: 'dt-nowrap'},
					// 		{title: 'Dept', ariaTitle: 'Dept', target: 0, type: 'string', data: 'deptid', data: 'deptid', name: 'deptid', className: 'dt-nowrap'},
					// 	],
					// });
				});

				// Handle click on "Select all" control
				$('#employee-list-select-all').on('click', function() {
					// Check/uncheck all checkboxes in the table
					$('#employee-list-table tbody input:checkbox').prop('checked', this.checked);
					if (this.checked) {
						g_selected_employees = g_matched_employees.map((x) => x);
						$('#employee-list-select-all').prop("checked", true);
						$('#employee-list-select-all').prop("indeterminate", false);    
					} else {
						g_selected_employees = [];
						$('#employee-list-select-all').prop("checked", false);
						$('#employee-list-select-all').prop("indeterminate", false);    
					}    
				});

				$('#dd_level0').change(function (e){
					e.preventDefault();
					console.log('#dd_level0.change');
				});

				$('#dd_level1').change(function (e){
					e.preventDefault();
					console.log('#dd_level1.change');
				});

				$('#dd_level2').change(function (e){
					e.preventDefault();
					console.log('#dd_level2.change');
				});

				$('#dd_level3').change(function (e){
					e.preventDefault();
					console.log('#dd_level3.change');
				});

				$('#dd_level4').change(function (e){
					e.preventDefault();
					console.log('#dd_level4.change');
					$('#btn_search').click();
				});

				$('#criteria').change(function (e){
					e.preventDefault();
					console.log('#criteria.change');
					$('#btn_search').click();
				});

				$('#search_text').change(function (e){
					e.preventDefault();
					console.log('#search_text.change');
					$('#btn_search').click();
				});

				$('#search_text').keydown(function (e){
					if (e.keyCode == 13) {
						e.preventDefault();
						console.log('#search_text.keydown');
						$('#btn_search').click();
					}
				});

				$('#btn_search_reset').click(function (e){
					e.preventDefault();
					console.log('#btn_search_reset.click');
					$('#criteria').val('all');
					$('#search_text').val(null);
					$('#dd_level0').val(null).trigger('change');
					$('#dd_level1').val(null).trigger('change');
					$('#dd_level2').val(null).trigger('change');
					$('#dd_level3').val(null).trigger('change');
					$('#dd_level4').val(null).trigger('change');
				});

				$('#edd_level0').change(function (e) {
					e.preventDefault();
					// $('#ebtn_search').click();
				});

				$('#edd_level1').change(function (e) {
					e.preventDefault();
					// $('#ebtn_search').click();
				});

				$('#edd_level2').change(function (e) {
					e.preventDefault();
					// $('#ebtn_search').click();
				});

				$('#edd_level3').change(function (e) {
					e.preventDefault();
					// $('#ebtn_search').click();
				});
				$('#edd_level4').change(function (e) {
					e.preventDefault();
					$('#ebtn_search').click();
				});

				$('#ebtn_search_reset').click(function(e) {
					e.preventDefault();
					$('#esearch_text').val(null);
					$('#edd_level0').val(null);
					$('#edd_level1').val(null);
					$('#edd_level2').val(null);
					$('#edd_level3').val(null);
					$('#edd_level4').val(null);
					$('#ebtn_search').click();
       			});

                $(window).on('beforeunload', function(){
                    $('#pageLoader').show();
                });

                $(window).resize(function(){
                    location.reload();
                    return;
                });

				$('#ebtn_search').click(function(e) {
					e.preventDefault();
					target = $('#enav-tree'); 
					ddnotempty = $('#edd_level0').val() + $('#edd_level1').val() + $('#edd_level2').val() + $('#edd_level3').val() + $('#edd_level4').val();
					if(ddnotempty) {
						// To do -- ajax called to load the tree
						$.when( 
							$.ajax({
								url: '/sysadmin/goalbank/eorg-tree',
								// url: $url,
								type: 'GET',
								data: $("#notify-form").serialize(),
								dataType: 'html',


								success: function (result) {
									$('#enav-tree').html(''); 
									$('#enav-tree').html(result);
									$('#enav-tree').attr('loaded','loaded');
								},


								error: function () {
									alert("error");
									$(target).html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
								}
							})
							
						).then(function( data, textStatus, jqXHR ) {
							//alert( jqXHR.status ); // Alerts 200
							enodes = $('#eaccordion-level0 input:checkbox');
							eredrawTreeCheckboxes();	
						}); 
					} else {
						$(target).html('<i class="glyphicon glyphicon-info-sign"></i> Tree result is too big.  Please apply organization filter before clicking on Tree.');
					}
				});

				$(window).on('beforeunload', function(){
					$('#pageLoader').show();
				});

				$(window).resize(function(){
					location.reload();
					return;
				});
			});

			// Model -- Confirmation Box

			var modalConfirm = function(callback) {
				$("#btn-confirm").on("click", function(){
					$("#mi-modal").modal('show');
				});
				$("#modal-btn-si").on("click", function(){
					callback(true);
					$("#mi-modal").modal('hide');
				});
				
				$("#modal-btn-no").on("click", function(){
					callback(false);
					$("#mi-modal").modal('hide');
				});
			};

		</script>
	</x-slot>

</x-side-layout>