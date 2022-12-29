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
                  <h1 class="h3 m-0 text-gray-800">Pencatatan Data Bali Smart Island</h1>
                  <a href="{{ url('/bsi') }}" class="btn btn-info"><i class='bx bxs-folder fs-5 align-top' ></i> Lihat Semua Data</a>
              </div>

            <form action="{{ url('/bsi/add') }}" method="POST">
                  @csrf
                  <!-- 2 column grid layout with text inputs for the first and last names -->
                  <div class="row mb-4">
                    <div class="col">
                      <div class="form-outline">
                        <label class="form-label" for="option1">Kabupaten</label>
                        <input type="text" id="option1" class="form-control" datalist="list01" name="kabupaten" />
                        <datalist id="list01">
                          <option value="Gianyar">
                        </datalist>
                        @error('kabupaten')
                          <div class="error fs-6 text-danger my-1 w-auto">*{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-outline">
                        <label class="form-label" for="option2">Kecamatan</label>
                        <input type="text" id="option2" class="form-control"  name="kecamatan"/>
                        @error('kecamatan')
                          <div class="error fs-6 text-danger my-1 w-auto">*{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-outline">
                        <label class="form-label" for="option1">Desa</label>
                        <input type="text" id="option1" class="form-control" name="desa" />
                        @error('desa')
                          <div class="error fs-6 text-danger my-1 w-auto">*{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-outline">
                        <label class="form-label" for="option1">Desa Pekraman</label>
                        <input type="text" id="option1" class="form-control" name="desa_pekraman" />
                        @error('desa_pekraman')
                          <div class="error fs-6 text-danger my-1 w-auto">*{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                  </div>

                  <div class="row mb-4">
                    <!-- input -->
                    <div class="form-outline col">
                      <label class="form-label" for="option4">Data Lokasi</label>
                      <input type="text" id="option4" class="form-control" name="data_lokasi" />
                      @error('data_lokasi')
                          <div class="error fs-6 text-danger my-1 w-auto">*{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="col">
                      <div class="form-outline d-flex flex-column">
                        <label class="form-label" for="kategori">Kategori Lokasi</label>
                          <div class="btn-group">
                              <input type="radio" class="btn-check" name="kategori" id="radio-option1" value="Puskesmas"/>
                              <label class="btn btn-primary" for="radio-option1">Puskesmas</label>
                            
                              <input type="radio" class="btn-check" name="kategori" id="radio-option2" value="Desa Pekraman" />
                              <label class="btn btn-primary" for="radio-option2">Desa Pekraman</label>
                            
                              <input type="radio" class="btn-check" name="kategori" id="radio-option3" value="Objek Wisata" />
                              <label class="btn btn-primary" for="radio-option3">Objek Wisata</label>
                          </div>
                          @error('kategori')
                            <div class="error fs-6 text-danger w-auto my-1">*{{ $message }}</div>
                          @enderror
                      </div>
                    </div>
                  </div>

                  
                  <div class="row mb-4">
                      <!-- input -->
                      <div class="form-outline col">
                          <label for="DataList01" class="form-label">Media</label>
                          <input class="form-control" name="media" list="dataListOption01" id="DataList01">
                          <datalist id="dataListOption01">
                              <option value="Fiber Optik">
                              <option value="Wireless">
                          </datalist>
                          @error('media')
                            <div class="error fs-6 text-danger my-1 w-auto">*{{ $message }}</div>
                          @enderror
                      </div>
                      <!-- input -->
                      <div class="form-outline col">
                        <label for="DataList02" class="form-label">Layanan</label>
                          <input class="form-control" name="layanan" list="dataListOption02" id="DataList02">
                          <datalist id="dataListOption02">
                            <option value="Wifi Station">
                            <option value="Orbit">
                          </datalist>
                          @error('layanan')
                            <div class="error fs-6 text-danger my-1 w-auto">*{{ $message }}</div>
                          @enderror
                      </div>
                  </div>

                  <div class="row mb-4">
                      <!-- input -->
                      <div class="form-outline col">
                        <label class="form-label" for="option4">Lokasi Terpasang</label>
                        <input type="text" id="option4" class="form-control" name="lokasi" />
                        @error('lokasi')
                          <div class="error fs-6 text-danger my-1 w-auto">*{{ $message }}</div>
                        @enderror
                      </div>
                      <!-- input -->
                      <div class="form-outline col">
                        <label class="form-label" for="option4">Latitude</label>
                        <input type="text" id="option4" class="form-control" name="latitude" />
                        @error('latitude')
                          <div class="error fs-6 text-danger my-1 w-auto">*{{ $message }}</div>
                        @enderror
                      </div>
                       <!-- input -->
                      <div class="form-outline col">
                        <label class="form-label" for="option4">Longitude</label>
                        <input type="text" id="option4" class="form-control" name="longitude" />
                        @error('longitude')
                          <div class="error fs-6 text-danger my-1 w-auto">*{{ $message }}</div>
                        @enderror
                      </div>
                  </div>  

                  <div class="row mb-4">
                      <!-- input -->
                      <div class="form-outline col">
                        <label class="form-label" for="option4">Nama PIC</label>
                        <input type="text" id="option4" class="form-control" name="nama_pic" />
                        @error('nama_pic')
                          <div class="error fs-6 text-danger my-1 w-auto">*{{ $message }}</div>
                        @enderror
                      </div>
                      <!-- input -->
                      <div class="form-outline col">
                        <label class="form-label" for="option4">Nomor Telepon</label>
                        <input type="text" id="option4" class="form-control" name="nomor_tlp" />
                        @error('nomor_tlp')
                          <div class="error fs-6 text-danger my-1 w-auto">*{{ $message }}</div>
                        @enderror
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