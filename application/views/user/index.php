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
                     <div class="icon"><i class="fa fa-share-square-o"></i></div>
                     <div class="count"><?= $kirim_surat; ?></div>
                     <h3>Total Surat Keluar</h3>
                     <p></p>
                 </div>
             </div>
             <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                 <div class="tile-stats">
                     <div class="icon"><i class="fa fa-envelope"></i></div>
                     <div class="count"><?= $total_surat; ?></div>
                     <h3>Total Surat </h3>
                     <p></p>
                 </div>
             </div>
             <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                 <div class="tile-stats">
                     <div class="icon"><i class="fa fa-share-square-o"></i></div>
                     <div class="count"><?= $kirim_berkas; ?></div>
                     <h3>Total Berkas Keluar</h3>
                     <p></p>
                 </div>
             </div>
             <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                 <div class="tile-stats">
                     <div class="icon"><i class="fa fa-files-o"></i></div>
                     <div class="count"><?= $total_berkas; ?></div>
                     <h3>Total Berkas</h3>
                     <p></p>
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
                         <h2> Level Akses : <?= $user['level']; ?></h2>
                         <div class="clearfix"></div>
                     </div>
                     <div class="x_content">
                         <div class="col-xs-2">
                             <!-- required for floating -->
                             <!-- Nav tabs -->
                             <ul class="nav nav-tabs tabs-left">
                                 <li class="active"><a href="#home" data-toggle="tab">Menu Utama</a>
                                 </li>
                                 <li><a href="#profile" data-toggle="tab">Buat Surat</a>
                                 </li>
                                 <li><a href="#messages" data-toggle="tab">Upload Berkas</a>
                                 </li>

                             </ul>
                         </div>

                         <div class="col-xs-10">
                             <!-- Tab panes -->
                             <div class="tab-content">
                                 <div class="tab-pane active" id="home">
                                     <p class="lead">Tambah Data Surat dan Berkas</p>
                                     <p>
                                         <div class="alert alert-success">
                                             <i class="fa fa-hand-o-left"></i> Silahkan Pilih menu disamping untuk menambahkan data
                                         </div>
                                     </p>
                                 </div>
                                 <div class="tab-pane" id="profile">
                                     <p>
                                         <div class="x_panel">
                                             <div class="x_title">
                                                 <h2>Buat Surat</h2>
                                                 <div class="clearfix"></div>
                                             </div>
                                             <div class="x_content">
                                                 <form action="<?= base_url('user/index'); ?>" method="post">
                                                     <div class="row">
                                                         <div class="col-md-6">
                                                             <div class="form-group">
                                                                 <label>Kode Surat</label>
                                                                 <input type="text" class="form-control" name="kd_surat" value="<?= $kd_surat; ?>" readonly>
                                                             </div>
                                                         </div>
                                                         <div class="col-md-6">
                                                             <div class="form-group">
                                                                 <label>No Surat</label>
                                                                 <input type="text" class="form-control" name="no_surat" required>
                                                             </div>
                                                         </div>
                                                     </div>
                                                     <div class="row">
                                                         <div class="col-md-4">
                                                             <div class="form-group">
                                                                 <label>Jenis Surat</label>
                                                                 <select class="form-control" name="jns_surat" required>
                                                                     <option value="">- Pilih Surat -</option>
                                                                     <?php foreach ($jenis_surat as $js) : ?>
                                                                         <option value="<?= $js['jenis_surat']; ?>"><?= $js['kategori_surat']; ?> - <?= $js['jenis_surat']; ?></option>
                                                                     <?php endforeach; ?>
                                                                 </select>
                                                             </div>
                                                         </div>
                                                         <div class="col-md-4">
                                                             <div class="form-group">
                                                                 <label>Tujuan Surat</label>
                                                                 <select class="form-control" name="tuj_surat" required>
                                                                     <option value="">- Pilih Tujuan -</option>
                                                                     <?php foreach ($mst_divisi as $md) : ?>
                                                                         <option><?= $md['nama_divisi']; ?></option>
                                                                     <?php endforeach; ?>
                                                                 </select>
                                                             </div>
                                                         </div>
                                                         <div class="row">
                                                             <div class="col-md-4">
                                                                 <div class="form-group">
                                                                     <label>Tanggal Surat</label>
                                                                     <input type="date" class="form-control" name="tgl_surat" required>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                     <div class="form-group">
                                                         <label>Isi Surat</label>
                                                         <textarea class="form-control" rows="3" placeholder="Isi Surat" name="isi_surat" required></textarea>
                                                     </div>
                                                     <button type="submit" class="btn btn-primary">Simpan Data</button>
                                                 </form>
                                             </div>
                                         </div>
                                     </p>
                                 </div>

                                 <div class="tab-pane" id="messages">
                                     <p>
                                         <div class="x_panel">
                                             <div class="x_title">
                                                 <h2>Upload Berkas</h2>
                                                 <div class="clearfix"></div>
                                             </div>
                                             <div class="x_content">
                                                 <?php echo form_open_multipart('user/add_berkas'); ?>
                                                 <div class="row">
                                                     <div class="col-md-6">
                                                         <div class="form-group">
                                                             <label>Kode Berkas</label>
                                                             <input type="text" class="form-control" name="kd_berkas" value="<?= $kd_berkas; ?>" readonly>
                                                         </div>
                                                     </div>
                                                     <div class="col-md-6">
                                                         <div class="form-group">
                                                             <label>Nama Berkas</label>
                                                             <input type="text" class="form-control" name="nama_berkas" required>
                                                         </div>
                                                     </div>
                                                 </div>
                                                 <div class="row">
                                                     <div class="col-md-6">
                                                         <div class="form-group">
                                                             <label>Tujuan Berkas</label>
                                                             <select class="form-control" name="tuj_berkas" required>
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
                                                             <input type="date" class="form-control" name="tgl_berkas" required>
                                                         </div>
                                                     </div>
                                                 </div>
                                                 <div class="form-group">
                                                     <label>Pesan</label>
                                                     <textarea class="form-control" rows="3" placeholder="Isi Pesan" name="pesan" required></textarea>
                                                 </div>
                                                 <div class="form-group">
                                                     <label for="exampleFormControlFile1">Upload Berkas</label>
                                                     <input type="file" class="form-control-file" name="file">
                                                 </div>
                                                 <span class="text-muted" style="font-size:12px;">* Format File xls, xlsx, doc, docx, ppt, pptx, pdf, zip, rar, txt dan ukuran file kurang dari 2 mb</span>
                                                 <hr style="margin-bottom:10px;margin-top:2px;">
                                                 <button type="submit" class="btn btn-primary">Simpan Data</button>
                                                 </form>
                                             </div>
                                         </div>
                                     </p>
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
 </div>
 <!-- /page content -->