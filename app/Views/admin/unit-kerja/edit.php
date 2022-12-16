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
                            <a href="<?= site_url('admin/unit-kerja/') ?>" class="btn btn-primary btn-sm">Kembali</a>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="<?php echo base_url('admin/unit-kerja/' . $UKerja->id_unit) ?>">
                                <input type="hidden" name="_method" value="put" />
                                <div class="card-body">
                                     <div class="form-group">
                                        <label>Kode Unit</label>
                                        <input type="text" name="kode" value="<?= $UKerja->kode_unit ?>" class="form-control" placeholder="Masukan Kode Unit">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Unit</label>
                                        <input type="text" name="nama" value="<?= $UKerja->nama_unit ?>" class="form-control" placeholder="Masukan Nama Unit">
                                    </div>
                                    <div class="form-group">
                                        <label>Kontak</label>
                                        <input type="number" name="kontak" value="<?= $UKerja->kontak ?>" class="form-control" placeholder="Masukan Kontak">
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