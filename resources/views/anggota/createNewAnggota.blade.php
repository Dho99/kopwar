@extends('layouts.main')
<style>
    .container-fluid {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
</style>

<body class="">
    <div class="container-fluid">
        <div class="container w-50">
            <div class="card shadow">
                <div class="card-header text-center bg-dark">
                    <img src="{{ asset('dist/img/header_intens.png') }}" alt="" class="img-fluid w-50">
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="/registerNewAnggota" method="POST">
                        @csrf
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><b>Username</b></span>
                            </div>
                            <input type="text" value="{{ old('username') }}" class="form-control {{ session()->has('username') ? 'is-invalid' : '' }}" required name="username">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><b>Password</b></span>
                            </div>
                            <input type="text" class="form-control" required name="password">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><b>Nama Lengkap</b></span>
                            </div>
                            <input type="text" class="form-control" required name="nama_lengkap">
                        </div>

                        <div class="input-group mb-3 mt-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><b>Kode Anggota</b></span>
                            </div>
                            <input type="text" class="form-control"
                                placeholder="Kode Anggota akan Dibuat secara otomatis" readonly>
                        </div>


                        <div class="row py-3">
                            <div class="col-md-6">
                                <a href="/" class="btn btn-outline-dark w-50"
                                    onclick="return confirm('Apakah anda yakin? Perubahan tidak akan di Simpan!')">Kembali</a>
                            </div>
                            <div class="col-md-6 text-right">
                                <input type="submit" value="Daftar" class="btn btn-outline-primary w-50"
                                    onclick="return confirm('Apakah data dimasukkan dengan Benar?')">
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</body>
<!-- /.card-body -->
{{-- @endsection --}}
