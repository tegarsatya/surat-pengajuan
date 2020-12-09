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
                         <button type="button" class="btn btn-primary btn-sm" style="margin-bottom:15px;" data-toggle="modal" data-target="#add-kat">
                             Tambah Kategori Surat
                         </button>
                         <button type="button" class="btn btn-primary btn-sm" style="margin-bottom:15px;" data-toggle="modal" data-target="#add-jen">
                             Tambah Jenis Surat
                         </button>
                         <button type="button" class="btn btn-primary btn-sm" style="margin-bottom:15px;" data-toggle="modal" data-target="#view-kat">
                             Lihat Kategori Surat
                         </button>
                         <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                             <thead>
                                 <tr>
                                     <th>#</th>
                                     <th>Kode Surat</th>
                                     <th>Kategori Surat</th>
                                     <th>Jenis Surat</th>
                                     <th>Edit</th>
                                     <th>Hapus</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php $i = 1; ?>
                                 <?php foreach ($mst_surat as $ms) : ?>
                                     <tr>
                                         <td><?= $i++; ?></td>
                                         <td><?= $ms['kode_surat']; ?></td>
                                         <td><?= $ms['kategori_surat']; ?></td>
                                         <td><?= $ms['jenis_surat']; ?></td>
                                         <td><button class="tombol-edit-jen btn btn-info btn-block btn-xs" data-id="<?= $ms['id_surat']; ?>" data-toggle="modal" data-target="#edit-jen">Edit</button></td>
                                         <td><a href="<?= base_url('admin/del_surat/') . $ms['id_surat']; ?>" class="tombol-hapus btn btn-danger btn-block btn-xs">Hapus</a></td>
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
 <div class="modal fade" id="add-kat">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title">Tambah Kategori Surat</h4>
             </div>
             <div class="modal-body">
                 <form class="form-horizontal form-label-left" action="<?= base_url('admin/add_kategori_surat'); ?>" method="post">
                     <div class="form-group">
                         <label>Kategori</label>
                         <input type="text" class="form-control" name="kategori" required>
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

 <div class="modal fade" id="view-kat">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title">Daftar Kategori Surat</h4>
             </div>
             <div class="modal-body">
                 <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                     <thead>
                         <tr>
                             <th>#</th>
                             <th>Kategori Surat</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php $i = 1; ?>
                         <?php foreach ($kat_surat as $ks) : ?>
                             <tr>
                                 <td><?= $i++; ?></td>
                                 <td><?= $ks['kategori']; ?></td>
                             </tr>
                         <?php endforeach; ?>
                     </tbody>
                 </table>
                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
             </div>
         </div>
         <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->
 </div>


 <div class="modal fade" id="add-jen">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title">Tambah Jenis Surat</h4>
             </div>
             <div class="modal-body">
                 <form class="form-horizontal form-label-left" action="<?= base_url('admin/mst_surat'); ?>" method="post">
                     <div class="form-group">
                         <label>Kode Surat</label>
                         <input type="text" class="form-control" name="kode_surat" value="<?= $kode_surat; ?>" readonly>
                     </div>
                     <div class="form-group">
                         <label>Kategori Surat</label>
                         <select class="form-control" name="kategori_surat" required>
                             <option value="">- Pilih Kategori Surat -</option>
                             <?php foreach ($kat_surat as $ks) : ?>
                                 <option><?= $ks['kategori']; ?></option>
                             <?php endforeach; ?>
                         </select>
                     </div>
                     <div class="form-group">
                         <label>Jenis Surat</label>
                         <input type="text" class="form-control" name="jenis_surat" required>
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

 <div class="modal fade" id="edit-jen">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title">Edit Surat</h4>
             </div>
             <div class="modal-body">
                 <form class="form-horizontal form-label-left" action="<?= base_url('admin/edit_surat'); ?>" method="post">
                     <div class="form-group">
                         <label>Kode Surat</label>
                         <input type="hidden" name="id_surat" id="idsurat">
                         <input type="text" class="form-control" id="kode" readonly>
                     </div>
                     <div class="form-group">
                         <label>Kategori Surat</label>
                         <select class="form-control" name="kategori_surat" id="kategori" required>
                             <option value="">- Pilih Kategori Surat -</option>
                             <?php foreach ($kat_surat as $ks) : ?>
                                 <option><?= $ks['kategori']; ?></option>
                             <?php endforeach; ?>
                         </select>
                     </div>
                     <div class="form-group">
                         <label>Jenis Surat</label>
                         <input type="text" class="form-control" name="jenis_surat" id="jenis" required>
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
     $('.tombol-edit-jen').on('click', function() {
         const id_surat = $(this).data('id');
         $.ajax({
             url: '<?php echo base_url('admin/get_surat'); ?>',
             data: {
                 id_surat: id_surat
             },
             method: 'post',
             dataType: 'json',
             success: function(data) {
                 $('#kode').val(data.kode_surat);
                 $('#kategori').val(data.kategori_surat);
                 $('#jenis').val(data.jenis_surat);
                 $('#idsurat').val(data.id_surat);
             }
         });
     });
 </script>