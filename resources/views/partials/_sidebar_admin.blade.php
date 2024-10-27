<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/') }}">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
            <!-- Events Section -->
            <li class="nav-item nav-category">Events</li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-toggle="collapse" href="#restaurants-menu" aria-controls="restaurants-menu">
            <i class="menu-icon mdi mdi-ticket"></i>
            <span class="menu-title">My Events</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="restaurants-menu">
                <ul class="nav flex-column sub-menu" >
                    <!-- Show Events -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('events.index') }}">
                            <i class="menu-icon mdi mdi-eye"></i>
                            My Events
                        </a>
                    </li>
                    <!-- Add New Event -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('events.create') }}">
                            <i class="menu-icon mdi mdi-plus-circle"></i>
                            Add Event
                        </a>
                    </li>

                    
                    
                </ul>
            </div>
        </li>

        <!-- Event Categories Section -->
<li class="nav-item nav-category">Event Categories</li>
<li class="nav-item">
    <a class="nav-link collapsed" data-bs-toggle="collapse" href="#categories-menu" aria-controls="categories-menu">
        <i class="menu-icon mdi mdi-view-list"></i>
        <span class="menu-title">Event Categories</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="categories-menu">
        <ul class="nav flex-column sub-menu" >
            <!-- Show Event Categories -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('evenement-categories.index') }}">
                    <i class="menu-icon mdi mdi-eye"></i>
                    View Categories
                </a>
            </li>
            <!-- Add New Event Category -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('evenement-categories.create') }}">
                    <i class="menu-icon mdi mdi-plus-circle"></i>
                    Add Category
                </a>
            </li>
        </ul>
    </div>
</li>


        <!-- <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
                <i class="menu-icon mdi mdi-card-text-outline"></i>
                <span class="menu-title">Form elements</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="#">Basic Elements</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="menu-icon mdi mdi-file-document"></i>
                <span class="menu-title">Documentation</span>
            </a>
        </li> -->
    </ul>
</nav>
