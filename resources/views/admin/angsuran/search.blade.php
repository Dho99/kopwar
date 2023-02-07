@extends('admin.layouts.main')
@include('admin.partials.offcanvas')
@include('admin.partials.navbar')
@if ($data->isEmpty())
<div class="container-fluid px-5 py-4">
    <div class="border-bottom mb-3">
        <h1 class="ms-3">{{ $title }}</h1>
    </div>
    <div class="container pt-4">
        <div class="alert alert-danger text-center" role="alert">
            {{$message}}
        </div>
        <a href="/admin/transaksi/angsuran" class="btn btn-outline-primary float-end mt-4 w-25">Kembali</a>
    </div>
@else
@foreach ($data as $item)
<div class="container-fluid px-5 py-4">
    <div class="border-bottom mb-3">
        <h1 class="ms-3">{{ $title }}</h1>
    </div>
    <div class="container pt-4">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Kode Pinjaman</span>
            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="{{$item->kode_pinjaman}}" disabled>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Kode Anggota</span>
            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="{{$item->kode_anggota}}" disabled>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Nama Anggota</span>
            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="{{$item->nama_lengkap}}" disabled>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Jumlah Pinjaman</span>
            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="@currency($item->jumlah_pinjaman)" disabled>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Jumlah Terbayar</span>
            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="@currency($item->jumlah_bayar)" disabled>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Jumlah Piutang</span>
            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="@currency($item->jumlah_pinjaman - $item->jumlah_bayar)" disabled>
        </div>
    
        @if ($item->jumlah_pinjaman == $item->jumlah_bayar)
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Keterangan</span>
            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="Lunas" disabled>
        </div>
        @else
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Keterangan</span>
            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="Belum Lunas" disabled>
        </div>
        <a href="/admin/data/bayar-angsuran/{{$item->kode_pinjaman}}" class="btn btn-outline-primary float-end mt-4">Bayar</a>
        @endif
        <a href="/admin/transaksi/angsuran" class="btn btn-outline-secondary float-left mt-4">Kembali</a>
</div>
</div>
@endforeach
@endif