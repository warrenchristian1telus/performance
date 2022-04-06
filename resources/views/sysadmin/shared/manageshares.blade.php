@extends('sysadmin.layout')
@section('tab-content')

<div>
    <div class="h4 p-3">{{__('Manage Existing Shares')}}</div>
    <div class="p-3">
        <div class="row">
            <div class="col">
                <p>Below lists the names of all employees who you have shared with other members of your organization.</p>
            </div>
        </div>
    </div>
</div>

<div>
    <div class="card card-primary shadow mb-3" style="overflow-x: auto;">
        <div class="d-flex" style="width: 3400px">
            <form action="" method="get">
                <table class="uk-table m-3">
                    <tbody>
                        @include('sysadmin.partials.organization_filter')
                        <tr>
                            <td style="text-align: left; width: 300px; " class="p-2 form-group">
								<label for='criteria'>
									Search Criteria
								</label>
								<x-dropdown :list="$crit" class="multiple" name="criteria" :selected="request()->criteria"></x-dropdown>
                            </td>
                            <td style="text-align: left; width: 300px; " class="p-2 form-group">
                                <label>
                                    Search
                                    <input type="text" name="searchText" class="form-control" value="{{request()->searchText}}">
                                </label>
                            </td>
                            <td style="text-align: left; width: 150px; " class="p-2 form-group">
                                <button class="btn btn-primary mt-4 px-5">Search</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
        <div id="collapseOne" class="collapse {{$sEmpl ? 'show' : ''}}" aria-labelledby="headingOne" data-parent="#accordionLibrary">
            <div class="table table-wrapper" style="width: 3400px">
                <div class="md-card-content" style="overflow-x: auto;">
                    <table class="uk-table m-3">
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
										<button class="btn btn-primary btn-sm float-right ml-2" data-id="{{ $o->employee_id }}" data-toggle="modal">
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

@include('sysadmin.partials.organization_script')

@endsection
