@extends('Base')

@section('Content')
    <section class="container-fluid">
            <div class="container">
                  {{-- error message --}}
                  @if(session()->has('error'))
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Warning!</strong> {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                  @endif
                  {{-- /error message --}}
                  
            <!-- Page Heading -->
            <div class="heading-group d-flex align-items-center justify-content-between gap-3 my-3 w-100%">
                  <h1 class="h3 m-0 text-gray-800">Tambah Data Dokumen</h1>
                  <a href="{{ url('/document_data') }}" class="btn btn-info"><i class='bx bxs-folder' ></i> Lihat Semua Data</a>
              </div>

            <form action="{{ url('/document_add') }}" method="POST">
                  @csrf
                  <!-- 2 column grid layout with text inputs for the first and last names -->
                  <div class="row mb-4">
                    <div class="col">
                      <div class="form-outline">
                        <label class="form-label" for="option1">Nomor Surat</label>
                        <input type="text" id="option1" class="form-control" name="no_surat" required/>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-outline">
                        <label class="form-label" for="option2">Tanggal Surat</label>
                        <input type="date" id="option2" class="form-control"  name="tanggal"required/>
                      </div>
                    </div>

                    <div class="col">
                        <div class="form-outline">
                          <label class="form-label" for="kategori">Kategori Surat</label>
                          <div class="btn-group">
                              <input type="radio" class="btn-check" name="kategori" id="radio-option1" value="kontrak" />
                              <label class="btn btn-primary" for="radio-option1">Kontrak</label>
                            
                              <input type="radio" class="btn-check" name="kategori" id="radio-option2" value="produk_hukum" />
                              <label class="btn btn-primary" for="radio-option2">Produk Hukum</label>
                            
                              <input type="radio" class="btn-check" name="kategori" id="radio-option3" value="spj" />
                              <label class="btn btn-primary" for="radio-option3">SPJ</label>
                            </div>
                        </div>
                      </div>
                  </div>

                  <!-- input -->
                  <div class="form-outline mb-4">
                      <label class="form-label" for="option4">Judul Surat</label>
                      <input type="text" id="option4" class="form-control" name="judul" required/>
                  </div>
                
                  <!-- input -->
                  <div class="form-outline mb-4">
                        <label class="form-label" for="option5">Link File/Surat</label>
                        <input type="text" id="option5" class="form-control" name="link_file" required/>
                  </div>
                
                  <!-- input -->
                  <div class="form-outline mb-4">
                    <label class="form-label" for="option6">Uraian Surat/Informasi Tambahan</label>
                    <textarea class="form-control" id="option6" rows="4" name="uraian"></textarea>
                  </div>
                
                  <!-- Submit button -->
                  <button type="submit" class="btn btn-primary btn-block mb-4">ARSIPKAN</button>
            </form>
            </div>
    </section>
@endsection