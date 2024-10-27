<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <!-- Dashboard -->
        {{-- <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li> --}}
        <li class="nav-item nav-category">Livraison</li>
         <li class="nav-item">
            <a class="nav-link collapsed" data-bs-toggle="collapse" href="#associations-menu" aria-controls="associations-menu">
                <i class="menu-icon mdi mdi-account-group"></i>
                <span class="menu-title">My Livraison</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="associations-menu">
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
       
    </ul>
</nav>
