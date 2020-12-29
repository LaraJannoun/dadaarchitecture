<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
    <div class="container-fluid">
        <a href="{{ env('APP_URL') }}" class="h4 mb-0 text-white text-uppercase d-none d-md-inline-block" target="_blank"><i class="fas fa-globe-americas mr-2"></i>Visit Website</a>
        <ul class="navbar-nav align-items-center d-none d-md-flex">
            <li class="nav-item dropdown">
                <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                            <img src="{{ asset('assets_cms/images/unisex_avatar.png') }}" alt="Profile Picture">
                        </span>
                        <div class="media-body ml-2 d-none d-lg-block">
                            <span class="mb-0 text-sm  font-weight-bold">{{ Auth::guard('admin')->user()->first_name . ' ' . Auth::guard('admin')->user()->last_name }}</span>
                        </div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome!</h6>
                    </div>
                    <a href="{{ route('admin.profile.edit') }}" class="dropdown-item">
                        <i class="fas fa-user-circle"></i>
                        <span>My profile</span>
                    </a>
                    <a href="{{ route('admin.settings') }}" class="dropdown-item">
                        <i class="fas fa-cog"></i>
                        <span>Settings</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item cursor-pointer" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>