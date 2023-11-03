@extends('layouts.main')
@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Tambah Data Pinjaman</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form action="/createPinjaman" method="POST">
            @csrf
            <div class="input-group mb-3 mt-2">
                <div class="input-group-prepend">
                <span class="input-group-text"><b>Kode Pinjaman</b></span>
                </div>
            <input type="text" class="form-control" required name="kode_pinjaman" id="randomInput">
                <a href="#" onclick="generateRandNumber()" class="btn btn-secondary">Generate</a>
            </div>


            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text"><b>Nama Peminjam</b></span>
                </div>
                    <select class="form-control select2bs4" name="user_id">
                      <option></option>
                     @foreach ($users as $user)
                        <option value="{{$user->user_id}}">{{$user->nama_lengkap}}</option>
                     @endforeach
                    </select>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text"><b>Jumlah Pinjam</b></span>
                </div>
                <input type="text" class="form-control" name="jumlah" required >
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text"><b>Rencana Bayar</b></span>
                </div>
                <input type="text" class="form-control" required name="rencana" >
                <div class="input-group-prepend">
                    <span class="input-group-text rounded-right"><b>Perbulan</b></span>
                </div>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text"><b>Keterangan</b></span>
                </div>
                <input type="text" class="form-control" required name="keterangan">
            </div>

            {{-- <input type="hidden" name="user_id" value="{{ auth()->user()->user_id }}"> --}}
            <input type="hidden" name="category" value="Pinjaman">

            <div class="row py-3">
                <div class="col-md-6">
                    <a href="/pinjaman" class="btn btn-outline-dark w-50" onclick="return confirm('Apakah anda yakin? Perubahan tidak akan di Simpan!')">Kembali</a>
                </div>
                <div class="col-md-6 text-right">
                    <input type="submit" class="btn btn-outline-primary w-50" onclick="return confirm('Apakah data dimasukkan dengan Benar?')">
                </div>
            </div>
        </form>

    </div>
</div>
    <!-- /.card-body -->
@endsection
