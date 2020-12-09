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
                                     <th>Jenis Surat</th>
                                     <th>Kode Surat</th>
                                     <th>No Surat</th>
                                     <th>Tujuan Surat</th>
                                     <th>Tgl Surat</th>
                                     <th>View</th>
                                     <th>Status</th>
                                     <th>Edit</th>
                                     <th>Hapus</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php $i = 1; ?>
                                 <?php foreach ($surat as $s) : ?>
                                     <tr>
                                         <td><?= $i++; ?></td>
                                         <td><button type="button" class="tombol-kirim btn btn-light btn-block btn-sm" data-id="<?= $s['id_tb_surat']; ?>" data-toggle="modal" data-target="#kirim-surat"><i class="fa fa-send"></i></button></td>
                                         <td><?= $s['jns_surat']; ?></td>
                                         <td><?= $s['kd_surat']; ?></td>
                                         <td><?= $s['no_surat']; ?></td>
                                         <td><?= $s['tuj_surat']; ?></td>
                                         <td><?= format_indo($s['tgl_surat']); ?></td>
                                         <td><button class="tombol-isi-surat btn btn-default btn-block btn-xs" data-id="<?= $s['id_tb_surat']; ?>" data-toggle="modal" data-target="#isi-surat">Isi Surat</button></td>
                                         <?php if ($s['status'] == 1) : ?>
                                             <td>Belum Dikirim</td>
                                         <?php else : ?>
                                             <td class="bg-success">Sudah Dikirim</td>
                                         <?php endif; ?>
                                         <?php if ($s['status'] == 1) : ?>
                                             <td><button class="tombol-edit btn btn-info btn-block btn-xs" data-id="<?= $s['id_tb_surat']; ?>" data-toggle="modal" data-target="#edit-surat">Edit</button></td>
                                         <?php else : ?>
                                             <td>Closed</td>
                                         <?php endif; ?>
                                         <?php if ($s['status'] == 1) : ?>
                                             <td><a href="<?= base_url('user/del_surat/' . $s['id_tb_surat']); ?>" class="tombol-hapus btn btn-danger btn-block btn-xs">Hapus</a></td>
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
                 <h4 class="modal-title">Edit Surat</h4>
             </div>
             <div class="modal-body">
                 <form action="<?= base_url('user/list_surat'); ?>" method="post">
                     <div class="row">
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label>Kode Surat</label>
                                 <input type="hidden" name="id_tb_surat" id="idsurat">
                                 <input type="text" class="form-control" id="kd" readonly>
                             </div>
                         </div>
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label>No Surat</label>
                                 <input type="text" class="form-control" name="no_surat" id="no" required>
                             </div>
                         </div>
                     </div>
                     <div class="form-group">
                         <label>Jenis Surat</label>
                         <select class="form-control" name="jns_surat" id="jns" required>
                             <option value="">- Pilih Surat -</option>
                             <?php foreach ($jenis_surat as $js) : ?>
                                 <option value="<?= $js['jenis_surat']; ?>"><?= $js['kategori_surat']; ?> - <?= $js['jenis_surat']; ?></option>
                             <?php endforeach; ?>
                         </select>
                     </div>
                     <div class="row">
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label>Tujuan Surat</label>
                                 <select class="form-control" name="tuj_surat" id="tuj" required>
                                     <option value="">- Pilih Tujuan -</option>
                                     <?php foreach ($mst_divisi as $md) : ?>
                                         <option><?= $md['nama_divisi']; ?></option>
                                     <?php endforeach; ?>
                                 </select>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-md-6">
                                 <div class="form-group">
                                     <label>Tanggal Surat</label>
                                     <input type="date" class="form-control" name="tgl_surat" id="tgl" required>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="form-group">
                         <label>Isi Surat</label>
                         <textarea class="form-control" rows="3" name="isi_surat" id="isi" required></textarea>
                     </div>
                     <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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
                 <form action="<?= base_url('user/kirim_surat'); ?>" method="post">
                     <div class="form-group">
                         <label>Kode Surat</label>
                         <input type="hidden" name="id_tb_surat" id="idkirimsurat">
                         <input type="text" class="form-control" id="kdkirimsurat" readonly>
                     </div>
                     <button type="submit" class="btn btn-primary">Kirim Surat</button>
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
                 <h4 class="modal-title">Isi Surat</h4>
             </div>
             <div class="modal-body">
                 <input type="hidden" name="id_tb_surat" id="idisisurat">
                 <div class="form-group">
                     <textarea class="form-control" rows="5" name="isi_surat" id="isisurat" readonly></textarea>
                 </div>
                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
             </div>

         </div>
         <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->
 </div>

 <script>
     $('.tombol-edit').on('click', function() {
         const id_tb_surat = $(this).data('id');
         $.ajax({
             url: '<?php echo base_url('user/get_surat'); ?>',
             data: {
                 id_tb_surat: id_tb_surat
             },
             method: 'post',
             dataType: 'json',
             success: function(data) {
                 $('#kd').val(data.kd_surat);
                 $('#no').val(data.no_surat);
                 $('#jns').val(data.jns_surat);
                 $('#tuj').val(data.tuj_surat);
                 $('#tgl').val(data.tgl_surat);
                 $('#isi').val(data.isi_surat);
                 $('#idsurat').val(data.id_tb_surat);
             }
         });
     });
 </script>
 <script>
     $('.tombol-isi-surat').on('click', function() {
         const id_tb_surat = $(this).data('id');
         $.ajax({
             url: '<?php echo base_url('user/get_surat'); ?>',
             data: {
                 id_tb_surat: id_tb_surat
             },
             method: 'post',
             dataType: 'json',
             success: function(data) {
                 $('#isisurat').val(data.isi_surat);
                 $('#idisisurat').val(data.id_tb_surat);
             }
         });
     });
 </script>
 <script>
     $('.tombol-kirim').on('click', function() {
         const id_tb_surat = $(this).data('id');
         $.ajax({
             url: '<?php echo base_url('user/get_surat'); ?>',
             data: {
                 id_tb_surat: id_tb_surat
             },
             method: 'post',
             dataType: 'json',
             success: function(data) {
                 $('#kdkirimsurat').val(data.kd_surat);
                 $('#idkirimsurat').val(data.id_tb_surat);
             }
         });
     });
 </script>