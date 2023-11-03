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
                    <input type="text" class="form-control" value="{{ $item->user->nama_lengkap }}" readonly
                        name="kode_pinjaman">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><b>Jenis Simpanan</b></span>
                    </div>
                    <input type="text" value="{{ $item->simpan->jenis_simpanan }}" class="form-control" readonly>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><b>Jumlah</b></span>
                    </div>
                    <input type="text" class="form-control" readonly value="@currency($item->jumlah)">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><b>Periode</b></span>
                    </div>
                    <input type="text" class="form-control" readonly value="{{ $item->created_at->format('m-Y') }}">
                </div>


                <div class="row py-3">
                    <div class="col-md-6">
                        <a href="/backToSimpanan" class="btn btn-outline-dark w-50">Kembali</a>
                    </div>
                    <div class="col-md-6">
                        <a href="/deletePengajuanSimpanan/{{ $item->id_pengajuan }}"
                            class="btn btn-outline-danger w-50 float-right">Delete </a>
                    </div>
                </div>
                {{-- </form> --}}
            @endforeach

        </div>
    </div>
    <!-- /.card-body -->
@endsection
