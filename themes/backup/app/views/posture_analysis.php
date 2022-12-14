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


    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700&amp;display=swap">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= url("/shared/analise_postural/css/all.css"); ?>">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?= url("/shared/analise_postural/css/bootstrap.min.css"); ?>">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="<?= url("/shared/analise_postural/css/mdb-pro.min.css"); ?>">
    <!-- Material Design Bootstrap Ecommerce -->
    <link rel="stylesheet" href="<?= url("/shared/analise_postural/css/mdb.ecommerce.min.css"); ?>">
    <!-- Your custom styles (optional) -->


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
    <nav class="navbar navbar-expand-md navbar-light fixed-top scrolling-navbar">
        <div class="container-fluid">

            <!-- Brand -->
            <a class="navbar-brand" href="https://mdbecommerce.com/">
                <img src="<?= url("shared/app/images/logo.png") ?>" width="100">
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
                           data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="true">
                            <i class="united kingdom flag m-0"></i><?= $postural_analysis_one->date_posture_analysis ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                          <?php foreach ($postural_analysis as $a): ?>
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
                        <a href="<?= url("app/to_manager/{$user->id}/postural_analysis_images"); ?>" type="button"
                           class="btn btn-outline-info btn-md btn-rounded btn-navbar waves-effect waves-light">
                            Voltar
                        </a>
                    </li>
                </ul>

            </div>
            <!-- Links -->
        </div>
    </nav>
    <!-- Navbar -->
    6.;777777777777
    <div class="jumbotron color-grey-light mt-70">
        <div class="d-flex align-items-center h-100">
            <div class="container text-center py-5">
                <h3 class="mb-0">An??lise Postural - <?= $user->name ?>
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


                    <form action="<?= url("app/to_manager/{$user->id}/postural_analysis/{$a->id}/posture_analysis") ?>">

                        <input type="hidden" name="action" value="createAndUpdate"/>
                        <input type="hidden" name="posture_analysis_report_id"
                               value="<?= empty($postureAnalysisReport) ? null : $postureAnalysisReport->id ?>"/>


                        <div class="form-group">
                            <label for="cabeca"><strong>Cabe??a:</strong></label>
                            <select class="form-control" id="cabeca" name="cabeca">
                                <option <?= empty($postureAnalysisReport) ? "selected" : "" ?> > </option>
                                <option <?php if (!empty($postureAnalysisReport->cabeca) and $postureAnalysisReport->cabeca == "Inclina????o lateral direita"): ?> selected <?php else: ?><?php endif; ?>
                                        value="Inclina????o lateral direita">Inclina????o lateral direita
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->cabeca) and $postureAnalysisReport->cabeca == "Inclina????o lateral esquerda"): ?> selected <?php else: ?><?php endif; ?>
                                        value="Inclina????o lateral esquerda">Inclina????o lateral esquerda
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->cabeca) and $postureAnalysisReport->cabeca == "Protus??o"): ?> selected <?php else: ?><?php endif; ?>
                                        value="Protus??o">Protus??o
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->cabeca) and $postureAnalysisReport->cabeca == "Rota????o lateral direita"): ?> selected <?php else: ?><?php endif; ?>
                                        value="Rota????o lateral direita">Rota????o lateral direita
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->cabeca) and $postureAnalysisReport->cabeca == "Rota????o lateral esquerda"): ?> selected <?php else: ?><?php endif; ?>
                                        value="Rota????o lateral esquerda">Rota????o lateral esquerda
                                </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="coluna"><strong>Coluna:</strong></label>
                            <select class="form-control" id="coluna" name="coluna">
                                <option <?= empty($postureAnalysisReport) ? "selected" : "" ?> > </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->coluna) and $postureAnalysisReport->coluna == "Escoliose esquerda"): ?> selected <?php else: ?><?php endif; ?>
                                        value="Escoliose esquerda">Escoliose esquerda
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->coluna) and $postureAnalysisReport->coluna == "Escoliose direita"): ?> selected <?php else: ?><?php endif; ?>
                                        value="Escoliose direita">Escoliose direita
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->coluna) and $postureAnalysisReport->coluna == "Escoliose em ???S??? direita"): ?> selected <?php else: ?><?php endif; ?>
                                        value="Escoliose em ???S??? direita">Escoliose em ???S??? direita
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->coluna) and $postureAnalysisReport->coluna == "Escoliose em ???S??? esquerda"): ?> selected <?php else: ?><?php endif; ?>
                                        value="Escoliose em ???S??? esquerda">Escoliose em ???S??? esquerda
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->coluna) and $postureAnalysisReport->coluna == "Hiperlordose lombar"): ?> selected <?php else: ?><?php endif; ?>
                                        value="Hiperlordose lombar">Hiperlordose lombar
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->coluna) and $postureAnalysisReport->coluna == "Retifica????o lombar"): ?> selected <?php else: ?><?php endif; ?>
                                        value="Retifica????o lombar">Retifica????o lombar
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->coluna) and $postureAnalysisReport->coluna == "Hiperlordose cervical"): ?> selected <?php else: ?><?php endif; ?>
                                        value="Hiperlordose cervical">Hiperlordose cervical
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->coluna) and $postureAnalysisReport->coluna == "Retifica????o cervical"): ?> selected <?php else: ?><?php endif; ?>
                                        value="Retifica????o cervical">Retifica????o cervical
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->coluna) and $postureAnalysisReport->coluna == "Protus??o cervical"): ?> selected <?php else: ?><?php endif; ?>
                                        value="Protus??o cervical">Protus??o cervical
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->coluna) and $postureAnalysisReport->coluna == "Hipercifose tor??cica"): ?> selected <?php else: ?><?php endif; ?>
                                        value="Hipercifose tor??cica">Hipercifose tor??cica
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->coluna) and $postureAnalysisReport->coluna == "Retifica????o tor??cica"): ?> selected <?php else: ?><?php endif; ?>
                                        value="Retifica????o tor??cica">Retifica????o tor??cica
                                </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="ombros"><strong>Ombros:</strong></label>
                            <select class="form-control" id="ombros" name="ombros">
                                <option <?= empty($postureAnalysisReport) ? "selected" : "" ?> > </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->ombros) and $postureAnalysisReport->ombros == "Slide anterior direito"): ?> selected <?php else: ?><?php endif; ?>
                                        value="Slide anterior direito">Slide anterior direito
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->ombros) and $postureAnalysisReport->ombros == "Slide anterior esquerdo"): ?> selected <?php else: ?><?php endif; ?>
                                        value="Slide anterior esquerdo">Slide anterior esquerdo
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->ombros) and $postureAnalysisReport->ombros == "Protus??o dos ombros"): ?> selected <?php else: ?><?php endif; ?>
                                        value="Protus??o dos ombros">Protus??o dos ombros
                                </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="escapula"><strong>Escapulas:</strong></label>
                            <select class="form-control" id="escapula" name="escapula">
                                <option <?= empty($postureAnalysisReport) ? "selected" : "" ?> > </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->escapulas) and $postureAnalysisReport->escapulas == "Eleva????o escapular direita"): ?> selected <?php else: ?><?php endif; ?>
                                        value="Eleva????o escapular direita">Eleva????o escapular direita
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->escapulas) and $postureAnalysisReport->escapulas == "Eleva????o escapular esquerda"): ?> selected <?php else: ?><?php endif; ?>
                                        value="Eleva????o escapular esquerda">Eleva????o escapular esquerda
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->escapulas) and $postureAnalysisReport->escapulas == "Depress??o escapular esquerda"): ?> selected <?php else: ?><?php endif; ?>
                                        value="Depress??o escapular esquerda">Depress??o escapular esquerda
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->escapulas) and $postureAnalysisReport->escapulas == "Depress??o escapular direita"): ?> selected <?php else: ?><?php endif; ?>
                                        value="Depress??o escapular direita">Depress??o escapular direita
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->escapulas) and $postureAnalysisReport->escapulas == "Abdu????o escapular esquerda"): ?> selected <?php else: ?><?php endif; ?>
                                        value="Abdu????o escapular esquerda">Abdu????o escapular esquerda
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->escapulas) and $postureAnalysisReport->escapulas == "Abdu????o escapular direita"): ?> selected <?php else: ?><?php endif; ?>
                                        value="Abdu????o escapular direita">Abdu????o escapular direita
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->escapulas) and $postureAnalysisReport->escapulas == "Adu????o escapular direita"): ?> selected <?php else: ?><?php endif; ?>
                                        value="Adu????o escapular direita">Adu????o escapular direita
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->escapulas) and $postureAnalysisReport->escapulas == "Adu????o escapular esquerdo"): ?> selected <?php else: ?><?php endif; ?>
                                        value="Adu????o escapular esquerdo">Adu????o escapular esquerdo
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->escapulas) and $postureAnalysisReport->escapulas == "Rota????o externa da escapula direita"): ?> selected <?php else: ?><?php endif; ?>
                                        value="Rota????o externa da escapula direita">Rota????o externa da escapula
                                    direita
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->escapulas) and $postureAnalysisReport->escapulas == "Rota????o externa da escapula esquerda"): ?> selected <?php else: ?><?php endif; ?>
                                        value="Rota????o externa da escapula esquerda">Rota????o externa da escapula
                                    esquerda
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->escapulas) and $postureAnalysisReport->escapulas == "Rota????o interna da escapula direita"): ?> selected <?php else: ?><?php endif; ?>
                                        value="Rota????o interna da escapula direita">Rota????o interna da escapula
                                    direita
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->escapulas) and $postureAnalysisReport->escapulas == "Rota????o interna da escapula esquerda"): ?> selected <?php else: ?><?php endif; ?>
                                        value="Rota????o interna da escapula esquerda">Rota????o interna da escapula
                                    esquerda
                                </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="quadrilepelve"><strong>Quadril e Pelve:</strong></label>
                            <select class="form-control" id="quadrilepelve" name="quadrilepelve">
                                <option <?= empty($postureAnalysisReport) ? "selected" : "" ?> > </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->quadril_pelve) and $postureAnalysisReport->quadril_pelve == "Anterovers??o p??lvica"): ?> selected <?php else: ?> <?php endif; ?>
                                        value="Anterovers??o p??lvica">Anterovers??o p??lvica
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->quadril_pelve) and $postureAnalysisReport->quadril_pelve == "Retrovers??o p??lvica"): ?> selected <?php else: ?> <?php endif; ?>
                                        value="Retrovers??o p??lvica">Retrovers??o p??lvica
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->quadril_pelve) and $postureAnalysisReport->quadril_pelve == "Inclina????o lateral direito"): ?> selected <?php else: ?> <?php endif; ?>
                                        value="Inclina????o lateral direito">Inclina????o lateral direito
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->quadril_pelve) and $postureAnalysisReport->quadril_pelve == "Inclina????o lateral esquerdo"): ?> selected <?php else: ?> <?php endif; ?>
                                        value="Inclina????o lateral esquerdo">Inclina????o lateral esquerdo
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->quadril_pelve) and $postureAnalysisReport->quadril_pelve == "Tor????o p??lvica esquerda"): ?> selected <?php else: ?> <?php endif; ?>
                                        value="Tor????o p??lvica esquerda">Tor????o p??lvica esquerda
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->quadril_pelve) and $postureAnalysisReport->quadril_pelve == "Tor????o p??lvica direita"): ?> selected <?php else: ?> <?php endif; ?>
                                        value="Tor????o p??lvica direita">Tor????o p??lvica direita
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->quadril_pelve) and $postureAnalysisReport->quadril_pelve == "Giro p??lvico direito"): ?> selected <?php else: ?> <?php endif; ?>
                                        value="Giro p??lvico direito">Giro p??lvico direito
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->quadril_pelve) and $postureAnalysisReport->quadril_pelve == "Giro p??lvico esquerdo"): ?> selected <?php else: ?> <?php endif; ?>
                                        value="Giro p??lvico esquerdo">Giro p??lvico esquerdo
                                </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="joelhos"><strong>Joelhos:</strong></label>
                            <select class="form-control" id="joelhos" name="joelhos">
                                <option <?= empty($postureAnalysisReport) ? "selected" : "" ?> > </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->joelhos) and $postureAnalysisReport->joelhos == "Geno valgo direito"): ?> selected <?php else: ?> <?php endif; ?>
                                        value="Geno valgo direito">Geno valgo direito
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->joelhos) and $postureAnalysisReport->joelhos == "Geno valgo esquerdo"): ?> selected <?php else: ?> <?php endif; ?>
                                        value="Geno valgo esquerdo">Geno valgo esquerdo
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->joelhos) and $postureAnalysisReport->joelhos == "Geno varo direito"): ?> selected <?php else: ?> <?php endif; ?>
                                        value="Geno varo direito">Geno varo direito
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->joelhos) and $postureAnalysisReport->joelhos == "Geno varo esquerdo"): ?> selected <?php else: ?> <?php endif; ?>
                                        value="Geno varo esquerdo">Geno varo esquerdo
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->joelhos) and $postureAnalysisReport->joelhos == "Geno flexo direito"): ?> selected <?php else: ?> <?php endif; ?>
                                        value="Geno flexo direito">Geno flexo direito
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->joelhos) and $postureAnalysisReport->joelhos == "Geno flexo esquerdo"): ?> selected <?php else: ?> <?php endif; ?>
                                        value="Geno flexo esquerdo">Geno flexo esquerdo
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->joelhos) and $postureAnalysisReport->joelhos == "Hiperextens??o do joelho direito"): ?> selected <?php else: ?> <?php endif; ?>
                                        value="Hiperextens??o do joelho direito">Hiperextens??o do joelho direito
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->joelhos) and $postureAnalysisReport->joelhos == "Hiperextens??o do joelho esquerdo"): ?> selected <?php else: ?> <?php endif; ?>
                                        value="Hiperextens??o do joelho esquerdo">Hiperextens??o do joelho esquerdo
                                </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="tibias"><strong>T??bias:</strong></label>
                            <select class="form-control" id="tibias" name="tibias">
                                <option <?= empty($postureAnalysisReport) ? "selected" : "" ?> > </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->tibias) and $postureAnalysisReport->tibias == "Rota????o interna direita"): ?> selected <?php else: ?> <?php endif; ?>
                                        value="Rota????o interna direita">Rota????o interna direita
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->tibias) and $postureAnalysisReport->tibias == "Rota????o interna esquerda"): ?> selected <?php else: ?> <?php endif; ?>
                                        value="Rota????o interna esquerda">Rota????o interna esquerda
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->tibias) and $postureAnalysisReport->tibias == "Rota????o externa direita"): ?> selected <?php else: ?> <?php endif; ?>
                                        value="Rota????o externa direita">Rota????o externa direita
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->tibias) and $postureAnalysisReport->tibias == "Rota????o externa esquerda"): ?> selected <?php else: ?> <?php endif; ?>
                                        value="Rota????o externa esquerda">Rota????o externa esquerda
                                </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="pes"><strong>P??s</strong></label>
                            <select class="form-control" id="pes" name="pes">
                                <option <?= empty($postureAnalysisReport) ? "selected" : "" ?> > </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->pes) and $postureAnalysisReport->pes == "P?? direito pronado"): ?> selected <?php else: ?> <?php endif; ?>
                                        value="P?? direito pronado">P?? direito pronado
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->pes) and $postureAnalysisReport->pes == "P?? esquerdo pronado"): ?> selected <?php else: ?> <?php endif; ?>
                                        value="P?? esquerdo pronado">P?? esquerdo pronado
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->pes) and $postureAnalysisReport->pes == "P?? direito supinado"): ?> selected <?php else: ?> <?php endif; ?>
                                        value="P?? direito supinado">P?? direito supinado
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->pes) and $postureAnalysisReport->pes == "P?? esquerdo supinado"): ?> selected <?php else: ?> <?php endif; ?>
                                        value="P?? esquerdo supinado">P?? esquerdo supinado
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->pes) and $postureAnalysisReport->pes == "P?? direito cavo"): ?> selected <?php else: ?> <?php endif; ?>
                                        value="P?? direito cavo">P?? direito cavo
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->pes) and $postureAnalysisReport->pes == "P?? direito chato"): ?> selected <?php else: ?> <?php endif; ?>
                                        value="P?? direito chato">P?? direito chato
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->pes) and $postureAnalysisReport->pes == "P?? esquerdo cavo"): ?> selected <?php else: ?> <?php endif; ?>
                                        value="P?? esquerdo cavo">P?? esquerdo cavo
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->pes) and $postureAnalysisReport->pes == "P?? esquerdo chato"): ?> selected <?php else: ?> <?php endif; ?>
                                        value="P?? esquerdo chato">P?? esquerdo chato
                                </option>
                            </select>
                        </div>

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

                                  <?php foreach ($posturalAnalysisImage as $a): ?>
                                      <div class="col-3">
                                          <div class="view overlay rounded z-depth-1 gallery-item hoverable">
                                              <img src="<?= url("storage/" . $a->image); ?>"
                                                   class="img-fluid">
                                              <div class="mask rgba-white-slight"></div>
                                          </div>
                                      </div>
                                  <?php endforeach; ?>

                                </div>
                            </div>

                            <div class="col-12 mb-0">
                                <figure class="view overlay rounded z-depth-1 main-img" style="width: auto;">
                                    <a href="<?= url("storage/" . $image->image); ?>"
                                       data-size="710x823">
                                        <img src="<?= url("storage/" . $image->image); ?>"
                                             class="img-fluid z-depth-1">
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
            $("#mdb-lightbox-ui").load("https://mdbootstrap.com/previews/ecommerce-demo/mdb-addons/mdb-lightbox-ui.html");
        });
    });
</script>

<script src="<?= theme("/assets/js/script.js", CONF_VIEW_APP); ?>"></script>
</body>


<!-- Mirrored from mdbootstrap.com/previews/ecommerce-demo/examples/pages/basic/product.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Nov 2021 23:04:57 GMT -->
</html>