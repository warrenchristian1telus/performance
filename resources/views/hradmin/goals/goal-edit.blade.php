@extends('hradmin.layout')
@section('tab-content')

<div class="p-3">
    <x-button
    size="sm"
    :href='url()->previous()'
    :tooltip="__('Click to return to Goal Bank.')"
    tooltipPosition="bottom" aria-label="Back to all goals">
    {{__('Back to all goals')}}
</x-button>
</div>

<div>
    <div class="h4 p-2">{{__('Edit Goal')}}</div>
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
    <div class="h5 p-2">{{__('Step 1. Enter Goal Details')}}</div>
    <div class="p-2">

        <div class="card card-primary shadow mb-3">
            <div class="d-flex justify-content-around">

                <div class="container-fluid">
                    <form action="{{ route ('hradmin.goalupdate', $bankgoal->id)}}" method="POST" onsubmit="confirm('Are you sure you want to update Goal ?')">
                        @csrf
                        @method('PUT')
                        <tbody>
                            <div class="row">
                                <div class="col m-2">
                                    <x-dropdown :list="$goalTypes" label="Goal Type" name="goal_type_id" :value="$bankgoal->goal_type_id"/>
                                    </div>
                                    <div class="col m-2">
                                        <x-input label="Goal Title" name="title" tooltip='A short title (1-3 words) used to reference the goal throughout the Performance platform.' :value="$bankgoal->title"/>
                                            <small class="text-danger error-title"></small>
                                        </div>
                                        <div class="col m-2">
                                            <x-dropdown :list="$mandatoryOrSuggested" label="Mandatory/Suggested" name="is_mandatory" :selected="request()->is_mandatory"></x-dropdown>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col m-2">
                                            <x-textarea id="what" label="Description" name="what" tooltip='A concise opening statement of what you plan to achieve. For example, "My goal is to deliver informative MyPerformance sessions to ministry audiences".' :value="$bankgoal->what" />
                                                <small class="text-danger error-what"></small>
                                            </div>
                                        </div>


                                                <div class="row">
                                                    <div class="col m-2">
                                                        <x-textarea id="measure_of_success" label="Measures of Success" name="measure_of_success" tooltip='A qualitative or quantitative measure of success for your goal. For example, "Deliver a minimum of 2 sessions per month that reach at least 100 people"' :value="$bankgoal->measure_of_success" />
                                                            <small class="text-danger error-measure_of_success"></small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </tbody>
                                </form>
                            </div>

                        </div>
                    </div>

                    <div>
                        <div class="h5 p-3">{{__('Step 2. Select audience')}}
                            <small><a href="#" class="float-right">Hide Ministries</a></small>
                        </div>
                        <div class="p-3">
                            @foreach($aud_org as $org)
                            <button id="trim(preg_replace("/[^0-9a-z]+/i", " ", {{$org->organization}}))" class="btn w-100 d-flex align-items-center text-primary p-2 m-2" style="background-color: #ddd;" data-toggle="collapse" data-target="#when_to_use">
                                <input id='orgitem' type='checkbox' class='sub_chk' data-id="trim(preg_replace("/[^0-9a-z]+/i", " ", {{$org->organization}}))">
                                <strong>&nbsp;&nbsp;{{$org->organization}}</strong>
                                <div class="flex-fill"></div>
                                <i class="fa fa-chevron-down"></i>
                            </button>
                            <div id="when_to_use"  class="collapse p-3">
                                @if(count($aud_level1))
                                @include('hradmin.partials.audience_level1', ['aud_level1' => $aud_level1, 'data-parent' => $org->organization, 'dataLevel' => '1'])
                                @endif
                            </div>
                            @endforeach

                        </div>

                        <div>
                            <div class="h5 p-3">{{__('Step 3. Finish')}}</div>
                            <div class="p-3">
                                <x-button
                                size="sm"
                                :href='url()->previous()'
                                :tooltip="__('Save Changes')"
                                tooltipPosition="bottom" class="mr-2" aria-label="Save Changes">{{__('Save Changes')}}
                            </x-button>
                            <x-button
                            size="sm"
                            :href='url()->previous()'
                            :tooltip="__('Cancel')"
                            tooltipPosition="bottom" class="mr-2" aria-label="Cancel">{{__('Cancel')}}
                        </x-button>
                    </div>
                </div>

            </div>

        </div>

        @endsection


        <x-slot name="js">
            {{-- {{$dataTable->scripts()}} --}}





            <script>
            $('body').popover({
                selector: '[data-toggle]',
                trigger: 'hover',
            });

            $('select[name="goal_type_id"]').trigger('change');

            $('select[name="goal_type_id"]').on('change',function(e){
                console.log(this);
                var desc = $('option:selected', this).attr('data-desc');;
                console.log(desc);
                $('.goal_type_text').text(desc);
            });


            $(document).on('click', '.btn-submit', function(e){
                e.preventDefault();
                $.ajax({
                    url:'/goal',
                    type : 'POST',
                    data: $('#goal_form').serialize(),
                    success: function (result) {
                        console.log(result);
                        if(result.success){
                            window.location.href= '/goal';
                        }
                    },
                    error: function (error){
                        var errors = error.responseJSON.errors;
                        $('.text-danger').each(function(i, obj) {
                            $('.text-danger').text('');
                        });
                        Object.entries(errors).forEach(function callback(value, index) {
                            var className = '.error-' + value[0];
                            $(className).text(value[1]);
                        });
                    }
                });

            });
            $(document).on('click', ".link-goal", function () {
                $.get('/goal/supervisor/'+$(this).data('id'), function (data) {
                    $("#supervisorGoalModal").find('.data-placeholder').html(data);
                    $("#supervisorGoalModal").modal('show');
                });
            });

            $(document).on('click', '.show-goal-detail', function(e) {
                $.get('/goal/library/'+$(this).data('id'), function (data) {
                    $("#goal-detail-modal").find('.data-placeholder').html(data);
                    $("#goal-detail-modal").modal('show');
                });
            });

            $(document).on('click', '.btn-link', function(e) {
                let linkedGoals = [];
                if(e.target.innerText == 'Link'){
                    linkedGoals.push(e.target.getAttribute('data-id'));
                    e.target.innerText = 'Unlink';
                }else{
                    linkedGoals.pop(e.target.getAttribute('data-id'));
                    e.target.innerText = 'Link';
                }
                $('#linked_goal_id').val(linkedGoals);
            });

            $(document).on('click', '.goal-change a', function (e) {
                const movingToPastMessage = "Changing the status of this goal will move it to your Past Goals tab. You can click there to make the goal active again at any time. Proceed?";
                const movingToCurrentMessage = "Changing the status of this goal will move it to your Current Goals tab. You can click there to access the goal again at any time. Proceed?";
                if($(this).data('current-status') === 'active' && !confirm(movingToPastMessage)) {
                    e.preventDefault();
                } else if($(this).data('status') === 'active' && !confirm(movingToCurrentMessage)) {
                    e.preventDefault();
                }
            });
        </script>
    </x-slot>


    <script src="//cdn.ckeditor.com/4.17.2/basic/ckeditor.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        CKEDITOR.replace('what', {
            toolbar: [ ["Bold", "Italic", "Underline", "-", "NumberedList", "BulletedList", "-", "Outdent", "Indent"] ]
        });

        CKEDITOR.replace('measure_of_success', {
            toolbar: [ ["Bold", "Italic", "Underline", "-", "NumberedList", "BulletedList", "-", "Outdent", "Indent"] ]
        });
    });
</script>
