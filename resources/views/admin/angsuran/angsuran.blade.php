@extends('admin.layouts.main')
@include('admin.partials.navbar')
@include('admin.partials.offcanvas')

<div class="container-fluid px-5 py-4">
    <div class="border-bottom mb-3">
        <h1 class="ms-3">{{ $title }}</h1>
    </div>
</div>

<div class="container">

    <form action="/admin/transaksi/search" method="post">
        @csrf
        <div class="input-group mb-3">
            <label class="input-group-text" for="numberInput">Kode Pinjaman</label>
            <input type="text" id="numberInput" name="kode_pinjaman" class="form-control">
        </div>
        
        <div class="mt-4">
            <button type="submit" class="btn btn-primary float-end">Cari Data</button>
            <a href="/admin/data/pinjaman" class="btn btn-outline-secondary float-start">Kembali</a>
        </div>
    </form>
</div>
