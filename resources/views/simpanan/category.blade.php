@extends('layouts.main')
@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Daftar Kategori Simpanan</h3>
      <a href="/newCategory" class="btn btn-primary float-right">Add new Data</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Jenis Simpanan</th>
            <th>Tanggal Dibuat</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($datas as $item)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$item->jenis_simpanan}}</td>
            <td>{{$item->created_at->format('d-m-Y')}}</td>
            <td>
              <a href="/viewCategory/{{$item->id_jenis_simpanan}}" data-toggle="tooltip" data-placement="top" title="View" class="btn btn-outline-primary"><i class="fa-solid fa-eye"></i></a>
              <a href="/deleteCategory/{{$item->id_jenis_simpanan}}" data-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-outline-danger" onclick="return confirm('Apakah anda yakin menghapus Data ini?')"><i class="fa-solid fa-trash-can"></i></a>
              <a href="/editCategory/{{$item->id_jenis_simpanan}}" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-outline-secondary"><i class="fa-regular fa-pen-to-square"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <th>No</th>
            <th>Jenis Simpanan</th>
            <th>Tanggal Dibuat</th>
            <th>Aksi</th>
          </tr>
          </tfoot>    
      </table>
    </div>
    {{-- @dd($count) --}}
    <!-- /.card-body -->
  </div>
@endsection
