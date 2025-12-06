<nav class="sb-topnav navbar navbar-expand navbar-dark" style="background: #1a2744; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
    <!-- Sidebar Toggle - Moved to the left -->
    <button class="btn btn-link btn-sm order-0 ms-3 me-3" id="sidebarToggle" href="#!" style="color: #cbd5e1;"><i class="fas fa-bars"></i></button>
    
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-0 d-flex align-items-center" href="{{ Auth::check() ? (Auth::user()->role === 'Admin' ? url('admin/dashboard') : (Auth::user()->role === 'Staff' ? url('staff/dashboard') : url('customer/dashboard'))) : url('/') }}" style="color: #fff; text-decoration: none; transition: opacity 0.3s ease;">
        <img src="{{ Vite::asset('resources/img/logo.png') }}" alt="Swirl & Twist" style="height:28px; width:auto; object-fit:contain; margin-right:8px;" />
        <span style="font-weight: 600;">Swirl and Twist</span>
    </a>
    
    <!-- Spacer to push user menu to the right -->
    <div class="ms-auto"></div>
    
    <!-- Navbar-->
    <ul class="navbar-nav ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #cbd5e1;"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown" style="background: #1e293b; border: 1px solid rgba(255,255,255,0.1); box-shadow: 0 4px 6px rgba(0,0,0,0.3);">
                <li><a class="dropdown-item" href="{{ route('profile.edit') }}" style="color: #cbd5e1; transition: all 0.3s;">{{ __('Profile') }}</a></li>
                <li style="display: none;"><a class="dropdown-item" href="#!" style="color: #cbd5e1; transition: all 0.3s;">Activity Log</a></li>
                <li><hr class="dropdown-divider" style="border-color: rgba(255,255,255,0.1);" /></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <a class="dropdown-item" href="{{route('logout')}}"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();"
                                style="color: #f87171; transition: all 0.3s;">
                            {{ __('Log Out') }}
                        </a>
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</nav>

<style>
/* Navbar hover effects */
.navbar-brand:hover {
    opacity: 0.8;
}

#sidebarToggle:hover {
    color: #fff !important;
}

.dropdown-item:hover {
    background: rgba(255, 255, 255, 0.1) !important;
    color: #fff !important;
}

.dropdown-item[style*="color: #f87171"]:hover {
    background: rgba(248, 113, 113, 0.1) !important;
}
</style>