<!DOCTYPE html>
<html lang="pt-br">
<!-- START: Head-->

<!-- Mirrored from html.designstream.co.in/pick/html/page-404.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 Feb 2021 19:41:21 GMT -->

<head>
    <meta charset="UTF-8">
    <?= $head ?>
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <!-- START: Template CSS-->
    <link rel="stylesheet" href="<?= url("/shared/app/vendors/bootstrap/css/bootstrap.min.css"); ?>">
    <link rel="stylesheet" href="<?= url("/shared/app/vendors/jquery-ui/jquery-ui.min.css"); ?>">
    <link rel="stylesheet" href="<?= url("/shared/app/vendors/jquery-ui/jquery-ui.theme.min.css"); ?>">
    <link rel="stylesheet" href="<?= url("/shared/app/vendors/simple-line-icons/css/simple-line-icons.css"); ?>">
    <link rel="stylesheet" href="<?= url("/shared/app/vendors/flags-icon/css/flag-icon.min.css"); ?>">

    <!-- END Template CSS-->

    <!-- START: Custom CSS-->
    <link rel="stylesheet" href="<?= url("/shared/app/css/main.css"); ?>">
    <!-- END: Custom CSS-->
</head>
<!-- END Head-->

<!-- START: Body-->

<body id="main-container" class="default bg-primary">
    <!-- START: Main Content-->
    <div class="container">
        <div class="row vh-100 justify-content-between align-items-center">
            <div class="col-12">
                <div class="lockscreen  mt-5 mb-5">
                    <div class="jumbotron mb-0 text-center theme-background rounded">
                        <h1 class="display-3 font-weight-bold"> &bull;<?= $error->code; ?>&bull; </h1>
                        <h5><i class="ion ion-alert pr-2"></i><?= $error->title; ?></h5>
                        <p><?= $error->message; ?></p>

                        <?php if ($error->link) : ?>
                            <a title="<?= $error->linkTitle; ?>" href="<?= $error->link; ?>" class="btn btn-primary"><?= $error->linkTitle; ?></a>
                        <?php endif; ?>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- END: Content-->

    <!-- START: Template JS-->
    <script src="<?= url("/shared/app/vendors/jquery/jquery-3.3.1.min.js"); ?>"></script>
    <script src="<?= url("/shared/app/vendors/jquery-ui/jquery-ui.min.js"); ?>"></script>
    <script src="<?= url("/shared/app/vendors/moment/moment.js"); ?>"></script>
    <script src="<?= url("/shared/app/vendors/bootstrap/js/bootstrap.bundle.min.js"); ?>"></script>
    <script src="<?= url("/shared/app/vendors/slimscroll/jquery.slimscroll.min.js"); ?>"></script>

    <!-- END: Template JS-->
</body>
<!-- END: Body-->

<!-- Mirrored from html.designstream.co.in/pick/html/page-404.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 Feb 2021 19:41:21 GMT -->

</html>