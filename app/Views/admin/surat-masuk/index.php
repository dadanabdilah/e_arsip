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
                     <a class=" btn btn-sm btn-success mb-3" href="<?php echo base_url('/admin/surat-masuk/new') ?>"><i class="fas fa-plus"></i>Tambah Data</a>
                     <table class="table table-bordered tabel-resposive">
                        <thead>
                           <tr>
                              <th style="width: 10px">No</th>
                              <th class="text-center">Tanggal Diterima</th>
                              <th>Tanggal Surat</th>
                              <th>Nomor Surat</th>
                              <th>Perihal</th>
                              <th>Pengirim</th>
                              <th>Lampiran</th>
                              <th class="text-center">Kode Arsip</th>
                              <th class="text-center">Berkas</th>
                              <th>Aksi</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php $no = 1;
                           foreach ($SuratMasuk as $key => $value) { ?>
                              <tr>
                                 <td><?= $no++ ?></td>
                                 <td><?= $value->tgl_diterima ?></td>
                                 <td><?= $value->tgl_sm ?></td>
                                 <td><?= $value->no_sm ?></td>
                                 <td><?= $value->perihal ?></td>
                                 <td><?= $value->id_unit ?></td>
                                 <td><?= $value->lampiran ?></td>
                                 <td><?= $value->kode_tersier ?></td>
                                 <td>
                                    <div class="d-flex">
                                       <a target="_blank" class=" btn btn-sm btn-primary mr-1" href="<?php echo base_url($value->berkas_url . '/' . $value->berkas) ?>"><i class="fa fa-download" aria-hidden="true"></i></a>

                                    </div>
                                 </td>
                                 <td>
                                    <div class="d-flex">
                                       <a class=" btn btn-sm btn-primary" href="<?php echo base_url('admin/surat-masuk/' .  $value->id_sm . '/edit') ?>"><i class="fas fa-edit"></i></a>
                                       <form id="delete-form" class="form-inline ml-1" action="<?= base_url('admin/surat-masuk/' .  $value->id_sm) ?>" method="POST">
                                          <input type="hidden" name="_method" value="DELETE" />
                                          <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin Hapus')"><i class="fas fa-trash"></i></button>
                                       </form>
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