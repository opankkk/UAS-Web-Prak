<header class="navbar navbar-dark sticky-top flex-md-nowrap p-0 shadow"style="background-color: #00541A">
  <a class="navbar-brand col-md-2 col-lg-2 me-0 px-3" href="/">Tandoor</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <form action="/logout" method="post" >
        @csrf
        <button type="submit" class="nav-link px-3  border-0" style="background-color: #FEF9D9; color:#00541A; height: 50px;">
          Logout <span data-feather="log-out"></span>
        </button>
      </form>
    </div>
  </div>
</header>