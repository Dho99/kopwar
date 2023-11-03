@extends('layouts.main')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Log Aktivitas</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Anggota</th>
                        <th>Nama Anggota</th>
                        <th>Aktivitas</th>
                        <th>Peran</th>
                        <th>Dibuat Pada</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->kode_anggota }}</td>
                        <td>{{ $item->nama_lengkap }}</td>
                        <td>{{ $item->aktivitas }}</td>
                        <td>{{ $item->level }}</td>
                        <td>{{ $item->created_at->format('d-m-Y') }}</td>
                        <td>
                            {{-- <a href="/viewAngsuran/{{$item->id}}" data-toggle="tooltip" data-placement="top" title="View" class="btn btn-outline-primary"><i class="fa-solid fa-eye"></i></a> --}}
                            <a href="/deleteAktivitas/{{$item->id}}" data-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-outline-danger" onclick="return confirm('Apakah anda yakin menghapus Data ini?')"><i class="fa-solid fa-trash-can"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Kode Anggota</th>
                        <th>Nama Anggota</th>
                        <th>Aktivitas</th>
                        <th>Peran</th>
                        <th>Dibuat Pada</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
