<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 "
    data-no-turbolink id="sidenav-main">
    <div class="sidenav-header mb-2">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ route('admin.applications') }}">
            <img src="{{ asset('images/admin-logo.png') }}" style="width: 85px; max-height:none;"
                class="navbar-brand-img h-100" alt="main_logo">
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100 h-100" id="sidenav-collapse-main"
        style="height: auto !important;">
        <ul class="navbar-nav">

            <li class="nav-item">
                <a class="nav-link  {{ request()->routeIs('admin.applications') || request()->routeIs('admin.route') || request()->routeIs('admin.applications.*') ? 'active' : '' }}"
                    href="{{ route('admin.applications') }}">
                    <span class="nav-link-text ms-1">Applications</span>
                    <div class="new-app" style="display:{{ $style }};color:var(--admin-main-color);">
                        <span>
                            {{ $count }}</span>
                    </div>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link  {{ request()->routeIs('admin.pages')
                    ? 'active'
                    : '' }}"
                    href="{{ route('admin.pages') }}">
                    <span class="nav-link-text ms-1">Pages</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link  {{ request()->routeIs('admin.pages.contacts*') ? 'active' : '' }}"
                    href="{{ route('admin.pages.contacts') }}">
                    <span class="nav-link-text ms-1">Contacts</span>
                </a>
            </li>
        </ul>
    </div>

</aside>
