<?php

use Source\Core\Connect;

$v->layout("_theme");
?>


<div class="row row-eq-height">
    <div class="col-12 col-md-12 mt-3">

        <div class="card">
            <div class="card-body d-md-flex text-center">

                <!-- <a href="<?= url("app/to_manager/{$student->id}"); ?>" class="btn btn-secondary font-w-600"><i class="fas fa-arrow-left"></i> Voltar para o chat</a> -->

                <a href="#" class="btn btn-primary font-w-600 my-auto text-nowrap ml-auto add-event" data-toggle="modal" data-target="#training"><i class="fa fa-plus"></i> Criar Treino</a>

            </div>
        </div>

    </div>
</div>

<div class="profile-menu mt-4 theme-background border  z-index-1 p-2">
    <div class="d-sm-flex">
        <div class="align-self-center">
            <ul class="nav nav-pills flex-column flex-sm-row" id="myTab" role="tablist">

                <li class="nav-item ml-0">
                    <a class="nav-link  py-2 px-3 px-lg-4" href="<?= url("app/to_manager/{$student->id}/training_sheet/{$trainingSheet->id}/exercises/sunday"); ?>">
                        Domingo
                    </a>
                </li>

                <li class="nav-item ml-0">
                    <a class="nav-link  py-2 px-4 px-lg-4 active" href="<?= url("app/to_manager/{$student->id}/training_sheet/{$trainingSheet->id}/exercises/monday"); ?>">
                        Segunda
                    </a>
                </li>

                <li class="nav-item ml-0">
                    <a class="nav-link py-2 px-4 px-lg-4" href="<?= url("app/to_manager/{$student->id}/training_sheet/{$trainingSheet->id}/exercises/tuesday"); ?>">
                        Terça
                    </a>
                </li>

                <li class="nav-item ml-0 mb-2 mb-sm-0">
                    <a class="nav-link py-2 px-4 px-lg-4" href="<?= url("app/to_manager/{$student->id}/training_sheet/{$trainingSheet->id}/exercises/wednesday"); ?>">
                        Quarta
                    </a>
                </li>

                <li class="nav-item ml-0 mb-2 mb-sm-0">
                    <a class="nav-link py-2 px-4 px-lg-4" href="<?= url("app/to_manager/{$student->id}/training_sheet/{$trainingSheet->id}/exercises/thursday"); ?>">
                        Quinta
                    </a>
                </li>

                <li class="nav-item ml-0 mb-2 mb-sm-0">
                    <a class="nav-link py-2 px-4 px-lg-4" href="<?= url("app/to_manager/{$student->id}/training_sheet/{$trainingSheet->id}/exercises/friday"); ?>">
                        Sexta
                    </a>
                </li>

                <li class="nav-item ml-0 mb-2 mb-sm-0">
                    <a class="nav-link py-2 px-4 px-lg-4" href="<?= url("app/to_manager/{$student->id}/training_sheet/{$trainingSheet->id}/exercises/saturday"); ?>">
                        Sábado
                    </a>
                </li>

            </ul>
        </div>

    </div>
</div>

<?php if (!empty($trainings)) : ?>

    <?php foreach ($trainings as $training) : ?>
        <div class="row">
            <div class="col-12 col-sm-12 mt-3">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title"><?= $training->name_training ?></h4>

                        <?php if ($training->status == 'active') : ?>
                            <a href="#" class="btn btn-primary font-w-600 my-auto text-nowrap ml-auto add-event" data-toggle="modal" data-target="#exercise"><i class="fa fa-plus"></i> Cadastrar Execício</a>

                            <a href="#" class="btn btn-danger font-w-600 my-auto text-nowrap ml-auto add-event" data-post="<?= url("/app/to_manager/{$student->id}/training_sheet"); ?>" data-confirm="Você deseja desativar esse treino? Desativando não terá mais volta" data-action="inactive" data-training="<?= $training->id ?>">
                                <i class="fa fa-minus">
                                </i>
                                Desativar exercício
                            </a>
                        <?php else : ?>

                        <?php endif; ?>
                    </div>
                    <div class="card-body">

                        <?php if (!empty($exercisesCreates)) : ?>

                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Exercício</th>
                                            <th scope="col">Séries</th>
                                            <th scope="col">Repetições min</th>
                                            <th scope="col">Retições máx</th>
                                            <th scope="col">Descanso</th>
                                        </tr>
                                    </thead>
                                    <tbody id="sortable">

                                        <?php foreach ($exercisesCreates as $exercisesCreate) : ?>
                                            <tr id="ordem_<?= $exercisesCreate->id ?>">
                                                <th scope="row"><?= $exercisesCreate->exercise()->title ?></th>
                                                <td><?= $exercisesCreate->series ?></td>
                                                <td><?= $exercisesCreate->minimal_repetition ?></td>
                                                <td><?= $exercisesCreate->maximum_repetition ?></td>
                                                <td><?= $exercisesCreate->rest ?></td>
                                            </tr>
                                        <?php endforeach; ?>

                                    </tbody>

                                </table>
                            </div>

                        <?php else : ?>

                        <?php endif; ?>

                    </div>
                </div>

            </div>
        </div>

    <?php endforeach; ?>

