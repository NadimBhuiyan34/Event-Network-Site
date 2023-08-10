  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
      <div class="container d-flex align-items-center">

          <h1 class="logo me-auto"><a href="index.html">Mentor</a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

          <nav id="navbar" class="navbar order-last order-lg-0">
              <ul>
                  <li><a class="active" href="index.html">Home</a></li>
                  <li><a href="about.html">About</a></li>
                  <li><a href="courses.html">Courses</a></li>
                  <li><a href="trainers.html">Trainers</a></li>
                  <li><a href="events.html">Events</a></li>
                  <li><a href="pricing.html">Pricing</a></li>

                  <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
                      <ul>
                          <li><a href="#">Drop Down 1</a></li>
                          <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i
                                      class="bi bi-chevron-right"></i></a>
                              <ul>
                                  <li><a href="#">Deep Drop Down 1</a></li>
                                  <li><a href="#">Deep Drop Down 2</a></li>
                                  <li><a href="#">Deep Drop Down 3</a></li>
                                  <li><a href="#">Deep Drop Down 4</a></li>
                                  <li><a href="#">Deep Drop Down 5</a></li>
                              </ul>
                          </li>
                          <li><a href="#">Drop Down 2</a></li>
                          <li><a href="#">Drop Down 3</a></li>
                          <li><a href="#">Drop Down 4</a></li>
                      </ul>
                  </li>
                  <li><a href="contact.html">Contact</a></li>
              </ul>
              <i class="bi bi-list mobile-nav-toggle"></i>

          </nav><!-- .navbar -->

          <div class="dropdown">
              <a href="#" class="nav-item nav-link dropdown-toggle" data-toggle="dropdown">
                  <img src="{{ asset('storage/image/profiles/' . Auth::user()->profile_image) }}" alt=""
                      class="rounded-circle" width="150"> {{ Auth::user()->name }}</a>
              <div class="dropdown-menu dropdown-menu-right">
                  <a href="{{ route('profiles.index') }}" class="dropdown-item">Profile Setting</a>
                  <a href="#" class="dropdown-item">Privacy</a>
                  <a href="#" class="dropdown-item">Terms & Conditions</a>
                  <form action="{{ route('logout') }}" method="POST">
                      @csrf
                      <input type="submit" value="Logout" class="dropdown-item">
                  </form>


              </div>
          </div>

      </div>
  </header><!-- End Header -->
