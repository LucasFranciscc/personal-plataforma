<?php

use Source\Models\Auth;

$v->layout("_theme");
?>

<div class="row ">
    <div class="col-12  align-self-center">
        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
            <div class="w-sm-100 mr-auto">
                <h4 class="mb-0"><?= $student->name ?></h4>
            </div>

            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                <li class="breadcrumb-item"><a href="<?= url("/app/"); ?>">Home</a></li>
                <li class="breadcrumb-item">Formulário Físico</li>
            </ol>
        </div>
    </div>
</div>

<div class="profile-menu mt-4 theme-background border  z-index-1 p-2">
    <div class="d-sm-flex">
        <div class="align-self-center">
            <ul class="nav nav-pills flex-column flex-sm-row" id="myTab" role="tablist">
                <li class="nav-item ml-0">
                    <a class="nav-link  py-2 px-3 px-lg-4  active" data-toggle="tab" href="#timeline"> Timeline</a>
                </li>
                <li class="nav-item ml-0">
                    <a class="nav-link  py-2 px-4 px-lg-4 " data-toggle="tab" href="#about">
                        About</a>
                </li>
                <li class="nav-item ml-0">
                    <a class="nav-link py-2 px-4 px-lg-4" data-toggle="tab" href="#activities">Activities </a>
                </li>
                <li class="nav-item ml-0 mb-2 mb-sm-0">
                    <a class="nav-link py-2 px-4 px-lg-4" data-toggle="tab" href="#message">
                        Message</a>
                </li>
            </ul>
        </div>

    </div>
</div>



<div class="col-12 col-md-12 mt-3">
    <div id="accordion">

        <?php foreach ($physicalForms as $physicalForm) : ?>
            <div class="card">
                <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse<?= $physicalForm->id ?>" aria-expanded="false" aria-controls="collapseTwo">
                            <?= date_fmt($physicalForm->updated_at, 'd/m/Y') ?>
                        </button>
                    </h5>
                </div>
                <div id="collapse<?= $physicalForm->id ?>" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="p-3">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>


<?php $v->start("scripts"); ?>

<script src="<?= theme("/assets/js/script2.js", CONF_VIEW_APP); ?>"></script>

<?php $v->end(); ?>