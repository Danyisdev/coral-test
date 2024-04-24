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
    <link rel="stylesheet" href="<?= base_url('src/plugins/select2/css/select2.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('src/plugins/sweetalert2/sweetalert2.min.css') ?>">
</head>

<body class="hold-transition register-page">
    <?php $this->load->view('layout/loading_view') ?>
    <div class="register-box mb-4">
        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Register Your Account Here!</p>
                <form id="formRegist">
                    <div class="form-group">
                        <label class="text-dark">Name</label>
                        <div class="input-group ">
                            <input type="username" name="username" class="form-control" placeholder="Username" autocomplete="email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="text-dark">Email Address</label>
                        <div class="input-group ">
                            <input type="email" name="email" class="form-control" placeholder="Email" autocomplete="email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <label class="text-primary text-xs m-0">*Notifications will be sent to the email you registered</label>
                    </div>
                    <div class="form-group">
                        <label class="text-dark">Password</label>
                        <div class="input-group">
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" autocomplete="off">
                            <div class="input-group-append">
                                <button type="button" class="input-group-text" id="tpl">
                                    <span id="itp" class="fas fa-eye"></span>
                                </button>
                            </div>
                        </div>
                        <label class="text-primary text-xs m-0">*Password must be more than 6 characters long.</label>
                        <label class="text-primary text-xs m-0">*Password must less than 8 characters long.</label>
                    </div>
                    <div class="form-group">
                        <label class="text-dark">Password Confirmation</label>
                        <div class="input-group">
                            <input type="password" name="confirm_password" id="passwordConfirm" class="form-control" placeholder="Password" autocomplete="off">
                            <div class="input-group-append">
                                <button type="button" class="input-group-text" id="tplc">
                                    <span id="itpc" class="fas fa-eye"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="profile_pic">Profile Picture</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input name="profile_picture" type="file" class="custom-file-input" id="profile_pic" accept="image/png, image/jpg, image/jpeg">
                                <label class="custom-file-label" for="profile_pic">Choose file</label>
                            </div>
                        </div>
                        <label class="text-primary text-xs m-0">*Image size can't exceed 3 mb.</label>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                    </div>
                </form>
                <div class="social-auth-links text-center">
                    <p>- OR -</p>
                    <a href="<?= $login_url ?>" class="text-underline">
                        Already have an account?
                    </a>
                </div>
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
    <script src="<?= base_url('src/plugins/bs-custom-file-input/bs-custom-file-input.min.js') ?>"></script>
    <script src="<?= base_url('src/plugins/select2/js/select2.full.min.js') ?>"></script>
    <script src="<?= base_url('src/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
    <script src="<?= base_url('src/assets/js/adminlte.min.js') ?>"></script>
    <script src="<?= base_url('src/assets/js/main.js') ?>"></script>
    <script src="<?= base_url('src/assets/js/component.js') ?>"></script>
    <script src="<?= base_url('src/assets/js/pages/auth_register.js') ?>"></script>
</body>

</html>