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
                 <div class="x_panel">
                     <!-- <div class="x_title">
                         <h2>List User</h2>
                         <div class="clearfix"></div>
                     </div> -->
                     <div class="x_content">

                         <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
                         <?php echo $this->session->flashdata('msg'); ?>
                         <?php if (validation_errors()) { ?>
                             <div class="alert alert-danger">
                                 <a class="close" data-dismiss="alert">x</a>
                                 <strong><?php echo strip_tags(validation_errors()); ?></strong>
                             </div>
                         <?php } ?>
                         <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                             <div class="profile_img">
                                 <div id="crop-avatar">
                                     <!-- Current avatar -->
                                     <img class="img-responsive avatar-view" src="<?= base_url('assets/img/profile/' . $user['image']); ?>" alt="Avatar" title="Change the avatar">
                                 </div>
                             </div>
                             <h3><?= $user['nama']; ?></h3>

                             <ul class="list-unstyled user_data">
                                 <li><i class="fa fa-envelope user-profile-icon"></i>&nbsp&nbsp&nbsp <?= $user['email']; ?>
                                 </li>
                                 <li>
                                     <i class="fa fa-user user-profile-icon"></i>&nbsp&nbsp&nbsp <?= $user['username']; ?>
                                 </li>
                                 <li>
                                     <i class="fa fa-calendar user-profile-icon"></i>&nbsp&nbsp&nbsp <?= format_indo($user['date_created']); ?>
                                 </li>
                             </ul>
                             <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit-profile"><i class="fa fa-edit m-right-xs"></i> Edit Profil</button>
                             <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#ubah-password"><i class="fa fa-key m-right-xs"></i> Ubah Password</button>
                             <br />
                             <!-- start skills -->
                             <!-- end of skills -->
                         </div>
                         <div class="col-md-9 col-sm-9 col-xs-12">
                             <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                 <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                     <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Daftar Pegawai</a>
                                     </li>
                                     <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Daftar Divisi</a>
                                     </li>
                                     <li role="presentation" class=""><a href="#tab_content3" role="tab" id="jabatan" data-toggle="tab" aria-expanded="false">Daftar Jabatan</a>
                                     </li>

                                 </ul>
                                 <div id="myTabContent" class="tab-content">
                                     <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                                         <!-- start recent activity -->
                                         <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                             <thead>
                                                 <tr>
                                                     <th>#</th>
                                                     <th>Kode Pegawai</th>
                                                     <th>Nama Pegawai</th>
                                                     <th>Divisi</th>
                                                     <th>Jabatan</th>
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
                                                     </tr>
                                                 <?php endforeach; ?>
                                             </tbody>
                                         </table>
                                         <!-- end recent activity -->
                                     </div>
                                     <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                                         <table id="datatable-fixed-header" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                             <thead>
                                                 <tr>
                                                     <th>#</th>
                                                     <th>Nama Divisi</th>
                                                 </tr>
                                             </thead>
                                             <tbody>
                                                 <?php $i = 1; ?>
                                                 <?php foreach ($mst_divisi as $md) : ?>
                                                     <tr>
                                                         <td><?= $i++; ?></td>
                                                         <td><?= $md['nama_divisi']; ?></td>
                                                     </tr>
                                                 <?php endforeach; ?>
                                             </tbody>
                                         </table>

                                     </div>
                                     <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                                         <table id="datatable-keytable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                             <thead>
                                                 <tr>
                                                     <th>#</th>
                                                     <th>Nama Jabatan</th>
                                                 </tr>
                                             </thead>
                                             <tbody>
                                                 <?php $i = 1; ?>
                                                 <?php foreach ($mst_jabatan as $mj) : ?>
                                                     <tr>
                                                         <td><?= $i++; ?></td>
                                                         <td><?= $mj['nama_jabatan']; ?></td>
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
             </div>
         </div>
     </div>
 </div>
 <!-- /page content -->

 <div class="modal fade" id="edit-profile">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title">Edit Profil</h4>
             </div>
             <div class="modal-body">
                 <?php echo form_open_multipart('admin/profile'); ?>
                 <div class="form-group row">
                     <label for="username" class="col-sm-2 col-form-label">Username</label>
                     <div class="col-sm-10">
                         <input type="hidden" class="form-control" name="id" value="<?php echo $user['id']; ?>">
                         <input type="text" class="form-control" id="username" value="<?php echo $user['username']; ?>" readonly>
                     </div>
                 </div>
                 <div class="form-group row">
                     <label for="name" class="col-sm-2 col-form-label">Nama</label>
                     <div class="col-sm-10">
                         <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $user['nama']; ?>">
                     </div>
                 </div>
                 <div class="form-group row">
                     <label for="name" class="col-sm-2 col-form-label">Email</label>
                     <div class="col-sm-10">
                         <input type="text" class="form-control" id="nama" name="email" value="<?php echo $user['email']; ?>">
                     </div>
                 </div>
                 <div class="form-group row">
                     <div class="col-sm-2"> <label for="name">Profile Picture</label></div>
                     <div class="col-sm-10">
                         <div class="row">
                             <div class="col-sm-3">
                                 <img src="<?= base_url('assets/img/profile/' . $user['image']); ?>" class="img-thumbnail">
                             </div>
                             <div class="col-sm-9">
                                 <div class="custom-file">
                                     <input type="file" class="custom-file-input" id="image" name="image">
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
                 <button type="submit" class="btn btn-primary pull-right">Simpan Perubahan</button>
                 </form>
             </div>
         </div>
         <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->
 </div>

 <div class="modal fade" id="ubah-password">
     <div class="modal-dialog modal-sm">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title">Ubah Password</h4>
             </div>
             <div class="modal-body">
                 <form action="<?php echo base_url('admin/changepassword'); ?>" method="post">
                     <div class="form-group">
                         <label for="current_password">Password Lama</label>
                         <input type="password" class="form-control" id="current_password" name="current_password">
                         <?= form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
                     </div>
                     <div class="form-group">
                         <label for="new_password1">Password Baru</label>
                         <input type="password" class="form-control" id="new_password1" name="new_password1">
                         <?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>'); ?>
                     </div>
                     <div class="form-group">
                         <label for="new_password2">Ulang Password Baru</label>
                         <input type="password" class="form-control" id="new_password2" name="new_password2" placeholder="Ketik ulang password baru">
                         <?= form_error('new_password2', '<small class="text-danger pl-3">', '</small>'); ?>
                     </div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
                 <button type="submit" class="btn btn-primary pull-right">Ganti Password</button>
                 </form>
             </div>
         </div>
         <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->
 </div>