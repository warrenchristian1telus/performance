@if($conversation != null)
    {{ $conversation->c_date }} - {{ $conversation->topic->name }}
@else
    -
@endif