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
                            <a href="<?= site_url('admin/disposisi') ?>" class="btn btn-primary btn-sm">Kembali</a>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="<?php echo base_url('admin/disposisi/' . $Disposisi->id_disposisi) ?>">
                                <input type="hidden" name="_method" value="put">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Tanggal Terima</label>
                                        <input type="date" name="tgl_terima" value="<?= $Disposisi->tgl_terima ?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Tingkat Keamanan</label>
                                        <input type="text" name="tingkat_keamanan" value="<?= $Disposisi->tingkat_keamanan ?>" class="form-control" placeholder="Masukan Tingkat Keamanan">
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Selesai</label>
                                        <input type="date" name="tgl_selesai" value="<?= $Disposisi->tgl_selesai ?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Surat Masuk</label>
                                        <select class="form-control" name="id_sm">
                                            <option>Pilih</option>
                                            <?php foreach ($SMasuk as $key => $value) { ?>
                                                <option value="<?= $value->id_sm ?>" <?= $value->id_sm == $Disposisi->id_sm ? 'selected' : '' ?>><?= $value->no_sm ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Disposisi</label>
                                        <input type="text" name="disposisi" value="<?= $Disposisi->disposisi ?>" class="form-control" placeholder="Masukan Disposisi">
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" name="status">
                                            <option value="" selected disabled>Pilih</option>
                                            <option value="menunggu_diajukan" <?= $Disposisi->status == 'menunggu_diajukan' ? 'selected' : '' ?>>Menunggu Diajukan</option>
                                            <option value="diajukan" <?= $Disposisi->status == 'diajukan' ? 'selected' : '' ?>>Diajukan</option>
                                            <option value="selesai" <?= $Disposisi->status == 'selesai' ? 'selected' : '' ?>>Selesai</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Bidang</label>
                                        <select class="form-control" name="id_bidang">
                                            <option>Pilih</option>
                                            <?php foreach ($Bidang as $key => $value) { ?>
                                                <option value="<?= $value->id_bidang ?>" <?= $value->id_bidang == $Disposisi->id_bidang ? 'selected' : '' ?>><?= $value->nama_bidang ?></option>
                                            <?php } ?>
                                        </select>
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