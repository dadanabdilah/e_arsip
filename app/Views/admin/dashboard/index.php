<?php echo view('layout/header'); ?>
<?php echo view('layout/sidebar'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <h1 class="m-0">Sistem Pengelolaan Kearsipan Administrasi Perkantoran</h1>
                <div class="col-sm-6">
                    <h2 class="m-3"><?= $sub_title ?></h2>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- ./col -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?= $sm ?></h3>

                            <p>Surat Masuk</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-email-outline"></i>
                        </div>

                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?= $sk ?></h3>

                            <p>Surat Keluar</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-email"></i>
                        </div>

                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?= $da ?></h3>

                            <p>Disposisi Diajukan</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-email-outline"></i>
                        </div>

                    </div>
                </div>
                <!-- ./col -->

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?= $dp ?></h3>

                            <p>Disposisi Proses</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-email-outline"></i>
                        </div>

                    </div>
                </div>
                <!-- ./col -->

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?= $ds ?></h3>

                            <p>Disposisi Selesai</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-email-outline"></i>
                        </div>

                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->


            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php echo view('layout/footer'); ?>