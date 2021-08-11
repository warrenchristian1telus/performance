@if($conversation != null)
    <x-button style="link" data-id="{{$conversation->id}}" data-user-id="{{$conversation->user_id}}" class="conversation-link" data-toggle="modal" data-target="#viewConversationModal">
        {{ $conversation->c_date }} - {{ $conversation->topic->name }}
    </x-button>
@else
    @if($removeBlankLink ?? false)
    <x-button style="link" data-id="new" data-user-id="{{$row['id']}}" class="conversation-link" data-toggle="modal" data-target="#addConversationModal">-</x-button>
    @else
    -
    @endif
@endif