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
                        <h1 class="h3 m-0 text-gray-800">Tabel Data Arsip Dokumen</h1>
                        <div class="button-group d-flex w-auto gap-2">
                            <a href="{{ url('/document/add') }}" class="btn btn-info">Tambah Data <i class='bx bxs-file-plus '></i></a>
                            <form method="GET" action="{{ url('/document/exportExcel') }}">
                                @csrf
                                <button type="submit" class="btn btn-success">Ekspor Data <i class='bx bxs-file-export fs-5 align-top'></i> </button>
                            </form>
                        </div>
                    </div>
  
                    <!-- card -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Arsip Dokumen</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                {{-- table documents --}}
                                <table class="table table-striped table-bordered nowrap" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="thead-dark">
                                       <tr>
                                            <th rowspan="2" class="text-center align-middle">No</th>
                                            <th rowspan="2" class="text-center align-middle">No.Surat</th>
                                            <th rowspan="2" class="text-center align-middle">Tanggal</th>
                                            <th rowspan="2" class="text-center align-middle">Kategori</th>
                                            <th rowspan="2" class="text-center align-middle">Judul</th>
                                            <th rowspan="2" class="text-center align-middle">Uraian</th>
                                            <th rowspan="2" class="text-center align-middle">Detail</th>
                                            <th colspan="2" class="text-center align-middle">Action</th>
                                       </tr>
                                       <tr>
                                            <th class="text-center">edit</th>
                                            <th class="text-center">delete</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                            @if ($documents->isEmpty())
                                                <tr>
                                                    <td colspan="9" class="text-center fs-4">Data Is Empty</td>
                                                </tr>
                                            @endif
                                            @foreach ($documents as $index => $item)
                                                    <tr>
                                                        <td class="text-center align-middle">{{ $index + 1 }}</td>
                                                        <td class="px-3 align-middle" style="">{{ $item->no_surat }}</td>
                                                        <td class="px-3 align-middle" style="">{{ $item->tanggal }}</td>
                                                        <td class="px-3 align-middle" style="">{{ $item->kategori }}</td>
                                                        <td class="px-3 align-middle" style="">{{ $item->judul }}</td>
                                                        <td class="px-3 align-middle" style="">{{ $item->uraian }}</td>
                                                        <td class="px-3 align-middle text-center">
                                                            <a href="{{ $item->link_file }}" class="btn btn-info btn_detail m-1" target="blank"><i class='bx bxs-info-circle'></i></a>
                                                        </td>
                                                        <td class="px-3 align-middle text-center">
                                                            <a href="{{ url('/document/edit/'.$item-> id) }}" class="btn btn-success btn_edit m-1"><i class='bx bxs-edit' ></i></a>
                                                        </td>
                                                        <td class="px-3 text-center align-middle">
                                                            <form action="{{ url('/document/destroy/'.$item-> id) }}" method="POST" class="d-inline">
                                                                @csrf
                                                                <button type="submit" class="btn btn-danger btn_delete m-1" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class='bx bxs-trash'></i></button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                            @endforeach
                                    </tbody>
                                </table>
                                {{-- end table --}}
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
