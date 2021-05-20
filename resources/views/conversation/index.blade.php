<x-side-layout>
    @if ($showWarning)
    <div class="mt-4">
        <div class="row">
            <div class="col-12">
                <div class="alert alert-default-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <span class="h5"><i class="icon fas fa-exclamation-circle"></i>Your last performance conversation was completed more than 4 months ago. Conversations must be scheduled every four months, at minimum.</span>
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="row">
        <div class="col-md-8"> @include('conversation.partials.tabs')</div>
        <div class="col-md-4 text-right">
            <x-button icon="plus-circle" data-toggle="modal" data-target="#addConversationModal">
                Schedule New
            </x-button>
        </div>
    </div>
    
    <div class="mt-4">
        <div class="row">
            @if ($type == 'upcoming')
            @foreach ($conversations as $c)
            <div class="col-12 col-md-12">
                <div class="callout callout-info">
                    <h6>{{ $c->topic->name }} @if($c->date_time->isPast())<i class="fas fa-exclamation-triangle text-danger ml-2" data-toggle="tooltip" title="Conversation is past due. Employee signoff is required" tooltip="Conversation is Past"></i>@endif</h6>
                    <span class="mr-2">Supervisor and Employee</span> |
                    <span class="mx-2"><i class="fa fa-calendar text-primary mr-2"></i> {{ $c->c_date }}</span> |
                    <span class="mx-2"> <i class="far fa-clock text-primary mr-2"></i> {{ $c->c_time }}</span>
                    <button class="btn btn-danger btn-sm float-right ml-2 delete-btn" data-id="{{ $c->id }}">
                        Delete
                    </button>
                    <button class="btn btn-primary btn-sm float-right ml-2 btn-view-conversation" data-id="{{ $c->id }}" data-toggle="modal" data-target="#viewConversationModal">
                        View
                    </button>
                </div>
            </div>
            @endforeach
            @else
            @foreach ($conversations as $c)
            <div class="col-12 col-md-12">
                <div class="callout callout-info">
                    <h6>{{ $c->topic->name }} </h6>
                    <span class="mr-2">Supervisor and Employee</span> |
                    <span class="mx-2"><i class="fa fa-calendar text-primary mr-2"></i> {{ $c->c_date }}</span> |
                    <span class="mx-2"> <i class="far fa-clock text-primary mr-2"></i> {{ $c->c_time }}</span>
                    <button class="btn btn-primary btn-sm float-right ml-2 btn-view-conversation" data-id="{{ $c->id }}" data-toggle="modal" data-target="#viewConversationModal">
                        View
                    </button>
                </div>
            </div>
            @endforeach

            @endif
        </div>
        <div class="float-right text-right">
            {{ $conversations->links() }}
        </div>
    </div>

    @include('conversation.partials.add-conversation-modal')
    @include('conversation.partials.view-conversation-modal')
    @if ($type == 'upcoming')
        @include('conversation.partials.delete-hidden-form')
    @endif

    <x-slot name="js">
        <script>
            $("#participant_id").select2();
            var conversation_id = 0;
            $('#conv_participant_edit').select2({

                ajax: {
                    url: '/participant'
                    , dataType: 'json'
                    , delay: 250
                    , data: function(params) {

                        var query = {
                            'search': params.term
                        , }
                        return query;
                    }
                    , processResults: function(data) {

                        return {
                            results: $.map(data.data.data, function(item) {
                                item.text = item.name;
                                return item;
                            })
                        };
                    }
                    , cache: false
                }
            });

            $(function() {
                $('[data-toggle="tooltip"]').tooltip()
            })
          
            $(document).on('click', '.btn-submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: '/conversation'
                    , type: 'POST'
                    , data: $('#conversation_form').serialize()
                    , success: function(result) {
                        if (result.success) {
                            window.location.href = '/conversation/upcoming';
                        }
                    }
                    , error: function(error) {
                        var errors = error.responseJSON.errors;
                        $('.error-date-alert').hide();
                        $('.text-danger').each(function(i, obj) {
                            $('.text-danger').text('');
                        });
                        Object.entries(errors).forEach(function callback(value, index) {
                            var className = '.error-' + value[0];
                            $(className).text(value[1]);
                            if (value[0] === 'date') {
                                $('.error-date-alert').show();
                            }
                        });
                    }
                });
            });

            $(document).on('click', '.btn-conv-edit', function(e) {
                let element_id = '.' + $(this).data('id');
                let elementName = $(this).data('name')
                $(element_id).toggleClass('d-none');
                $('.btn-conv-save').filter("[data-name=" + elementName + "]").removeClass("d-none");
                $('.btn-conv-cancel').filter("[data-name=" + elementName + "]").removeClass("d-none");
                $('.btn-conv-edit').filter("[data-name=" + elementName + "]").addClass("d-none");
                $('.btn-conv-edit').prop('disabled', true);
                // Enable Edit.
                // Disable view
            });

            $(document).on('click', '.btn-conv-save', function(e) {
                // Show Loader Spinner...
                $(this).html("<div class='spinner-border spinner-border-sm' role='status'></div>");
                const that = this;
                $.ajax({
                    url: '/conversation/' + conversation_id
                    , type: 'PUT'
                    , data: {
                        _token: '{{ csrf_token() }}'
                        , field: $(that).data('name'), // e.target.getAttribute('data-name'),
                        value: $("#" + $(that).data('id') + '_edit').val()
                    }
                    , success: function(result) {
                        // Disable Edit. 
                        $("." + $(that).data('id')).toggleClass('d-none');
                        const elementName = $(that).data('name');
                        $('.btn-conv-save').filter("[data-name=" + elementName + "]").addClass("d-none");
                        $('.btn-conv-cancel').filter("[data-name=" + elementName + "]").addClass("d-none");
                        $('.btn-conv-edit').filter("[data-name=" + elementName + "]").removeClass("d-none");
                        // Update View
                        if ($("#" + $(that).data('id') + '_edit').is('textarea')) {
                            $("#" + $(that).data('id')).text($("#" + $(that).data('id') + '_edit').val());
                        } else {
                            updateConversation(conversation_id)
                        }
                    }
                    , error: function(error) {
                        var errors = error.responseJSON.errors;
                        // Ignore for now.
                    }
                    , complete: function() {
                        // Remove Spinner
                        $(that).html('Save');
                        $('.btn-conv-edit').prop('disabled', false);
                    }
                });
            });

            $(document).on('click', '.btn-sign-off', function(e) {
                if ($(this).data('action') === 'unsignoff' && !confirm('Are you sure you want to unsign off the conversation ?')) {
                    return;
                }
                const url = ($(this).data('action') === 'unsignoff') ? '/conversation/unsign-off/' + conversation_id : '/conversation/sign-off/' + conversation_id;
                const data = ($(this).data('action') === 'unsignoff') ? $('#unsign-off-form').serialize() : $('#sign_off_form').serialize() + '&' +
                        $.param({
                            'employee_id': $('#employee_id').val()
                        });
                $(this).html("<div class='spinner-border spinner-border-sm' role='status'></div>");
                const that = this;
                $("span.error").html("");
                $.ajax({
                    url: url
                    , type: 'POST'
                    , data: data 
                    , success: function(result) {
                        if (result.success) {
                            location.reload();
                        }
                    }
                    , error: function(error) {
                        const errors = error.responseJSON.errors;
                        const errorElements = Object.keys(errors);
                        errorElements.forEach((element) => {
                            $("span.error").filter('[data-error-for="' + element + '"]').html(errors[element][0]);
                        });
                    }
                    , complete: function() {
                        const btnText = ($(that).data('action') === 'unsignoff') ? 'Unsign' : 'Sign with my employee ID';
                        $(that).html(btnText)
                    }
                });

            });


            $(document).on('click', '.btn-conv-cancel', function(e) {
                $("." + $(this).data('id')).toggleClass('d-none');
                const elementName = $(this).data('name');
                $('.btn-conv-save').filter("[data-name=" + elementName + "]").addClass("d-none");
                $('.btn-conv-cancel').filter("[data-name=" + elementName + "]").addClass("d-none");
                $('.btn-conv-edit').filter("[data-name=" + elementName + "]").removeClass("d-none");
                $('.btn-conv-edit').prop('disabled', false);
            });

            $(document).on('click', '.btn-view-conversation', function(e) {
                conversation_id = e.target.getAttribute('data-id');
                updateConversation(conversation_id);
            });

            $(document).on('click', '.delete-btn', function() {
                if (!confirm('Are you sure you want to delete this conversation ?')) {
                    return;
                }
                $('#delete-conversation-form').attr(
                    'action'
                    , $('#delete-conversation-form').data('action').replace('xxx', $(this).data('id'))
                ).submit();
            });

            function updateConversation(conversation_id) {
                $.ajax({
                    url: '/conversation/' + conversation_id
                    , success: function(result) {
                        $('#conv_participant_edit').val('');
                        $('#conv_participant').val('');
                        $('#conv_title').text(result.topic.name);
                        $('#conv_title_edit').val(result.topic.name);
                        $('#conv_date').text(result.c_date);
                        $('#conv_date_edit').val(result.date);
                        $('#conv_time').text(result.c_time);
                        $('#conv_time_edit').val(result.time);
                        $('#conv_comment').text(result.comment);
                        $('#conv_comment_edit').text(result.comment);
                        $('#info_comment1').text(result.info_comment1);
                        $('#info_comment1_edit').text(result.info_comment1);
                        $('#info_comment2').text(result.info_comment2);
                        $('#info_comment2_edit').text(result.info_comment2);
                        $('#info_comment3').text(result.info_comment3);
                        $('#info_comment3_edit').text(result.info_comment3);
                        $('#info_comment4').text(result.info_comment4);
                        $('#info_comment4_edit').text(result.info_comment4);
                        $('#info_comment5').text(result.info_comment4);
                        $('#info_comment5_edit').text(result.info_comment4);

                        if(!!$('#unsign-off-form').length) {
                            $('#unsign-off-form').attr('action', $('#unsign-off-form').data('action-url').replace('xxx', conversation_id));
                        }
                        $('#questions-to-consider').html('');
                        if(result.topic.id == 4){
                            $('#info_to_capture').removeClass('d-none');
                        }else{
                            $('#info_to_capture').addClass('d-none');
                        }

                        result.questions?.forEach((question) => {
                            $('#questions-to-consider').append('<li>' + question + '</li>');
                        });
                        $('#template-title').text(result.topic.name + ' Template');
                        // $('#conv_participant_edit').next(".select2-container").hide();

                        var participants = '';
                        $.each(result.topics, function(key, value) {
                            var selected = '';
                            if (value.id == result.conversation_topic_id) {
                                selected = 'selected';
                            }
                            $('#conv_title_edit').append('<option value="' + value.id + '" ' + selected + '>' + value.name + '</option>');
                        });
                        $.each(result.conversation_participants, function(key, value) {
                            var data = {
                                id: value.id
                                , text: value.participant.name
                            , };
                            var comma = ', ';
                            if (result.conversation_participants.length == (key + 1)) {
                                comma = '';
                            }
                            participants = participants + value.participant.name + comma;
                            var newOption = new Option(value.participant.name, value.id, true, true);
                            $('#conv_participant_edit').append(newOption).trigger('change');
                            $('#conv_participant_edit').trigger({
                                type: 'select2:select'
                                , params: {
                                    data: data
                                }
                            });
                        });
                        $('#conv_participant').text(participants);
                    }
                    , error: function(error) {
                        var errors = error.responseJSON.errors;
                    }
                });
            }

        </script>
    </x-slot>

</x-side-layout>
