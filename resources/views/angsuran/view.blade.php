@extends('layouts.main')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detail Data Angsuran</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @foreach ($datas as $item)
                @csrf
                <input type="hidden" name="pinjam_id" value="{{ $item->pinjam_id }}">
                <div class="input-group mb-3 mt-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><b>ID Angsuran</b></span>
                    </div>
                    <input type="text" class="form-control" value="{{ md5($item->id) }}" readonly
                        name="kode_pinjaman">
                </div>
                <div class="input-group mb-3 mt-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><b>Kode Pinjaman</b></span>
                    </div>
                    <input type="text" class="form-control" value="{{ $item->pinjam->kode_pinjaman }}" readonly
                        name="kode_pinjaman">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><b>Nama Peminjam</b></span>
                    </div>
                    <input type="text" value="{{ $item->user->nama_lengkap }}" class="form-control" readonly>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><b>Keterangan</b></span>
                    </div>
                    <input type="text" class="form-control" readonly value="{{ $item->pinjam->keterangan }}"
                        name="keterangan">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><b>Jumlah Pinjam</b></span>
                    </div>
                    <input type="text" class="form-control" readonly value="@currency($item->pinjam->jumlah)">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><b>Rencana Bayar</b></span>
                    </div>
                    <input type="text" class="form-control" readonly value="@currency($item->pinjam->rencana_bayar)"
                    name="rencana">
                    <div class="input-group-prepend">
                        <span class="input-group-text rounded-right"><b>Perbulan</b></span>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><b>Terbayar</b></span>
                    </div>
                    <input type="text" class="form-control" value="@currency( $item->pinjam->terbayar )" readonly
                        name="jumlah">
                </div>

                <div class="row py-3">
                    @if (auth()->user()->level === 'Pengurus')
                        <div class="col-md-6">
                            <a href="/angsuran" class="btn btn-outline-dark w-50">Kembali</a>
                        </div>
                        {{-- <div class="col-md-6">
                            <a href="/deleteAngsuran/{{ $item->id }}"
                                class="btn btn-outline-danger w-50 float-right">Delete </a>
                        </div> --}}
                    @else
                    <div class="col-md-6">
                        <a href="/user/angsuran/{{ auth()->user()->user_id }}" class="btn btn-outline-dark w-50">Kembali</a>
                    </div>
                    @endif
                    @if ($item->pinjam->jumlah - $item->pinjam->terbayar === 0)
                    <div class="col-md-6">
                        <a href="/deleteAngsuran/{{ $item->id }}"
                            class="btn btn-outline-danger w-50 float-right">Delete </a>
                    </div>
                    @endif
            @endforeach

        </div>
        <!-- /.card-body -->
    </div>
    </div>
@endsection
