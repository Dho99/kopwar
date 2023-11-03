@extends('layouts.main')
@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Detail Data Simpanan</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        {{-- <form action="/updatePinjaman/{{$data->id}}" method="POST"> --}}
            @foreach ($datas as $data)
            @csrf

            <div class="input-group mb-3 mt-2">
                <div class="input-group-prepend">
                <span class="input-group-text"><b>Nama Anggota</b></span>
                </div>
                <input type="text" value="{{$data->user->nama_lengkap}}" class="form-control" required disabled name="kode_pinjaman">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text"><b>Jenis Simpanan</b></span>
                </div>
                <input type="text" class="form-control" value="{{$data->category->jenis_simpanan}}" required disabled>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text"><b>Jumlah Simpan</b></span>
                </div>
                <input type="text" class="form-control" value="{{$data->jumlah}}" required disabled name="jumlah">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text"><b>Periode</b></span>
                </div>
                <input type="text" class="form-control" value="{{$data->created_at->format('m-Y')}}" required disabled name="rencana">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text"><b>Diproses Pada</b></span>
                </div>
                <input type="text" class="form-control" value="{{$data->created_at->format('d-m-Y')}}" required disabled name="keterangan">
            </div>

            <div class="row py-3">
                <div class="col-md-6">
                    @if(auth()->user()->level === 'Pengurus')
                        <a href="/simpanan" class="btn btn-outline-dark w-25">Kembali</a>
                    @else
                        <a href="/user/simpanan/{{auth()->user()->user_id}}" class="btn btn-outline-dark w-25">Kembali</a>
                    @endif
                </div>
                @if(auth()->user()->level === 'Pengurus')
                <div class="col-md-6 text-right">
                    <a href="/deleteSimpanan/{{$data->id}}" class="btn btn-outline-danger w-25 mx-2" onclick="return confirm('Apakah anda yakin akan Menghapus Data ini?')">Delete</a>
                    <a href="/editSimpanan/{{$data->id}}" class="btn btn-outline-primary w-25">Edit</a>
                </div>
                @endif
            </div>
                            
            @endforeach
        {{-- </form> --}}

    </div>
</div>
    <!-- /.card-body -->
@endsection
