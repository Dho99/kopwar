@extends('layouts.main')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detail Data Pinjaman</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            {{-- <form action="/updatePinjaman/{{$data->id}}" method="POST"> --}}
            @foreach ($datas as $data)
                @csrf

                <div class="input-group mb-3 mt-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><b>Kode Pinjaman</b></span>
                    </div>
                    <input type="text" value="{{ $data->kode_pinjaman }}" class="form-control" required disabled
                        name="kode_pinjaman">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><b>Nama Peminjam</b></span>
                    </div>
                    <input type="text" class="form-control" value="{{ $data->user->nama_lengkap }}" required disabled>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><b>Jumlah Pinjam</b></span>
                    </div>
                    <input type="text" class="form-control" value="@currency($data->jumlah)" required disabled name="jumlah">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><b>Rencana Bayar</b></span>
                    </div>
                    <input type="text" class="form-control" value="@currency($data->rencana_bayar)" required disabled
                        name="rencana">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><b>Jumlah Terbayar</b></span>
                    </div>
                    <input type="text" class="form-control" value="@currency($data->terbayar)" required disabled
                        name="rencana">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><b>Status</b></span>
                    </div>
                    @if ($data->jumlah === $data->terbayar)
                        <input type="text" class="form-control text-success" value="Lunas" disabled>
                    @else
                        <input type="text" class="form-control text-danger" value="Belum Lunas" disabled>
                    @endif
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><b>Keterangan</b></span>
                    </div>
                    <input type="text" class="form-control" value="{{ $data->keterangan }}" required disabled
                        name="keterangan">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><b>Diproses Pada</b></span>
                    </div>
                    <input type="text" class="form-control" value="{{ $data->created_at->format('d-m-Y') }}" required
                        disabled name="keterangan">
                </div>

                <div class="row py-3">
                    @if (auth()->user()->level === 'Pengurus')
                        <div class="col-md-6">
                            <a href="/pinjaman" class="btn btn-outline-dark w-25">Kembali</a>
                        </div>
                        @if ($data->jumlah == $data->terbayar)
                            <div class="col-md-6 text-right">
                                <a href="/deletePinjaman/{{ $data->pinjam_id }}" class="btn btn-outline-danger w-25 mx-2"
                                    onclick="return confirm('Apakah anda yakin akan Menghapus Data ini?')">Delete</a>
                                <a href="/editPinjaman/{{ $data->pinjam_id }}" class="btn btn-outline-primary w-25">Edit</a>
                            </div>
                        @endif
                    @endif
                </div>
            @endforeach
            {{-- </form> --}}

        </div>
    </div>
    <!-- /.card-body -->
@endsection
