<x-side-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $goal['title'] }}
            @if(!$disableEdit && $goal->user_id === Auth::Id())
            <x-button icon="edit" :href="route('goal.edit', $goal->id)">Edit</x-button>
            @endif
        </h2>
        <small><a href="{{ url()->previous() === url()->current() ? route('goal.index') : url()->previous() }}">Back to list</a></small>
    </x-slot>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-7">
                        <div class="card">
                            @include("goal.partials.show")
                            <hr>
                            <div class="px-3 pb-3">
                                {{ $goal->user->name}}
                                <span class="float-right">
                                    @if ($goal->user_id === Auth::id())
                                    @include("goal.partials.status-change")
                                    @else
                                    <x-goal-status :status="$goal->status"></x-goal-status>
                                    @endif
                                </span>
                            </div>
                            {{--<hr>
                                <div class="px-3">
                                    <b>Linked Goals</b>
                                    <span class="float-right">
                                        <button class="btn  btn-sm link-goal" data-id="{{ $goal->id }}" data-toggle="modal" data-target="#supervisorGoalModal"> <i class="fa fa-plus"></i></button>

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
                                    <button class="btn btn-outline-primary btn-sm link-goal" data-id="{{ $goal->id }}" data-toggle="modal" data-target="#supervisorGoalModal">Link Goals</button>
                                </div>
                                @endforelse --}}


                            </div>
                        </div>
                        @if (!$goal->is_library)
                        <div class="col-12 col-sm-5">
                            <b>Comments</b>
                            @foreach ($goal->comments as $comment)
                            <div class="d-flex flex-row my-2">
                                <x-profile-pic></x-profile-pic>
                                <div class="border flex-fill p-2 rounded">
                                    <b>{{$comment->user->name}}</b> on {{$comment->created_at->format('M d, Y H:i A')}}<br>
                                    {!!$comment->comment!!}
                                    <div>
                                        @foreach($comment->replies as $reply)
                                        <div class="card mt-2 p-2 d-flex flex-row bg-light">
                                            <x-profile-pic></x-profile-pic>
                                            <div class="flex-fill">
                                                <b>{{$reply->user->name}}</b> on {{$reply->created_at->format('M d, Y H:i A')}}<br>
                                                {!!$reply->comment!!}
                                            </div>
                                        </div>
                                        @endforeach
                                        <x-button icon='reply' style="link" class="comment-reply" :data-comment-id="$comment->id" size="sm">Reply</x-button>
                                        <div class="reply-box d-none">
                                            <form action="{{route('goal.add-comment', $goal->id)}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="parent_id" value="{{$comment->id}}">
                                                <div class="d-flex flex-row my-2">
                                                    <x-profile-pic></x-profile-pic>
                                                    <div class="border flex-fill p-2 rounded">
                                                        <!-- <x-textarea class="ckeditor" name="comment" id="addreply"/> -->
                                                        <textarea class="ckeditor addreply" name="comment" id="addreply"></textarea>
                                                        <div class="d-flex flex-row my-2">
                                                            <x-button class="btn" action="submit" :data-comment-id="$comment->id" size="sm">Add Comment</x-button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <form action="{{route('goal.add-comment', $goal->id)}}" method="POST">
                                @csrf
                                <div class="d-flex flex-row my-2">
                                    <x-profile-pic></x-profile-pic>
                                    <div class="border flex-fill p-2 rounded">
                                        <textarea class="ckeditor" name="comment" id="addcomment"></textarea>
                                        <!-- <x-textarea class="ckeditor" name="comment" id="addcomment"/> -->
                                        <div class="d-flex flex-row my-2">
                                            <x-button class="btn" action="submit" size="sm">Add Comment</x-button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @include('goal.partials.supervisor-goal')

    @push('js')
    <script src="//cdn.ckeditor.com/4.17.2/basic/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            // CKEDITOR.editorConfig = function(config) {
            //     config.toolbarGroups = [
            //         {name: 'basicstyles', groups: ['basicstyles', 'cleanup']},
            //         {name: 'paragraph', groups: ['list', 'indent', 'blocks', 'align', 'bidi', 'paragraph']},
            //     ]
            // };
            // CKEDITOR.replace('addcomment', {
            //     // removePlugins: ['about, link, separator'],
            // });
            // CKEDITOR.replaceAll('addreply', {
                // removePlugins: ['about, link, separator'],
            // });
            // CKEDITOR.inline('form-control', {
            //     removePlugins: ['about, link, separator'],
            // });
        });
    </script>

    <script>
    $('form').keydown(function (event) {
        if (event.ctrlKey && event.keyCode === 13) {
            $(this).trigger('submit');
        }
    });
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
    $(document).on('click', ".link-goal", function () {
        $.get('/goal/supervisor/'+$(this).data('id'), function (data) {
            $("#supervisorGoalModal").find('.data-placeholder').html(data);
            $("#supervisorGoalModal").modal('show');
        });
    });

    let linkedGoals = [];
    $(document).on('click','.comment-reply', function(e){
        const commentId = $(this).data("comment-id");
        $(this).siblings(".reply-box").toggleClass("d-none");
    });
    $('body').popover({
        selector: '[data-toggle]',
        trigger: 'hover',
    });
    </script>
    @endpush

</x-side-layout>
