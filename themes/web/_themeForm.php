<!doctype html>
<html lang="en">

<!-- Mirrored from uigaint.com/demo/html/anfra_2/kyc-2/kyc-v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 23 Oct 2021 21:37:13 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Anfra KYC</title>

    <link rel="stylesheet" href="<?= url("/shared/styles/boot.css"); ?>" />
    <!-- <link rel="stylesheet" href="<?= url("/shared/styles/styles.css"); ?>" /> -->
    <link rel="stylesheet" href="<?= theme("/assets/css/style.css", CONF_VIEW_APP); ?>" />

    <link rel="stylesheet" href="<?= url("/request/multiselect/fonts/icomoon/style.css"); ?>">

    <link rel="stylesheet" href="<?= url("/shared/multiselect/css/chosen.css"); ?>">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= url("/shared/multiselect/css/bootstrap.min.css"); ?>">

    <!-- Style -->
    <link rel="stylesheet" href="<?= url("/shared/multiselect/css/style.css"); ?>">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= url("/shared/form/assets/css/bootstrap.min.css"); ?>">

    <!-- External Css -->
    <link rel="stylesheet" href="<?= url("/shared/form/assets/css/line-awesome.min.css"); ?>">

    <!-- Custom Css -->
    <link rel="stylesheet" type="text/css" href="<?= url("/shared/form/css/main.css"); ?>">
    <link rel="stylesheet" type="text/css" href="<?= url("/shared/form/css/kyc-2.css"); ?>">

    <link rel="stylesheet" href="<?= url("/shared/app/vendors/fontawesome/css/all.min.css"); ?>">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&amp;display=swap" rel="stylesheet">

    <!-- Favicon -->
    <!--    <link rel="icon" href="../images/favicon.png">-->
    <!--    <link rel="apple-touch-icon" href="../images/apple-touch-icon.png">-->
    <!--    <link rel="apple-touch-icon" sizes="72x72" href="../images/icon-72x72.png">-->
    <!--    <link rel="apple-touch-icon" sizes="114x114" href="../images/icon-114x114.png">-->


</head>

<body>


    <div class="ajax_load">
        <div class="ajax_load_box">
            <div class="ajax_load_box_circle"></div>
            <p class="ajax_load_box_title" style="color: white">Aguarde, carregando...</p>
        </div>
    </div>

    <div class="ajax_response" style="z-index: 99999;"><?= flash(); ?></div>

    <div class="ugf-nav" style="background-color: #c0c0c0;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="navigation">
                        <div class="logo">
                            <a class="navbar-brand" href="">
                                <img src="<?= url("/shared/img/logo1.png"); ?>" alt="" width="100">
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?= $v->section("content"); ?>


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?= url("/shared/form/assets/js/jquery.min.js"); ?>"></script>
    <script src="<?= url("/shared/form/assets/js/popper.min.js"); ?>"></script>
    <script src="<?= url("/shared/form/assets/js/bootstrap.min.js"); ?>"></script>

    <!-- <script src="../assets/js/owl.carousel.min.js"></script> -->
    <!-- <script src="../assets/js/countrySelect.min.js"></script> -->

    <script src="<?= url("/shared/form/js/custom.js"); ?>"></script>

    <script src="<?= url("/shared/multiselect/js/jquery-3.3.1.min.js"); ?>"></script>
    <script src="<?= url("/shared/multiselect/js/popper.min.js"); ?>"></script>
    <script src="<?= url("/shared/multiselect/js/bootstrap.min.js"); ?>"></script>
    <script src="<?= url("/shared/multiselect/js/chosen.jquery.min.js"); ?>"></script>

    <script src="<?= url("/shared/multiselect/js/main.js"); ?>"></script>

    <script src="<?= theme("/assets/js/script.js", CONF_VIEW_APP); ?>"></script>

    <script src="<?= url("/shared/scripts/jquery.form.js"); ?>"></script>
    <script src="<?= url("/shared/scripts/jquery-ui.js"); ?>"></script>
    <script src="<?= url("/shared/scripts/jquery.mask.js"); ?>"></script>
    <script src="<?= url("/shared/scripts/tinymce/tinymce.min.js"); ?>"></script>

    <?= $v->section("scripts"); ?>


</body>

<!-- Mirrored from uigaint.com/demo/html/anfra_2/kyc-2/kyc-v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 23 Oct 2021 21:37:19 GMT -->

</html>