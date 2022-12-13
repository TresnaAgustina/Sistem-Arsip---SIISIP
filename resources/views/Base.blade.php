<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
      {{-- bootstrap css and js --}}
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
      {{-- SB Admin css and js --}}
      <link rel="stylesheet" href="{{ asset('sbadmin/css/sb-admin-2.min.css') }}">
      <script src="{{ asset('sbadmin/js/sb-admin-2.min.js') }}"></script>
      {{-- font awesome --}}
      <script src="https://kit.fontawesome.com/199bad1da3.js" crossorigin="anonymous"></script>
      {{-- Box icons --}}
      <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
      <title>{{ config('app.name', 'Sistem Arsip') }}</title>
      <style>
        .global-wrapper{
            width: 100%;
            height: 100vh;
            display: flex;
        }
        .sidebar{
            width: 13.5rem !important;
        }
        .main-content-wrapper{
            width: 100%;
        }
        @media (min-width: 768px){
            .nav{
                padding: 0 4rem;
            }
        }
        @media (max-width: 768px){
            #accordionSidebar.show{
                display: none;
            }
        }
      </style>
</head>
<body width="100%" height="100vh">
      <div id="app" class="global-wrapper">
            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion show h-100" id="accordionSidebar">
    
                  <!-- Sidebar - Brand -->
                  <a class="sidebar-brand d-flex align-items-center justify-content-center bg-white p-1"  href="{{ url('/') }}">
                      <div class="sidebar-brand-icon">
                        <img src="{{ asset('assets/img/img/logo.png') }}" width="50" alt="">
                          {{-- <i class="fas fa-laugh-wink"></i> --}}
                      </div>
                      <div class="sidebar-brand-text mx-3 text-primary">SIISIP <sup>v1.0</sup></div>
                  </a>
      
                  <!-- Divider -->
                  <hr class="sidebar-divider my-0">
      
                  <!-- Nav Item - Dashboard -->
                  <li class="nav-item active">
                      <a class="nav-link" href="{{ url('/') }}">
                          <i class="fas fa-fw fa-tachometer-alt"></i>
                          <span>Dashboard</span></a>
                  </li>
      
                  <!-- Divider -->
                  <hr class="sidebar-divider">
      
                  <!-- Heading -->
                  <div class="sidebar-heading">
                      Main Menu
                  </div>
      
                  <!-- Nav Item - Pages Collapse Menu -->
                  <li class="nav-item">
                      <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                          aria-expanded="true" aria-controls="collapseTwo">
                          <i class='bx bxs-folder-open'></i>
                          <span>Arsip Dokumen</span>
                          <i class='bx bx-chevron-right fs-5' ></i>
                      </a>
                      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionSidebar">
                          <div class="bg-white py-2 collapse-inner rounded">
                              <h6 class="collapse-header">Arsip Dokumen</h6>
                              <a class="collapse-item" href="{{ url('/document_data') }}">Semua Data</a>
                              <a class="collapse-item" href="{{ url('/document_add') }}">Input Data</a>
                          </div>
                      </div>
                  </li>

                  <!-- Nav Item - BSI Collapse Menu -->
                  <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseThree"
                        aria-expanded="true" aria-controls="collapseThree">
                        <i class='bx bx-wifi' ></i>
                        <span>Pendataan BSI</span>
                        <i class='bx bx-chevron-right fs-5' ></i>
                    </a>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-bs-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Pencatatan BSI</h6>
                            <a class="collapse-item" href="{{ url('/bsi_data') }}">Semua Data</a>
                            <a class="collapse-item" href="{{ url('/bsi_add') }}">Input Data</a>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - CCTV Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsefour"
                        aria-expanded="true" aria-controls="collapsefour">
                        <i class='bx bxs-cctv' ></i>
                        <span>Pendataan CCTV</span>
                        <i class='bx bx-chevron-right fs-5' ></i>
                    </a>
                    <div id="collapsefour" class="collapse" aria-labelledby="headingThree" data-bs-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Pencatatan CCTV</h6>
                            <a class="collapse-item" href="buttons.html">Semua Data</a>
                            <a class="collapse-item" href="cards.html">Input Data</a>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Videotron Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseFive"
                        aria-expanded="true" aria-controls="collapseFive">
                        <i class='bx bxs-tv' ></i>
                        <span>Pendataan Videotron</span>
                        <i class='bx bx-chevron-right fs-5' ></i>
                    </a>
                    <div id="collapseFive" class="collapse" aria-labelledby="headingThree" data-bs-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Pencatatan Videotron</h6>
                            <a class="collapse-item" href="buttons.html">Semua Data</a>
                            <a class="collapse-item" href="cards.html">Input Data</a>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Intranet Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseSix"
                        aria-expanded="true" aria-controls="collapseSix">
                        <i class='bx bxs-network-chart' ></i>
                        <span>Pendataan Intranet</span>
                        <i class='bx bx-chevron-right fs-5' ></i>
                    </a>
                    <div id="collapseSix" class="collapse" aria-labelledby="headingThree" data-bs-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Pencatatan Intranet</h6>
                            <a class="collapse-item" href="buttons.html">Semua Data</a>
                            <a class="collapse-item" href="cards.html">Input Data</a>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Server Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseSeven"
                        aria-expanded="true" aria-controls="collapseSeven">
                        <i class='bx bxs-server'></i>
                        <span>Pendataan Server</span>
                        <i class='bx bx-chevron-right fs-5' ></i>
                    </a>
                    <div id="collapseSeven" class="collapse" aria-labelledby="headingThree" data-bs-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Pencatatan Server</h6>
                            <a class="collapse-item" href="buttons.html">Semua Data</a>
                            <a class="collapse-item" href="cards.html">Input Data</a>
                        </div>
                    </div>
                </li>
      
                  <!-- Nav Item - Utilities Collapse Menu -->
                  {{-- <li class="nav-item">
                      <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseUtilities"
                          aria-expanded="false" aria-controls="collapseUtilities">
                          <i class="fas fa-fw fa-wrench"></i>
                          <span>Utilities</span>
                      </a>
                      <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                          data-parent="#accordionSidebar">
                          <div class="bg-white py-2 collapse-inner rounded">
                              <h6 class="collapse-header">Custom Utilities:</h6>
                              <a class="collapse-item" href="utilities-color.html">Colors</a>
                              <a class="collapse-item" href="utilities-border.html">Borders</a>
                              <a class="collapse-item" href="utilities-animation.html">Animations</a>
                              <a class="collapse-item" href="utilities-other.html">Other</a>
                          </div>
                      </div>
                  </li> --}}
      
                  <!-- Divider -->
                  <hr class="sidebar-divider">
      
                  <!-- Heading -->
                  <div class="sidebar-heading">
                      Addons
                  </div>
      
                  <!-- Nav Item - Pages Collapse Menu -->
                  <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <i class="fas fa-fw fa-folder"></i>
                            <span>Pages</span>
                        </a>
                        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Login Screens:</h6>
                                <a class="collapse-item" href="login.html">Login</a>
                                <a class="collapse-item" href="register.html">Register</a>
                                <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                                <div class="collapse-divider"></div>
                                <h6 class="collapse-header">Other Pages:</h6>
                                <a class="collapse-item" href="404.html">404 Page</a>
                                <a class="collapse-item" href="blank.html">Blank Page</a>
                            </div>
                        </div>
                  </li>
      
                  <!-- Nav Item - Charts -->
                  <li class="nav-item">
                      <a class="nav-link" href="charts.html">
                          <i class="fas fa-fw fa-chart-area"></i>
                          <span>Charts</span></a>
                  </li>
      
                  <!-- Nav Item - Tables -->
                  <li class="nav-item">
                      <a class="nav-link" href="tables.html">
                          <i class="fas fa-fw fa-table"></i>
                          <span>Tables</span></a>
                  </li>
      
                  <!-- Divider -->
                  {{-- <hr class="sidebar-divider d-none d-md-block"> --}}
      
              </ul>
              <!-- End of Sidebar -->

               
            <main class="main-content-wrapper">
                  <!-- Topbar -->
               <nav class="navbar nav navbar-expand navbar-light bg-white topbar mb-4 sticky-top top-0 shadow">
    
                  <!-- Sidebar Toggle (Topbar) -->
                  <button id="sidebarToggleTop" onclick="navToggle()" class="btn btn-link d-md-none rounded-circle mr-3">
                      <i class="fa fa-bars"></i>
                  </button>

                  <!-- Topbar Search -->
                  <form action="{{ url('/search') }}" method="POST" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                      <div class="input-group">
                          <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                              aria-label="Search" aria-describedby="basic-addon2">
                          <div class="input-group-append">
                              <button class="btn btn-primary" type="button">
                                  <i class="fas fa-search fa-sm"></i>
                              </button>
                          </div>
                      </div>
                  </form>

                  <!-- Topbar Navbar -->
                  <ul class="navbar-nav ml-auto">
                      <!-- Nav Item - User Information -->
                      <li class="nav-item dropdown no-arrow">
                          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                              data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->username }}</span>
                              <img class="img-profile rounded-circle w-auto object-fit-cover"
                                  src="{{ asset('assets/img/img/profile.png') }}">
                          </a>
                          <!-- Dropdown - User Information -->
                          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                              aria-labelledby="userDropdown">
                              <a class="dropdown-item" href="#">
                                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                  Profile
                              </a>
                              <a class="dropdown-item" href="#">
                                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                  Settings
                              </a>
                              <a class="dropdown-item" href="#">
                                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                  Activity Log
                              </a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                  Logout
                              </a>
                            </div>
                      </li>
                  </ul>
              </nav>
              <!-- End of Topbar -->

                 <div class="content w-100%">
                    @if (Auth::check())
                        @yield('Content')
                    @endif
                 </div>

            </main>
      </div>

      

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Diskominfo 2022</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                <form action="{{ url('/logout') }}" method="post">
                    @csrf      
                    <button class="btn btn-danger" type="submit">Logout</button> 
                </form>

            </div>
        </div>
    </div>  

<script>
    function navToggle() {
      document.getElementById("accordionSidebar").classList.toggle("show");
}
</script>
</body>
</html>