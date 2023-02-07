@extends('admin.layouts.main')
@include('admin.partials.navbar')
@include('admin.partials.offcanvas')

<div class="container-fluid px-5 py-4">
    <div class="border-bottom mb-3">
        <h1 class="ms-3">Detail {{ $title }}</h1>
        {{-- <p class="ms-3">Total Anggota: {{ $total->count() }}</p> --}}
    </div>
</div>

<div class="container">
    @foreach ($items as $item)
        
    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">Kode Anggota</span>
        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{$item->kode_anggota}}" disabled>
    </div>
        
    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">Nama Lengkap</span>
        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{$item->nama_lengkap}}" disabled>
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">Username</span>
        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{$item->username}}" disabled>
    </div>
        
    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">Password</span>
        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{base64_decode(base64_decode(base64_decode($item->password)))}}" disabled>
    </div>
        
    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">Status</span>
        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{$item->status}}" disabled>
    </div>

    @if($item->status == 'non aktif')
    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">Keterangan Nonaktif</span>
        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{$item->ket_nonaktif}}" disabled>
    </div>
    @endif


        
    <div class="input-group mb-5">
        <span class="input-group-text" id="inputGroup-sizing-default">Bergabung Pada</span>
        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{$item->created_at}}" disabled>
    </div>

    <a href="/admin/data/anggota" class="btn bg-primary-subtle float-end mb-5"><span data-feather='arrow-left'></span> Kembali</a>
    <a href="/admin/data/edit/{{$item->anggota_id}}" class="btn btn-secondary mb-5 float-left"><span data-feather='edit'></span> Edit</a>
    @endforeach
</div>