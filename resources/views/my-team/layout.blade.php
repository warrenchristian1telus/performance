<x-side-layout>
    <div class="row">
        <div class="col-12 col-sm-6">
            <h1>Hi {{ Auth::user()->name }}</h1>
        </div>
        <div class="col-12 col-sm-6 text-right">
            <x-button id="add-goal-to-library-btn" tooltip="Create a goal for your employees to use in their own profile." tooltipPosition="bottom">
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
    @include('my-team.partials.add-goal-to-library-modal')
    @push('css')
        <link rel="stylesheet" href="{{ asset('css/bootstrap-multiselect.min.css') }}">
    @endpush
    @push('js')
    <script src="{{ asset('js/bootstrap-multiselect.min.js')}} "></script>
    <script>
        (function () {
            $(document).on('click', '#share-my-goals-btn', function () {
                $("#shareMyGoalsModal").modal('show');
            });
            $(document).on('click', '#add-goal-to-library-btn', function () {
                $("#addGoalToLibraryModal").modal('show');
            });
            $(".search-users").each(function() {
                const goalId = $(this).data('goal-id');
                $(this).multiselect({
                    allSelectedText: 'All Direct Report',
                    selectAllText: 'All Direct Report',
                    includeSelectAllOption: true
                });
            });
            $(document).on('change', '.is-shared', function (e) {
                let confirmMessage = "Making this goal private will hide it from all employees. Continue?";
                if (this.checked) {
                    confirmMessage = "Sharing this goal will make it visible to the selected employees. Continue?"
                }
                if (!confirm(confirmMessage)) {
                    this.checked = !this.checked;
                    e.preventDefault();
                    return;
                }
                $(this).parents("label").find("span").html(this.checked ? "Shared" : "Private");
                const goalId = $(this).data('goal-id');
                $("#search-users-" + goalId).multiselect(this.checked ? 'enable' : 'disable');
            });
        })();
    </script>
    @endpush
</x-side-layout>