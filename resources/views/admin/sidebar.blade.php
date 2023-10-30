<nav class="sidebar sidebar-offcanvas" id="sidebar">
     <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="" href="{{ url('/redirect') }}"><img width="150" src="images/logo.png" alt="logo" /></a>
     </div>
     <ul class="nav">
          <li class="nav-item profile">
               <div class="profile-desc">
                    <div class="profile-pic">
                         <div class="count-indicator">
                              <img class="img-xs rounded-circle " src="{{ asset('admin/assets/images/faces/face15.jpg') }}" alt="">
                              <span class="count bg-success"></span>
                         </div>
                         <div class="profile-name">
                              <h5 class="mb-0 font-weight-normal">{{ Auth::user()->name }}</h5>
                         </div>
                    </div>
                    <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
                    <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                         <a class="dropdown-item preview-item" href="{{ route('profile.show') }}">
                              <div class="preview-thumbnail">
                                   <div class="preview-icon bg-dark rounded-circle">
                                        <i class="mdi mdi-settings text-primary"></i>
                                   </div>
                              </div>
                              <div class="preview-item-content">
                                   <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                              </div>
                         </a>
                    </div>
               </div>
          </li>
          <li class="nav-item nav-category">
               <span class="nav-link">Navigation</span>
          </li>
          <!-- <li class="nav-item menu-items {{ Request::is('redirect') ? 'active' : '' }}">
               <a class="nav-link" href="{{ url('/redirect') }}">
                    <span class="menu-icon">
                         <i class="mdi mdi-speedometer"></i>
                    </span>
                    <span class="menu-title">Dashboard</span>
               </a>
          </li> -->
          <li class="nav-item menu-items {{ Request::is('view_product', 'show_product') ? 'active' : '' }}">
               <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                    <span class="menu-icon">
                         <i class="mdi mdi-laptop"></i>
                    </span>
                    <span class="menu-title">Products</span>
                    <i class="menu-arrow"></i>
               </a>
               <div class="collapse {{ Request::is('view_product', 'show_product') ? 'show' : '' }}" id="ui-basic">
                    <ul class="nav flex-column sub-menu">
                         <li class="nav-item"> <a class="nav-link" href="{{ url('/view_product') }}">Add Product</a></li>
                         <li class="nav-item"> <a class="nav-link" href="{{ url('/show_product') }}">Show Product</a></li>
                    </ul>
               </div>
          </li>
          <li class="nav-item menu-items {{ Request::is('view_catagory') ? 'active' : '' }}">
               <a class="nav-link" href="{{ url('view_catagory') }}">
                    <span class="menu-icon">
                         <i class="mdi mdi-playlist-play"></i>
                    </span>
                    <span class="menu-title">Catagory</span>
               </a>
          </li>
          <li class="nav-item menu-items {{ Request::is('orders', 'orders_detail/*') ? 'active' : '' }}">
               <a class="nav-link" href="{{ url('orders') }}">
                    <span class="menu-icon">
                         <i class="mdi mdi-table-large"></i>
                    </span>
                    <span class="menu-title">Order</span>
               </a>
          </li>
          <li class="nav-item menu-items {{ Request::is('view_perusahaan', 'show_perusahaan') ? 'active' : '' }}">
               <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                    <span class="menu-icon">
                         <i class="mdi mdi-contacts"></i>
                    </span>
                    <span class="menu-title">Perusahaan</span>
                    <i class="menu-arrow"></i>
               </a>
               <div class="collapse {{ Request::is('view_perusahaan', 'show_perusahaan') ? 'show' : '' }}" id="ui-basic">
                    <ul class="nav flex-column sub-menu">
                         <li class="nav-item"> <a class="nav-link" href="{{ url('/view_perusahaan') }}">Add Testimoni</a></li>
                         <li class="nav-item"> <a class="nav-link" href="{{ url('/show_perusahaan') }}">Show Testimoni</a></li>
                    </ul>
               </div>
          </li>
     </ul>
</nav>