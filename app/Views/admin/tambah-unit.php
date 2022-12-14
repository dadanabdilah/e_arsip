<?php echo view('layout/header'); ?>
<?php echo view('layout/sidebar'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Data Unit</h1>
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
                            <form method="POST" action="<?php echo base_url('Unitkerja/tambahDataAksi') ?>">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Kode Unit</label>
                                        <input type="text" name="kode_unit" class="form-control" placeholder="Masukan Kode Arsip">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Unit</label>
                                        <input type="text" name="nama_unit" class="form-control" placeholder="Masukan Nama Arsip">
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
    </section>
    <!-- right col -->
</div>
<!-- /.row (main row) -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php echo view('layout/footer'); ?>