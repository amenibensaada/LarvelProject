<head>
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha384-ABcdEFGHIJKLMNOPQRsTUVWXYZZ12345A" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
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
            <a class="nav-link collapsed" data-bs-toggle="collapse" href="#restaurants-menu" aria-expanded="false" aria-controls="restaurants-menu">
                <i class="menu-icon mdi mdi-silverware-fork-knife"></i>
                <span class="menu-title">My Restaurants</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="restaurants-menu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('restaurants.index') }}">
                            <i class="menu-icon mdi mdi-eye"></i>
                            My Restaurants
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('restaurants.create') }}">
                            <i class="menu-icon mdi mdi-plus-circle"></i>
                            Add Restaurant
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Associations Section -->
        <li class="nav-item nav-category">Associations</li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-toggle="collapse" href="#associations-menu" aria-expanded="false" aria-controls="associations-menu">
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

        <!-- Livraison Section -->
        <li class="nav-item nav-category">Livraison</li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-toggle="collapse" href="#livraison-menu" aria-expanded="false" aria-controls="livraison-menu">
                <i class="menu-icon fas fa-truck"></i>
                <span class="menu-title">Livraison</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="livraison-menu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('livraisons.index') }}">
                            <i class="menu-icon fas fa-eye"></i>
                            Livraisons
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('transporteurs.index') }}">
                            <i class="menu-icon fas fa-shipping-fast"></i>
                            Transporteur
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Beneficiaires Section -->
        <li class="nav-item nav-category">Bénéficiaires</li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-toggle="collapse" href="#beneficiaires-menu" aria-expanded="false" aria-controls="beneficiaires-menu">
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

        <!-- Products Section -->
        <li class="nav-item nav-category">Products</li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-toggle="collapse" href="#product-menu" aria-expanded="false" aria-controls="product-menu">
                <i class="menu-icon mdi mdi-food-apple"></i>
                <span class="menu-title">My Products</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="product-menu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('products.index') }}">
                            <i class="menu-icon mdi mdi-eye"></i>
                            List Products
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('products.create') }}">
                            <i class="menu-icon mdi mdi-plus-circle"></i>
                            Add Product
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Events Section -->
        <li class="nav-item nav-category">Events</li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-toggle="collapse" href="#events-menu" aria-expanded="false" aria-controls="events-menu">
                <i class="menu-icon mdi mdi-ticket"></i>
                <span class="menu-title">My Events</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="events-menu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('events.index') }}">
                            <i class="menu-icon mdi mdi-eye"></i>
                            List Events
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Inventory Section -->
        <li class="nav-item nav-category">Inventory</li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-toggle="collapse" href="#product-stocks-menu" aria-expanded="false" aria-controls="product-stocks-menu">
                <i class="menu-icon mdi mdi-package-variant"></i>
                <span class="menu-title">Product Stocks</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="product-stocks-menu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('product_stocks.index') }}">
                            <i class="menu-icon mdi mdi-eye"></i>
                            View Stocks
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('product_stocks.create') }}">
                            <i class="menu-icon mdi mdi-plus-circle"></i>
                            Add Stock
                        </a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</nav>
