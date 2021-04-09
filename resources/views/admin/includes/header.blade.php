 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
     
    </ul>

     <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="fas fa-user mr-2"></i>{{ Auth::user()->name }}
        
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        
          
          <div class="dropdown-divider"></div>
          <a href="{{ route('admin.update-profile.edit') }}" class="dropdown-item">
          <i class="fas fa-user-edit mr-2"></i>Profile
            
          </a>
          <div class="dropdown-divider"></div>
          <a href="{{ route('admin.change-password.edit') }}" class="dropdown-item">
          <i class="fas fa-lock-open mr-2"></i>Change-Password
            
          </a>
          

          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{ route('admin.logout') }}"
           onclick="event.preventDefault();
           document.getElementById('logout-form').submit();">
             <i class="fas fa-sign-out-alt mr-2"></i> Logout
             </a>

          <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
           @csrf
          </form>

          </a>
      </li>
     
    </ul>

  </nav>
  <!-- /.navbar -->


 