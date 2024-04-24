<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $webname . ' | V' . $webversion ?></title>
    <link rel="shortcut icon" href="<?= base_url('src/assets/img/icon/logo.png') ?>" type="image/x-icon">
    <!-- google font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- icon -->
    <link rel="stylesheet" href="<?= base_url('src/plugins/fontawesome-free/css/all.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('src/plugins/fontawesome-free/css/brands.min.css') ?>">

    <!-- main -->
    <link rel="stylesheet" href="<?= base_url('src/assets/css/adminlte.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('src/assets/css/main.css') ?>">
    <!-- plugins -->
    <link rel="stylesheet" href="<?= base_url('src/plugins/jquery-ui/jquery-ui.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('src/plugins/sweetalert2/sweetalert2.min.css') ?>">
</head>

<body class="hold-transition login-page">
    <?php $this->load->view('layout/loading_view') ?>
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <p class="h2 text-bold text-uppercase text-dark">Reset Password</p>
            </div>
            <div class="card-body">
                <form id="resetPassword">
                    <input type="hidden" name="reff_user" value="<?= $reff_user ?>" class="form-control" placeholder="Password" autocomplete="off">
                    <div class="form-group">
                        <label for="password" class="text-dark">New Password</label>
                        <div class="input-group">
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" autocomplete="off">
                            <div class="input-group-append">
                                <button type="button" class="input-group-text" id="tpl">
                                    <span id="itp" class="fas fa-eye"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password" class="text-dark">Password Confirmation</label>
                        <div class="input-group">
                            <input type="password" name="confirm_password" id="passwordConfirm" class="form-control" placeholder="Password" autocomplete="off">
                            <div class="input-group-append">
                                <button type="button" class="input-group-text" id="tplc">
                                    <span id="itpc" class="fas fa-eye"></span>
                                </button>
                            </div>
                        </div>
                        <label class="text-primary text-xs m-0">*Password must be more than 6 characters long.</label>
                        <label class="text-primary text-xs m-0">*Password must less than 8 characters long.</label>
                    </div>
                    <div class="form-group mb-3">
                        <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
                    </div>
                </form>
                <div class="social-auth-links text-center">
                    <p class="my-1">- OR -</p>
                    <a href="<?= $login_url ?>" class="text-underline">
                        Backt to Login Page
                    </a>
                </div>
                <p class="mb-0">
                <p class="text-center text-muted">Version <?= $webversion ?></p>
                </p>
            </div>
        </div>
    </div>

    <script>
        var baseUrl = "<?= base_url() ?>";
    </script>
    <script src="<?= base_url('src/plugins/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('src/plugins/jquery-ui/jquery-ui.min.js') ?>"></script>
    <script src="<?= base_url('src/plugins/jquery-validation/jquery.validate.min.js') ?>"></script>
    <script src="<?= base_url('src/plugins/jquery-validation/additional-methods.min.js') ?>"></script>
    <script src="<?= base_url('src/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('src/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>"></script>
    <script src="<?= base_url('src/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
    <script src="<?= base_url('src/assets/js/component.js') ?>"></script>
    <script src="<?= base_url('src/assets/js/adminlte.min.js') ?>"></script>
    <script src="<?= base_url('src/assets/js/pages/reset-password.js') ?>"></script>
</body>

</html>