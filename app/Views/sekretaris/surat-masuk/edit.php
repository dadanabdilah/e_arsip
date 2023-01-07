<?php echo view('layout/header'); ?>
<?php echo view('layout/s-sidebar'); ?>
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
                            <a href="<?= site_url('sekretaris/surat-masuk') ?>" class="btn btn-primary btn-sm">Kembali</a>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="<?php echo base_url('sekretaris/surat-masuk/' . $SMasuk->id_sm) ?>" enctype="multipart/form-data">
                                <input type="hidden" name="_method" value="put">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nomor Surat</label>
                                                <input type="text" name="no_sm" value="<?= $SMasuk->no_sm ?>" class="form-control" placeholder="Masukan Nomor Surat">
                                            </div>
                                            <div class="form-group">
                                                <label>Kode Arsip</label>
                                                <select class="form-control" name="kode_tersier">
                                                    <option>Pilih</option>
                                                    <?php foreach ($Tersier as $key => $value) { ?>
                                                        <option value="<?= $value->kode_tersier ?>" <?= $SMasuk->kode_tersier == $value->kode_tersier ? 'selected' : ''; ?>><?= $value->tersier ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Unit Kerja</label>
                                                <select class="form-control" name="id_unit">
                                                    <option>Pilih</option>
                                                    <?php foreach ($Kerja as $key => $value) { ?>
                                                        <option value="<?= $value->id_unit ?>" <?= $SMasuk->id_unit == $value->id_unit ? 'selected' : ''; ?>><?= $value->nama_unit ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Berkas Surat</label>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <button type="button" id="show_preview" class="btn btn-primary btn-sm btn-block mt-auto">Lihat File Sebelumnya</button>
                                                        <button type="button" id="close_preview" class="btn btn-primary btn-sm btn-block mt-auto" style="display : none">Close Preview File Sebelumnya</button>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="file" name="berkas" value="<?= $SMasuk->berkas ?>" class="form-control" placeholder="Masukan Nama Arsip">
                                                        <input type="hidden" name="old_berkas" value="<?= $SMasuk->berkas ?>" class="form-control" placeholder="Masukan Nama Arsip">
                                                        <input type="hidden" name="berkas_url" value="<?= $SMasuk->berkas_url ?>" class="form-control" placeholder="Masukan Nama Arsip">
                                                        <small class="text-danger">Format file harus .pdf</small>
                                                    </div>
                                                </div>
                                                <div class="row" id="file_preview" style="display : none;">
                                                    <div class="col">
                                                        <iframe width="100%" height="400px" src="<?= site_url() . $SMasuk->berkas_url . '/' . $SMasuk->berkas ?>"></iframe>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Perihal</label>
                                                <input type="text" name="perihal" value="<?= $SMasuk->perihal ?>" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Lampiran</label>
                                                <input type="text" name="lampiran" value="<?= $SMasuk->lampiran ?>" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Tanggal Diterima</label>
                                                <input type="date" name="tgl_diterima" value="<?= $SMasuk->tgl_diterima ?>" class="form-control" placeholder="Masukan Nama Arsip">
                                            </div>
                                            <div class="form-group">
                                                <label>Tanggal Surat Masuk</label>
                                                <input type="date" name="tgl_sm" value="<?= $SMasuk->tgl_sm ?>" class="form-control" placeholder="Masukan Nama Arsip">
                                            </div>
                                        </div>
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