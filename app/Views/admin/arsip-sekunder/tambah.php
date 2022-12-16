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
                        <div class="card-header">
                            <a href="<?= site_url('admin/arsip-sekunder') ?>" class="btn btn-primary btn-sm">Kembali</a>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="<?php echo base_url('admin/arsip-sekunder') ?>">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Kode Primer</label>
                                        <select class="form-control" name="kode_primer">
                                            <option>Pilih</option>
                                            <?php foreach ($Primer as $key => $value) { ?>
                                                <option value="<?= $value->kode_primer ?>"><?= $value->primer ?></option>
                                            <?php } ?>
                                        </select>    
                                    </div>
                                    <div class="form-group">
                                        <label>Kode Arsip</label>
                                        <input type="text" name="kode" class="form-control" placeholder="Masukan Kode Arsip">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Arsip</label>
                                        <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Arsip">
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