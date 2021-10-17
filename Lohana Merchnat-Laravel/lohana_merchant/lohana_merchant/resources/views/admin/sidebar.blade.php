<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Loahana Merchant</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{URL::to('/admin/dashboard')}}" class="nav-link {{ Request::path() == 'admin/dashboard' ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{URL::to('/admin/registered_business')}}" class="nav-link {{ Request::path() == 'admin/registered_business' ? 'active' : '' }}">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Registered Business
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{URL::to('/admin/advertisement')}}" class="nav-link {{ Request::path() == 'admin/advertisement' ? 'active' : '' }}">
              <i class="nav-icon fas fa-tools"></i>
              <p>
                Advertisement
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{URL::to('/admin/user_registration_details')}}" class="nav-link {{ Request::path() == 'admin/user_registration_details' ? 'active' : '' }}">
              <i class="nav-icon fas fa-user"></i>
              <p>
                User Registration Details
              </p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="{{URL::to('/admin/country')}}" class="nav-link  {{ Request::path() == 'admin/country' ? 'active' : '' }}">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Country
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{URL::to('/admin/state')}}" class="nav-link {{ Request::path() == 'admin/state' ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                State
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{URL::to('/admin/city')}}" class="nav-link {{ Request::path() == 'admin/city' ? 'active' : '' }}">
              <i class="nav-icon fas fa-columns"></i>
              <p>
                City
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{URL::to('/admin/business_category')}}" class="nav-link {{ Request::path() == 'admin/business_category' ? 'active' : '' }}">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Business Category
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>