<aside class="main-sidebar {{ config('adminlte.classes_sidebar', 'sidebar-dark-primary elevation-4') }}">

    {{-- Sidebar brand logo --}}
    @if(config('adminlte.logo_img_xl'))
        @include('adminlte::partials.common.brand-logo-xl')
    @else
        @include('adminlte::partials.common.brand-logo-xs')
    @endif
    <div class="text-center my-3">
        <div class="d-flex flex-column align-items-center">
            <!-- comment by James Poon on 2021-Dec-03 
            <img src="{{asset('img/profile-pic.png')}}" alt="" class="rounded-circle" style="max-width:90px; max-height:90px">
            -->
            <!-- added by James Poon on 2021-Dec-03 -->
            @if( session('profilePhoto') )
                <span>
                    <img style="width: 90px; height: 90px; border-radius:50%;" src="data:image/jpeg;base64,{{ session('profilePhoto') }}" alt="">
                </span>
            @else
                <span>
                    <img src="{{asset('img/profile-pic.png')}}" alt="" class="rounded-circle" style="max-width:90px; max-height:90px">
                </span>
            @endif

            <div class="text-white">
                {{ Auth::user()->name }}
            </div>
        </div>
    </div>
    {{-- Sidebar menu --}}
    <div class="sidebar">
        <nav class="pt-2">
            <ul class="nav nav-pills nav-sidebar flex-column {{ config('adminlte.classes_sidebar_nav', '') }}"
                data-widget="treeview" role="menu"
                @if(config('adminlte.sidebar_nav_animation_speed') != 300)
                    data-animation-speed="{{ config('adminlte.sidebar_nav_animation_speed') }}"
                @endif
                @if(!config('adminlte.sidebar_nav_accordion'))
                    data-accordion="false"
                @endif>
                {{-- Configured sidebar links --}}
                @each('adminlte::partials.sidebar.menu-item', $adminlte->menu('sidebar'), 'item')
            </ul>
        </nav>
    </div>

</aside>
