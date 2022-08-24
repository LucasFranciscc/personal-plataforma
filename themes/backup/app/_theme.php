<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

  <?= $head ?>

    <meta name="viewport" content="width=device-width,initial-scale=1">

    <!--    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">-->

    <link rel="stylesheet" href="<?= url("/shared/styles/boot.css"); ?>"/>
    <!-- <link rel="stylesheet" href="<?= url("/shared/styles/styles.css"); ?>" /> -->
    <link rel="stylesheet" href="<?= theme("/assets/css/style.css", CONF_VIEW_APP); ?>"/>

    <!-- START: Template CSS-->
    <link rel="stylesheet" href="<?= url("/shared/app/vendors/bootstrap/css/bootstrap.min.css"); ?>">
    <link rel="stylesheet" href="<?= url("/shared/app/vendors/jquery-ui/jquery-ui.min.css"); ?>">
    <link rel="stylesheet" href="<?= url("/shared/app/vendors/jquery-ui/jquery-ui.theme.min.css"); ?>">
    <link rel="stylesheet" href="<?= url("/shared/app/vendors/simple-line-icons/css/simple-line-icons.css"); ?>">
    <link rel="stylesheet" href="<?= url("/shared/app/vendors/flags-icon/css/flag-icon.min.css"); ?>">

    <link rel="stylesheet" href="<?= url("/shared/app/vendors/ionicons/css/ionicons.min.css"); ?>">
    <link rel="stylesheet" href="<?= url("/shared/app/vendors/social-button/bootstrap-social.css"); ?>"/>
    <link rel="stylesheet" href="<?= url("/shared/app/vendors/fontawesome/css/all.min.css"); ?>">

    <link rel="stylesheet" href="<?= url("/shared/app/vendors/summernote/summernote-bs4.css"); ?>"/>

    <link rel="stylesheet" href="<?= url("/shared/app/vendors/morris/morris.css"); ?>">

    <link rel="stylesheet" href="<?= url("/shared/app/css/main.css"); ?>">

    <link rel="stylesheet" href="<?= url("/shared/app/vendors/select2/css/select2.min.css"); ?>"/>
    <link rel="stylesheet" href="<?= url("/shared/app/vendors/select2/css/select2-bootstrap.min.css"); ?>"/>

    <link rel="stylesheet" href="<?= url("/shared/app/vendors/icheck/skins/all.css"); ?>">
    <link rel="stylesheet" href="<?= url("/shared/app/vendors/bootstrap4-toggle/css/bootstrap4-toggle.min.css"); ?>">

    <!-- <link rel="stylesheet" href="<?= theme("/assets/style.css", CONF_VIEW_APP); ?>" /> -->

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

<!-- START: Pre Loader-->
<!-- <div class="se-pre-con">
    <div class="loader"></div>
</div> -->
<!-- END: Pre Loader-->

