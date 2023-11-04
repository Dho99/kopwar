@extends('layouts.main')
@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Edit Data Pinjaman</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        @foreach ($datas as $data)
        <form action="/updatePinjaman/{{$data->pinjam_id}}" method="POST">
            @csrf

            <div class="input-group mb-3 mt-2">
                <div class="input-group-prepend">
                <span class="input-group-text"><b>Kode Pinjaman</b></span>
                </div>
                <input type="text" value="{{$data->kode_pinjaman}}" class="form-control" readonly name="kode_pinjaman">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text"><b>Nama Peminjam</b></span>
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
                <span class="input-group-text"><b>Jumlah Pinjam</b></span>
                </div>
                <input type="text" class="form-control" value="@currency($data->jumlah)" data-mask="currency" required name="jumlah">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text"><b>Rencana Bayar</b></span>
                </div>
                <input type="text" class="form-control" value="{{$data->rencana_bayar}}" data-mask="currency" required name="rencana">
                <div class="input-group-prepend">
                <span class="input-group-text rounded-right"><b>Perbulan</b></span>
                </div>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text"><b>Keterangan</b></span>
                </div>
                <input type="text" class="form-control" value="{{$data->keterangan}}" required name="keterangan">
            </div>

            <div class="row py-3">
                <div class="col-md-6">
                    <a href="/pinjaman" class="btn btn-outline-dark w-50" onclick="return confirm('Apakah anda yakin? Perubahan tidak akan di Simpan!')">Kembali</a>
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
