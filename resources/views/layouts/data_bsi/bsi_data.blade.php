@extends('Base')

@section('Content')
    <section>
        <!-- Begin Page Content -->
                <div class="container-fluid">

                    {{-- error message --}}
                    @if(session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Warning!</strong> {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    {{-- /error message --}}    

                    <!-- Page Heading -->
                    <div class="heading-group d-flex align-items-center justify-content-between gap-3 mb-2 w-100%">
                        <h1 class="h3 m-0 text-gray-800">Tabel Data Arsip Dokumen</h1>
                        <a href="{{ url('/document_add') }}" class="btn btn-info">Tambah Data <i class='bx bxs-file-plus '></i></a>
                    </div>
  
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Arsip Dokumen</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                     <thead>
                                        <tr>
                                            <th rowspan="2" class="text-center align-middle">Kategori</th>
                                            <th rowspan="2" class="text-center align-middle">Kabupaten</th>
                                            <th rowspan="2" class="text-center align-middle">Kecamatan</th>
                                            <th rowspan="2" class="text-center align-middle">Desa</th>
                                            <th rowspan="2" class="text-center align-middle">Desa Pekraman</th>
                                            <th rowspan="2" class="text-center align-middle">Data Lokasi</th>
                                            <th rowspan="2" class="text-center align-middle">Media</th>
                                            <th rowspan="2" class="text-center align-middle">Layanan</th>
                                            <th rowspan="2" class="text-center align-middle">Lokasi</th>
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
                                          @foreach ($bsi as $item)
                                                <tr>
                                                      <td class="py-3 px-2">Lorem ipsum dolor sit amet.</td>
                                                      <td class="py-3 px-2">Lorem ipsum dolor sit amet.</td>
                                                      <td class="py-3 px-2">Lorem ipsum dolor sit amet.</td>
                                                      <td class="py-3 px-2">Lorem ipsum dolor sit amet.</td>
                                                      <td class="py-3 px-2">Lorem ipsum dolor sit amet.</td>
                                                      <td class="py-3 px-2">Lorem ipsum dolor sit amet.</td>
                                                      <td class="py-3 px-2">Lorem ipsum dolor sit amet.</td>
                                                      <td class="py-3 px-2">Lorem ipsum dolor sit amet.</td>
                                                      <td class="py-3 px-2">Lorem ipsum dolor sit amet.</td>
                                                      <td class="py-3 px-2">Lorem ipsum dolor sit amet.</td>
                                                      <td class="py-3 px-2">Lorem ipsum dolor sit amet.</td>
                                                      <td class="py-3 px-2">Lorem ipsum dolor sit amet.</td>
                                                      <td class="py-3 px-2">Lorem ipsum dolor sit amet.</td>
                                                      <td class="py-3 px-2">
                                                          {{-- <a href="#" class="btn btn-info btn_detail m-1" target="blank"><i class='bx bxs-info-circle'></i></a> --}}
                                                          <a href="{{ url('/bsi_edit/') }}" class="btn btn-success btn_edit m-1"><i class='bx bxs-edit' ></i></a>
                                                          {{-- <hr class="sidebar-divider"> --}}
                                                          <a href="{{ url('/bsi_destroy/') }}" class="btn btn-danger btn_delete m-1" onclick="return confirm('Are you sure you want to delete this?')"><i class='bx bxs-trash'></i></a>
                                                      </td>
                                                </tr>
                                          @endforeach
                                    </tbody>
                                </table>
                                <div class="pagination-wrapper">
                                    {{-- pagination link --}}
                                    {{-- {{ $bsi->onEachSide(5)->links() }} --}}
                                </div>
                            </div>
                        </div>
                    </div>
  
                </div>
                <!-- /.container-fluid -->
  
            </div>
            <!-- End of Main Content -->
    </section>
@endsection