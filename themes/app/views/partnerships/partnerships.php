<?php $v->layout("_theme"); ?>

<div class="row ">

    <?php if (!empty($students)) : ?>

        <?php foreach ($students as $student) : ?>

            <div class="col-12 col-lg-3 col-xl-3 mt-3">
                <div class="card">
                    <div class="card-content">


                        <div class="card-image business-card">
                            <div class="background-image-maker"></div>
                            <div class="holder-image">
                                <img src="<?= image($student->photo, 260, 260) ?>" alt="" class="img-fluid" style="max-width: 75%;">
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title mb-3 mt-2"><?= $student->name ?></h5>
                            <p class="card-text">
                                <b><i class="far fa-envelope"></i>
                                    E-mail
                                </b>
                                <br>
                                <?= $student->email ?>
                            </p>
                            <p class="card-text">
                                <b><i class="fas fa-phone"></i>
                                    Telefone
                                </b>
                                <br>
                                <span class="mask-phone"><?= $student->phone ?></span>
                            </p>
                            <div class="row mt-4 mb-3">
                                <div class="col-5">
                                    <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#updateStudent" data-id="<?= $student->id ?>" data-name="<?= $student->name ?>" data-birth="<?= $student->birth ?>" data-phone="<?= $student->phone ?>" data-cpf="<?= $student->cpf ?>" data-sex="<?= $student->sex ?>" data-level="<?= $student->access_level_id ?>" data-email="<?= $student->email ?>">
                                        <i class="fa fa-pen"></i> Editar
                                    </button>
                                </div>
                                <div class="col-7">
                                    <a class="btn btn-primary mb-2" style="color: white;" href="<?= url("app/to_manager/{$student->id}/training_sheet"); ?>">
                                        <i class="fas fa-cogs"></i> Gerenciar
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>

    <?php else : ?>



        <div class="col-12 col-lg-12 mt-3 ">

            <div class="row">
                <div class="col-12 mt-12">
                    <div class="alert alert-primary" role="alert">
                        Não existe parcerias cadastrados
                    </div>
                </div>

            </div>
        </div>

    <?php endif; ?>

</div>

<?= $paginator; ?>
