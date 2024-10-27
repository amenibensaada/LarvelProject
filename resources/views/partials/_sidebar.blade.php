
<head>
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha384-ABcdEFGHIJKLMNOPQRsTUVWXYZZ12345A" crossorigin="anonymous">
</head>

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
                </li>

                </ul>
            </div>
        </li>
    <!-- Livraison section  -->
<li class="nav-item nav-category">
    <label for="livraisons"></label>
</li>
<li class="nav-item">
    <a class="nav-link collapsed" data-bs-toggle="collapse" href="#livraison-menu" aria-controls="livraison-menu">
        <i class="menu-icon fas fa-truck"></i> <!-- Changed icon -->
        <span class="menu-title">Livraison</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="livraison-menu">
        <ul class="nav flex-column sub-menu">
            <!-- Show Livraisons -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('livraisons.index') }}">
                    <i class="menu-icon fas fa-eye"></i> <!-- Changed icon -->
                    Livraisons
                </a>
            </li>
            <!-- Add New Livraison -->

            <li class="nav-item">
                <a class="nav-link" href="{{ route('transporteurs.index') }}">
                    <i class="menu-icon fas fa-shipping-fast"></i> <!-- Shipping Fast icon -->
                    Transporteur
                </a>
            </li>



        </ul>
    </div>
</li>




    </ul>
</nav>
