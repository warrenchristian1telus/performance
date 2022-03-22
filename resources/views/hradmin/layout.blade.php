<x-side-layout>
    <x-slot name="header">
        <h3>HR Administration</h3>
        @if(request()->is('hradmin/myorg'))
            <!-- No Tabs -->
        @endif
        @if(request()->is('hradmin/shared/shareemployee') or request()->is('hradmin/shared/manageshares'))
            <div class="col-md-8"> @include('hradmin.partials.share_tabs')</div>
        @endif
        @if(request()->is('hradmin/excused/excuseemployee') or request()->is('hradmin/excused/manageexcused'))
            <div class="col-md-8"> @include('hradmin.partials.excuse_tabs')</div>
        @endif
        @if(request()->is('hradmin/goals/goal-bank') or request()->is('hradmin/goals/managegoals'))
            <div class="col-md-8"> @include('hradmin.partials.goal_tabs')</div>
        @endif
        @if(request()->is('hradmin/notifications/createnotification') or request()->is('hradmin/notifications/viewnotifications'))
            <div class="col-md-8"> @include('hradmin.partials.notification_tabs')</div>
        @endif
        @if(request()->is('hradmin/statistics/goalsummary') or request()->is('hradmin/statistics/conversationsummary') or request()->is('hradmin/statistics/sharedsummary') or request()->is('hradmin/statistics/excusedsummary'))
            <div class="col-md-8"> @include('hradmin.partials.statistics_tabs')</div>
        @endif
    </x-slot>
    @yield('tab-content')
</x-side-layout>
