{{-- <form id="modal-form" class="form-control" action="managesharesupdate" method="post" enctype="multipart/form-data"> --}}
    {{-- @dd($request->level0); --}}
    {{-- @dd($id); --}}
    <div class="modal fade editModal" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">

        {{-- {{ method_field('PUT') }}
        {{ csrf_field() }} --}}
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" type="hidden" id="shareDetailLabel">View Employee Shares</h5>
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
                    <table class="table table-bordered admintable" id="admintable" name="admintable" style="width: 100%; overflow-x: auto; "></table>
                </div>
                <div class="modal-footer p-3">
                    <div class="col">
                        <button id="removeButton" name="removeButton" type="button" class="btn btn-outline-danger float-left" onClick="return confirm('Are you sure?')" aria-label="Remove All Shares">Remove All Shares</button>
                    </div>
                    <div class="col">
                        <button id="cancelButton" name="cancelButton" type="button" class="btn btn-secondary float-right" style="margin:5px;" data-dismiss="modal" aria-label="Close">Close</button>                    
                    </div>
                </div>
            </div>
        </div>
    
    </div>

{{-- </form> --}}
