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
                <li class="breadcrumb-item">Avaliação Postural</li>
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
                    <a class="nav-link  py-2 px-4 px-lg-4"
                       href="<?= url("app/to_manager/{$student->id}/anamnese"); ?>">
                        Anamnese</a>
                </li>
                <li class="nav-item ml-0">
                    <a class="nav-link  py-2 px-4 px-lg-4 active"
                       href="<?= url("app/to_manager/{$student->id}/postural_evaluation"); ?>">
                        Avaliação Postural</a>
                </li>
                <li class="nav-item ml-0">
                    <a class="nav-link  py-2 px-4 px-lg-4 " href="<?= url("app/to_manager/{$student->id}/par_q"); ?>">
                        Par-Q</a>
                </li>
                <li class="nav-item ml-0">
                    <a class="nav-link  py-2 px-4 px-lg-4 " href="<?= url("app/to_manager/{$student->id}/postural_analysis_images"); ?>">
                        Imagens de análise postural</a>
                </li>

                <li class="nav-item ml-0">
                    <a href="<?= url("/editor?user_id={$student->id}"); ?>"
                       class="btn btn-success font-w-600 my-auto text-nowrap ml-auto add-event"><i
                                class="fa fa-edit"></i> Editor</a>
                </li>
            </ul>
        </div>

    </div>
</div>

<?php if (!empty($postural_evaluation)): ?>

