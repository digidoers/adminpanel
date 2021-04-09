<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.users.dashboard') }}" class="brand-link">
      <img src="{{url('admin_assets/dist/img/AdminLTELogo.png')}}"
           alt="{{env('APP_NAME')}}"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">{{env('APP_NAME')}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{url('admin_assets/dist/img/dummy_image.webp')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="{{ route('admin.users.dashboard') }}" class="nav-link {{ (in_array(request()->route()->getName(), ['admin.users.dashboard']))?'active':'' }}" >
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                
              </p>
            </a>
            
          </li>


          <li class="nav-item has-treeview {{ (in_array(request()->route()->getName(), ['admin.users.index', 'admin.users.create']))?'menu-open':'' }}">
          <a href="#" class="nav-link  {{ (in_array(request()->route()->getName(), ['admin.users.index', 'admin.users.create']))?'active':'' }}" >
             <i class="nav-icon fas fa-users"></i>
              <p>
                Users 
                <i class="right fas fa-angle-left"></i>
               
              </p>
            </a>
            <ul class="nav nav-treeview {{ (in_array(request()->route()->getName(), ['admin.users.index', 'admin.users.create']))?'menu-open':'' }}" style="display:{{ (in_array(request()->route()->getName(), ['admin.users.index','admin.users.create']))?'block':'none' }};">
              <li class="nav-item">
                <a href="{{ route('admin.users.index') }}" class="nav-link {{ (in_array(request()->route()->getName(), ['admin.users.index']))?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.users.create') }}" class="nav-link {{ (in_array(request()->route()->getName(), ['admin.users.create']))?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create User</p>
                </a>
              </li>
              </ul>
          </li>



          <li class="nav-item has-treeview {{ (in_array(request()->route()->getName(), ['admin.pages.index', 'admin.pages.create']))?'menu-open':'' }}">
          <a href="#" class="nav-link  {{ (in_array(request()->route()->getName(), ['admin.pages.index', 'admin.pages.create']))?'active':'' }}" >
          <i class="nav-icon fas fa-copy"></i>
              <p>
                Pages 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview {{ (in_array(request()->route()->getName(), ['admin.pages.index', 'admin.pages.create']))?'menu-open':'' }}" style="display:{{ (in_array(request()->route()->getName(), ['admin.pages.index','admin.pages.create']))?'block':'none' }};">
              <li class="nav-item">
                <a href="{{ route('admin.pages.index') }}" class="nav-link {{ (in_array(request()->route()->getName(), ['admin.pages.index']))?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Page List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.pages.create') }}" class="nav-link {{ (in_array(request()->route()->getName(), ['admin.pages.create']))?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Page</p>
                </a>
              </li>
              
              </ul>
          </li>
          <li class="nav-item has-treeview {{ (in_array(request()->route()->getName(), ['admin.emailtemplates.index', 'admin.emailtemplates.create']))?'menu-open':'' }}">
            <a href="#" class="nav-link {{ (in_array(request()->route()->getName(), ['admin.emailtemplates.index', 'admin.emailtemplates.create']))?'active':'' }}">
          <i class="nav-icon fas fa-envelope-open-text"></i>
              
              <p>
               Email Templates
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview {{ (in_array(request()->route()->getName(), ['admin.emailtemplates.index', 'admin.emailtemplates.create']))?'menu-open':'' }}" style="display:{{ (in_array(request()->route()->getName(), ['admin.emailtemplates.index','admin.emailtemplates.create']))?'block':'none' }};">
              <li class="nav-item">
                <a href="{{ route('admin.emailtemplates.index') }}" class="nav-link {{ (in_array(request()->route()->getName(), ['admin.emailtemplates.index']))?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Template List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.emailtemplates.create') }}" class="nav-link {{ (in_array(request()->route()->getName(), ['admin.emailtemplates.create']))?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create New Template</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="{{ route('admin.website-settings.edit') }}" class="nav-link {{ (in_array(request()->route()->getName(), ['admin.website-settings.edit']))?'active':'' }}">
             <i class="nav-icon fas fa-user-cog"></i>
              <p>
               Website Settings
                
              </p>
            </a> 
          </li>
          </ul>

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
