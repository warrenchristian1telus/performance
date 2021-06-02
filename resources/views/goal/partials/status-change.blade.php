<div class="btn-group">
  <button type="button" class="btn btn-outline-secondary dropdown-toggle text-capitalize" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <x-goal-status :status="$goal->status"></x-goal-status>
  </button>
  <div class="dropdown-menu goal-change">
    @foreach (\Config::get("global.status") as $status => $value)
        @if ($status != $goal->status)
            <a class="dropdown-item text-capitalize" data-current-status="{{$goal->status}}" data-status="{{$status}}" href="{{ route('goal.update-status', [$goal->id, $status]) }}">
                <x-goal-status :status="$status"></x-goal-status>
            </a>
        @endif
    @endforeach
  </div>
</div>