<a href="index3.html" class="brand-link">
    <span class="brand-text font-weight-light "> @if (Auth::user()->role_id==1)
      Admin
      @elseif(Auth::user()->role_id==2)
      Vendor
      @else
      Customer
    @endif Dashboard</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        @if ( Auth::user()->image!=NULL)
           <img src="{{ asset(Auth::user()->image) }}" class="img-circle elevation-2" alt="User Image">
        @else
           <img src="{{ asset('img/user/1678975331.jpg') }}" class="img-circle elevation-2" alt="User Image">
        @endif
      </div>
      <div class="info">
        <a href="#" class="d-block"> {{ Auth::user()->name }} </a>
      </div>
    </div>


    <!-- Sidebar Menu -->
    @if(Auth::user()->role_id==1)
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="{{ route('admin.dashboard') }}" class="nav-link @if (Request::is('admin/dashboard*')) active @endif">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>


        <li class="nav-item">
          <a href="{{ route('admin.user.index') }}" class="nav-link @if (Request::is('admin/user*')) active @endif">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              User List
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('admin.profile') }}" class="nav-link @if (Request::is('admin/profile*')) active @endif">
            <i class="nav-icon fas fa-user"></i>
            <p>
             Profile
            </p>
          </a>
        </li>

        
      </ul>
    </nav>
    @elseif(Auth::user()->role_id==2)
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="{{ route('vendor.dashboard') }}" class="nav-link @if (Request::is('vendor/dashboard*')) active @endif">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('vendor.profile') }}" class="nav-link @if (Request::is('vendor/profile*')) active @endif">
            <i class="nav-icon fas fa-user"></i>
            <p>
             Profile
            </p>
          </a>
        </li>

        
      </ul>
    </nav>
    @else
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('customer.dashboard') }}" class="nav-link @if (Request::is('customer/dashboard*')) active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('customer.profile') }}" class="nav-link @if (Request::is('customer/profile*')) active @endif">
              <i class="nav-icon fas fa-user"></i>
              <p>
              Profile
              </p>
            </a>
          </li>

          
        </ul>
      </nav>
    @endif
    <!-- /.sidebar-menu -->
  </div>