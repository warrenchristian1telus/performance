<x-side-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            My Goals
        </h2>
    </x-slot>
    <x-button icon="plus-circle" :href="route('goal.create')">
        Add new goal
    </x-button>
    <div>
        {{$dataTable->table()}}
    </div>

    <x-slot name="js">
        {{$dataTable->scripts()}}
    </x-slot>

</x-side-layout>