<!-- START: Header-->
<div id="header-fix" class="header fixed-top">
    <div class="site-width">
        <nav class="navbar navbar-expand-lg  p-0">
            <div class="navbar-header  h-100 h4 mb-0 align-self-center logo-bar text-left">
                <a href="<?= url("/app/"); ?>" class="horizontal-logo text-left">
                    <svg height="20pt" preserveAspectRatio="xMidYMid meet" viewBox="0 0 512 512" width="20pt"
                         xmlns="http://www.w3.org/2000/svg">
                        <g transform="matrix(.1 0 0 -.1 0 512)" fill="#1e3d73">
                            <path d="m1450 4481-1105-638v-1283-1283l1106-638c1033-597 1139-654 1139-619 0 4-385 674-855 1489-470 814-855 1484-855 1488 0 8 1303 763 1418 822 175 89 413 166 585 190 114 16 299 13 408-5 100-17 231-60 314-102 310-156 569-509 651-887 23-105 23-331 0-432-53-240-177-460-366-651-174-175-277-247-738-512-177-102-322-189-322-193s104-188 231-407l231-400 46 28c26 15 360 207 742 428l695 402v1282 1282l-1105 639c-608 351-1107 638-1110 638s-502-287-1110-638z"/>
                            <path d="m2833 3300c-82-12-190-48-282-95-73-36-637-358-648-369-3-3 580-1022 592-1034 5-5 596 338 673 391 100 69 220 197 260 280 82 167 76 324-19 507-95 184-233 291-411 320-70 11-89 11-165 0z"/>
                        </g>
                    </svg>
                    <span class="h4 font-weight-bold align-self-center mb-0 ml-auto">PICK</span>
                </a>
            </div>
            <div class="navbar-header h4 mb-0 text-center h-100 collapse-menu-bar">
                <a href="#" class="sidebarCollapse" id="collapse"><i class="icon-menu"></i></a>
            </div>

            <!-- <form class="float-left d-none d-lg-block search-form">
                <div class="form-group mb-0 position-relative">
                    <input type="text" class="form-control border-0 rounded bg-search pl-5" placeholder="Search anything...">
                    <div class="btn-search position-absolute top-0">
                        <a href="#"><i class="h6 icon-magnifier"></i></a>
                    </div>
                    <a href="#" class="position-absolute close-button mobilesearch d-lg-none" data-toggle="dropdown" aria-expanded="false"><i class="icon-close h5"></i>
                    </a>

                </div>
            </form> -->
            <div class="navbar-right ml-auto h-100">
                <ul class="ml-auto p-0 m-0 list-unstyled d-flex top-icon h-100">
                    <li class="d-inline-block align-self-center  d-block d-lg-none">
                        <a href="#" class="nav-link mobilesearch" data-toggle="dropdown" aria-expanded="false"><i
                                    class="icon-magnifier h4"></i>
                        </a>
                    </li>

                    <li class="dropdown align-self-center">
                        <a href="#" class="nav-link" data-toggle="dropdown" aria-expanded="false"><i
                                    class="icon-reload h4"></i>
                            <!-- <span class="badge badge-default"> <span class="ring">
                                </span><span class="ring-point">
                                </span> </span> -->
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right border  py-0">
                            <li>
                                <a class="dropdown-item px-2 py-2 border border-top-0 border-left-0 border-right-0"
                                   href="#">
                                    <div class="media">
                                        <img src="<?= url("/shared/app/images/author.jpg"); ?>" alt=""
                                             class="d-flex mr-3 img-fluid rounded-circle">
                                        <div class="media-body">
                                            <p class="mb-0">john</p>
                                            <span class="text-success">New user registered.</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item px-2 py-2 border border-top-0 border-left-0 border-right-0"
                                   href="#">
                                    <div class="media">
                                        <img src="<?= url("/shared/app/images/author2.jpg"); ?>" alt=""
                                             class="d-flex mr-3 img-fluid rounded-circle">
                                        <div class="media-body">
                                            <p class="mb-0">Peter</p>
                                            <span class="text-success">Server #12 overloaded.</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item px-2 py-2 border border-top-0 border-left-0 border-right-0"
                                   href="#">
                                    <div class="media">
                                        <img src="<?= url("/shared/app/images/author3.jpg"); ?>" alt=""
                                             class="d-flex mr-3 img-fluid rounded-circle">
                                        <div class="media-body">
                                            <p class="mb-0">Bill</p>
                                            <span class="text-danger">Application error.</span>
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <li><a class="dropdown-item text-center py-2" href="#"> See All Tasks <i
                                            class="icon-arrow-right pl-2 small"></i></a></li>
                        </ul>

                    </li>
                    <li class="dropdown align-self-center d-inline-block">
                        <a href="#" class="nav-link" data-toggle="dropdown" aria-expanded="false"><i
                                    class="icon-bell h4"></i>
                            <!-- <span class="badge badge-default"> <span class="ring">
                                </span><span class="ring-point">
                                </span> </span> -->
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right border   py-0">
                            <li>
                                <a class="dropdown-item px-2 py-2 border border-top-0 border-left-0 border-right-0"
                                   href="#">
                                    <div class="media">
                                        <img src="<?= url("/shared/app/images/author.jpg"); ?>" alt=""
                                             class="d-flex mr-3 img-fluid rounded-circle w-50">
                                        <div class="media-body">
                                            <p class="mb-0 text-success">john send a message</p>
                                            12 min ago
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item px-2 py-2 border border-top-0 border-left-0 border-right-0"
                                   href="#">
                                    <div class="media">
                                        <img src="<?= url("/shared/app/images/author2.jpg"); ?>" alt=""
                                             class="d-flex mr-3 img-fluid rounded-circle">
                                        <div class="media-body">
                                            <p class="mb-0 text-danger">Peter send a message</p>
                                            15 min ago
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item px-2 py-2 border border-top-0 border-left-0 border-right-0"
                                   href="#">
                                    <div class="media">
                                        <img src="<?= url("/shared/app/images/author3.jpg"); ?>" alt=""
                                             class="d-flex mr-3 img-fluid rounded-circle">
                                        <div class="media-body">
                                            <p class="mb-0 text-warning">Bill send a message</p>
                                            5 min ago
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <li><a class="dropdown-item text-center py-2" href="#"> Read All Message <i
                                            class="icon-arrow-right pl-2 small"></i></a></li>
                        </ul>
                    </li>
                    <li class="dropdown user-profile align-self-center d-inline-block">
                        <a href="#" class="nav-link py-0" data-toggle="dropdown" aria-expanded="false">
                            <div class="media">
                                <img src="<?= image(\Source\Models\Auth::user()->photo, 30, 30) ?>" alt=""
                                     class="d-flex img-fluid rounded-circle" width="29">
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

                            <a href="<?= url("/app/logout"); ?>"
                               class="dropdown-item px-2 text-danger align-self-center d-flex">
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
<!-- END: Header-->

