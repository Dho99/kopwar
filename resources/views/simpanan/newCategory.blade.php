@extends('layouts.main')
@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Tambah Kategori Simpanan</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form action="/createCategory" method="POST">
            @csrf
            <div class="input-group mb-4">
                <div class="input-group-prepend">
                <span class="input-group-text"><b>Jenis Simpanan</b></span>
                </div>
                  <input type="text" name="jenis_simpanan" class="form-control" required>
            </div>
            <a href="/categorySimpanan" class="btn btn-outline-secondary" onclick="return confirm('Apakah anda yakin? Data tidak akan Disimpan')">Kembali</a>
            <button type="submit" class="btn btn-outline-primary float-right" onclick="return confirm('Apakah data yang dimasukkan sudah Benar?')">Simpan</button>
        </form>

    </div>
</div>
    <!-- /.card-body -->
@endsection
