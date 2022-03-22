<x-side-layout>
    <x-slot name="header">
        <h3>System Administration</h3>
        @if(request()->is('sysadmin/employees/current') or request()->is('sysadmin/employees/previous'))
            <div class="col-md-8"> @include('sysadmin.partials.list_tabs')</div>
        @endif
        @if(request()->is('sysadmin/shared/shareemployee') or request()->is('sysadmin/shared/manageshares'))
            <div class="col-md-8"> @include('sysadmin.partials.share_tabs')</div>
        @endif
        @if(request()->is('sysadmin/excused/excuseemployee') or request()->is('sysadmin/excused/manageexcused'))
            <div class="col-md-8"> @include('sysadmin.partials.excuse_tabs')</div>
        @endif
        @if(request()->is('sysadmin/goals/goal-bank') or request()->is('sysadmin/goals/managegoals'))
            <div class="col-md-8"> @include('sysadmin.partials.goal_tabs')</div>
        @endif
        @if(request()->is('sysadmin/unlock/unlockconversation') or request()->is('sysadmin/unlock/manageunlocked'))
            <div class="col-md-8"> @include('sysadmin.partials.unlock_tabs')</div>
        @endif
        @if(request()->is('sysadmin/notifications/createnotification') or request()->is('sysadmin/notifications/viewnotifications'))
            <div class="col-md-8"> @include('sysadmin.partials.notification_tabs')</div>
        @endif
        @if(request()->is('sysadmin/access/createaccess') or request()->is('sysadmin/access/manageaccess'))
            <div class="col-md-8"> @include('sysadmin.partials.access_tabs')</div>
        @endif
        @if(request()->is('sysadmin/statistics/goalsummary') or request()->is('sysadmin/statistics/conversationsummary') or request()->is('sysadmin/statistics/sharedsummary') or request()->is('sysadmin/statistics/excusedsummary'))
            <div class="col-md-8"> @include('sysadmin.partials.statistics_tabs')</div>
        @endif
    </x-slot>
    @yield('tab-content')
</x-side-layout>
