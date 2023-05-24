<ul class="navbar-nav bg-gradient sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color:rgb(90, 23, 197);">

    <a class="sidebar-brand d-flex align-items-center justify-content-center">
        <div class="">
            <img class="img-profile rounded-circle" src="/img/undraw_profile.svg">
             </div>
        <a href="/">  <div class="sidebar-brand-text mx-3">Admin Page</a></div>
    </a>

    <hr class="sidebar-divider my-0">

   

    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        barang
    </div>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('/*') ? 'active' : '' }}" href="orderList">
            <i class="fas fa-clipboard-list"></i>
            <span>Order</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('/*') ? 'active' : '' }}" href="user">
            <i class="fas fa-clipboard-list"></i>
            <span>Manage User</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ Request::is('/*') ? 'active' : '' }}" href="product">
            <i class="fas fa-clipboard-list"></i>
            <span>Data produk</span>
        </a>
    </li>


    <li class="nav-item">
        <a class="nav-link {{ Request::is('/*') ? 'active' : '' }}" href="category">
            <i class="fas fa-clipboard-list"></i>
            <span>Category</span>
        </a>
    </li>


    <li class="nav-item">
        <a class="nav-link {{ Request::is('/*') ? 'active' : '' }}" href="Subcategory">
            <i class="fas fa-clipboard-list"></i>
            <span>Subcategory</span>
        </a>
    </li>
 
    <li class="nav-item">
    <form action="{{ url('/logout') }}" method="post">
        @csrf
           <button type="submit" class="btn btn-outline-warning "><i class="bi bi-box-arrow-right">Logout</i></button>
      </form>
    </li>
    <hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>