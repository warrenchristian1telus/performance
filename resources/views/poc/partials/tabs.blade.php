<div class="d-flex justify-content-center justify-content-lg-start mb-2">
  <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'poc.bidashboard' ? 'border-primary' : ''}}">
      <x-button :href="route('poc.bidashboard')" style="">
          BI Dashboard
      </x-button>
  </div>
  <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'poc.odstest' ? 'border-primary' : ''}}">
      <x-button :href="route('poc.odstest')" style="">
          ODS Test Page 1
      </x-button>
  </div>
  <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'poc.odstest2' ? 'border-primary' : ''}}">
      <x-button :href="route('poc.odstest2')" style="">
          ODS Test Page 2
      </x-button>
  </div>
</div>
