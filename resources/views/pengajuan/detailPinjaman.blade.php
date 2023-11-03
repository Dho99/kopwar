@extends('layouts.main')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detail Data Pengajuan</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @foreach ($datas as $item)
                @csrf
                <input type="hidden" name="id_pengajuan" value="{{ $item->id_pengajuan }}">
                <div class="input-group mb-3 mt-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><b>Nama Anggota</b></span>
                    </div>
                    <input type="text" class="form-control" value="{{ $item->anggota->nama_lengkap }}" readonly
                        name="">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><b>Kode Pinjaman</b></span>
                    </div>
                    <input type="text" value="{{ $item->kode_pinjaman }}" class="form-control" readonly>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><b>Jumlah Pinjaman</b></span>
                    </div>
                    <input type="text" value="@currency($item->jumlah)" class="form-control" readonly>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><b>Rencana Bayar</b></span>
                    </div>
                    <input type="text" value="@currency($item->rencana_bayar)" class="form-control" readonly>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><b>Keterangan</b></span>
                    </div>
                    <input type="text" class="form-control" readonly value="{{ $item->keterangan }}">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><b>Pembuat</b></span>
                    </div>
                    <input type="text" class="form-control" readonly value="{{ $item->user->nama_lengkap }}">
                </div>


                <div class="row py-3">
                    <div class="col-md-6">
                        <a href="/backToPinjaman" class="btn btn-outline-dark w-50">Kembali</a>
                    </div>
                    <div class="col-md-6">
                        <a href="/deletePengajuanPinjaman/{{ $item->id_pengajuan }}"
                            class="btn btn-outline-danger w-50 float-right">Delete </a>
                    </div>
                </div>
                {{-- </form> --}}
            @endforeach

        </div>
    </div>
    <!-- /.card-body -->
@endsection
