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
                <x-button icon="link" class="text-light link-goal" data-id="{{$goal->id}}"  tooltip="You can link this goal to your supervisor’s goals (if they have been shared with you) to create a connection and demonstrate how your work relates to the priorities of your team or organization.">
                </x-button>
                <form id="delete-goal-{{$goal->id}}" action="{{ route('goal.destroy', $goal->id)}}" method="POST" onsubmit="return confirm('Are you sure you want to permanently delete this goal?')">
                    @csrf
                    @method('DELETE')
                    <x-button icon='trash' class="text-light"></x-button>
                </form>
            </div>
        </div>
        <div class="card-body">
            <p class="h5">
                {{ $goal->title }}
            </p>
            <p>
                {{ $goal->what }}
            </p>
        </div>
        <div class="card-footer">
            {{ $goal->user->name}}

            <span class="float-right">
                @include('goal.partials.status-change')
            </span>
        </div>
        <!-- /.card-footer -->
    </div>