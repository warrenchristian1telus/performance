
<div class="modal fade" id="addConversationModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="addConversationModalLabel">Schedule New Conversation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-4">
        <form id="conversation_form" action="{{ route ('conversation.store')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-6 col-md-6">
                    <label>
                       Topic </label>
                        <select class="form-control" name="conversation_topic_id">
                            @foreach ($conversationTopics as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                       <div class="col-6 col-md-6">
                       <label> Participants</label>
                        <select class="form-control w-100 select2" style="width:100%;" multiple name="participant_id[]" id="participant_id">
                            @foreach($participants as $p)
                            <option value="{{ $p->id }}">{{ $p->name }}</option>
                            @endforeach
                        </select>
                       
                    <small class="text-danger error-participant_id"></small>
                    </div>
                       <div class="col-6 col-md-6 mt-1">
                          <label> Date</label>
                         <x-input class="error-date" type="date" name="date"  />
                    <small class="text-danger error-date"></small>
                    </div>
                       <div class="col-6 col-md-6 mt-1">
                          <label> Time</label>
                        <x-input  class="error-date" type="time" name="time"  />
                       
                    <small class="text-danger error-time"></small>
                    </div>
                       <div class="col-6 col-md-6">
                          <label> Comments</label>
                    <x-textarea  name="comment"/>
                    <small class="text-danger error-comment"></small>
                  </div>
                   
                <div class="col-6 col-md-6">
                   <label> Supporting Material</label>
                    <div class="card p-3">
                    
                        <a href="https://www2.gov.bc.ca/gov/content/careers-myhr/all-employees/career-development/myperformance/myperformance-guides" target="_blank">Supporting Material</a>
                        <a href="https://www2.gov.bc.ca/gov/content/careers-myhr/all-employees/career-development/myperformance/myperformance-guides" target="_blank">https://www2.gov.bc.ca/gov/content/careers-myhr/all-employees/career-development/myperformance/myperformance-guides</a>
                    </div>
                </div>
                <div class="col-12 text-left pb-5 mt-3">
                    <x-button type="button" class="btn-md btn-submit"> Save Changes</x-button>
                </div>
            </div>
        </form>
      </div>
    
    </div>
  </div>
</div>