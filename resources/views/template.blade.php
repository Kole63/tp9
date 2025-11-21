<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/sass/app.scss', 'resources/js/app.js' ])
    @stack('head')
  </head>
  <body>
    <div class="container">
      <div class="card mt-4">
        <div class="mycard-header">@yield('title')</div>
        <div class="card-body">
          @session('error')
          <div class="alert alert-danger">
            {{ session('error') }}
          </div>
          @endsession
          @yield('content')
      </div>
    </div>
    @stack('scripts')
  </body>
</html>