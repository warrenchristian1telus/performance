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
                            <div class="card-footer">
                                {{ $goal->user->name}}
                                <span class="float-right">
                                    @include("goal.partials.status-change")
                                </span>
                            </div>
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
        </script>
    @endpush
</x-side-layout>