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
                        <h1 class="h3 m-0 text-gray-800">Tabel Pendataan Infrastruktur</h1>
                        <div class="button-group d-flex w-auto gap-2">
                            <a href="{{ url('/infra/add') }}" class="btn btn-info">Tambah Data <i class='bx bxs-file-plus '></i></a>
                            <form method="GET" action="{{ url('/document/exportExcel') }}">
                                @csrf
                                <button type="submit" class="btn btn-success">Ekspor Data <i class='bx bxs-file-export fs-5 align-top'></i> </button>
                            </form>
                            {{-- <a href="{{ url('/bsi_export') }}" class="btn btn-success p-3"></a> --}}
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
                              <table class="table table-bordered nowrap" id="dataTable" width="100%" cellspacing="0">
                                   <thead>
                                      <tr>
                                          <th rowspan="2" class="text-center align-middle">Kategori</th>
                                          <th rowspan="2" class="text-center align-middle">Nama</th>
                                          <th rowspan="2" class="text-center align-middle">Tahun Pengadaan</th>
                                          <th rowspan="2" class="text-center align-middle">Penyedia</th>
                                          <th rowspan="2" class="text-center align-middle">Lokasi</th>
                                          <th colspan="2" class="text-center text-center">kordinat</th>
                                          <th rowspan="2" class="text-center align-middle">Detail</th>
                                          <th rowspan="2" class="text-center align-middle">Catatan</th>
                                          <th rowspan="2" class="text-center align-middle">Action</th>
                                      </tr>
                                      <tr>
                                          <th class="text-center">Latitude</th>
                                          <th class="text-center">Longitude</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                          @if ($infra->isEmpty())
                                              <tr>
                                                  <td colspan="15" class="text-center fs-4">Data Is Empty</td>
                                              </tr>
                                          @endif
                                          @foreach ($infra as $item)
                                                  <tr>
                                                      <td class="py-3 px-2 align-middle">{{ $item-> kategori }}</td>
                                                      <td class="py-3 px-2 align-middle">{{ $item-> nama }}</td>
                                                      <td class="py-3 px-2 align-middle">{{ $item-> tahun_pengadaan }}</td>
                                                      <td class="py-3 px-2 align-middle">{{ $item-> penyedia }}</td>
                                                      <td class="py-3 px-2 align-middle">{{ $item-> lokasi }}</td>
                                                      <td class="py-3 px-2 align-middle">{{ $item-> latitude }}</td>
                                                      <td class="py-3 px-2 align-middle">{{ $item-> longitude }}</td>
                                                      <td class="py-3 px-2 align-middle">
                                                        {{-- <img src="{{ asset('storage/'.$item-> detail) }}" alt="Img"> --}}
                                                        <iframe src="{{ asset('storage/'.$item-> detail) }}" frameborder="0" width="auto" height="auto"></iframe>
                                                      </td>
                                                      <td class="py-3 px-2 align-middle">{{ $item-> catatan }}</td>
                                                      <td class="py-3 px-2 text-center align-middle">
                                                          <a href="{{ url('/infra/detail') }}" class="btn btn-info btn_detail m-1" target="blank"><i class='bx bxs-info-circle'></i></a>
                                                          {{-- <a href="#" class="btn btn-info btn_detail m-1" target="blank"><i class='bx bxs-info-circle'></i></a> --}}
                                                          <a href="{{ url('/infra/edit/'.$item-> id) }}" class="btn btn-success btn_edit m-1"><i class='bx bxs-edit' ></i></a>
                                                          {{-- <hr class="sidebar-divider"> --}} 
                                                          <a href="{{ url('/infra/destroy/'.$item-> id) }}" class="btn btn-danger btn_delete m-1" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class='bx bxs-trash'></i></a>
                                                      </td>
                                                  </tr>
                                          @endforeach
                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
                      {{-- pagination link --}}
                      {{-- <nav aria-label="Page navigation">
                          <ul class="pagination  pagination-sm">
                              {{ $infra->onEachSide(5)->links() }}
                          </ul>
                      </nav> --}}
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