<x-side-layout>
    <div class="row">
        <div class="col-12 col-sm-6">
            <h1>Hi {{ Auth::user()->name }}</h1>
        </div>
        <div class="col-12 col-sm-6 text-right">
            <x-button tooltip="Create a goal for your employees to use in their own profile." tooltipPosition="bottom">
                Add Goal to Library
            </x-button>
            <x-button id="share-my-goals-btn" tooltip="Choose which of your goals are visible to your employees" tooltipPosition="bottom">
                Share My Goals
            </x-button>
        </div>
    </div>
    <div class="col-md-8"> @include('my-team.partials.tabs')</div>
    @yield('tab-content')
    @include('my-team.partials.share-my-goals-modal')
    @push('js')
    <script>
        (function () {
            $(document).on('click', '#share-my-goals-btn', function () {
                $("#shareMyGoalsModal").modal('show');
            });
        })();
    </script>
    @endpush
</x-side-layout>