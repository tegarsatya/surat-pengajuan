<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <nav>
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="#" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <img src="<?= base_url('assets/img/profile/' . $user['image']); ?>" alt=""><?= $user['nama']; ?>
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <?php if ($user['level'] == 'Admin') : ?>
                            <li><a href="<?= base_url('admin/profile'); ?>"><i class="fa fa-user"></i> Profile</a></li>
                        <?php else : ?>
                            <li><a href="<?= base_url('user/profile'); ?>"><i class="fa fa-user"></i> Profile</a></li>
                        <?php endif; ?>
                        <li><a href="<?= base_url('auth/logout'); ?>" class="tombol-logout"><i class="fa fa-sign-out"></i> Logout</a></li>
                    </ul>
                </li>


            </ul>
        </nav>
    </div>
</div>
<!-- /top navigation -->