<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?= $head ?>

    <!-- Fav Icon -->
    <!-- <link rel="shortcut icon" href="favicon.ico"> -->
    <link rel="stylesheet" href="<?= url("/shared/styles/boot.css"); ?>"/>
    <!-- <link rel="stylesheet" href="<?= url("/shared/styles/styles.css"); ?>" /> -->
    <link rel="stylesheet" href="<?= theme("/assets/css/style.css", CONF_VIEW_APP); ?>"/>

    <link rel="stylesheet" href="<?= url("/shared/landing1/css/font-awesome.min.css"); ?>">
    <link rel="stylesheet" type="text/css" href="<?= url("/shared/landing1/css/bootstrap.min.css"); ?>">
    <link rel="stylesheet" type="text/css" href="<?= url("/shared/landing1/css/font-awesome.min.css"); ?>">
    <link rel="stylesheet" type="text/css" href="<?= url("/shared/landing1/css/animate.css"); ?>">
    <link rel="stylesheet" type="text/css" href="<?= url("/shared/landing1/css/iconfont.css"); ?>">
    <link rel="stylesheet" type="text/css" href="<?= url("/shared/landing1/css/owl.carousel.min.css"); ?>">
    <link rel="stylesheet" type="text/css" href="<?= url("/shared/landing1/css/owl.theme.default.min.css"); ?>">
    <link rel="stylesheet" type="text/css" href="<?= url("/shared/landing1/css/magnific-popup.css"); ?>">

    <link rel="stylesheet" href="<?= url("/shared/landing1/css/plugins.css"); ?>"/>

    <link rel="stylesheet" type="text/css" href="<?= url("/shared/landing1/css/style.css"); ?>">

    <link rel="stylesheet" href="<?= url("/shared/landing1/css/responsive.css"); ?>"/>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= url("/shared/web/css/bootstrap.min.css"); ?>">
    <!-- Font Awesome CSS -->
    <link href="<?= url("/shared/web/css/font-awesome.css"); ?>" rel="stylesheet">
    <!-- Settings CSS -->
    <link rel="stylesheet" href="<?= url("/shared/web/rs-plugin/css/settings.css"); ?>">
    <!-- Jquery Fancybox CSS -->
    <link rel="stylesheet" type="text/css" href="<?= url("/shared/web/css/jquery.fancybox.min.css"); ?>"
          media="screen"/>
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

    <style>
        .imagem-padrao {
            max-width: 700px;
            max-height: 700px;
            width: auto;
            height: auto;
        }
    </style>

    <style>
        @media all and (max-width: 479px) {
            .imagem-resolucao {
                height: 866px;
                margin-top: -107px;
            }

            .logo-resolucao {
                margin-left: -140px
            }
        }

        @media all and (max-width: 599px) {
            .imagem-resolucao {
                height: 238px;
                margin-top: -26px;
            }

            .logo-resolucao {
                margin-left: -15px;
                height: 50px;
                width: 120px;
                margin-top: -10px;
            }
        }

        @media all and (min-width: 480px) and (max-width: 768px) {
            .imagem-resolucao {
                height: 866px;
                margin-top: -107px;
            }

            .logo-resolucao {
                margin-left: 10px;
                margin-top: -30px;
            }
        }

        @media all and (min-width: 768px) and (max-width: 959px) {
            .imagem-resolucao {
                height: 446px;
                margin-top: -5px;
            }

            .logo-resolucao {
                margin-left: -8px
            }
        }

        @media all and (min-width: 960px) and (max-width: 1199px) {
            .imagem-resolucao {
                height: 866px;
                margin-top: -107px;
            }

            .logo-resolucao {
                margin-left: -140px
            }
        }

        @media all and (min-width: 1199px) {
            .imagem-resolucao {
                height: 866px;
                margin-top: -107px;
            }

            .logo-resolucao {
                margin-left: -140px
            }
        }
    </style>

</head>
<body>

<div class="header-wrap header custom-navbar wow fadeInDown" data-wow-duration="2s" role="navigation">
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
                <div class="logo logo-resolucao"><a href="<?= url("/"); ?>"><img
                                src="<?= url("/shared/app/images/logo3.png"); ?>"
                                width="200" alt=""></a></div>
                <div class="logo2"><a href="<?= url("/"); ?>"><img src="<?= url("/shared/app/images/logo3.png"); ?>"
                                                                   style="height: 60px; width: 150px" alt=""></a></div>
                <div class="navbar-dark">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01"
                            aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation"><span
                                class="navbar-toggler-icon"></span></button>
                </div>
            </div>
            <div class="col-lg-10">

                <!--Navegation Start-->
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <div class="container"><a class="navbar-brand" href="#">Menu</a>
                        <div class="collapse navbar-collapse" id="navbarColor01">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item"><a class="nav-link smoothScroll" href="#quemsoueu">Quem sou Eu</a>
                                </li>
                                <li class="nav-item"><a class="nav-link smoothScroll" href="#comofunciona">Como
                                        Funciona</a>
                                </li>
                                <li class="nav-item"><a class="nav-link smoothScroll" href="#imc">IMC</a></li>
                                <li class="nav-item"><a class="nav-link smoothScroll"
                                                        href="#depoimentos">Depoimentos</a></li>
                                <li class="nav-item"><a class="nav-link smoothScroll" href="#precos">Planos e
                                        Valores</a>
                                <li class="nav-item"><a class="nav-link smoothScroll"
                                                        href="https://app.personaledubehring.com.br/login">Login</a>
                                </li>
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
<script type="text/javascript"
        src="<?= url("/shared/web/rs-plugin/js/jquery.themepunch.revolution.min.js"); ?>"></script>
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

<script src="<?= url("/shared/landing1/js/Popper.js"); ?>"></script>
<script src="<?= url("/shared/landing1/js/bootstrap.min.js"); ?>"></script>
<script src="<?= url("/shared/landing1/js/owl.carousel.min.js"); ?>"></script>
<!--<script src="--><? //= url("/shared/landing1/js/jquery.ajaxchimp.min.js"); ?><!--"></script>-->
<!--<script src="--><? //= url("/shared/landing1/js/jquery.magnific-popup.min.js"); ?><!--"></script>-->
<!--<script src="--><? //= url("/shared/landing1/js/plugins.js"); ?><!--"></script>-->
<script src="<?= url("/shared/landing1/js/bmi.js"); ?>"></script>
<script src="<?= url("/shared/landing1/js/comparison.js"); ?>"></script>
<script src="<?= url("/shared/landing1/js/jquery.waypoints.min.js"); ?>"></script>
<script src="<?= url("/shared/landing1/js/menu.js"); ?>"></script>
<script src="<?= url("/shared/landing1/js/nav-tool.js"); ?>"></script>
<!--<script src="https://maps.googleapis.com/maps/api/js?v=3&amp;key=AIzaSyBOQMDDOsJA0uHTqXTDHUogDJfaTST7hNQ"></script>-->
<script src="<?= url("/shared/landing1/js/scrollax.js"); ?>"></script>
<!--<script src="--><? //= url("/shared/landing1/js/TweenMax.min.js"); ?><!--"></script>-->
<!--<script src="--><? //= url("/shared/landing1/js/parallaxie.js"); ?><!--"></script>-->
<!--<script src="--><? //= url("/shared/landing1/js/vivus.min.js"); ?><!--"></script>-->
<script src="<?= url("/shared/landing1/js/main.js"); ?>"></script>

</body>

<!-- Mirrored from malikhassan.com/html/fitness_center/html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 07 May 2021 00:33:44 GMT -->
</html>