@props(['label' => '', 'placement' => 'right', 'html' => true, 'options' => [], 'selected' => '', 'valueField' => 'id', 'displayField' => 'text', 'tooltipField' => 'tooltip', 'name'] )

<div class='tooltip-dropdown'>
    <label class="mb-0">
        {{$label}}
        <input type="hidden" name="{{$name}}" value="{{$options[0][$valueField]}}">
    </label>
    <div class="btn-group btn-block">
        <button type="button" class="btn btn-outline-secondary dropdown-toggle text-capitalize text-left" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-color: #ced4da;">
            {{$options[0][$displayField]}}
            <x-tooltip :text="$options[0][$tooltipField]" />
        </button>
        <div class="dropdown-menu">
            @foreach ($options as $option)        
                <a class="dropdown-item" data-value={{$option[$valueField]}} href="#" onclick="$(this).parents('.tooltip-dropdown').find('input').val($(this).data('value'));$(this).parents('.btn-group').find('button').html($(this).html());">
                    {{$option[$displayField]}}
                    <x-tooltip :text="$option[$tooltipField]" :placement="$placement" :html="$html" />
                </a>
            @endforeach
        </div>
    </div>
</div>
