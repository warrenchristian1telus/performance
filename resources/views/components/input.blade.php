@props(['disabled' => false, 'showError' => true, 'label' => '', 'info' => '','tooltip'=>''])
<label>
    {{ __($label) }}
    @if($tooltip != '')
    <i class="fas fa-info-circle"  data-toggle="popover" data-placement="right" data-html="true" data-content="{{ $tooltip }}"></i>
    @endif
    @if ($info != '')
    <small class="text-muted">
        {{ __($info) }}
    </small>
    @endif
    <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-control']) !!} autocomplete="off">
    @if ($showError !== 'false') 
        <small class="text-danger">{{ $errors->first($attributes['name']) }}</small>
    @endif
</label>
