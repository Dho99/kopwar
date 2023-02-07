@extends('admin.layouts.main')
@include('admin.partials.offcanvas')
@include('admin.partials.navbar')

<div class="container-fluid px-5 py-4">
    <div class="border-bottom mb-5">
        <a href="/admin/data/tambah" class="btn btn-primary float-end text-decoration-none"> <span data-feather="plus-circle" class="text-light"></span> Tambah Data</a>
        <h1 class="ms-3 mb-3">{{ $title }}</h1>
        {{-- <p class="ms-3">Total Anggota: {{ $data->count() }}</p> --}}
    </div>

    @foreach ($data as $item)
        
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
    <a href="/admin/data/anggota" class="btn btn-outline-primary float-end mt-4 mb-5 w-25">Kembali</a>
</div>