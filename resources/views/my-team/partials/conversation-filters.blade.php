<div class="container-fluid m-2 p-4 rounded" style="background-color: lightgray;">
    <form action="" method="POST">
        @csrf
        <div class="row mb-2">
            <div class="col-3">
                <x-dropdown :list="$reportees" label="Employee Name" name="user_id" :selected="request()->user_id" blankOptionText="All"></x-dropdown>
            </div>
            <div class="col-3">
                <x-dropdown :list="$topics" label="Conversation Type" name="conversation_topic_id" :selected="request()->conversation_topic_id" blankOptionText="All"></x-dropdown>
            </div>
            @if(request()->is('conversation/past') || request()->is('my-team/conversations/past'))
            <div class="col-3">
                <x-input label="Completion Date (From)" type="date" name="start_date" value="{{request()->start_date}}"></x-input>
            </div>
            <div class="col-3">
                <x-input label="Completion Date (To)" type="date" name="end_date" value="{{request()->end_date}}"></x-input>
            </div>
            @endif
            <div class="col-3">
                &nbsp;<br>
                <button class="btn btn-primary">Search</button>
            </div>
            
        </div>
    </form>
</div>