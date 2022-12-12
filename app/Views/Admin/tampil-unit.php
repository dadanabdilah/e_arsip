<?php echo view('layout/header'); ?>
<?php echo view('layout/sidebar'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Unit Kerja</h1>
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
                            <a class=" btn btn-sm btn-success mb-3" href="<?php echo base_url('/Unitkerja/tambahData') ?>"><i class="fas fa-plus"></i>Tambah Data</a>
                            <table class="table table-bordered">
                                <tr>
                                    <th style="width: 10px">No</th>
                                    <th>Kode Unit</th>
                                    <th>Nama Unit</th>
                                    <th>Aksi</th>
                                </tr>
                                <?php $no = 1;
                                foreach ($dataUnit as $row) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $row->kode_unit; ?></td>
                                        <td><?= $row->nama_unit; ?></td>
                                        <td>
                                            <center>
                                                <a class=" btn btn-sm btn-primary" href="<?php echo base_url('Unitkerja/updateData/' . $row->id_unit) ?>"><i class="fas fa-edit"></i></a>
                                                <a onclick="return confirm('Yakin Hapus')" class=" btn btn-sm btn-danger" href="<?php echo base_url('Unitkerja/deleteData/' . $row->id_unit) ?>"><i class="fas fa-trash"></i></a>
                                            </center>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </table>
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