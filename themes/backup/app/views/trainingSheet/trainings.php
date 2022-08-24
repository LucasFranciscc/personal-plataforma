<?php

use Source\Core\Connect;

$v->layout("_theme");
?>


    <div class="row row-eq-height">
        <div class="col-12 col-md-12 mt-3">

            <div class="card">
                <div class="card-body d-md-flex text-center">

                    <!-- <a href="<?= url("app/to_manager/{$student->id}"); ?>" class="btn btn-secondary font-w-600"><i class="fas fa-arrow-left"></i> Voltar para o chat</a> -->

                    <a href="#" class="btn btn-primary font-w-600 my-auto text-nowrap ml-auto add-event"
                       data-toggle="modal" data-target="#training"><i class="fa fa-plus"></i> Criar Treino</a>

                </div>
            </div>

        </div>
    </div>

    <div class="profile-menu mt-4 theme-background border  z-index-1 p-2">
        <div class="d-sm-flex">
            <div class="align-self-center">
                <ul class="nav nav-pills flex-column flex-sm-row" id="myTab" role="tablist">

                  <?php foreach ($trainings as $a): ?>
                      <li class="nav-item ml-0">
                          <a class="nav-link  py-2 px-3 px-lg-4"
                             href="<?= url("app/to_manager/{$student->id}/training_sheet/{$trainingSheet->id}/trainings/{$a->id}"); ?>">
                            <?= $a->name_training ?>
                          </a>
                      </li>
                  <?php endforeach; ?>

                </ul>
            </div>

        </div>
    </div>

