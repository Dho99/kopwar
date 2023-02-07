@extends('admin.layouts.main')
@include('admin.partials.navbar')
@include('admin.partials.offcanvas')

<div class="container-fluid px-5 py-4">
    <div class="border-bottom mb-3">
        <h1 class="ms-3">Tambah {{ $title }}</h1>
        {{-- <p class="ms-3">Total Anggota: {{ $total->count() }}</p> --}}
    </div>
</div>

<div class="container">
    <form action="/admin/data/create" method="POST">
    @csrf

            
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Kode Anggota</span>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="kode_anggota">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Nama Lengkap</span>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="nama_lengkap">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Username</span>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="username">
        </div>
            
        <div class="input-group mb-4">
            <span class="input-group-text" id="inputGroup-sizing-default">Password</span>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="password">
        </div>
            


        <button type="submit" class="btn btn-primary float-end mt-4">Simpan Data</button>
    </form>
    <a href="/admin/data/anggota" class="btn btn-outline-secondary float-left mt-4">Kembali</a>
</div>