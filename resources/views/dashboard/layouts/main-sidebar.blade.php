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
            <a class="side-menu__item" href="{{ route('dashboard') }}">
                <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3zm5 15h-2v-6H9v6H7v-7.81l5-4.5 5 4.5V18z"></path><path d="M7 10.19V18h2v-6h6v6h2v-7.81l-5-4.5z" opacity=".3"></path></svg>
                <span class="side-menu__label">Dashboard</span>
            </a>
        </li>

        {{-- tabs --}}
        @include('dashboard.layouts.tabs')

    </ul>

</aside>
<!--aside closed-->
