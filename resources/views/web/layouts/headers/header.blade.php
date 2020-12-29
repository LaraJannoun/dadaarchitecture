<div class="header-row">
    <div class="row h-100">
        <div class="col-auto">
            <div class="d-table w-100 h-100">
                <div class="d-table-cell align-middle">
                    <a href="{{ route('home') }}">
                        <img class="logo-image" src="{{ asset('assets_web/images/logo.svg' )}}" alt="logo"/>
                    </a>
                </div>
            </div>
        </div>
        <div class="col text-right">
            <div class="d-table w-100 h-100">
                <div class="d-table-cell align-middle">
                    <ul class="menu d-none">
                        <li class="@if(Route::is('home')) active @endif">
                            <a href="{{ route('home') }}">HOME</a>
                        </li>
                        <li class="@if(Route::is('projects')) active @endif">
                            <a href="{{ route('projects') }}">PROJECTS</a>
                        </li>
                        <li class="@if(Route::is('profile')) active @endif">
                            <a href="{{ route('profile') }}">PROFILE</a>
                        </li>
                        <li class="@if(Route::is('services')) active @endif">
                            <a href="{{ route('services') }}">SERVICES</a>
                        </li>
                        <li class="@if(Route::is('contact')) active @endif">
                            <a href="{{ route('contact') }}">CONTACT</a>
                        </li>
                    </ul>
                    <div class="burger align-middle">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <ul class="mobile-menu d-none">
                <li class="@if(Route::is('home')) active @endif">
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li class="@if(Route::is('projects')) active @endif">
                    <a href="{{ route('projects') }}">Projects</a>
                </li>
                <li class="@if(Route::is('profile')) active @endif">
                    <a href="{{ route('profile') }}">Profile</a>
                </li>
                <li class="@if(Route::is('services')) active @endif">
                    <a href="{{ route('services') }}">Services</a>
                </li>
                <li class="@if(Route::is('contact')) active @endif">
                    <a href="{{ route('contact') }}">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</div>