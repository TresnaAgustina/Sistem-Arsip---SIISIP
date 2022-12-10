@extends('Base')

@section('Content')
    <section>
        <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="heading-group d-flex align-items-center justify-content-between gap-3 mb-2 w-100%">
                        <h1 class="h3 m-0 text-gray-800">Tabel Data Arsip Dokumen</h1>
                        <a href="{{ url('/document_add') }}" class="btn btn-info">Tambah <i class='bx bxs-file-plus '></i></a>
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
                                            <th>No.Surat</th>
                                            <th>Tanggal</th>
                                            <th>Kategori</th>
                                            <th>Judul</th>
                                            <th>Uraian</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($documents as $item)
                                            <tr>
                                                <td class="py-3 px-2" style="width:20px">{{ $item-> no_surat }}</td>
                                                <td class="py-3 px-2" style="width:5%">{{ $item-> tanggal }}</td>
                                                <td class="py-3 px-2" style="width:5%">{{ $item-> kategori }}</td>
                                                <td class="py-3 px-2" style="width:10%">{{ $item-> judul }}</td>
                                                <td class="py-3 px-2" style="width:80%">{{ $item-> uraian }}</td>
                                                <td class="py-3 px-2" style="width:10%">
                                                    <a href="{{ $item-> link_file }}" class="btn btn-info btn_detail m-1" target="blank"><i class='bx bxs-info-circle'></i></a>
                                                    <a href="{{ url('/document_edit/'.$item-> id) }}" class="btn btn-success btn_edit m-1"><i class='bx bxs-edit' ></i></a>
                                                    {{-- <hr class="sidebar-divider"> --}}
                                                    <a href="{{ url('/document_delete') }}" class="btn btn-danger btn_delete m-1"><i class='bx bxs-trash'></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="pagination-wrapper">
                                    {{-- pagination link --}}
                                    {{-- {{ $documents->onEachSide(5)->links() }} --}}
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