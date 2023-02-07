@extends('admin.layouts.main')
@include('admin.partials.offcanvas')
@include('admin.partials.navbar')

<div class="container-fluid px-5 py-4">
    <div class="border-bottom mb-3">
            <a href="/admin/transaksi/simpanan" class="btn btn-primary float-end text-decoration-none"> <span data-feather="plus-circle" class="text-light"></span> Tambah Data</a>
            <h1 class="ms-3">{{ $title }}</h1>
            <p class="ms-3">Total Data: {{ count($items) }}</p>
        </div>
    </div>

    <div class="container-fluid px-5">
        <table class="table table-hover text-center">
            <thead>
            <tr class="bg-secondary">
                <th scope="col">No.</th>
                <th scope="col">Kode Anggota</th>
                <th scope="col">Nama Anggota</th>
                <th scope="col">Jenis Simpanan</th>
                <th scope="col">Periode</th>
            </tr>
            </thead>
            <tbody class="bg-secondary-subtle">
            @foreach ($items as $item)
            <tr>
                <td>{{$item->id_simpanan}}</td>
                <td>{{$item->kode_anggota}}</td>
                <td>{{$item->nama_lengkap}}</td>
                <td>{{$item->jenis_simpanan}}</td>
                <td>{{$item->periode}}</td>
            </tr>
            @endforeach 
            </tbody>
       </table>
       <div class="d-flex justify-content-center mb-5 mt-4">
        {{ $items->links() }}
    </div>
    </div>