<?php if (!empty($training)) : ?>

  <?php foreach ($training as $b) : ?>
        <div class="row">
            <div class="col-12 col-sm-12 mt-3">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title"><?= $b->name_training ?></h4>

                      <?php if ($b->status == 'active') : ?>
                          <a href="#" class="btn btn-primary font-w-600 my-auto text-nowrap ml-auto add-event"
                             data-toggle="modal" data-target="#exercise"><i class="fa fa-plus"></i> Cadastrar
                              Execício</a>

                          <a href="#" class="btn btn-danger font-w-600 my-auto text-nowrap ml-auto add-event"
                             data-post="<?= url("/app/to_manager/{$student->id}/training_sheet"); ?>"
                             data-confirm="Você deseja desativar esse treino?" data-action="inactive"
                             data-training="<?= $b->id ?>">
                              <i class="fa fa-minus">
                              </i>
                              Desativar Treino
                          </a>
                      <?php else : ?>
                          <a href="#" class="btn btn-success font-w-600 my-auto text-nowrap ml-auto add-event"
                             data-post="<?= url("/app/to_manager/{$student->id}/training_sheet"); ?>"
                             data-confirm="Você deseja ativar esse treino?" data-action="active"
                             data-training="<?= $b->id ?>">
                              <i class="fa fa-plus">
                              </i>
                              Ativar Treino
                          </a>
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
                                    <?php if ($b->status == 'active') : ?>
                                        <th scope="col">Ações</th>
                                    <?php else: ?>

                                    <?php endif; ?>
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

                                        <?php if ($b->status == 'active') : ?>
                                            <td>
                                                <button class="btn btn-primary mb-2" data-toggle="modal"
                                                        data-target="#updateExercise"
                                                        data-id="<?= $exercisesCreate->id ?>"
                                                        data-title="<?= $exercisesCreate->exercise()->title ?>"
                                                        data-series="<?= $exercisesCreate->series ?>"
                                                        data-minimal_repetition="<?= $exercisesCreate->minimal_repetition ?>"
                                                        data-maximum_repetition="<?= $exercisesCreate->maximum_repetition ?>"
                                                        data-rest="<?= $exercisesCreate->rest ?>"
                                                        data-intensification_method="<?= $exercisesCreate->intensification_method ?>"
                                                >
                                                    <i class="fa fa-pen"></i> <span class="d-none d-xl-inline-block">Editar</span>
                                                </button>

                                                <a class="btn btn-danger mb-2" style="color: white"
                                                   data-confirm="Você deseja excluir esse grupo muscular?"
                                                   data-post="<?= url("/app/trainingExercises"); ?>"
                                                   data-action="delete"
                                                   data-exercise_id="<?= $exercisesCreate->id ?>">
                                                    <i class="fas fa-close"></i> Excluir
                                                </a>
                                            </td>
                                        <?php else: ?>

                                        <?php endif; ?>
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

    <div class="modal fade" id="training" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1"
         aria-hidden="true">
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

                                    <input type="hidden" name="action" value="create"/>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="name_training">Nome do treino</label>
                                            <input type="text" class="form-control rounded" name="name_training"
                                                   id="name_training" placeholder="Nome do treino">
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

    <div class="modal fade" id="exercise" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1"
         aria-hidden="true">
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

                                    <input type="hidden" name="action" value="createExercise"/>
                                    <input type="hidden" name="training_id" value="<?= $training_id ?>"/>

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
                                            <input type="text" class="form-control rounded" name="series" id="series"
                                                   placeholder="Séries">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="minimal_repetition">Repetições min</label>
                                            <input type="text" class="form-control rounded" name="minimal_repetition"
                                                   id="minimal_repetition" placeholder="Repetições min">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="maximum_repetition">Retições máx</label>
                                            <input type="text" class="form-control rounded" name="maximum_repetition"
                                                   id="maximum_repetition" placeholder="Retições máx">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="rest">Descanso</label>
                                            <input type="text" class="form-control rounded" name="rest" id="rest"
                                                   placeholder="Descanso">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="intensification_method">Método de Intensificação</label>
                                            <select name="intensification_method" id="intensification_method">
                                              <?php foreach ($intensification_methods as $item) : ?>
                                                  <option value="<?= $item->id ?>"><?= $item->intensification_method ?></option>
                                              <?php endforeach; ?>
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

    <div class="modal fade" id="updateExercise" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle1">Editar Exercício</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="<?= url("app/trainingExercises"); ?>">

                    <div class="modal-body">

                        <div class="row">

                            <div class="card-body">
                                <div class="col-12">

                                    <input type="hidden" name="action" value="update"/>
                                    <input type="hidden" id="id" name="id"/>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="exercise_id">Nome do exercício</label>
                                            <input type="text" class="form-control rounded" name="title" id="title"
                                                   placeholder="Séries" disabled="">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="series">Séries</label>
                                            <input type="text" class="form-control rounded" name="series" id="series"
                                                   placeholder="Séries">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="minimal_repetition">Repetições min</label>
                                            <input type="text" class="form-control rounded" name="minimal_repetition"
                                                   id="minimal_repetition" placeholder="Repetições min">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="maximum_repetition">Retições máx</label>
                                            <input type="text" class="form-control rounded" name="maximum_repetition"
                                                   id="maximum_repetition" placeholder="Retições máx">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="rest">Descanso</label>
                                            <input type="text" class="form-control rounded" name="rest" id="rest"
                                                   placeholder="Descanso">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="intensification_method">Método de Intensificação</label>
                                            <select name="intensification_method" id="intensification_method">
                                              <?php foreach ($intensification_methods as $item) : ?>
                                                  <option value="<?= $item->id ?>"><?= $item->intensification_method ?></option>
                                              <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Editar</button>
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
        $(function () {
            $("#sortable").sortable({
                update: function () {
                    var ordem_atual = $(this).sortable("serialize");
                    console.log(ordem_atual);
                    $.post("<?= url("app/to_manager/{$student->id}/training_sheet/{$trainingSheet->id}/exercises/order"); ?>", ordem_atual, function (retorno) {

                    });
                }
            });
            $("#sortable").disableSelection();
        });

        $('#updateExercise').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var title = button.data('title');
            var series = button.data('series');
            var minimal_repetition = button.data('minimal_repetition');
            var maximum_repetition = button.data('maximum_repetition');
            var rest = button.data('rest');
            var intensification_method = button.data('intensification_method');

            var modal = $(this);
            modal.find('#id').val(id);
            modal.find('#title').val(title);
            modal.find('#series').val(series);
            modal.find('#minimal_repetition').val(minimal_repetition);
            modal.find('#maximum_repetition').val(maximum_repetition);
            modal.find('#rest').val(rest);
            modal.find('#intensification_method').val(intensification_method).selected = true;
        });
    </script>


<?php $v->end(); ?>