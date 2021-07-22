<div class="d-flex justify-content-center justify-content-lg-start mb-2">
  <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'resources.user-guide' ? 'border-primary' : ''}}">
      <x-button :href="route('resources.user-guide')" style="">
          User Guide
      </x-button>
  </div>
    <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'resources.goal-setting' ? 'border-primary' : ''}}">
        <x-button :href="route('resources.goal-setting')" style="">
            Goal Setting
        </x-button>
    </div>
    <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'resources.conversations' ? 'border-primary' : ''}}">
        <x-button :href="route('resources.conversations')" style="">
            Conversations
        </x-button>
    </div>
    <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'resources.contact' ? 'border-primary' : ''}}">
        <x-button :href="route('resources.contact')" style="">
            Contact
        </x-button>
    </div>
</div>
