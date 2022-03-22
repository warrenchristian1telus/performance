<div class="d-flex justify-content-center justify-content-lg-start mb-2">
    <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'sysadmin.createaccess
        ' ? 'border-primary' : ''}}">
        <x-button :href="route('sysadmin.createaccess')" style="">
            Create New Access
        </x-button>
    </div>
    <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'sysadmin.manageaccess' ? 'border-primary' : ''}}">
        <x-button :href="route('sysadmin.manageaccess')" style="">
            Manage Existing Access
        </x-button>
    </div>
</div>
