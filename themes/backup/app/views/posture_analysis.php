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


                    <form action="<?= url("app/to_manager/{$user->id}/postural_analysis/{$a->id}/posture_analysis") ?>">

                        <input type="hidden" name="action" value="createAndUpdate"/>
                        <input type="hidden" name="posture_analysis_report_id"
                               value="<?= empty($postureAnalysisReport) ? null : $postureAnalysisReport->id ?>"/>


                        <div class="form-group">
                            <label for="cabeca"><strong>Cabeça:</strong></label>
                            <select class="form-control" id="cabeca" name="cabeca">
                                <option <?= empty($postureAnalysisReport) ? "selected" : "" ?> > </option>
                                <option <?php if (!empty($postureAnalysisReport->cabeca) and $postureAnalysisReport->cabeca == "Inclinação lateral direita"): ?> selected <?php else: ?><?php endif; ?>
                                        value="Inclinação lateral direita">Inclinação lateral direita
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->cabeca) and $postureAnalysisReport->cabeca == "Inclinação lateral esquerda"): ?> selected <?php else: ?><?php endif; ?>
                                        value="Inclinação lateral esquerda">Inclinação lateral esquerda
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->cabeca) and $postureAnalysisReport->cabeca == "Protusão"): ?> selected <?php else: ?><?php endif; ?>
                                        value="Protusão">Protusão
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->cabeca) and $postureAnalysisReport->cabeca == "Rotação lateral direita"): ?> selected <?php else: ?><?php endif; ?>
                                        value="Rotação lateral direita">Rotação lateral direita
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->cabeca) and $postureAnalysisReport->cabeca == "Rotação lateral esquerda"): ?> selected <?php else: ?><?php endif; ?>
                                        value="Rotação lateral esquerda">Rotação lateral esquerda
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
                                  <?php if (!empty($postureAnalysisReport->coluna) and $postureAnalysisReport->coluna == "Escoliose em “S“ direita"): ?> selected <?php else: ?><?php endif; ?>
                                        value="Escoliose em “S“ direita">Escoliose em “S“ direita
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->coluna) and $postureAnalysisReport->coluna == "Escoliose em “S“ esquerda"): ?> selected <?php else: ?><?php endif; ?>
                                        value="Escoliose em “S“ esquerda">Escoliose em “S“ esquerda
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->coluna) and $postureAnalysisReport->coluna == "Hiperlordose lombar"): ?> selected <?php else: ?><?php endif; ?>
                                        value="Hiperlordose lombar">Hiperlordose lombar
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->coluna) and $postureAnalysisReport->coluna == "Retificação lombar"): ?> selected <?php else: ?><?php endif; ?>
                                        value="Retificação lombar">Retificação lombar
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->coluna) and $postureAnalysisReport->coluna == "Hiperlordose cervical"): ?> selected <?php else: ?><?php endif; ?>
                                        value="Hiperlordose cervical">Hiperlordose cervical
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->coluna) and $postureAnalysisReport->coluna == "Retificação cervical"): ?> selected <?php else: ?><?php endif; ?>
                                        value="Retificação cervical">Retificação cervical
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->coluna) and $postureAnalysisReport->coluna == "Protusão cervical"): ?> selected <?php else: ?><?php endif; ?>
                                        value="Protusão cervical">Protusão cervical
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->coluna) and $postureAnalysisReport->coluna == "Hipercifose torácica"): ?> selected <?php else: ?><?php endif; ?>
                                        value="Hipercifose torácica">Hipercifose torácica
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->coluna) and $postureAnalysisReport->coluna == "Retificação torácica"): ?> selected <?php else: ?><?php endif; ?>
                                        value="Retificação torácica">Retificação torácica
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
                                  <?php if (!empty($postureAnalysisReport->ombros) and $postureAnalysisReport->ombros == "Protusão dos ombros"): ?> selected <?php else: ?><?php endif; ?>
                                        value="Protusão dos ombros">Protusão dos ombros
                                </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="escapula"><strong>Escapulas:</strong></label>
                            <select class="form-control" id="escapula" name="escapula">
                                <option <?= empty($postureAnalysisReport) ? "selected" : "" ?> > </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->escapulas) and $postureAnalysisReport->escapulas == "Elevação escapular direita"): ?> selected <?php else: ?><?php endif; ?>
                                        value="Elevação escapular direita">Elevação escapular direita
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->escapulas) and $postureAnalysisReport->escapulas == "Elevação escapular esquerda"): ?> selected <?php else: ?><?php endif; ?>
                                        value="Elevação escapular esquerda">Elevação escapular esquerda
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->escapulas) and $postureAnalysisReport->escapulas == "Depressão escapular esquerda"): ?> selected <?php else: ?><?php endif; ?>
                                        value="Depressão escapular esquerda">Depressão escapular esquerda
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->escapulas) and $postureAnalysisReport->escapulas == "Depressão escapular direita"): ?> selected <?php else: ?><?php endif; ?>
                                        value="Depressão escapular direita">Depressão escapular direita
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->escapulas) and $postureAnalysisReport->escapulas == "Abdução escapular esquerda"): ?> selected <?php else: ?><?php endif; ?>
                                        value="Abdução escapular esquerda">Abdução escapular esquerda
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->escapulas) and $postureAnalysisReport->escapulas == "Abdução escapular direita"): ?> selected <?php else: ?><?php endif; ?>
                                        value="Abdução escapular direita">Abdução escapular direita
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->escapulas) and $postureAnalysisReport->escapulas == "Adução escapular direita"): ?> selected <?php else: ?><?php endif; ?>
                                        value="Adução escapular direita">Adução escapular direita
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->escapulas) and $postureAnalysisReport->escapulas == "Adução escapular esquerdo"): ?> selected <?php else: ?><?php endif; ?>
                                        value="Adução escapular esquerdo">Adução escapular esquerdo
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->escapulas) and $postureAnalysisReport->escapulas == "Rotação externa da escapula direita"): ?> selected <?php else: ?><?php endif; ?>
                                        value="Rotação externa da escapula direita">Rotação externa da escapula
                                    direita
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->escapulas) and $postureAnalysisReport->escapulas == "Rotação externa da escapula esquerda"): ?> selected <?php else: ?><?php endif; ?>
                                        value="Rotação externa da escapula esquerda">Rotação externa da escapula
                                    esquerda
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->escapulas) and $postureAnalysisReport->escapulas == "Rotação interna da escapula direita"): ?> selected <?php else: ?><?php endif; ?>
                                        value="Rotação interna da escapula direita">Rotação interna da escapula
                                    direita
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->escapulas) and $postureAnalysisReport->escapulas == "Rotação interna da escapula esquerda"): ?> selected <?php else: ?><?php endif; ?>
                                        value="Rotação interna da escapula esquerda">Rotação interna da escapula
                                    esquerda
                                </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="quadrilepelve"><strong>Quadril e Pelve:</strong></label>
                            <select class="form-control" id="quadrilepelve" name="quadrilepelve">
                                <option <?= empty($postureAnalysisReport) ? "selected" : "" ?> > </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->quadril_pelve) and $postureAnalysisReport->quadril_pelve == "Anteroversão pélvica"): ?> selected <?php else: ?> <?php endif; ?>
                                        value="Anteroversão pélvica">Anteroversão pélvica
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->quadril_pelve) and $postureAnalysisReport->quadril_pelve == "Retroversão pélvica"): ?> selected <?php else: ?> <?php endif; ?>
                                        value="Retroversão pélvica">Retroversão pélvica
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->quadril_pelve) and $postureAnalysisReport->quadril_pelve == "Inclinação lateral direito"): ?> selected <?php else: ?> <?php endif; ?>
                                        value="Inclinação lateral direito">Inclinação lateral direito
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->quadril_pelve) and $postureAnalysisReport->quadril_pelve == "Inclinação lateral esquerdo"): ?> selected <?php else: ?> <?php endif; ?>
                                        value="Inclinação lateral esquerdo">Inclinação lateral esquerdo
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->quadril_pelve) and $postureAnalysisReport->quadril_pelve == "Torção pélvica esquerda"): ?> selected <?php else: ?> <?php endif; ?>
                                        value="Torção pélvica esquerda">Torção pélvica esquerda
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->quadril_pelve) and $postureAnalysisReport->quadril_pelve == "Torção pélvica direita"): ?> selected <?php else: ?> <?php endif; ?>
                                        value="Torção pélvica direita">Torção pélvica direita
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->quadril_pelve) and $postureAnalysisReport->quadril_pelve == "Giro pélvico direito"): ?> selected <?php else: ?> <?php endif; ?>
                                        value="Giro pélvico direito">Giro pélvico direito
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->quadril_pelve) and $postureAnalysisReport->quadril_pelve == "Giro pélvico esquerdo"): ?> selected <?php else: ?> <?php endif; ?>
                                        value="Giro pélvico esquerdo">Giro pélvico esquerdo
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
                                  <?php if (!empty($postureAnalysisReport->joelhos) and $postureAnalysisReport->joelhos == "Hiperextensão do joelho direito"): ?> selected <?php else: ?> <?php endif; ?>
                                        value="Hiperextensão do joelho direito">Hiperextensão do joelho direito
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->joelhos) and $postureAnalysisReport->joelhos == "Hiperextensão do joelho esquerdo"): ?> selected <?php else: ?> <?php endif; ?>
                                        value="Hiperextensão do joelho esquerdo">Hiperextensão do joelho esquerdo
                                </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="tibias"><strong>Tíbias:</strong></label>
                            <select class="form-control" id="tibias" name="tibias">
                                <option <?= empty($postureAnalysisReport) ? "selected" : "" ?> > </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->tibias) and $postureAnalysisReport->tibias == "Rotação interna direita"): ?> selected <?php else: ?> <?php endif; ?>
                                        value="Rotação interna direita">Rotação interna direita
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->tibias) and $postureAnalysisReport->tibias == "Rotação interna esquerda"): ?> selected <?php else: ?> <?php endif; ?>
                                        value="Rotação interna esquerda">Rotação interna esquerda
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->tibias) and $postureAnalysisReport->tibias == "Rotação externa direita"): ?> selected <?php else: ?> <?php endif; ?>
                                        value="Rotação externa direita">Rotação externa direita
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->tibias) and $postureAnalysisReport->tibias == "Rotação externa esquerda"): ?> selected <?php else: ?> <?php endif; ?>
                                        value="Rotação externa esquerda">Rotação externa esquerda
                                </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="pes"><strong>Pés</strong></label>
                            <select class="form-control" id="pes" name="pes">
                                <option <?= empty($postureAnalysisReport) ? "selected" : "" ?> > </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->pes) and $postureAnalysisReport->pes == "Pé direito pronado"): ?> selected <?php else: ?> <?php endif; ?>
                                        value="Pé direito pronado">Pé direito pronado
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->pes) and $postureAnalysisReport->pes == "Pé esquerdo pronado"): ?> selected <?php else: ?> <?php endif; ?>
                                        value="Pé esquerdo pronado">Pé esquerdo pronado
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->pes) and $postureAnalysisReport->pes == "Pé direito supinado"): ?> selected <?php else: ?> <?php endif; ?>
                                        value="Pé direito supinado">Pé direito supinado
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->pes) and $postureAnalysisReport->pes == "Pé esquerdo supinado"): ?> selected <?php else: ?> <?php endif; ?>
                                        value="Pé esquerdo supinado">Pé esquerdo supinado
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->pes) and $postureAnalysisReport->pes == "Pé direito cavo"): ?> selected <?php else: ?> <?php endif; ?>
                                        value="Pé direito cavo">Pé direito cavo
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->pes) and $postureAnalysisReport->pes == "Pé direito chato"): ?> selected <?php else: ?> <?php endif; ?>
                                        value="Pé direito chato">Pé direito chato
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->pes) and $postureAnalysisReport->pes == "Pé esquerdo cavo"): ?> selected <?php else: ?> <?php endif; ?>
                                        value="Pé esquerdo cavo">Pé esquerdo cavo
                                </option>
                                <option
                                  <?php if (!empty($postureAnalysisReport->pes) and $postureAnalysisReport->pes == "Pé esquerdo chato"): ?> selected <?php else: ?> <?php endif; ?>
                                        value="Pé esquerdo chato">Pé esquerdo chato
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