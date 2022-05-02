<x-side-layout>
    <x-slot name="header">
        <h3>{{ $title ?? 'System Administration'}}</h3>
        <div class="col-md-8"> @include('sysadmin.partials.tabs')</div>
    </x-slot>
    @yield('tab-content')
</x-side-layout>
