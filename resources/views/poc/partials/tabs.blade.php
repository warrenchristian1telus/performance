<div class="d-flex justify-content-center justify-content-lg-start mb-2">
    <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'poc.employeedemo' ? 'border-primary' : ''}}">
        <x-button :href="route('poc.employeedemo')" style="">
            New Employee Demo
        </x-button>
    </div>
    <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'poc.odspushtest' ? 'border-primary' : ''}}">
        <x-button :href="route('poc.odspushtest')" style="">
            ODS Push Test
        </x-button>
    </div>
  <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'poc.odsorghierarchy' ? 'border-primary' : ''}}">
      <x-button :href="route('poc.odsorghierarchy')" style="">
          Org Levels Data
      </x-button>
  </div>
  <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'poc.odsorghierarchy2' ? 'border-primary' : ''}}">
      <x-button :href="route('poc.odsorghierarchy2')" style="">
          Org Hierarchy Data
      </x-button>
  </div>
  <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'poc.odsorghierarchy3' ? 'border-primary' : ''}}">
      <x-button :href="route('poc.odsorghierarchy3')" style="">
          Org Hierarchy Refresh Data
      </x-button>
  </div>
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
