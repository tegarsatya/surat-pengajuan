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
         <div class="row top_tiles">
             <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                 <div class="tile-stats">
                     <div class="icon"><i class="fa fa-user-plus"></i></div>
                     <div class="count"><?= $user_perbulan; ?></div>
                     <h3>User Baru</h3>
                     <p></p>
                 </div>
             </div>
             <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                 <div class="tile-stats">
                     <div class="icon"><i class="fa fa-users"></i></div>
                     <div class="count"><?= $count_user; ?></div>
                     <h3>User Registrasi</h3>
                     <p></p>
                 </div>
             </div>
             <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                 <div class="tile-stats">
                     <div class="icon"><i class="fa fa-check-square-o"></i></div>
                     <div class="count"><?= $count_user; ?></div>
                     <h3>User Aktif</h3>
                     <p></p>
                 </div>
             </div>
             <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                 <div class="tile-stats">
                     <div class="icon"><i class="fa fa-times-circle-o"></i></div>
                     <div class="count"><?= $user_tak_aktif; ?></div>
                     <h3>User Tidak Aktif</h3>
                     <p></p>
                 </div>
             </div>
         </div>
         <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
         <?php echo $this->session->flashdata('msg'); ?>
         <?php if (validation_errors()) { ?>
             <div class="alert alert-danger">
                 <a class="close" data-dismiss="alert">x</a>
                 <strong><?php echo strip_tags(validation_errors()); ?></strong>
             </div>
         <?php } ?>
         <div class="row">
             <div class="col-md-12 col-sm-12 col-xs-12">
                 <div class="x_panel">
                     <div class="x_title">
                         <h2>List User</h2>
                         <div class="clearfix"></div>
                     </div>
                     <div class="x_content">
                         <button type="button" class="btn btn-primary btn-sm" style="margin-bottom:15px;" data-toggle="modal" data-target="#add-user">
                             Tambah User
                         </button>
                         <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                             <thead>
                                 <tr>
                                     <th>#</th>
                                     <th>Nama</th>
                                     <th>Email</th>
                                     <th>Username</th>
                                     <th>Level</th>
                                     <th>Tgl Registrasi</th>
                                     <th>Status</th>
                                     <th>Struktural</th>
                                     <th>Edit</th>
                                     <th>Hapus</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php $i = 1; ?>
                                 <?php foreach ($list_user as $lu) : ?>
                                     <tr>
                                         <td><?= $i++; ?></td>
                                         <td><?= $lu['nama']; ?></td>
                                         <td><?= $lu['email']; ?></td>
                                         <td><?= $lu['username']; ?></td>
                                         <td><?= $lu['level']; ?></td>
                                         <td><?= format_indo($lu['date_created']); ?></td>
                                         <?php if ($lu['is_active'] == 1) : ?>
                                             <td>Aktif</td>
                                         <?php else : ?>
                                             <td>Tidak Aktif</td>
                                         <?php endif; ?>
                                         <td><button class="tombol-struk btn btn-info btn-block btn-xs" data-id="<?= $lu['id']; ?>" data-toggle="modal" data-target="#add-struk">+ Struktur</button></td>
                                         <td><button class="tombol-edit btn btn-success btn-block btn-xs" data-id="<?= $lu['id']; ?>" data-toggle="modal" data-target="#edit-user">Edit</button></td>
                                         <td><a href="<?= base_url('admin/del_user/') . $lu['id']; ?>" class="tombol-hapus btn btn-danger btn-block btn-xs">Hapus</a></td>
                                     </tr>
                                 <?php endforeach; ?>
                             </tbody>
                         </table>

                     </div>
                 </div>
             </div>
         </div>
         <div class="row">

         </div>


     </div>
 </div>
 <!-- /page content -->
 <div class="modal fade" id="add-user">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title">Tambah User</h4>
             </div>
             <div class="modal-body">
                 <form class="form-horizontal form-label-left" action="<?= base_url('admin/index'); ?>" method="post">
                     <div class="form-group">
                         <label class="form-group">Level Akses</label>
                         <select class="form-control" name="level">
                             <option>- Silahkan Pilih -</option>
                             <option value="Admin">Administrator</option>
                             <option value="User">User</option>
                         </select>
                     </div>
                     <div class="form-group">
                         <label>Nama Lengkap</label>
                         <input type="text" class="form-control" name="nama">
                     </div>
                     <div class="form-group">
                         <label>Email</label>
                         <input type="text" class="form-control" name="email">
                     </div>
                     <div class="form-group">
                         <label>Username</label>
                         <input type="text" class="form-control" name="username">
                     </div>
                     <div class="row">
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label>Password</label>
                                 <input type="password" class="form-control" name="password1">
                             </div>
                         </div>
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label>Ulang Password</label>
                                 <input type="password" class="form-control" name="password2" placeholder="Tulis ulang password">
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

 <div class="modal fade" id="edit-user">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title">Edit User</h4>
             </div>
             <div class="modal-body">
                 <form class="form-horizontal form-label-left" action="<?= base_url('admin/edit_user'); ?>" method="post">
                     <div class="form-group">
                         <label>Nama Lengkap</label>
                         <input type="hidden" name="id" id="idjson">
                         <input type="text" class="form-control" id="namajson" readonly>
                     </div>
                     <div class="form-group">
                         <label>Email</label>
                         <input type="text" class="form-control" id="emailjson" readonly>
                     </div>
                     <div class="form-group">
                         <label class="form-group">Level Akses</label>
                         <select class="form-control" name="level" id="leveljson">
                             <option>- Silahkan Pilih -</option>
                             <option value="Admin">Administrator</option>
                             <option value="User">User</option>
                         </select>
                     </div>
                     <div class="form-group">
                         <div class="radio">
                             <label>
                                 <input type="radio" class="flat" name="is_active" value="1" checked> Aktif
                             </label>
                         </div>
                         <div class="radio">
                             <label>
                                 <input type="radio" class="flat" name="is_active" value="0"> Tidak Aktif
                             </label>
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

 <div class="modal fade" id="add-struk">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title">Tambah Struktural</h4>
             </div>
             <div class="modal-body">
                 <form class="form-horizontal form-label-left" action="<?= base_url('admin/add_struktur'); ?>" method="post">
                     <div class="form-group">
                         <label>Kode Pegawai</label>
                         <input type="hidden" name="id" id="idstruk">
                         <input type="text" class="form-control" name="kode_pegawai" value="<?= $kode_pegawai; ?>" readonly>
                     </div>
                     <div class="form-group">
                         <label>Nama Lengkap</label>
                         <input type="text" class="form-control" name="nama_pegawai" id="struk" readonly>
                     </div>
                     <div class="row">
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label>Divisi / Dept</label>
                                 <select class="form-control" name="divisi_nm" required>
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
                                 <select class="form-control" name="jabatan_nm" required>
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
     $('.tombol-edit').on('click', function() {
         const id = $(this).data('id');
         $.ajax({
             url: '<?php echo base_url('admin/get_edit'); ?>',
             data: {
                 id: id
             },
             method: 'post',
             dataType: 'json',
             success: function(data) {
                 $('#namajson').val(data.nama);
                 $('#leveljson').val(data.level);
                 $('#emailjson').val(data.email);
                 $('#idjson').val(data.id);
             }
         });
     });
 </script>
 <script>
     $('.tombol-struk').on('click', function() {
         const id = $(this).data('id');
         $.ajax({
             url: '<?php echo base_url('admin/get_edit'); ?>',
             data: {
                 id: id
             },
             method: 'post',
             dataType: 'json',
             success: function(data) {
                 $('#struk').val(data.nama);
                 $('#idstruk').val(data.id);
             }
         });
     });
 </script>