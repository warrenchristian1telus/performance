<x-side-layout>
    <div>
        @yield('breadcrumb')
        <div class="float-right">
            <x-button icon="arrow-left" :href="route('my-team.my-employee')">Back to My Employees</x-button>
        </div>
    </div>
    <div class="container-fluid">
        @yield('page-content')
    </div>
</x-side-layout>