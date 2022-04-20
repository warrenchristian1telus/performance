@extends('hradmin.layout')
@section('tab-content')

<div>
    <div class="h4 p-3">{{__('Manage Existing Excused Employees')}}</div>
    <div class="p-3">
        <div class="row">
            <div class="col">
                <p>Below lists the names of all employees in BC Public Service who have been excused from the performance development process.</p>
            </div>
        </div>
    </div>
</div>

<div>
    <div class="card card-primary shadow mb-3" style="overflow-x: auto;">
        <div>
            <form action="" method="get">
				@csrf
				<table class="uk-table m-3" style="overflow-x: auto; width: 1500px">
                    <tbody>
                        @include('hradmin.partials.organization_filter')
                        <tr style="text-align: left;" class="p-1 form-group">
                            <td style="text-align: left; width: 300px; " class="p-2 form-group">
								<label for='criteria'>
									Search Criteria
								</label>
								<x-dropdown :list="$crit" class="multiple" name="criteria" :selected="request()->criteria"></x-dropdown>
                            </td>
                            <td style="text-align: left; width: 300px; " class="p-1 form-group">
                                <label>
                                    Search
                                </label>
								<input type="text" name="searchText" class="form-control" value="{{request()->searchtext}}">
                            </td>
                            <td style="text-align: left; width: 150px; " class="p-1 form-group">
                                <button class="btn btn-primary mt-4 px-5">Search</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
				{{ csrf_field() }}
			</form>
        </div>
        <div id="collapseOne" class="collapse {{$sEmpl ? 'show' : ''}}" aria-labelledby="headingOne" data-parent="#accordionLibrary">
            <div class="table table-wrapper" style="width: 3400px">
                <div class="md-card-content" style="overflow-x: auto;">
                    <table class="table table-bordered data-table">
                        <thead>
                            <tr>
                                <th style="text-align: left; width: 500px; "> Employee Name</th>
                                <th style="text-align: left; width: 250px; "> Job Title</th>
                                <th style="text-align: left; width: 400px; "> Organization</th>
                                <th style="text-align: left; width: 400px; "> Organization Level 1</th>
                                <th style="text-align: left; width: 400px; "> Organization Level 2</th>
                                <th style="text-align: left; width: 400px; "> Organization Level 3</th>
                                <th style="text-align: left; width: 400px; "> Organization Level 4</th>
                                <th style="text-align: left; width: 200px; "> Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sEmpl as $o)

                            <tr>
                                <td style="text-align: left; width: 500px; ">
                                    {{ $o->employee_name }}
                                </td>
                                <td style="text-align: left; width: 250px; ">
                                    {{ $o->job_title }}
                                </td>
                                <td style="text-align: left; width: 400px; ">
                                    {{ $o->organization }}
                                </td>
                                <td style="text-align: left; width: 400px; ">
                                    {{ $o->level1_program }}
                                </td>
                                <td style="text-align: left; width: 400px; ">
                                    {{ $o->level2_division }}
                                </td>
                                <td style="text-align: left; width: 400px; ">
                                    {{ $o->level3_branch }}
                                </td>
                                <td style="text-align: left; width: 400px; ">
                                    {{ $o->level4 }}
                                </td>
								<td>
									<div class="d-flex flex-row-reverse align-items-center">
										{{-- <button class="btn btn-danger btn-sm float-right ml-2 delete-btn" data-id="{{ $o->employee_id }}" >
											<i class="fa-trash fa"></i>
										</button> --}}
										<button class="btn btn-primary btn-sm float-left" data-id="{{ $o->employee_id }}" data-toggle="modal">
											{{-- <button class="btn btn-primary btn-sm float-right ml-2 btn-view-conversation" data-id="{{ $o->employee_id }}" data-toggle="modal" data-target="#viewConversationModal"> --}}
											View
										</button>
									</div>
								</td>
							</tr>


                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
			{{ $sEmpl->links() }}
		</div>

    </div>
</div>

@include('hradmin.partials.organization_script')

@endsection




<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
{{-- <script src="//cdn.ckeditor.com/4.17.2/basic/ckeditor.js"></script> --}}

<script type="text/javascript">
  $(function () {
    
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('hradmin.myorg.test') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    
  });
</script>

