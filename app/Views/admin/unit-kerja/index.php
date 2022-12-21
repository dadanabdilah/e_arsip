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
               <div class="card-header">
                  <a class=" btn btn-sm btn-success mb-3" href="<?php echo base_url('/admin/unit-kerja/new') ?>"><i class="fas fa-plus"></i>Tambah Data</a>
               </div>
               <div class="card-body mb-4">
                  <?php if(session('error') !== null) {  ?>
                     <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong><?= session('error') ?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                        </button>
                     </div>
                  <?php }  ?>
                  <?php if(session('message') !== null) {  ?>
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
                           <th class="text-center">Kode Unit</th>
                           <th>Nama Unit</th>
                           <th>Kontak</th>
                           <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 ; foreach ($UnitKerja as $key => $value) { ?>
                           <tr>
                              <td><?= $no++ ?></td>
                              <td><?= $value->kode_unit ?></td>
                              <td><?= $value->nama_unit ?></td>
                              <td><?= $value->kontak ?></td>
                              <td>
                              <center>
                                 <a class=" btn btn-sm btn-primary" href="<?php echo base_url('admin/unit-kerja/' .  $value->id_unit . '/edit') ?>"><i class="fas fa-edit"></i></a>
                                 <a onclick="return confirm('Yakin Hapus')" class=" btn btn-sm btn-danger" href="<?php echo base_url('admin/unit-kerja/' .  $value->id_unit) ?>"><i class="fas fa-trash"></i></a>
                              </center>
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