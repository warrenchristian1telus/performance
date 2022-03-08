@extends('my-team.goals.layout')
@section('tab-content')
<p>
    By default, all of your goals are private. Use the page below to make goals visible to selected employees. This lets team members know what you are working on and may serve as inspiration for team members' own goals.
</p>
<form action="{{ route('my-team.sync-goals')}}" method="POST" id="share-my-goals-form">
    @csrf
    <div class="row">
        @php 
            $cardDesign = 'my-team';
        @endphp
        @forelse ($goals as $goal)
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            @include('goal.partials.card')
        </div>
        @empty
            No Goals to Share. Please <a href="{{route('goal.index')}}">create a new goal</a>
        @endforelse
    </div>
</form>
<form action="{{route('goal.destroy', 'xxx')}}" method="POST" class="d-none" id="delete-goal-form">
    @csrf
    @method('DELETE');
</form>
@endsection

@push('css')
@endpush
@push('js')
    <script>
        $(document).on('click', '[data-action="delete-goal"]', function () {
            if (confirm($(this).data('confirmation'))) {
                let action = $("#delete-goal-form").attr('action');
                action = action.replace('xxx', $(this).data("goal-id"));
                $("#delete-goal-form").attr('action', action);
                $("#delete-goal-form").submit();
            }
        });;
        $(document).on('change', '.is-shared', function (e) {
            let confirmMessage = "Making this goal private will hide it from all employees. Continue?";
            if ($(this).val() == "1") {
                confirmMessage = "Sharing this goal will make it visible to the selected employees. Continue?"
            }
            if (!confirm(confirmMessage)) {
                // this.checked = !this.checked;
                $(this).val($(this).val() == "1" ? "0" : "1");
                e.preventDefault();
                return;
            }
            // $(this).parents("label").find("span").html(this.checked ? "Shared" : "Private");
            const goalId = $(this).data('goal-id');
            $("#search-users-" + goalId).multiselect($(this).val() == "1" ? 'enable' : 'disable');
            const form = $(this).parents('form').get()[0];
            fetch(form.action,{method:'POST', body: new FormData(form)});
        });
        $(document).ready(() => {
            $(".search-users").each(function() {
                const goalId = $(this).data('goal-id');
                $(this).multiselect({
                    allSelectedText: 'All Direct Report',
                    selectAllText: 'All Direct Report',
                    includeSelectAllOption: true,
                    onDropdownHide: function () {
                        const form = $("#share-my-goals-form").get()[0];
                        fetch(form.action,{method:'POST', body: new FormData(form)});
                    }
                });
            });
        });
        
    </script>
@endpush
