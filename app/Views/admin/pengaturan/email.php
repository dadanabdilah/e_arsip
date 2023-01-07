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
                            
                            <form method="POST" action="<?php echo base_url('admin/pengaturan/email') ?>">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Host SMTP</label>
                                        <input type="text" name="smtp_host" value="<?= isset($Pengaturan->smtp_host) ? $Pengaturan->smtp_host : '' ?>" class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label>Port SMTP</label>
                                        <input type="text" name="smtp_port" value="<?= isset($Pengaturan->smtp_port) ? $Pengaturan->smtp_port : '' ?>" class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label>Email SMTP</label>
                                        <input type="text" name="smtp_email" value="<?= isset($Pengaturan->smtp_email) ? $Pengaturan->smtp_email : '' ?>" class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label>Username SMTP</label>
                                        <input type="text" name="smtp_user" value="<?= isset($Pengaturan->smtp_user) ? $Pengaturan->smtp_user : '' ?>" class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label>Password SMTP</label>
                                        <input type="text" name="smtp_pass" value="<?= isset($Pengaturan->smtp_pass) ? $Pengaturan->smtp_pass : '' ?>" class="form-control" placeholder="">
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