<div class="row">

    <div class="col-12 col-md-12 mt-3">
        <div id="accordion">

          <?php foreach ($postural_evaluation as $a): ?>
              <div class="card">
                  <div class="card-header" id="headingOne">
                      <h5 class="mb-0">
                          <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse<?= $a->id ?>" aria-expanded="false" aria-controls="collapseTwo">
                            <?= date_fmt($a->updated_at, "d/m/Y") ?>
                          </button>
                      </h5>
                  </div>

                  <div id="collapse<?= $a->id ?>" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">

                      <div class="row">
                          <div class="col-12  mt-3">

                                      <div id="grid" class="row">

                                          <div class="item col-12 col-md-6 col-lg-4 mb-4 text-center Branding">

                                              <label class="text-center"><strong>Imagem 1</strong></label>

                                              <img src="<?= image($a->photo1, 250, 240) ?>" alt="" class="portfolioImage img-fluid">
                                              <div class="d-flex">
                                                  <a data-fancybox-group="gallery" href="<?= url("/storage/{$a->photo1}"); ?>" class="fancybox btn rounded-0 btn-dark w-50">Ver Imagem</a>
                                                  <a href="<?= url("/storage/{$a->photo1}"); ?>" class="btn btn-success rounded-0 w-50" download>Download</a>
                                              </div>

                                          </div>

                                          <div class="item col-12 col-md-6 col-lg-4 mb-4 text-center Branding">

                                              <label class="text-center"><strong>Imagem 2</strong></label>

                                              <img src="<?= image($a->photo2, 250, 240) ?>" alt="" class="portfolioImage img-fluid">
                                              <div class="d-flex">
                                                  <a data-fancybox-group="gallery" href="<?= url("/storage/{$a->photo2}"); ?>" class="fancybox btn rounded-0 btn-dark w-50">Ver Imagem</a>
                                                  <a href="<?= url("/storage/{$a->photo2}"); ?>" class="btn btn-success rounded-0 w-50" download>Download</a>
                                              </div>

                                          </div>

                                          <div class="item col-12 col-md-6 col-lg-4 mb-4 text-center Branding">

                                              <label class="text-center"><strong>Imagem 3</strong></label>

                                              <img src="<?= image($a->photo3, 250, 240) ?>" alt="" class="portfolioImage img-fluid">
                                              <div class="d-flex">
                                                  <a data-fancybox-group="gallery" href="<?= url("/storage/{$a->photo3}"); ?>" class="fancybox btn rounded-0 btn-dark w-50">Ver Imagem</a>
                                                  <a href="<?= url("/storage/{$a->photo3}"); ?>" class="btn btn-success rounded-0 w-50" download>Download</a>
                                              </div>

                                          </div>

                                          <div class="item col-12 col-md-6 col-lg-4 mb-4 text-center Branding">

                                              <label class="text-center"><strong>Imagem 4</strong></label>

                                              <img src="<?= image($a->photo4, 250, 240) ?>" alt="" class="portfolioImage img-fluid">
                                              <div class="d-flex">
                                                  <a data-fancybox-group="gallery" href="<?= url("/storage/{$a->photo4}"); ?>" class="fancybox btn rounded-0 btn-dark w-50">Ver Imagem</a>
                                                  <a href="<?= url("/storage/{$a->photo4}"); ?>" class="btn btn-success rounded-0 w-50" download>Download</a>
                                              </div>

                                          </div>

                                          <div class="item col-12 col-md-6 col-lg-4 mb-4 text-center Branding">

                                              <label class="text-center"><strong>Imagem 5</strong></label>

                                              <img src="<?= image($a->photo5, 250, 240) ?>" alt="" class="portfolioImage img-fluid">
                                              <div class="d-flex">
                                                  <a data-fancybox-group="gallery" href="<?= url("/storage/{$a->photo5}"); ?>" class="fancybox btn rounded-0 btn-dark w-50">Ver Imagem</a>
                                                  <a href="<?= url("/storage/{$a->photo5}"); ?>" class="btn btn-success rounded-0 w-50" download>Download</a>
                                              </div>

                                          </div>

                                          <div class="item col-12 col-md-6 col-lg-4 mb-4 text-center Branding">

                                              <label class="text-center"><strong>Imagem 6</strong></label>

                                              <img src="<?= image($a->photo6, 250, 240) ?>" alt="" class="portfolioImage img-fluid">
                                              <div class="d-flex">
                                                  <a data-fancybox-group="gallery" href="<?= url("/storage/{$a->photo6}"); ?>" class="fancybox btn rounded-0 btn-dark w-50">Ver Imagem</a>
                                                  <a href="<?= url("/storage/{$a->photo6}"); ?>" class="btn btn-success rounded-0 w-50" download>Download</a>
                                              </div>

                                          </div>

                                          <div class="item col-12 col-md-6 col-lg-4 mb-4 text-center Branding">

                                              <label class="text-center"><strong>Imagem 7</strong></label>

                                              <img src="<?= image($a->photo7, 250, 240) ?>" alt="" class="portfolioImage img-fluid">
                                              <div class="d-flex">
                                                  <a data-fancybox-group="gallery" href="<?= url("/storage/{$a->photo7}"); ?>" class="fancybox btn rounded-0 btn-dark w-50">Ver Imagem</a>
                                                  <a href="<?= url("/storage/{$a->photo7}"); ?>" class="btn btn-success rounded-0 w-50" download>Download</a>
                                              </div>

                                          </div>

                                          <div class="item col-12 col-md-6 col-lg-4 mb-4 text-center Branding">

                                              <label class="text-center"><strong>Imagem 8</strong></label>

                                              <img src="<?= image($a->photo8, 250, 240) ?>" alt="" class="portfolioImage img-fluid">
                                              <div class="d-flex">
                                                  <a data-fancybox-group="gallery" href="<?= url("/storage/{$a->photo8}"); ?>" class="fancybox btn rounded-0 btn-dark w-50">Ver Imagem</a>
                                                  <a href="<?= url("/storage/{$a->photo8}"); ?>" class="btn btn-success rounded-0 w-50" download>Download</a>
                                              </div>

                                          </div>

                                          <div class="item col-12 col-md-6 col-lg-4 mb-4 text-center Branding">

                                              <label class="text-center"><strong>Imagem 9</strong></label>

                                              <img src="<?= image($a->photo9, 250, 240) ?>" alt="" class="portfolioImage img-fluid">
                                              <div class="d-flex">
                                                  <a data-fancybox-group="gallery" href="<?= url("/storage/{$a->photo9}"); ?>" class="fancybox btn rounded-0 btn-dark w-50">Ver Imagem</a>
                                                  <a href="<?= url("/storage/{$a->photo9}"); ?>" class="btn btn-success rounded-0 w-50" download>Download</a>
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