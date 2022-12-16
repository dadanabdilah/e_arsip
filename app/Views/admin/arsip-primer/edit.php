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
                            <a href="<?= site_url('admin/arsip-primer') ?>" class="btn btn-primary btn-sm">Kembali</a>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo base_url('admin/arsip-primer/' . $Primer->id_primer) ?>" method="POST">
                                <input type="hidden" name="_method" value="put" />
                                
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Kode Arsip</label>
                                        <input type="text" name="kode" value="<?= $Primer->kode_primer ?>" class="form-control" placeholder="Masukan Kode Arsip">
                                        <input type="hidden" name="old_kode" value="<?= $Primer->kode_primer ?>" class="form-control" placeholder="Masukan Kode Arsip">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Arsip</label>
                                        <input type="text" name="nama" value="<?= $Primer->primer ?>" class="form-control" placeholder="Masukan Nama Arsip">
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