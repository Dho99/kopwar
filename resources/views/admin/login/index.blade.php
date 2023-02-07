<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kopwar | {{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/admin/signin.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin/style.css')}}" >

  </head>
  <body class="text-center bg-secondary">
    
<main class="form-signin m-auto w-100 bg-blue rounded-3">
  <form class="m-4" action="/login" method="POST">
    @csrf
    <img class="mb-3 img-fluid" src="{{ asset('img/header_intens.png') }}" alt="">
    <div class="fs-5 fw-normal mb-4 text-light">Please Log in</div>

    <div class="form-floating mb-2">
      <input type="text" class="form-control @error('username') is-invalid @enderror" name="username"  value="{{ old('username') }}" autofocus required id="floatingInput" placeholder="Username">
      <label for="floatingInput">Username</label>
      
    @error('username')
        <div class="invalid-feedback text-start">
          {{ $message }}
        </div>
    @enderror

    </div>


    <div class="form-floating">
      <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    </div>
    <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Sign in</button>
  </form>

  {{-- <div class="mb-3">
    <small class="text-light">
      Belum mempunyai Akun ? <a href="/register" class="text-light fw-bold">Daftar Sekarang</a>
    </small>
  </div> --}}
</main>


    
  </body>
</html>