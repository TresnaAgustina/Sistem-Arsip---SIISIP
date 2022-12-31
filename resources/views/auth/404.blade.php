<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      {{-- SB Admin css --}}
      <link rel="stylesheet" href="{{ asset('sbadmin/css/sb-admin-2.min.css') }}">
      {{-- bootstrap css --}}
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
      <title>Document</title>
</head>
<body>
      <section class="container" style="height: 100vh; display: flex; align-items: center;">
            <!-- Begin Page Content -->
            <div class="container">
                <!-- 404 Error Text -->
                <div class="text-center">
                    <div class="error mx-auto" data-text="404">404</div>
                    <p class="lead text-gray-800 mb-5">Page Not Found</p>
                    <p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>
                    <a href="{{ url('/') }}">&larr; Back to Dashboard</a>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
  </section> 
  {{-- sbadmin js --}}
  <script src="{{ asset('sbadmin/js/sb-admin-2.min.js') }}"></script>
  {{-- bootstrap js --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>