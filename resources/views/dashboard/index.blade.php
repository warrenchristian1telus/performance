<x-side-layout title="{{ __('Dashboard') }}">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-primary leading-tight" role="banner">
            {{ $greetings }}, {{ Auth::user()->name }}
        </h2>
    </x-slot>
    <div class="container-fluid">
        <div class="row mb-4">
        <div class="col-12 col-sm-4 col-md-4">
                <strong>
                    My Current Supervisor 
                    <i class="fa fa-info-circle"></i>
                </strong>
                <div class="bg-white border-b rounded p-2 mt-2">
                    <x-profile-pic></x-profile-pic>
                    Supervisor A
                </div>
            </div>
            <div class="col-12 col-sm-4 col-md-4">
                <strong>
                    My Profile is Shared with
                </strong>
                <div class="bg-white border-b rounded p-2 mt-2">
                    <div class="d-flex align-items-center">
                        <x-profile-pic></x-profile-pic>
                        Supervisor A and 4 others
                        <div class="flex-fill"></div>
                        <i class="fa fa-chevron-right"></i>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="p-4 bg-white border-b border-gray-200">
                    @include('dashboard.partials.tabs')
                    @include('dashboard.partials.todo')
                </div>
            </div>
        </div>
    </div>
</x-side-layout>
