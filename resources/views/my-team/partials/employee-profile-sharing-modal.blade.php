<!-- Modal -->
<div class="modal fade" id="employee-profile-sharing-modal" tabindex="-1" aria-labelledby="employeeProfileSharing"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="employeeProfileSharing">{{__('Employee Profile Sharing')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="p-3">
                <strong>The profile of <span class="user-name"></span> is currently being shared with the following users:</strong> <br>
                    <div class="shared-with-list">None</div>
                <strong>Share this profile with another user</strong>
                <p>Supervisor and Ministry Administrators may share an employee's MyPerformance profile with another supervisor, or staff who normally handle employee's parmanent personnel records (ie. Public Service Agency) for a legtimate business reason; such as shared supervisory duties.</p>
                <p>An employee may wish to share their profile with someone other than a direct supervisor (for example, a hiring manager). In order to do this - the employee's consent is required.</p>
                <p>To continue, please specify the supervisor(s) you would like to share the employee profile with, which elements you would like to share, and your reason for sharing the profile.</p>
                <form id="share-profile-form" action="{{ route('my-team.share-profile') }}" method="POST" onsubmit="confirm('Are you sure you want to share this profile ?')">
                    @csrf
                    <input type="hidden" name="shared_id">
                    <div class="row">
                        <div class="col-6">
                            <x-dropdown name="share_with_users[]" label="Share With" multiple class="share-with-users"></x-dropdown>
                        </div>
                        <div class="col-6">
                            <x-dropdown name="items_to_share[]" :list="[['id'=>1, 'name'=> 'Goals', 'selected'=>true], ['id'=>2, 'name'=> 'Conversations',  'selected'=>true]]" label="Elements to share" multiple class="items-to-share"></x-dropdown>
                        </div>
                        <div class="col-6">
                            <x-input name="reason" label="Reason" tooltip="Reason tooltip"></x-input>
                        </div>
                    </div>
                    <div class="py-2">
                        <div class="my-3">
                            <strong><u>Agreement to Terms</u></strong>
                        </div>
                        <label class="form-check-label">
                            <input type="checkbox" name="accepted">
                            <span class="font-weight:normal">I wish to share this employee's profile with another supervisor. In doing so, I confirm that there is a legtimate business reason for providing shared access.</span>
                            <small class="text-danger error-accepted">
                                {{ $errors->first('accepted') }}
                            </small>
                        </label>
                        <x-button icon="user" class="mt-4">Share Profile</x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
