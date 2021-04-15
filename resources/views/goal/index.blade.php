<x-side-layout>
    <x-slot name="header">
        @include('goal.partials.tabs')
    </x-slot>
    <x-button icon="plus-circle" :href="route('goal.create')">
        Add new goal
    </x-button>
    <x-button icon="clone">
        Add from Library
    </x-button>
    <div class="mt-4">
        {{-- {{$dataTable->table()}} --}}
        <div class="row">
            @foreach ($goals as $goal)
                <div class="col-12 col-sm-6">
                    @include('goal.partials.card')
                </div>
            @endforeach
        </div>
        {{ $goals->links() }}
    </div>

    <x-slot name="js">
        {{-- {{$dataTable->scripts()}} --}}
    </x-slot>

</x-side-layout>