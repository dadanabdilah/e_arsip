<?php echo view('layout/header'); ?>
<?php echo view('layout/sidebar'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Data Surat Masuk</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form method="POST" action="<?php echo base_url('/Arsip/tambahDataAksi') ?>">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Kode Arsip</label>
                                        <select class="form-control">
                                            <option>Pilih</option>
                                            <?php foreach ($KodeTersier as $key => $value) { ?>
                                                <option value="<?= $value['kode_tersier'] ?>"><?= $value['tersier'] ?></option>
                                           <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Unit Kerja</label>
                                        <select class="form-control">
                                            <option>Pilih</option>
                                            <?php foreach ($UnitKerja as $key => $value) { ?>
                                                <option value="<?= $value['kode_unit'] ?>"><?= $value['nama_unit'] ?></option>
                                           <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Berkas Surat</label>
                                        <input type="file" name="surat" class="form-control" placeholder="Masukan Nama Arsip">
                                    </div>
                                    <div class="form-group">
                                        <label>Perihal</label>
                                        <input type="file" name="surat" class="form-control" placeholder="Masukan Nama Arsip">
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Diterima</label>
                                        <input type="date" name="tanggal_diterima" class="form-control" placeholder="Masukan Nama Arsip">
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Surat Masuk</label>
                                        <input type="date" name="tanggal_masuk" class="form-control" placeholder="Masukan Nama Arsip">
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