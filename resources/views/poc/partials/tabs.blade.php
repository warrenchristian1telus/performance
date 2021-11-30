<div class="d-flex justify-content-center justify-content-lg-start mb-2">
  <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'poc.bidashboard' ? 'border-primary' : ''}}">
      <x-button :href="route('poc.bidashboard')" style="">
          BI Dashboard
      </x-button>
  </div>
</div>
