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
                    <li class="breadcrumb-item">Par-Q</li>
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
                        <a class="nav-link  py-2 px-4 px-lg-4 "
                           href="<?= url("app/to_manager/{$student->id}/chat"); ?>">
                            Chat</a>
                    </li>
                    <li class="nav-item ml-0">
                        <a class="nav-link  py-2 px-4 px-lg-4 "
                           href="<?= url("app/to_manager/{$student->id}/anamnese"); ?>">
                            Anamnese</a>
                    </li>
                    <li class="nav-item ml-0">
                        <a class="nav-link  py-2 px-4 px-lg-4 "
                           href="<?= url("app/to_manager/{$student->id}/postural_evaluation"); ?>">
                            Avaliação Postural</a>
                    </li>
                    <li class="nav-item ml-0">
                        <a class="nav-link  py-2 px-4 px-lg-4 active"
                           href="<?= url("app/to_manager/{$student->id}/par_q"); ?>">
                            Par-Q</a>
                    </li>
                    <li class="nav-item ml-0">
                        <a class="nav-link  py-2 px-4 px-lg-4 "
                           href="<?= url("app/to_manager/{$student->id}/postural_analysis_images"); ?>">
                            Imagens de análise postural</a>
                    </li>


                </ul>
            </div>

        </div>
    </div>

<?php if (!empty($par_q)): ?>

    <div class="row">

        <div class="col-12 col-md-12 mt-3">
            <div id="accordion">

                <?php foreach ($par_q as $a): ?>
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?= $a->id ?>"
                                        aria-expanded="false" aria-controls="collapseOne">
                                    <?= date_fmt($a->updated_at, "d/m/Y") ?>
                                </button>
                            </h5>
                        </div>

                        <div id="collapse<?= $a->id ?>" class="collapse show" aria-labelledby="headingOne"
                             data-parent="#accordion">
                            <div class="p-3">

                                <strong>1) ALGUM MÉDICO JÁ DISSE QUE VOCÊ POSSUI ALGUM PROBLEMA DE CORAÇÃO OU PRESSÃO
                                    ARTERIAL, E QUE SOMENTE DEVERIA REALIZAR ATIVIDADE FÍSICA SUPERVISIONADO POR
                                    PROFISSIONAIS DE SAÚDE?</strong>
                                <p><?= $a->question1 ?></p>
                                <br>

                                <strong>2) VOCÊ SENTE DORES NO PEITO QUANDO PRATICA ATIVIDADE FÍSICA?</strong>
                                <p><?= $a->question2 ?></p>
                                <br>

                                <strong>3) NO ÚLTIMO MÊS, VOCÊ SENTIU DORES NO PEITO AO PRATICAR ATIVIDADE FÍSICA?
                                </strong>
                                <p><?= $a->question3 ?></p>
                                <br>

                                <strong>4) VOCÊ APRESENTA ALGUM DESEQUILÍBRIO DEVIDO À TONTURA E/OU PERDA MOMENTÂNEA DA
                                    CONSCIÊNCIA?
                                </strong>
                                <p><?= $a->question4 ?></p>
                                <br>

                                <strong>5) VOCÊ POSSUI ALGUM PROBLEMA ÓSSEO OU ARTICULAR, QUE PODE SER AFETADO OU
                                    AGRAVADO PELA ATIVIDADE FÍSICA?
                                </strong>
                                <p><?= $a->question5 ?></p>
                                <br>

                                <strong>6) VOCÊ TOMA ATUALMENTE ALGUM TIPO DE MEDICAÇÃO DE USO CONTÍNUO?
                                </strong>
                                <p><?= $a->question6 ?></p>
                                <br>

                                <strong>
                                    7) VOCÊ REALIZA ALGUM TIPO DE TRATAMENTO MÉDICO PARA PRESSÃO ARTERIAL OU PROBLEMAS
                                    CARDÍACOS?</strong>
                                <p><?= $a->question7 ?></p>
                                <br>

                                <strong>8) VOCÊ REALIZA ALGUM TRATAMENTO MÉDICO CONTÍNUO, QUE POSSA SER AFETADO OU
                                    PREJUDICADO COM A ATIVIDADE FÍSICA?</strong>
                                <p><?= $a->question8 ?></p>
                                <br>

                                <strong>9) VOCÊ JÁ SE SUBMETEU A ALGUM TIPO DE CIRURGIA, QUE COMPROMETA DE ALGUMA FORMA
                                    A ATIVIDADE FÍSICA?
                                </strong>
                                <p><?= $a->question9 ?></p>
                                <br>

                                <strong>10) SABE DE ALGUMA OUTRA RAZÃO PELA QUAL A ATIVIDADE FÍSICA POSSA EVENTUALMENTE
                                    COMPROMETER SUA SAÚDE?
                                </strong>
                                <p><?= $a->question10 ?></p>
                                <br>

                                <strong>Termos Concordados?</strong>
                                <p><?= $a->term ?></p>
                                <br>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>

        </div>

    </div>

<?php else: ?>

<?php endif; ?>