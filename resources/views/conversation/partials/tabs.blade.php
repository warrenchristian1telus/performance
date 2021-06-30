<div class="d-flex justify-content-center justify-content-lg-start mb-2">
    <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'conversation.upcoming' ? 'border-primary' : ''}}">
        <x-button :href="route('conversation.upcoming')" style="">
            Upcoming Conversations
        </x-button>
    </div>
    <div class="px-4 py-1 border-bottom {{Route::current()->getName() == 'conversation.past' ? 'border-primary' : ''}}">
        <x-button :href="route('conversation.past')" style="">
            Past Conversations
        </x-button>
    </div>
</div>