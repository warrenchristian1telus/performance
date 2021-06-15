<div class="card-header">
    <h3>
        {{$goal->title}}
        @if ($showAddBtn ?? false) 
        <div class="float-right">
            <x-button type="button" class="float-right" icon="plus-circle" data-toggle="modal" data-target="#addGoalModal">
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
    
    <b>{{__("Measures of Success")}}</b>
    <div class="form-control-plaintext">
        {{$goal['measure_of_success']}}
    </div>
</div>