<x-side-layout>
    <x-slot name="header">
        <h3>Proof of Concept (POC)</h3>
        <div class="col-md-8"> @include('poc.partials.tabs')</div>
    </x-slot>
    @yield('tab-content')

</x-side-layout>
