<!--aside open-->
<div class="app-sidebar app-sidebar2">
    <div class="app-sidebar__logo">
        <a class="header-brand" href="#">
            <img src="{{ URL::asset('assets-dashboard/images/brand/logo.png') }}" class="header-brand-img desktop-lgo"
                alt="Dashtic logo">
            <img src="{{ URL::asset('assets-dashboard/images/brand/logo1.png') }}" class="header-brand-img dark-logo"
                alt="Dashtic logo">
            <img src="{{ URL::asset('assets-dashboard/images/brand/favicon.png') }}"
                class="header-brand-img mobile-logo" alt="Dashtic logo">
            <img src="{{ URL::asset('assets-dashboard/images/brand/favicon1.png') }}"
                class="header-brand-img darkmobile-logo" alt="Dashtic logo">
        </a>
    </div>
</div>
<aside class="app-sidebar app-sidebar3">
    <div class="app-sidebar__user">
        <div class="dropdown user-pro-body text-center">
            <div class="user-pic">
                <img src="{{ URL::asset('assets-dashboard/images/users/16.jpg') }}" alt="user-img"
                    class="avatar-xl rounded-circle mb-1">
            </div>
            <div class="user-info">
                @auth
                <h5 class=" mb-1 font-weight-bold">{{ authInfo()->full_name }}</h5>

                @endauth

                @guest
                <h5 class=" mb-1 font-weight-bold">John</h5>

                @endguest
                <span class="text-muted app-sidebar__user-name text-sm">App Developer</span>
            </div>
        </div>
    </div>
    <ul class="side-menu">
        {{-- dashboard --}}
        <li class="slide {{ request()->segment(2) == 'home' ? 'active' : '' }}">
            <a class="side-menu__item" href="{{route('dashboard')}}">
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="26"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                </svg>
                <span class="side-menu__label">Dashboard</span>
            </a>
        </li>



    </ul>

</aside>
<!--aside closed-->
