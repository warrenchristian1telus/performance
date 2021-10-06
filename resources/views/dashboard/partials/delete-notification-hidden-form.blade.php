<form id="delete-notification-form" data-action="{{ route('dashboard.destroy', 'xxx') }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>
