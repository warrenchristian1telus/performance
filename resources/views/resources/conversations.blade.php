<x-side-layout>
    <x-slot name="header">
        @include('resources.tabs')
    </x-slot>

				<ul>
					<li>
						<a href="{{ asset('storage/user-guide.pdf') }}"" target="_blank" >Conversation types (description and when to use)</a>
					</li>
					<li>
						<a href="{{ asset('storage/user-guide.pdf') }}"" target="_blank" >Best practices for goal setting</a>
					</li>
				</u>
</x-side-layout>
