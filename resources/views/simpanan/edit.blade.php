@extends('layouts.main')
@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Tambah Data Pinjaman</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        @foreach ($datas as $data)
        <form action="/updateSimpanan/{{$data->id}}" method="POST">
            @csrf

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text"><b>Nama Anggota</b></span>
                </div>
                    <select class="form-control select2bs4" name="user_id">
                      <option selected value="{{$data->user_id}}">{{$data->user->nama_lengkap}}</option>
                      @foreach ($users as $user)                    
                        <option value="{{$user->user_id}}">{{$user->nama_lengkap}}</option>
                      @endforeach
                    </select>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text"><b>Jenis Simpanan</b></span>
                </div>
                    <select class="form-control select2bs4" name="id_jenis_simpanan">
                      <option selected value="{{$data->id_jenis_simpanan}}">{{$data->category->jenis_simpanan}}</option>
                      @foreach ($category as $item)                    
                        <option value="{{$item->id_jenis_simpanan}}">{{$item->jenis_simpanan}}</option>
                      @endforeach
                    </select>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text"><b>Jumlah Simpan</b></span>
                </div>
                <input type="text" class="form-control" value="{{$data->jumlah}}" required name="jumlah">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text"><b>Periode</b></span>
                </div>
                <input type="text" class="form-control" value="{{$data->created_at->format('m-Y')}}" required name="periode">
            </div>

            <div class="row py-3">
                <div class="col-md-6">
                    <a href="/simpanan" class="btn btn-outline-dark w-50" onclick="return confirm('Apakah anda yakin? Perubahan tidak akan di Simpan!')">Kembali</a>
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
