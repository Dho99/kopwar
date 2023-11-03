@extends('layouts.main')
@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Tambah Data Angsuran</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        {{-- @dd($datas) --}}
        @foreach ($datas as $item)

            <form action="/createAngsuran" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{$item->user_id}}">
                {{-- <input type="hidden" name="anggota_id" value="{{$item->anggota_id}}"> --}}
                <input type="hidden" name="id" value="{{$item->id}}">
                <div class="input-group mb-3 mt-2">
                    <div class="input-group-prepend">
                    <span class="input-group-text"><b>Kode Pinjaman</b></span>
                    </div>
                    <input type="text" class="form-control" value="{{$item->kode_pinjaman}}" readonly name="kode_pinjaman" >
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text"><b>Nama Peminjam</b></span>
                    </div>
                    <input type="text" value="{{$item->user->nama_lengkap}}" class="form-control" readonly>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text"><b>Keterangan</b></span>
                    </div>
                    <input type="text" class="form-control" readonly value="{{$item->keterangan}}" name="keterangan">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text"><b>Jumlah Pinjam</b></span>
                    </div>
                    <input type="text" class="form-control" readonly value="@currency($item->jumlah)">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text"><b>Rencana Bayar</b></span>
                    </div>
                    <input type="text" class="form-control" readonly value="@currency($item->rencana_bayar)" name="rencana">
                    <div class="input-group-prepend">
                    <span class="input-group-text rounded-right"><b>Perbulan</b></span>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text"><b>Terbayar</b></span>
                    </div>
                    <input type="text" class="form-control" value="@currency($item->terbayar)" readonly name="jumlah">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text"><b>Sisa Hutang</b></span>
                    </div>
                    <input type="text" class="form-control" value="@currency($item->jumlah - $item->terbayar)" readonly>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text"><b>Jumlah Bayar</b></span>
                    </div>
                    <input type="text" class="form-control" value="{{$item->rencana_bayar}}" required name="terbayar">
                </div>

                <div class="row py-3">
                    <div class="col-md-6">
                        <a href="/pinjaman" class="btn btn-outline-dark w-50" onclick="return confirm('Apakah anda yakin? Perubahan tidak akan di Simpan!')">Kembali</a>
                    </div>
                    <div class="col-md-6 text-right">
                        <input type="submit" class="btn btn-outline-primary w-50" onclick="return confirm('Apakah data dimasukkan dengan Benar?')">
                    </div>
                </div>
            </form>

        @endforeach

    </div>
</div>
    <!-- /.card-body -->
@endsection
