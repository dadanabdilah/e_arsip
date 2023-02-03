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
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid mb-4">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body mb-4">
                            <?php if (session('error') !== null) {  ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong><?= session('error') ?></strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php }  ?>
                            <?php if (session('message') !== null) {  ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong><?= session('message') ?></strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php }  ?>

                            <div class="row">
                                <div class="col-md-4">
                                <form method="POST" action="">
                                    <div class="input-group mb-3">
                                        <input type="date" class="form-control form-control-sm" value="<?= isset($_POST['tanggal_awal']) != null ? $_POST['tanggal_awal'] : '' ; ?>" name="tanggal_awal" aria-describedby="button-addon2" required>
                                        <input type="date" class="form-control form-control-sm" value="<?= isset($_POST['tanggal_akhir']) != null ? $_POST['tanggal_awal'] : '' ; ?>" name="tanggal_akhir" aria-describedby="button-addon2" required>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary btn-sm" type="submit" id="button-addon2" name="filter" value="filter">Filter</button>
                                        </div>
                                    </div>
                                </form>
                                </div>
                                <div class="col-md-8">
                                <a class="btn btn-sm btn-info float-right mb-3" href="#" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-download"></i>Cetak PDF</a>
                                </div>
                            </div>

                            <table class="table table-bordered tabel-resposive">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">No</th>
                                        <th class="text-center">Tanggal Terima</th>
                                        <th>Tingkat Keamanan</th>
                                        <th>Tanggal Selesai</th>
                                        <th>Nomor Surat</th>
                                        <th>Diteruskan Kepada</th>
                                        <th>Disposisi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($Disposisi as $key => $value) { ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $value->tgl_terima ?></td>
                                            <td><?= $value->tingkat_keamanan ?></td>
                                            <td><?= $value->tgl_selesai ?></td>
                                            <td><?= $value->no_sm ?></td>
                                            <td><?= $value->nama_bidang ?></td>
                                            <td><?= $value->disposisi ?></td>

                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card -->
                    <!-- right col -->
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Export PDF</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="">
         <div class="modal-body">
            <label>Masukan Tanggal</label>
            <div class="input-group mb-3">
               <input type="date" class="form-control" value="<?= isset($_POST['tanggal_awal']) != null ? $_POST['tanggal_awal'] : '' ; ?>" name="tanggal_awal"  required>
               <input type="date" class="form-control" value="<?= isset($_POST['tanggal_akhir']) != null ? $_POST['tanggal_akhir'] : '' ; ?>" name="tanggal_akhir"  required>
            </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="pdf" value="pdf" class="btn btn-primary">Cetak PDF</button>
         </div>
      </form>
    </div>
  </div>
</div>

<?php echo view('layout/footer'); ?>