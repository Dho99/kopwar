@extends('admin.layouts.main')
@include('admin.partials.navbar')
@include('admin.partials.offcanvas')

<div class="container-fluid px-5 py-4">

    <div class="border-bottom">
        <h1>{{ $title }}</h1>
    </div>

    <div class="row mb-3 g-3 mt-3">

        <div class="col-xl-4 col-md-6">
          <div class="card p-3 text-light" style="background-color: #243763;">
              <div class="card-block">
                  <div class="row align-items-end">
                    <div class="col-8">
                      <h6 class="fs-5 m-b-0 fw-normal">Total Pinjaman</h6>
                      <div class="fs-4">@currency($pinjamans)</div>                  
                      </div>
                      <div class="col-4 text-right">
                        <img src="{{ asset('img/pinjaman.png') }}" class="icon-items img-fluid" alt="">
                      </div>
                    <div class="border-light border-top mt-2">
                        <div class="col-12 mt-2">
                            <a href="" class="text-decoration-none btn btn-outline-secondary text-light">Selengkapnya <span data-feather="chevron-right"></span> </a>
                        </div>
                    </div>
                  </div>
              </div>
          </div>
        </div>

        <div class="col-xl-4 col-md-6">
          <div class="card p-3 text-light" style="background-color: #243763;">
              <div class="card-block">
                  <div class="row align-items-end">
                    <div class="col-8">
                      <h6 class="fs-5 m-b-0 fw-normal">Total Simpanan</h6>
                      <div class="fs-4">@currency($simpanans)</div>                  
                      </div>
                      <div class="col-4 text-right">
                        <img src="{{ asset('img/wallet.png') }}" class="icon-items img-fluid" alt="">
                      </div>
                      <div class="border-light border-top mt-2">
                        <div class="col-12 mt-2">
                            <a href="" class="text-decoration-none btn btn-outline-secondary text-light">Selengkapnya  <span data-feather="chevron-right"></span> </a>
                        </div>
                    </div>
                  </div>
              </div>
          </div>
        </div>

        <div class="col-xl-4 col-md-6">
          <div class="card p-3 text-light" style="background-color: #243763;">
              <div class="card-block">
                  <div class="row align-items-end">
                    <div class="col-8">
                      <h6 class="fs-5 m-b-0 fw-normal">Total Piutang</h6>
                      <div class="fs-4">@currency($angsurans)</div>                  
                      </div>
                      <div class="col-4 text-right">
                        <img src="{{ asset('img/cicilan.png') }}" class="icon-items img-fluid" alt="">
                      </div>
                      <div class="border-light border-top mt-2">
                        <div class="col-12 mt-2">
                            <a href="" class="text-decoration-none btn btn-outline-secondary text-light">Selengkapnya <span data-feather="chevron-right"></span> </a>
                        </div>
                    </div>
                  </div>
              </div>
          </div>
        </div>

        <div class="col-xl-4 col-md-6">
          <div class="card p-3 text-light" style="background-color: #243763;">
              <div class="card-block">
                  <div class="row align-items-end">
                    <div class="col-8">
                      <h6 class="fs-5 m-b-0 fw-normal">Total Anggota</h6>
                      <div class="fs-4">{{ $users->count() }}</div>                  
                      </div>
                      <div class="col-4 text-right">
                        <img src="{{ asset('img/user.png') }}" class="icon-items img-fluid" alt="">
                      </div>
                      <div class="border-light border-top mt-2">
                        <div class="col-12 mt-2">
                            <a href="" class="text-decoration-none btn btn-outline-secondary text-light">Selengkapnya <span data-feather="chevron-right"></span> </a>
                        </div>
                    </div>
                  </div>
              </div>
          </div>
        </div>

</div>