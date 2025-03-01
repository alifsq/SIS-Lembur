 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <div class="brand-link d-flex justify-content-center align-items-center">
         <span class="brand-text font-weight-bold">SIS - LEMBUR</span>
     </div>


     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
             </div>
             <div class="info">
                 <a href="#" class="d-block">{{ Str::ucfirst(auth()->user()->name) }}</a>
             </div>
         </div>


         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

                 @if (auth()->user()->role == 'admin')
                     <li class="nav-item">
                        <a href="/dashboard" class="nav-link {{ $sidebar === 'dashboard' ? 'active' : '' }}">
                             <i class="nav-icon fas fa-tachometer-alt"></i>
                             <p>
                                 Dashboard
                             </p>
                         </a>
                     </li>
                     <li class="nav-item">
                         <a href="/karyawan" class="nav-link {{ $sidebar === 'karyawan' ? 'active' : '' }}">
                             <i class="nav-icon fas fa-user"></i>
                             <p>
                                 Manajemen Karyawan
                             </p>
                         </a>
                     </li>
                     <li class="nav-item">
                         <a href="/pengajuanlembur"
                             class="nav-link {{ $sidebar === 'pengajuanlembur' ? 'active' : '' }}">
                             <i class="nav-icon fas fa-briefcase"></i>
                             <p>
                                 Manajemen Lembur
                             </p>
                         </a>
                     </li>
                     <li class="nav-item">
                         <a href="/rekapanlaporan" class="nav-link {{ $sidebar === 'rekapan' ? 'active' : '' }}">
                             <i class="nav-icon fas fa-file"></i>
                             <p>
                                 Rekapan Laporan
                             </p>
                         </a>
                     </li>
                 @else
                     <li class="nav-item">
                        <a href="/dashboardkaryawan" class="nav-link {{ $sidebar === 'dashboardkaryawan' ? 'active' : '' }}">
                             <i class="nav-icon fas fa-tachometer-alt"></i>
                             <p>
                                 Dashboard
                             </p>
                         </a>
                     <li class="nav-item">
                        <a href="/pengajuan" class="nav-link {{ $sidebar === 'pengajuanlembur' ? 'active' : '' }}">
                             <i class="nav-icon fas fa-file"></i>
                             <p>
                                 Ajukan Lembur
                             </p>
                         </a>
                     </li>

                     </li>
                 @endif
                 <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>
