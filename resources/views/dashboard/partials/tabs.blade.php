<div class="d-flex justify-content-center justify-content-lg-start mb-2">
    <div class="px-4 py-1 mr-2 border-bottom border-primary">
        <x-button style="-">
            To-Do Tasks 
            <span class="badge badge-primary">2</span>
        </x-button>
    </div>
    <div class="px-4 py-1 border-bottom {{Route::current()->getName() == 'conversation.past' ? 'border-primary' : ''}}">
        <x-button style="-">
            Notifications
            <span class="badge badge-secondary">1</span>
        </x-button>
    </div>
</div>