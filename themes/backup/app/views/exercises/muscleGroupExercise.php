<?php $v->layout("_theme"); ?>

<div class="row ">
    <div class="col-12  align-self-center">
        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
            <div class="w-sm-100 mr-auto">
                <h4 class="mb-0">Exercícios</h4>
            </div>

            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                <li class="breadcrumb-item"><a href="<?= url(" /app/"); ?>">Home</a></li>
                <li class="breadcrumb-item"><?= $exercises->title ?></li>
            </ol>
        </div>
    </div>
</div>

<div class="row">

    <div class="col-12 col-sm-6 mt-3">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">Adicionar grupo muscular ao exercício <?= $exercises->title ?></h4>
            </div>
            <div class="card-body">

                <?php if (empty($muscleGroupExerciseNotLinked)) : ?>

                    <div class="row">
                        <div class="col-12 mt-3">
                            <div class="alert alert-info" role="alert">
                                Todas as execícios estão vinculadas ao <?= $exercises->title ?>.
                            </div>
                        </div>
                    </div>

                <?php else : ?>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Categoria</th>
                                    <th scope="col">Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($muscleGroupExerciseNotLinked as $a) : ?>
                                    <tr>
                                        <td><?= $a->muscle_group ?></td>
                                        <td>
                                            <form action="<?= url("/app/exercises/{$exercises->id}/muscle_groups"); ?>">

                                                <input type="hidden" name="action" value="add" />
                                                <input type="hidden" name="muscle_group_id" value="<?= $a->id; ?>" />

                                                <button class="btn btn-success mb-2">
                                                    <i class="fas fa-plus"></i>
                                                    <span class="d-none d-xl-inline-block">
                                                        Adicionar
                                                    </span>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>

                <?php endif; ?>

            </div>
        </div>

    </div>

    <div class="col-12 col-sm-6 mt-3">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">Remover grupo muscular do exercício <?= $exercises->title ?></h4>
            </div>
            <div class="card-body">

                <?php if (empty($muscleGroupExerciseLinked)) : ?>

                    <div class="row">
                        <div class="col-12 mt-3">
                            <div class="alert alert-info" role="alert">
                                Nenhum exercício vinculado ao treino <?= $exercises->title ?>.
                            </div>
                        </div>
                    </div>

                <?php else : ?>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Categoria</th>
                                    <th scope="col">Ação</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($muscleGroupExerciseLinked as $a) : ?>
                                    <tr>
                                        <td><?= $a->muscle_group ?></td>
                                        <td>
                                            <form action="<?= url("/app/exercises/{$exercises->id}/muscle_groups"); ?>">

                                                <input type="hidden" name="action" value="remove" />
                                                <input type="hidden" name="muscle_group_id" value="<?= $a->id; ?>" />

                                                <button class="btn btn-danger mb-2">
                                                    <i class="fas fa-minus"></i>
                                                    <span class="d-none d-xl-inline-block">
                                                        Remover
                                                    </span>
                                                </button>

                                            </form>

                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>

                <?php endif; ?>

            </div>
        </div>

    </div>

</div>

<?php $v->start("scripts"); ?>

<script src="<?= theme("/assets/js/script.js", CONF_VIEW_APP); ?>"></script>

<?php $v->end(); ?>