<header>
  <div class = "header-wrap">
    
    <nav>
      <ul class = "nav-menu">
        <li class = "logo-container">
            <a class = "header-logo" href = "/" title = "Retro Customs">
              <img src = "{{asset('assets/Retro.png')}}" alt ="RetroCustoms Logo">
            </a>
        </li>
        @if(Session::has('user'))
          @if(Session::get('user')->role_id == 1)
          <li class = "nav-links"><a href = "/">Home</a></li>
          <li class = "nav-links"><a href = "/about">About Us</a></li>
          <li class = "nav-links"><a href = "/products">Products</a></li>
          <li class = "nav-links"><a href = "/orders">Orders</a></li>
          <li class ="nav-links button"><a href = "/profile">Dashboard</a></li>
          @else
          <li class = "nav-links"><a href = "/">Home</a></li>
          <li class = "nav-links"><a href = "/products">Products</a></li>
          <li class = "nav-links"><a href = "/consoles">Consoles</a></li>
          <li class = "nav-links"><a href = "/about">About Us</a></li>
          <li class ="nav-links button"><a href = "/profile">Profile</a></li>
          @endif
        <li class ="nav-links button secondary">
          <form action="/logout" method="POST">
            @csrf
          <button>Logout</button>
          </form>
        </li>
        @else
        <li class = "nav-links"><a href = "/">Home</a></li>
        <li class = "nav-links"><a href = "/products">Products</a></li>
        <li class = "nav-links"><a href = "/consoles">Consoles</a></li>
        <li class = "nav-links"><a href = "/about">About Us</a></li>
        <li class ="nav-links button"><a href = "/login">Login</a></li>
        <li class ="nav-links button secondary"><a href = "/register">Sign Up</a></li>
        @endif
        <li class = "toggle"><span class = "bars"></span></li>
      </ul>
    </nav>
  </div>
</header>
