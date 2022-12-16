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
                            <a href="<?= site_url('admin/arsip-tersier') ?>" class="btn btn-primary btn-sm">Kembali</a>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="<?php echo base_url('admin/arsip-tersier/' . $Tersier->id_tersier) ?>">
                                <input type="hidden" name="_method" value="put">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Kode Skunder</label>
                                        <select class="form-control" name="kode_sekunder">
                                            <option>Pilih</option>
                                            <?php foreach ($Skunder as $key => $value) { ?>
                                                <option value="<?= $value->kode_sekunder ?>" <?= $value->kode_sekunder == $Tersier->kode_sekunder ? 'selected' : '' ; ?> ><?= $value->sekunder ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Kode Arsip</label>
                                        <input type="text" name="kode" value="<?= $Tersier->kode_tersier ?>" class="form-control" placeholder="Masukan Kode Arsip">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Arsip</label>
                                        <input type="text" name="nama" value="<?= $Tersier->tersier ?>" class="form-control" placeholder="Masukan Nama Arsip">
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