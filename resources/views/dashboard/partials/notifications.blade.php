<div>

  <div class="btn-group">

      <div class="mr-2" size="xs" >
        <input type="checkbox" id='checkall'> Select All
      </div>

      <div class="rounded shadow-sm" size="xs" >
      <x-button
          size="xs" style="danger"
          :tooltip="__('Click to delete notification.')"
          tooltipPosition="bottom" class="btn btn-danger btn-sm float-right mr-2" id="deleteAllSelectedRecords">{{__('Delete Selected')}}
      </x-button>
    </div>

  </div>

  @foreach($notifications as $notification)
  <div class="rounded shadow-sm" size="xs" >
      <div class="p-2">
          <div class="pl-2 d-flex align-items-center justify-content-center border-left border-primary" style="border-width:3px !important" >

                        <input type="checkbox" name="check[]" id="{{ $notification->id }}"/>

              <div class="pl-3 d-flex align-items-center justify-content-center flex-row">
                  <x-profile-pic size="36"></x-profile-pic>
                  <div class="d-flex flex-column">
                      <strong>
                          {{$notification->comment}}
                      </strong>
                      <div class="text-muted">
                        Title: {{$notification->relatedGoal->title}} | Goal Type: {{$notification->relatedGoal->goalType->name}} | Date: {{$notification->updated_at->format('M d, Y H:i A')}}
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
