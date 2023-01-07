<?php echo view('layout/header'); ?>
<?php echo view('layout/bid-sidebar'); ?>

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

                            <table class="table table-bordered tabel-resposive">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">No</th>
                                        <th class="text-center">Tanggal Terima</th>
                                        <th>Tingkat Keamanan</th>
                                        <th>Tanggal Selesai</th>
                                        <th>Surat Masuk</th>
                                        <th>Bidang</th>
                                        <th>Disposisi</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
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
                                            <td><?= $value->status == 'menunggu_diajukan' ? '<span class="badge badge-warning">Menunggu Diajukan</span>' : ($value->status == 'diajukan' ? '<span class="badge badge-warning">Diajukan</span>' : ($value->status == 'proses' ? '<span class="badge badge-warning">Proses</span>' : ($value->status == 'proses' ? '<span class="badge badge-warning">Proses</span>' : '<span class="badge badge-success">Selesai</span>'))) ?></td>
                                            <td>
                                                <div class="d-flex">
                                                    <a class=" btn btn-sm btn-primary mr-1" href="<?php echo base_url('bid/disposisi/' .  $value->id_disposisi . '/edit') ?>"><i class="fas fa-edit"></i></a>
                                                </div>
                                            </td>
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

<?php echo view('layout/footer'); ?>