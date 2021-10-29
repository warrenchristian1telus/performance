
<div class="modal fade" id="addGoalToLibraryModal" tabindex="-1" aria-labelledby="addGoalToLibraryLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="addGoalToLibraryLabel">Suggest a goal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-4">
        <form action="{{ route('my-team.add-goal-to-library')}}" method="POST" id='add-goal-to-library-form'>
            @csrf
            <div class="row">
                <div class="col-6">
                    <label>
                        <select class="form-control" name="goal_type_id">
                            @foreach ($goaltypes as $item)
                                <option value="{{ $item->id }}" data-desc="{{ $item->description }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </label>
                    <small class="goal_type_text">@if($goaltypes) {{ $goaltypes[0]->description }} @endif</small>
                </div>
                <div class="col-6">
                    <x-input label="Goal Title" name="title"  tooltip='A short title (1-3 words) used to reference the goal throughout the Performance platform.' />
                    <small class="text-danger error-title"></small>
                </div>
                <div class="col-6">
                    <x-textarea label="What" name="what" tooltip='A concise opening statement of what you plan to achieve. For example, "My goal is to deliver informative MyPerformance sessions to ministry audiences".'   />
                    <small class="text-danger error-what"></small>
                </div>
                <div class="col-6">
                    <x-textarea label="Why" name="why" tooltip='Why this goal is important to you and the organization (value of achievement). For example, "This will improve the consistency and quality of the employee experience across the BCPS".'  />
                    <small class="text-danger error-why"></small>
                </div>
                <div class="col-6">
                    <x-textarea label="How" name="how" tooltip='A few high level steps to achieve your goal. For example, "I will do this by working closely with ministry colleagues to develop presentations that respond to the need of their employees in advance of each phase of the performance management cycle".' />
                    <small class="text-danger error-how"></small>
                </div>
                <div class="col-6">
                    <x-textarea label="Measures of Success" name="measure_of_success" tooltip='A qualitative or quantitative measure of success for your goal. For example, "Deliver a minimum of 2 sessions per month that reach at least 100 people"'  />
                    <small class="text-danger error-measure_of_success"></small>
                </div>
                <div class="col-6">
                    <label>
                        Mandatory/Suggested
                        <select class="form-control" name="is_mandatory">
                            <option value="1">Mandatory</option>
                            <option value="0">Suggested</option>
                        </select>
                    </label>
                </div>
                <div class="col-6">
                    <label>
                        Share with <br>
                        <select multiple class="form-control items-to-share" name="itemsToShare[]">
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}" selected> {{$employee->name}}</option>
                            @endforeach
                        </select>
                    </label>
                    <small class="text-danger error-share_with"></small>
                </div>
            </div>

            <div class="row">
                <div class="col-12 text-right">
                <button type="submit" class="btn btn-primary mt-3">Save</button>
                <button type="button" class="btn btn-secondary mt-3" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </form>
      </div>
    
    </div>
  </div>
</div>

@push('js')
    <script>
        $('select[name="goal_type_id"]').trigger('change');

        $('select[name="goal_type_id"]').on('change',function(e){
            var desc = $('option:selected', this).attr('data-desc');;
            $('.goal_type_text').text(desc);
        });
    </script>
    <script>
        $("#add-goal-to-library-form").on('submit', function (e) {
            e.preventDefault();
            const form = this;
            $.ajax({
                url: $(form).attr('action'),
                type : 'POST',
                data: $(form).serialize(),
                success: function (result) {
                    if(result.success){
                        window.location.reload();
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
    </script>
@endpush