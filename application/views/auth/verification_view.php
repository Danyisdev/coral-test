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

<body class="hold-transition register-page">
    <?php $this->load->view('layout/loading_view') ?>
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height:100vh;">
            <div class="col-12">
                <div class="card">
                    <div class="card-body px-2">
                        <div class="mb-3 d-flex justify-content-center align-items-center">
                            <img src="<?= $img_illust ?>" class="img-fluid" alt="">
                        </div>
                        <div class="mb-3 py-4 text-center">
                            <h3 class="text-bold mb-2 text-capitalize">Your email has been successfully authenticated</h3>
                            <h4 class="text-primary mb-3">You are now all set to access our app!</h4>
                            <a href="<?= $login_url ?>" class="text-capitalize text-underline">Back to Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var baseUrl = "<?= base_url() ?>";
    </script>
    <script src="<?= base_url('src/plugins/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('src/plugins/jquery-ui/jquery-ui.min.js') ?>"></script>
    <script src="<?= base_url('src/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('src/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
    <script src="<?= base_url('src/assets/js/component.js') ?>"></script>
    <script src="<?= base_url('src/assets/js/adminlte.min.js') ?>"></script>
</body>

</html>