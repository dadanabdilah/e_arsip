                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                            with font-awesome or any other icon font library -->
                        <li class="nav-item menu-open">
                            <a href="<?php echo base_url('pimpinan/dashboard') ?>" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('pimpinan/disposisi') ?>" class="nav-link">
                                <i class="nav-icon fas fa-tree"></i>
                                <p>
                                    Surat Disposisi
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
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>laporan Surat Masuk</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('Laporansk') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Laporan Surat Keluar</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('Laporandis') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
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