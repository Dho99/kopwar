 <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        </ul>

        {{-- <p class="">{{auth()->user()}}</p> --}}
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-item user-panel d-flex" data-toggle="dropdown" href="#">
                    <div class="image">
                        <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info mr-4">
                        <div class="d-block text-dark">
                            {{auth()->user()->nama_lengkap}} 
                        <span class="dropdown-toggle ml-1"></span></div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu dropdown-menu-right">
                    @if (auth()->user()->level === 'Pengurus')
                        <a href="/viewAnggota/{{auth()->user()->user_id}}" class="dropdown-item"><i class="fa-solid fa-circle-info mr-2"></i>Info Akun</a>
                    @else
                        <a href="/viewDataAnggota/{{auth()->user()->user_id}}" class="dropdown-item"><i class="fa-solid fa-circle-info mr-2"></i>Info Akun</a>
                    @endif
                    <div class="dropdown-divider"></div>
                    <button type="button" class="btn btn-default dropdown-item text-danger" data-toggle="modal" data-target="#logoutModal">
                        <i class="nav-icon fas fa-arrow-right-from-bracket mr-2"></i> Log out
                      </button>
                    {{-- <a href="/logout" class="dropdown-item text-danger"><i class="nav-icon fas fa-arrow-right-from-bracket mr-2"></i>Log out</a> --}}
                </div>
            </li>
            <!-- Notifications Dropdown Menu -->
            {{-- <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">15</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> 4 Pesan Baru
               </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> 8 Pengajuan

                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                </div>
            </li> --}}
            {{-- <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li> --}}
        </ul>
    </nav>
  <!-- /.navbar -->