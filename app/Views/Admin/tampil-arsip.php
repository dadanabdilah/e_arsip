<?php echo view('layout/header'); ?>
<?php echo view('layout/sidebar'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Arsip</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">

                        <!-- /.card-header -->
                        <div class="card-body">
                            <a class=" btn btn-sm btn-success mb-3" href="<?php echo base_url('/Arsip/tambahData') ?>"><i class="fas fa-plus"></i>Tambah Data</a>
                            <table class="table table-bordered">
                                <tr>
                                    <th style="width: 10px">No</th>
                                    <th>Kode Arsip</th>
                                    <th>Nama Arsip</th>
                                    <th>Aksi</th>
                                </tr>
                                <?php $no = 1;
                                foreach ($dataArsip as $row) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $row->kode_arsip; ?></td>
                                        <td><?= $row->nama_arsip; ?></td>
                                        <td>
                                            <center>
                                                <a class=" btn btn-sm btn-primary" href="<?php echo base_url('Arsip/updateData/' . $row->id_arsip) ?>"><i class="fas fa-edit"></i></a>
                                                <a onclick="return confirm('Yakin Hapus')" class=" btn btn-sm btn-danger" href="<?php echo base_url('/Arsip/deleteData/' . $row->id_arsip) ?>"><i class="fas fa-trash"></i></a>
                                            </center>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </table>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
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