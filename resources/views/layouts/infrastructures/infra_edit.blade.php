@extends('Base')

@section('Content')
      <section class="container-fluid">
            <div class="container">
                  {{-- error message --}}
                  @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>PERHATIKAN!</strong><br>
                      <ul>
                      @foreach ($errors->all() as $error)
                         <li>{{ $error }}</li>
                      @endforeach 
                      </ul>

                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  @endif
                  {{-- /error message --}}

                  {{-- error message --}}
                  @if(session('error'))
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>Perhatian, </strong>{{ session('error') }}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  @endif
                  {{-- end error meesage --}}

                  <!-- Page Heading -->
                  <div class="heading-group d-flex align-items-center justify-content-between gap-3 my-5 w-100%">
                        <h1 class="h3 m-0 text-gray-800">Update Pendataan Infrastruktur</h1>
                        <a href="{{ url('/infrastructure') }}" class="btn btn-info"><i class='bx bxs-folder fs-5 align-top' ></i> Lihat Semua Data</a>
                  </div>

                  @foreach ($find as $item)
                        <form action="{{ url('/infrastructure/'.$item-> id.'/update') }}" method="POST" enctype="multipart/form-data">
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

                                                      <input type="radio" class="btn-check" name="kategori" id="radio-option4" value="server" />
                                                      <label class="btn btn-primary" for="radio-option4">Server</label>
                                                </div>
                                                @error('kategori')
                                                      <div class="error fs-6 text-danger my-1">*{{ $message }}</div>
                                                @enderror
                                          </div>
                                    </div>

                                    <!-- input -->
                                    <div class="form-outline col">
                                          <label class="form-label" for="option4">Nama</label>
                                          <input type="text" id="option4" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ $item-> nama }}" />
                                          @error('nama')
                                                <div class="error fs-6 text-danger my-1">*{{ $message }}</div>
                                          @enderror
                                    </div>
                              </div>
                  
                              <!-- 2 column grid layout with text inputs for the first and last names -->
                              <div class="row mb-4">
                                    <div class="col">
                                          <div class="form-outline">
                                                <label class="form-label" for="option1">Tahun Pengadaan</label>
                                                <input type="text" id="option1" class="form-control @error('tahun_pengadaan') is-invalid @enderror" name="tahun_pengadaan" value="{{ $item-> tahun_pengadaan }}" />
                                                @error('tahun_pengadaan')
                                                      <div class="error fs-6 text-danger my-1">*{{ $message }}</div>
                                                @enderror
                                          </div>
                                    </div>
                                    {{-- col --}}
                                    <div class="col">
                                          <div class="form-outline">
                                                <label class="form-label" for="option2">Penyedia</label>
                                                <input type="text" id="option2" class="form-control @error('penyedia') is-invalid @enderror"  name="penyedia" value="{{ $item-> penyedia }}"/>
                                                @error('penyedia')
                                                <div class="error fs-6 text-danger my-1">*{{ $message }}</div>
                                                @enderror
                                          </div>
                                    </div>
                                    {{-- col --}}
                                    <div class="col">
                                          <div class="form-outline">
                                                <label class="form-label" for="option1">Lokasi</label>
                                                <input type="text" id="option1" class="form-control @error('lokasi') is-invalid @enderror" name="lokasi" value="{{ $item-> lokasi }}" />
                                                @error('lokasi')
                                                <div class="error fs-6 text-danger my-1">*{{ $message }}</div>
                                                @enderror
                                          </div>
                                    </div>
                              </div>
                              
                              <div class="row mb-4">
                                    <!-- input -->
                                    <div class="form-outline col">
                                          <label class="form-label" for="option4">Latitude</label>
                                          <input type="text" id="option4" class="form-control @error('latitude') is-invalid @enderror" name="latitude" value="{{ $item-> latitude }}" />
                                          @error('latitude')
                                          <div class="fs-6 error text-danger my-1">*{{ $message }}</div>
                                          @enderror
                                    </div>
                                    <!-- input -->
                                    <div class="form-outline col">
                                          <label class="form-label" for="option4">Longitude</label>
                                          <input type="text" id="option4" class="form-control @error('longitude') is-invalid @enderror" name="longitude" value="{{ $item-> longitude }}" />
                                          @error('longitude')
                                          <div class="fs-6 error text-danger my-1">*{{ $message }}</div>
                                          @enderror
                                    </div>
                              </div>

                              <div class="row mb-4">
                                    <!-- input -->
                                    <div class="form-outline col d-flex flex-column gap-2">
                                          <label class="form-label" for="option4">Detail</label>
                                          <iframe src="{{ asset('storage/'.$item-> detail) }}" frameborder="0" width="300" height="300"></iframe>
                                          <input type="file" id="option4" class="form-control @error('detail') is-invalid @enderror" name="detail" value="{{ asset('storage/'.$item-> detail) }}" />
                                          {{-- oldFile --}}
                                          <input type="hidden" id="oldFile" name="oldFile" value="{{ $item-> detail }}" ><br><br>
                                          @error('detail')
                                          <div class="fs-6 error text-danger my-1">*{{ $message }}</div>
                                          @enderror
                                    </div>
                              </div>

                              <div class="row mb-4">
                                    <!-- input -->
                                    <div class="form-outline col">
                                          <label class="form-label" for="option6">Catatan</label>
                                          <textarea class="form-control  @error('catatan') is-invalid @enderror" id="option6" rows="4" name="catatan">{{ $item-> catatan }}</textarea>
                                          @error('catatan')
                                          <div class="fs-6 error text-danger my-1">*{{ $message }}</div>
                                          @enderror
                                    </div>
                              </div>
                        
                              <!-- Submit button -->
                              <button type="submit" class="btn btn-primary btn-block mb-4 py-2">SIMPAN</button>
                        </form>
                  @endforeach
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