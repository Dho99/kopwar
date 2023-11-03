@extends('layouts.main')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-teal disabled">
                        <div class="inner">
                            <h3>@currency($pokok)</h3>

                            <p>Simpanan Pokok</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-vault"></i>
                        </div>
                        <a href="/anggota" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-teal disabled">
                        <div class="inner">
                            <h3>@currency($hariRaya)</h3>

                            <p>Simpanan Hari Raya</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-gift"></i>
                        </div>
                        <a href="/anggota" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-teal disabled">
                        <div class="inner">
                            <h3>@currency($wajib)</h3>

                            <p>Simpanan Wajib</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-money-bill-trend-up"></i>
                        </div>
                        <a href="/anggota" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-teal disabled">
                        <div class="inner">
                            <h3>@currency($wisata)</h3>

                            <p>Simpanan Wisata</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-plane-departure"></i>
                        </div>
                        <a href="/anggota" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-teal disabled">
                        <div class="inner">
                            <h3>@currency($umrah)</h3>

                            <p>Simpanan Umrah</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-kaaba"></i>
                        </div>
                        <a href="/anggota" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Transaksi Simpanan</h3>
            <a href="/user/simpanan/create/{{auth()->user()->user_id}}" class="btn btn-primary float-right">Add new Data</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Anggota</th>
                        <th>Kode Simpanan</th>
                        <th>Jenis Simpanan</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($notConfirmed != null)
                        @foreach ($notConfirmed as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->user->nama_lengkap }}</td>
                                <td>{{ $item->kode_simpanan }}</td>
                                <td>{{ $item->simpan->jenis_simpanan }}</td>
                                <td>@currency($item->jumlah)</td>
                                <td>Tunggu Konfirmasi</td>
                            </tr>
                        @endforeach
                    @endif
                    @foreach ($list as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->user->nama_lengkap }}</td>
                            <td>{{ $item->kode_simpanan }}</td>
                            <td>{{ $item->category->jenis_simpanan }}</td>
                            <td>@currency($item->jumlah)</td>
                            <td>
                                <a href="/invoice/simpanan/{{ $item->id }}" data-toggle="tooltip" data-placement="top"
                                    title="Invoice" class="btn btn-outline-secondary"><i class="fa-solid fa-print"></i></a>
                                <a href="/viewSimpanan/{{ $item->id }}" data-toggle="tooltip" data-placement="top"
                                    title="View" class="btn btn-outline-primary"><i class="fa-solid fa-eye"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama Anggota</th>
                        <th>Kode Simpanan</th>
                        <th>Jenis Simpanan</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
