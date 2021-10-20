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

@push('js')
    <script>
        function loadTemplate(id, cb) {
            $.ajax({
                url: '/conversation/templates/' + id,
                success: cb
            });
        }
        function setTemplateModalContent(content) {
            $("#conversationTemplateDetail").find('.modal-content').html(content);
        }
        $(document).on('click', '.template-btn', function () {
            const id = $(this).data('id');
            loadTemplate(id, setTemplateModalContent);
        });

        $(document).on('change', '#template-select', function () {
            const id = $(this).val();
            loadTemplate(id, setTemplateModalContent);
        });
    </script>
@endpush
</x-side-layout>