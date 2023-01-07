<?php echo view('layout/header'); ?>
<?php echo view('layout/sidebar'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $sub_title ?></h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-header d-flex">
                            <a href="<?= site_url('admin/pengaturan') ?>" class="btn btn-primary btn-sm">Pengaturan Aplikasi</a>
                            <a href="<?= site_url('admin/pengaturan/email') ?>" class="btn btn-primary btn-sm ml-1">Pengaturan Email</a>
                            <a href="<?= site_url('admin/pengaturan/wa') ?>" class="btn btn-primary btn-sm ml-1">Pengaturan WhatsApp Gateway</a>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="<?php echo base_url('admin/pengaturan') ?>" enctype="multipart/form-data">
                                <div class="card-body">
                                    <?php if(session('error') !== null) {  ?>
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                            <strong><?= session('error') ?></strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    <?php }  ?>
                                    <?php if(session('message') !== null) {  ?>
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong><?= session('message') ?></strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    <?php }  ?>

                                    <div class="form-group">
                                        <label>Nama Aplikasi</label>
                                        <input type="text" name="nama_aplikasi" value="<?= isset($Pengaturan->nama_aplikasi) ? $Pengaturan->nama_aplikasi : '' ?>" class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label>Logo Aplikasi</label>
                                        <input type="file" name="logo" class="form-control" placeholder="">
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.card -->
                    <!-- right col -->
                </div>
                <!-- /.row (main row) -->
            </div>
            <!-- /.container-fluid -->
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php echo view('layout/footer'); ?>