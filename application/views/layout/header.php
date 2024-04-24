<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= appSetting("webname") ?></title>
    <link rel="shortcut icon" href="<?= base_url('src/assets/img/icon/logo.png') ?>" type="image/x-icon">
    <!-- google font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- icon -->
    <link rel="stylesheet" href="<?= base_url('src/plugins/fontawesome-free/css/all.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('src/plugins/ionicons/ionicons.min.css') ?>">
    <!-- plugins -->
    <link rel="stylesheet" href="<?= base_url('src/plugins/sweetalert2/sweetalert2.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('src/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('src/plugins/flatpickr/flatpickr.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('src/plugins/jquery-steps/jquery.steps.css') ?>">
    <link rel="stylesheet" href="<?= base_url('src/plugins/select2/css/select2.min.css') ?>">
    <!-- datatables -->
    <link rel="stylesheet" href="<?= base_url('src/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('src/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('src/plugins/datatables-select/css/select.bootstrap4.min.css') ?>">
    <!-- main -->
    <link rel="stylesheet" href="<?= base_url('src/assets/css/adminlte.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('src/assets/css/main.css') ?>">
    <link rel="stylesheet" href="<?= base_url('src/assets/css/docs.css') ?>">
    <link rel="stylesheet" href="<?= base_url('src/assets/css/highlighter.css') ?>">
</head>

<body class="hold-transition sidebar-mini layout-fixed sidebar-collapse">
    <?php $this->load->view('layout/loading_view') ?>
    <div class="wrapper">