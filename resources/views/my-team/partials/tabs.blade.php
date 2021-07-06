<div class="d-flex justify-content-center justify-content-lg-start mb-2">
    <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'my-team.my-employee' ? 'border-primary' : ''}}">
        <x-button :href="route('my-team.my-employee')" style="">
            {{__('My Employees')}}
        </x-button>
    </div>
    <div class="px-4 py-1 border-bottom {{Route::current()->getName() == 'my-team.performance-statistics' ? 'border-primary' : ''}}">
        <x-button :href="route('my-team.performance-statistics')" style="">
            {{__('Performance Statistics')}}
        </x-button>
    </div>
</div>