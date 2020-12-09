 <!-- page content -->
 <div class="right_col" role="main">
     <div class="">
         <div class="page-title">
             <div class="title_left">
                 <h3><?= $title; ?></h3>
             </div>
             <div class="title_right">
                 <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                     <div class="input-group">
                         <input type="text" class="form-control" placeholder="Search for...">
                         <span class="input-group-btn">
                             <button class="btn btn-default" type="button">Go!</button>
                         </span>
                     </div>
                 </div>
             </div>
         </div>
         <div class="row">
             <div class="col-md-12 col-sm-12 col-xs-12">
                 <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
                 <?php echo $this->session->flashdata('msg'); ?>
                 <?php if (validation_errors()) { ?>
                     <div class="alert alert-danger">
                         <a class="close" data-dismiss="alert">x</a>
                         <strong><?php echo strip_tags(validation_errors()); ?></strong>
                     </div>
                 <?php } ?>
             </div>
         </div>
         <div class="row">
             <div class="col-md-12 col-sm-12 col-xs-12">
                 <div class="x_panel">
                     <div class="x_title">
                         <h2> Divisi <?= $divisi_nm; ?></h2>
                         <div class="clearfix"></div>
                     </div>
                     <div class="x_content">
                         <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                             <thead>
                                 <tr>
                                     <th>#</th>
                                     <th>Pengirim</th>
                                     <th>Divisi</th>
                                     <th>Kode Berkas</th>
                                     <th>Tujuan Berkas</th>
                                     <th>Nama Berkas</th>
                                     <th>Tgl Berkas</th>
                                     <th>Isi Pesan</th>
                                     <th>View</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php $i = 1; ?>
                                 <?php foreach ($berkas_masuk as $b) : ?>
                                     <tr>
                                         <td><?= $i++; ?></td>
                                         <td><?= $b['nama_pegawai']; ?></td>
                                         <td><?= $b['divisi_nm']; ?></td>
                                         <td><?= $b['kd_berkas']; ?></td>
                                         <td><?= $b['tuj_berkas']; ?></td>
                                         <td><?= $b['nama_berkas']; ?></td>
                                         <td><?= format_indo($b['tgl_berkas']); ?></td>
                                         <td><?= $b['pesan']; ?></td>
                                         <td><button class="tombol-isi-berkas btn btn-default btn-block btn-xs" data-id="<?= $b['id_berkas']; ?>" data-toggle="modal" data-target="#isi-surat">Isi Berkas</button></td>
                                     </tr>
                                 <?php endforeach; ?>
                             </tbody>
                         </table>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>

 <div class="modal fade" id="isi-surat">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title">Lampiran File</h4>
             </div>
             <div class="modal-body">
                 <?php echo form_open_multipart('user/download_file'); ?>
                 <input type="hidden" name="id_berkas" id="idisiberkas">
                 <div class="form-group">
                     <textarea class="form-control" rows="3" name="file_upload" id="fileupload" readonly></textarea>
                 </div>
                 <button type="submit" class="btn btn-primary">Unduh Lampiran</button>
                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                 </form>
             </div>
         </div>
         <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->
 </div>
 <script>
     $('.tombol-isi-berkas').on('click', function() {
         const id_berkas = $(this).data('id');
         $.ajax({
             url: '<?php echo base_url('user/get_berkas'); ?>',
             data: {
                 id_berkas: id_berkas
             },
             method: 'post',
             dataType: 'json',
             success: function(data) {
                 $('#fileupload').val(data.file_upload);
                 $('#idisiberkas').val(data.id_berkas);
             }
         });
     });
 </script>