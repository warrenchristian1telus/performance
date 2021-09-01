@props(['size' => 48])
<div {!! $attributes->merge(['class' => 'd-inline mx-2']) !!} >
    <!-- <img src="https://placeimg.com/{{$size}}/{{$size}}/people" class="rounded-circle" alt=""> -->
    <img src="{{asset('img/profile-pic.png')}}" class="rounded-circle" alt="" style="width: {{$size}}px">
</div>