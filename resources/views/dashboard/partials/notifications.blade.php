
<div>

  @foreach($notifications as $notification)
  <div class="rounded shadow-sm">
      <div class="p-2">
          <div class="pl-2 d-flex align-items-center justify-content-center border-left border-primary" style="border-width:3px !important" >
              <div class="pl-3 d-flex align-items-center justify-content-center flex-row">
                  <x-profile-pic size="36"></x-profile-pic>
                  <div class="d-flex flex-column">
                      <strong>
                          {{$notification->comment}}
                      </strong>
                      <div class="text-muted">
                          Title: {{$notification->relatedGoal->title}} | Goal Type: {{$notification->relatedGoal->goalType->name}}
                      </div>
                  </div>
              </div>
              <div class="flex-fill"></div>
              <x-button
                  size="xs"
                  :href='route("goal.show", $notification->relatedGoal->id)'
                  :tooltip="__('Click to view the details of this goal.')"
                  tooltipPosition="bottom" class="mr-2">{{__('View')}}
              </x-button>
              <x-button
                  size="xs" style="danger"
                  :tooltip="__('Click to delete notification.')"
                  tooltipPosition="bottom" class="btn btn-danger btn-sm float-right mr-2 delete-notification-btn" data-id="{{ $notification->id }}">{{__('Delete')}}
              </x-button>
          </div>
      </div>
  </div>
  @endforeach
  <div class="text-center text-uppercase my-4">
      <span class="px-2 text-muted" style="background-color: #fff;">Dummy Data Below (To Be Removed)</span>
      <hr style="margin-top:-12px">
  </div>

    <div class="rounded shadow-sm">
        <div class="p-2">
            <div class="pl-2 d-flex align-items-center justify-content-center border-left border-primary" style="border-width:3px !important" >
                <div class="pl-3 d-flex align-items-center justify-content-center flex-row">
                    <x-profile-pic size="36"></x-profile-pic>
                    <div class="d-flex flex-column">
                        <strong>
                            Supervisor A shared a goal with you and 30 others
                        </strong>
                        <div class="text-muted">
                            Title: Lease Agreement | Goal Type: Work Goal
                        </div>
                    </div>
                </div>
                <div class="flex-fill"></div>
                <x-button size="xs" class="mr-2">View</x-button>
                <x-button size="xs" style="danger">Delete</x-button>
            </div>
        </div>
    </div>

    <div class="rounded shadow-sm">
        <div class="p-2">
            <div class="pl-2 d-flex align-items-center justify-content-center border-left border-primary" style="border-width:3px !important" >
                <div class="pl-3 d-flex align-items-center justify-content-center flex-row">
                    <x-profile-pic size="36"></x-profile-pic>
                    <div class="d-flex flex-column">
                        <strong>
                            Supervisor A added goal to goal library.
                        </strong>
                        <div class="text-muted">
                            Title: Learn New Skills | Goal Type: Career Development Goal
                        </div>
                    </div>
                </div>
                <div class="flex-fill"></div>
                <x-button size="xs" class="mr-2">View</x-button>
                <x-button size="xs" style="danger">Delete</x-button>
            </div>
        </div>
    </div>

    <div class="rounded shadow-sm">
        <div class="p-2">
            <div class="pl-2 d-flex align-items-center justify-content-center border-left border-primary" style="border-width:3px !important" >
                <div class="pl-3 d-flex align-items-center justify-content-center flex-row">
                    <x-profile-pic size="36"></x-profile-pic>
                    <div class="d-flex flex-column">
                        <strong>
                            Supervisor A changed the start date of a goal shared with you.
                        </strong>
                        <div class="text-muted">
                            Title: Learn New Skills | Goal Type: Career Development Goal.
                        </div>
                    </div>
                </div>
                <div class="flex-fill"></div>
                <x-button size="xs" class="mr-2">View</x-button>
                <x-button size="xs" style="danger">Delete</x-button>
            </div>
        </div>
    </div>

    <div class="text-center text-uppercase my-4">
        <span class="px-2 text-muted" style="background-color: #fff;">Older</span>
        <hr style="margin-top:-12px">
    </div>

    <div class="rounded shadow-sm">
        <div class="p-2">
            <div class="pl-2 d-flex align-items-center justify-content-center border-left border-primary" style="border-width:3px !important" >
                <div class="pl-3 d-flex align-items-center justify-content-center flex-row">
                    <div class="d-flex flex-column">
                        <strong>
                            Lorem ipsum
                        </strong>
                        <div class="text-muted">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quia sed perferendis illo. Velit, labore numquam facere ea natus asperiores
                        </div>
                    </div>
                </div>
                <div class="flex-fill"></div>
                <x-button size="xs" class="mr-2">View</x-button>
                <x-button size="xs" style="danger">Delete</x-button>
            </div>
        </div>
    </div>
    <div class="rounded shadow-sm">
        <div class="p-2">
            <div class="pl-2 d-flex align-items-center justify-content-center border-left border-primary" style="border-width:3px !important" >
                <div class="pl-3 d-flex align-items-center justify-content-center flex-row">
                    <div class="d-flex flex-column">
                        <strong>
                            Lorem ipsum
                        </strong>
                        <div class="text-muted">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quia sed perferendis illo. Velit, labore numquam facere ea natus asperiores
                        </div>
                    </div>
                </div>
                <div class="flex-fill"></div>
                <x-button size="xs" class="mr-2">View</x-button>
                <x-button size="xs" style="danger">Delete</x-button>
            </div>
        </div>
    </div>

</div>

@include('dashboard.partials.delete-notification-hidden-form')

<x-slot name="js">
    <script>
        $(document).on('click', '.delete-notification-btn', function() {
            $('#delete-notification-form').attr(
                'action'
                , $('#delete-notification-form').data('action').replace('xxx', $(this).data('id'))
            ).submit();
        });
    </script>
</x-slot>
