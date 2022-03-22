@extends('sysadmin.layout')
@section('tab-content')
<div>
	<div class="h4 p-3"><b>{{__('All BC Public Service Employees')}}</b></div>
</div>
<div>
	<div class="card card-primary shadow mb-3" style="overflow-x: auto;">
		<div class="d-flex" style="width: 1800px">
			<form action="" method="get">
				<table class="uk-table m-3">
					<tbody>
						@include('sysadmin.partials.organization_filter')
						<tr>
							<td style="text-align: left; width: 300px; ">
								<x-dropdown :list="$crit" label="Search Criteria" name="criteria" :selected="request()->goal_type"></x-dropdown>
							</td>
							<td style="text-align: left; width: 300px; " class="p-2 form-group">
								<label>
									Search
									<input type="text" name="searchtext" class="form-control" value="{{request()->searchtext}}">
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
	</div>
</div>
<div>
	<div class="card card-primary shadow mb-3" style="overflow-x: auto;">
		<div class="table table-wrapper" style="width: 2800px">
			<table class="uk-table m-3">
				<thead>
					<tr>
						<th style="text-align: left; width: 200px; "> Employee Name</th>
						<th style="text-align: left; width: 200px; "> Job Title</th>
						<th style="text-align: left; width: 300px; "> Organization</th>
						<th style="text-align: left; width: 300px; "> Organization Level 1</th>
						<th style="text-align: left; width: 300px; "> Organization Level 2</th>
						<th style="text-align: left; width: 300px; "> Organization Level 3</th>
						<th style="text-align: left; width: 300px; "> Organization Level 4</th>
						<th style="text-align: left; width: 100px; "> Department</th>
						<th style="text-align: left; width: 100px; "> Active Goals</th>
						<th style="text-align: left; width: 200px; "> Upcoming Conversation</th>
						<th style="text-align: left; width: 200px; "> Last Conversation</th>
						<th style="text-align: left; width: 100px; "> Excused</th>
						<th style="text-align: left; width: 100px; "> Shared Status</th>
						<th style="text-align: left; width: 100px; "> Direct Reports</th>
					</tr>
				</thead>
				<tbody>
					@foreach($iEmpl as $o)
					<tr>
						<td style="text-align: left; width: 300px; ">
							{{ $o->employee_name }}
						</td>
						<td style="text-align: left; width: 200px; ">
							{{ $o->job_title }}
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
						<td style="text-align: left; width: 100px; ">
							{{ $o->deptid }}
						</td>
						<td style="text-align: left; width: 100px; ">
							[Count]
						</td>
						<td style="text-align: left; width: 200px; ">
							[Formatted Date]
						</td>
						<td style="text-align: left; width: 200px; ">
							[Formatted Date]
						</td>
						<td style="text-align: left; width: 100px; ">
							-
						</td>
						<td style="text-align: left; width: 100px; ">
							-
						</td>
						<td style="text-align: left; width: 100px; ">
							[Count]
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

{{ $iEmpl->links() }}


@include('hradmin.partials.organization_script')


@endsection
