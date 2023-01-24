<?php echo view('layout/header'); ?>
<?php echo view('layout/pim-sidebar'); ?>
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
                            <a href="<?= site_url('pimpinan/disposisi') ?>" class="btn btn-primary btn-sm">Kembali</a>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="<?php echo base_url('pimpinan/disposisi/' . $Disposisi->id_disposisi) ?>">
                                <input type="hidden" name="_method" value="put">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Tanggal Terima</label>
                                        <input type="date" name="tgl_terima" value="<?= $Disposisi->tgl_terima ?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Tingkat Keamanan</label>
                                        <select class="form-control" name="tingkat_keamanan">
                                            <option value="" selected disabled>Pilih</option>
                                            <option value="Biasa" <?= $Disposisi->tingkat_keamanan == 'Biasa' ? 'selected' : '' ?>>Biasa</option>
                                            <option value="Penting" <?= $Disposisi->tingkat_keamanan == 'Penting' ? 'selected' : '' ?>>Penting</option>
                                            <option value="Rahasia" <?= $Disposisi->tingkat_keamanan == 'Rahasia' ? 'selected' : '' ?>>Rahasia</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Selesai</label>
                                        <input type="date" name="tgl_selesai" value="<?= $Disposisi->tgl_selesai ?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Surat Masuk</label>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <button type="button" id="show_preview" class="btn btn-primary btn-sm btn-block mt-auto">Lihat File Surat</button>
                                                <button type="button" id="close_preview" class="btn btn-primary btn-sm btn-block mt-auto" style="display : none">Close Preview File Surat</button>
                                            </div>
                                            <div class="col-md-8">
                                                <select class="form-control" name="id_sm">
                                                    <option>Pilih</option>
                                                    <?php foreach ($SMasuk as $key => $value) { ?>
                                                        <option value="<?= $value->id_sm ?>" <?= $value->id_sm == $Disposisi->id_sm ? 'selected' : '' ?>><?= $value->no_sm ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row" id="file_preview" style="display : none;">
                                            <div class="col">
                                                <iframe width="100%" height="400px" src="<?= site_url() . $Disposisi->berkas_url . '/' . $Disposisi->berkas ?>"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Disposisi</label>
                                        <input type="text" name="disposisi" value="<?= $Disposisi->disposisi ?>" class="form-control" placeholder="Masukan Disposisi">
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" name="status">
                                            <option value="" selected disabled>Pilih</option>
                                            <option value="diajukan" <?= $Disposisi->status == 'diajukan' ? 'selected' : '' ?>>Diajukan</option>
                                            <option value="proses" <?= $Disposisi->status == 'proses' ? 'selected' : '' ?>>Proses</option>
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

<?= $this->section('js') ?>
<script>
    $(document).ready(function() {
        $('#show_preview').on('click', function() {
            $('#file_preview').show()
            $('#close_preview').show()
            $('#show_preview').hide()
        })
    })
    $('#close_preview').on('click', function() {
        $('#show_preview').show()
        $('#file_preview').hide()
        $('#close_preview').hide()
    })
</script>
<?= $this->endSection() ?>

<?php echo view('layout/footer'); ?>