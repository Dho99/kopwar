@extends('user/layouts/main')
@include('user/partials/navbar')
@include('user/partials/sidebar')

@section('container-fluid')



 <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 my-2">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Detail {{ $title }}</h1>
      </div>
      @foreach ($users as $user)
          
      <label for="id" class="mb-1">ID Anggota</label>
         <input class="form-control mb-4" id="id" type="text" value="{{ $user->anggota_id }}" disabled>
      <label for="kode" class="mb-1">Kode Anggota</label>
         <input class="form-control mb-4" id="id" type="text" value="{{ $user->kode_anggota }}" disabled>
         <label for="username" class="mb-1">Username</label>
         <input class="form-control mb-4" id="username" type="text" value="{{ $user->username }}" disabled>
      <label for="nama" class="mb-1">Nama Lengkap</label>
         <input class="form-control mb-4" id="nama" type="text" value="{{ $user->nama_lengkap }}" disabled>
      <label for="password">Password</label>
         <input class="form-control mb-4" id="password" type="text" value="{{ base64_decode(base64_decode(base64_decode($user->password))) }}" disabled>
      <label for="gabung">Bergabung Pada</label>
         <input class="form-control mb-4" id="gabung" type="text" value="{{ $user->created_at }}" disabled>
         
         <a href="/akun/edit/{{ ($user->anggota_id) }}" class="btn btn-secondary mb-4">Edit Akun</a>
         @endforeach

 </div>

@endsection
