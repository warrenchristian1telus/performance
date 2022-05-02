<form action="" method="post" enctype="multipart/form-data">
    {{ method_field('put') }}
    {{ csrf_field() }}
    <div class="modal fade editModal" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    {{-- <h5 class="modal-title" id="accessDetailLabel">Edit Employee Access Level</h5> --}}
                    <h5 class="modal-title" type="hidden" id="accessDetailLabel">Edit Employee Access Level</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="mt-4 p-3">
                    <div class="row">
                        <div class="col-12">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
                        </div>
                    </div>
                </div>
                <div class="modal-body p-3">
                    <form id="access_form" action="" method="POST">
                        @csrf
                        <div class="row p-3">
                            <div class="col">
                                <label for='accessselect' title='Access Level Tooltip'>Access Level
                                <select name="accessselect" class="form-control" id="accessselect">
                                    @foreach($roles as $selectId => $selectName)
                                        <option value=" {{ $selectId }} "> {{ $selectName }} </option>
                                    @endforeach
                                </select>
                                </label>
                            </div>
                            <div class="col col-8">
                                <x-input id="reason" name="reason" label="Reason for assigning" data-toggle="tooltip" data-placement="top" data-trigger="hover-focus" tooltip="Reason tooltip"/>
                            </div>
                        </div>
                            
                    </form>
                </div>
                <div class="modal-footer p-3">
                    <div class="col">
                        <button id="removeButton" name="removeButton" type="button" class="btn btn-outline-danger float-left" aria-label="Remove Access">Remove Access</button>
                    </div>
                    <div class="col">
                        <button id="cancelButton" name="cancelButton" type="button" class="btn btn-secondary float-right" style="margin:5px;" data-dismiss="modal" aria-label="Cancel">Cancel</button>                    
                        <div class="space"></div>
                        <button id="saveButton" name="saveButton" type="submit" class="btn btn-primary float-right" style="margin:5px;" role="save" data-toggle="modal" data-target="#updateModal" aria-label="Save Changes">Save Changes</button>                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>


@push('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>  
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('js/bootstrap-multiselect.min.js')}} "></script>
    <script type="text/javascript">
        $(document).ready() 
        {
            // $('body').popover({
            //     selecttor: ['data-toggle'],
            //     trigger: 'hover',
            // });
        
            $(document).on('show.bs.modal'), '#editModal', function(e) {
                $('#reason').val('ASD UHYGFR EDFFGHJKL');
                $('#editModal').find('input').prop('readonly', false);
                $("#editModal").find("x-input").val('JIUHJU HYGTGF');
                $("#editModal").find("select").val('JIUHJU HYGTGF');
            }
        }
    </script>
@endpush


