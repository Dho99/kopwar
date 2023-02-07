@extends('admin.layouts.main')
@include('admin.partials.offcanvas')
@include('admin.partials.navbar')

<div class="container-fluid px-5 py-4">
    <div class="border-bottom mb-4">
        <a href="/admin/transaksi/tambah-pinjaman" class="btn btn-primary float-end text-decoration-none"> <span data-feather="plus-circle" class="text-light"></span> Tambah Data</a>
        <h1 class="ms-3">{{ $title }}</h1>
    </div>
</div>

    <div class="container-fluid px-5">
        <table class="table table-hover text-center">
            <thead>
            <tr class="bg-secondary">
                <th scope="col">Kode Anggota</th>
                <th scope="col">Nama Anggota</th>
                <th scope="col">Kode Pinjaman</th>
                <th scope="col">Jumlah Bayar</th>
                <th scope="col">Waktu Bayar</th>
                <th scope="col">Keterangan Bayar</th>
            </tr>
            </thead>
            <tbody class="bg-secondary-subtle">
            @foreach ($items as $item)
            @if ($item->jumlah_pinjaman > $item->jumlah_bayar)
            <tr>
                <td>{{$item->kode_anggota}}</td>
                <td>{{$item->nama_lengkap}}</td>
                <td>{{$item->kode_pinjaman}}</td>
                <td>@currency($item->jumlah_angsur)</td>
                <td>{{$item->timestamp}}</td>
                <td class="text-danger">Belum Lunas</td>
            </tr>
            @endif
            @endforeach 
            </tbody>
       </table>
       <div class="d-flex justify-content-center mb-5 mt-4">
        {{ $items->links() }}
    </div>
    </div>
