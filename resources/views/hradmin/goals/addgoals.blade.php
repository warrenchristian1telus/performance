<x-side-layout title="{{ __('Dashboard') }}">
    <x-slot name="header">
        <h3>HR Administration</h3>
        <div class="col-md-8"> @include('hradmin.partials.tabs')</div>
    </x-slot>
    @yield('tab-content')

	<div class="pageLoader" id="pageLoader">
		<div class="spinner spinner-border text-secondary" role="status">
			<span class="sr-only">Loading...</span>
		</div>
	</div>
	
	<div>
		<div class="h4 p-3">{{__('Add a New Goal to a Goal Bank')}}</div>
		<div class="p-3">
			<div class="row">
				<div class="col">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
				</div>
			</div>
		</div>
	</div>
		

	@if ($message = Session::get('success'))
	<div class="alert alert-success">
		<p>{{ $message }}</p>
	</div>
   @endif
   
   
	<form id="notify-form" action="{{ route('hradmin.notifications.send') }}" method="post">
	   @csrf
	   <input type="hidden" id="selected_emp_ids" name="selected_emp_ids" value="">
   
   
   <!----modal starts here--->
   <div id="sendNotifyModal" class="modal" role='dialog'>
	   <div class="modal-dialog">
		   <div class="modal-content">
			   <div class="modal-header">
				   <h5 class="modal-title">Confirmation</h5>
				   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					 <span aria-hidden="true">&times;</span>
				   </button>
			   </div>
			   <div class="modal-body">
				   <p>Are you sure to send out this message ?</p>
			   </div>
			   <div class="modal-footer">
				   <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				   <button class="btn btn-primary mt-2" type="submit" 
					   name="btn_send" value="btn_send">Send message</button>
			   </div>
			   
		   </div>
		 </div>
	 </div>
   <!--Modal ends here--->	
   
   <script src="//cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>

	<div>
		<div class="h5 p-3">{{__('Step 1. Enter Goal Details')}}</div>
		<div class="p-3">
	
			<div class="card card-primary shadow mb-3">
				<div class="d-flex justify-content-around">
	
					<div class="container-fluid">
						<form action="{{ route ('hradmin.goals.addgoals', $newGoal, $newGoal->id)}}" method="POST">
							@csrf
							@method('PUT')
							<tbody>
								<div class="row">
									<div class="col m-2">
										<x-dropdown :list="$goalTypes" label="Goal Type" name="goal_type_id" :value="$newGoal->goal_type_id"/>
										</div>
										<div class="col m-2">
											<x-input label="Goal Title" name="title" tooltip='A short title (1-3 words) used to reference the goal throughout the Performance platform.' :value="$newGoal->title"/>
												<small class="text-danger error-title"></small>
										</div>
									<div class="col m-2">
										<x-dropdown :list="$mandatoryOrSuggested" label="Mandatory/Suggested" name="is_mandatory" :selected="request()->is_mandatory"></x-dropdown>
									</div>
								</div>
								<div class="row">
									<div class="col m-2">
										<label for='what'>Description</label>
										<textarea id="what" class="form-control" name="what" :value="$newGoal->what">{!!$newGoal->what!!}</textarea>
									</div>
								</div>
	
	
								<div class="row">
									<div class="col m-2">
										{{-- <x-textarea id="measure_of_success" label="Measures of Success" name="measure_of_success" tooltip='A qualitative or quantitative measure of success for your goal. For example, "Deliver a minimum of 2 sessions per month that reach at least 100 people"' :value="$newGoal->measure_of_success" />
											<x-textarea id="measure_of_success" label="Measures of Success" name="measure_of_success" tooltip='A qualitative or quantitative measure of success for your goal. For example, "Deliver a minimum of 2 sessions per month that reach at least 100 people"' :value="$newGoal->measure_of_success" />
												<small class="text-danger error-measure_of_success"></small> --}}
										<label for='measure_of_success'>Measure of Success</label>
										<textarea id="measure_of_success" class="form-control" name="measure_of_success" :value="$newGoal->measure_of_success">{!!$newGoal->measure_of_success!!}</textarea>
									</div>
								</div>
							</tbody>
						</form>
					</div>
				</div>
	
			</div>
		</div>
	
	</div>
	


