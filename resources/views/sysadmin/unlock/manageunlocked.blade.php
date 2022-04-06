@extends('sysadmin.layout')
@section('tab-content')

<div>
    <div class="h4 p-3">{{__('Manage Existing Unlocked Conversations')}}</div>
    <div class="p-3">
        <div class="row">
            <div class="col">
                <p>The table below displays all open conversations for employees in your organization(s), that have been unlocked because of a special request.  You can click on the unlocked icon to view or edit the lock date of the conversation.</p>
                <p>Use the filters to search for conmversations by organization level, topic, participation or by due date range.  You may also use the text input field to search by name or keyword.</p>
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
                        @include('sysadmin.partials.organization_filter')
                        <tr style="text-align: left;" class="p-1 form-group">
                            <td style="text-align: left; width: 300px; " class="p-1 form-group">
								<label for='topic'>
									Topic
								</label>
								<x-dropdown :list="$crit" class="multiple" name="topic" :selected="request()->topic"></x-dropdown>
                            </td>
                            <td style="text-align: left; width: 300px; " class="p-1 form-group">
								<label for='participants'>
									Participants
								</label>
								<x-dropdown :list="$crit" class="multiple" name="participants" :selected="request()->participants"></x-dropdown>
                            </td>
                            <td style="text-align: left; width: 300px; " class="p-1 form-group">
								<label for='duedate_from'>
									Due Date (From)
								</label>
								<x-dropdown :list="$crit" class="multiple" name="duedate_from" :selected="request()->duedate_from"></x-dropdown>
                            </td>
                            <td style="text-align: left; width: 300px; " class="p-1 form-group">
								<label for='duedate_to'>
									Due Date (To)
								</label>
								<x-dropdown :list="$crit" class="multiple" name="duedate_to" :selected="request()->duedate_to"></x-dropdown>
                            </td>
						</tr>
						<tr style="text-align: left;" class="p-1 form-group">
                            <td style="text-align: left; width: 300px; " class="p-1 form-group">
								<label for='criteria'>
									Search Criteria
								</label>
								<x-dropdown :list="$crit" class="multiple" name="criteria" :selected="request()->criteria"></x-dropdown>
                            </td>
							<td style="text-align: left; width: 300px; " class="p-1 form-group">
                                <label>
                                    Search
                                </label>
								<input type="text" name="searchText" class="p-1 form-control" value="{{request()->searchtext}}">
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
            <div class="table table-wrapper">
                <div class="md-card-content">
                    <table class="uk-table m-3" style="overflow-x: auto; width: 2500px">
                        <thead>
                            <tr>
                                <th style="text-align: left; width: 50px; "> </th>
                                <th style="text-align: left; width: 300px; "> Topic </th>
                                <th style="text-align: left; width: 300px; "> Participants</th>
                                <th style="text-align: left; width: 250px; "> Due Date</th>
                                <th style="text-align: left; width: 300px; "> Organization</th>
                                <th style="text-align: left; width: 300px; "> Organization Level 1</th>
                                <th style="text-align: left; width: 300px; "> Organization Level 2</th>
                                <th style="text-align: left; width: 300px; "> Organization Level 3</th>
                                <th style="text-align: left; width: 300px; "> Organization Level 4</th>
                                <th style="text-align: left; width: 100px; "> Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sEmpl as $o)

                            <tr>
                                <td style="text-align: left; width: 50px; ">
                                    [O]
                                </td>
                                <td style="text-align: left; width: 300px; ">
                                    [ Topic Name ]
                                </td>
                                <td style="text-align: left; width: 300px; ">
                                    [ Participant Icons ]
                                </td>
                                <td style="text-align: left; width: 250px; ">
                                    [ Due Date ]
                                </td>
                                <td style="text-align: left; width: 300px; ">
                                    {{ $o->organization }}
                                </td>
                                <td style="text-align: left; width: 300px; ">
                                    {{ $o->level1_program }}
                                </td>
                                <td style="text-align: left; width: 300px; ">
                                    {{ $o->level2_division }}
                                </td>
                                <td style="text-align: left; width: 300px; ">
                                    {{ $o->level3_branch }}
                                </td>
                                <td style="text-align: left; width: 300px; ">
                                    {{ $o->level4 }}
                                </td>
								<td>
									<div class="d-flex flex-row-reverse align-items-center">
										{{-- <button class="btn btn-danger btn-sm float-right ml-2 delete-btn" data-id="{{ $o->employee_id }}" >
											<i class="fa-trash fa"></i>
										</button> --}}
										<button class="btn btn-primary btn-sm float-left ml-2 " data-id="{{ $o->employee_id }}" data-toggle="modal">
											{{-- <button class="btn btn-primary btn-sm float-right ml-2 btn-view-conversation" data-id="{{ $o->employee_id }}" data-toggle="modal" data-target="#viewConversationModal"> --}}
											Unlock
										</button>
										<button class="btn btn-primary btn-sm float-left ml-2 " data-id="{{ $o->employee_id }}" data-toggle="modal">
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
