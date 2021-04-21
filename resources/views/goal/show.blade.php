<x-side-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $goal['title'] }}
            <x-button icon="edit" :href="route('goal.edit', $goal->id)">Edit</x-button>
        </h2>
        <small><a href="{{ route('goal.index') }}">Back to list</a></small>
    </x-slot>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-7">
                        <div class="card">
                            <div class="card-header">
                                <h3>{{$goal->title}}</h3>
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <small class="text-muted">Start working on this goal on</small>
                                        <br>
                                        <b>{{$goal->start_date_human}}</b>
                                    </div>
                                    <div>
                                        <small class="text-muted">Meet this goal by</small>
                                        <br>
                                        <b>{{$goal->target_date_human}}</b>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <b>{{__("Type")}}</b>
                                <div class="form-control-plaintext">
                                    {{$goal->goalType['name']}}
                                </div>
                                <b>{{__("Goal")}}</b>
                                <div class="form-control-plaintext">
                                    {{$goal['title']}}
                                </div>
                                <b>{{__("What")}}</b>
                                <div class="form-control-plaintext">
                                    {{$goal['what']}}
                                </div>
                                <b>{{__("Why")}}</b>
                                <div class="form-control-plaintext">
                                    {{$goal['why']}}
                                </div>
                                <b>{{__("How")}}</b>
                                <div class="form-control-plaintext">
                                    {{$goal['how']}}
                                </div>
                                
                                <b>{{__("Measure of success")}}</b>
                                <div class="form-control-plaintext">
                                    {{$goal['measure_of_success']}}
                                </div>
                            </div>
                            <hr>
                            <div class="px-3">
                                {{ $goal->user->name}}
                                <span class="float-right">
                                    @include("goal.partials.status-change")
                                </span>
                            </div>
                            <hr>
                             <div class="px-3">
                               <b>Linked Goals</b>
                                <span class="float-right">
                                 <button class="btn  btn-sm" data-toggle="modal" data-target="#supervisorGoalModal"> <i class="fa fa-plus"></i></button>
                                  
                                </span>
                            </div>
                            @forelse ($linkedGoals as $l)
                            <div class="card mx-3">
                            <div class="card-body py-2">
                             <p class="mb-0"><a href="{{route("goal.show", $l->id)}}" > {{ $l->title }}</a></p>
                            
                             <span class="mr-2">{{ $l->user->name }}</span>
                           <span class="mx-3">  | &nbsp; &nbsp; &nbsp; 
                          
                            <div class="d-inline-flex flex-row align-items-center">
                                <div class="bg-{{ \Config::get("global.status.$l->status.color") }} rounded-circle mr-2" style="width:15px; height:15px;"></div>
                                <div class="text-capitalize">
                                    {{ $l->status }}
                                </div>
                            </div>
                            </span>
                             <span class="mx-3">| &nbsp;&nbsp; &nbsp; {{\Carbon\Carbon::now()->format('M d, Y') }}</span>
                            </div>
                           
                            </div>
                            @empty
                           
                            <div class="p-3 text-center">
                              
                                <p class="text-center">No Goals to Display</p>
                                <p class="text-center font-weight-bold">Start linking to your supervisor's goal</p>
                                <button class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#supervisorGoalModal">Link Goals</button>
                            </div>
                            @endforelse


                        </div>
                    </div>
                    <div class="col-12 col-sm-5">
                        <b>Comments</b>
                        @foreach ($goal->comments as $comment) 
                            <div class="d-flex flex-row my-2">
                                <x-profile-pic></x-profile-pic>
                                <div class="border flex-fill p-2 rounded">
                                    {{$comment->comment}}
                                    <small class="float-right" data-toggle="tooltip" title="{{$comment->created_at}}">
                                        {{$comment->created_at->diffForHumans()}}
                                    </small>
                                </div>
                            </div>
                        @endforeach
                        <form action="{{route('goal.add-comment', $goal->id)}}" method="POST">
                            @csrf
                            <div class="d-flex flex-row my-2">
                                <x-profile-pic></x-profile-pic>
                                <x-textarea label="" name="comment" placeholder="" required info="Ctrl+Enter to submit"/>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
<div class="modal fade" id="supervisorGoalModal" tabindex="-1" aria-labelledby="supervisorGoalModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="supervisorGoalModalLabel">Public Goals</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-0">
       <div class="goal-list-container">
       @forelse($supervisorGoals as $sg)
           <div class="border-bottom">
                <div class="card-body pb-0">
                    <p class="h5">
                        {{ $sg->title }}
                    </p>
                    <p>
                        {{ $sg->what }}
                    </p>
                </div>
                <div class="px-3 pb-3">
                    {{ $sg->user->name}}
                    <span></span>
                    <span>| {{$sg->target_date_human}}</span>
                    <span class="float-right">
                        <button class="btn btn-outline-primary btn-link btn-sm" id="goal_{{ $sg->id }}" data-id="{{ $sg->id }}">Link</button>
                    </span>
                </div>
            </div>
        @empty
          <div class="card-body pb-0">
        <p>No Goals To Link</p>
        </p>
            @endforelse
         
       </div>
      </div>
      <div class="modal-footer">
        <form action="{{ route('goal.link') }}" method="POST">
        @csrf
        
        <input type="hidden" name="current_goal_id" id="current_goal_id" value="{{ $goal->id }}">
        <input type="hidden" name="linked_goal_id" id="linked_goal_id" value="">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>
    @push('js')
        <script>
            $('form').keydown(function (event) {
                if (event.ctrlKey && event.keyCode === 13) {
                    $(this).trigger('submit');
                }
            });
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            })
            var linkedGoals = [];
            $('.btn-link').on('click',function(e){
                   console.log(e.target.innerText);
                   if(e.target.innerText == 'Link'){
                        linkedGoals.push(e.target.getAttribute('data-id'));
                       e.target.innerText = 'Unlink';
                   }else{
                       linkedGoals.pop(e.target.getAttribute('data-id'));
                        e.target.innerText = 'Link';
                   }
                   console.log(linkedGoals);
                   $('#linked_goal_id').val(linkedGoals);
            });
        </script>
    @endpush
</x-side-layout>