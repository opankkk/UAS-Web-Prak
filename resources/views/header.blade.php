<nav class="navbar-home">
  <div class="wrapper">
    <div class="logo">
      <a href="Index.php"><img src="aset/Logo-Tandoor.png" alt=""></a>
    </div>
    <div class="menu">
      <ul class="navbar-list">
        <li><a href="/">Home</a></li>
        <li><a href="/Products">Products</a></li>
        <li><a href="/about">About Us</a></li>
        @auth
        @if(auth()->user()->role == 'admin')
        <li><a href="/dashboard">Dashboard</a></li>
        @endif
        <div class="dropdown">
          <i class="fa-solid fa-user" style="color: #fef9d9;" class="profil-icon"></i>
          <div class="dropdown-content">
            <div class="list-dropdown">
              <a href="/Profile" style="font-weight: bold; color: #00541A;">Profile</a>
              <a href="/orders" style="font-weight: bold; color: #00541A;">Orders</a>
              <form action="/logout" method="post" class="logout-btn">
                @csrf
                <button type="submit" >Logout</button>
              </form>
            </div>
          </div>
        </div>
        @else
        <li><a href="/Login">Login</a></li>
        @endauth
      </ul>
    </div>
  </div>
</nav>