@extends('user.layouts.main')

@include('user.partials.navbar')
@include('user.partials.sidebar')
@section('container-fluid')
    <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 my-2">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Detail {{ $title }}</h1>
      </div>

  <div class="col-xl-3 col-md-6">
          <div class="card bg-secondary p-3 text-light">
              <div class="card-block">
                  <div class="row align-items-end">
                    <div class="col-8">
                      <h6 class="fs-6 m-b-0">Sisa Angsuran</h6>
                      <div class="fs-5">@currency($jumlah)</div>
                      
                      </div>
                      <div class="col-4 text-right">
                        <img src="img/pay.png" class="res-image" alt="">
                      </div>
                  </div>
              </div>
          </div>
  </div> 

  <div class="text-center mt-5 mb-5 bg-dark-subtle p-4 rounded-3">
    <p class="h2 mb-3">Riwayat {{$title}}</p>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Kode Pinjaman</th>
          <th scope="col">Jumlah Angsuran</th>
          <th scope="col">Waktu Bayar</th>
        </tr>
      </thead>
      {{-- {{$riwayat}} --}}
      <tbody>
        @foreach ($riwayat as $items)
        <tr>
          <td>{{$items->kode_pinjaman}}</td>
          <td>@currency($items->jumlah_angsur)</td>
          
          <td>{{$items->timestamp}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>


</div> 
      
  






    
   


    @endsection