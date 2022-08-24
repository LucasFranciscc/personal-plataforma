<!DOCTYPE html>
<html lang="en">
<!-- START: Head-->

<!-- Mirrored from html.designstream.co.in/pick/html/ui-select2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 Feb 2021 19:40:53 GMT -->

<head>
    <meta charset="UTF-8">
    <title>Pick Admin</title>
    <link rel="shortcut icon" href="dist/images/favicon.ico" />
    <meta name="viewport" content="width=device-width,initial-scale=1">


    <link rel="stylesheet" href="<?= url("/shared/app/vendors/bootstrap/css/bootstrap.min.css"); ?>">
    <link rel="stylesheet" href="<?= url("/shared/app/vendors/jquery-ui/jquery-ui.min.css"); ?>">
    <link rel="stylesheet" href="<?= url("/shared/app/vendors/jquery-ui/jquery-ui.theme.min.css"); ?>">
    <link rel="stylesheet" href="<?= url("/shared/app/vendors/simple-line-icons/css/simple-line-icons.css"); ?>">
    <link rel="stylesheet" href="<?= url("/shared/app/vendors/flags-icon/css/flag-icon.min.css"); ?>">

    <!-- END Template CSS-->

    <!-- START: Page CSS-->
<!--    <link rel="stylesheet" href="--><?//= url("/shared/app/vendors/select2/css/select2.min.css"); ?><!--" />-->
<!--    <link rel="stylesheet" href="--><?//= url("/shared/app/vendors/select2/css/select2-bootstrap.min.css"); ?><!--" />-->
    <!-- END: Page CSS-->

    <!-- START: Custom CSS-->
    <link rel="stylesheet" href="<?= url("/shared/app/css/main.css"); ?>">

</head>
<!-- END Head-->

<!-- START: Body-->

<body id="main-container" class="default">


<div class="ajax_load">
    <div class="ajax_load_box">
        <div class="ajax_load_box_circle"></div>
        <p class="ajax_load_box_title">Aguarde, carregando...</p>
    </div>
</div>

<div class="ajax_response" style="z-index: 99999;"><?= flash(); ?></div>

<div id="header-fix" class="header fixed-top">
    <div class="site-width">
        <nav class="navbar navbar-expand-lg  p-0" style="background-color: #000000">
            <div class="navbar-header  h-100 h4 mb-0 align-self-center logo-bar text-left" style="background-color: #000000">
                <a href="<?= url("/app/"); ?>" class="horizontal-logo text-left">

                    <img src="<?= url("/shared/img/logo1.png"); ?>" alt="" width="100" style="margin-top: -10px;">
                </a>
            </div>
            <div class="navbar-header h4 mb-0 text-center h-100 collapse-menu-bar">
                <a href="#" class="sidebarCollapse" id="collapse"><i class="icon-menu" style="color: #FFFFFF"></i></a>
            </div>

            <div class="navbar-right ml-auto h-100">
                <ul class="ml-auto p-0 m-0 list-unstyled d-flex top-icon h-100">

                    <li class="dropdown user-profile align-self-center d-inline-block">
                        <a href="#" class="nav-link py-0" data-toggle="dropdown" aria-expanded="false">
                            <div class="media">
                                <img src="<?= image(\Source\Models\Auth::user()->photo, 30, 30) ?>" alt="" class="d-flex img-fluid rounded-circle" width="29">
                            </div>
                        </a>

                        <div class="dropdown-menu border dropdown-menu-right p-0">

                            <a href="<?= url("/app/user_edit"); ?>" class="dropdown-item px-2 align-self-center d-flex">
                                <span class="icon-pencil mr-2 h6 mb-0"></span>
                                Editar Perfil
                            </a>

                            <!--                            <a href="#" class="dropdown-item px-2 align-self-center d-flex">-->
                            <!--                                <span class="icon-user mr-2 h6 mb-0"></span>-->
                            <!--                                Ver perfil-->
                            <!--                            </a>-->

                            <div class="dropdown-divider"></div>

                            <a href="<?= url("/app/logout"); ?>" class="dropdown-item px-2 text-danger align-self-center d-flex">
                                <span class="icon-logout mr-2 h6  mb-0"></span>
                                Sair
                            </a>

                        </div>

                    </li>

                </ul>
            </div>
        </nav>
    </div>
</div>

