<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        @auth
        <h1 class="sitename">{{Auth()->user()->name}}</h1>
        
        @endauth
        @guest
          <h1 class="sitname">ZehnBook</h1>
        @endguest
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="/">Home</a></li>
          <li><a href="/genres">Genres</a></li>
          <li><a href="/books">Books</a></li>
          @auth
              
          <li><a href="/profile">Profile</a></li>
          @endauth
        </ul>              
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
      @guest
      <div class="">
        <a href="/login" class="btn btn-primary mr-3">Login</a>
        <a href="/register" class="btn btn-info ">Register</a>
      </div>        
      @endguest
      @auth
          <form action="/logout" method="POST">
          @csrf
          <button class="btn btn-danger">Logout</button>
          </form>
      @endauth

      

    </div>
  </header>