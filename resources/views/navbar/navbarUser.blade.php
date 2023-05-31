<header class="header_section">
    <div class="container-fluid">
      <nav class="navbar navbar-expand-lg custom_nav-container">
        <a class="navbar-brand" href="/">
          <img src="images/logo.png" alt="" />
          <span>
            Goid
          </span>
        </a>

        <div class="navbar-collapse" id="">
          <div class="custom_menu-btn">
            <button onclick="openNav()">
              <span class="s-1"> </span>
              <span class="s-2"> </span>
              <span class="s-3"> </span>
            </button>
          </div>
          <div id="myNav" class="overlay">
            <div class="overlay-content"> 
              <a href="/">Home</a>
              <a href="#product">product</a> 
              @if (Auth::user())
              <a href="/detailUser"> {{ Auth::user()->name }}</a>
              <a href="/cartlist">cart</a> 
              <a href="/orderUser">order</a> 
              @role('admin')
              <a class="dropdown-item" href="/user">Dasboard</a>
              @endrole

               <form action="{{ url('/logout') }}" method="post">
                @csrf
                   <button type="submit" class="btn btn-outline-warning "><i class="bi bi-box-arrow-right">Logout</i></button>
              </form>  
            
              @else
              <a href="/login" class="nav-link">Login</a>
              <a href="/login/register" class="nav-link">Register</a>
              @endif
            </div>
          </div>
        </div>
        <style>
          a{
            margin-bottom: 10px;
          }
        </style>
      </nav>
    </div>
  </header>