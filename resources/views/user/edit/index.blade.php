@extends('user/layouts/main')
@include('user/partials/navbar')

@section('container-fluid')

 <div class="col-md-9 ms-sm-auto col-lg-12 px-md-4 my-2">
    <div class="container">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Detail {{ $title }}</h1>
        </div>
        
        @foreach ($users as $user)
        <form  method="post" action="/update" enctype="multipart/form-data" name="formName">
            @csrf
        <label for="id" class="mb-1">ID Anggota</label>
            <input class="form-control mb-4" id="id" name="anggota_id" type="text" value="{{ $user->anggota_id  }}" disabled>

        <label for="kode" class="mb-1">Kode Anggota</label>
            <input class="form-control mb-4" id="id" name="kode_anggota" type="text" value="{{ $user->kode_anggota }}" disabled>

        <label for="username" class="mb-1">Username</label>
                <input class="form-control mb-4" id="username" name="username" type="text" value="{{ $user->username }}" required>

        <label for="nama" class="mb-1">Nama Lengkap</label>
            <input class="form-control mb-4" id="nama" name="nama_lengkap" type="text" value="{{ $user->nama_lengkap }}" disabled>

        <label for="password">Password</label>
            <input class="form-control mb-4" id="password" name="password" type="text" value="{{ base64_decode(base64_decode(base64_decode($user->password))) }}" required>

            <div class="mb-4">
                {{-- <label for="image" class="form-label">Post Image</label>
                @if($user->image)
                <img src="{{ asset('storage/' .$user->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                @else
                <img class="img-preview img-fluid mb-3 col-sm-5">
                @endif --}}
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                {{-- @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror    --}}
            </div>

        {{-- <label for="reg">Tanggal Bergabung</label>
            <input class="form-control mb-4" id="reg" name="tgl_registrasi" type="text" value="{{ $user->tgl_registrasi }}" disabled> --}}

            <button type="submit" class="btn btn-primary">Edit Akun</button>

        </form>
            @endforeach
    </div>
 </div>