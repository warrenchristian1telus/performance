<!-- Modal -->
<div class="modal fade" id="edit-suggested-goal-modal" tabindex="-1" aria-labelledby="editSuggestedGoalModal"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="editSuggestedGoalModal">{{__('Edit Suggested Goal')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('my-team.update-suggested-goal', '')}}" id="editSuggestedGoalModalForm" method="POST">
                @csrf
                <input type="hidden" name="id">
                <div class="p-4">
                    <div class="row">
                        <div class="col-6">
                            <x-dropdown label="Goal Type" name="goal_type_id" :list="$goaltypes" />
                        </div>
                        <div class="col-6">
                            <x-input label="Goal Title" name="title"/>
                        </div>
                        <div class="col-6">
                            <x-textarea label="What" name="what" />
                        </div>
                        <div class="col-6">
                            <x-textarea label="Why" name="why" />
                        </div>
                        <div class="col-6">
                            <x-textarea label="How" name="how" />
                        </div>
                        <div class="col-6">
                            <x-textarea label="Measures of Success" name="measure_of_success" />
                        </div>

                        <div class="col-sm-6">
                            <x-input label="Start Date" type="date" name="start_date" />
                        </div>
                        <div class="col-sm-6">
                            <x-input label="End Date" type="date" name="target_date" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-right">
                    <x-button type="submit" class="btn-md"> Save </x-button>
                </div>
            </form>
        </div>
    </div>
</div>
