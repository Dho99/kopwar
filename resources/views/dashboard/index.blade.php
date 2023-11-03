@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{count($users)}}</h3>

          <p>Pengguna</p>
        </div>
        <div class="icon">
          <i class="fas fa-users"></i>
        </div>
        <a href="/anggota" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3>@currency($totalPinjaman)</h3>

          <p>Total Pinjaman</p>
        </div>
        <div class="icon">
            <i class="fas fa-credit-card"></i>
        </div>
        <a href="/pinjaman" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>@currency($totalSimpanan)</h3>

          <p>Total Simpanan</p>
        </div>
        <div class="icon">
          <i class="fas fa-vault"></i>
        </div>
        <a href="/simpanan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>@currency($totalAngsuran)</h3>

          <p>Total Piutang</p>
        </div>
        <div class="icon">
          <i class="fas fa-solid fa-file-invoice-dollar"></i>
        </div>
        <a href="/angsuran" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>
@endsection