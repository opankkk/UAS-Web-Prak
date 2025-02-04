<nav id="sidebarMenu" class="col-md-2 col-lg-2 d-md-block  sidebar collapse" style="background-color: #00541A;">
  <div class="position-sticky pt-3">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" style="color: #FEF9D9;" href="/dashboard">
          <span data-feather="home"></span>
          Dashboard
        </a>        
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/orders*') ? 'active' : '' }}" aria-current="page" style="color: #FEF9D9;" href="/dashboard/orders">
          <span data-feather="file"></span>
          Orders
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : '' }}"  aria-current="page" style="color: #FEF9D9;" href="/dashboard/posts">
          <span data-feather="database"></span>
          Products
        </a>
      </li>
  </div>
</nav>