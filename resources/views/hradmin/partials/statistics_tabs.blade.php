<div class="d-flex justify-content-center justify-content-lg-start mb-2">
    <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'hradmin.goalsummary' ? 'border-primary' : ''}}">
        <x-button :href="route('hradmin.goalsummary')" style="">
            Goal Summary
        </x-button>
    </div>
    <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'hradmin.conversationsummary' ? 'border-primary' : ''}}">
        <x-button :href="route('hradmin.conversationsummary')" style="">
            Conversations Summary
        </x-button>
    </div>
    <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'hradmin.sharedsummary' ? 'border-primary' : ''}}">
        <x-button :href="route('hradmin.sharedsummary')" style="">
            Shared Employee Summary
        </x-button>
    </div>
    <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'hradmin.excusedsummary' ? 'border-primary' : ''}}">
        <x-button :href="route('hradmin.excusedsummary')" style="">
            Excused Employee Summary
        </x-button>
    </div>
</div>
