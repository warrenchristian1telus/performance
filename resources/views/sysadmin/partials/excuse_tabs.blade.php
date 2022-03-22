<div class="d-flex justify-content-center justify-content-lg-start mb-2">
    <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'sysadmin.excuseemployee' ? 'border-primary' : ''}}">
        <x-button :href="route('sysadmin.excuseemployee')" style="">
            Excuse an Employee
        </x-button>
    </div>
    <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'sysadmin.manageexcused' ? 'border-primary' : ''}}">
        <x-button :href="route('sysadmin.manageexcused')" style="">
            Manage Existing Excused
        </x-button>
    </div>
</div>
