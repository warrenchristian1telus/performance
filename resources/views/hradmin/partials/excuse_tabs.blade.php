<div class="d-flex justify-content-center justify-content-lg-start mb-2">
    <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'hradmin.excuseemployee' ? 'border-primary' : ''}}">
        <x-button :href="route('hradmin.excuseemployee')" style="">
            Excuse an Employee
        </x-button>
    </div>
    <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'hradmin.manageexcused' ? 'border-primary' : ''}}">
        <x-button :href="route('hradmin.manageexcused')" style="">
            Manage Existing Excused
        </x-button>
    </div>
</div>
