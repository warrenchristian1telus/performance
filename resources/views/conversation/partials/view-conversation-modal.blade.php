<div class="modal fade" id="viewConversationModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-default-danger error-date-alert" style="display:none">
                            <span class="h5"><i class="icon fas fa-exclamation-circle"></i>
                            <span class="error-date">
                                Conversations must be scheduled every four months, at minimum.
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 col-md-6">
                        <div class="d-flex align-items-end row">
                            <div>
                                <label>Topic</label>
                                <span id="conv_title" class="conv_title"></span>
                                <select id="conv_title_edit" name="conversation_topic_id" class="form-control conv_title d-none">
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-6">
                        <div class="d-flex align-items-end row">
                            <div class="col-md-9">
                                <label>Participants</label>
                                <span id="conv_participant" class="conv_participant font-weight-bold"></span>
                                <div class="conv_participant  d-none">
                                    <select class="form-control conv_participant_edit select2 w-100" style="width:100%" multiple name="conversation_participant_id[]" id="conv_participant_edit">

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                            @if ($type == 'upcoming') 
                                <x-edit-cancel-save name="conversation_participant_id" id="conv_participant" />
                            @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-6 mt-1">
                        <div class="d-flex align-items-end">
                            <div class="col-md-9">
                                <x-input id="conv_date_edit" class="conv_date d-none" type="date" name="date" label="Conversation Date" />
                                <span id="conv_date" class="conv_date"></span>
                            </div>
                            <div class="col-md-3">
                            @if ($type == 'upcoming') 
                                <x-edit-cancel-save name="date" id="conv_date" />
                            @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-6 mt-1">
                        <div class="d-flex align-items-end">
                            <div class="col-md-9">

                                <x-input id="conv_time_edit" class="conv_time d-none" type="time" name="time" label="Conversation Time" />
                                <span id="conv_time" class="conv_time"></span>
                            </div>
                            <div class="col-md-3">
                            @if ($type == 'upcoming') 
                                <x-edit-cancel-save name="time" id="conv_time" />
                            @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-6 mt-1">
                        <div class="d-flex align-items-end">
                            <div class="col-md-9">

                                <x-textarea id="conv_comment_edit" class="conv_comment d-none" name="comment" label="Comments" />
                                <span id="conv_comment" class="conv_comment"></span>
                            </div>
                            <div class="col-md-3">
                            @if ($type == 'upcoming') 
                                <x-edit-cancel-save name="comment" id="conv_comment" />
                            @endif
                            </div>
                        </div>
                    </div>

                </div>

                <hr>
                <div>
                    <h5 id="template-title"></h5>
                    <br>
                    <h6><u>Questions to Consider</u></h6>
                    <ul id="questions-to-consider">

                    </ul>
                </div>
                <div class="d-none" id="info_to_capture">
                    <h6><u>Information to Capture</u></h6>
                    <h6>What must the employee accomplish? By when?</h6>

                    <div class="row">
                        <div class="col-md-8">
                            <textarea class="form-control info_comment1 mb-4 d-none" name="info_comment1" id="info_comment1_edit"></textarea>
                            <textarea class="form-control info_comment1 mb-4 btn-conv-edit" name="info_comment1" id="info_comment1" data-id="info_comment1" data-name="info_comment1"></textarea>
                            <span id="info_comment1" class="info_comment1"></span>
                        </div>
                        <div class="col-md-4">
                        @if ($type == 'upcoming') 
                            <x-edit-cancel-save name="info_comment1" id="info_comment1" hideEdit="true" />
                        @endif
                        </div>
                    </div>

                    <h6>What support will the supervisor (and others) provide?</h6>

                    <div class="row">
                        <div class="col-md-8">
                            <textarea class="form-control info_comment2 mb-4 d-none" name="info_comment2" id="info_comment2_edit"></textarea>
                            <textarea class="form-control info_comment2 mb-4 btn-conv-edit" name="info_comment2" id="info_comment2" data-id="info_comment2" data-name="info_comment2"></textarea>
                            <span id="info_comment2" class="info_comment2"></span>
                        </div>
                        <div class="col-md-4">
                        @if ($type == 'upcoming') 
                            <x-edit-cancel-save name="info_comment2" id="info_comment2" hideEdit="true" />
                        @endif
                        </div>
                    </div>

                    <h6>How will success be measured and celebrated?</h6>
                    <div class="row">
                        <div class="col-md-8">
                            <textarea class="form-control info_comment3 mb-4 d-none" name="info_comment3" id="info_comment3_edit"></textarea>
                            <textarea class="form-control info_comment3 mb-4 btn-conv-edit" name="info_comment3" id="info_comment3" data-id="info_comment3" data-name="info_comment3"></textarea>

                        </div>
                        <div class="col-md-4">
                        @if ($type == 'upcoming') 
                            <x-edit-cancel-save name="info_comment3" id="info_comment3" hideEdit="true"  />
                        @endif
                        </div>
                    </div>
                     </div>
                   
                     <div>

                    <h6><u>Comments</u></h6>

                    <h6>Employee Comments</h6>

                    <div class="row">
                        <div class="col-md-8">
                            <textarea class="form-control info_comment4 mb-4 d-none" name="info_comment4" id="info_comment4_edit"></textarea>
                            <textarea class="form-control info_comment4 mb-4 btn-conv-edit" data-name="info_comment4" data-id="info_comment4" name="info_comment4" id="info_comment4"></textarea>
                        </div>
                        <div class="col-md-4">
                        @if ($type == 'upcoming') 
                            <x-edit-cancel-save name="info_comment4" id="info_comment4" hideEdit="true" />
                        @endif
                        </div>
                    </div>
                    <h6> Comments</h6>
                    <div class="row">
                        <div class="col-md-8">
                            <textarea class="form-control info_comment5 mb-4 d-none" name="info_comment5" id="info_comment5_edit"></textarea>
                            <textarea class="form-control info_comment5 mb-4 btn-conv-edit" name="info_comment5" id="info_comment5" data-id="info_comment5" data-name="info_comment5"></textarea>
                            <span id="info_comment5" class="info_comment5"></span>
                        </div>
                        <div class="col-md-4">
                        @if ($type == 'upcoming') 
                            <x-edit-cancel-save name="info_comment5" id="info_comment5" hideEdit="true"/>
                        @endif
                        </div>
                    </div>
                    </div>
                    <hr>
                    @if ($type == 'upcoming')
                    <div>
                        <h5><u>Sign-off</u></h5>
                        <div class="alert alert-default-danger common-error" style="display:none">
                            <span class="h5">
                                
                            </span>
                        </div>
                        <form id="sign_off_form" method="post">
                            @csrf
                            <table class="table table-borderless">
                                <tr>
                                    <th></th>
                                    <th>Agree</th>
                                    <th>Disagree</th>
                                </tr>
                                <tr>
                                    <td>My supervisor and I reviewed progress of my goals and adjusted as necessary.</td>
                                    <td class="text-center"><input type="radio" name="check_one" value="1"></td>
                                    <td class="text-center"><input type="radio" name="check_one" value="0"></td>
                                </tr>
                                <tr>
                                    <td>I received guidance from my supervisor and understand what is expected of me between now and our next scheduled meeting.</td>
                                    <td class="text-center"><input type="radio" name="check_two" value="1"></td>
                                    <td class="text-center"><input type="radio" name="check_two" value="0"></td>
                                </tr>
                                <tr>
                                    <td>I accept the content of this record of conversation.</td>
                                    <td class="text-center"><input type="radio" name="check_three" value="1"></td>
                                    <td class="text-center"><input type="radio" name="check_three" value="0"></td>
                                </tr>
                            </table>
                        </form>

                        <div class="my-2">Enter employee ID to sign:</div>

                        <input type="text" id="employee_id" class="form-control d-inline w-50">
                        <button class="btn btn-primary btn-sign-off ml-2" type="button">Sign with my employee ID</button>
                        <br>
                        <span class="text-danger error" data-error-for="employee_id"></span>

                    </div>
                @endif
                @if ($type == 'past') 
                    <div class="my-2">Enter employee ID to unsign:</div>
                    <form id="unsign-off-form" data-action-url="{{ route('conversation.unsignoff', 'xxx')}}" method="post">
                        @csrf
                        <input type="text" name="employee_id" id="employee_id" class="form-control d-inline w-50"> 
                        <button data-action="unsignoff" class="btn btn-primary btn-sign-off ml-2" type="button">Un-Sign</button>
                        <br>
                        <span class="text-danger error" data-error-for="employee_id"></span>
                    </form>
                @endif
            </div>
        </div>

    </div>
</div>
