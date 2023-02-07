@extends('admin.layouts.main')
@include('admin.partials.navbar')
@include('admin.partials.offcanvas')

<div class="container-fluid px-5 py-4">
    <div class="border-bottom mb-3">
        <h1 class="ms-3">Edit {{ $title }}</h1>
        {{-- <p class="ms-3">Total Anggota: {{ $total->count() }}</p> --}}
    </div>
</div>

<div class="container">
    @foreach ($items as $item)
    <form action="/admin/data/update" method="POST">
    @csrf
        <input type="hidden" value="{{$item->anggota_id}}" name="anggota_id">
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Kode Anggota</span>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="kode" value="{{$item->kode_anggota}}">
        </div>
            
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Nama Lengkap</span>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="nama" value="{{$item->nama_lengkap}}">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Username</span>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="username" value="{{$item->username}}">
        </div>
            
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Password</span>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="password" value="{{base64_decode(base64_decode(base64_decode($item->password)))}}">
        </div>
            
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Status</span>
            <select name="status" id="" class="form-control">
                @if ($item->status == 'aktif') 
                <option value="aktif" selected>Aktif</option>
                <option value="non aktif">Non aktif</option>
                @else
                <option value="aktif">Aktif</option>
                <option value="non aktif" selected>Non aktif</option>
                @endif
            </select>
        </div>


        <button type="submit" class="btn btn-primary form-control">Simpan Data</button>
    </form>

    @endforeach
</div>