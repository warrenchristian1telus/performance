<!-- Modal -->
<div class="modal fade" id="employee-excused-modal" tabindex="-1" aria-labelledby="employeeExcused"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="employeeExcused">{{__('Excuse an Employee')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="p-4">
                <p>All employees are required to complete a performance profile if they have worked more than 30 days within the Ministry's performance reporting cycle.</p>
                <p>Employees may be excused from completing a profile only if they fit into one of the categories listed in the dropdown box below.  Note: employees that show up incorrectly in your list can be changed by contacting AskMyHR to change the reporting relationship.</p>
                <u><strong>Declaration</strong></u>
                <p>I wish to excuse <strong><span class="user-name"></span></strong> from having to complete their MyPerformance profile.</p>
                <div class="alert alert-default-warning alert-dismissible">
                  <span class="h5"><i class="icon fas fa-exclamation-triangle"></i>Note: by doing so, this employee will not show up in current and historical performance reports.</span>
                </div>
            <form id="excused_form" action="{{ route ('excused.updateExcuseDetails')}}" method="POST">
                <div class="form-group">
                    <div class="col-24 col-md-6 mt-1">
                      <x-input class="form-control" type="date" label="From" name="excused_start_date" value="$currentProfile->excused_start_date"/>
                   </div>
                    <div class="col-6 col-md-6 mt-1">
                        <x-input  class="form-control" type="date" label="To" name="excused_end_date" value="$currentProfile->excused_end_date" />
                    </div>
                    <div class="col-6 col-md-6 mt-1">
                        <x-dropdown :list="$eReasons" label="Reasons" name="excused_reason_id" value="$currentProfile->excused_reason_id"/>
                    </div>
                    <div class="col-12 text-left pb-5 mt-3">
                        <x-button type="button" class="btn-md btn-submit"> Proceed</x-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
