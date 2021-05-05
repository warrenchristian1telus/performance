<form id="delete-conversation-form" data-action="{{ route('conversation.destroy', 'xxx') }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>