<div class="container-fluid page-body-wrapper">
     <!-- partial:partials/_navbar.html -->
     <nav class="navbar p-0 fixed-top d-flex flex-row">
          <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
               <a class="" href="index.html"><img width="50" src="images/logo.png" alt="logo" /></a>
          </div>
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
               <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item dropdown">
                         <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                              <div class="navbar-profile">
                                   <p class="mb-0 d-none d-sm-block navbar-profile-name">{{ Auth::user()->name }}</p>
                                   <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                              </div>
                         </a>
                         <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                              <a class="dropdown-item preview-item" href="{{ route('profile.show') }}">
                                   <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                             <i class="mdi mdi-account text-success"></i>
                                        </div>
                                   </div>
                                   <div class="preview-item-content">
                                        <p class="preview-subject mb-1">Profile</p>
                                   </div>
                              </a>

                              <div class="dropdown-divider"></div>
                              <div class="dropdown-divider"></div>

                              <div class="dropdown-item preview-item">
                                   <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                             <i class="mdi mdi-logout text-danger"></i>
                                        </div>
                                   </div>
                                   <div class="preview-item-content">
                                        <p class="preview-subject mb-1">
                                        <form method="POST" action="{{ route('logout') }}">
                                             @csrf
                                             <input class="btn btn-outline m-0 p-0" type="submit" value="Logout">
                                        </form>
                                        </p>
                                   </div>
                              </div>
                         </div>
                    </li>
               </ul>
               <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="mdi mdi-format-line-spacing"></span>
               </button>
          </div>
     </nav>
