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
       
       

         <form id="conversation_form" action="{{ route ('conversation.store')}}" method="POST">
             @csrf
              <div class="mt-2 d-flex justify-content-between align-items-end">

            <div>

                <label style="font-weight: 400;" class="w-100">
                    Topic
                    <select name="conversation_topic_id" class="form-control form-control-sm" id="template-select">

                        @foreach($allTemplates as $topic)
                        <option value="{{$topic->id}}" {{$topic->id == $template->id ? 'selected' : ''}}>{{$topic->name}}</option>
                        @endforeach
                    </select>
                </label>
            </div>
            <div>
                <label style="font-weight: 400;" class="w-100">
                    Participants
                   <select class="form-control w-100 select2" style="width:100%;" multiple name="participant_id[]" id="participant_id">
                       @foreach($participants as $p)
                       <option value="{{ $p->id }}">{{ $p->name }}</option>
                       @endforeach
                   </select>

                </label>
            </div>
            <div>
            <input type="hidden" name="date" value="{{ \Carbon\Carbon::now() }}">
            <input type="hidden" name="time" value="{{ \Carbon\Carbon::now() }}">
            <x-button  size="sm" class="btn-md btn-submit">Use this template</x-button>

            </div>
            

        </div>
        </form>


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