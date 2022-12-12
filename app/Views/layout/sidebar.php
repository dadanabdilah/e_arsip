<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
            <a href="<?php echo base_url('') ?>" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard

                </p>
            </a>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                    Master Data
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Arsip Primer</p>
                    </a>
                    <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Arsip Sekunder</p>
                    </a>
                    <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Arsip Tersier</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('Unitkerja') ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Unit Kerja</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tree"></i>
                <p>
                    Surat
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?php echo base_url('Suratmasuk') ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Surat Masuk</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('Suratkeluar') ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Surat Keluar</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('Disposisi') ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
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