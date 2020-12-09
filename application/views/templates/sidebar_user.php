<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>USER</h3>
        <ul class="nav side-menu">
            <ul class="nav side-menu">
                <li><a href="<?= base_url('user/index'); ?>"><i class="fa fa-home"></i> Beranda</a></li>
            </ul>
            <li><a><i class="fa fa-files-o"></i> Daftar Berkas <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="<?= base_url('user/list_surat'); ?>"> Daftar Surat</a></li>
                    <li><a href="<?= base_url('user/list_berkas'); ?>"> Daftar Berkas</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-inbox"></i> Kotak Masuk <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="<?= base_url('user/surat_masuk'); ?>"> Surat Masuk</a></li>
                    <li><a href="<?= base_url('user/berkas_masuk'); ?>"> Berkas Masuk</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="menu_section">
        <h3>END</h3>
        <ul class="nav side-menu">
            <li><a href="<?= base_url('auth/logout'); ?>" class="tombol-logout"><i class="fa fa-sign-out"></i> Logout</a></li>
        </ul>
    </div>

</div>
<!-- /sidebar menu -->

<!-- /menu footer buttons -->
</div>
</div>