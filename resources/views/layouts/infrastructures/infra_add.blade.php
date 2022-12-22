@extends('Base')

@section('Content')
      <section class="container-fluid">
            <div class="container">

            @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Warning!</strong> {{ session()->get('message') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
                  
            <!-- Page Heading -->
            <div class="heading-group d-flex align-items-center justify-content-between gap-3 my-5 w-100%">
                  <h1 class="h3 m-0 text-gray-800">Pendataan Infrastruktur</h1>
                  <a href="{{ url('/infra_data') }}" class="btn btn-info"><i class='bx bxs-folder fs-5 align-top' ></i> Lihat Semua Data</a>
            </div>

            <form action="{{ url('/infra_add') }}" method="POST">
                  @csrf
                  {{-- row --}}
                  <div class="row mb-4">
                              {{-- col --}}
                        <div class="col">
                              <div class="form-outline d-flex flex-column">
                                    <label class="form-label" for="kategori">Kategori Infrastruktur</label>
                                    <div class="btn-group">
                                          <input type="radio" class="btn-check" name="kategori" id="radio-option1" value="cctv" checked/>
                                          <label class="btn btn-primary" for="radio-option1">CCTV</label>
                                          
                                          <input type="radio" class="btn-check" name="kategori" id="radio-option2" value="videotron" />
                                          <label class="btn btn-primary" for="radio-option2">Videotron</label>
                                                
                                          <input type="radio" class="btn-check" name="kategori" id="radio-option3" value="intranet" />
                                          <label class="btn btn-primary" for="radio-option3">Intranet</label>

                                          <input type="radio" class="btn-check" name="kategori" id="radio-option3" value="server" />
                                          <label class="btn btn-primary" for="radio-option3">Server</label>
                                    </div>
                              </div>
                        </div>

                        <!-- input -->
                        <div class="form-outline col">
                              <label class="form-label" for="option4">Nama</label>
                              <input type="text" id="option4" class="form-control" name="nama" />
                        </div>
                  </div>
      
                  <!-- 2 column grid layout with text inputs for the first and last names -->
                  <div class="row mb-4">
                        <div class="col">
                              <div class="form-outline">
                                    <label class="form-label" for="option1">Tahun Pengadaan</label>
                                    <input type="text" id="option1" class="form-control" name="tahun_pengadaan" />
                              </div>
                        </div>
                        {{-- col --}}
                        <div class="col">
                              <div class="form-outline">
                                    <label class="form-label" for="option2">Penyedia</label>
                                    <input type="text" id="option2" class="form-control"  name="penyedia"/>
                              </div>
                        </div>
                        {{-- col --}}
                        <div class="col">
                              <div class="form-outline">
                                    <label class="form-label" for="option1">Lokasi</label>
                                    <input type="text" id="option1" class="form-control" name="lokasi" />
                              </div>
                        </div>
                  </div>
                  
                  <div class="row mb-4">
                        <!-- input -->
                        <div class="form-outline col">
                              <label class="form-label" for="option4">Latitude</label>
                              <input type="text" id="option4" class="form-control" name="latitude" />
                        </div>
                        <!-- input -->
                        <div class="form-outline col">
                              <label class="form-label" for="option4">Longitude</label>
                              <input type="text" id="option4" class="form-control" name="longitude" />
                        </div>
                  </div>

                  <div class="row mb-4">
                        <!-- input -->
                        <div class="form-outline col">
                              <label class="form-label" for="option4">Detail</label>
                              <input type="file" id="option4" class="form-control" name="detail" />
                        </div>
                  </div>

                  <div class="row mb-4">
                        <!-- input -->
                        <div class="form-outline col">
                              <label class="form-label" for="option6">Catatan</label>
                              <textarea class="form-control  @error('catatan') is-invalid @enderror" id="option6" rows="4" name="catatan"></textarea>
                        </div>
                  </div>
            
                  <!-- Submit button -->
                  <button type="submit" class="btn btn-primary btn-block mb-4 py-2">SIMPAN</button>
            </form>
            </div>
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