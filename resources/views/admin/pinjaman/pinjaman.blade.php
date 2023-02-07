@extends('admin.layouts.main')
@include('admin.partials.offcanvas')
@include('admin.partials.navbar')
{{-- @foreach ($data as $item)
    <p>{{$item->kode_pinjaman}}</p>
    <p>{{$item->anggota_id}}</p>
    <p>{{$item->nama_lengkap}}</p>
 @endforeach --}}

<div class="container-fluid px-5 py-4">
    <div class="border-bottom mb-4">
        <a href="/admin/transaksi/tambah-pinjaman" class="btn btn-primary float-end text-decoration-none"> <span data-feather="plus-circle" class="text-light"></span> Tambah Data</a>
        <h1 class="ms-3">{{ $title }}</h1>
        <p class="ms-3">Total Data: {{ $total }}</p>
    </div>

        <div class="container-fluid px-4">
            <table class="table table-hover text-center">
                <thead>
                <tr class="bg-secondary">
                    <th scope="col">Kode Pinjaman</th>
                    <th scope="col">Nama Anggota</th>
                    <th scope="col">Jumlah Pinjaman</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Periode</th>
                </tr>
            </thead>
            <tbody class="bg-secondary-subtle">
                @foreach ($jenis as $item)
                    <tr>
                        <td>{{$item->kode_pinjaman}}</td>
                        <td>{{$item->nama_lengkap}}</td>
                        <td>@currency($item->jumlah_pinjaman)</td>
                        @if ($item->jumlah_pinjaman == $item->jumlah_bayar)
                        <td class="text-green">Lunas</td>
                        @else
                        <td class="text-danger">Belum Lunas</td>
                        @endif
                        <td>{{$item->periode}}</td>
                    </tr>
                @endforeach
                </tbody>
           </table>
</div>
