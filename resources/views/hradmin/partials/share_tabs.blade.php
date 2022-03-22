<div class="d-flex justify-content-center justify-content-lg-start mb-2">
    <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'hradmin.shareemployee' ? 'border-primary' : ''}}">
        <x-button :href="route('hradmin.shareemployee')" style="">
            Share an Employee
        </x-button>
    </div>
    <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'hradmin.manageshares' ? 'border-primary' : ''}}">
        <x-button :href="route('hradmin.manageshares')" style="">
            Manage Existing Shares
        </x-button>
    </div>
</div>
