@extends('admin.layouts.main')
@include('admin.partials.navbar')
@include('admin.partials.offcanvas')

<div class="container-fluid px-5 py-4">
    <div class="border-bottom mb-3">
        <h1 class="ms-3">Form {{ $title }}</h1>
    </div>
</div>

<div class="container">
    <form action="/admin/transaksi/tambah-data-pinjaman" method="POST">
    @csrf
        <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupSelect01">Pilih Member</label>
            <select class="form-select" id="inputGroupSelect01" name="user_id">
            <option selected>Pilih</option>
            @foreach ($users as $user)
            <option value="{{$user->anggota_id}}">{{$user->kode_anggota}} {{$user->nama_lengkap}}</option>          
            @endforeach
            </select>
        </div>

        <div class="input-group mb-3">
            <label class="input-group-text" for="numberInput">Jumlah Pinjaman</label>
            <input type="number" id="numberInput" name="jumlah" class="form-control">
        </div>

        <div class="input-group mb-3">
            <label class="input-group-text" for="numberInput">Periode Pinjaman</label>
            <input type="text" id="numberInput" name="periode" class="form-control">
        </div>



        <div class="form-floating">
            <textarea class="form-control" name="keterangan" placeholder="Keterangan" id="floatingTextarea"></textarea>
            <label for="floatingTextarea">Keterangan</label>
        </div>


        <button type="submit" class="btn btn-primary float-end mt-4">Simpan Data</button>
        <a href="/admin/data/pinjaman" class="btn btn-outline-secondary mt-4 float-start">Kembali</a>

    </form>
      
</div>
