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
            <div class="heading-group d-flex align-items-center justify-content-between gap-3 my-5 w-100%">
                  <h1 class="h3 m-0 text-gray-800">Pencatatan Data Bali Smart Island</h1>
                  <a href="{{ url('/bsi_data') }}" class="btn btn-info"><i class='bx bxs-folder fs-5 align-top' ></i> Lihat Semua Data</a>
              </div>

            <form action="{{ url('/bsi_add') }}" method="POST">
                  @csrf
                  <!-- 2 column grid layout with text inputs for the first and last names -->
                  <div class="row mb-4">
                    <div class="col">
                      <div class="form-outline">
                        <label class="form-label" for="option1">Kabupaten</label>
                        <input type="text" id="option1" class="form-control" name="kabupaten" required/>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-outline">
                        <label class="form-label" for="option2">Kecamatan</label>
                        <input type="text" id="option2" class="form-control"  name="kecamatan"required/>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-outline">
                        <label class="form-label" for="option1">Desa</label>
                        <input type="text" id="option1" class="form-control" name="desa" required/>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-outline">
                        <label class="form-label" for="option1">Desa Pekraman</label>
                        <input type="text" id="option1" class="form-control" name="desa_pekraman" required/>
                      </div>
                    </div>
                  </div>

                  <div class="row mb-4">
                    <!-- input -->
                    <div class="form-outline col">
                      <label class="form-label" for="option4">Data Lokasi</label>
                      <input type="text" id="option4" class="form-control" name="data_lokasi" required/>
                    </div>

                    <div class="col">
                      <div class="form-outline d-flex flex-column">
                        <label class="form-label" for="kategori">Kategori Lokasi</label>
                        <div class="btn-group">
                            <input type="radio" class="btn-check" name="kategori" id="radio-option1" value="puskesmas" checked/>
                            <label class="btn btn-primary" for="radio-option1">Puskesmas</label>
                          
                            <input type="radio" class="btn-check" name="kategori" id="radio-option2" value="desa_pekraman" />
                            <label class="btn btn-primary" for="radio-option2">Desa Pekraman</label>
                          
                            <input type="radio" class="btn-check" name="kategori" id="radio-option3" value="objek_wisata" />
                            <label class="btn btn-primary" for="radio-option3">Objek Wisata</label>
                          </div>
                      </div>
                    </div>
                  </div>

                  
                  <div class="row mb-4">
                      <!-- input -->
                      <div class="form-outline col">
                        <label class="form-label" for="option4">Media</label>
                        <input type="text" id="option4" class="form-control" name="media" required/>
                      </div>
                      <!-- input -->
                      <div class="form-outline col">
                        <label class="form-label" for="option4">Layanan</label>
                        <input type="text" id="option4" class="form-control" name="layanan" required/>
                      </div>
                  </div>

                  <div class="row mb-4">
                      <!-- input -->
                      <div class="form-outline col">
                        <label class="form-label" for="option4">Lokasi</label>
                        <input type="text" id="option4" class="form-control" name="lokasi" required/>
                      </div>
                      <!-- input -->
                      <div class="form-outline col">
                        <label class="form-label" for="option4">Latitude</label>
                        <input type="text" id="option4" class="form-control" name="latitude" required/>
                      </div>
                       <!-- input -->
                      <div class="form-outline col">
                        <label class="form-label" for="option4">Longitude</label>
                        <input type="text" id="option4" class="form-control" name="longitude" required/>
                      </div>
                  </div>  

                  <div class="row mb-4">
                      <!-- input -->
                      <div class="form-outline col">
                        <label class="form-label" for="option4">Nama PIC</label>
                        <input type="text" id="option4" class="form-control" name="nama_pic" required/>
                      </div>
                      <!-- input -->
                      <div class="form-outline col">
                        <label class="form-label" for="option4">Nomor Telepon</label>
                        <input type="text" id="option4" class="form-control" name="nomor_tlp" required/>
                      </div>
                  </div>
                
                  <!-- Submit button -->
                  <button type="submit" class="btn btn-primary btn-block mb-4">ARSIPKAN</button>
            </form>
            </div>
    </section>
@endsection