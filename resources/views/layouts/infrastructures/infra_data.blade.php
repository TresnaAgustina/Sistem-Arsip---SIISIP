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
            <h1 class="h3 m-0 text-gray-800">Tabel Pendataan Infrastruktur</h1>
            <div class="button-group d-flex w-auto gap-2">
                <a href="{{ url('/infrastructure/add') }}" class="btn btn-info">Tambah Data <i class='bx bxs-file-plus '></i></a>
                <form method="GET" action="{{ url('/infra/exportExcel') }}">
                    @csrf
                    <button type="submit" class="btn btn-success">Ekspor Data <i class='bx bxs-file-export fs-5 align-top'></i> </button>
                </form>
            </div>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Pendataan Infrastruktur</h6>
                </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered nowrap table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                            <tr>
                                <th rowspan="2" class="text-center align-middle">No</th>
                                <th rowspan="2" class="text-center align-middle">Kategori</th>
                                <th rowspan="2" class="text-center align-middle">Nama</th>
                                <th rowspan="2" class="text-center align-middle">Tahun Pengadaan</th>
                                <th rowspan="2" class="text-center align-middle">Penyedia</th>
                                <th rowspan="2" class="text-center align-middle">Lokasi</th>
                                <th colspan="2" class="text-center text-center">kordinat</th>
                                <th rowspan="2" class="text-center align-middle">Catatan</th>
                                <th rowspan="2" class="text-center align-middle">Detail</th>
                                <th colspan="2" class="text-center align-middle">Action</th>
                            </tr>
                            <tr>
                                <th class="text-center">Latitude</th>
                                <th class="text-center">Longitude</th>
                                <th class="text-center">edit</th>
                                <th class="text-center">delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($infra->isEmpty())
                            <tr>
                                <td colspan="15" class="text-center fs-4">Data Is Empty</td>
                            </tr>
                            @endif
                            @foreach ($infra as $no => $item)
                                <tr>
                                    <td class="px-3 text-center align-middle">{{ $no + 1 }}</td>
                                        <td class="px-3 align-middle">{{ $item-> kategori }}</td>
                                        <td class="px-3 align-middle">{{ $item-> nama }}</td>
                                        <td class="px-3 align-middle">{{ $item-> tahun_pengadaan }}</td>
                                        <td class="px-3 align-middle">{{ $item-> penyedia }}</td>
                                        <td class="px-3 align-middle">{{ $item-> lokasi }}</td>
                                        <td class="px-3 align-middle">{{ $item-> latitude }}</td>
                                        <td class="px-3 align-middle">{{ $item-> longitude }}</td>
                                        <td class="px-3 text-break" style="min-width: 20rem;">{{ $item-> catatan }}</td>
                                        <td class="px-3 text-center align-middle">
                                            {{-- button detail --}}
                                            <a href="{{ url('/infrastructure/'.$item-> id.'/detail') }}" class="btn btn-info btn_detail m-1" ><i class='bx bxs-info-circle'></i></a>
                                        </td>
                                        <td>
                                            {{-- button edit --}}
                                            <a href="{{ url('/infrastructure/'.$item-> id.'/edit') }}" class="btn btn-success btn_edit m-1"><i class='bx bxs-edit' ></i></a>
                                        </td>
                                        <td class="px-3 text-center align-middle">
                                            {{-- button delete --}}
                                            <form action="{{ url('/infrastructure/'.$item-> id.'/destroy') }}" method="post" class="d-inline">
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

