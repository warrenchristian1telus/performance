<x-side-layout title="{{ __('Dashboard') }}">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" role="banner">
            {{ __('Welcome') }}
        </h2>
    </x-slot>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="p-4 bg-white border-b border-gray-200">
                    Hi {{ Auth::user()->name }}, You're logged in!
                </div>
            </div>
        </div>
    </div>
</x-side-layout>
