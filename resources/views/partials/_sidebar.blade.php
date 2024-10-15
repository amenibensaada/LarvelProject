<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <!-- Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <!-- Restaurants Section -->
        <li class="nav-item nav-category">Restaurants</li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-toggle="collapse" href="#restaurants-menu" aria-controls="restaurants-menu">
                <i class="menu-icon mdi mdi-silverware-fork-knife"></i>
                <span class="menu-title">My Restaurants</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="restaurants-menu">
                <ul class="nav flex-column sub-menu" >
                    <!-- Show Restaurants -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('restaurants.index') }}">
                            <i class="menu-icon mdi mdi-eye"></i>
                            My Restaurants
                        </a>
                    </li>
                    <!-- Add New Restaurant -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('restaurants.create') }}">
                            <i class="menu-icon mdi mdi-plus-circle"></i>
                            Add Restaurant
                        </a>
                    </li>
                   
                </ul>
            </div>
        </li>
        

        <li class="nav-item nav-category">Associations</li>
<li class="nav-item">
    <a class="nav-link collapsed" data-bs-toggle="collapse" href="#associations-menu" aria-controls="associations-menu">
        <i class="menu-icon mdi mdi-account-group"></i>
        <span class="menu-title">My Associations</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="associations-menu">
        <ul class="nav flex-column sub-menu">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('associations.index') }}">
                    <i class="menu-icon mdi mdi-eye"></i>
                    My Associations
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('associations.create') }}">
                    <i class="menu-icon mdi mdi-plus-circle"></i>
                    Add Association
                </a>
            </li>
        </ul>
    </div>
</li>

<li class="nav-item nav-category">Bénéficiaires</li>
<li class="nav-item">
    <a class="nav-link collapsed" data-bs-toggle="collapse" href="#beneficiaires-menu" aria-controls="beneficiaires-menu">
        <i class="menu-icon mdi mdi-account-group"></i>
        <span class="menu-title">My Bénéficiaires</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="beneficiaires-menu">
        <ul class="nav flex-column sub-menu">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('beneficiares.index') }}">
                    <i class="menu-icon mdi mdi-eye"></i>
                    Bénéficiaires
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('beneficiares.create') }}">
                    <i class="menu-icon mdi mdi-plus-circle"></i>
                    Add Bénéficiaires
                </a>
            </li>
        </ul>
    </div>
</li>


      

       
    </ul>
</nav>