<div>
    <div class="h5 p-2">{{__('Step 2. Select audience')}}</div>
		<div class="p-3">


	
@include('hradmin.partials.filter')

<nav>
	<div class="nav nav-tabs" id="nav-tab" role="tablist">
	  <a class="nav-item nav-link active" id="nav-list-tab" data-toggle="tab" href="#nav-list" role="tab" aria-controls="nav-list" aria-selected="true">List</a>
	  <a class="nav-item nav-link" id="nav-tree-tab" data-toggle="tab" href="#nav-tree" role="tab" aria-controls="nav-tree" aria-selected="false">Tree</a>
	  
	</div>
  </nav>
  <div class="tab-content" id="nav-tabContent">
	<div class="tab-pane fade show active" id="nav-list" role="tabpanel" aria-labelledby="nav-list-tab">
		@include('hradmin.notifications.partials.recipient-list')
	</div>
	<div class="tab-pane fade" id="nav-tree" role="tabpanel" aria-labelledby="nav-tree-tab" loaded="">
		<div class="mt-2 fas fa-spinner fa-spin fa-3x fa-fw loading-spinner" id="tree-loading-spinner" role="status" style="display:none">
			<span class="sr-only">Loading...</span>
		</div>
{{-- 
		@include('hradmin.notifications.partials.recipient-tree')
		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tincidunt, nibh nec interdum fermentum, est metus rutrum elit, in molestie ex massa ut urna. Duis dignissim tortor ipsum, dignissim rutrum quam gravida sed. Mauris auctor malesuada luctus. Praesent vitae ante et diam gravida lobortis. Donec eleifend euismod scelerisque. Curabitur laoreet erat sit amet tortor rutrum tristique. Sed lobortis est ac mauris lobortis euismod. Morbi tincidunt porta orci eu elementum. Donec lorem lacus, hendrerit a augue sed, tempus rhoncus arcu. Praesent a enim vel eros elementum porta. Nunc ut leo eu augue dapibus efficitur ac ac risus. Maecenas risus tellus, tincidunt vitae finibus vel, ornare vel neque. Curabitur imperdiet orci ac risus tempor semper. Integer nec varius urna, sit amet rhoncus diam. Aenean finibus, sapien eu placerat tristique, sapien dui maximus neque, id tempor dui magna eget lorem. Suspendisse egestas mauris non feugiat bibendum.		
--}}
	</div>

  </div>
</div>
</div>


  <br>
  <div>
    <div class="h5 p-2">{{__('Step 3. Finish')}}</div>
		<div class="p-3">

<x-button
	type="submit" 
	class="btn btn-primary"
    :href='url()->previous()'
    :tooltip="__('Add Goals')"
	onclick="confirmAddNewModal()"
    tooltipPosition="bottom" 
	style="width: 120px; " 
	aria-label="Add Goals">{{__('Add Goals')}}
</x-button>
<x-button
	class="btn btn-secondary" 
    :href='url()->previous()'
    :tooltip="__('Cancel')"
    tooltipPosition="bottom" 
	style="width: 90px; " 
	aria-label="Cancel">{{__('Cancel')}}
</x-button>
</div>
</div>

</form>



<h6 class="m-20">&nbsp;</h6>
<h6 class="m-20">&nbsp;</h6>
<h6 class="m-20">&nbsp;</h6>


<x-slot name="css">
<style>

