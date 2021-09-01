@if(!session()->has('view-profile-as') || (session()->has('view-profile-as') && (!array_key_exists("hiddenInViewAs",$item) || (array_key_exists("hiddenInViewAs",$item) && !$item["hiddenInViewAs"]))))
@if(
    (!session()->has('GOALS_ALLOWED') && !session()->has('CONVERSATION_ALLOWED'))
    || (session()->has('GOALS_ALLOWED') && session()->get('GOALS_ALLOWED') && $item['url'] == 'goal/current')
    || (session()->has('CONVERSATION_ALLOWED') && session()->get('CONVERSATION_ALLOWED') && $item['url'] == 'conversation/upcoming')
)
<li @isset($item['id']) id="{{ $item['id'] }}" @endisset class="nav-item">

    <a class="nav-link py-3 {{ $item['class'] }} @isset($item['shift']) {{ $item['shift'] }} @endisset"
       href="{{ $item['href'] }}" @isset($item['target']) target="{{ $item['target'] }}" @endisset
       {!! $item['data-compiled'] ?? '' !!}>

        <i class="mr-2 {{ $item['icon'] ?? 'far fa-fw fa-circle' }} {{
            isset($item['icon_color']) ? 'text-'.$item['icon_color'] : ''
        }}"></i>

        <p>
            {{ $item['text'] }}

            @isset($item['label'])
                <span class="badge badge-{{ $item['label_color'] ?? 'primary' }} right">
                    {{ $item['label'] }}
                </span>
            @endisset
        </p>

    </a>

</li>
@endif
@endif