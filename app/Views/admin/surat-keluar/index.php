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
                     <a class=" btn btn-sm btn-success mb-3" href="<?php echo base_url('/admin/surat-keluar/new') ?>"><i class="fas fa-plus"></i>Tambah Data</a>
                     <div class="table-responsive">
                        <table class="table table-bordered">
                           <thead>
                              <tr>
                              <th style="width: 10px">No</th>
                              <th>Tanggal Surat</th>
                              <th>Nomor Surat</th>
                              <th>Perihal</th>
                              <th>Hubungan</th>
                              <th class="text-center">Kode Arsip</th>
                              <th class="text-center">Berkas</th>
                              <th>Aksi</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php $no = 1;
                           foreach ($SuratKeluar as $key => $value) { ?>
                              <tr>
                                 <td><?= $no++ ?></td>
                                 <td><?= $value->tgl_sk ?></td>
                                 <td><?= $value->no_sk ?></td>
                                 <td><?= $value->perihal ?></td>
                                 <td><?= $value->hubungan ?></td>
                                 <td><?= $value->kode_tersier ?></td>
                                 <td>
                                    <div class="d-flex">
                                       <a class="btn btn-sm btn-primary mr-1" id="btn_email" href="" data-id="<?= $value->id_sk ?>" data-path="<?= $value->berkas_url . '/' . $value->berkas ?>" data-toggle="modal" data-target="#staticBackdrop">Kirim Email</a>
                                       <a class="btn btn-sm btn-primary mr-1" id="btn_wa" href="" data-id="<?= $value->id_sk ?>" data-path="<?= $value->berkas_url . '/' . $value->berkas ?>" data-toggle="modal" data-target="#staticBackdrop2">Kirim Wa</a>
                                       <a target="_blank" class=" btn btn-sm btn-primary mr-1" href="<?php echo base_url($value->berkas_url . '/' . $value->berkas) ?>"><i class="fa fa-download" aria-hidden="true"></i></a>
                                    </div>
                                 </td>
                                 <td>
                                    <div class="d-flex">
                                       <a class=" btn btn-sm btn-primary" href="<?php echo base_url('admin/surat-keluar/' .  $value->id_sk . '/edit') ?>"><i class="fas fa-edit"></i></a>
                                       <form id="delete-form" class="form-inline ml-1" action="<?= base_url('admin/surat-keluar/' .  $value->id_sk) ?>" method="POST">
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
               </div>
               <!-- /.card -->
            </div>
            <!-- right col -->
         </div>
         <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
   </section>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Atur Pesan Email</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="<?= base_url('email/send') ?>">
         <div class="modal-body">
            <div class="form-group">
               <label for="exampleFormControlInput1">Nama Pengirim</label>
               <input type="text" class="form-control" name="pengirim" placeholder="">
               <input type="hidden" class="form-control" id="path" name="path" placeholder="">
            </div>
            <div class="form-group">
               <label for="exampleFormControlInput1">Email Tujuan</label>
               <input type="email" class="form-control" name="email_tujuan" placeholder="">
            </div>
            <div class="form-group">
               <label for="exampleFormControlInput1">Subjek</label>
               <input type="text" class="form-control" name="subjek" placeholder="">
            </div>
            <div class="form-group">
               <label for="exampleFormControlTextarea1">Pesan</label>
               <textarea class="form-control" id="summernote" name="pesan" rows="3"></textarea>
            </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Kirim</button>
         </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop2" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdrop2Label">Atur Pesan WhastApp</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="<?= base_url('whatsapp/send') ?>">
         <div class="modal-body">
            <div class="form-group">
               <label for="exampleFormControlInput1">Nomor Wa Tujuan</label>
               <input type="number" class="form-control" name="no_tujuan" placeholder="">
               <input type="hidden" class="form-control" id="path_wa" name="path" placeholder="">
            </div>
            <div class="form-group">
               <label for="exampleFormControlTextarea1">Pesan</label>
               <textarea class="form-control" id="summernote" name="pesan" rows="3"></textarea>
            </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Kirim</button>
         </div>
      </form>
    </div>
  </div>
</div>

<?= $this->section('js') ?>
<script>
   $(function () {
      $('#summernote').summernote({
         height: 300,
         toolbar: [
               [ 'style', [ 'style' ] ],
               [ 'font', [ 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear'] ],
               [ 'fontname', [ 'fontname' ] ],
               [ 'fontsize', [ 'fontsize' ] ],
               [ 'color', [ 'color' ] ],
               [ 'para', [ 'ol', 'ul', 'paragraph', 'height' ] ],
               [ 'table', [ 'table' ] ],
               [ 'insert', [ 'link'] ],
               [ 'view', [ 'undo', 'redo', 'fullscreen', 'codeview', 'help' ] ]
         ]
      });
   });
   
   $('#btn_email').on('click', function(){
      $('#path').val(($(this).attr('data-path')))
   })

   $('#btn_wa').on('click', function(){
      $('#path_wa').val(($(this).attr('data-path')))
   })
</script>
<?= $this->endSection() ?>

<?php echo view('layout/footer'); ?>