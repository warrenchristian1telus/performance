<x-side-layout>
    <div class="row">
        <div class="col-12">
            <h3>Conversations</h3>
        </div>
        <div class="col-md-8"> @include('conversation.partials.tabs')</div>
    </div>
    <div class="mt-4">
        <div class="row">
            <div class="col-8">
                <form action="" id="search-templates-form">
                    <div class="position-relative w-50">
                        <button class="btn btn-primary btn-sm position-absolute" style="right:0;margin:3px;height:2rem">Search</button>
                        <input class="form-control input clearfix float-left" id="search-input" name="search" value="{{$searchValue}}" />
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="mt-4">
        <div class="row">
            <div class="col-12">
                @foreach ($templates as $template)
                <div class="card">
                    <div class="card-body text-primary p-2">
                        <button class="btn d-flex align-items-center w-100 template-btn" data-toggle="modal" data-target="#conversationTemplateDetail" data-id="{{$template->id}}">
                            <strong>{{$template->name}}</strong>
                            <div class="flex-fill"></div>
                            <i class="fa fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @include('conversation.partials.template-detail-modal')
    <x-slot name="js">
        <script>
            function loadTemplate(id, cb) {
                $.ajax({
                    url: '/conversation/templates/' + id
                    , success: cb
                });
            }

            function setTemplateModalContent(content) {
                $("#conversationTemplateDetail").find('.modal-content').html(content);
                $("#participant_id").select2();

            }



            $(document).on('click', '.template-btn', function() {
                const id = $(this).data('id');
                loadTemplate(id, setTemplateModalContent);
            });

            $(document).on('change', '#template-select', function() {
                const id = $(this).val();
                loadTemplate(id, setTemplateModalContent);
            });

            $(document).on('click', '.btn-submit', function(e) {
                if(!confirm('This will send a notification to all participants that you would like to schedule a conversation and will move this template to your upcoming conversations tab. Would you like to continue?')){
                    return false;
                }

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

        </script>
    </x-slot>
    <x-slot name="css">
        <style>
            i {
                transition: 0.2s ease-in-out;
            }
            [aria-expanded="true"] i{
                transform: rotate(90deg);
            }
        </style>
    </x-slot>

</x-side-layout>
