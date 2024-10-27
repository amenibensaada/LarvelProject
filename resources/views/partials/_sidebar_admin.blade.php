<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/') }}">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
         <li class="nav-item">
    <a class="nav-link collapsed" data-bs-toggle="collapse" href="#associations-menu" aria-controls="associations-menu">
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
            <li class="nav-item">
                <a class="nav-link" href="{{ route('associations.create') }}">
                    <i class="menu-icon mdi mdi-plus-circle"></i>
                    Add Association
                </a>
            </li>
        </ul>
    </div>
</li> 
<li class="nav-item"> 
    <a class="nav-link collapsed" data-bs-toggle="collapse" href="#beneficiares-menu" aria-controls="beneficiares-menu">         
        <i class="menu-icon mdi mdi-account-group"></i>         
        <span class="menu-title">My Beneficiaire</span>         
        <i class="menu-arrow"></i>     
    </a>     
    <div class="collapse" id="beneficiares-menu"> <!-- Corrigé ici -->
        <ul class="nav flex-column sub-menu">             
            <li class="nav-item">                 
                <a class="nav-link" href="{{ route('beneficiairesBack.index') }}">                     
                    <i class="menu-icon mdi mdi-eye"></i>                     
                    My beneficiares                 
                </a>             
            </li>             
            <li class="nav-item">                 
                <a class="nav-link" href="{{ route('beneficiares.create') }}">                     
                    <i class="menu-icon mdi mdi-plus-circle"></i>                     
                    Add beneficiare                 
                </a>             
            </li>         
        </ul>     
    </div> 
</li>

        <li class="nav-item">
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
        </li>
    </ul>
</nav>