<div class="sidebar">
    <div class="site-width">

        <!-- START: Menu-->
        <ul id="side-menu" class="sidebar-menu">
            <li class="dropdown"><a href="#"><i class="icon-home mr-1"></i> Administrador</a>
                <ul>
                    <li><a href="<?= url("/app/students"); ?>"><i class="fas fa-users"></i> Alunos</a></li>
                    <li><a href="<?= url("/app/muscle_groups"); ?>"><i class="fas fa-tag"></i> Grupos musculares</a>
                    </li>
                    <li><a href="<?= url("/app/intensification_methods"); ?>">
                            <i class="fas fa-signal"></i>
                            Métodos de Intensificaçao
                        </a>
                    </li>
                    <li><a href="<?= url("/app/exercises"); ?>"><i class="fas fa-walking"></i> Execícios</a></li>
                    <li><a href="<?= url("/app/warnings"); ?>"><i class="fas fa-info"></i> Avisos</a></li>
                    <li><a href="<?= url("/app/partnerships"); ?>"><i class="fas fa-handshake"></i> Parcerias</a></li>
                    <li><a href="<?= url("/app/events"); ?>"><i class="fas fa-calendar-check"></i> Eventos</a></li>
                    <li><a href="<?= url("/app/posture_analysis_videos"); ?>"><i class="fas fa-video"></i> Vídeos Análises Posturais</a></li>
                    <li><a href="<?= url("/app/requests"); ?>"><i class="fas fa-check"></i> Solicitações</a></li>

                </ul>
            </li>

            <li class="dropdown"><a href="#"><i class="icon-home mr-1"></i> Marketing</a>
                <ul>
                    <li><a href="<?= url("/app/blog_categories"); ?>"><i class="fas fa-users"></i> Categories</a></li>
                    <li><a href="<?= url("/app/blogs"); ?>"><i class="fas fa-users"></i> Blogs</a></li>
                </ul>
            </li>

            <!-- <li class="dropdown"><a href="#"><i class="icon-organization mr-1"></i> Layout</a>
            <ul>

                <li class="dropdown"><a href="#"><i class="icon-options"></i>Horizontal</a>
                    <ul class="sub-menu">
                        <li><a href="layout-horizontal.html"><i class="icon-energy"></i> Light</a></li>
                        <li><a href="layout-horizontal-semidark.html"><i class="icon-disc"></i> Semi Dark</a>
                        </li>
                        <li><a href="layout-horizontal-dark.html"><i class="icon-frame"></i> Dark</a></li>
                    </ul>
                </li>

            </ul>
        </li> -->

        </ul>
        <!-- END: Menu-->
        <ol class="breadcrumb bg-transparent align-self-center m-0 p-0 ml-auto">
            <li class="breadcrumb-item"><a href="#">Application</a></li>
            <li class="breadcrumb-item active">Blank Page</li>
        </ol>
    </div>
</div>

<?php

use Source\Models\Auth;
use Source\Models\PhysicalForm;

$user = Auth::user();

$form = (new PhysicalForm)->find("user_id = :user_id and status = 'not sent'", "user_id={$user->id}")->fetch();

?>

<main>
    <div class="container-fluid site-width">

        <?php if (!empty($form)) : ?>

            <?php if ($form->status = 'not sent' and $form->next_fill >= date('Y-m-d')) : ?>

                <div class="row">
                    <div class="col-12 mt-3">
                        <div class="alert alert-danger" role="alert">
                            Para continuar preencha o
                            <a href="#" class="alert-link" data-toggle="modal" data-target="#formulario_fisico">
                                formulário físico
                            </a>
                        </div>
                    </div>
                </div>

            <?php elseif ($form->status = 'not sent') : ?>

                <div class="row">
                    <div class="col-12 mt-3">
                        <div class="alert alert-danger" role="alert">
                            Para continuar preencha o
                            <a href="#" class="alert-link" data-toggle="modal" data-target="#formulario_fisico">
                                formulário físico
                            </a>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

        <?php endif; ?>


        <?= $v->section("content"); ?>

    </div>
</main>

<div class="modal fade" id="formulario_fisico" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle1">Formulário físico</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Para você iniciar o formulário, você deve "Descrição do passo a passo para preencher o formulário".

                <br />

                <a href="<?= url("/app/physical-form"); ?>" class="btn btn-primary mb-2" style="margin-top: 10px;">
                    <i class="fas fa-clipboard-list"></i>
                    <span>Começar formulário</span>
                </a>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>


<!-- START: Footer-->
<footer class="site-footer">
    2020 © PICK
</footer>
<!-- END: Footer-->


<!-- START: Back to top-->
<a href="#" class="scrollup text-center">
    <i class="icon-arrow-up"></i>
</a>

<script src="<?= url("/shared/app/vendors/jquery/jquery-3.3.1.min.js"); ?>"></script>
<script src="<?= url("/shared/app/vendors/jquery-ui/jquery-ui.min.js"); ?>"></script>

<script src="<?= url("/shared/app/vendors/moment/moment.js"); ?>"></script>
<script src="<?= url("/shared/app/vendors/bootstrap/js/bootstrap.bundle.min.js"); ?>"></script>
<script src="<?= url("/shared/app/vendors/slimscroll/jquery.slimscroll.min.js"); ?>"></script>

<!-- END: Template JS-->

<!-- START: APP JS-->
<script src="<?= url("/shared/app/js/app.js"); ?>"></script>
<!-- END: APP JS-->

<!-- START: Page Vendor JS-->
<script src="<?= url("/shared/app/vendors/select2/js/select2.full.min.js"); ?>"></script>
<!-- END: Page Vendor JS-->

<!-- START: Page Script JS-->
<script src="<?= url("/shared/app/js/select2.script.js"); ?>"></script>

</body>
<!-- END: Body-->

<!-- Mirrored from html.designstream.co.in/pick/html/ui-select2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 Feb 2021 19:40:57 GMT -->

</html>