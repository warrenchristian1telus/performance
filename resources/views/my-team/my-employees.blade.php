@extends('my-team.layout')
@section('tab-content')
<div>
    <div class="h5 p-3">{{__('My Direct Reports')}}</div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                {{$myEmpTable->table()}}
            </div>
        </div>
    </div>
</div>
<div>
    <div class="h5 p-3">{{__('Shared With Me')}}</div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                {{$sharedEmpTable->table()}}
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
    {{$myEmpTable->scripts()}}
    {{$sharedEmpTable->scripts()}}
    <script>
        $(document).ready(function(){
            $('[data-toggle="popover"]').popover(); 
        });
    </script>
@endpush