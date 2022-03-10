
<x-side-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit: {{ $goal-> title}}
        </h2>
        <small><a href="{{ route('goal.index') }}">Back to list</a></small>
    </x-slot>

    <div class="container-fluid">
        <form action="{{ route ('goal.update', $goal->id)}}" method="POST" onsubmit="confirm('Are you sure you want to update Goal ?')">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-12">
                    <x-dropdown :list="$goaltypes" label="Goal Type" name="goal_type_id" />
                    <x-input label="Goal Title" name="title" :value="$goal->title"/>
                    <!-- <x-textarea id="what" label="What" name="what" :value="$goal->what" /> -->
                    <label for='what'>What</label>
                    <textarea id="what" name="what" :value="$goal->what">{!!$goal->what!!}</textarea>
                    <!-- <x-textarea id="why" label="Why" name="why" :value="$goal->why" /> -->
                    <label for='why'>Why</label>
                    <textarea id="why" name="why" :value="$goal->why">{!!$goal->why!!}</textarea>
                    <!-- <x-textarea id="how" label="How" name="how" :value="$goal->how"/> -->
                    <label for='how'>How</label>
                    <textarea id="how" name="how" :value="$goal->how">{!!$goal->how!!}</textarea>
                    <!-- <x-textarea id="measure_of_success" class="content' label="Measures of Success" name="measure_of_success" :value="$goal->measure_of_success" /> -->
                    <label for='measure_of_success'>Measure of Success</label>
                    <textarea id="measure_of_success" name="measure_of_success" :value="$goal->measure_of_success">{!!$goal->measure_of_success!!}</textarea>
                </div>
                <div class="col-sm-6">
                    <x-input label="Start Date" type="date" name="start_date" :value="$goal->start_date ? $goal->start_date->format('Y-m-d') : ''" />
                </div>
                <div class="col-sm-6">
                    <x-input label="End Date" type="date" name="target_date" :value="$goal->target_date ? $goal->target_date->format('Y-m-d') : ''" />
                </div>
                <div class="col-12 text-center">
                    <x-button type="submit" class="btn-lg"> Save </x-button>
                </div>
            </div>
        </form>
    </div>
</x-side-layout>

<script src="//cdn.ckeditor.com/4.17.2/basic/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        CKEDITOR.replace('what', {
            toolbar: [ ["Bold", "Italic", "Underline", "-", "NumberedList", "BulletedList", "-", "Outdent", "Indent"] ] });
        CKEDITOR.replace('why', {
            toolbar: [ ["Bold", "Italic", "Underline", "-", "NumberedList", "BulletedList", "-", "Outdent", "Indent"] ] });
        CKEDITOR.replace('how', {
            toolbar: [ ["Bold", "Italic", "Underline", "-", "NumberedList", "BulletedList", "-", "Outdent", "Indent"] ] });
        CKEDITOR.replace('measure_of_success', {
            toolbar: [ ["Bold", "Italic", "Underline", "-", "NumberedList", "BulletedList", "-", "Outdent", "Indent"] ] });
    });
</script>