.select2-container .select2-selection--single {
    height: 38px !important;
}

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

	
    <script src="//cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>

    <script>
	let g_matched_employees = {!!json_encode($matched_emp_ids)!!};
	let g_selected_employees = {!!json_encode($old_selected_emp_ids)!!};
	let g_employees_by_org = [];

	function confirmAddNewModal(){
		count = g_selected_employees.length;
		if (count == 0) {
			$('#addNewModal .modal-body p').html('Are you sure to add new goal ?');
		} else {
			$('#addNewModal .modal-body p').html('Are you sure to add new goal to ' + count + ' selected user(s) ?');
		}
		$('#addNewModal').modal();
	}

	$(document).ready(function(){

		$('#pageLoader').hide();

		CKEDITOR.replace('what', {
			toolbar: [ ["Bold", "Italic", "Underline", "-", "NumberedList", "BulletedList", "-", "Outdent", "Indent"] ],disableNativeSpellChecker: false});


		CKEDITOR.replace('measure_of_success', {
			toolbar: [ ["Bold", "Italic", "Underline", "-", "NumberedList", "BulletedList", "-", "Outdent", "Indent"] ],disableNativeSpellChecker: false});

		$(document).on('click', '.btn-submit', function(e){
			e.preventDefault();
			for (var i in CKEDITOR.instances){
				CKEDITOR.instances[i].updateElement();
			};
		});


		$('#notify-form').keydown(function (e) {
			if (e.keyCode == 13) {
    			e.preventDefault();
    			return false;
			}
		});

		$('#notify-form').submit(function() {

			console.log('submit trigger');			

			// assign back the selected employees to server
			var text = JSON.stringify(g_selected_employees);
			$('#selected_emp_ids').val( text );
			return true; // return false to cancel form action
		});


		// Tab  -- LIST Page  activate
		$("#nav-list-tab").on("click", function(e) {
			
			table  = $('#employee-list-table').DataTable();
			table.rows().invalidate().draw();
		});


		// Tab  -- TREE activate
		$("#nav-tree-tab").on("click", function(e) {

			target = $('#nav-tree'); 

			// To do -- ajax called to load the tree
			if($.trim($(target).attr('loaded'))=='') {
	            //console.log('loading employees');
				$.when( 
						$.ajax({
							url: '/hradmin/notifications/org-tree',
							type: 'GET',
							data: $("#notify-form").serialize(),
							dataType: 'html',
							beforeSend: function() {
								$("#tree-loading-spinner").show();                    
							},
							success: function (result) {
								$(target).html(''); 
								$(target).html(result);

								$('#nav-tree').attr('loaded','loaded');
							},
							complete: function() {
								
							$(".tree-loading-spinner").hide();
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
		});

		function redrawTreeCheckboxes() {
			// redraw the selection 
			//console.log('redraw triggered');
			nodes = $('#accordion-level0 input:checkbox');
			$.each( nodes, function( index, chkbox ) {
				if (g_employees_by_org.hasOwnProperty(chkbox.value)) {
					// console.log( 'org checkbox ' + chkbox.value);

					all_emps = g_employees_by_org[ chkbox.value ].map( function(x) {return x.employee_id} );

					// console.log(all_emps);
					// console.log(g_selected_employees);
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
					
				} else {
					if ( $(chkbox).attr('name') == 'userCheck[]') {
						if (g_selected_employees.includes(chkbox.value)) {
							$(chkbox).prop('checked', true);
						} else {
							$(chkbox).prop('checked', false);
						}
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
						//console.log(  value );
						toggle_indeterminate( value );
						//console.log("parent : " + pid);                
						pid = $('#orgCheck' + pid).attr('pid');    
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

	});

	$(window).on('beforeunload', function(){
		$('#pageLoader').show();
	});


	$('#sender_id').select2({
			ajax: {
				url: '/graph-users'
				, dataType: 'json'
				, delay: 250
				, data: function(params) {
					var query = {
						'q': params.term
					, }
					return query;
				}
				, processResults: function(data) {
					return {
						results: data
						};
				}
				, cache: false
			}
		});

	// Model -- Confirmation Box

	var modalConfirm = function(callback){
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