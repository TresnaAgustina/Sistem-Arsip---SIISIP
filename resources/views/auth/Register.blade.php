<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
      {{-- bootstrap css and js --}}
      <link rel="stylesheet" href="{{ asset('sbadmin/css/sb-admin-2.min.css') }}">
      <script src="{{ asset('sbadmin/js/sb-admin-2.min.js') }}"></script>
      <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
        <style>
            .global-container {
                width: 100%;
                height: 100vh;
                align-items: center;
                justify-content: center;
            }
            .login-img{
                object-fit: fill;
            }
        </style>
      <title>Register</title>
</head>
<body>
      <section class="global-container d-flex flex-column">
        {{-- error alert --}}
        @if(session()->has('loginError'))
        <div class="alert alert-danger d-flex align-items-center position-static" role="alert">
            <box-icon name='info-circle'></box-icon>
            <div>
              <strong>Warning!! </strong>{{ session('loginError') }}!!
            </div>
          </div>
        @endif
        {{-- end error alert --}}
            <div class="container">
                  <!-- Outer Row -->
                  <div class="row justify-content-center">
                      <div class="col-xl-10 col-lg-12 col-md-9">
                          <div class="card o-hidden border-0 shadow-lg my-5">
                              <div class="card-body p-0">
                                  <!-- Nested Row within Card Body -->
                                  <div class="row d-flex align-items-center p-5">
                                      <div class="col-lg-6 d-none d-lg-block" loading="lazy">
                                        <img src="{{ asset('assets/img/SVG/login-img.svg') }}" class="img-responsive login-img" alt="Login Vektor">
                                      </div>
                                      
                                      <div class="col-lg-6">
                                          <div class="p-5">
                                            {{-- form title --}}
                                              <div class="text-center">
                                                  <h1 class="h4 text-gray-900 mb-4">Register User</h1>
                                              </div>
                                              <form class="user form" acton="{{ url('/reg') }}" method="POST">
                                                @csrf
                                                {{-- username --}}
                                                  <div class="form-group">
                                                      <input name="username" type="text" class="form-control form-control-user rounded-0 @error('username') is-invalid @enderror"
                                                          id="exampleInputUser" aria-describedby="emailHelp" placeholder="Enter Username...">
                                                            @error('username')
                                                                    <div class="fs-5 text-danger">*{{ $message }}</div>
                                                            @enderror
                                                  </div>
                                                  {{-- password --}}
                                                  <div class="form-group">
                                                      <input name="password" type="password" class="form-control form-control-user rounded-0 @error('password') is-invalid @enderror" id="exampleInputPassword" placeholder="Password">
                                                        @error('password')
                                                                <div class="fs-5 text-danger">{{ $message }}</div>
                                                        @enderror
                                                  </div>
                                                  {{-- button --}}
                                                  <button class="btn btn-primary btn-user btn-block rounded-0" type="submit">Login</button>
                                              </form>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
             </div>
      </section>
</body>
</html>