<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> <?= appSetting('version') ?>
    </div>
    <strong>Copyright &copy; <?= date('Y') ?> <a href="<?= base_url('') ?>"><?= appSetting('webname') ?></a>.</strong> All rights reserved.
</footer>
</div>

<!-- plugins -->
<script src="<?= base_url('src/plugins/jquery/jquery.min.js') ?>"></script>
<!-- Validation -->
<script src="<?= base_url('src/plugins/jquery-validation/jquery.validate.min.js') ?>"></script>
<script src="<?= base_url('src/plugins/jquery-validation/additional-methods.js') ?>"></script>
<script src="<?= base_url('src/plugins/jquery-validation/localization/messages_id.js') ?>"></script>
<!-- BS -->
<script src="<?= base_url('src/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('src/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>"></script>
<script src="<?= base_url('src/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
<script src="<?= base_url('src/plugins/bs-custom-file-input/bs-custom-file-input.min.js') ?>"></script>

<!-- main -->
<script>
    var baseUrl = "<?= base_url() ?>";
</script>
<script src="<?= base_url('src/assets/js/component.js') ?>"></script>
<script src="<?= base_url('src/assets/js/adminlte.min.js') ?>"></script>
<script src="<?= base_url('src/assets/js/main.js') ?>"></script>
<!-- pages -->
<?php if ($this->uri->segment(1) == "dashboard") { ?>
    <script src="<?= base_url('src/assets/js/pages/dashboard_main.js') ?>?<?= appSetting('webversion') ?>"></script>
<?php } ?>

</body>

</html>