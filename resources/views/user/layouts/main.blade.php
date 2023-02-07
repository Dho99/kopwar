<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Koperasi INTENS | {{ $title }}</title>
    {{-- <link rel="icon" type="image/x-icon" href="{{ asset('img/fav_logo.ico') }}"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css'> --}}
    {{-- Vanilla --}}
    <link rel="stylesheet" href="{{asset('css/user/style.css')}}">
    {{-- <link rel="stylesheet" href="/css/signin.css"> --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>


    

  </head>
  <body>

    <div class="container-fluid">
        @yield('container-fluid')
    </div>

    <div class="container">
      @yield('container')
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" style="margin-top: 19%">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Log Out</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Apakah Anda Yakin Ingin Logout?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Tidak, tetap disini</button>
              <form action="/logout" method="post">
                  @csrf
                    <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Tetap Logout</button>
              </form>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      feather.replace()
    </script>
  </body>
</html>