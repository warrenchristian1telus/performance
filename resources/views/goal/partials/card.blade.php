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
                @if ($allowEditModal ?? false)
                    <x-button icon='edit' class="text-light edit-suggested-goal" data-goal-id="{{$goal->id}}" aria-label="Edit button" data-toggle="modal" data-target="#edit-suggested-goal-modal"></x-button>
                @endif
                @if ($type !== 'supervisor' && !$disableEdit)
                <form id="delete-goal-{{$goal->id}}" action="{{ route('goal.destroy', $goal->id)}}" method="POST" onsubmit="return confirm('Are you sure you want to permanently delete this goal?')">
                    @csrf
                    @method('DELETE')
                    <x-button icon='trash' class="text-light" aria-label="Delete button"></x-button>
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
        @if ($goal->last_supervisor_comment == 'Y' and (session()->get('original-auth-id') == Auth::id() or session()->get('original-auth-id') == null ))
          <div class="alert alert-default-warning alert-dismissible">
          <span class="h5"><i class="icon fas fa-exclamation-triangle"></i>Your supervisor has added a comment.</span>
          </div>
        @endif
        <div class="card-footer d-flex align-items-center">
            <b>Goal created by:&nbsp;</b>{{ $goal->user->name}}
            <div class="flex-fill"></div>
            <div>
                @if($type !== 'supervisor' && !$disableEdit)
                    @include('goal.partials.status-change')
                @else
                    <x-goal-status :status="$goal->status"></x-goal-status>
                @endif
            </div>
            @if (!$goal->is_library)
            <x-button
                :href='route("goal.show", $goal->id)'
                :tooltip="__('Click to view the details of this goal.')"
                tooltipPosition="bottom" class="ml-2">{{__('View')}}</x-button>
            @endif
            @if($type === 'supervisor' && !$disableEdit)
                <form action="{{route('goal.supervisor.copy', $goal->id)}}" method="post" onSubmit="return confirm('This goal will be copied to your Current Goals tab. You can access and edit it there without impacting your supervisor\'s goal. Continue?');">
                    @csrf
                    <x-button
                        :data-id="$goal->id"
                        class="ml-2 copy-goal"
                        style="outline-primary"
                        :tooltip="__('Click to copy this goal to your Current Goals tab and make it your own.')"
                        tooltipPosition="bottom">{{__('Copy')}}</x-button>
                </form>
            @endif

        </div>
        <!-- /.card-footer -->
    </div>
