<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fav Icon -->
    <!-- <link rel="shortcut icon" href="favicon.ico"> -->
    <link rel="stylesheet" href="<?= url("/shared/styles/boot.css"); ?>" />
    <!-- <link rel="stylesheet" href="<?= url("/shared/styles/styles.css"); ?>" /> -->
    <link rel="stylesheet" href="<?= theme("/assets/css/style.css", CONF_VIEW_APP); ?>" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= url("/shared/web/css/bootstrap.min.css"); ?>">
    <!-- Font Awesome CSS -->
    <link href="<?= url("/shared/web/css/font-awesome.css"); ?>" rel="stylesheet">
    <!-- Settings CSS -->
    <link rel="stylesheet" href="<?= url("/shared/web/rs-plugin/css/settings.css"); ?>">
    <!-- Jquery Fancybox CSS -->
    <link rel="stylesheet" type="text/css" href="<?= url("/shared/web/css/jquery.fancybox.min.css"); ?>" media="screen" />
    <!-- Owl Carousel CSS -->
    <link href="<?= url("/shared/web/css/owl.carousel.css"); ?>" rel="stylesheet">
    <!-- Switcher css -->
    <link rel="stylesheet" href="<?= url("/shared/web/css/switcher.css"); ?>">
    <!-- Style CSS -->
    <link href="<?= url("/shared/web/css/style.css"); ?>" rel="stylesheet" id="colors">
    <!-- Open Sans Family -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <!-- Roboto Family -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700" rel="stylesheet">
    <title>Fitness Center</title>
</head>

<body>

    <div class="header-wrap header custom-navbar wow fadeInDown" data-wow-duration="2s" role="navigation">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="logo">
                        <a href="<?= url("/"); ?>">
                            <img src="<?= url("/shared/app/images/logo3.png"); ?>" width="200" alt="">
                        </a>
                    </div>
                    <div class="logo2" style=" width: 150px; margin-top: -3px;">
                        <a href="<?= url("/"); ?>">
                            <img src="<?= url("/shared/app/images/logo3.png"); ?>" width="50" alt="">
                        </a>
                    </div>

                    <div class="navbar-dark">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    </div>
                </div>
                <div class="col-lg-8">

                    <!--Navegation Start-->
                    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                        <div class="container"><a class="navbar-brand" href="#">Menu</a>
                            <div class="collapse navbar-collapse" id="navbarColor01">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item"><a class="nav-link smoothScroll" href="<?= url("/"); ?>">Home</a>
                                    </li>
                                    <!--                <li class="nav-item"> <a class="nav-link smoothScroll" href="#about">Sobre</a> </li>-->
                                    <!-- <li class="nav-item"> <a class="nav-link smoothScroll" href="#gallery">Gallery</a> </li>
                                <li class="nav-item"> <a class="nav-link smoothScroll" href="#classes">Classes</a></li> -->
                                    <!--                <li class="nav-item"> <a class="nav-link smoothScroll" href="#prices">Prices</a></li>-->
                                    <!--                <li class="nav-item"> <a class="nav-link smoothScroll" href="#trainers">Trainers</a> </li>-->
                                    <li class="nav-item"><a class="nav-link smoothScroll" href="<?= url("/blog"); ?>">Blog</a></li>
                                    <li class="nav-item"><a class="nav-link smoothScroll" href="<?= url("/landing_page2"); ?>">Página de venda</a></li>
                                    <li class="nav-item"><a class="nav-link smoothScroll" href="<?= url("/login"); ?>">Login</a></li>
                                </ul>
                            </div>
                        </div>
                    </nav>

                    <!--Navegation End-->
                </div>
            </div>
        </div>
    </div>

    <?= $v->section("content"); ?>

    <script src="<?= url("/shared/web/js/jquery-3.2.1.slim.min.js"); ?>"></script>
    <!-- Popper min -->
    <script src="<?= url("/shared/web/js/popper.min.js"); ?>"></script>
    <!-- Bootstrap min file -->
    <script src="<?= url("/shared/web/js/bootstrap.min.js"); ?>"></script>
    <!-- Switcher -->
    <script src="<?= url("/shared/web/js/switcher.js"); ?>"></script>
    <!-- Revolution Slider file -->
    <script type="text/javascript" src="<?= url("/shared/web/rs-plugin/js/jquery.themepunch.tools.min.js"); ?>"></script>
    <script type="text/javascript" src="<?= url("/shared/web/rs-plugin/js/jquery.themepunch.revolution.min.js"); ?>"></script>
    <!-- Isotope -->
    <script src="<?= url("/shared/web/js/isotope.js"); ?>"></script>
    <!-- Owl Carousel -->
    <script src="<?= url("/shared/web/js/owl.carousel.js"); ?>"></script>
    <!-- Jquery Fancybox -->
    <script src="<?= url("/shared/web/js/jquery.fancybox.min.js"); ?>"></script>
    <!-- Counter -->
    <script src="<?= url("/shared/web/js/counter.js"); ?>"></script>
    <!-- general script file -->
    <script type="text/javascript" src="<?= url("/shared/web/js/script.js"); ?>"></script>
</body>

<!-- Mirrored from malikhassan.com/html/fitness_center/html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 07 May 2021 00:33:44 GMT -->

</html>