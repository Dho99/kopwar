@extends('layouts.main')
@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Daftar Transaksi Angsuran</h3>
      <a href="/newAngsuran" class="btn btn-primary float-right">Add new Data</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Anggota</th>
            <th>Kode Pinjaman</th>
            <th>Terbayar</th>
            <th>Sisa Hutang</th>
            <th>Dibuat Pada</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            @if ($notConfirmed != null)
                @foreach ($notConfirmed as $item)
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->user->nama_lengkap }}</td>
                    <td>{{ $item->pinjam->kode_pinjaman }}</td>
                    <td>@currency($item->terbayar)</td>
                    <td>@currency($item->pinjam->jumlah - $item->terbayar)</td>
                    <td>{{ $item->created_at->format('d-m-Y') }}</td>
                    <td>Tunggu Konfirmasi</td>
                @endforeach
            @endif
        </tr>

          @foreach ($list as $item)
          <tr>
            <td>{{$loop->iteration + count($notConfirmed)}}</td>
            <td>{{$item->user->nama_lengkap}}</td>
            <td>{{$item->pinjam->kode_pinjaman}}</td>
            <td>@currency($item->pinjam->terbayar)</td>
            @if($item->pinjam->jumlah - $item->pinjam->terbayar === 0)
              <td class="text-success">@currency($item->pinjam->jumlah - $item->pinjam->terbayar)</td>
            @else
              <td class="text-danger">@currency($item->pinjam->jumlah - $item->pinjam->terbayar)</td>
            @endif
            <td>{{$item->created_at->format('d-m-Y')}}</td>
            <td>
              <a href="/invoice/angsuran/{{ $item->id }}" data-toggle="tooltip" data-placement="top"
                title="Invoice" class="btn btn-outline-secondary"><i class="fa-solid fa-print"></i></a>
              <a href="/viewAngsuran/{{$item->id}}" data-toggle="tooltip" data-placement="top" title="View" class="btn btn-outline-primary"><i class="fa-solid fa-eye"></i></a>
              <a href="/deleteAngsuran/{{$item->id}}" data-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-outline-danger" onclick="return confirm('Apakah anda yakin menghapus Data ini?')"><i class="fa-solid fa-trash-can"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <th>No</th>
            <th>Nama Anggota</th>
            <th>Kode Pinjaman</th>
            <th>Terbayar</th>
            <th>Sisa Hutang</th>
            <th>Dibuat Pada</th>
            <th>Aksi</th>
          </tr>
          </tfoot>    
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection
