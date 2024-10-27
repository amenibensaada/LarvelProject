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

       <li class="nav-item nav-category">Products</li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-toggle="collapse" href="#restaurants-menu" aria-controls="restaurants-menu">
                <i class="menu-icon mdi mdi-food-apple"></i>
                <span class="menu-title">My Products</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="restaurants-menu">
                <ul class="nav flex-column sub-menu" >
                 
                    <div class="nav-item">
                        <a class="nav-link" href="{{ route('products.index') }}">
                            <i class="menu-icon mdi mdi-eye"></i>
                            List Products
                        </a>
</div>
                    
                    <li class="nav-item">
                        <a class="nav-link"  href="{{ route('products.create') }}">
                            <i class="menu-icon mdi mdi-plus-circle"></i>
                            Add Product
                        </a>
                    </li>
           
      
                </ul>
            </div>
        </li>
        <li class="nav-item nav-category">Events</li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-toggle="collapse" href="#restaurants-menu" aria-controls="restaurants-menu">
            <i class="menu-icon mdi mdi-ticket"></i>
                <span class="menu-title">My Events</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="restaurants-menu">
                <ul class="nav flex-column sub-menu" >
                 
                    <div class="nav-item">
                        <a class="nav-link" href="{{ route('events.index') }}">
                            <i class="menu-icon mdi mdi-eye"></i>
                            List Events
                        </a>
</div>
                   
           
      
                </ul>
            </div>
        </li>



       
    </ul>
</nav>
