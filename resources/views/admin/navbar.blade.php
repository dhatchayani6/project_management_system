<nav class="navbar p-0 fixed-top d-flex flex-row">
  <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
    <a class="navbar-brand brand-logo-mini" href="index.html"><img src="admin/assets/images/logo-mini.svg"
        alt="logo" /></a>
  </div>
  <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="mdi mdi-menu"></span>
    </button>
    <ul class="navbar-nav w-100">

    </ul>
    <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item dropdown notification-icon">
        <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-bell"></i>
          <span class="badge">3</span> <!-- Number of notifications -->
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="notificationDropdown">
          <a class="dropdown-item" href="#">Notification 1</a>
          <a class="dropdown-item" href="#">Notification 2</a>
          <a class="dropdown-item" href="#">Notification 3</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item text-center" href="#">View All Notifications</a>
        </div>
      </li>

      <li>
        <form method="post" action="{{route('logout')}}">
          @csrf
          <!-- <input type="submit" value="logout" class="btn btn-primary"> -->
          <button class="btn btn-primary">LOGOUT</button>
        </form>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
      data-toggle="offcanvas">
      <span class="mdi mdi-format-line-spacing"></span>
    </button>
  </div>
</nav>