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
                                     <th>Jenis Surat</th>
                                     <th>Kode Surat</th>
                                     <th>No Surat</th>
                                     <th>Tujuan Surat</th>
                                     <th>Tgl Surat</th>
                                     <th>View</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php $i = 1; ?>
                                 <?php foreach ($surat_masuk as $s) : ?>
                                     <tr>
                                         <td><?= $i++; ?></td>
                                         <td><?= $s['nama_pegawai']; ?></td>
                                         <td><?= $s['divisi_nm']; ?></td>
                                         <td><?= $s['jns_surat']; ?></td>
                                         <td><?= $s['kd_surat']; ?></td>
                                         <td><?= $s['no_surat']; ?></td>
                                         <td><?= $s['tuj_surat']; ?></td>
                                         <td><?= format_indo($s['tgl_surat']); ?></td>
                                         <td><button class="tombol-isi-surat btn btn-default btn-block btn-xs" data-id="<?= $s['id_tb_surat']; ?>" data-toggle="modal" data-target="#isi-surat">Isi Surat</button></td>
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