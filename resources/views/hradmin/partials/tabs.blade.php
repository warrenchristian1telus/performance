@if ($request->is('hradmin/myorg/*')) 
    <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'hradmin.myorg.myorganization' ? 'border-primary' : ''}}">
        <x-button :href="route('hradmin.myorg.myorganization')" style="">
            My Organization
        </x-button>
    </div>
@endif

@if ($request->is('hradmin/shared/*')) 
    <div class="d-flex justify-content-center justify-content-lg-start mb-2">
        <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'hradmin.shared.shareemployee' ? 'border-primary' : ''}}">
            <x-button :href="route('hradmin.shared.shareemployee')" style="">
                Share an Employee
            </x-button>
        </div>
        <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'hradmin.shared.manageshares' ? 'border-primary' : ''}}">
            <x-button :href="route('hradmin.shared.manageshares')" style="">
                Manage Existing Shares
            </x-button>
        </div>
    </div>
@endif

@if ($request->is('hradmin/excused/*')) 
    <div class="d-flex justify-content-center justify-content-lg-start mb-2">
        <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'hradmin.excused.excuseemployee' ? 'border-primary' : ''}}">
            <x-button :href="route('hradmin.excused.excuseemployee')" style="">
                Excuse an Employee
            </x-button>
        </div>
        <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'hradmin.excused.manageexcused' ? 'border-primary' : ''}}">
            <x-button :href="route('hradmin.excused.manageexcused')" style="">
                Manage Existing Excused
            </x-button>
        </div>
    </div>
@endif

@if ($request->is('hradmin/goals/*')) 
    <div class="d-flex justify-content-center justify-content-lg-start mb-2">
        <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'hradmin.goals.addgoals' ? 'border-primary' : ''}}">
            <x-button :href="route('hradmin.goals.addgoals')" style="">
                Add Goal to Goal Bank
            </x-button>
        </div>
        <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'hradmin.goals.showgoals' ? 'border-primary' : ''}}">
            <x-button :href="route('hradmin.goals.showgoals')" style="">
                Manage Existing Goals
            </x-button>
        </div>
    </div>
@endif

@if ($request->is('hradmin/notifications/*')) 
    <div class="d-flex justify-content-center justify-content-lg-start mb-2">
        <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'hradmin.notifications.createnotification' ? 'border-primary' : ''}}">
            <x-button :href="route('hradmin.notifications.createnotification')" style="">
                Create New Notifications
            </x-button>
        </div>
        <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'hradmin.notifications.viewnotifications' ? 'border-primary' : ''}}">
            <x-button :href="route('hradmin.notifications.viewnotifications')" style="">
                View Past Notifications
            </x-button>
        </div>
    </div>
@endif

@if ($request->is('hradmin/statistics/*')) 
    <div class="d-flex justify-content-center justify-content-lg-start mb-2">
        <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'hradmin.statistics.goalsummary' ? 'border-primary' : ''}}">
            <x-button :href="route('hradmin.statistics.goalsummary')" style="">
                Goal Summary
            </x-button>
        </div>
        <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'hradmin.statistics.conversationsummary' ? 'border-primary' : ''}}">
            <x-button :href="route('hradmin.statistics.conversationsummary')" style="">
                Conversations Summary
            </x-button>
        </div>
        <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'hradmin.statistics.sharedsummary' ? 'border-primary' : ''}}">
            <x-button :href="route('hradmin.statistics.sharedsummary')" style="">
                Shared Employee Summary
            </x-button>
        </div>
        <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'hradmin.statistics.excusedsummary' ? 'border-primary' : ''}}">
            <x-button :href="route('hradmin.statistics.excusedsummary')" style="">
                Excused Employee Summary
            </x-button>
        </div>
    </div>
@endif



