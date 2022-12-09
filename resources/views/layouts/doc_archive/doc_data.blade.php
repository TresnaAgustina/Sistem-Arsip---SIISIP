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
                                            <th>Uraian</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="p-2">Tiger Nixon</td>
                                            <td class="p-2">System Architect</td>
                                            <td class="p-2">Edinburgh</td>
                                            <td class="p-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus eius iusto quaerat laborum odio consequuntur porro, voluptatem explicabo molestiae cumque similique officia reiciendis voluptatum corporis dicta vel non, fuga repellat.</td>
                                            <td class="p-2">
                                                <a href="{{ url('/document_detail') }}" class="btn btn-info btn_detail"><i class='bx bxs-info-circle'></i></a>
                                                <a href="{{ url('/document_edit') }}" class="btn btn-success btn_edit"><i class='bx bxs-edit' ></i></a>
                                                {{-- <hr class="sidebar-divider"> --}}
                                                <a href="{{ url('/document_delete') }}" class="btn btn-danger btn_edit"><i class='bx bxs-trash'></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="p-2">Garrett Winters</td>
                                            <td class="p-2">Accountant</td>
                                            <td class="p-2">Tokyo</td>
                                            <td class="p-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus eius iusto quaerat laborum odio consequuntur porro, voluptatem explicabo molestiae cumque similique officia reiciendis voluptatum corporis dicta vel non, fuga repellat.</td>
                                            <td class="p-2">
                                                <a href="{{ url('/document_detail') }}" class="btn btn-info btn_detail"><i class='bx bxs-info-circle'></i></a>
                                                <a href="{{ url('/document_edit') }}" class="btn btn-success btn_edit"><i class='bx bxs-edit' ></i></a>
                                                {{-- <hr class="sidebar-divider"> --}}
                                                <a href="{{ url('/document_delete') }}" class="btn btn-danger btn_edit"><i class='bx bxs-trash'></i></a>
                                            </td>
                                        </tr>
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
@endsection