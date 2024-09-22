<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
                <span class="icon-menu"></span>
            </button>
        </div>
        <div>
            <a class="navbar-brand brand-logo" href="{{ url('/') }}">
                <img src="{{ asset('assets/images/logo.svg') }}" alt="logo" />
            </a>
            <a class="navbar-brand brand-logo-mini" href="{{ url('/') }}">
                <img src="{{ asset('assets/images/logo-mini.svg') }}" alt="logo" />
            </a>
        </div>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-top">
        <ul class="navbar-nav">
            @if (Auth::check())
            <li class="nav-item fw-semibold d-none d-lg-block ms-0">
                <h1 class="welcome-text">Good Morning, 
                    <span class="text-black fw-bold">{{ Auth::user()->name }}</span>
                </h1>
                <h3 class="welcome-sub-text">Your performance summary this week</h3>
            </li>
        @else
            <li class="nav-item fw-semibold d-none d-lg-block ms-0">
                <h1 class="welcome-text">Good Morning, Guest</h1>
                <h3 class="welcome-sub-text">Please log in to view your performance summary</h3>
            </li>
        @endif
        
        </ul>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
                <a class="nav-link count-indicator" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                    <i class="icon-bell"></i>
                    <span class="count"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="notificationDropdown">
                    <a class="dropdown-item py-3">
                        <p class="mb-0 fw-medium float-start">You have 4 new notifications</p>
                        <span class="badge badge-pill badge-primary float-end">View all</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <i class="mdi mdi-alert m-auto text-primary"></i>
                        </div>
                        <div class="preview-item-content">
                            <h6 class="preview-subject fw-normal text-dark mb-1">Application Error</h6>
                            <p class="fw-light small-text mb-0"> Just now </p>
                        </div>
                    </a>
                    <a class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <i class="mdi mdi-settings m-auto text-primary"></i>
                        </div>
                        <div class="preview-item-content">
                            <h6 class="preview-subject fw-normal text-dark mb-1">Settings</h6>
                            <p class="fw-light small-text mb-0"> Private message </p>
                        </div>
                    </a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                    <img class="img-xs rounded-circle" src="{{ asset('assets/images/faces/face8.jpg') }}" alt="Profile image">
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                    @if (Auth::check())
                        <div class="dropdown-header text-center">
                            <img class="img-md rounded-circle" src="{{ asset('assets/images/faces/face8.jpg') }}" alt="Profile image">
                            <p class="mb-1 mt-3 fw-semibold">{{ Auth::user()->name }}</p>
                            <p class="fw-light text-muted mb-0">{{ Auth::user()->email }}</p>
                        </div>
                    @else
                        <div class="dropdown-header text-center">
                            <img class="img-md rounded-circle" src="{{ asset('assets/images/faces/face8.jpg') }}" alt="Profile image">
                            <p class="mb-1 mt-3 fw-semibold">Guest</p>
                            <p class="fw-light text-muted mb-0">Please log in</p>
                        </div>
                    @endif

                    <a class="dropdown-item" href="#">
                        <i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My Profile
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="dropdown-item-icon mdi mdi-settings-outline text-primary me-2"></i> Settings
                    </a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i> Sign Out
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>