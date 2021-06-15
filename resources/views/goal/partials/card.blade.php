    <div class="card card-primary shadow">
        <div class="card-header p-1">
            <div class="d-flex">
                <a href="{{route("goal.show", $goal->id)}}" class="p-2">
                    <p class="card-title">
                        {{ $goal->start_date_human}}
                            <span class="mx-4"><x-svg-icon icon="arrow-right" /></span>
                        {{ $goal->target_date_human}}
                    </p>
                </a>
                <div class="flex-fill"></div>
                @if ($type !== 'supervisor')
                <form id="delete-goal-{{$goal->id}}" action="{{ route('goal.destroy', $goal->id)}}" method="POST" onsubmit="return confirm('Are you sure you want to permanently delete this goal?')">
                    @csrf
                    @method('DELETE')
                    <x-button icon='trash' class="text-light"></x-button>
                </form>
                @endif
            </div>
        </div>
        <div class="card-body" style="min-height:135px">
            <a href="{{route("goal.show", $goal->id)}}" class="text-dark">
                <p class="h5">
                    {{ $goal->title }}
                </p>
                <p>
                    {{ $goal->what }}
                </p>
            </a>
        </div>
        <div class="card-footer">
            <b>Goal created by: </b>{{ $goal->user->name}}
            <span class="float-right">
                @if($type !== 'supervisor')
                    @include('goal.partials.status-change')
                @else
                    <x-goal-status :status="$goal->status"></x-goal-status>
                @endif
            </span>
        </div>
        <!-- /.card-footer -->
    </div>