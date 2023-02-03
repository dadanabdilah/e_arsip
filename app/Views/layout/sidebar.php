                 <!-- Sidebar -->
                 <div class="sidebar">
                     <!-- Sidebar user panel (optional) -->
                     <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                         <div class="image">
                             <img src="<?php echo base_url('template/img/user2-160x160.jpg') ?>" class="img-circle elevation-2" alt="User Image">
                         </div>
                         <div class="info">
                             <a href="#" class="d-block">Admin</a>
                         </div>
                     </div>
                     <!-- Sidebar Menu -->
                     <nav class="mt-2">
                         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                             <!-- Add icons to the links using the .nav-icon class
                            with font-awesome or any other icon font library -->
                             <li class="nav-item menu-open">
                                 <a href="<?php echo base_url('admin/dashboard') ?>" class="nav-link active">
                                     <i class="nav-icon fas fa-tachometer-alt"></i>
                                     <p>
                                         Dashboard

                                     </p>
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <a href="#" class="nav-link">
                                     <i class="nav-icon fas fa-archive"></i>
                                     <p>
                                         Master Data
                                         <i class="right fas fa-angle-left"></i>
                                     </p>
                                 </a>
                                 <ul class="nav nav-treeview">
                                     <li class="nav-item">
                                         <a href="<?= site_url('admin/arsip-primer') ?>" class="nav-link">
                                             <i class="fas fa-file-archive nav-icon "></i>
                                             <p>Indeks Primer</p>
                                         </a>
                                         <a href="<?= site_url('admin/arsip-sekunder') ?>" class="nav-link">
                                             <i class="far fa-file-archive nav-icon"></i>
                                             <p>Indeks Sekunder</p>
                                         </a>
                                         <a href="<?= site_url('admin/arsip-tersier') ?>" class="nav-link">
                                             <i class="far fa-file-archive nav-icon"></i>
                                             <p>Indeks Tersier</p>
                                         </a>
                                     </li>
                                     <li class="nav-item">
                                         <a href="<?php echo base_url('admin/unit-kerja') ?>" class="nav-link">
                                             <i class="fas fa-building nav-icon"></i>
                                             <p>Unit Kerja</p>
                                         </a>
                                     </li>
                                     <li class="nav-item">
                                         <a href="<?php echo base_url('admin/bidang') ?>" class="nav-link">
                                             <i class="far fa-building nav-icon"></i>
                                             <p>Bidang</p>
                                         </a>
                                     </li>
                                 </ul>
                             </li>
                             <li class="nav-item">
                                 <a href="#" class="nav-link">
                                     <i class="far fa-thin fa-envelope nav-icon"></i>
                                     <p>
                                         Surat
                                         <i class="fas fa-angle-left right"></i>
                                     </p>
                                 </a>
                                 <ul class="nav nav-treeview">
                                     <li class="nav-item">
                                         <a href="<?php echo base_url('admin/surat-masuk') ?>" class="nav-link">
                                             <i class="far fa-thin fa-envelope nav-icon"></i>
                                             <p>Surat Masuk</p>
                                         </a>
                                     </li>
                                     <li class="nav-item">
                                         <a href="<?php echo base_url('admin/surat-keluar') ?>" class="nav-link">
                                             <i class="far fa-duotone fa-envelope nav-icon"></i>
                                             <p>Surat Keluar</p>
                                         </a>
                                     </li>
                                     <li class="nav-item">
                                         <a href="<?php echo base_url('admin/disposisi') ?>" class="nav-link">
                                             <i class="far fa-solid fa-envelope nav-icon"></i>
                                             <p>Disposisi</p>
                                         </a>
                                     </li>
                                 </ul>
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
                                         <a href="<?php echo base_url('admin/laporan/sm') ?>" class="nav-link">
                                             <i class="fas fa-print nav-icon"></i>
                                             <p>laporan Surat Masuk</p>
                                         </a>
                                     </li>
                                     <li class="nav-item">
                                         <a href="<?php echo base_url('admin/laporan/sk') ?>" class="nav-link">
                                             <i class="fas fa-print nav-icon"></i>
                                             <p>Laporan Surat Keluar</p>
                                         </a>
                                     </li>
                                     <li class="nav-item">
                                         <a href="<?php echo base_url('admin/laporan/disposisi') ?>" class="nav-link">
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
                                 <a href="<?php echo base_url('admin/pengaturan') ?>" class="nav-link">
                                     <i class="nav-icon fas fa-table"></i>
                                     <p>
                                        Pengaturan Aplikasi
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