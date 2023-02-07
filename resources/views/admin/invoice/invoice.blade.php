@extends('admin.layouts.main')
{{-- {{session()->get('data')}} --}}
<div class="card">
  <div class="card-body">
    <div class="container mb-5">
      <div class="row d-flex align-items-baseline">
        <div class="col-xl-9">
          <img src="{{asset('img/logo_intens.png')}}" width="100" class="mb-2" alt="">
        </div>
        <div class="col-xl-3 float-end">
        </div>
        <hr>
      </div>

      <div class="container">
        <div class="col-md-12">
          <div class="text-center">
            <i class="fab fa-mdb fa-4x ms-0" style="color:#5d9fc5 ;"></i>
            <p class="pt-0 fs-1 fw-bold">INVOICE</p>
          </div>

        </div>

    @foreach ($items as $item)
        
        <div class="row">
          <div class="col-xl-8">
            <ul class="list-unstyled">
              <li class="text-muted">To: <span style="color:#5d9fc5 ;">{{$item->nama_lengkap}}</span></li>
            </ul>
          </div>
          <div class="col-xl-4">
            <ul class="list-unstyled">
              <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                  class="fw-bold">Kode Pinjaman: </span>{{session('data')->kode_pinjaman}}</li>
              <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                  class="fw-bold">Transaksi dibuat: </span>{{session('data')->timestamp}}</li>
            </ul>
          </div>
        </div>

        <div class="row my-2 mx-1 justify-content-center">
          <table class="table table-striped table-borderless text-center">
            <thead class="bg-primary text-light">
              <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Periode</th>
                  <th scope="col">Jumah Pinjaman</th> 
                  <th scope="col">Keterangan Pinjaman</th> 
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{session('data')->periode}}</td>
                <td>@currency(session('data')->jumlah_pinjaman)</td>
                <td>{{session('data')->keterangan}}</td>
              </tr>
            </tbody>

          </table>
        </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-xl-10">
            <p>Harap Ingat dan Simpan dengan Baik</p>
          </div>
        @endforeach
          <div class="col-xl-2">
            <a href="/admin/data/anggota" class="btn btn-primary">Kembali</a>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>