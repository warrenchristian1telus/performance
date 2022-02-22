@props(['list' => [], 'label', 'showError' => true, 'selected' => null, 'blankOptionText' => null])
<label>
    {{ __($label ?? '') }}
    {!! $label ?? '' ? '<br>': ''!!}
    <select {!! $attributes->merge(['class' => 'form-control']) !!}>
        @if($blankOptionText != null)
            <option value="">{{$blankOptionText}}</option>
        @endif
        @foreach ($list as $item)
            <option value="{{ $item['id'] }}" {{ ($item['selected'] ?? '') || ( $selected !== null && $item['id']==$selected) ? 'selected' : ''}}>
                {{ $item['name'] }}
            </option>
        @endforeach
    </select>
    <small class="text-danger error-{{$attributes['name'] ?? '' ? preg_replace('/\[.*?\]/', '', $attributes['name']) : ''}}">
        @if ($showError !== 'false') 
            {{ $errors->first($attributes['name']) }}
        @endif
    </small>
</label>