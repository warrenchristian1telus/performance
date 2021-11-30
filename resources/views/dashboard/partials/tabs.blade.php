<div class="d-flex justify-content-center justify-content-lg-start mb-2">
    <div class="px-4 py-1 border-bottom {{$tab == 'notifications' ? 'border-primary' : ''}}">
        @php($unread_count = 0)
        @foreach($notifications as $notif)
          @if ($notif->status == null)
            @php($unread_count++)
          @endif
        @endforeach
        <x-button style="-" :href="route('dashboard')">
            Notifications
            <span class="badge badge-{{$tab == 'notifications' ? 'primary' : 'secondary' }}">{{$unread_count}}</span>
        </x-button>
    </div>
</div>
