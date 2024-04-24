<nav class="main-header navbar navbar-expand navbar-light navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?= base_url('dashboard') ?>" class="nav-link">Dashboard</a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fa fa-cog"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <div class="dropdown-item">
                    <div class="media">
                        <img src="<?= base_url('src/assets/img/icon/logo.png') ?>" alt="User Avatar" class="img-size-50 img-circle mr-3">
                        <div class="media-body py-2">
                            <h3 class="dropdown-item-title">
                                <?= login_sess('email') ?>
                            </h3>
                            <p class="text-sm"><?= login_sess('username')  ?></p>
                        </div>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <a href="<?= base_url("user/profile") ?>" class="dropdown-item dropdown-footer">Profile</a>
                <a href="<?= base_url("auth/logout") ?>" onclick="return confirm('Are you sure you want to Logout?')" class="dropdown-item dropdown-footer">Logout</a>
            </div>
        </li>
    </ul>
</nav>