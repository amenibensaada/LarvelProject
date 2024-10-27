<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <!-- Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <!-- Restaurants Management Section -->
        <li class="nav-item nav-category">Restaurants</li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-toggle="collapse" href="#admin-restaurants-menu" aria-controls="admin-restaurants-menu">
                <i class="menu-icon mdi mdi-silverware-fork-knife"></i>
                <span class="menu-title"> Restaurants</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="admin-restaurants-menu">
                <ul class="nav flex-column sub-menu">
                    <!-- View All Restaurants -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('back.restaurant.index') }}">
                            <i class="menu-icon mdi mdi-eye"></i>
                            All Restaurants
                        </a>
                    </li>
                    
                </ul>
            </div>
        </li>

        <!-- Users Management Section -->
        <li class="nav-item nav-category">Users</li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-toggle="collapse" href="#admin-users-menu" aria-controls="admin-users-menu">
                <i class="menu-icon mdi mdi-account-multiple"></i>
                <span class="menu-title">Manage Users</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="admin-users-menu">
                <ul class="nav flex-column sub-menu">
                    {{-- <!-- View All Users -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.users.index') }}">
                            <i class="menu-icon mdi mdi-account"></i>
                            All Users
                        </a>
                    </li>
                    <!-- Add New User (Optional) -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.users.create') }}">
                            <i class="menu-icon mdi mdi-account-plus"></i>
                            Add User
                        </a>
                    </li> --}}
                </ul>
            </div>
        </li>

        <!-- Documentation (if needed for Admin) -->
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="menu-icon mdi mdi-file-document"></i>
                <span class="menu-title">Documentation</span>
            </a>
        </li>
    </ul>
</nav>
