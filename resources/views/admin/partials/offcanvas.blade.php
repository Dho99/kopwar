<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header bg-blue">
      <h5 class="offcanvas-title" id="offcanvasExampleLabel">
        <img src="{{ asset('img/header_intens.png') }}" class="img-fluid res-img" alt="">
      </h5>
      <button type="button" class="btn-close bg-light" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="bg-blue h-100 pt-5">

@if (auth()->user()->level == 'admin')

        <a class="nav-link text-light p-2 mb-1 {{ ($title === 'Dashboard') ? 'text-light bg-dark border-start border-danger border-5' : '' }}" aria-current="page" href="/admin/dashboard">
          <span data-feather="home" class="align-items-center align-text-center mb-1 ms-2 me-3 {{ ($title === 'Dashboard') ? 'text-light' : '' }}"></span>
           Dashboard
        </a>


        <div class="accordion accordion-flush text-light" id="firstAccordion">
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-heading">
              <button class="accordion-button text-light" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseOne" style="background-color: #404E67;">
                <span data-feather="file-text" class="align-items-center align-text-center me-3"></span> Data
              </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse bg-blue" aria-labelledby="flush-heading" data-bs-parent="#firstAccordion">
              <div class="accordion-body p-0"> 

                <a class="nav-link text-light p-2 {{ ($title === 'Data Anggota') ? 'text-light bg-dark border-start border-danger border-5' : '' }}" aria-current="page" href="/admin/data/anggota">
                  <span data-feather="users" class="align-items-center align-text-center mb-1 ms-4 me-3 {{ ($title === 'Data Anggota') ? 'text-light' : '' }}"></span>
                  Data Anggota
                </a>

                <a class="nav-link text-light p-2 {{ ($title === 'Data Pinjaman') ? 'text-light bg-dark border-start border-danger border-5' : '' }}" aria-current="page" href="/admin/data/pinjaman">
                  <img  src="{{ asset('img/pinjaman.png') }}" width="32px" class="align-items-center align-text-center mb-1 ms-4 me-3">
                  Data Pinjaman
                </a>

                <a class="nav-link text-light p-2 {{ ($title === 'Data Simpanan') ? 'text-light bg-dark border-start border-danger border-5' : '' }}" aria-current="page" href="/admin/data/simpanan">
                  <img  src="{{ asset('img/cicilan.png') }}" width="32px" class="align-items-center align-text-center mb-1 ms-4 me-3">
                  Data Simpanan
                </a>

                <a class="nav-link text-light p-2 {{ ($title === 'Data Angsuran') ? 'text-light bg-dark border-start border-danger border-5' : '' }}" aria-current="page" href="/admin/data/angsuran">
                  <img  src="{{ asset('img/bayar.png') }}" width="32px" class="align-items-center align-text-center mb-1 ms-4 me-3">
                  Data Angsuran
                </a>




              </div>
            </div>
          </div>
        </div>
     

        <div class="accordion accordion-flush" id="accordionFlushExample">
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
              <button class="accordion-button text-light" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne" style="background-color: #404E67;">
               <img src="{{ asset('img/cicilan.png') }}" alt="" width="32px" class="me-2"> Transaksi
              </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse bg-blue" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body p-0"> 
                <a class="nav-link text-light p-2 {{ ($title === 'Form Simpanan') ? 'text-light bg-dark border-start border-danger border-5' : '' }}" aria-current="page" href="/admin/transaksi/simpanan">
                <span data-feather="save" class="align-items-center align-text-center mb-1 ms-4 me-3 {{ ($title === 'Data Simpanan') ? 'text-light' : '' }}"></span>
                Simpanan
                </a>
                <a class="nav-link text-light p-2 {{ ($title === 'Data Pinjaman') ? 'text-light bg-dark border-start border-danger border-5' : '' }}" aria-current="page" href="/admin/transaksi/tambah-pinjaman">
                  <span data-feather="dollar-sign" class="align-items-center align-text-center mb-1 ms-4 me-3 {{ ($title === 'Data Pinjaman') ? 'text-light' : '' }}"></span>
                  Pinjaman
                </a>
                <a class="nav-link text-light p-2 {{ ($title === 'Form Angsuran') ? 'text-light bg-dark border-start border-danger border-5' : '' }}" aria-current="page" href="/admin/transaksi/angsuran">
                  <span data-feather="credit-card" class="align-items-center align-text-center mb-1 ms-4 me-3 {{ ($title === 'Data Pinjaman') ? 'text-light' : '' }}"></span>
                  Angsuran
                </a>
              </div>
            </div>
          </div>
        </div>

        {{-- <div class="accordion accordion-flush text-light" id="thirdAccordion">
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-heading">
              <button class="accordion-button text-light" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThird" aria-expanded="false" aria-controls="flush-collapseOne" style="background-color: #404E67;">
                Laporan
              </button>
            </h2>
            <div id="flush-collapseThird" class="accordion-collapse collapse bg-blue" aria-labelledby="flush-heading" data-bs-parent="#thirdAccordion">
              <div class="accordion-body p-0"> 
               
              </div>
            </div>
          </div>
        </div> --}}
@endif

        <form action="/logout" method="post" class="ms-4 pt-5">
          @csrf
            <button type="submit" class="btn btn-danger" style="width: 200px; height: 50px;">Logout</button>
        </form>
    </div>
  </div>