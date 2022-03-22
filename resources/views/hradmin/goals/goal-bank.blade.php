@extends('hradmin.layout')
@section('tab-content')

<div>
    <div class="h4 p-3">{{__('Add Goal to Goal Bank')}}</div>
    <div class="p-3">
        <div class="row">
            <div class="col">
                <p>Below is a list of the goals that have been added to the Goal Bank for all employees in the BC Public Service.</p>
            </div>
        </div>
    </div>
</div>

<div>

    <div class="card card-primary shadow mb-3" style="overflow-x: auto;">
        <div class="d-flex" style="width: 3700px">
            <form action="" method="get">

                <table class="uk-table m-3">
                    <tbody>
                        @include('hradmin.partials.organization_filter')
                        <tr>
                            <td style="text-align: left; width: 400px; ">
                                <x-dropdown :list="$goalTypes" label="Goal Type" name="goal_type" :selected="request()->goal_type"></x-dropdown>
                            </td>
                            <td style="text-align: left; width: 400px; " class="p-2 form-group">
                                <x-dropdown :list="$mandatoryOrSuggested" label="Mandatory/Suggested" name="is_mandatory" :selected="request()->is_mandatory"></x-dropdown>
                            </td>
                            <td style="text-align: left; width: 400px; " class="p-2 form-group">
                                <label>
                                    Goal Creation Date
                                    <input type="text" class="form-control" name="date_added" value="{{request()->date_added ?? 'Any'}}">
                                </label>
                            </td>
                            <td style="text-align: left; width: 400px; " class="p-2 form-group">
                                <label>
                                    Goal Title
                                    <input type="text" name="title" class="form-control" value="{{request()->title}}">
                                </label>
                            </td>
                            <td style="text-align: left; width: 150px; " class="p-2 form-group">
                                <button class="btn btn-primary mt-4 px-5">Filter</button>
                            </td>
                        </tr>
                    </tbody>
                </table>




            </form>

        </div>



        <div id="collapseOne" class="collapse {{$bankgoals ? 'show' : ''}}" aria-labelledby="headingOne" data-parent="#accordionLibrary">
            <!-- <div class="md-card-content m-3" style="overflow-x: auto;"> -->
            <!-- <table class="table table-borderless table-layout:fixed" style="overflow-x: auto;"> -->
            <!-- <table class="table table-wrapper table-layout:fixed" style="overflow-x: auto;"> -->
            <div class="table table-wrapper" style="width: 3700px">
                <div class="md-card-content" style="overflow-x: auto;">
                    <!-- <div class="md-card-content" style="overflow-x: auto;"> -->
                    <!-- <table class="table table-borderless table-layout:fixed" style="overflow-x: auto;" width="2800px"> -->
                    <!-- <table class="table table-borderless table-layout:fixed" style="overflow: scroll;"> -->
                    <table class="uk-table m-3">
                        <thead>
                            <tr>
                                <th style="text-align: left; width: 500px; "> Goal Title</th>
                                <th style="text-align: left; width: 250px; "> Goal Type</th>
                                <th style="text-align: left; width: 100px; "> Mandatory/Suggested</th>
                                <th style="text-align: left; width: 200px; "> Goal Start Date</th>
                                <th style="text-align: left; width: 200px; "> Goal Target Date</th>
                                <th style="text-align: left; width: 200px; "> Created By</th>
                                <th style="text-align: left; width: 150px; "> Audience</th>
                                <th style="text-align: left; width: 400px; "> Organization Level 1</th>
                                <th style="text-align: left; width: 400px; "> Organization Level 2</th>
                                <th style="text-align: left; width: 400px; "> Organization Level 3</th>
                                <th style="text-align: left; width: 400px; "> Organization Level 4</th>
                                <th style="text-align: left; width: 200px; "> Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bankgoals as $o)

                            <tr>
                                <td style="text-align: left; width: 500px; ">
                                    <a href='{{route("hradmin.goal-edit", $o->id)}} class="edit-goal-detail highlighter" data-id="{{$o->id}}'>{{ $o->title }}</a>
                                </td>
                                <td style="text-align: left; width: 250px; ">
                                    <a href='{{route("hradmin.goal-edit", $o->id)}} class="edit-goal-detail highlighter" data-id="{{$o->id}}'>{{ $o->GoalTypeValue }}</a>
                                </td>
                                <td style="text-align: left; width: 100px; ">
                                    <a href='{{route("hradmin.goal-edit", $o->id)}} class="edit-goal-detail highlighter" data-id="{{$o->id}}'>{{ $o->MandatoryValue }}</a>
                                </td>
                                <td style="text-align: left; width: 200px; ">
                                    <a href='{{route("hradmin.goal-edit", $o->id)}} class="edit-goal-detail highlighter" data-id="{{$o->id}}'>{{ \Carbon\Carbon::parse($o->start_date)->format('F d, Y') }}</a>
                                </td>
                                <td style="text-align: left; width: 200px; ">
                                    <a href='{{route("hradmin.goal-edit", $o->id)}} class="edit-goal-detail highlighter" data-id="{{$o->id}}'>{{ \Carbon\Carbon::parse($o->target_date)->format('F d, Y') }}</a>
                                </td>
                                <td style="text-align: left; width: 200px; ">
                                    <a href='{{route("hradmin.goal-edit", $o->id)}} class="edit-goal-detail highlighter" data-id="{{$o->id}}'>{{ $o->name }}</a>
                                </td>
                                <td style="text-align: left; width: 150px; ">
                                    <a href='{{route("hradmin.goal-edit", $o->id)}} class="edit-goal-detail highlighter" data-id="{{$o->id}}'>{{ $o->Audience }} Employees</a>
                                </td>
                                <td style="text-align: left; width: 400px; ">
                                    <a href='{{route("hradmin.goal-edit", $o->id)}} class="edit-goal-detail highlighter" data-id="{{$o->id}}'>{{ $o->level1_program }}</a>
                                </td>
                                <td style="text-align: left; width: 400px; ">
                                    <a href='{{route("hradmin.goal-edit", $o->id)}} class="edit-goal-detail highlighter" data-id="{{$o->id}}'>{{ $o->level2_division }}</a>
                                </td>
                                <td style="text-align: left; width: 400px; ">
                                    <a href='{{route("hradmin.goal-edit", $o->id)}} class="edit-goal-detail highlighter" data-id="{{$o->id}}'>{{ $o->level3_branch }}</a>
                                </td>
                                <td style="text-align: left; width: 400px; ">
                                    <a href='{{route("hradmin.goal-edit", $o->id)}} class="edit-goal-detail highlighter" data-id="{{$o->id}}'>{{ $o->level4 }}</a>
                                </td>
                                <td m-1 style="text-align: left; width: 150px; ">
                                    <x-button
                                    size="sm"
                                    :href='route("hradmin.goal-edit", $o->id)'
                                    :tooltip="__('Click to Edit the details of this goal.')"
                                    tooltipPosition="bottom" class="mr-2 edit-goal-detail" aria-label="Edit Item">{{__('Edit')}}
                                </x-button>
                                <x-button
                                size="sm" style="danger" icon="trash"
                                :tooltip="__('Click to delete goal.')"
                                tooltipPosition="bottom" class="btn btn-danger btn-sm mr-2 delete-notification-btn" data-id="{{ $o->id }}"
                                aria-label="Delete Goal">
                            </x-button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>



