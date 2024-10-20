<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/') }}">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>


        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#organisations" aria-expanded="false" aria-controls="organisations">
                <i class="menu-icon mdi mdi-floor-plan"></i>
                <span class="menu-title">Organisations</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="organisations">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link"  href="{{ route('organisations.create') }}" >
                            <span class="menu-title">
                                <i class="mdi mdi-plus-circle text-primary"></i> Create
                            </span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link"  href="{{ route('organisations.index') }}" >
                            <span class="menu-title">
                                <i class="mdi mdi-checkbox-multiple-blank-outline text-primary"></i> list</span>
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
