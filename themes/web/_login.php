<!DOCTYPE html>
<html lang="pt-br">
<!-- START: Head-->

<!-- Mirrored from html.designstream.co.in/pick/html/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 Feb 2021 19:41:21 GMT -->

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="shortcut icon" href="dist/images/favicon.ico" />
    <meta name="viewport" content="width=device-width,initial-scale=1">



    <!-- START: Template CSS-->
    <link rel="stylesheet" href="<?= url("/shared/app/vendors/bootstrap/css/bootstrap.min.css"); ?>">
    <link rel="stylesheet" href="<?= url("/shared/app/vendors/jquery-ui/jquery-ui.min.css"); ?>">
    <link rel="stylesheet" href="<?= url("/shared/app/vendors/jquery-ui/jquery-ui.theme.min.css"); ?>">
    <link rel="stylesheet" href="<?= url("/shared/app/vendors/simple-line-icons/css/simple-line-icons.css"); ?>">
    <link rel="stylesheet" href="<?= url("/shared/app/vendors/flags-icon/css/flag-icon.min.css"); ?>">

    <!-- END Template CSS-->
    <link rel="stylesheet" href="<?= url("/shared/styles/boot.css"); ?>" />
    <link rel="stylesheet" href="<?= url("/shared/styles/styles.css"); ?>" />
    <link rel="stylesheet" href="<?= theme("/assets/css/login.css"); ?>" />


    <!-- START: Custom CSS-->
    <link rel="stylesheet" href="<?= url("/shared/app/css/main.css"); ?>">
    <!-- END: Custom CSS-->
</head>
<!-- END Head-->

<!-- START: Body-->

<body id="main-container" class="default">

    <div class="ajax_load" style="z-index: 99999999999;">
        <div class="ajax_load_box">
            <div class="ajax_load_box_circle"></div>
            <p class="ajax_load_box_title">Aguarde, carregando...</p>
        </div>
    </div>

    <?= $v->section("content"); ?>

    <script src="<?= url("/shared/scripts/jquery.min.js"); ?>"></script>

    <script src="<?= url("/shared/app/vendors/jquery-ui/jquery-ui.min.js"); ?>"></script>
    <script src="<?= url("/shared/app/vendors/moment/moment.js"); ?>"></script>
    <script src="<?= url("/shared/app/vendors/bootstrap/js/bootstrap.bundle.min.js"); ?>"></script>
    <script src="<?= url("/shared/app/vendors/slimscroll/jquery.slimscroll.min.js"); ?>"></script>

    <script src="<?= url("/shared/scripts/jquery.form.js"); ?>"></script>
    <script src="<?= url("/shared/scripts/jquery-ui.js"); ?>"></script>
    <script src="<?= url("/shared/scripts/jquery.mask.js"); ?>"></script>
    <script src="<?= url("/shared/scripts/tinymce/tinymce.min.js"); ?>"></script>
    <script src="<?= theme("/assets/js/login.js"); ?>"></script>

    <!-- END: Template JS-->
</body>
<!-- END: Body-->

<!-- Mirrored from html.designstream.co.in/pick/html/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 Feb 2021 19:41:21 GMT -->

</html>