@extends('layouts.main')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detail Data Anggota</h3>
        </div>
        <!-- /.card-header -->
        @foreach ($datas as $item)
            <div class="card-body">
                <div class="input-group mb-3 mt-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><b>Kode Anggota</b></span>
                    </div>
                    <input type="text" class="form-control" value="{{ $item->kode_anggota }}" readonly>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><b>Nama Lengkap</b></span>
                    </div>
                    <input type="text" class="form-control" readonly value="{{ $item->nama_lengkap }}">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><b>Username</b></span>
                    </div>
                    <input type="text" class="form-control" readonly value="{{ $item->username }}">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><b>Password</b></span>
                    </div>
                    <input type="text" class="form-control" readonly value="{{ $item->password }}">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><b>Status</b></span>
                    </div>
                    <input type="text" class="form-control" readonly value="{{ $item->status }}">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><b>Dibuat Pada</b></span>
                    </div>
                    <input type="text" class="form-control" readonly value="{{ $item->created_at->format('d-m-Y') }}">
                </div>


                <div class="row py-3">
                    <div class="col-md-6">
                        <a href="{{auth()->user()->level === 'Pengurus' ? '/anggota' : '/user/dashboard'}}" class="btn btn-outline-dark w-50">Kembali</a>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="/editDataAnggota/{{ $item->user_id }}" class="btn btn-outline-primary w-50">Edit</a>
                    </div>
                </div>
                </form>

            </div>
    </div>
    @endforeach
    <!-- /.card-body -->
@endsection
