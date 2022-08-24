<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from mdbootstrap.com/previews/ecommerce-demo/examples/pages/basic/product.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Nov 2021 23:04:52 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Material Design Bootstrap</title>

    <link rel="stylesheet" href="<?= url("/shared/styles/boot.css"); ?>"/>
    <!-- <link rel="stylesheet" href="<?= url("/shared/styles/styles.css"); ?>" /> -->
    <link rel="stylesheet" href="<?= theme("/assets/css/style.css", CONF_VIEW_APP); ?>"/>


    <link rel="stylesheet"
          href="https://www.fonts.googleapis.com/css?family=Roboto:100,300,400,500,700&amp;display=swap">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= url("/shared/analise_postural/css/all.css"); ?>">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?= url("/shared/analise_postural/css/bootstrap.min.css"); ?>">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="<?= url("/shared/analise_postural/css/mdb-pro.min.css"); ?>">
    <!-- Material Design Bootstrap Ecommerce -->
    <link rel="stylesheet" href="<?= url("/shared/analise_postural/css/mdb.ecommerce.min.css"); ?>">
    <!-- Your custom styles (optional) -->

    <link rel="stylesheet" href="<?= url("/shared/app/vendors/select2/css/select2.min.css"); ?>"/>
    <link rel="stylesheet" href="<?= url("/shared/app/vendors/select2/css/select2-bootstrap.min.css"); ?>"/>

</head>

<body class="skin-light">

<div class="ajax_load">
    <div class="ajax_load_box">
        <div class="ajax_load_box_circle"></div>
        <p class="ajax_load_box_title">Aguarde, carregando...</p>
    </div>
</div>

<div class="ajax_response" style="z-index: 99999;"><?= flash(); ?></div>

<!--Main Navigation-->
<header>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-light fixed-top scrolling-navbar" style="background-color: #000000;">
        <div class="container-fluid">

            <!-- Brand -->
            <a class="navbar-brand" href="https://www.mdbecommerce.com/">
                <img src="<?= url("/shared/img/logo1.png"); ?>" alt="" width="150">
            </a>

            <!-- Collapse button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
                    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Links -->
            <div class="collapse navbar-collapse" id="basicExampleNav">

                <!-- Right -->
                <ul class="navbar-nav ml-auto">
                    <!--                    <li class="nav-item">-->
                    <!--                        <a href="#!" class="nav-link navbar-link-2 waves-effect">-->
                    <!--                            <span class="badge badge-pill red">1</span>-->
                    <!--                            <i class="fas fa-shopping-cart pl-0"></i>-->
                    <!--                        </a>-->
                    <!--                    </li>-->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle waves-effect" id="navbarDropdownMenuLink3"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"
                           style="background-color: #ffffff">
                            <i class="united kingdom flag m-0"></i><?= $postural_analysis_one->date_posture_analysis ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <?php

                            use Source\Models\PostureAnalysisReportNew;

                            foreach ($postural_analysis as $a) : ?>
                                <a class="dropdown-item"
                                   href="<?= url("app/to_manager/{$user->id}/postural_analysis/{$a->id}/posture_analysis"); ?>"><?= $a->date_posture_analysis ?></a>
                            <?php endforeach; ?>

                        </div>
                    </li>
                    <!--                    <li class="nav-item">-->
                    <!--                        <a href="#!" class="nav-link waves-effect">-->
                    <!--                            Shop-->
                    <!--                        </a>-->
                    <!--                    </li>-->
                    <!--                    <li class="nav-item">-->
                    <!--                        <a href="#!" class="nav-link waves-effect">-->
                    <!--                            Contact-->
                    <!--                        </a>-->
                    <!--                    </li>-->
                    <!--                    <li class="nav-item">-->
                    <!--                        <a href="#!" class="nav-link waves-effect">-->
                    <!--                            Sign in-->
                    <!--                        </a>-->
                    <!--                    </li>-->
                    <li class="nav-item pl-2 mb-2 mb-md-0">
                        <!-- <a href="<?= url("app/to_manager/{$user->id}/postural_analysis_images"); ?>" type="button" class="btn btn-outline-info btn-md btn-rounded btn-navbar waves-effect waves-light">
                Voltar
              </a> -->
                    </li>
                </ul>

            </div>
            <!-- Links -->
        </div>
    </nav>
    <!-- Navbar -->
    <!-- 6.;777777777777 -->
    <div class="jumbotron color-grey-light mt-70">
        <div class="d-flex align-items-center h-100">
            <div class="container text-center py-5">
                <h3 class="mb-0">Análise Postural - <?= $user->name ?>
                    - <?= $postural_analysis_one->date_posture_analysis ?></h3>
            </div>
        </div>
    </div>

</header>
<!--Main Navigation-->

