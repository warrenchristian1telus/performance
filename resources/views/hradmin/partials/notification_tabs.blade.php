<div class="d-flex justify-content-center justify-content-lg-start mb-2">
    <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'hradmin.createnotification' ? 'border-primary' : ''}}">
        <x-button :href="route('hradmin.createnotification')" style="">
            Create New Notifications
        </x-button>
    </div>
    <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'hradmin.viewnotifications' ? 'border-primary' : ''}}">
        <x-button :href="route('hradmin.viewnotifications')" style="">
            View Past Notifications
        </x-button>
    </div>
</div>
