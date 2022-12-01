<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
      {{-- bootstrap css and js --}}
      <link rel="stylesheet" href="{{ asset('css/app.css') }}">
      <script src="{{ asset('js/app.js') }}"></script>
      {{-- SB Admin css and js --}}
      <link rel="stylesheet" href="{{ asset('/sbadmin/js/sb-admin-2.min.css') }}">
      <script src="{{ asset('/sbadmin/js/sb-admin-2.min.js') }}"></script>
      <title>{{ config('app.name', 'Sistem Arsip') }}</title>
</head>
<body>
      <div id="app">
            <main class="py-4">
                  @if (Auth::check())
                        @yield('content')
                  @endif
            </main>
      </div>
</body>
</html>