<x-side-layout>
    <x-slot name="header">
        @include('goal.partials.tabs')
    </x-slot>
    <x-button icon="plus-circle" data-toggle="modal" data-target="#addGoalModal">
        Create new Goal
    </x-button>
                                
    <x-button icon="clone" href="{{ route('goal.library') }}">
        Add from Library
    </x-button>
    <div class="mt-4">
        {{-- {{$dataTable->table()}} --}}
        <div class="row">
         @if ($type == 'current')
            @foreach ($goals as $goal)
            
                <div class="col-12 col-sm-6">
                    @include('goal.partials.card')
                </div>
              
            @endforeach
            @else
             <div class="col-12 col-sm-12">
                    @include('goal.partials.target-table',['goals'=>$goals])
            </div>
            @endif
        </div>
        {{ $goals->links() }}
    </div>

@include('goal.partials.supervisor-goal')
@include('goal.partials.goal-detail-modal')
<div class="modal fade" id="addGoalModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="addGoalModalLabel">Create new Goal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-4">
        <form id="goal_form" action="{{ route ('goal.store')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-6">
                   
                    <label>
                        Goal Type
                        <select class="form-control" name="goal_type_id">
                            @foreach ($goaltypes as $item)
                                <option value="{{ $item->id }}" data-desc="{{ $item->description }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </label>
                    <small class="goal_type_text">@if($goaltypes) {{ $goaltypes[0]->description }} @endif</small>
                    </div>
                       <div class="col-6">
                    <x-input label="Goal Title" name="title" tooltip='This is a descriptive title of a Goal. For example, <i>&#8221;My Performance&#8221;</i>' />
                    <small class="text-danger error-title"></small>
                    </div>
                       <div class="col-6">
                    <x-textarea label="What" name="what" tooltip='This should be a concise opening statement of what you plan to achive. For example, <i>&#8221;My goal is to deliver informative MyPerformance sessions to ministry audiences&#8221;</i>'  />
                    <small class="text-danger error-what"></small>
                  </div>
                       <div class="col-6">
                    <x-textarea label="Why" name="why" tooltip='Define why this goal is important to you and organization (value of achievement). For example, <i>&#8221;This will improve the  consistency and quality of the employee experience across BCPS.&#8221;</i>'  />
                    <small class="text-danger error-why"></small>
                   </div>
                       <div class="col-6">
                    <x-textarea label="How" name="how" tooltip='This should describe your plan of the steps you intent to take to achieve your goal. For example, <i>&#8221;I will do this by working closely with ministry colleagues to develop presentations that respond to the need of their employees in advance of each phase of the performance management cycle.&#8221;</i>' />
                    <small class="text-danger error-how"></small>
                  </div>
                       <div class="col-6">
                    <x-textarea label="Measure of success" name="measure_of_success" tooltip='This is a qualitative and quantitative measure of the success of your goal. For example, <i>&#8221;Deliver a minimum of 2 sessions per month that reach at least 100 people&#8221;</i>'  />
                    <small class="text-danger error-measure_of_success"></small>
                </div>
                <div class="col-sm-6">
                    <x-input label="Start Date " class="error-start" type="date" name="start_date"  />
                    <small  class="text-danger error-start_date"></small>
                </div>
                <div class="col-sm-6">
                    <x-input label="Target Date " class="error-target" type="date" name="target_date"  />
                     <small  class="text-danger error-target_date"></small>
                </div>
                <div class="col-12">
                    <div class="card mt-3 p-3">
                        <span>Supporting Material</span>
                        <a href="https://www2.gov.bc.ca/gov/content/careers-myhr/all-employees/career-development/myperformance/myperformance-guides" target="_blank">This is a placeholder for a link to relevant contacts and support documentation for this process. Content to follow.</a>
                    </div>
                </div>
                <div class="col-12 text-left pb-5 mt-3">
                    <x-button type="button" class="btn-md btn-submit"> Save Changes</x-button>
                </div>
            </div>
        </form>
      </div>
    
    </div>
  </div>
</div>
    
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
    
    </script>
    </x-slot>

</x-side-layout>

   