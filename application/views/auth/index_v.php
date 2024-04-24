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
    <div class="login-box mb-3">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <!-- <img src="<?= base_url('src/assets/img/icon/logo.png') ?>" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt=""> -->
                <a href="<?= base_url('auth') ?>" class="h2 text-bold text-uppercase text-dark"><?= $webname ?></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg text-dark">You can Login here!</p>
                <form id="formLogin">
                    <div class="form-group">
                        <label for="" class="text-dark">Email Address</label>
                        <div class="input-group ">
                            <input type="email" name="emailLogin" class="form-control" placeholder="Email" autocomplete="email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="text-dark">Password</label>
                        <div class="input-group">
                            <input type="password" name="passwordLogin" id="passwordLogin" class="form-control" placeholder="Password" autocomplete="off">
                            <div class="input-group-append">
                                <button type="button" class="input-group-text" id="tpl">
                                    <span id="itp" class="fas fa-eye"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>
                </form>
                <div class="social-auth-links text-center">
                    <p class="text-dark">- OR -</p>
                    <div class="d-flex justify-content-between mb-3">
                        <a href="<?= $register_url ?>" class="text-underline">Don't have an account?</a>
                        <a href="<?= $f_password_url ?>" class="text-underline">Forgot Password?</a>
                    </div>
                </div>
                <p class="mb-0">
                <p class="text-center text-muted">Version <?= $webversion ?></p>
                </p>
            </div>
        </div>
    </div>
    <div class="text-center">
        <p class="text-muted">&copy; <?= date('Y') ?> Danyxdev. All rights reserved.</p>
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
    <script src="<?= base_url('src/assets/js/pages/auth.js') ?>"></script>
</body>

</html>