@extends('admin.layouts.main')
@include('admin.partials.offcanvas')
@include('admin.partials.navbar')

<div class="container-fluid px-5 py-4">
    <div class="border-bottom mb-3">
        <h1 class="ms-3">{{ $title }}</h1>
    </div>

    <div class="container py-5">
        @foreach ($datas as $item)        
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Kode Anggota</span>
                <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="{{$item->username}}" disabled>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Nama anggota</span>
                <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="{{$item->nama_lengkap}}" disabled>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Jumlah Pinjaman</span>
                <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="@currency($item->jumlah_pinjaman)" disabled>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Jumlah Bayar</span>
                <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="@currency($item->jumlah_bayar)" disabled>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Jumlah Piutang</span>
                <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="@currency($item->jumlah_pinjaman - $item->jumlah_bayar)" disabled>
            </div>
        @endforeach
        <a href="/admin/data/pinjaman" class="btn btn-outline-secondary float-end mt-4">Kembali</a>
    </div>

</div>