<!-- START: Main Menu-->
<div class="sidebar">
    <div class="site-width">

        <!-- START: Menu-->
        <ul id="side-menu" class="sidebar-menu">
            <li class="dropdown"><a href="#"><i class="icon-home mr-1"></i> Administrador</a>
                <ul>
                    <li><a href="<?= url("/app/students"); ?>"><i class="fas fa-users"></i> Alunos</a></li>
                    <li><a href="<?= url("/app/muscle_groups"); ?>"><i class="fas fa-tag"></i> Grupos musculares</a>
                    </li>
                    <li><a href="<?= url("/app/exercises"); ?>"><i class="fas fa-walking"></i> Execícios</a></li>
                    <li><a href="<?= url("/app/warnings"); ?>"><i class="fas fa-info"></i> Avisos</a></li>
                    <li><a href="<?= url("/app/partnerships"); ?>"><i class="fas fa-handshake"></i> Parcerias</a></li>
                    <li><a href="<?= url("/app/events"); ?>"><i class="fas fa-calendar-check"></i> Eventos</a></li>
                    <li><a href="<?= url("/app/intensification_methods"); ?>">
                            <i class="fas fa-signal"></i>
                            Métodos de Intensificaçao
                        </a></li>
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


<div class="modal fade" id="formulario_fisico" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1"
     aria-hidden="true">
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

                <br/>

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
<!-- END: Back to top-->

<!-- START: Template JS-->
<script src="<?= url("/shared/app/vendors/jquery/jquery-3.3.1.min.js"); ?>"></script>
<script src="<?= url("/shared/app/vendors/jquery-ui/jquery-ui.min.js"); ?>"></script>
<script src="<?= url("/shared/app/vendors/moment/moment.js"); ?>"></script>
<script src="<?= url("/shared/app/vendors/bootstrap/js/bootstrap.bundle.min.js"); ?>"></script>
<script src="<?= url("/shared/app/vendors/slimscroll/jquery.slimscroll.min.js"); ?>"></script>
<script src="<?= url("/shared/app/vendors/summernote/summernote-bs4.js"); ?>"></script>
<script src="<?= url("/shared/app/js/summernote.script.js"); ?>"></script>
<script src="<?= url("/shared/app/js/app.js"); ?>"></script>
<script src="<?= url("/shared/app/vendors/raphael/raphael.min.js"); ?>"></script>
<script src="<?= url("/shared/app/vendors/morris/morris.min.js"); ?>"></script>
<script src="<?= url("/shared/app/js/morris.script.js"); ?>"></script>
<script src="<?= url("/shared/app/js/app.filemanager.js"); ?>"></script>

<script src="<?= url("/shared/app/js/app-taskboard.js"); ?>"></script>
<script src="<?= url("/shared/app/vendors/select2/js/select2.full.min.js"); ?>"></script>
<script src="<?= url("/shared/app/js/select2.script.js"); ?>"></script>

<script src="<?= url("/shared/app/vendors/icheck/icheck.min.js"); ?>"></script>
<script src="<?= url("/shared/app/js/icheck.script.js"); ?>"></script>
<script src="<?= url("/shared/app/vendors/bootstrap4-toggle/js/bootstrap4-toggle.min.js"); ?>"></script>


<!-- <script src="<?= theme("/assets/scripts.js", CONF_VIEW_APP); ?>"></script> -->

<script src="<?= url("/shared/scripts/jquery.form.js"); ?>"></script>
<script src="<?= url("/shared/scripts/jquery-ui.js"); ?>"></script>
<script src="<?= url("/shared/scripts/jquery.mask.js"); ?>"></script>
<script src="<?= url("/shared/scripts/tinymce/tinymce.min.js"); ?>"></script>

<?= $v->section("scripts"); ?>

<!-- END: APP JS-->
</body>
<!-- END: Body-->

<!-- Mirrored from html.designstream.co.in/pick/html/page-blank.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 Feb 2021 19:41:21 GMT -->

</html>