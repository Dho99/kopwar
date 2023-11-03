@extends('layouts.main')
@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Cari Data Pinjaman</h3>
      <p class="text-muted small float-right"><b><span class="text-danger">* </b></span>Cari Data dengan Kode Pinjaman untuk melanjutkan Proses Angsuran</p>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form action="/findAngsuran" method="POST">
            @csrf
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text"><b>Kode Pinjaman</b></span>
                </div>
                    <select class="form-control select2bs4" name="pinjam_id">
                    <option></option>
                    @foreach ($datas as $data)
                        @if ($data->jumlah - $data->terbayar > 0)
                            <option value="{{$data->pinjam_id}}">{{$data->kode_pinjaman}} - {{$data->user->nama_lengkap}}</option>
                        @endif
                    @endforeach
                    </select>
                </div>
                <div class="row py-3">
                    <div class="col">
                        <a href="/angsuran" class="btn btn-outline-dark w-25">Kembali</a>
                    </div>
                    <div class="col">
                        <input type="submit" value="Cari" class="btn btn-outline-primary float-right w-25">
                    </div>
                </div>
            </div>
        </form>
        

    </div>
@endsection