<x-side-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create new goal
        </h2>
        <small><a href="{{ route('goal.index') }}">Back to list</a></small>
    </x-slot>

    <div class="container-fluid">
        <form action="{{ route ('goal.store')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-12">
                    <x-dropdown :list="$goaltypes" label="Goal Type" name="goal_type_id" />
                    <x-input label="Goal Title" name="title" value="{{ old('title') }}"/>
                    <x-textarea label="What" name="what" :value="old('what')" />
                    <x-textarea label="Why" name="why" :value="old('why')" />
                    <x-textarea label="How" name="how" :value="old('how')"/>
                    <x-textarea label="Measures of Success" name="measure_of_success" :value="old('measure_of_success')" />
                </div>
                <div class="col-sm-6">
                    <x-input label="Start Date" type="date" name="start_date" :value="old('start_date')" />
                </div>
                <div class="col-sm-6">
                    <x-input label="Target Date" type="date" name="target_date" :value="old('target_date')" />
                </div>
                <div class="col-6">
                <a href="https://www2.gov.bc.ca/gov/content/careers-myhr/all-employees/career-development/myperformance/myperformance-guides" target="_blank">Related Document Guide</a>
                </div>
                <div class="col-6 text-right pb-5">
                    <x-button type="submit" class="btn-md"> Save </x-button>
                </div>
            </div>
        </form>
    </div>
</x-side-layout>