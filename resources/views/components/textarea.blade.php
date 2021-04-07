@props(['disabled' => false, 'showError' => true, 'label' => '', 'value' => '', 'info'=> ''])

<label>
    {{ __($label) }}
    <textarea {!! $attributes->merge(['class' => 'form-control']) !!}>{{$value}}</textarea>
    @if ($info != '')
    <small class="text-muted">
        {{ __($info) }}
    </small>
    @endif
    @if ($showError !== 'false') 
        <small class="text-danger">{{ $errors->first($attributes['name']) }}</small>
    @endif
</label>