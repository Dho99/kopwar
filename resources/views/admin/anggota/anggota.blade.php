@extends('admin.layouts.main')
@include('admin.partials.offcanvas')
@include('admin.partials.navbar')

<div class="container-fluid px-5 py-4">
    <div class="border-bottom mb-3">
        <a href="/admin/data/tambah" class="btn btn-primary float-end text-decoration-none"> <span data-feather="plus-circle" class="text-light"></span> Tambah Data</a>
        <h1 class="ms-3">{{ $title }}</h1>
        <p class="ms-3">Total Anggota: {{ $total->count() }}</p>
    </div>
    <form action="/admin/anggota/search" method="post">
        @csrf
        <div class="input-group mb-5 mt-4">
            <input type="text" class="form-control border-primary-subtle" placeholder="Cari Data Berdasarkan Nama" aria-label="Recipient's username" name="nama_anggota" aria-describedby="basic-addon2">
            <button class="input-group-text btn btn-outline-primary" type="submit" id="basic-addon2">
                <span data-feather='search'></span>
            </button>
        </div>
    </form>

    @foreach ($users as $item)
        
    <div class="card mb-2 text-center">
        <div class="card-body">
           <div class="row">
              <div class="col-3 text-start">{{ $item->kode_anggota }}</div>
              <div class="col-3 text-start">{{ $item->nama_lengkap }}</div>
              @if ($item->status == 'non aktif')
                  <div class="col-3 text-danger">{{ $item->status }}</div>
              @else
              <div class="col-3 text-success">{{ $item->status }}</div>
              @endif
              <div class="col-3">
                <div class="row gap-2">   
                <a href="/admin/data/delete/{{$item->anggota_id}}" class="col btn btn-danger"><span data-feather="trash"></span> Hapus</a>
                <a class="btn btn-secondary col" href="/admin/data/info/{{$item->anggota_id}}" class="text-light text-decoration-none"><span data-feather="info"></span> Info</a>
            </div>
              </div>
           </div>
        </div>
    </div>

    @endforeach
    <div class="d-flex justify-content-center mb-5 mt-4">
        {{ $users->links() }}
    </div>
</div>