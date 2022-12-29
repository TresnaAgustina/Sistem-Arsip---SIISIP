@extends('Base')


@push('scripts')
    <script>
        // piechart
        var ctx = document.getElementById('pieChart').getContext('2d');
        var pieChart = new Chart(ctx, {
            type: 'pie',
            data: {
            labels: {!! json_encode($data['labels']) !!},
            datasets: [{
                data: {!! json_encode($data['values']) !!},
                backgroundColor: [ '#36A2EB', '#FF6384', '#7CB30E', '#36EDED', '#FFCE56', '#DB25C8'],
                borderWidth: 1
            }]
            },
            options: {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                position: 'bottom',
            },
            title: {
                display: true,
                text: 'Chart Total Data'
            }
            }
        });

        // Bar Chart
        var ctx = document.getElementById('BarChart').getContext('2d');
        var uploadChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($doc->pluck('date')) !!},
                datasets: [{
                    label: 'Dokumen',
                    data: {!! json_encode($doc->pluck('count')) !!},
                    backgroundColor: '#36A2EB'
                },
                {
                    label: 'Bali Smart Island',
                    data: {!! json_encode($bsi->pluck('count')) !!},
                    backgroundColor: '#FF6384'
                },
                {
                    label: 'Infrastruktur',
                    data: {!! json_encode($infra->pluck('count')) !!},
                    backgroundColor: '#FFCE56'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
@endpush

@section('Content')
    <!-- Page Wrapper -->
    <div id="wrapper">
    
            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
    
                <!-- Main Content -->
                <div id="content">
    
                   
    
                    <!-- Begin Page Content -->
                    <div class="container-fluid">
    
                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        </div>
    
                        <!-- Content Row -->
                        <div class="row">
                            <!-- Document Archive Card -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="fs-5 font-weight-bold text-primary text-uppercase mb-1">
                                                    Arsip Dokumen</div>
                                                    {{-- @foreach ($countBsi as $item) --}}
                                                        <div class="h6 mb-0 font-weight-medium text-gray-800">Total Data: <b>{{ $doc_count }}</b></div>
                                                    {{-- @endforeach --}}
                                            </div>
                                            <div class="col-auto">
                                                <i class='bx bxs-folder-open text-gray-400 fa-3x'></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                             <!-- Bali Smart Island Card -->
                             <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-danger shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="fs-5 font-weight-bold text-danger text-uppercase mb-1">
                                                    Bali Smart Island</div>
                                                <div class="h6 mb-0 font-weight-medium text-gray-800">Total Data: <b>{{ $bsi_count }}</b></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class='bx bx-wifi text-gray-400 fa-3x' ></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <!-- CCTV Card -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="fs-5 font-weight-bold text-success text-uppercase mb-1">
                                                    CCTV</div>
                                                <div class="h6 mb-0 font-weight-medium text-gray-800">Total Data: <b>{{ $cctv_count }}</b></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class='bx bxs-cctv text-gray-400 fa-3x' ></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Videotron Card -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="fs-5 font-weight-bold text-info text-uppercase mb-1">
                                                    Videotron</div>
                                                <div class="h6 mb-0 font-weight-medium text-gray-800">Total Data: <b>{{ $vidtron_count }}</b></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class='bx bxs-tv text-gray-400 fa-3x' ></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Intranet Card-->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="fs-4 font-weight-bold text-warning text-uppercase mb-1">
                                                    Intranet</div>
                                                <div class="h6 mb-0 font-weight-bold text-gray-800">Total Data: <b>{{ $intranet_count }}</b></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class='bx bxs-network-chart text-gray-400 fa-3x' ></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Server Card -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="fs-5 font-weight-bold text-primary text-uppercase mb-1">
                                                    Server</div>
                                                <div class="h6 mb-0 font-weight-medium text-gray-800">Total Data: <b>{{ $server_count }}</b></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class='bx bxs-server text-gray-400 fa-3x'></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
    
                        <!-- Content Row -->
    
                        <div class="row">
    
                            <!-- Area Chart -->
                            <div class="col-xl-8 col-lg-7">
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Dropdown -->
                                    <div
                                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Frekuensi Upload File</h6>
                                        <div class="dropdown no-arrow">
                                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                                aria-labelledby="dropdownMenuLink">
                                                <div class="dropdown-header">Dropdown Header:</div>
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <div class="chart-area">
                                            <canvas id="BarChart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <!-- Pie Chart -->
                            <div class="col-xl-4 col-lg-5">
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Dropdown -->
                                    <div
                                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Total Data</h6>
                                        <div class="dropdown no-arrow">
                                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                                aria-labelledby="dropdownMenuLink">
                                                <div class="dropdown-header">Dropdown Header:</div>
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <div class="chart-pie pt-4 my-3 pb-2">
                                            <canvas id="pieChart" width="500" height="200"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <!-- Content Row -->
                        <div class="row">
    
                    </div>
                    <!-- /.container-fluid -->
    
                </div>
                <!-- End of Main Content -->
    
            </div>
            <!-- End of Content Wrapper -->
    
        </div>
        <!-- End of Page Wrapper -->
    
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
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
@endsection
