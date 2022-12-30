@extends('Base')

@section('Content')

    <section>
        <!-- Begin Page Content -->
                <div class="container-fluid">
                    {{-- error message --}}
                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Warning!</strong> {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    {{-- /error message --}}    
                    
                  {{-- Success message --}}
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    {{-- end success meesage --}}    

                    <!-- Page Heading -->
                    <div class="heading-group d-flex align-items-center justify-content-between gap-3 mb-2 w-100%">
                        <h1 class="h3 m-0 text-gray-800">Tabel Pendataan Bali Smart Island</h1>
                        <div class="button-group d-flex w-auto gap-2 justify-content-center align-items-center">
                            {{-- add data --}}
                            <a href="{{ url('/bsi/add') }}" class=""><button class="btn btn-primary">Tambah Data <i class='bx bxs-file-plus '></i></button></a>
                            {{-- export excel --}}
                            <form method="GET" action="{{ url('/bsi/exportExcel') }}" class=" m-0">
                                @csrf
                                <button type="submit" class="btn btn-success">Ekspor Excel <i class='bx bxs-file-export fs-5 align-top'></i> </button>
                            </form>
                        </div>
                    </div>
  
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="header-group d-flex align-items-center justify-content-between card-header">
                            <div class="py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Data BSI</h6>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered nowrap" id="dataTable" width="100%" cellspacing="0">
                                     <thead class="table-dark">
                                        <tr>
                                            <th rowspan="2" class="text-center align-middle">No</th>
                                            <th rowspan="2" class="text-center align-middle">Kategori</th>
                                            <th rowspan="2" class="text-center align-middle">Kabupaten</th>
                                            <th rowspan="2" class="text-center align-middle">Kecamatan</th>
                                            <th rowspan="2" class="text-center align-middle">Desa</th>
                                            <th rowspan="2" class="text-center align-middle">Desa Pekraman</th>
                                            <th rowspan="2" class="text-center align-middle">Data Lokasi</th>
                                            <th rowspan="2" class="text-center align-middle">Media</th>
                                            <th rowspan="2" class="text-center align-middle">Layanan</th>
                                            <th rowspan="2" class="text-center align-middle">Lokasi Terpasang</th>
                                            <th colspan="2" class="text-center text-center">kordinat</th>
                                            <th rowspan="2" class="text-center align-middle">Nama PIC</th>
                                            <th rowspan="2" class="text-center align-middle">Nomor Tlp.</th>
                                            <th rowspan="2" class="text-center align-middle">Action</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center">Latitude</th>
                                            <th class="text-center">Longitude</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            @if ($bsi->isEmpty())
                                                <tr>
                                                    <td colspan="15" class="text-center fs-4">Data Is Empty</td>
                                                </tr>
                                            @endif
                                            @foreach ($bsi as $index => $item)
                                                <tr>
                                                    <td class="px-3 align-middle">{{ $index + 1 }}</td>
                                                    <td class="px-3 align-middle">{{ $item-> kategori }}</td>
                                                    <td class="px-3 align-middle">{{ $item-> kabupaten }}</td>
                                                    <td class="px-3 align-middle">{{ $item-> kecamatan }}</td>
                                                    <td class="px-3 align-middle">{{ $item-> desa }}</td>
                                                    <td class="px-3 align-middle">{{ $item-> desa_pekraman }}</td>
                                                    <td class="px-3 align-middle">{{ $item-> data_lokasi }}</td>
                                                    <td class="px-3 align-middle">{{ $item-> media }}</td>
                                                    <td class="px-3 align-middle">{{ $item-> layanan }}</td>
                                                    <td class="px-3 align-middle">{{ $item-> lokasi }}</td>
                                                    <td class="px-3 align-middle">{{ $item-> latitude }}</td>
                                                    <td class="px-3 align-middle">{{ $item-> longitude }}</td>
                                                    <td class="px-3 align-middle">{{ $item-> nama_pic }}</td>
                                                    <td class="px-3 align-middle">{{ $item-> nomor_tlp }}</td>
                                                    <td class="px-3 text-center align-middle">
                                                        {{-- button edit --}}
                                                        <a href="{{ url('/bsi/edit/'.$item-> id) }}" class="btn btn-success btn_edit m-1"><i class='bx bxs-edit' ></i></a>
                                                        {{-- button delete --}}
                                                        <form action="{{ url('/bsi/destroy/'.$item-> id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                            <button type="submit" class="btn btn-danger btn_delete m-1" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class='bx bxs-trash'></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
    </section>

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