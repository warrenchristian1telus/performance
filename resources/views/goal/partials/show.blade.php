<div class="card-header">
    <h3>
        {{$goal->title}}
        @if ($showAddBtn ?? false)
        <div class="float-right">
            <x-button type="button" class="float-right" icon="plus-circle" id="addBankGoalToUserBtn" data-id="{{$goal->id}}">
                Add goal
            </x-button>
        </div>
        @endif
    </h3>
    @if (!($showAddBtn ?? false))
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
    @endif
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
    <b>{{__("Goal Description")}}</b>
    <div class="form-control-plaintext">
        {!!$goal['what']!!}
    </div>
    <b>{{__("Start Date")}}</b>
    <div class="form-control-plaintext">
        {{$goal['start_date_human']}}
    </div>
    <b>{{__("End Date")}}</b>
    <div class="form-control-plaintext">
        {{$goal['target_date_human']}}
    </div>

    <b>{{__("Measures of Success")}}</b>
    <div class="form-control-plaintext">
        {!!$goal['measure_of_success']!!}
    </div>
</div>
