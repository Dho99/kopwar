<header class="navbar navbar-dark sticky-top bg-blue flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6"><img class="img-fluid" src="{{ asset('img/header_intens.png') }}" alt=""></a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="form-control text-end text-light fw-normal bg-blue me-5 fs-6 border-0 w-100 rounded-0">
    <div class="text-decoration-none mx-auto">
      {{ auth()->user()->nama_lengkap }}
    </div>
  </div>
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
     </div>
  </div>
</header>