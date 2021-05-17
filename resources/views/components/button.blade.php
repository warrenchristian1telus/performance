@props(['style' => 'primary', 'icon' => '', 'size' => 'md', 'tooltip' => ''])

<{{($attributes['href'] ?? '' ? 'a' : 'button')}} 
    @if ($tooltip) 
        data-toggle="popover" data-placement="right" data-html="true" data-content="{{ $tooltip }}"
    @endif
    {{ $attributes->merge(['class' => 'btn btn-'.$style. ' btn-'.$size]) }}
    >
    @if ($icon)
        <x-fa-icon :icon="$icon ?? ''" />@if($slot != '')&nbsp;@endif
    @endif
    {{ $slot }}
</{{($attributes['href'] ?? '' ? 'a' : 'button')}}>
