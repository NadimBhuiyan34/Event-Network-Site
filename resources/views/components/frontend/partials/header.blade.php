   <!-- ======= Header ======= -->
   <header id="header" class="fixed-top">
       <div class="container d-flex align-items-center">

           <a class="navbar-brand" href="{{ route('dashboard') }}"> <img src="{{ asset('img/Wayzaway_logo.png') }}"
                   alt="" style="width: 200px;height:45px"></a>
           <!-- Uncomment below if you prefer to use an image logo -->
           <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

           <nav id="navbar" class="navbar order-last order-lg-0" style="padding-right:500px">
               <ul>
                   <li><a class="active" href="{{ route('dashboard') }}">Browse</a></li>
                   <li><a href="{{ route('friends.index') }}">Friends</a></li>
                   <li><a href="{{ route('favourites.index') }}">Favourites</a></li>
                   <li><a href="{{ route('profiles.page') }}">Profile</a></li>
                   <li><a href="{{ route('blog.page') }}">Blog</a></li>

                


               </ul>
               <i class="bi bi-list mobile-nav-toggle"></i>
           </nav><!-- .navbar -->

           <div class="dropdown">

               <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                   <img src="{{ asset('storage/image/profiles/' . Auth::user()->profile_image) }}" alt=""
                       class="rounded-circle" style="width:50px;height:50px;"> {{ Auth::user()->name }}</a>


               <ul class="dropdown-menu">
                   <a href="{{ route('profiles.index') }}" class="dropdown-item">Profile Setting</a>
                   <a href="#" class="dropdown-item">Privacy</a>
                   <a href="#" class="dropdown-item">Terms & Conditions</a>
                   @if(Auth::user()->role=='admin')
                   
                       <a href="{{ route('dashboard1') }}" class="dropdown-item">Admin</a>
                   
                   @endif
                  
                   <form action="{{ route('logout') }}" method="POST">
                       @csrf
                       <input type="submit" value="Logout" class="dropdown-item">
                   </form>
               </ul>
           </div>

       </div>
   </header><!-- End Header -->
