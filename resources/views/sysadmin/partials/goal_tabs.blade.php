<div class="d-flex justify-content-center justify-content-lg-start mb-2">
    <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'sysadmin.addgoal' ? 'border-primary' : ''}}">
        <x-button :href="route('sysadmin.addgoal')" style="">
            Add Goal to Goal Bank
        </x-button>
    </div>
    <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'sysadmin.managegoals' ? 'border-primary' : ''}}">
        <x-button :href="route('sysadmin.managegoals')" style="">
            Manage Existing Goals
        </x-button>
    </div>
</div>
