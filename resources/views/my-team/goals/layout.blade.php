<x-side-layout>
    <div class="row">
        <div class="col-12 col-sm-6">
            <h3>Team Goals</h3>
        </div>
    </div>
    <div class="col-md-8"> @include('my-team.goals.tabs')</div>
    @yield('tab-content')
    
    @push('css')
    @endpush
    @push('js')
    
    @endpush
</x-side-layout>
