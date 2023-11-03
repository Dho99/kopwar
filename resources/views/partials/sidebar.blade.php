   <!-- Main Sidebar Container -->
   <aside class="main-sidebar sidebar-dark-primary elevation-4">
       <!-- Brand Logo -->
       <a href="/dashboard" class="brand-link">
           <img src="{{ asset('dist/img/header_intens.png') }}" alt="" class="img-fluid p-2">
           {{-- <span class="brand-text font-weight-light">Kopwar</span> --}}
       </a>
       

       <!-- Sidebar -->
       <div class="sidebar">

           <!-- Sidebar Menu -->
           @if (auth()->user()->level === 'Pengurus')
               <nav class="mt-5">
                   <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                       data-accordion="false">
                       <li class="nav-item">
                           <p class="text-light ml-2 my-3 font-weight-bold">MENU</p>
                       </li>
                       <li class="nav-item">
                           <a href="/dashboard" class="nav-link {{ $title === 'Dashboard' ? 'active' : '' }}">
                               <i class="nav-icon fas fa-tachometer-alt"></i>
                               <p>
                                   Dashboard
                               </p>
                           </a>
                       </li>

                       <li class="nav-item">
                           <a href="/aktivitas" class="nav-link {{ $title === 'Log Aktivitas' ? 'active' : '' }}">
                               <i class="nav-icon fa-solid fa-clock-rotate-left"></i>
                               <p>
                                   Log Aktivitas
                               </p>
                           </a>
                       </li>

                       <li class="nav-item">
                           <a href="/pengajuan" class="nav-link {{ $title === 'Pengajuan' ? 'active' : '' }}">
                               <i class="nav-icon fa-solid fa-rectangle-list"></i>
                               <p>
                                   Pengajuan
                               </p>
                           </a>
                       </li>

                       <li class="nav-item">
                           <a href="#"
                               class="nav-link {{ $title === 'Pinjaman' || $title === 'Invoice' || $title === 'Simpanan' || $title === 'Angsuran' ? 'active' : '' }}">
                               <i class="nav-icon fas fa-solid fa-money-bill-transfer"></i>
                               <p>
                                   Transaksi
                                   <i class="fas fa-angle-left right"></i>
                                   {{-- <span class="badge badge-info right">6</span> --}}
                               </p>
                           </a>

                           <ul class="nav nav-treeview">
                               <li class="nav-item">
                                   <a href="/pinjaman" class="nav-link {{ $title === 'Pinjaman' ? 'active' : '' }}">
                                       <i class="far fa-circle nav-icon"></i>
                                       <p>Pinjaman</p>
                                   </a>
                               </li>
                               <li class="nav-item">
                                   <a href="/simpanan" class="nav-link {{ $title === 'Simpanan' ? 'active' : '' }}">
                                       <i class="far fa-circle nav-icon"></i>
                                       <p>Simpanan</p>
                                   </a>
                               </li>
                               <li class="nav-item">
                                   <a href="/angsuran" class="nav-link {{ $title === 'Angsuran' ? 'active' : '' }}">
                                       <i class="far fa-circle nav-icon"></i>
                                       <p>Angsuran</p>
                                   </a>
                               </li>
                           </ul>
                       </li>

                       <li class="nav-item">
                           <a href="#"
                               class="nav-link {{ $title === 'Laporan Pinjaman' || $title === 'Laporan Simpanan' || $title === 'Laporan Angsuran' ? 'active' : '' }}">
                               <i class="nav-icon fas fa-solid fa-note-sticky"></i>
                               <p>
                                   Laporan
                                   <i class="fas fa-angle-left right"></i>
                                   {{-- <span class="badge badge-info right">6</span> --}}
                               </p>
                           </a>
                           <ul class="nav nav-treeview">
                               <li class="nav-item">
                                   <a href="/laporanPinjaman"
                                       class="nav-link {{ $title === 'Laporan Pinjaman' ? 'active' : '' }}">
                                       <i class="far fa-circle nav-icon"></i>
                                       <p>Pinjaman</p>
                                   </a>
                               </li>
                               <li class="nav-item">
                                   <a href="/laporanSimpanan"
                                       class="nav-link {{ $title === 'Laporan Simpanan' ? 'active' : '' }}">
                                       <i class="far fa-circle nav-icon"></i>
                                       <p>Simpanan</p>
                                   </a>
                               </li>
                               <li class="nav-item">
                                   <a href="/laporanAngsuran"
                                       class="nav-link {{ $title === 'Laporan Angsuran' ? 'active' : '' }}">
                                       <i class="far fa-circle nav-icon"></i>
                                       <p>Angsuran</p>
                                   </a>
                               </li>
                           </ul>
                       </li>

                       <li class="nav-item">
                           <a href="#"
                               class="nav-link {{ $title === 'Anggota' || $title === 'Kategori Simpanan' || $title === 'Pengurus' ? 'active' : '' }}">
                               <i class="nav-icon fas fa-address-book"></i>
                               <p>
                                   Data
                                   <i class="fas fa-angle-left right"></i>
                                   {{-- <span class="badge badge-info right">6</span> --}}
                               </p>
                           </a>
                           <ul class="nav nav-treeview">
                               <li class="nav-item">
                                   <a href="/pengurus" class="nav-link {{ $title === 'Pengurus' ? 'active' : '' }}">
                                       <i class="far fa-circle nav-icon"></i>
                                       <p>Pengurus</p>
                                   </a>

                                   <a href="/anggota" class="nav-link {{ $title === 'Anggota' ? 'active' : '' }}">
                                       <i class="far fa-circle nav-icon"></i>
                                       <p>Anggota</p>
                                   </a>

                               </li>
                               {{-- <li class="nav-item">
                                   <a href="/categorySimpanan"
                                       class="nav-link {{ $title === 'Kategori Simpanan' ? 'active' : '' }}">
                                       <i class="far fa-circle nav-icon"></i>
                                       <p>Kategori Simpanan</p>
                                   </a>
                               </li> --}}



                           </ul>
                       </li>

                   </ul>
               </nav>
           @else
               <nav class="mt-5">
                   <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                       data-accordion="false">
                       <li class="nav-item">
                           <p class="text-light ml-2 my-3 font-weight-bold">MENU</p>
                       </li>
                       <li class="nav-item">
                           <a href="/user/dashboard" class="nav-link {{ $title === 'Dashboard' ? 'active' : '' }}">
                               <i class="nav-icon fas fa-tachometer-alt"></i>
                               <p>
                                   Dashboard
                               </p>
                           </a>
                       </li>

                       <li class="nav-item">
                           <a href="#"
                               class="nav-link {{ $title === 'Pinjaman' || $title === 'Invoice' || $title === 'Simpanan' || $title === 'Angsuran' ? 'active' : '' }}">
                               <i class="nav-icon fas fa-solid fa-money-bill-transfer"></i>
                               <p>
                                   Transaksi
                                   <i class="fas fa-angle-left right"></i>
                                   {{-- <span class="badge badge-info right">6</span> --}}
                               </p>
                           </a>

                           <ul class="nav nav-treeview">
                               <li class="nav-item">
                                   <a href="/user/pinjaman/{{auth()->user()->user_id}}"
                                       class="nav-link {{ $title === 'Pinjaman' ? 'active' : '' }}">
                                       <i class="far fa-circle nav-icon"></i>
                                       <p>Pinjaman</p>
                                   </a>
                               </li>
                               <li class="nav-item">
                                   <a href="/user/simpanan/{{auth()->user()->user_id}}"
                                       class="nav-link {{ $title === 'Simpanan' ? 'active' : '' }}">
                                       <i class="far fa-circle nav-icon"></i>
                                       <p>Simpanan</p>
                                   </a>
                               </li>
                               <li class="nav-item">
                                   <a href="/user/angsuran/{{auth()->user()->user_id}}"
                                       class="nav-link {{ $title === 'Angsuran' ? 'active' : '' }}">
                                       <i class="far fa-circle nav-icon"></i>
                                       <p>Angsuran</p>
                                   </a>
                               </li>
                           </ul>
                       </li>

                       {{-- <li class="nav-item">
                           <a href="/user/pengajuan/{{auth()->user()->user_id}}" class="nav-link {{ $title === 'Pengajuan' ? 'active' : '' }}">
                               <i class="nav-icon fa-solid fa-rectangle-list"></i>
                               <p>
                                   Pengajuan
                               </p>
                           </a>
                       </li> --}}

                   </ul>
                   </li>

                   </ul>
               </nav>
           @endif
           <!-- /.sidebar-menu -->
       </div>
       <!-- /.sidebar -->
   </aside>
