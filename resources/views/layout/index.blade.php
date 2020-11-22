<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/montserrat_font.css') }}">
    <title>@yield('title')</title>
    <style>
        body {
            font-family: Montserrat;
        }

        .font-regular {
            font-weight: 400;
        }

        .font-medium {
            font-weight: 500;
        }

        .font-bold {
            font-weight: 700;
        }

        .font-extrabold {
            font-weight: 900;
        }

        .bg-custom {
            background: #3dcb7b;
        }

        .color-gray {
            color: #363636;
        }

        .color-red {
            color:#ff0000;
        }

        .font-white {
            color: white;
        }

        .font-green {
            color: #3dcb7b;
        }
        .font-16{
            font-size: 16px;
        }
        .font-18{
            font-size: 18px;
        }
    </style>
  </head>
  <body>
      <div class=" header text-center py-3 mt-4">
        <h2 class="display-5 d-sm-flex align-items-center justify-content-center">Aplikasi Persediaan Barang</h2>
      </div>
    <div class="container mt-2">
        <a href="/barang" class="btn btn-primary bg-primary font-white">Barang</a>
        <a href="/kategori-barang" class="btn btn-primary bg-primary font-white">Kategori Barang</a>
        <a href="/jenis-persediaan" class="btn btn-primary bg-primary font-white">Jenis Persediaan</a>
        <a href="/persediaan" class="btn btn-primary bg-primary font-white">Persediaan</a>
        <a href="/pembukuan" class="btn btn-primary bg-primary font-white">Pembukuan</a>
        @yield('container')
    </div>

    <div class=" footer-copyright text-center py-3">
        © 2020 Copyright - BPN Kantor Pertanahan Kab. Klaten</a>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="{{ asset('/js/jquery-3.2.1.slim.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/bootstrap-datepicker.js') }}"></script>
    <script type="text/javascript">
        $('.datepicker').datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd'
             });
    </script>
</body>
</html>