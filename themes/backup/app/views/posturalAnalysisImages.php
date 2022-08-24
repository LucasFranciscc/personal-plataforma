<?php
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
                <li class="breadcrumb-item">Imagens de Avaliação Postural</li>
            </ol>
        </div>
    </div>
</div>

<div class="profile-menu mt-4 theme-background border  z-index-1 p-2">
    <div class="d-sm-flex">
        <div class="align-self-center">
            <ul class="nav nav-pills flex-column flex-sm-row" id="myTab" role="tablist">
                <li class="nav-item ml-0">
                    <a class="nav-link  py-2 px-3 px-lg-4"
                        href="<?= url("app/to_manager/{$student->id}/training_sheet"); ?>"> Fichas de treinos</a>
                </li>
                <li class="nav-item ml-0">
                    <a class="nav-link  py-2 px-4 px-lg-4 " href="<?= url("app/to_manager/{$student->id}/chat"); ?>">
                        Chat</a>
                </li>
                <li class="nav-item ml-0">
                    <a class="nav-link  py-2 px-4 px-lg-4" href="<?= url("app/to_manager/{$student->id}/anamnese"); ?>">
                        Anamnese</a>
                </li>
                <li class="nav-item ml-0">
                    <a class="nav-link  py-2 px-4 px-lg-4"
                        href="<?= url("app/to_manager/{$student->id}/postural_evaluation"); ?>">
                        Avaliação Postural</a>
                </li>
                <li class="nav-item ml-0">
                    <a class="nav-link  py-2 px-4 px-lg-4 " href="<?= url("app/to_manager/{$student->id}/par_q"); ?>">
                        Par-Q</a>
                </li>
                <li class="nav-item ml-0">
                    <a class="nav-link  py-2 px-4 px-lg-4 active"
                        href="<?= url("app/to_manager/{$student->id}/postural_analysis_images"); ?>">
                        Imagens de análise postural</a>
                </li>

                <li class="nav-item ml-0">
                    <a href="<?= url("/editor?user_id={$student->id}"); ?>"
                        class="btn btn-success  font-w-600 my-auto text-nowrap ml-auto add-event"><i
                            class="fa fa-edit"></i> Editor</a>
                </li>
            </ul>
        </div>

    </div>
</div>

<div class="row row-eq-height">
    <div class="col-12 col-md-12 mt-3">

        <div class="card">
            <div class="card-body d-md-flex text-center">

                <a href="#" class="btn btn-primary font-w-600 my-auto text-nowrap ml-auto add-event" data-toggle="modal"
                    data-target="#createPosturalAnalysisImage"><i class="fa fa-plus"></i>
                    Cadastrar Imagens
                </a>

            </div>
        </div>

    </div>
</div>

<?php if (!empty($data)): ?>

