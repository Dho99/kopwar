<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky mt-3 sidebar-sticky bg-blue">
        <div class="ms-3 mb-3 mt-5 text-light fw-bold">
            MENU
        </div>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ ($title === 'Dashboard') ? 'text-light borleft' : '' }}" aria-current="page" href="/dashboard">
              <span data-feather="home" class="align-items-center align-text-center mb-1 ms-2 {{ ($title === 'Dashboard') ? 'text-light' : '' }}"></span>
              Dashboard
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{ ($title === 'Pinjaman') ? 'text-light borleft' : '' }}" aria-current="page" href="/pinjaman">
              <span data-feather="dollar-sign" class="align-items-center align-text-center mb-1 ms-2 {{ ($title === 'Pinjaman') ? 'text-light' : '' }}"></span>
              Pinjaman
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{ ($title === 'Simpanan') ? 'text-light borleft' : '' }}" aria-current="page" href="/simpanan">
              <span data-feather="pocket" class="align-items-center align-text-center mb-1 ms-2 {{ ($title === 'Simpanan') ? 'text-light' : '' }}"></span>
              Simpanan
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{ ($title === 'Angsuran') ? 'text-light borleft' : '' }}" aria-current="page" href="/angsuran">
              <span data-feather="credit-card" class="align-items-center align-text-center mb-1 ms-2 {{ ($title === 'Angsuran') ? 'text-light' : '' }}"></span>
              Angsuran
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{ ($title === 'Akun') ? 'text-light borleft' : '' }}" aria-current="page" href="/akun">
              <span data-feather="user" class="align-items-center align-text-center mb-1 ms-2 {{ ($title === 'Akun') ? 'text-light' : '' }}"></span>
              Info Akun 
            </a>
          </li>

          <li class="nav-item">
            <button type="button" class="btn ms-2 text-light mt-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
              <span class="me-1" data-feather="log-out"></span> Log Out
            </button>
          </li>


        </ul>
      </div>
    </nav>
  </div>
</div>