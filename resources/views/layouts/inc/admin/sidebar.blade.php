<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="/admin/dashboard">
                <i class="mdi mdi-view-dashboard menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Live Page</span>
            </a>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="mdi mdi-chart-line menu-icon"></i>
                <span class="menu-title">Sales</span>
            </a>
        </li> --}}
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#category" aria-expanded="false"
                aria-controls="category">
                <i class="mdi mdi-folder-outline menu-icon"></i>
                <span class="menu-title">Category</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="category">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ url('admin/catagory/create') }}">Add Category</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ url('admin/catagory') }}">View Categories</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#product" aria-expanded="false" aria-controls="product">
                <i class="mdi mdi-package-variant-closed menu-icon"></i>
                <span class="menu-title">Products</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="product">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ url('admin/products/create') }}">Add Product</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ url('admin/products') }}">View Products</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/brands') }}">
                <i class="mdi mdi-tag-multiple menu-icon"></i>
                <span class="menu-title">Brands</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/colors') }}">
                <i class="mdi mdi-palette menu-icon"></i>
                <span class="menu-title">Color</span>

            </a>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#users" aria-expanded="false" aria-controls="users">
                <i class="mdi mdi-account-group menu-icon"></i>
                <span class="menu-title">Users</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="users">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="#">All Users</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">Roles</a></li>
                </ul>
            </div>
        </li> --}}
        <li class="nav-item">
            <a class="nav-link" href="{{url('admin/sliders')}}">
                <i class="mdi mdi-image-filter menu-icon"></i>
                <span class="menu-title">Home Slider</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="mdi mdi-settings menu-icon"></i>
                <span class="menu-title">Site Setting</span>
            </a>
        </li>
    </ul>
</nav>