<!--Main layout-->
<main>
    <div class="container">

        <!--Section: Block Content-->
        <section class="mb-5">

            <div class="row">

                <div class="col-md-9">

                    <a href="<?= url("app/to_manager/{$user->id}/postural_analysis_images"); ?>"
                       class="btn btn-outline-info mb-3">Voltar</a>


                    <form action="<?= url("app/to_manager/{$user->id}/postural_analysis/{$postural_analysis_id}/posture_analysis") ?>">

                        <input type="hidden" name="action" value="createAndUpdate"/>
                        <input type="hidden" name="posture_analysis_report_id" value="1"/>

                        <?php foreach ($options as $item): ?>

                            <div class="form-group">
                                <label for="<?= $item->option_select ?>"><strong><?= $item->option_select ?></strong></label>
                                <select class="form-control" id="<?= $item->option_select ?>"
                                        name="<?= $item->option_select ?>[]" multiple>

                                    <?php
                                    $optionsList = (new \Source\Models\PostureAnalysisVideo())->find("option_select = :a", "a={$item->option_select}")->fetch(true);
                                    ?>

                                    <?php foreach ($optionsList as $a): ?>


                                        <?php
                                        $postureAnalysis = (new PostureAnalysisReportNew())->find("types_of_postural_analyzes_id = :a and option_type = :b and postural_analysis_id = :c", "a={$item->option_select}&b={$a->name}&c={$postural_analysis_id}")->fetch();

                                            $result = $a->name == $postureAnalysis->option_type;

                                        ?>

                                            <option <?= $result == true ? "selected" : "" ?>  value="<?= $a->name ?>"><?= $a->name ?></option>

                                    <?php endforeach; ?>
                                </select>

                            </div>
                        <?php endforeach; ?>


                        <button type="submit"
                                class="btn btn-success btn-md btn-rounded btn-navbar waves-effect waves-light">
                            Cadastrar
                        </button>

                    </form>

                </div>

                <div class="col-md-3 mb-4 mb-md-0">

                    <div id="mdb-lightbox-ui"></div>

                    <div class="mdb-lightbox">

                        <div class="row product-gallery mx-1">

                            <div class="col-12">
                                <div class="row">

                                    <?php foreach ($posturalAnalysisImage as $a) : ?>
                                        <div class="col-3">
                                            <div class="view overlay rounded z-depth-1 gallery-item hoverable">
                                                <img src="<?= url("storage/" . $a->image); ?>" class="img-fluid">
                                                <div class="mask rgba-white-slight"></div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>

                                </div>
                            </div>

                            <div class="col-12 mb-0">
                                <figure class="view overlay rounded z-depth-1 main-img" style="width: auto;">
                                    <a href="<?= url("storage/" . $image->image); ?>" data-size="710x823">
                                        <img src="<?= url("storage/" . $image->image); ?>" class="img-fluid z-depth-1">
                                    </a>
                                </figure>

                            </div>


                        </div>

                    </div>

                </div>
            </div>

        </section>

    </div>
</main>


<script src="<?= url("/shared/analise_postural/js/jquery-3.4.1.min.js"); ?>"></script>

<script src="<?= url("/shared/scripts/jquery.form.js"); ?>"></script>
<script src="<?= url("/shared/scripts/jquery-ui.js"); ?>"></script>
<script src="<?= url("/shared/scripts/jquery.mask.js"); ?>"></script>
<script src="<?= url("/shared/scripts/tinymce/tinymce.min.js"); ?>"></script>

<script type="text/javascript" src="<?= url("/shared/analise_postural/js/popper.min.js"); ?>"></script>
<script type="text/javascript" src="<?= url("/shared/analise_postural/js/bootstrap.js"); ?>"></script>
<script type="text/javascript" src="<?= url("/shared/analise_postural/js/mdb.min.js"); ?>"></script>
<script type="text/javascript" src="<?= url("/shared/analise_postural/js/mdb.ecommerce.min.js"); ?>"></script>
<script>
    $(document).ready(function () {
        // MDB Lightbox Init
        $(function () {
            $("#mdb-lightbox-ui").load("https://www.mdbootstrap.com/previews/ecommerce-demo/mdb-addons/mdb-lightbox-ui.html");
        });
    });
</script>

<script src="<?= theme("/assets/js/script.js", CONF_VIEW_APP); ?>"></script>

<script src="<?= url("/shared/app/js/app-taskboard.js"); ?>"></script>
<script src="<?= url("/shared/app/vendors/select2/js/select2.full.min.js"); ?>"></script>
<script src="<?= url("/shared/app/js/select2.script.js"); ?>"></script>

</body>


<!-- Mirrored from mdbootstrap.com/previews/ecommerce-demo/examples/pages/basic/product.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Nov 2021 23:04:57 GMT -->

</html>