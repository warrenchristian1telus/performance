<div class="d-flex justify-content-center justify-content-lg-start mb-2">
    <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'hradmin.myorg' ? 'border-primary' : ''}}">
        <x-button :href="route('hradmin.myorg')" style="">
            My Organization
        </x-button>
    </div>
    <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'hradmin.shareemployee' ? 'border-primary' : ''}}">
        <x-button :href="route('hradmin.shareemployee')" style="">
            Share an Employee
        </x-button>
    </div>
    <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'hradmin.excused' ? 'border-primary' : ''}}">
        <x-button :href="route('sysadmin.excused')" style="">
            Excused Employees
        </x-button>
    </div>
    <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'hradmin.goal-bank' ? 'border-primary' : ''}}">
        <x-button :href="route('hradmin.goal-bank')" style="">
            Goal Bank
        </x-button>
    </div>
    <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'hradmin.notifications' ? 'border-primary' : ''}}">
        <x-button :href="route('hradmin.notifications')" style="">
            Notifications
        </x-button>
    </div>
    <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'hradmin.statistics' ? 'border-primary' : ''}}">
        <x-button :href="route('hradmin.statistics')" style="">
            Statistics and Reports
        </x-button>
    </div>
</div>
