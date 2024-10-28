<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">

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
                        <a class="nav-link" href="{{ route('events.adminindex') }}">
                            <i class="menu-icon mdi mdi-eye"></i>
                            My Events
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('events.create') }}">
                            <i class="menu-icon mdi mdi-plus-circle"></i>
                            Add Event
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item nav-category">Donations</li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-toggle="collapse" href="#donations-menu"
                aria-controls="restaurants-menu">
                <i class="menu-icon mdi mdi-hand-heart"></i>
                <span class="menu-title">Manage Donations</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="donations-menu">
                <ul class="nav flex-column sub-menu">
                    <!-- Show Restaurants -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.donations.index') }}">
                            <i class="menu-icon mdi mdi-eye"></i>
                            Donations list
                        </a>
                    </li>

                </ul>
            </div>
        </li>


        <li class="nav-item nav-category">Reviews</li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-toggle="collapse" href="#reviews-menu" aria-controls="reviews-menu">
                <i class="menu-icon mdi mdi-comment-text-multiple-outline"></i> <!-- Updated review icon -->
                <span class="menu-title">My Reviews</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="reviews-menu">
                <ul class="nav flex-column sub-menu">
                    <!-- View My Reviews -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.reviews.index') }}">
                            <!-- Updated route for reviews -->
                            <i class="menu-icon mdi mdi-eye"></i>
                            View My Reviews
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        
        <!-- Livraison Section -->
        <li class="nav-item nav-category">Livraison</li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-toggle="collapse" href="#livraisons-menu" aria-expanded="false" aria-controls="livraisons-menu">
                <i class="menu-icon mdi mdi-truck"></i>
                <span class="menu-title">My Livraison</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="livraisons-menu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('livraisons.livraison') }}">
                            <i class="menu-icon mdi mdi-eye"></i>
                            My Livraison
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Associations Section -->
        <li class="nav-item nav-category">Association</li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-toggle="collapse" href="#associations-menu" aria-expanded="false" aria-controls="associations-menu">
                <i class="menu-icon mdi mdi-account-group"></i>
                <span class="menu-title">My Associations</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="associations-menu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('associationsBack.index') }}">
                            <i class="menu-icon mdi mdi-eye"></i>
                            My Associations
                        </a>
                    </li>
                    
                </ul>
            </div>
        </li>

        <!-- Beneficiaire Section -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-toggle="collapse" href="#beneficiares-menu" aria-expanded="false" aria-controls="beneficiares-menu">
                <i class="menu-icon mdi mdi-account-multiple"></i>
                <span class="menu-title">My Beneficiaire</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="beneficiares-menu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('beneficiairesBack.index') }}">
                            <i class="menu-icon mdi mdi-eye"></i>
                            My Beneficiaires
                        </a>
                    </li>
                   
                </ul>
            </div>
        </li>

        <!-- Restaurants Section -->
        <li class="nav-item nav-category">Restaurants</li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-toggle="collapse" href="#restaurants-menu" aria-expanded="false" aria-controls="restaurants-menu">
                <i class="menu-icon mdi mdi-silverware-fork-knife"></i>
                <span class="menu-title">Restaurants</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="restaurants-menu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('back.restaurant.index') }}">
                            <i class="menu-icon mdi mdi-eye"></i>
                            All Restaurants
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Event Categories Section -->
        <li class="nav-item nav-category">Event Categories</li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-toggle="collapse" href="#event-categories-menu" aria-expanded="false" aria-controls="event-categories-menu">
                <i class="menu-icon mdi mdi-view-list"></i>
                <span class="menu-title">Event Categories</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="event-categories-menu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('evenement-categories.index') }}">
                            <i class="menu-icon mdi mdi-eye"></i>
                            View Categories
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('evenement-categories.create') }}">
                            <i class="menu-icon mdi mdi-plus-circle"></i>
                            Add Category
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Product Categories Section -->
        <li class="nav-item nav-category">Product Categories</li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-toggle="collapse" href="#product-categories-menu" aria-expanded="false" aria-controls="product-categories-menu">
                <i class="menu-icon mdi mdi-format-list-bulleted"></i>
                <span class="menu-title">Product Categories</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="product-categories-menu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('categories.index') }}">
                            <i class="menu-icon mdi mdi-eye"></i>
                            List Categories
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('categories.create') }}">
                            <i class="menu-icon mdi mdi-plus-circle-outline"></i>
                            Add Category
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        
       
    </ul>
</nav>
