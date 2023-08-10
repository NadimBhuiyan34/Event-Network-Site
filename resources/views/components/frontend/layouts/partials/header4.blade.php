 <!-- Navbar -->
 <nav class="navbar navbar-expand-lg navbar-light">
     <a class="navbar-brand" href="{{ route('dashboard') }}"> <img src="{{ asset('img/Wayzaway_logo.png') }}" alt=""
             style="width: 200px;height:45px"></a>
     <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
         <span class="navbar-toggler-icon"></span>
     </button>
     <!-- Collection of nav links, forms, and other content for toggling -->
     <div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
         <div class="navbar-nav">
             <a href="{{ route('dashboard') }}" class="nav-item nav-link active">Browse</a>
             
             <a href="{{ route('favourities.page') }}" class="nav-item nav-link">Favourites</a>
             <a href="#" class="nav-item nav-link">Friends</a>
             <a href="{{ route('profiles.page') }}" class="nav-item nav-link">Profile</a>
             
         </div>
         <div class="navbar-nav ml-auto">
             <div class="navbar-form-wrapper">
                 <form class="navbar-form form-inline">
                     <div class="input-group search-box">
                         <input type="text" id="search" class="form-control" placeholder="Search Here...">
                         <div class="input-group-append">
                             <span class="input-group-text">
                                 {{-- <i class="material-icons">&#xE8B6;</i> --}}
                             </span>
                         </div>
                     </div>
                 </form>
             </div>
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
     </div>
 </nav>
 <!--  -->