<br>

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

<div>
    <div class="h5 p-3">{{__('Step 1. Enter Goal Details')}}</div>
    <div class="p-3">

        <div class="card card-primary shadow mb-3">
            <div class="d-flex justify-content-around">

                <div class="container-fluid">
                    <form action="{{ route ('hradmin.goaladd', $newGoal, $newGoal->id)}}" method="POST">
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
                                            <x-textarea id="what" label="Description" name="what" tooltip='A concise opening statement of what you plan to achieve. For example, "My goal is to deliver informative MyPerformance sessions to ministry audiences".' :value="$newGoal->what" />
                                                <small class="text-danger error-what"></small>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col m-2">
                                                <x-textarea id="measure_of_success" label="Measures of Success" name="measure_of_success" tooltip='A qualitative or quantitative measure of success for your goal. For example, "Deliver a minimum of 2 sessions per month that reach at least 100 people"' :value="$newGoal->measure_of_success" />
                                                <small class="text-danger error-measure_of_success"></small>
                                            </div>
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
                        <div class="h5 p-3">{{__('Step 2. Select audience')}}
                            <small><a href="#" class="float-right">Hide Ministries</a></small>
                        </div>
                        <div class="p-3">
                            @include('hradmin.partials.audiences')
                        </div>
                    </div>

                    <div>
                        <div class="h5 p-3">{{__('Step 3. Finish')}}</div>
                        <div class="p-3">
                            <x-button type="button" size="sm" :tooltip="__('Add Goal')" tooltipPosition="bottom" class="mr-2" aria-label="Add Goal"> Add Goal</x-button>
                            <x-button
                            size="sm"
                            :href='url()->previous()'
                            :tooltip="__('Cancel')"
                            tooltipPosition="bottom" class="mr-2" aria-label="Cancel">{{__('Cancel')}}
                        </x-button>
                    </div>
                </div>

            </div>



            @include('hradmin.partials.organization_script')

            <script src="//cdn.ckeditor.com/4.17.2/basic/ckeditor.js"></script>
            <script type="text/javascript">
            $('body').popover({
                selector: '[data-toggle]',
                trigger: 'hover',
            });

            $(document).ready(function(){
                CKEDITOR.replace('what', {
                    toolbar: [ ["Bold", "Italic", "Underline", "-", "NumberedList", "BulletedList", "-", "Outdent", "Indent"] ]
                });
                CKEDITOR.replace('measure_of_success', {
                    toolbar: [ ["Bold", "Italic", "Underline", "-", "NumberedList", "BulletedList", "-", "Outdent", "Indent"] ]
                });
            });

            $(document).on('click', '.btn-submit', function(e){
                e.preventDefault();
                for (var i in CKEDITOR.instances){
                    CKEDITOR.instances[i].updateElement();
                };
                // $.ajax({
                //     url:'/goal',
                //     type : 'POST',
                //     data: $('#goal_form').serialize(),
                //     success: function (result) {
                //         console.log(result);
                //         if(result.success){
                //             window.location.href= '/goal';
                //         }
                //     },
                //     error: function (error){
                //         var errors = error.responseJSON.errors;
                //         $('.text-danger').each(function(i, obj) {
                //             $('.text-danger').text('');
                //         });
                //         Object.entries(errors).forEach(function callback(value, index) {
                //             var className = '.error-' + value[0];
                //             $(className).text(value[1]);
                //         });
                //     }
                // });

            });
            </script>

            @endsection
