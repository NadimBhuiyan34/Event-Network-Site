  <aside id="sidebar" class="sidebar">

      <ul class="sidebar-nav" id="sidebar-nav">

          <li class="nav-item">
              <a class="nav-link " href="{{ route('dashboard1') }}">
                  <i class="bi bi-grid"></i>
                  <span>Dashboard</span>
              </a>
          </li><!-- End Dashboard Nav -->


         
          
          <li class="nav-item">
              <a class="nav-link collapsed" href="{{ route('users.index') }}">
                 <i class="fas fa-user"></i>
               
                  <span>User</span>
              </a>
          </li><!-- End Profile Page Nav -->
          <li class="nav-item">
              <a class="nav-link collapsed" href="{{ route('categories.index') }}">
                  <i class="fas fa-book"></i>

                  <span>Category</span>
              </a>
          </li><!-- End Profile Page Nav -->
          <li class="nav-item">
              <a class="nav-link collapsed" href="{{ route('events.index') }}">
                  <i class="fas fa-calendar"></i>

                  <span>Event</span>
              </a>
          </li><!-- End Profile Page Nav -->
          <li class="nav-item">
              <a class="nav-link collapsed" href="{{ route('comments.index') }}">
                  <i class="fas fa-comment"></i>

                  <span>Comment</span>
              </a>
          </li><!-- End Profile Page Nav -->

          <li class="nav-item">
              <a class="nav-link collapsed" href="{{ route('blogs.index') }}">
                 <i class="fas fa-newspaper"></i>

                  <span>Blog</span>
              </a>
          </li><!-- End Profile Page Nav -->

         
         


      </ul>

  </aside><!-- End Sidebar-->
