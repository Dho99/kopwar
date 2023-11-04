@extends('layouts.main')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tambah Data Anggota</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="/createDataAnggota" method="POST">
                @csrf
                <div class="input-group mb-3 mt-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><b>Kode Anggota</b></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Kode Anggota akan Dibuat secara otomatis"
                        readonly>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><b>Nama Lengkap</b></span>
                    </div>
                    <input type="text" class="form-control" required name="nama_lengkap">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><b>Username</b></span>
                    </div>
                    <input type="text" class="form-control" required name="username">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><b>Password</b></span>
                    </div>
                    <input type="text" class="form-control" required name="password">
                </div>

                <select name="level" hidden class="form-control" id="">
                    <option value="0" selected>Anggota</option>
                </select>

                <div class="row py-3 d-flex">
                    <div class="col-lg-4 col-md-5 col-sm-12 pb-2">
                        <a href="/anggota" class="btn btn-outline-dark w-100"
                            onclick="return confirm('Apakah anda yakin? Perubahan tidak akan di Simpan!')">Kembali</a>
                    </div>
                    <div class="col-lg-2 col-md-2"></div>
                    <div class="col-lg-4 col-md-5 col-sm-12 ml-auto">
                        <input type="submit" class="btn btn-outline-primary w-100"
                            onclick="return confirm('Apakah data dimasukkan dengan Benar?')">
                    </div>
                </div>
            </form>

        </div>
    </div>
    <!-- /.card-body -->
@endsection
