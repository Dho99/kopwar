@extends('user.layouts.main')

@include('user.partials.navbar')
@include('user.partials.sidebar')
@section('container-fluid')
    <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 my-2">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Detail {{ $title }}</h1>
      </div>


<div class="row mb-3 g-3">

      <div class="col-xl-3 col-md-6">
        <div class="card bg-secondary p-3 text-light">
            <div class="card-block">
                <div class="row align-items-end">
                  <div class="col-8">
                    <h6 class="fs-6 m-b-0">Wajib</h6>
                    <div class="fs-5">@currency($total_simwa)</div>
                    
                    </div>
                    <div class="col-4 text-right">
                      <img src="img/saving.png" class="res-image" alt="">
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
                    <h6 class="fs-6 m-b-0">Pokok</h6>
                    <div class="fs-5">@currency($total_simpok)</div>
                    
                    </div>
                    <div class="col-4 text-right">
                      <img src="img/safe-box.png" class="res-image" alt="">
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
                    <h6 class="fs-6 m-b-0">Hari Raya</h6>
                    <div class="fs-5">@currency($total_shr)</div>
                    
                    </div>
                    <div class="col-4 text-right">
                      <img src="img/calendar.png" class="res-image" alt="">
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
                    <h6 class="fs-6 m-b-0">Wisata</h6>
                    <div class="fs-5">@currency($total_wisata)</div>
                    
                    </div>
                    <div class="col-4 text-right">
                      <img src="img/tour.png" class="res-image" alt="">
                    </div>
                </div>
            </div>
        </div>
      </div>
</div>

<div class="row mb-3 g-3">
      <div class="col-xl-3 col-md-6">
        <div class="card bg-secondary p-3 text-light">
            <div class="card-block">
                <div class="row align-items-end">
                  <div class="col-8">
                    <h6 class="fs-6 m-b-0">Umroh</h6>
                    <div class="fs-5">@currency($total_umroh)</div>
                    
                    </div>
                    <div class="col-4 text-right">
                      <img src="img/umroh.png" class="res-image" alt="">
                    </div>
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
        <th scope="col">Periode</th>
        <th scope="col">Pokok</th>
        <th scope="col">Wajib</th>
        <th scope="col">Hari Raya</th>
        <th scope="col">Wisata</th>
        <th scope="col">Umroh</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($riwayat as $items)
      <tr>
        <td>{{$items['periode']}}</td>
        <td>{{$items['simpok']}}</td>
        <td>{{$items['simwa']}}</td>
        <td>{{$items['shr']}}</td>
        <td>{{$items['wisata']}}</td>
        <td>{{$items['umroh']}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>


  






    
   


    @endsection