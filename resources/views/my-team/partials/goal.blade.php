<div class="col-12 col-sm-8">
    <h4>
        {{ $goal->title }}
    </h4>
    <p>
        {{ $goal->what }}
    </p>
    <span class="d-flex flex-row align-items-center">
        <span class="pr-2 mr-2 border-right">
            <x-profile-pic size="20"></x-profile-pic> {{ Auth::user()->name}} 
        </span>
        <span class="pr-2 mr-2 border-right">
            <x-goal-status :status="$goal->status"></x-goal-status>
        </span>
        <span class="pr-2 mr-2 border-right">{{$goal->target_date_human}}</span>
        <span class="pr-2 mr-2">
            <label class="d-block mb-0">
                <input type="checkbox">
                Private
            </label>
        </span>
    </span>
</div>
<div class="col-12 col-sm-4">
    <label>
        Share with:
        <input type="search" class="form-control">
    </label>
</div>