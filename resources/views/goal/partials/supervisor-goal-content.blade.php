<div class="modal-body p-0">
    <div class="goal-list-container">
        @forelse($supervisorGoals as $sg)
            <div class="border-bottom">
                <div class="card-body pb-0">
                    <p class="h5">
                        <a href="#" class="show-goal-detail" data-id="{{$sg->id}}">{{ $sg->title }}</a>
                    </p>
                    <p>
                        {{ $sg->what }}
                    </p>
                </div>
                <div class="px-3 pb-3">
                    {{ $sg->user->name }}
                    <span></span>
                    <span>| {{ $sg->target_date_human }}</span>
                    <span class="float-right">
                        <button class="btn btn-outline-primary btn-link btn-sm" id="goal_{{ $sg->id }}"
                            data-id="{{ $sg->id }}">Link</button>
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