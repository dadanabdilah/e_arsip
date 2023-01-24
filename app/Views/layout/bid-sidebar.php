                 <!-- Sidebar -->
                 <div class="sidebar">
                     <!-- Sidebar user panel (optional) -->
                     <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                         <div class="image">
                             <img src="<?php echo base_url('template/img/user2-160x160.jpg') ?>" class="img-circle elevation-2" alt="User Image">
                         </div>
                         <div class="info">
                             <a href="#" class="d-block">Bidang</a>
                         </div>
                     </div>
                     <!-- Sidebar Menu -->
                     <nav class="mt-2">
                         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                             <!-- Add icons to the links using the .nav-icon class
                            with font-awesome or any other icon font library -->
                             <li class="nav-item menu-open">
                                 <a href="<?php echo base_url('bid/dashboard') ?>" class="nav-link active">
                                     <i class="nav-icon fas fa-tachometer-alt"></i>
                                     <p>
                                         Dashboard
                                     </p>
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <a href="<?php echo base_url('bid/disposisi') ?>" class="nav-link">
                                     <i class="far fa-solid fa-envelope nav-icon"></i>
                                     <p>
                                         Surat Disposisi
                                     </p>
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <a href="<?php echo base_url('bid/disposisi') ?>" class="nav-link">
                                     <i class="far fa-solid fa-envelope nav-icon"></i>
                                     <p>
                                         Pengajuan Surat
                                     </p>
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <a href="#" class="nav-link">
                                     <i class="nav-icon fas fa-edit"></i>
                                     <p>
                                         Laporan
                                         <i class="fas fa-angle-left right"></i>
                                     </p>
                                 </a>
                                 <ul class="nav nav-treeview">
                                     <li class="nav-item">
                                         <a href="<?php echo base_url('Laporansm') ?>" class="nav-link">
                                             <i class="fas fa-print nav-icon"></i>
                                             <p>laporan Surat Masuk</p>
                                         </a>
                                     </li>
                                     <li class="nav-item">
                                         <a href="<?php echo base_url('Laporansk') ?>" class="nav-link">
                                             <i class="fas fa-print nav-icon"></i>
                                             <p>Laporan Surat Keluar</p>
                                         </a>
                                     </li>
                                     <li class="nav-item">
                                         <a href="<?php echo base_url('Laporandis') ?>" class="nav-link">
                                             <i class="fas fa-print nav-icon"></i>
                                             <p>Laporan Disposisi</p>
                                         </a>
                                     </li>
                                 </ul>
                             </li>
                             <li class="nav-item">
                                 <a href="<?php echo base_url('Ubahpas') ?>" class="nav-link">
                                     <i class="nav-icon fas fa-table"></i>
                                     <p>
                                         Ubah Password
                                     </p>
                                 </a>
                             </li>

                             <li class="nav-item">
                                 <a href="pages/calendar.html" class="nav-link">
                                     <i class="nav-icon far fa-calendar-alt"></i>
                                     <p>
                                         Logout

                                     </p>
                                 </a>
                             </li>
                         </ul>
                     </nav>
                     <!-- /.sidebar-menu -->
                 </div>
                 <!-- /.sidebar -->
                 </aside>