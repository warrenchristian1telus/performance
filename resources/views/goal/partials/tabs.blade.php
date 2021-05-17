<div class="d-flex justify-content-center justify-content-lg-start mb-2">
    <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'goal.current' ? 'border-primary' : ''}}">
        <x-button :href="route('goal.current')" style="">
            Current Goals
        </x-button>
    </div>
    <div class="px-4 py-1 border-bottom {{Route::current()->getName() == 'goal.past' ? 'border-primary' : ''}}">
        <x-button :href="route('goal.past')" style="">
            Past Goals
        </x-button>
    </div>
</div>