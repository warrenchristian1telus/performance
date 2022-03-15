@foreach($aud_level1 as $lvl1)
<button id="trim(preg_replace("/[^0-9a-z]+/i", " ", {{$lvl1->level1_program}}))" class="btn d-flex align-items-center text-primary p-1 m-1" data-toggle="collapse" data-target="#when_to_use">
    <input id='orgitem' type='checkbox' class='sub_chk' data-id="trim(preg_replace("/[^0-9a-z]+/i", " ", {{$lvl1->level1_program}}))">
    <strong>&nbsp;&nbsp;{{$lvl1->level1_program}}</strong>
    <div class="flex-fill"></div>
    <i class="fa fa-chevron-down"></i>
</button>
@endforeach