<div class="row">

    <div class="col-12 mt-3">
        <div id="accordion">

            <?php foreach ($data as $a): ?>
            <div class="card">
                <div class="card-header" id="headingOne">

                    <h6 class="mb-0">

                        <button class="btn btn-link collapsed" data-toggle="collapse"
                            data-target="#collapse<?= $a->id ?>" aria-expanded="false" aria-controls="collapseTwo">
                            <?= $a->date_posture_analysis ?>
                        </button>

                        <button class="btn btn-primary font-w-600 my-auto text-nowrap ml-auto add-event"
                            data-toggle="modal" data-target="#createPosturalAnalysisImage2"
                            data-postural_analysis_id="<?= $a->id ?>"><i class="fa fa-plus"></i>
                            Cadastrar novas Imagens
                        </button>

                        <a class="btn btn-success font-w-600 my-auto text-nowrap ml-auto add-event"
                            href="<?= url("app/to_manager/{$student->id}/postural_analysis/{$a->id}/posture_analysis") ?>"><i
                                class="fas fa-file-invoice"></i>
                            Análise Postural
                        </a>
                    </h6>
                </div>




                <div id="collapse<?= $a->id ?>" class="collapse show" aria-labelledby="headingOne"
                    data-parent="#accordion">


                    <?php $posturalAnalysisImage = (new \Source\Models\PosturalAnalysisImages())->find("postural_analysis_id = :id", "id={$a->id}")->order("id desc")->fetch(true); ?>

                    <?php if (!empty($posturalAnalysisImage)): ?>

                    <div class="row">
                        <div class="col-12 mt-3">
                            <div class="">
                                <div class="card-body">
                                    <div class="row">



                                        <!-- <div class="col-md-6 col-lg-1 mb-4">
                                        </div> -->


                                        <?php if (!empty($posturalAnalysisImage[0])): ?>
                                        <div class="col-md-6 col-lg-4 col-4 mb-4">
                                            <div class="position-relative" style="display: flex; justify-content: center;">
                                                <img src="<?= url("storage/".$posturalAnalysisImage[0]->image) ?>"
                                                    width="280" alt="" class="img-fluid">
                                                <div class="caption-bg fade bg-transparent text-right">
                                                    <div class="d-table w-100 h-100 ">
                                                        <div class="d-table-cell align-bottom">
                                                            <div class="mb-3" style="text-align: center">
                                                                <a data-fancybox-group="gallery"
                                                                    href="<?= url("storage/".$posturalAnalysisImage[0]->image) ?>"
                                                                    class="rounded-left rounded-right bg-white px-3 py-2 shadow2"><i
                                                                        class="icon-eye"></i></a>
                                                            </div>
                                                            <div class="mb-4" style="text-align: center">
                                                                <a href="<?= url("storage/".$posturalAnalysisImage[0]->image) ?>"
                                                                    data-confirm="Você deseja deletar essa imagem?"
                                                                    data-post="<?= url("/app/create_postural_analysis_images/{$student->id}"); ?>"
                                                                    data-action="delete"
                                                                    data-id="<?= $posturalAnalysisImage[0]->id ?>"
                                                                    class="rounded-left rounded-right bg-white px-3 py-2 shadow2"
                                                                    style="color: red;"><i class="icon-close"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <?php else: ?>
                                        <?php endif; ?>

                                        <?php if (!empty($posturalAnalysisImage[1])): ?>
                                        <div class="col-md-6 col-lg-4 col-4 mb-4">
                                            <div class="position-relative" style="display: flex; justify-content: center;">
                                                <img src="<?= url("storage/".$posturalAnalysisImage[1]->image) ?>"
                                                    width="280" alt="" class="img-fluid">
                                                <div class="caption-bg fade bg-transparent text-right">
                                                    <div class="d-table w-100 h-100 ">
                                                        <div class="d-table-cell align-bottom">
                                                            <div class="mb-3" style="text-align: center">
                                                                <a data-fancybox-group="gallery"
                                                                    href="<?= url("storage/".$posturalAnalysisImage[1]->image) ?>"
                                                                    class="rounded-left rounded-right bg-white px-3 py-2 shadow2"><i
                                                                        class="icon-eye"></i></a>
                                                            </div>
                                                            <div class="mb-4" style="text-align: center">
                                                                <a href="<?= url("storage/".$posturalAnalysisImage[1]->image) ?>"
                                                                    data-confirm="Você deseja deletar essa imagem?"
                                                                    data-post="<?= url("/app/create_postural_analysis_images/{$student->id}"); ?>"
                                                                    data-action="delete"
                                                                    data-id="<?= $posturalAnalysisImage[1]->id ?>"
                                                                    class="rounded-left rounded-right bg-white px-3 py-2 shadow2"
                                                                    style="color: red;"><i class="icon-close"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <?php else: ?>
                                        <?php endif; ?>


                                        <?php if (!empty($posturalAnalysisImage[2])): ?>
                                        <div class="col-md-6 col-lg-4 col-4 mb-4">
                                            <div class="position-relative" style="display: flex; justify-content: center;">
                                                <img src="<?= url("storage/".$posturalAnalysisImage[2]->image) ?>"
                                                    width="280" alt="" class="img-fluid">
                                                <div class="caption-bg fade bg-transparent text-right">
                                                    <div class="d-table w-100 h-100 ">
                                                        <div class="d-table-cell align-bottom">
                                                            <div class="mb-3" style="text-align: center">
                                                                <a data-fancybox-group="gallery"
                                                                    href="<?= url("storage/".$posturalAnalysisImage[2]->image) ?>"
                                                                    class="rounded-left rounded-right bg-white px-3 py-2 shadow2"><i
                                                                        class="icon-eye"></i></a>
                                                            </div>
                                                            <div class="mb-4" style="text-align: center">
                                                                <a href="<?= url("storage/".$posturalAnalysisImage[2]->image) ?>"
                                                                    data-confirm="Você deseja deletar essa imagem?"
                                                                    data-post="<?= url("/app/create_postural_analysis_images/{$student->id}"); ?>"
                                                                    data-action="delete"
                                                                    data-id="<?= $posturalAnalysisImage[2]->id ?>"
                                                                    class="rounded-left rounded-right bg-white px-3 py-2 shadow2"
                                                                    style="color: red;"><i class="icon-close"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <?php else: ?>
                                        <?php endif; ?>

                                        <!-- <div class="col-md-6 col-lg-1 mb-4">
                                        </div> -->

                                        <!-- <div class="col-md-6 col-lg-2 mb-4">
                                        </div> -->

                                        <?php if (!empty($posturalAnalysisImage[3])): ?>
                                        <div class="col-md-6 col-lg-6 mb-4">
                                            <div class="position-relative" style="display: flex; justify-content: center;">
                                                <img src="<?= url("storage/".$posturalAnalysisImage[3]->image) ?>"
                                                    width="280" alt="" class="img-fluid">
                                                <div class="caption-bg fade bg-transparent text-right">
                                                    <div class="d-table w-100 h-100 ">
                                                        <div class="d-table-cell align-bottom">
                                                            <div class="mb-3" style="text-align: center">
                                                                <a data-fancybox-group="gallery"
                                                                    href="<?= url("storage/".$posturalAnalysisImage[3]->image) ?>"
                                                                    class="rounded-left rounded-right bg-white px-3 py-2 shadow2"><i
                                                                        class="icon-eye"></i></a>
                                                            </div>
                                                            <div class="mb-4" style="text-align: center">
                                                                <a href="<?= url("storage/".$posturalAnalysisImage[3]->image) ?>"
                                                                    data-confirm="Você deseja deletar essa imagem?"
                                                                    data-post="<?= url("/app/create_postural_analysis_images/{$student->id}"); ?>"
                                                                    data-action="delete"
                                                                    data-id="<?= $posturalAnalysisImage[3]->id ?>"
                                                                    class="rounded-left rounded-right bg-white px-3 py-2 shadow2"
                                                                    style="color: red;"><i class="icon-close"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <?php else: ?>
                                        <?php endif; ?>

                                        <?php if (!empty($posturalAnalysisImage[4])): ?>
                                        <div class="col-md-6 col-lg-6 mb-4">
                                            <div class="position-relative" style="display: flex; justify-content: center;">
                                                <img src="<?= url("storage/".$posturalAnalysisImage[4]->image) ?>"
                                                    width="280" alt="" class="img-fluid">
                                                <div class="caption-bg fade bg-transparent text-right">
                                                    <div class="d-table w-100 h-100 ">
                                                        <div class="d-table-cell align-bottom">
                                                            <div class="mb-3" style="text-align: center">
                                                                <a data-fancybox-group="gallery"
                                                                    href="<?= url("storage/".$posturalAnalysisImage[4]->image) ?>"
                                                                    class="rounded-left rounded-right bg-white px-3 py-2 shadow2"><i
                                                                        class="icon-eye"></i></a>
                                                            </div>
                                                            <div class="mb-4" style="text-align: center">
                                                                <a href="<?= url("storage/".$posturalAnalysisImage[4]->image) ?>"
                                                                    data-confirm="Você deseja deletar essa imagem?"
                                                                    data-post="<?= url("/app/create_postural_analysis_images/{$student->id}"); ?>"
                                                                    data-action="delete"
                                                                    data-id="<?= $posturalAnalysisImage[4]->id ?>"
                                                                    class="rounded-left rounded-right bg-white px-3 py-2 shadow2"
                                                                    style="color: red;"><i class="icon-close"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <?php else: ?>
                                        <?php endif; ?>

                                        <!-- <div class="col-md-6 col-lg-2 mb-4">
                                        </div> -->

                                        <!-- <div class="col-md-6 col-lg-2 mb-4">
                                        </div> -->

                                        <?php if (!empty($posturalAnalysisImage[5])): ?>
                                        <div class="col-md-6 col-lg-6 mb-4">
                                            <div class="position-relative" style="display: flex; justify-content: center;">
                                                <img src="<?= url("storage/".$posturalAnalysisImage[5]->image) ?>"
                                                    width="280" alt="" class="img-fluid">
                                                <div class="caption-bg fade bg-transparent text-right">
                                                    <div class="d-table w-100 h-100 ">
                                                        <div class="d-table-cell align-bottom">
                                                            <div class="mb-3" style="text-align: center">
                                                                <a data-fancybox-group="gallery"
                                                                    href="<?= url("storage/".$posturalAnalysisImage[5]->image) ?>"
                                                                    class="rounded-left rounded-right bg-white px-3 py-2 shadow2"><i
                                                                        class="icon-eye"></i></a>
                                                            </div>
                                                            <div class="mb-4" style="text-align: center">
                                                                <a href="<?= url("storage/".$posturalAnalysisImage[5]->image) ?>"
                                                                    data-confirm="Você deseja deletar essa imagem?"
                                                                    data-post="<?= url("/app/create_postural_analysis_images/{$student->id}"); ?>"
                                                                    data-action="delete"
                                                                    data-id="<?= $posturalAnalysisImage[5]->id ?>"
                                                                    class="rounded-left rounded-right bg-white px-3 py-2 shadow2"
                                                                    style="color: red;"><i class="icon-close"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <?php else: ?>
                                        <?php endif; ?>

                                        <?php if (!empty($posturalAnalysisImage[6])): ?>
                                        <div class="col-md-6 col-lg-6 mb-4">
                                            <div class="position-relative" style="display: flex; justify-content: center;">
                                                <img src="<?= url("storage/".$posturalAnalysisImage[6]->image) ?>"
                                                    width="280" alt="" class="img-fluid">
                                                <div class="caption-bg fade bg-transparent text-right">
                                                    <div class="d-table w-100 h-100 ">
                                                        <div class="d-table-cell align-bottom">
                                                            <div class="mb-3" style="text-align: center">
                                                                <a data-fancybox-group="gallery"
                                                                    href="<?= url("storage/".$posturalAnalysisImage[6]->image) ?>"
                                                                    class="rounded-left rounded-right bg-white px-3 py-2 shadow2"><i
                                                                        class="icon-eye"></i></a>
                                                            </div>
                                                            <div class="mb-4" style="text-align: center">
                                                                <a href="<?= url("storage/".$posturalAnalysisImage[6]->image) ?>"
                                                                    data-confirm="Você deseja deletar essa imagem?"
                                                                    data-post="<?= url("/app/create_postural_analysis_images/{$student->id}"); ?>"
                                                                    data-action="delete"
                                                                    data-id="<?= $posturalAnalysisImage[6]->id ?>"
                                                                    class="rounded-left rounded-right bg-white px-3 py-2 shadow2"
                                                                    style="color: red;"><i class="icon-close"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <?php else: ?>
                                        <?php endif; ?>

                                        <!-- <div class="col-md-6 col-lg-2 mb-4">
                                        </div>


                                        <div class="col-md-6 col-lg-2 mb-4">
                                        </div> -->

                                        <?php if (!empty($posturalAnalysisImage[7])): ?>
                                        <div class="col-md-6 col-lg-6 mb-4">
                                            <div class="position-relative" style="display: flex; justify-content: center;">
                                                <img src="<?= url("storage/".$posturalAnalysisImage[7]->image) ?>"
                                                    width="280" alt="" class="img-fluid">
                                                <div class="caption-bg fade bg-transparent text-right">
                                                    <div class="d-table w-100 h-100 ">
                                                        <div class="d-table-cell align-bottom">
                                                            <div class="mb-3" style="text-align: center">
                                                                <a data-fancybox-group="gallery"
                                                                    href="<?= url("storage/".$posturalAnalysisImage[7]->image) ?>"
                                                                    class="rounded-left rounded-right bg-white px-3 py-2 shadow2"><i
                                                                        class="icon-eye"></i></a>
                                                            </div>
                                                            <div class="mb-4" style="text-align: center">
                                                                <a href="<?= url("storage/".$posturalAnalysisImage[7]->image) ?>"
                                                                    data-confirm="Você deseja deletar essa imagem?"
                                                                    data-post="<?= url("/app/create_postural_analysis_images/{$student->id}"); ?>"
                                                                    data-action="delete"
                                                                    data-id="<?= $posturalAnalysisImage[7]->id ?>"
                                                                    class="rounded-left rounded-right bg-white px-3 py-2 shadow2"
                                                                    style="color: red;"><i class="icon-close"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <?php else: ?>
                                        <?php endif; ?>

                                        <?php if (!empty($posturalAnalysisImage[8])): ?>
                                        <div class="col-md-6 col-lg-6 mb-4">
                                            <div class="position-relative" style="display: flex; justify-content: center;">
                                                <img src="<?= url("storage/".$posturalAnalysisImage[8]->image) ?>"
                                                    width="280" alt="" class="img-fluid">
                                                <div class="caption-bg fade bg-transparent text-right">
                                                    <div class="d-table w-100 h-100 ">
                                                        <div class="d-table-cell align-bottom">
                                                            <div class="mb-3" style="text-align: center">
                                                                <a data-fancybox-group="gallery"
                                                                    href="<?= url("storage/".$posturalAnalysisImage[8]->image) ?>"
                                                                    class="rounded-left rounded-right bg-white px-3 py-2 shadow2"><i
                                                                        class="icon-eye"></i></a>
                                                            </div>
                                                            <div class="mb-4" style="text-align: center">
                                                                <a href="<?= url("storage/".$posturalAnalysisImage[8]->image) ?>"
                                                                    data-confirm="Você deseja deletar essa imagem?"
                                                                    data-post="<?= url("/app/create_postural_analysis_images/{$student->id}"); ?>"
                                                                    data-action="delete"
                                                                    data-id="<?= $posturalAnalysisImage[8]->id ?>"
                                                                    class="rounded-left rounded-right bg-white px-3 py-2 shadow2"
                                                                    style="color: red;"><i class="icon-close"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <?php else: ?>
                                        <?php endif; ?>

                                        <!-- <div class="col-md-6 col-lg-2 mb-4">
                                        </div>


                                        <div class="col-md-6 col-lg-2 mb-4">
                                        </div> -->

                                        <?php if (!empty($posturalAnalysisImage[9])): ?>
                                        <div class="col-md-6 col-lg-6 mb-4">
                                            <div class="position-relative" style="display: flex; justify-content: center;">
                                                <img src="<?= url("storage/".$posturalAnalysisImage[9]->image) ?>"
                                                    width="280" alt="" class="img-fluid">
                                                <div class="caption-bg fade bg-transparent text-right">
                                                    <div class="d-table w-100 h-100 ">
                                                        <div class="d-table-cell align-bottom">
                                                            <div class="mb-3" style="text-align: center">
                                                                <a data-fancybox-group="gallery"
                                                                    href="<?= url("storage/".$posturalAnalysisImage[9]->image) ?>"
                                                                    class="rounded-left rounded-right bg-white px-3 py-2 shadow2"><i
                                                                        class="icon-eye"></i></a>
                                                            </div>
                                                            <div class="mb-4" style="text-align: center">
                                                                <a href="<?= url("storage/".$posturalAnalysisImage[9]->image) ?>"
                                                                    data-confirm="Você deseja deletar essa imagem?"
                                                                    data-post="<?= url("/app/create_postural_analysis_images/{$student->id}"); ?>"
                                                                    data-action="delete"
                                                                    data-id="<?= $posturalAnalysisImage[9]->id ?>"
                                                                    class="rounded-left rounded-right bg-white px-3 py-2 shadow2"
                                                                    style="color: red;"><i class="icon-close"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <?php else: ?>
                                        <?php endif; ?>

                                        <?php if (!empty($posturalAnalysisImage[10])): ?>
                                        <div class="col-md-6 col-lg-6 mb-4">
                                            <div class="position-relative" style="display: flex; justify-content: center;">
                                                <img src="<?= url("storage/".$posturalAnalysisImage[10]->image) ?>"
                                                    width="280" alt="" class="img-fluid">
                                                <div class="caption-bg fade bg-transparent text-right">
                                                    <div class="d-table w-100 h-100 ">
                                                        <div class="d-table-cell align-bottom">
                                                            <div class="mb-3" style="text-align: center">
                                                                <a data-fancybox-group="gallery"
                                                                    href="<?= url("storage/".$posturalAnalysisImage[10]->image) ?>"
                                                                    class="rounded-left rounded-right bg-white px-3 py-2 shadow2"><i
                                                                        class="icon-eye"></i></a>
                                                            </div>
                                                            <div class="mb-4" style="text-align: center">
                                                                <a href="<?= url("storage/".$posturalAnalysisImage[10]->image) ?>"
                                                                    data-confirm="Você deseja deletar essa imagem?"
                                                                    data-post="<?= url("/app/create_postural_analysis_images/{$student->id}"); ?>"
                                                                    data-action="delete"
                                                                    data-id="<?= $posturalAnalysisImage[10]->id ?>"
                                                                    class="rounded-left rounded-right bg-white px-3 py-2 shadow2"
                                                                    style="color: red;"><i class="icon-close"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <?php else: ?>
                                        <?php endif; ?>

                                        <!-- <div class="col-md-6 col-lg-2 mb-4">
                                        </div>

                                        <div class="col-md-6 col-lg-2 mb-4">
                                        </div> -->

                                        <?php if (!empty($posturalAnalysisImage[11])): ?>
                                        <div class="col-md-6 col-lg-6 mb-4">
                                            <div class="position-relative" style="display: flex; justify-content: center;">
                                                <img src="<?= url("storage/".$posturalAnalysisImage[11]->image) ?>"
                                                    width="280" alt="" class="img-fluid">
                                                <div class="caption-bg fade bg-transparent text-right">
                                                    <div class="d-table w-100 h-100 ">
                                                        <div class="d-table-cell align-bottom">
                                                            <div class="mb-3" style="text-align: center">
                                                                <a data-fancybox-group="gallery"
                                                                    href="<?= url("storage/".$posturalAnalysisImage[11]->image) ?>"
                                                                    class="rounded-left rounded-right bg-white px-3 py-2 shadow2"><i
                                                                        class="icon-eye"></i></a>
                                                            </div>
                                                            <div class="mb-4" style="text-align: center">
                                                                <a href="<?= url("storage/".$posturalAnalysisImage[11]->image) ?>"
                                                                    data-confirm="Você deseja deletar essa imagem?"
                                                                    data-post="<?= url("/app/create_postural_analysis_images/{$student->id}"); ?>"
                                                                    data-action="delete"
                                                                    data-id="<?= $posturalAnalysisImage[11]->id ?>"
                                                                    class="rounded-left rounded-right bg-white px-3 py-2 shadow2"
                                                                    style="color: red;"><i class="icon-close"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <?php else: ?>
                                        <?php endif; ?>

                                        <?php if (!empty($posturalAnalysisImage[12])): ?>
                                        <div class="col-md-6 col-lg-6 mb-4">
                                            <div class="position-relative" style="display: flex; justify-content: center;">
                                                <img src="<?= url("storage/".$posturalAnalysisImage[12]->image) ?>"
                                                    width="280" alt="" class="img-fluid">
                                                <div class="caption-bg fade bg-transparent text-right">
                                                    <div class="d-table w-100 h-100 ">
                                                        <div class="d-table-cell align-bottom">
                                                            <div class="mb-3" style="text-align: center">
                                                                <a data-fancybox-group="gallery"
                                                                    href="<?= url("storage/".$posturalAnalysisImage[12]->image) ?>"
                                                                    class="rounded-left rounded-right bg-white px-3 py-2 shadow2"><i
                                                                        class="icon-eye"></i></a>
                                                            </div>
                                                            <div class="mb-4" style="text-align: center">
                                                                <a href="<?= url("storage/".$posturalAnalysisImage[12]->image) ?>"
                                                                    data-confirm="Você deseja deletar essa imagem?"
                                                                    data-post="<?= url("/app/create_postural_analysis_images/{$student->id}"); ?>"
                                                                    data-action="delete"
                                                                    data-id="<?= $posturalAnalysisImage[12]->id ?>"
                                                                    class="rounded-left rounded-right bg-white px-3 py-2 shadow2"
                                                                    style="color: red;"><i class="icon-close"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <?php else: ?>
                                        <?php endif; ?>

                            

                                        <?php else: ?>

                                        <?php endif; ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

        </div>

    </div>

