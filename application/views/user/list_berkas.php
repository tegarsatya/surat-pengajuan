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
                         <div class="clearfix"></div>
                     </div>
                     <div class="x_content">
                         <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                             <thead>
                                 <tr>
                                     <th>#</th>
                                     <th>Kirim</th>
                                     <th>Kode Berkas</th>
                                     <th>Tujuan Berkas</th>
                                     <th>Nama Berkas</th>
                                     <th>Tgl Berkas</th>
                                     <th>Isi Pesan</th>
                                     <th>View</th>
                                     <th>Status</th>
                                     <th>Edit</th>
                                     <th>Hapus</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php $i = 1; ?>
                                 <?php foreach ($berkas as $b) : ?>
                                     <tr>
                                         <td><?= $i++; ?></td>
                                         <td><button type="button" class="tombol-kirim btn btn-light btn-block btn-sm" data-id="<?= $b['id_berkas']; ?>" data-toggle="modal" data-target="#kirim-surat"><i class="fa fa-send"></i></button></td>
                                         <td><?= $b['kd_berkas']; ?></td>
                                         <td><?= $b['tuj_berkas']; ?></td>
                                         <td><?= $b['nama_berkas']; ?></td>
                                         <td><?= format_indo($b['tgl_berkas']); ?></td>
                                         <td><?= $b['pesan']; ?></td>
                                         <td><button class="tombol-isi-berkas btn btn-default btn-block btn-xs" data-id="<?= $b['id_berkas']; ?>" data-toggle="modal" data-target="#isi-surat">Isi Berkas</button></td>
                                         <?php if ($b['status_berkas'] == 1) : ?>
                                             <td>Belum Dikirim</td>
                                         <?php else : ?>
                                             <td class="bg-success">Sudah Dikirim</td>
                                         <?php endif; ?>

                                         <?php if ($b['status_berkas'] == 1) : ?>
                                             <td><button class="tombol-edit btn btn-info btn-block btn-xs" data-id="<?= $b['id_berkas']; ?>" data-toggle="modal" data-target="#edit-surat">Edit</button></td>
                                         <?php else : ?>
                                             <td>Closed</td>
                                         <?php endif; ?>
                                         <?php if ($b['status_berkas'] == 1) : ?>
                                             <td><a href="<?= base_url('user/del_berkas/' . $b['id_berkas']); ?>" class="tombol-hapus btn btn-danger btn-block btn-xs">Hapus</a></td>
                                         <?php else : ?>
                                             <td>Closed</td>
                                         <?php endif; ?>
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

 <div class="modal fade" id="edit-surat">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title">Edit Berkas</h4>
             </div>
             <div class="modal-body">
                 <?php echo form_open_multipart('user/list_berkas'); ?>
                 <div class="row">
                     <div class="col-md-6">
                         <div class="form-group">
                             <label>Kode Berkas</label>
                             <input type="hidden" name="id_berkas" id="idberkas">
                             <input type="text" class="form-control" id="kd" readonly>
                         </div>
                     </div>
                     <div class="col-md-6">
                         <div class="form-group">
                             <label>Nama Berkas</label>
                             <input type="text" class="form-control" name="nama_berkas" id="nama" required>
                         </div>
                     </div>
                 </div>
                 <div class="row">
                     <div class="col-md-6">
                         <div class="form-group">
                             <label>Tujuan Berkas</label>
                             <select class="form-control" name="tuj_berkas" id="tuj" required>
                                 <option value="">- Pilih Tujuan -</option>
                                 <?php foreach ($mst_divisi as $md) : ?>
                                     <option><?= $md['nama_divisi']; ?></option>
                                 <?php endforeach; ?>
                             </select>
                         </div>
                     </div>
                     <div class="col-md-6">
                         <div class="form-group">
                             <label>Tanggal Berkas</label>
                             <input type="date" class="form-control" name="tgl_berkas" id="tgl" required>
                         </div>
                     </div>
                 </div>
                 <div class="form-group">
                     <label>Pesan</label>
                     <textarea class="form-control" rows="3" placeholder="Isi Pesan" name="pesan" id="pesan" required></textarea>
                 </div>
                 <div class="form-group">
                     <label for="exampleFormControlFile1">Abaikan jika tidak diubah</label>
                     <input type="file" class="form-control-file" name="file">
                 </div>
                 <span class="text-muted" style="font-size:12px;">* Format File xls, xlsx, doc, docx, ppt, pptx, pdf, zip, rar, txt dan ukuran file kurang dari 2 mb</span>
                 <hr style="margin-bottom:10px;margin-top:2px;">
                 <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                 </form>
             </div>
         </div>
         <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->
 </div>

 <div class="modal fade" id="isi-surat">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title">File Upload</h4>
             </div>
             <div class="modal-body">
                 <?php echo form_open_multipart('user/download_file'); ?>
                 <input type="hidden" name="id_berkas" id="idisiberkas">
                 <div class="form-group">
                     <textarea class="form-control" rows="3" name="file_upload" id="fileupload" readonly></textarea>
                 </div>
                 <button type="submit" class="btn btn-primary">Unduh File</button>
                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                 </form>
             </div>
         </div>
         <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->
 </div>

 <div class="modal fade" id="kirim-surat">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-body">
                 <form action="<?= base_url('user/kirim_berkas'); ?>" method="post">
                     <div class="form-group">
                         <label>Kode Berkas</label>
                         <input type="hidden" name="id_berkas" id="idkirimberkas">
                         <input type="text" class="form-control" id="kdkirimberkas" readonly>
                     </div>
                     <button type="submit" class="btn btn-primary">Kirim Berkas</button>
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                 </form>
             </div>
         </div>
         <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->
 </div>


 <script>
     $('.tombol-edit').on('click', function() {
         const id_berkas = $(this).data('id');
         $.ajax({
             url: '<?php echo base_url('user/get_berkas'); ?>',
             data: {
                 id_berkas: id_berkas
             },
             method: 'post',
             dataType: 'json',
             success: function(data) {
                 $('#kd').val(data.kd_berkas);
                 $('#nama').val(data.nama_berkas);
                 $('#tuj').val(data.tuj_berkas);
                 $('#tgl').val(data.tgl_berkas);
                 $('#pesan').val(data.pesan);
                 $('#idberkas').val(data.id_berkas);
             }
         });
     });
 </script>
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
 <script>
     $('.tombol-kirim').on('click', function() {
         const id_berkas = $(this).data('id');
         $.ajax({
             url: '<?php echo base_url('user/get_berkas'); ?>',
             data: {
                 id_berkas: id_berkas
             },
             method: 'post',
             dataType: 'json',
             success: function(data) {
                 $('#kdkirimberkas').val(data.kd_berkas);
                 $('#idkirimberkas').val(data.id_berkas);
             }
         });
     });
 </script>