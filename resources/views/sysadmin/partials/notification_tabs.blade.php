<div class="d-flex justify-content-center justify-content-lg-start mb-2">
    <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'sysadmin.createnotification' ? 'border-primary' : ''}}">
        <x-button :href="route('sysadmin.createnotification')" style="">
            Create New Notifications
        </x-button>
    </div>
    <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'sysadmin.viewnotifications' ? 'border-primary' : ''}}">
        <x-button :href="route('sysadmin.viewnotifications')" style="">
            View Past Notifications
        </x-button>
    </div>
</div>
