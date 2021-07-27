
<div class="modal fade" id="addGoalToLibraryModal" tabindex="-1" aria-labelledby="addGoalToLibraryLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="addGoalToLibraryLabel">Add Goal to Library</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-4">
        <form action="{{ route('my-team.add-goal-to-library')}}" method="POST" id='add-goal-to-library-form'>
            @csrf
            <div class="row">
                <div class="col-6">
                    <x-dropdown :list="$goaltypes" label="Goal Type" name="goal_type_id"/>
                </div>
                <div class="col-6">
                    <x-input label="Goal Title" name="title" />
                    <small class="text-danger error-title"></small>
                </div>
                <div class="col-6">
                    <x-textarea label="What" name="what"  />
                    <small class="text-danger error-what"></small>
                </div>
                <div class="col-6">
                    <x-textarea label="Why" name="why"  />
                    <small class="text-danger error-why"></small>
                </div>
                <div class="col-6">
                    <x-textarea label="How" name="how" />
                    <small class="text-danger error-how"></small>
                </div>
                <div class="col-6">
                    <x-textarea label="Measures of Success" name="measure_of_success"  />
                    <small class="text-danger error-measure_of_success"></small>
                </div>
                <div class="col-6">
                    <label>
                        Share with <br>
                        <select multiple class="form-control search-users" name="share_with[]">
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