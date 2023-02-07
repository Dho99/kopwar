@extends('admin.layouts.main')
@include('admin.partials.navbar')
@include('admin.partials.offcanvas')

<div class="container-fluid px-5 py-4">
    <div class="border-bottom mb-3">
        <h1 class="ms-3">{{ $title }}</h1>
    </div>
</div>

<div class="container">
    <form action="/admin/transaksi/tambah-data-simpanan" method="POST">
    @csrf
    <div class="input-group mb-3">
        <label class="input-group-text" for="inputGroupSelect01">Pilih Member</label>
        <select class="form-select" id="inputGroupSelect01" name="id_user">
          <option selected>Pilih</option>
          @foreach ($users as $item)
          <option value="{{$item->anggota_id}}">{{$item->kode_anggota}} {{$item->nama_lengkap}}</option>
          @endforeach
          
        </select>
    </div>

    <div class="input-group mb-3">
        <label class="input-group-text" for="numberInput">Jumlah Simpanan</label>
        <input type="number" id="numberInput" name="jumlah" class="form-control">
    </div>

    <div class="input-group mb-4">
        <label class="input-group-text" for="inputGroupSelect01">Pilih Jenis Simpanan</label>
        <select class="form-select" id="inputGroupSelect01" name="jenis">
          <option selected>Pilih</option>
          @foreach ($items as $jenis)
          <option value="{{$jenis->id_jenis}}">{{$jenis->jenis_simpanan}}</option>
          @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary float-end">Simpan Data</button>

    </form>
    <a href="/admin/data/simpanan" class="btn btn-outline-secondary float-left">Kembali</a>
      
</div>
