<x-side-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $goal['title'] }}
        </h2>
        <small><a href="{{ route('goal.index') }}">Back to list</a></small>
    </x-slot>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                <div class="card-body">
                    <b>{{__("Type")}}</b>
                    <div class="form-control-plaintext">
                        {{$goal->goalType['name']}}
                    </div>
                    <b>{{__("Goal")}}</b>
                    <div class="form-control-plaintext">
                        {{$goal['title']}}
                    </div>
                    <b>{{__("Description")}}</b>
                    <div class="form-control-plaintext">
                        {{$goal['description']}}
                    </div>
                    <b>{{__("What")}}</b>
                    <div class="form-control-plaintext">
                        {{$goal['what']}}
                    </div>
                    <b>{{__("Why")}}</b>
                    <div class="form-control-plaintext">
                        {{$goal['why']}}
                    </div>
                    <b>{{__("How")}}</b>
                    <div class="form-control-plaintext">
                        {{$goal['how']}}
                    </div>
                    
                    <b>{{__("Measure of success")}}</b>
                    <div class="form-control-plaintext">
                        {{$goal['measure_of_success']}}
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <b>{{__("Start Date")}}</b>
                            <div class="form-control-plaintext">
                                {{$goal['start_date']}}
                            </div>  
                        </div>
                        <div class="col-6">
                            <b>{{__("Target Date")}}</b>
                            <div class="form-control-plaintext">
                                {{$goal['target_date']}}
                            </div>  
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</x-side-layout>