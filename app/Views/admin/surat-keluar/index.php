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
               <!-- /.card-header -->
               <div class="card-body mb-4">
                  <a class=" btn btn-sm btn-success mb-3" href="<?php echo base_url('/admin/surat-keluar/new') ?>"><i class="fas fa-plus"></i>Tambah Data</a>
                  <table class="table table-bordered tabel-resposive">
                    <thead>
                        <tr>
                            <th style="width: 10px">No</th>
                            <th class="text-center">Tanggal Keluar</th>
                            <th>Tanggal Surat</th>
                            <th>Nomor Surat</th>
                            <th>Perihal</th>
                            <th>Lampiran</th>
                            <th class="text-center">Kode Arsip</th>
                            <th class="text-center">Berkas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Row Cell</td>
                            <td>Row Cell</td>
                            <td>Row Cell</td>
                            <td>Row Cell</td>
                            <td>Row Cell</td>
                            <td>Row Cell</td>
                            <td>Row Cell</td>
                            <td>
                            <center>
                                <a class=" btn btn-sm btn-primary" href="<?php echo base_url('admin/surat-masuk/1/edit') ?>"><i class="fas fa-edit"></i></a>
                                <a onclick="return confirm('Yakin Hapus')" class=" btn btn-sm btn-danger" href="<?php echo base_url('admin/surat-masuk/1') ?>"><i class="fas fa-trash"></i></a>
                            </center>
                            </td>
                        </tr>
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