<?php else : ?>

<?php endif; ?>

<div class="modal fade" id="training" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle1">Criação de treino</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= url("app/to_manager/{$student->id}/training_sheet/{$trainingSheet->id}/exercises"); ?>">

                <div class="modal-body">

                    <div class="row">

                        <div class="card-body">
                            <div class="col-12">

                                <input type="hidden" name="action" value="create" />

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="name_training">Nome do treino</label>
                                        <input type="text" class="form-control rounded" name="name_training" id="name_training" placeholder="Nome do treino">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <div>
                                            <label for="name">Grupos musculares</label>
                                            <select multiple name="muscle_group_id[]">
                                                <?php foreach ($muscleGroups as $muscleGroup) : ?>
                                                    <option value="<?= $muscleGroup->id ?>"><?= $muscleGroup->muscle_group ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="name">Dia da semana</label>
                                        <select name="day_of_the_week">
                                            <option value="sunday">Domingo</option>
                                            <option value="monday">Segunda</option>
                                            <option value="tuesday">Terça</option>
                                            <option value="wednesday">Quarta</option>
                                            <option value="thursday">Quinta</option>
                                            <option value="friday">Sexta</option>
                                            <option value="saturday">Sábado</option>
                                        </select>
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

<div class="modal fade" id="exercise" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle1">Novo exercício</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= url("app/to_manager/{$student->id}/training_sheet/{$trainingSheet->id}/exercises"); ?>">

                <div class="modal-body">

                    <div class="row">

                        <div class="card-body">
                            <div class="col-12">

                                <input type="hidden" name="action" value="createExercise" />
                                <input type="hidden" name="training_id" value="<?= $training->id ?>" />

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="exercise_id">Nome do exercício</label>
                                        <select name="exercise_id">
                                            <?php foreach ($exercises as $exercise) : ?>
                                                <option value="<?= $exercise->exercises_id ?>"><?= $exercise->title ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="series">Séries</label>
                                        <input type="text" class="form-control rounded" name="series" id="series" placeholder="Séries">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="minimal_repetition">Repetições min</label>
                                        <input type="text" class="form-control rounded" name="minimal_repetition" id="minimal_repetition" placeholder="Repetições min">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="maximum_repetition">Retições máx</label>
                                        <input type="text" class="form-control rounded" name="maximum_repetition" id="maximum_repetition" placeholder="Retições máx">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="rest">Descanso</label>
                                        <input type="text" class="form-control rounded" name="rest" id="rest" placeholder="Descanso">
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

<!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script src="<?= theme("/assets/js/jquery.ui.touch-punch.js", CONF_VIEW_APP); ?>"></script>

<script>
    $(function() {
        $("#sortable").sortable({
            update: function() {
                var ordem_atual = $(this).sortable("serialize");
                console.log(ordem_atual);
                $.post("<?= url("app/to_manager/{$student->id}/training_sheet/{$trainingSheet->id}/exercises/order"); ?>", ordem_atual, function(retorno) {

                });
            }
        });
        $("#sortable").disableSelection();
    });
</script>


<?php $v->end(); ?>