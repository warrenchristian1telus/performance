<div class="d-flex justify-content-center justify-content-lg-start mb-2">
    <div class="px-4 py-1 mr-2 border-bottom {{$tab == 'todo'  ? 'border-primary' : ''}}">
        <x-button style="-" :href="route('dashboard.todo')">
            To-Do Tasks
            <span class="badge badge-{{$tab == 'todo' ? 'primary' : 'secondary'}}">2</span>
        </x-button>
    </div>
    <div class="px-4 py-1 border-bottom {{$tab == 'notifications' ? 'border-primary' : ''}}">
        <x-button style="-" :href="route('dashboard.notifications')">
            Notifications
            <span class="badge badge-{{$tab == 'notifications' ? 'primary' : 'secondary' }}">{{$notifications->count()}}</span>
        </x-button>
    </div>
</div>
