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

             <div class="col-md-6 col-sm-6 col-xs-6">

                 <div class="x_panel">
                     <div class="x_title">
                         <h2>Daftar Divisi / Departemen</h2>
                         <div class="clearfix"></div>
                     </div>
                     <div class="x_content">
                         <button type="button" class="btn btn-primary btn-sm" style="margin-bottom:15px;" data-toggle="modal" data-target="#add-div">
                             Tambah Divisi
                         </button>
                         <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                             <thead>
                                 <tr>
                                     <th>#</th>
                                     <th>Nama Divisi</th>
                                     <th>Edit</th>
                                     <th>Hapus</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php $i = 1; ?>
                                 <?php foreach ($mst_divisi as $md) : ?>
                                     <tr>
                                         <td><?= $i++; ?></td>
                                         <td><?= $md['nama_divisi']; ?></td>
                                         <td><button class="tombol-edit-div btn btn-info btn-block btn-xs" data-id="<?= $md['id_divisi']; ?>" data-toggle="modal" data-target="#edit-div">Edit</button></td>
                                         <td><a href="<?= base_url('admin/del_divisi/') . $md['id_divisi']; ?>" class="tombol-hapus btn btn-danger btn-block btn-xs">Hapus</a></td>
                                     </tr>
                                 <?php endforeach; ?>
                             </tbody>
                         </table>

                     </div>
                 </div>
             </div>
             <div class="col-md-6 col-sm-6 col-xs-6">
                 <div class="x_panel">
                     <div class="x_title">
                         <h2>Daftar Jabatan</h2>
                         <div class="clearfix"></div>
                     </div>
                     <div class="x_content">
                         <button type="button" class="btn btn-primary btn-sm" style="margin-bottom:15px;" data-toggle="modal" data-target="#add-jab">
                             Tambah Jabatan
                         </button>
                         <table id="datatable-fixed-header" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                             <thead>
                                 <tr>
                                     <th>#</th>
                                     <th>Nama Jabatan</th>
                                     <th>Edit</th>
                                     <th>Hapus</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php $i = 1; ?>
                                 <?php foreach ($mst_jabatan as $mj) : ?>
                                     <tr>
                                         <td><?= $i++; ?></td>
                                         <td><?= $mj['nama_jabatan']; ?></td>
                                         <td><button class="tombol-edit-jab btn btn-success btn-block btn-xs" data-id="<?= $mj['id_jabatan']; ?>" data-toggle="modal" data-target="#edit-jab">Edit</button></td>
                                         <td><a href="<?= base_url('admin/del_jabatan/') . $mj['id_jabatan']; ?>" class="tombol-hapus btn btn-danger btn-block btn-xs">Hapus</a></td>
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
 <div class="modal fade" id="add-div">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title">Tambah Divisi</h4>
             </div>
             <div class="modal-body">
                 <form class="form-horizontal form-label-left" action="<?= base_url('admin/mst_divisi'); ?>" method="post">
                     <div class="form-group">
                         <label>Nama Divisi</label>
                         <input type="text" class="form-control" name="nama_divisi">
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

 <div class="modal fade" id="edit-div">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title">Edit Divisi</h4>
             </div>
             <div class="modal-body">
                 <form class="form-horizontal form-label-left" action="<?= base_url('admin/edit_divisi'); ?>" method="post">
                     <div class="form-group">
                         <label>Nama Divisi</label>
                         <input type="hidden" name="id_divisi" id="iddiv">
                         <input type="text" class="form-control" name="nama_divisi" id="nama_divisi">
                     </div>
                     <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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

 <div class="modal fade" id="add-jab">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title">Tambah Jabatan</h4>
             </div>
             <div class="modal-body">
                 <form class="form-horizontal form-label-left" action="<?= base_url('admin/mst_jabatan'); ?>" method="post">
                     <div class="form-group">
                         <label>Nama Jabatan</label>
                         <input type="text" class="form-control" name="nama_jabatan" required>
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

 <div class="modal fade" id="edit-jab">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title">Tambah Jabatan</h4>
             </div>
             <div class="modal-body">
                 <form class="form-horizontal form-label-left" action="<?= base_url('admin/edit_jabatan'); ?>" method="post">
                     <div class="form-group">
                         <label>Nama Jabatan</label>
                         <input type="hidden" name="id_jabatan" id="idjab">
                         <input type="text" class="form-control" name="nama_jabatan" id="nama_jabatan" required>
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
     $('.tombol-edit-div').on('click', function() {
         const id_divisi = $(this).data('id');
         $.ajax({
             url: '<?php echo base_url('admin/get_divisi'); ?>',
             data: {
                 id_divisi: id_divisi
             },
             method: 'post',
             dataType: 'json',
             success: function(data) {
                 $('#nama_divisi').val(data.nama_divisi);
                 $('#iddiv').val(data.id_divisi);
             }
         });
     });
 </script>
 <script>
     $('.tombol-edit-jab').on('click', function() {
         const id_jabatan = $(this).data('id');
         $.ajax({
             url: '<?php echo base_url('admin/get_jabatan'); ?>',
             data: {
                 id_jabatan: id_jabatan
             },
             method: 'post',
             dataType: 'json',
             success: function(data) {
                 $('#nama_jabatan').val(data.nama_jabatan);
                 $('#idjab').val(data.id_jabatan);
             }
         });
     });
 </script>