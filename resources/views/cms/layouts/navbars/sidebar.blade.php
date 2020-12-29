<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        {{-- Toggler --}}
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        {{-- Brand --}}
        <a class="navbar-brand pt-0" href="{{ route('admin.dashboard') }}">
            <img src="{{ asset('assets_cms/images/logo.png') }}" class="navbar-brand-img" alt="Tedmob Logo">
        </a>
        {{-- User --}}
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                            <img alt="Image placeholder" src="{{ asset('assets_cms/images/default_avatar.png') }}">
                        </span>
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
                    <a class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </li>
        </ul>
        {{-- Collapse --}}
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            {{-- Collapse header --}}
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('admin.dashboard') }}">
                            <img src="{{ asset('assets_cms/images/logo.png') }}">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            {{-- Navigation --}}
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-drafting-compass text-primary"></i>Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('admin.admins.*') ? 'active' : '' }}" href="{{ route('admin.admins.index') }}">
                        <i class="fas fa-users-cog text-primary"></i>Admins Management
                    </a>
                </li>
            </ul>
            <hr class="my-3">
            <h6 class="navbar-heading text-muted">GENERAL MANAGEMENT</h6>
            <ul class="navbar-nav mb-3">
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('admin.banners.*') ? 'active' : '' }}" href="{{ route('admin.banners.index') }}">
                        <i class="fas fa-image"></i>Banners
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('admin.categories.*') ? 'active' : '' }}" href="{{ route('admin.categories.index') }}">
                        <i class="fas fa-book"></i>Categories
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('admin.fixed-sections.*') ? 'active' : '' }}" href="{{ route('admin.fixed-sections.index') }}">
                        <i class="fas fa-columns"></i>Fixed Sections
                    </a>
                </li>
            </ul>
            <h6 class="navbar-heading text-muted">Platform Content</h6>
            <ul class="navbar-nav mb-3">
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('admin.home-slider.*') ? 'active' : '' }}" href="{{ route('admin.home-slider.index') }}">
                        <i class="far fa-images"></i>Home Slider
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#projects" data-toggle="collapse" role="button" aria-expanded="{{ Route::is('admin.projects.*') ? 'true' : 'false' }}" aria-controls="projects">
                        <i class="fas fa-newspaper"></i>
                        <span class="nav-link-text">Projects Page</span>
                    </a>
                    <div class="collapse {{ Route::is('admin.projects.*') ? 'show' : '' }}" id="projects">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link ml-3 {{ Route::is('admin.projects.*') && !Route::is('admin.projects.trash') ? 'active' : '' }}" href="{{ route('admin.projects.index') }}">
                                    Project Details
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link ml-3 {{ Route::is('admin.media.*') ? 'active' : '' }}" href="{{ route('admin.media.index') }}">
                                    Media
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link ml-3 {{ Route::is('admin.projects.trash') ? 'active' : '' }}" href="{{ route('admin.projects.trash') }}">
                                    Trashed Projects
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#profile-details" data-toggle="collapse" role="button" aria-expanded="{{ Route::is('admin.profile-details.*') ? 'true' : 'false' }}" aria-controls="profile-details">
                        <i class="far fa-address-card"></i>
                        <span class="nav-link-text">Profile Page</span>
                    </a>
                    <div class="collapse {{ Route::is('admin.profile-details.*') ? 'show' : '' }}" id="profile-details">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link ml-3 {{ Route::is('admin.profile-details.*') && !Route::is('admin.profile-details.*') ? 'active' : '' }}" href="{{ route('admin.profile-details.index') }}">
                                    Profile Details
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link ml-3 {{ Route::is('admin.designers.*') ? 'active' : '' }}" href="{{ route('admin.designers.index') }}">
                                    Designers
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#service-details" data-toggle="collapse" role="button" aria-expanded="{{ Route::is('admin.service-details.*') ? 'true' : 'false' }}" aria-controls="service-details">
                        <i class="fas fa-tasks"></i>
                        <span class="nav-link-text">Services Page</span>
                    </a>
                    <div class="collapse {{ Route::is('admin.service-details.*') ? 'show' : '' }}" id="service-details">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link ml-3 {{ Route::is('admin.service-details.*') && !Route::is('admin.service-details.*') ? 'active' : '' }}" href="{{ route('admin.service-details.index') }}">
                                    Service Details
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link ml-3 {{ Route::is('admin.clients.*') ? 'active' : '' }}" href="{{ route('admin.clients.index') }}">
                                    Clients
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('admin.contact-details.*') ? 'active' : '' }}" href="{{ route('admin.contact-details.index') }}">
                        <i class="far fa-address-book"></i>Contact Details
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('admin.social-media.*') ? 'active' : '' }}" href="{{ route('admin.social-media.index') }}">
                        <i class="fas fa-hashtag"></i>Social Media & Map
                    </a>
                </li>
            </ul>
            <h6 class="navbar-heading text-muted">Forms & Submissions</h6>
            <ul class="navbar-nav mb-3">
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('admin.contact-requests.*') ? 'active' : '' }}" href="{{ route('admin.contact-requests.index') }}">
                        <i class="far fa-edit"></i>Contact Requests
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>