@extends('user.layouts.main')

@include('user.partials.navbar')
@include('user.partials.sidebar')
@section('container-fluid')
    <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 my-2">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
      </div>


      <div class="row mb-3 g-3">

      <div class="col-xl-3 col-md-6">
        <div class="card bg-secondary p-3 text-light">
            <div class="card-block">
                <div class="row align-items-end">
                  <div class="col-8">
                    <h6 class="fs-6 m-b-0">Total Pinjaman</h6>
                    <div class="fs-5">@currency($pinjaman)</div>                  
                    </div>
                    <div class="col-4 text-right">
                      <img src="img/pinjaman.png" class="res-image" alt="">
                    </div>
                </div>
            </div>
        </div>
      </div>

      <div class="col-xl-3 col-md-6">
        <div class="card bg-secondary p-3 text-light">
            <div class="card-block">
                <div class="row align-items-end">
                  <div class="col-8">
                    <h6 class="fs-6 m-b-0">Total Simpanan</h6>
                    <div class="fs-5">@currency($simpanan)</div>
                    
                    </div>
                    <div class="col-4 text-right">
                      <img src="img/wallet.png" class="res-image" alt="">
                    </div>
                </div>
            </div>
        </div>
      </div>

      <div class="col-xl-3 col-md-6">
        <div class="card bg-secondary p-3 text-light">
            <div class="card-block">
                <div class="row align-items-end">
                  <div class="col-8">
                    <h6 class="fs-6 m-b-0">Sisa Angsuran</h6>
                    <div class="fs-5">@currency($angsurans)</div>
                    
                    </div>
                    <div class="col-4 text-right">
                      <img src="img/pay.png" class="res-image" alt="">
                    </div>
                </div>
            </div>
        </div>
      </div>
</div>

    
    </div>






    
   


    @endsection