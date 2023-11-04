@extends('layouts.main')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Transaksi Pinjaman</h3>
            <a href="/user/pinjaman/create/{{ auth()->user()->user_id }}" class="btn btn-primary float-right">Add new Data</a>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Pinjaman</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                        <th>Dibuat Pada</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ($notConfirmed as $item)
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->kode_pinjaman }}</td>
                            <td>@currency($item->jumlah)</td>
                            <td>
                                @if ($item->status == 'Pending')
                                    <button class="btn btn-secondary">Pending</button>
                                @endif
                            </td>
                            <td>{{ $item->created_at->format('d-m-Y') }}</td>
                            <td>Tunggu Konfirmasi</td>
                        @endforeach
                    </tr>
                    @foreach ($list as $item)
                        <tr>
                            <td>{{ count($notConfirmed) + $loop->iteration }}</td>
                            <td>{{ $item->kode_pinjaman }}</td>
                            <td>@currency($item->jumlah)</td>

                            @if ($item->jumlah == $item->terbayar)
                                <td class="text-success">
                                    <button class="btn btn-success">Lunas</button>
                                </td>
                            @else
                                <td class="text-danger">
                                    <button class="btn btn-danger">Belum Lunas</button>
                                </td>
                            @endif

                            <td>{{ $item->created_at->format('d-m-Y') }}</td>
                            <td>
                                <a href="/invoice/pinjaman/{{ $item->id }}" data-toggle="tooltip" data-placement="top"
                                    title="Invoice" class="btn btn-outline-secondary"><i class="fa-solid fa-print"></i></a>
                                <a href="/viewPinjaman/{{ $item->id }}" data-toggle="tooltip" data-placement="top"
                                    title="View" class="btn btn-outline-primary"><i class="fa-solid fa-eye"></i></a>
                                @if ($item->jumlah > $item->terbayar)
                                    <a href="/directAngsuran/{{ $item->id }}" data-toggle="tooltip" data-placement="top"
                                        title="Bayar" class="btn btn-outline-secondary"><i
                                            class="fa-solid fa-money-bill-1"></i></a>
                                @else
                                    <a href="/deletePinjaman/{{ $item->id }}" data-toggle="tooltip"
                                        data-placement="top" title="Delete" class="btn btn-outline-danger"
                                        onclick="return confirm('Apakah anda yakin menghapus Data ini?')"><i
                                            class="fa-solid fa-trash-can"></i></a>
                                @endif



                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Kode Pinjaman</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                        <th>Dibuat Pada</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
