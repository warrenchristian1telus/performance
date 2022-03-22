<div class="d-flex justify-content-center justify-content-lg-start mb-2">
    <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'sysadmin.goalsummary' ? 'border-primary' : ''}}">
        <x-button :href="route('sysadmin.goalsummary')" style="">
            Goal Summary
        </x-button>
    </div>
    <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'sysadmin.conversationsummary' ? 'border-primary' : ''}}">
        <x-button :href="route('sysadmin.conversationsummary')" style="">
            Conversations Summary
        </x-button>
    </div>
    <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'sysadmin.sharedsummary' ? 'border-primary' : ''}}">
        <x-button :href="route('sysadmin.sharedsummary')" style="">
            Shared Employee Summary
        </x-button>
    </div>
    <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'sysadmin.excusedsummary' ? 'border-primary' : ''}}">
        <x-button :href="route('sysadmin.excusedsummary')" style="">
            Excused Employee Summary
        </x-button>
    </div>
</div>
