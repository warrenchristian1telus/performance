<div class="d-flex justify-content-center justify-content-lg-start mb-2">
    <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'hradmin.goal-bank' ? 'border-primary' : ''}}">
        <x-button :href="route('hradmin.goal-bank')" style="">
            Add Goal to Goal Bank
        </x-button>
    </div>
    <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'hradmin.managegoals' ? 'border-primary' : ''}}">
        <x-button :href="route('hradmin.managegoals')" style="">
            Manage Existing Goals
        </x-button>
    </div>
</div>