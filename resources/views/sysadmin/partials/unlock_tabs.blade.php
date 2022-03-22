<div class="d-flex justify-content-center justify-content-lg-start mb-2">
    <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'sysadmin.unlockconversation
        ' ? 'border-primary' : ''}}">
        <x-button :href="route('sysadmin.unlockconversation')" style="">
            Unlock a Conversation
        </x-button>
    </div>
    <div class="px-4 py-1 mr-2 border-bottom {{Route::current()->getName() == 'sysadmin.manageunlocked' ? 'border-primary' : ''}}">
        <x-button :href="route('sysadmin.manageunlocked')" style="">
            Manage Existing Unlocked Conversations
        </x-button>
    </div>
</div>
