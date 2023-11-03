@extends('layouts.main')
@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Edit Data Pengurus</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        @foreach ($datas as $data)
        <form action="/updateAnggota/{{$data->user_id}}" method="POST">
            @csrf
            <div class="input-group mb-3 mt-2">
                <div class="input-group-prepend">
                <span class="input-group-text"><b>Kode Anggota</b></span>
                </div>
                <input type="text" value="{{$data->kode_anggota}}" class="form-control" required name="kode_anggota">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text"><b>Nama Anggota</b></span>
                </div>
                <input type="text" name="nama_lengkap" value="{{$data->nama_lengkap}}" required class="form-control" id="">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text"><b>Username</b></span>
                </div>
                <input type="text" name="username" value="{{$data->username}}" required class="form-control" id="">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text"><b>Password</b></span>
                </div>
                <input type="text" name="password" value="" required class="form-control" id="" required>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text"><b>Status</b></span>
                </div>
                <select name="status" class="form-control" id="">
                    @if ($data->status === 'Aktif')
                        <option value="Aktif" selected>Aktif</option>
                        <option value="Non Aktif">Non Aktif</option>
                    @else
                        <option value="Aktif">Aktif</option>
                        <option value="Non Aktif" selected>Non Aktif</option>
                    @endif
                </select>
            </div>

                @if (auth()->user()->level === 'Pengurus')
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text"><b>Level</b></span>
                    </div>
                    <select name="level" class="form-control" id="">
                        @if ($data->level === 'Pengurus')
                            <option value="Pengurus" selected>Pengurus</option>
                            <option value="Anggota">Anggota</option>
                        @else
                            <option value="Pengurus">Pengurus</option>
                            <option value="Anggota" selected>Anggota</option>
                        @endif
                    </select>
                </div>
                @endif

            <div class="row py-3">
                <div class="col-md-6">
                    @if ($data->level === 'Pengurus')
                    <a href="/pengurus" class="btn btn-outline-dark w-50" onclick="return confirm('Apakah anda yakin? Perubahan tidak akan di Simpan!')">Kembali</a>
                    @elseif($data->level === 'Anggota')
                    <a href="/anggota" class="btn btn-outline-dark w-50" onclick="return confirm('Apakah anda yakin? Perubahan tidak akan di Simpan!')">Kembali</a>
                    @endif
                </div>
                <div class="col-md-6 text-right">
                    <input type="submit" class="btn btn-outline-primary w-50" onclick="return confirm('Apakah data dimasukkan dengan Benar?')">
                </div>
            </div>
                            
            @endforeach
        </form>

    </div>
</div>
    <!-- /.card-body -->
@endsection
