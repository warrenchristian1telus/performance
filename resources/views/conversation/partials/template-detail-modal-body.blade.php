<div class="modal-header bg-primary">
    <h5 class="modal-title" id="conversationTemplateDetailLabel">{{$template->name}}</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body p-4">
    <button class="btn w-100 d-flex align-items-center text-primary p-2" style="background-color: #ddd;">
        <strong>When to Use This Template</strong>
        <div class="flex-fill"></div>
        <i class="fa fa-chevron-right"></i>
    </button>
    <div class="rounded text-primary p-2 mt-2" style="background-color: #ddd;">
        <strong>
            Meeting info
        </strong>
        <div class="mt-2 d-flex justify-content-between align-items-end">
            <div>
                <label style="font-weight: 400;" class="w-100">
                    Topic
                    <select class="form-control form-control-sm" id="template-select">
                        @foreach($allTemplates as $topic)
                        <option value="{{$topic->id}}" {{$topic->id == $template->id ? 'selected' : ''}}>{{$topic->name}}</option>
                        @endforeach
                    </select>
                </label>
            </div>
            <div>
                <label style="font-weight: 400;" class="w-100">
                    Participants
                    <select class="form-control form-control-sm">
                        opttion
                    </select>
                </label>
            </div>
            <div>
                <x-button size="sm" onclick="confirm('This will send a notification to all participants that you would like to schedule a conversation and will move this template to your upcoming conversations tab. Would you like to continue?')">Use this template</x-button>
            </div>
        </div>
    </div>
    <div class="rounded text-primary p-2 mt-2">
        <h6 class="text-underline">Questions to consider</h6>
        <ul>
            @forEach($template->questions as $question) 
            <li> {{ $question }}</li>
            @endforeach
        </ul>
    </div>
</div>