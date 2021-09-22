@extends('my-team.layout')
@section('tab-content')
<div class="row">
    @foreach ($suggestedGoals as $goal)
    <div class="col-12 col-sm-6">
        @include('goal.partials.card')
    </div>
    @endforeach
</div>
@endsection