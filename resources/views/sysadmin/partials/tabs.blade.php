@if ($request->is('sysadmin/employees/*')) 
    <div class="d-flex justify-content-center justify-content-lg-start mb-2">
        <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'sysadmin.employees.currentemployees' ? 'border-primary' : ''}}">
            <x-button :href="route('sysadmin.employees.currentemployees')" style="">
                Current Employees
            </x-button>
        </div>
        <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'sysadmin.employees.pastemployees' ? 'border-primary' : ''}}">
            <x-button :href="route('sysadmin.employees.pastemployees')" style="">
                Past Employees
            </x-button>
        </div>
    </div>
@endif

@if ($request->is('sysadmin/shared/*')) 
    <div class="d-flex justify-content-center justify-content-lg-start mb-2">
        <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'sysadmin.shared.shareemployee' ? 'border-primary' : ''}}">
            <x-button :href="route('sysadmin.shared.shareemployee')" style="">
                Share an Employee
            </x-button>
        </div>
        <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'sysadmin.shared.manageexistingshares' ? 'border-primary' : ''}}">
            <x-button :href="route('sysadmin.shared.manageexistingshares')" style="">
                Manage Existing Shares
            </x-button>
        </div>
    </div>
@endif

@if ($request->is('sysadmin/excused/*')) 
    <div class="d-flex justify-content-center justify-content-lg-start mb-2">
        <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'sysadmin.excused.excuseemployee' ? 'border-primary' : ''}}">
            <x-button :href="route('sysadmin.excused.excuseemployee')" style="">
                Excuse an Employee
            </x-button>
        </div>
        <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'sysadmin.excused.manageexistingexcused' ? 'border-primary' : ''}}">
            <x-button :href="route('sysadmin.excused.manageexistingexcused')" style="">
                Manage Existing Excused
            </x-button>
        </div>
    </div>
@endif

@if ($request->is('sysadmin/goals/*')) 
    <div class="d-flex justify-content-center justify-content-lg-start mb-2">
        <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'sysadmin.goals.addgoal' ? 'border-primary' : ''}}">
            <x-button :href="route('sysadmin.goals.addgoal')" style="">
                Add Goal to Goal Bank
            </x-button>
        </div>
        <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'sysadmin.goals.managegoalbank' ? 'border-primary' : ''}}">
            <x-button :href="route('sysadmin.goals.managegoalbank')" style="">
                Manage Goal Bank
            </x-button>
        </div>
    </div>
@endif

@if ($request->is('sysadmin/unlock/*')) 
    <div class="d-flex justify-content-center justify-content-lg-start mb-2">
        <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'sysadmin.unlock.unlockconversation
            ' ? 'border-primary' : ''}}">
            <x-button :href="route('sysadmin.unlock.unlockconversation')" style="">
                Unlock a Conversation
            </x-button>
        </div>
        <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'sysadmin.unlock.manageunlocked' ? 'border-primary' : ''}}">
            <x-button :href="route('sysadmin.unlock.manageunlocked')" style="">
                Manage Existing Unlocked Conversations
            </x-button>
        </div>
    </div>
@endif

@if ($request->is('sysadmin/notifications/*')) 
    <div class="d-flex justify-content-center justify-content-lg-start mb-2">
        <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'sysadmin.notifications.createnotification' ? 'border-primary' : ''}}">
            <x-button :href="route('sysadmin.notifications.createnotification')" style="">
                Create New Notifications
            </x-button>
        </div>
        <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'sysadmin.notifications.viewnotifications' ? 'border-primary' : ''}}">
            <x-button :href="route('sysadmin.notifications.viewnotifications')" style="">
                View Past Notifications
            </x-button>
        </div>
    </div>
@endif

@if ($request->is('sysadmin/access/*')) 
    <div class="d-flex justify-content-center justify-content-lg-start mb-2">
        <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'sysadmin.access.createaccess' ? 'border-primary' : ''}}">
            <x-button :href="route('sysadmin.access.createaccess')" style="">
                Create New Access
            </x-button>
        </div>
        <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'sysadmin.access.manageaccess' ? 'border-primary' : ''}}">
            <x-button :href="route('sysadmin.access.manageaccess')" style="">
                Manage Existing Access
            </x-button>
        </div>
    </div>
@endif

@if ($request->is('sysadmin/statistics/*')) 
    <div class="d-flex justify-content-center justify-content-lg-start mb-2">
        <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'sysadmin.statistics.goalsummary' ? 'border-primary' : ''}}">
            <x-button :href="route('sysadmin.statistics.goalsummary')" style="">
                Goal Summary
            </x-button>
        </div>
        <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'sysadmin.statistics.conversationsummary' ? 'border-primary' : ''}}">
            <x-button :href="route('sysadmin.statistics.conversationsummary')" style="">
                Conversations Summary
            </x-button>
        </div>
        <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'sysadmin.statistics.sharedsummary' ? 'border-primary' : ''}}">
            <x-button :href="route('sysadmin.statistics.sharedsummary')" style="">
                Shared Employee Summary
            </x-button>
        </div>
        <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'sysadmin.statistics.excusedsummary' ? 'border-primary' : ''}}">
            <x-button :href="route('sysadmin.statistics.excusedsummary')" style="">
                Excused Employee Summary
            </x-button>
        </div>
    </div>
@endif


