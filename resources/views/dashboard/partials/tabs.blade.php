<div class="d-flex justify-content-center justify-content-lg-start mb-2">
    <div class="px-4 py-1 mr-2 border-bottom {{$tab == 'todo'  ? 'border-primary' : ''}}">
        <x-button style="-" :href="route('dashboard.todo')">
            To-Do Tasks
            <span class="badge badge-{{$tab == 'todo' ? 'primary' : 'secondary'}}">2</span>
        </x-button>
    </div>
    <div class="px-4 py-1 border-bottom {{$tab == 'notifications' ? 'border-primary' : ''}}">
        @php($unread_count = 0)
        @foreach($notifications as $notif)
          @if ($notif->status == null)
            @php($unread_count++)
          @endif
        @endforeach
        <x-button style="-" :href="route('dashboard.notifications')">
            Notifications
            <span class="badge badge-{{$tab == 'notifications' ? 'primary' : 'secondary' }}">{{$unread_count}}</span>
        </x-button>
    </div>
    <div class="px-4 py-1 mr-2 border-bottom {{$tab == 'poc'  ? 'border-primary' : ''}}">
        <x-button style="-" :href="route('dashboard.poc')">
            POC
            <span class="badge badge-{{$tab == 'todo' ? 'primary' : 'secondary'}}"></span>
        </x-button>
    </div>
</div>
