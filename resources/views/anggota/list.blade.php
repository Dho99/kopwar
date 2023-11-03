@extends('layouts.main')
@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Daftar Anggota</h3>
      <a href="/newAnggota" class="btn btn-primary float-right">Add new Data</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Anggota</th>
            <th>Kode Anggota</th>
            <th>Peran</th>
            <th>Status</th>
            <th>Dibuat Pada</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($datas as $item)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$item->nama_lengkap}}</td>
            <td>{{$item->kode_anggota}}</td>
            <td>{{$item->level}}</td>
            <td class="{{ ($item->status === 'Aktif') ? 'text-success' : 'text-danger' }}">{{$item->status}}</td>
            <td>{{$item->created_at->format('d-m-Y')}}</td>
            <td>
              <a href="/viewAnggota/{{$item->user_id}}" data-toggle="tooltip" data-placement="top" title="View" class="btn btn-outline-primary"><i class="fa-solid fa-eye"></i></a>
              <a href="/deleteAnggota/{{$item->user_id}}" data-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-outline-danger" onclick="return confirm('Apakah anda yakin menghapus Data ini?')"><i class="fa-solid fa-trash-can"></i></a>
              <a href="/editAnggota/{{$item->user_id}}" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-outline-secondary"><i class="fa-regular fa-pen-to-square"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <th>No</th>
            <th>Nama Anggota</th>
            <th>Kode Anggota</th>
            <th>Peran</th>
            <th>Status</th>
            <th>Dibuat Pada</th>
            <th>Aksi</th>
          </tr>
          </tfoot>    
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection
