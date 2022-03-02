<div class="d-flex justify-content-center justify-content-lg-start mb-2" role="tablist">
    <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'my-team.share-my-goals' ? 'border-primary' : ''}}">
        <x-button role="tab" :href="route('my-team.share-my-goals')" style="">
         Share My Goals
        </x-button>
    </div>
    <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'goal.past' ? 'border-primary' : ''}}">
        <x-button role="tab" :href="route('goal.past')" style="">
          Team Goal Bank
        </x-button>
    </div>
</div>
