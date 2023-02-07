@extends('admin.layouts.main')
@include('admin.partials.offcanvas')
@include('admin.partials.navbar')
@foreach ($data as $item)

<div class="container-fluid px-5 py-4">
    <div class="border-bottom mb-3">
        <h1 class="ms-3">{{ $title }}</h1>
    </div>
    <div class="container pt-4">
        <form action="/admin/transaksi/tambah-data-angsuran" method="POST">
            @csrf
        <input type="hidden" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="{{$item->anggota_id}}" name="id_user">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Kode Pinjaman</span>
            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="{{$item->kode_pinjaman}}" name="kode_pinjaman" readonly>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Kode Anggota</span>
            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="{{$item->kode_anggota}}" readonly>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Nama Anggota</span>
            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="{{$item->nama_lengkap}}" readonly>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Jumlah Pinjaman</span>
            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="@currency($item->jumlah_pinjaman)" readonly>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Jumlah Piutang</span>
            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="@currency($item->jumlah_pinjaman - $item->jumlah_bayar)" readonly>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Jumlah Bayar</span>
            <input type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1" value="" name="jumlah">
        </div>
    
        <button type="submit" class="btn btn-primary w-100 mt-4">Bayar Sekarang</button>
        {{-- <a href="/admin/transaksi/angsuran" class="btn btn-primary w-100 mt-4">Bayar Sekarang</a> --}}
    </form>
</div>
</div>
@endforeach