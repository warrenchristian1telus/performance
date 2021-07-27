<x-side-layout>
    <x-slot name="header">
        @include('resources.tabs')
    </x-slot>

	<ul>
		<li>
			<a href="{{ asset('storage/goal-examples.pdf') }}"" target="_blank" >Examples of goals</a>
		</li>
		<li>
			<a href="{{ asset('storage/user-guide.pdf') }}""  target="_blank" >Best practices for goal setting</a>
		</li>
	</u>
 </x-side-layout>
