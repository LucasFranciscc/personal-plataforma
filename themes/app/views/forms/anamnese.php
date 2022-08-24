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
                <li class="breadcrumb-item">Anamnese</li>
            </ol>
        </div>
    </div>
</div>

<div class="profile-menu mt-4 theme-background border  z-index-1 p-2">
    <div class="d-sm-flex">
        <div class="align-self-center">
            <ul class="nav nav-pills flex-column flex-sm-row" id="myTab" role="tablist">
                <li class="nav-item ml-0">
                    <a class="nav-link  py-2 px-3 px-lg-4" href="<?= url("app/to_manager/{$student->id}/training_sheet"); ?>"> Fichas de treinos</a>
                </li>
                <li class="nav-item ml-0">
                    <a class="nav-link  py-2 px-4 px-lg-4 " href="<?= url("app/to_manager/{$student->id}/chat"); ?>">
                        Chat</a>
                </li>
                <li class="nav-item ml-0">
                    <a class="nav-link  py-2 px-4 px-lg-4 active" href="<?= url("app/to_manager/{$student->id}/anamnese"); ?>">
                        Anamnese</a>
                </li>
                <li class="nav-item ml-0">
                    <a class="nav-link  py-2 px-4 px-lg-4 " href="<?= url("app/to_manager/{$student->id}/postural_evaluation"); ?>">
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

            </ul>
        </div>

    </div>
</div>

<?php if (!empty($anamnese)) : ?>

    <div class="row">

        <div class="col-12 col-md-12 mt-3">
            <div id="accordion">

                <?php foreach ($anamnese as $a) : ?>
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?= $a->id ?>" aria-expanded="true" aria-controls="collapseOne">
                                    <?= date_fmt($a->updated_at, "d/m/Y") ?>
                                </button>
                            </h5>
                        </div>

                        <div id="collapse<?= $a->id ?>" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="p-3">

                                <strong>1) VOCÊ POSSUI ALGUMA LESÃO OU LIMITAÇÃO MUSCULAR OU ÓSSEA? SE SIM, QUAL?</strong>
                                <p><?= $a->question1 ?></p>
                                <br>

                                <strong>2) VOCÊ PRATICA OU JÁ PRATICOU ALGUMA ATIVIDADE FÍSICA REGULARMENTE? SE SIM, QUAL E POR QUANTO TEMPO?</strong>
                                <p><?= $a->question2 ?></p>
                                <br>

                                <strong>3) SEGUE ALGUM PLANO ALIMENTAR FEITO POR NUTRICIONISTA?</strong>
                                <p><?= $a->question3 ?></p>
                                <br>

                                <strong>4) EM QUAL LOCAL VOCÊ REALIZARÁ SEUS TREINOS? E QUANTAS VEZES NA SEMANA?</strong>
                                <p><?= $a->question4 ?></p>
                                <br>

                                <strong>5) QUAIS OS DOIS PRINCIPAIS OBJETIVOS COM O TREINAMENTO? ESPECIFIQUE.</strong>
                                <p><?= $a->question5 ?></p>
                                <br>

                                <strong>6) QUAL O TEMPO MÁXIMO QUE VOCÊ TEM PARA REALIZAR CADA SESSÃO DE TREINO?</strong>
                                <p><?= $a->question6 ?></p>
                                <br>

                                <strong>7) QUAL HORÁRIO EXATO VOCÊ PRETENDE TREINAR? A ACADEMIA É MUITO CHEIA NESSE HORÁRIO?</strong>
                                <p><?= $a->question7 ?></p>
                                <br>

                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>

        </div>

    </div>

<?php else : ?>

<?php endif; ?>