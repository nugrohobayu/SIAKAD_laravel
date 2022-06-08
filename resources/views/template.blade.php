<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{ asset ('bootstrap-4.1.3/dist/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset ('css/style.css') }}">
  <title>Aplikasi Sekolahku</title>
</head>

<body>
  <div class="container">
    @include('navbar')
    @section('main')

    @endsection
    @yield('main')
  </div>

  @include('footer')
  @yield('footer')
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="{{ asset('bootstrap-4.1.3/site/docs/4.1/assets/js/vendor/jquery-slim.min.js')}}">
  </script>
  <script src="{{ asset('bootstrap-4.1.3/site/docs/4.1/assets/js/vendor/popper.min.js')}}">
  </script>
  <script src="{{ asset('bootstrap-4.1.3/dist/js/bootstrap.min.js')}}">
  </script>
</body>

</html>