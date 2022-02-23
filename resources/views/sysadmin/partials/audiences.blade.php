@foreach($aud_org as $org)
<button id="trim(preg_replace("/[^0-9a-z]+/i", " ", {{$org->organization}}))" class="btn w-100 d-flex align-items-center text-primary p-2 m-2" style="background-color: #ddd;" data-toggle="collapse" data-target="#when_to_use">
    <input id='orgitem' type='checkbox' class='sub_chk' data-id="trim(preg_replace("/[^0-9a-z]+/i", " ", {{$org->organization}}))">
    <strong>&nbsp;&nbsp;{{$org->organization}}</strong>
    <div class="flex-fill"></div>
    <i class="fa fa-chevron-down"></i>
</button>
<div id="when_to_use"  class="collapse p-3">
    @if(count($aud_level1))
        @include('sysadmin.partials.audience_level1', ['aud_level1' => $aud_level1, 'data-parent' => $org->organization, 'dataLevel' => '1'])
    @endif
</div>
@endforeach
