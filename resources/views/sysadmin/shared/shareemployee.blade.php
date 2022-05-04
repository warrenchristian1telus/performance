@extends('sysadmin.layout')
@section('tab-content')
<div class="col-md-8"> @include('sysadmin.partials.tabs')</div>

<div>
    <div class="h4 p-3">{{__('Assign an Empoloyee')}}</div>
	<div class="p-3">
		<div class="row">
			<div class="col">
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			</div>
		</div>
	</div>
    <form action="" method="get" id="share_employees">
        <div class="h5 p-3">{{__('Step 1. Select employees to share')}}</div>
			<div class="card card-primary shadow mb-3" style="overflow-x: auto;">
				<div class="p-3">
					<div class="p-3">
						@include('sysadmin.partials.audiences')
					</div>
				</div>
    		</div>
		</div>
		<div class="h5 p-3">{{__('Step 2. Select who you would like to share the selected employee(s) with')}}</div>
		<div class="card card-primary shadow mb-3" style="overflow-x: auto;">
			<div class="p-3">
				<div class="p-3">
					@include('sysadmin.partials.audiences')
				</div>
			</div>
		</div>
		<div class="h5 p-3">{{__('Step 3. Enter sharing details')}}</div>
		<div class="card card-primary shadow mb-3" style="overflow-x:auto;width:1200px">
			<table class="uk-table m-3">
				<tbody>
					<tr>
						<td>
							<b>Element to Share</b>
						</td>
						<td>
							<b>Reason for sharing</b>
						</td>
					</tr>
					<tr>
						<td style="text-align: left; width: 400px; " class="p-1 form-group">
							<x-dropdown :list="$shareelements" class="multiple form-control" name="share_element" :selected="request()->share_element"></x-dropdown>
						</td>
						<td style="text-align: left; width: 800px; " class="p-1 form-group">
							<input type="text" class="form-control" name="share_reason" value="{{request()->share_reason ?? ''}}">
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="h5 p-3">{{__('Step 4. Share selected employees')}}</div>
		<div class="p-3">
			<x-button 
				type="button" 
				size="sm" 
				:tooltip="__('Share Employees')" 
				tooltipPosition="bottom" 
				class="btn btn-primary mr-2" 
				aria-label="Share Employees"> 
				Share Employees
			</x-button>
			<x-button
				size="sm"
				:href='url()->previous()'
				:tooltip="__('Cancel')"
				tooltipPosition="bottom" 
				class="mr-2" 
				aria-label="Cancel">
				{{__('Cancel')}}
			</x-button>
		</div>
    </form>
</div>

<script type="text/javascript">
    $('body').popover({
        selector: '[data-toggle]',
        trigger: 'hover',
    });


</script>

@endsection