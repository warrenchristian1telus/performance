@extends('my-team.layout')
@section('tab-content')
<div class="card">
    <div class="card-body">
        {{$dataTable->table()}}
    </div>
</div>
@endsection
@push('js')
    {{$dataTable->scripts()}}
    <script>
        $(document).ready(function(){
            $('[data-toggle="popover"]').popover(); 
        });
    </script>
@endpush