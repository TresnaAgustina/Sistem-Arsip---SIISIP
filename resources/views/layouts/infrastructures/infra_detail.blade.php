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
                                    <h1 class="h3 m-0 text-gray-800">
                                          <a class="btn btn-success text-center align-middle" href="{{ url('/infrastructure') }}"><i class='bx bxs-chevrons-left align-middle' ></i> Kembali</a>
                                          Detail Data Infrastruktur</h1>
                                    <div class="button-group d-flex w-auto gap-2">
                                          @foreach ($find as $item)
                                                <a href="{{ url('/infrastructure/'.$item-> id.'/edit') }}" class="btn btn-info">Edit Data <i class='bx bxs-edit' ></i></a>
                                                <form action="{{ url('/infrastructure/'.$item-> id.'/destroy') }}" method="post" class="d-inline">
                                                      @csrf
                                                      <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Delete Data<i class='bx bxs-trash'></i></button>
                                                  </form>
                                          @endforeach
                                    {{-- <a href="{{ url('/bsi_export') }}" class="btn btn-success p-3"></a> --}}
                                    </div>
                              </div>

                              <!-- DataTales Example -->
                              <div class="card shadow mb-4">
                                    @foreach ($find as $item)
                                    <div class="card-header py-3">
                                          <h6 class="m-0 font-weight-bold text-primary">Detail Data Infrastruktur</h6>
                                    </div>
                                    <div class="card-body">
                                          <iframe src="{{ asset('storage/'.$item-> detail) }}" frameborder="0" width="100%" height="1000"></iframe>

                                          <div class="detail-data mt-3">
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
                                                      <div class="form-outline col">
                                                            <label class="form-label" for="option6">Catatan</label>
                                                            <textarea class="form-control  @error('catatan') is-invalid @enderror" id="option6" rows="4" name="catatan">{{ $item-> catatan }}</textarea>
                                                            @error('catatan')
                                                            <div class="fs-6 error text-danger my-1">*{{ $message }}</div>
                                                            @enderror
                                                      </div>
                                                </div>
                                                {{-- button back --}}
                                                <a class="btn btn-success text-center align-middle" href="{{ url('/infrastructure') }}"><i class='bx bxs-chevrons-left align-middle' ></i> Kembali</a>
                                          </div>
                                    </div>
                                    @endforeach
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
@endsection