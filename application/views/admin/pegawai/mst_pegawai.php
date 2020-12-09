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
                     <div class="x_content">
                         <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                             <thead>
                                 <tr>
                                     <th>#</th>
                                     <th>Kode Pegawai</th>
                                     <th>Nama Pegawai</th>
                                     <th>Divisi</th>
                                     <th>Jabatan</th>
                                     <th>Edit</th>
                                     <th>Hapus</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php $i = 1; ?>
                                 <?php foreach ($list_struktur as $lu) : ?>
                                     <tr>
                                         <td><?= $i++; ?></td>
                                         <td><?= $lu['kode_pegawai']; ?></td>
                                         <td><?= $lu['nama_pegawai']; ?></td>
                                         <td><?= $lu['divisi_nm']; ?></td>
                                         <td><?= $lu['jabatan_nm']; ?></td>
                                         <td><button class="tombol-edit-peg btn btn-info btn-block btn-xs" data-id="<?= $lu['id_struktur']; ?>" data-toggle="modal" data-target="#edit-peg">Edit</button></td>
                                         <td><a href="<?= base_url('admin/del_pegawai/') . $lu['id_struktur']; ?>" class="tombol-hapus btn btn-danger btn-block btn-xs">Hapus</a></td>
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
 <!-- /page content -->

 <div class="modal fade" id="edit-peg">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title">Edit Struktural</h4>
             </div>
             <div class="modal-body">
                 <form class="form-horizontal form-label-left" action="<?= base_url('admin/mst_pegawai'); ?>" method="post">
                     <div class="form-group">
                         <label>Kode Pegawai</label>
                         <input type="hidden" name="id_struktur" id="idstruk">
                         <input type="text" class="form-control" name="kode_pegawai" id="kdpeg" readonly>
                     </div>
                     <div class="form-group">
                         <label>Nama Lengkap</label>
                         <input type="text" class="form-control" name="nama_pegawai" id="nama" readonly>
                     </div>
                     <div class="row">
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label>Divisi / Dept</label>
                                 <select class="form-control" name="divisi_nm" id="divisi" required>
                                     <option value="">- Pilih Divisi -</option>
                                     <?php foreach ($mst_divisi as $md) : ?>
                                         <option><?= $md['nama_divisi']; ?></option>
                                     <?php endforeach; ?>
                                 </select>
                             </div>
                         </div>
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label>Jabatan</label>
                                 <select class="form-control" name="jabatan_nm" id="jabatan" required>
                                     <option value="">- Pilih Jabatan -</option>
                                     <?php foreach ($mst_jabatan as $mj) : ?>
                                         <option><?= $mj['nama_jabatan']; ?></option>
                                     <?php endforeach; ?>
                                 </select>
                             </div>
                         </div>
                     </div>
                     <button type="submit" class="btn btn-primary">Simpan Data</button>
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                 </form>
             </div>
             <div class="modal-footer">
             </div>
         </div>
         <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->
 </div>

 <script>
     $('.tombol-edit-peg').on('click', function() {
         const id_struktur = $(this).data('id');
         $.ajax({
             url: '<?php echo base_url('admin/get_struktur'); ?>',
             data: {
                 id_struktur: id_struktur
             },
             method: 'post',
             dataType: 'json',
             success: function(data) {
                 $('#kdpeg').val(data.kode_pegawai);
                 $('#nama').val(data.nama_pegawai);
                 $('#divisi').val(data.divisi_nm);
                 $('#jabatan').val(data.jabatan_nm);
                 $('#idstruk').val(data.id_struktur);
             }
         });
     });
 </script>