</div>

<?php else: ?>

<?php endif; ?>


<div class="modal fade" id="createPosturalAnalysisImage" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLongTitle1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle1">Cadastrar Imagens</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= url("app/create_postural_analysis_images/$student->id"); ?>">

                <div class="modal-body">

                    <div class="row">

                        <div class="card-body">
                            <div class="col-12">

                                <input type="hidden" name="action" value="createAndUpdate" />

                                <div class="form-row">
                                    <div class="form-group col-md-7">
                                        <label for="name">Imagens</label>
                                        <input type="file" id="photo" name="photo[]" multiple class="input-file"
                                            required />
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="createPosturalAnalysisImage2" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLongTitle1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle1">Cadastrar Imagens</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= url("app/create_postural_analysis_images/$student->id"); ?>">

                <div class="modal-body">

                    <div class="row">

                        <div class="card-body">
                            <div class="col-12">

                                <input type="hidden" name="action" value="createAndUpdate" />
                                <input type="hidden" name="postural_analysis_id" id="postural_analysis_id" />

                                <div class="form-row">
                                    <div class="form-group col-md-7">
                                        <label for="name">Imagens</label>
                                        <input type="file" id="photo" name="photo[]" multiple class="input-file"
                                            required />
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $v->start("scripts"); ?>

<script src="<?= theme("/assets/js/script.js", CONF_VIEW_APP); ?>"></script>

<script>
$('#createPosturalAnalysisImage2').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var postural_analysis_id = button.data('postural_analysis_id');

    var modal = $(this);
    modal.find('#postural_analysis_id').val(postural_analysis_id);
});
</script>

<?php $v->end(); ?>