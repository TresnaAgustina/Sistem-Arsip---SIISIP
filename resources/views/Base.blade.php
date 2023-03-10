<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link rel="icon" href="https://aptika.kominfo.go.id/wp-content/uploads/2018/10/cropped-cropped-logo-kominfo.png">
      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
      {{-- bootstrap css --}}
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
      {{-- SB Admin css --}}
      <link rel="stylesheet" href="{{ asset('sbadmin/css/sb-admin-2.min.css') }}">
      {{-- font awesome --}}
      <script src="https://kit.fontawesome.com/199bad1da3.js" crossorigin="anonymous"></script>
      {{-- Box icons --}}
      <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
      {{-- datatables css --}}
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">

      <title>{{ config('app.name', 'Sistem Arsip') }}</title>
      <style>
        .global-wrapper{
            width: 100%;
            height: 100vh;
            display: flex;
        }
        .sidebar{
            display: none;
            z-index: 100 !important;
        }

        .sidebar.show{
            display: block;
        }

        .main-content-wrapper{
            width: 100%;
        }
        .sidebar.toggled{
            display: none;
        }
        .topbar #sidebarToggleTop {
            width: 3rem;
            height: 3rem;
            padding: 0;
            marin: 0;
        }
        @media (min-width: 768px){
            .nav{
                padding: 0 4rem;
            }
        }

        /* kolom catatan */
        .catatan{
            word-wrap: break-word !important; 
        }
      </style>

</head>
<body width="100%" height="100vh">
      <div id="app" class="global-wrapper">
            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion show sticky sticky-left"  id="accordionSidebar">
    
                  <!-- Sidebar - Brand -->
                  <a class="sidebar-brand d-flex align-items-center justify-content-center bg-white p-1"  href="{{ url('/') }}">
                      <div class="sidebar-brand-icon">
                        <img src="{{ asset('assets/img/img/logo.png') }}" width="50" loading="lazy" alt="">
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
                      Arsip Dokumen
                  </div>
      
                  <!-- Nav Item - Pages Collapse Menu -->
                  <li class="nav-item">
                      <a class="nav-link collapsed d-flex" href="#" data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                          aria-expanded="true" aria-controls="collapseTwo">
                          <i class='bx bxs-folder-open'></i>
                          <span>Arsip Dokumen</span>
                          <i class='bx bx-chevron-right fs-5' ></i>
                      </a>
                      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionSidebar">
                          <div class="bg-white py-2 collapse-inner rounded">
                              <h6 class="collapse-header">Arsip Dokumen</h6>
                              <a class="collapse-item" href="{{ url('/document') }}">Semua Data</a>
                              <a class="collapse-item" href="{{ url('/document/add') }}">Input Data</a>
                          </div>
                      </div>
                  </li>

                <!-- Divider -->
                <hr class="sidebar-divider">
      
                <!-- Heading -->
                <div class="sidebar-heading">
                    Pendataan Infrastruktur
                </div>

                  <!-- Nav Item - BSI Collapse Menu -->
                  <li class="nav-item">
                    <a class="nav-link collapsed d-flex" href="#" data-bs-toggle="collapse" data-bs-target="#collapseThree"
                        aria-expanded="true" aria-controls="collapseThree">
                        <i class='bx bx-wifi' ></i>
                        <span>Data BSI</span>
                        <i class='bx bx-chevron-right fs-5' ></i>
                    </a>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-bs-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Pencatatan BSI</h6>
                            <a class="collapse-item" href="{{ url('/bsi') }}">Semua Data</a>
                            <a class="collapse-item" href="{{ url('/bsi/add') }}">Input Data</a>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - CCTV Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed align-center d-flex" href="#" data-bs-toggle="collapse" data-bs-target="#collapsefour"
                        aria-expanded="true" aria-controls="collapsefour">
                        <i class='bx bxs-notepad'></i>
                        <span>Data Infrastruktur</span>
                        <i class='bx bx-chevron-right fs-5' ></i>
                    </a>
                    <div id="collapsefour" class="collapse" aria-labelledby="headingThree" data-bs-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Pencatatan</h6>
                            <a class="collapse-item" href="{{ url('/infrastructure') }}">Semua Data</a>
                            <a class="collapse-item" href="{{ url('/infrastructure/add') }}">Input Data</a>
                        </div>
                    </div>
                </li>
              </ul>
              <!-- End of Sidebar -->

               
            <main class="main-content-wrapper overflow-scroll">
                  <!-- Topbar -->
               <nav class="navbar nav navbar-expand navbar-light bg-white topbar mb-4 sticky-top top-0 shadow">
    
                  <!-- Sidebar Toggle (Topbar) -->
                  <button id="sidebarToggleTop" onclick="navToggle()" class="btn btn-link  rounded-circle">
                      <i class="fa fa-bars fs-4 m-0 p-0"></i>
                  </button>

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

      

      

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">??</span>
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
    


    {{-- Jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
    {{-- script datatables --}}
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.13.1/datatables.min.js"></script>
    {{-- bootstrap js --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    {{-- sbadmin js --}}
    <script src="{{ asset('sbadmin/js/sb-admin-2.min.js') }}"></script>
    {{-- chart js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

    {{-- custom js --}}
    <script>
        // datatables
        $(document).ready(function () {
            $('#dataTable').DataTable();
        });
        // function for sidebar
        function navToggle() {
        document.getElementById("accordionSidebar").classList.toggle("show");
    }
    </script>

    @stack('scripts')
</body>
</html>