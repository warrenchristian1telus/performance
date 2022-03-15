<div class="d-flex justify-content-center justify-content-lg-start mb-2">
  <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'sysadmin.myorg' ? 'border-primary' : ''}}">
      <x-button :href="route('sysadmin.myorg')" style="">
          My Organization
      </x-button>
  </div>
    <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'sysadmin.statistics' ? 'border-primary' : ''}}">
        <x-button :href="route('sysadmin.statistics')" style="">
            Statistics and Reports
        </x-button>
    </div>
    <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'sysadmin.goal-bank' ? 'border-primary' : ''}}">
        <x-button :href="route('sysadmin.goal-bank')" style="">
            Goal Bank
        </x-button>
    </div>
    <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'sysadmin.shared' ? 'border-primary' : ''}}">
        <x-button :href="route('sysadmin.shared')" style="">
            Shared Employees
        </x-button>
    </div>
    <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'sysadmin.excused' ? 'border-primary' : ''}}">
        <x-button :href="route('sysadmin.excused')" style="">
            Excused Employees
        </x-button>
    </div>
    <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'sysadmin.notifications' ? 'border-primary' : ''}}">
        <x-button :href="route('sysadmin.notifications')" style="">
            Notifications Log
        </x-button>
    </div>
    <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'sysadmin.access' ? 'border-primary' : ''}}">
        <x-button :href="route('sysadmin.access')" style="">
            Access and Permissions
        </x-button>
    </div>
    <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'sysadmin.previous' ? 'border-primary' : ''}}">
        <x-button :href="route('sysadmin.previous')" style="">
            Previous Employees
        </x-button>
    </div>
    <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'sysadmin.conversations' ? 'border-primary' : ''}}">
        <x-button :href="route('sysadmin.conversations')" style="">
            Conversations
        </x-button>
    </div>
</div>
