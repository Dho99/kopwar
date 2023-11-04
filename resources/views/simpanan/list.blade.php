@extends('layouts.main')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                @foreach($categories as $item)
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-teal disabled">
                        <div class="inner">
                            <h3>@currency($item['jumlah'])</h3>

                            <p>{{$item['categoryName']}}</p>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>


    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Transaksi Simpanan</h3>
            <a href="/newSimpanan" class="btn btn-primary float-right">Add new Data</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Simpanan</th>
                        <th>Nama Anggota</th>
                        <th>Jenis Simpanan</th>
                        <th>Jumlah</th>
                        <th>Periode</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($notConfirmed != null)
                        @foreach ($notConfirmed as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->kode_simpanan }}</td>
                                <td>{{ $item->user->nama_lengkap }}</td>
                                <td>{{ $item->simpan->jenis_simpanan }}</td>
                                <td>@currency($item->jumlah)</td>
                                <td>{{ $item->created_at->format('m-Y') }}</td>
                                <td>Tunggu Konfirmasi</td>
                            </tr>
                        @endforeach
                    @endif
                    @foreach ($list as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->kode_simpanan }}</td>
                            <td>{{ $item->user->nama_lengkap }}</td>
                            <td>{{ $item->category->jenis_simpanan }}</td>
                            <td>@currency($item->jumlah)</td>
                            <td>{{ $item->created_at->format('m-Y') }}</td>
                            <td>
                                <a href="/invoice/simpanan/{{ $item->id }}" data-toggle="tooltip" data-placement="top"
                                    title="Invoice" class="btn btn-outline-secondary"><i class="fa-solid fa-print"></i></a>
                                <a href="/viewSimpanan/{{ $item->id }}" data-toggle="tooltip" data-placement="top"
                                    title="View" class="btn btn-outline-primary"><i class="fa-solid fa-eye"></i></a>
                                {{-- <a href="/deleteSimpanan/{{ $item->id }}" data-toggle="tooltip" data-placement="top"
                                    title="Delete" class="btn btn-outline-danger"
                                    onclick="return confirm('Apakah anda yakin menghapus Data ini?')"><i
                                        class="fa-solid fa-trash-can"></i></a>
                                <a href="/editSimpanan/{{ $item->id }}" data-toggle="tooltip" data-placement="top"
                                    title="Edit" class="btn btn-outline-secondary"><i
                                        class="fa-regular fa-pen-to-square"></i></a> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Kode Simpanan</th>
                        <th>Nama Anggota</th>
                        <th>Jenis Simpanan</th>
                        <th>Jumlah</th>
                        <th>Periode</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
