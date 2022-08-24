<?php

use Source\Core\Connect;

$v->layout("_theme");
?>


    <div class="row row-eq-height">
        <div class="col-12 col-md-12 mt-3">

            <div class="card">
                <div class="card-body d-md-flex text-center">

                    <!-- <a href="<?= url("app/to_manager/{$student->id}"); ?>" class="btn btn-secondary font-w-600"><i class="fas fa-arrow-left"></i> Voltar para o chat</a> -->

                    <a href="#" class="btn btn-danger font-w-600" data-toggle="modal" data-target="#trainingsInactives">
                        Treinos Desativados</a>
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

                  <?php foreach ($trainings as $a) : ?>
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

                        <a href="<?= url("/app/to_manager/{$student->id}/training_sheet"); ?>"
                           class="btn btn-outline-primary font-w-600 ml-3"><i class="fas fa-arrow-left"></i> Voltar</a>
                        <a style="color: white" class="btn btn-info font-w-600 ml-3" data-toggle="modal"
                           data-target="#updateTraining" data-training_id="<?= $training_id ?>"> Editar Treino</a>

                      <?php if ($b->status == 'active') : ?>
                          <a href="#" class="btn btn-primary font-w-600 my-auto text-nowrap ml-auto add-event"
                             data-toggle="modal" data-target="#exercise"><i class="fa fa-plus"></i> Cadastrar
                              Execício
                          </a>

                          <a href="#" class="btn btn-info font-w-600 my-auto text-nowrap ml-auto add-event"
                             data-toggle="modal" data-target="#duplicateexercise"><i class="fa fa-clone"></i> Clonar
                              Execício
                          </a>

                        <?php if (!empty($trainingsList)): ?>
                              <a href="#" class="btn btn-info font-w-600 my-auto text-nowrap ml-auto add-event"
                                 data-toggle="modal" data-target="#cloneTraining"><i class="fa fa-clone"></i> Clonar
                                  Treino
                              </a>
                        <?php endif; ?>

                          <a href="#" class="btn btn-danger font-w-600 my-auto text-nowrap ml-auto add-event"
                             data-post="<?= url("/app/to_manager/{$student->id}/training_sheet"); ?>"
                             data-confirm="Você deseja desativar esse treino?" data-action="inactive"
                             data-training="<?= $b->id ?>">
                              <i class="fa fa-minus">
                              </i>
                              Desativar Treino
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
                                    <?php if (count($exercisesCreates) > 1): ?>
                                        <th scope="col">Posição</th>
                                    <?php else: ?>
                                    <?php endif; ?>
                                      <th scope="col">Exercício</th>
                                      <th scope="col">Séries</th>
                                      <th scope="col">Repetições</th>
                                      <th scope="col">Descanso</th>
                                      <th scope="col">Método de Intensificação</th>
                                    <?php if ($b->status == 'active') : ?>
                                        <th scope="col">Ações</th>
                                    <?php else : ?>

                                    <?php endif; ?>
                                  </tr>
                                  </thead>
                                  <tbody id="sortable">


                                  <?php foreach ($exercisesCreates as $exercisesCreate) : ?>
                                      <tr id="ordem_<?= $exercisesCreate->id ?>" class="sortable-select">
                                        <?php if (count($exercisesCreates) > 1): ?>
                                            <td>
                                              <?php if ($exercisesCreate->position == 1): ?>
                                                  <a data-post="<?= url("/app/training/position") ?>"
                                                     data-position="<?= $exercisesCreate->position ?>"
                                                     data-training_id="<?= $training_id ?>" data-action="down"
                                                     class="btn btn-danger"><i
                                                              class="fa fa-angle-double-down"></i>
                                                  </a>
                                              <?php elseif ($exercisesCreate->position == $latestPosition->position): ?>
                                                  <a data-post="<?= url("/app/training/position") ?>"
                                                     data-position="<?= $exercisesCreate->position ?>"
                                                     data-training_id="<?= $training_id ?>" data-action="up"
                                                     class="btn btn-success"><i class="fa fa-angle-double-up"></i>
                                                  </a>
                                              <?php else: ?>
                                                  <a data-post="<?= url("/app/training/position") ?>"
                                                     data-position="<?= $exercisesCreate->position ?>"
                                                     data-training_id="<?= $training_id ?>" data-action="up"
                                                     class="btn btn-success"><i class="fa fa-angle-double-up"></i>
                                                  </a>
                                                  <a data-post="<?= url("/app/training/position") ?>"
                                                     data-position="<?= $exercisesCreate->position ?>"
                                                     data-training_id="<?= $training_id ?>" data-action="down"
                                                     class="btn btn-danger"><i
                                                              class="fa fa-angle-double-down"></i>
                                                  </a>
                                              <?php endif; ?>
                                            </td>
                                        <?php else: ?>
                                        <?php endif; ?>
                                          <th scope="row"><?= $exercisesCreate->exercise()->title ?></th>
                                          <td><?= $exercisesCreate->series ?>X</td>
                                          <td><?= $exercisesCreate->minimal_repetition ?></td>
                                          <td><?= $exercisesCreate->rest ?>s</td>
                                          <td>
                                            <?php $method = (new \Source\Models\IntensificationMethod())->findById($exercisesCreate->intensification_method); ?>
                                            <?= $method->intensification_method ?>
                                          </td>

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
                                                        data-observation="<?= $exercisesCreate->observation ?>"
                                                        data-intensification_method="<?= $method->id ?>">
                                                    <i class="fa fa-pen"></i> <span
                                                            class="">Editar</span>
                                                </button>

                                                <button class="btn btn-danger mb-2" style="color: white"
                                                        data-confirm="Você deseja excluir esse grupo muscular?"
                                                        data-post="<?= url("/app/trainingExercises"); ?>"
                                                        data-action="delete"
                                                        data-exercise_id="<?= $exercisesCreate->id ?>"
                                                        data-training_id="<?= $exercisesCreate->training_id ?>">
                                                    <i class="fa fa-remove"></i> Excluir
                                                </button>
                                            </td>
                                        <?php else : ?>

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
                                                <select multiple class="selectpicker form-control" id="number-multiple"
                                                        data-container="body" data-live-search="true"
                                                        data-hide-disabled="true" data-actions-box="true"
                                                        data-virtual-scroll="false" name="muscle_group_id[]">
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
                                            <select name="exercise_id" class="selectpicker form-control" id="number"
                                                    data-container="body" data-live-search="true"
                                                    data-hide-disabled="true">
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
                                            <label for="minimal_repetition">Repetições</label>
                                            <input type="text" class="form-control rounded" name="minimal_repetition"
                                                   id="minimal_repetition" placeholder="Repetições min">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="rest">Descanso</label>
                                            <input type="text" class="form-control rounded" name="rest" id="rest"
                                                   placeholder="Descanso" value="50">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="observation">Observação</label>
                                            <textarea name="observation" id="observation" rows="5"
                                                      class="form-control"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="intensification_method">Métodos de Intensificação</label>
                                            <select name="intensification_method" class="selectpicker form-control"
                                                    id="number" data-container="body" data-live-search="true"
                                                    data-hide-disabled="true">
                                              <?php foreach ($intensification_methods as $item) : ?>
                                                  <option value="<?= $item->id ?>" <?= $item->intensification_method == "Nenhum" ? "selected" : "" ?> ><?= $item->intensification_method ?></option>
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
                                            <label for="minimal_repetition">Repetições</label>
                                            <input type="text" class="form-control rounded" name="minimal_repetition"
                                                   id="minimal_repetition" placeholder="Repetições min">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="rest">Descanso</label>
                                            <input type="text" class="form-control rounded" name="rest" id="rest"
                                                   placeholder="Descanso">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="observation">Observação</label>
                                            <textarea name="observation" id="observation" rows="5"
                                                      class="form-control"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="intensification_method">Método de Intensificação</label>

                                            <select name="intensification_method" id="intensification_method"
                                                    class="selectpicker form-control"
                                                    data-live-search="true">
                                              <?php foreach ($intensification_methods as $item) : ?>
                                                  <option id="<?= $item->intensification_method ?>"
                                                          value="<?= $item->id ?>"><?= $item->intensification_method ?> </option>
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

    <div class="modal fade" id="updateTraining" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle1">Editar
                        Treino <?= $training[0]->name_training ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="<?= url("app/to_manager/{$student->id}/training_sheet/{$trainingSheet->id}/exercises/update"); ?>">

                    <div class="modal-body">

                        <div class="row">

                            <div class="card-body">
                                <div class="col-12">

                                    <input type="hidden" name="action" value="create"/>
                                    <input type="hidden" name="training_id" value="<?= $training[0]->id ?>"/>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="name_training">Nome do treino</label>
                                            <input type="text" class="form-control rounded"
                                                   value="<?= $training[0]->name_training ?>" name="name_training"
                                                   id="name_training" placeholder="Nome do treino">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <div>
                                                <label for="name">Grupos musculares</label>


                                                <select name="muscle_group_id[]" multiple
                                                        class="selectpicker form-control" id="number-multiple"
                                                        data-container="body" data-live-search="true"
                                                        data-hide-disabled="true" data-actions-box="true"
                                                        data-virtual-scroll="false" required>
                                                  <?php foreach ($muscleGroups as $muscleGroup) : ?>
                                                      <option
                                                        <?php foreach ($muscleGroupsTrainings as $muscleGroupsTraining): ?>
                                                          <?= $muscleGroupsTraining->muscle_group_id == $muscleGroup->id ? "selected" : "" ?>
                                                        <?php endforeach; ?>

                                                              value="<?= $muscleGroup->id ?>"><?= $muscleGroup->muscle_group ?></option>
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

    <div class="modal fade" id="trainingsInactives" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle1">Treinos Desativados</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                <div class="modal-body">

                  <?php if (!empty($trainingsInactives)): ?>
                      <table class="table table-striped">
                          <thead>
                          <tr>
                              <th scope="col">Treino</th>
                              <th scope="col"></th>
                          </tr>
                          </thead>
                          <tbody>
                          <?php foreach ($trainingsInactives as $trainingsInactive): ?>
                              <tr>
                                  <td><?= $trainingsInactive->name_training ?></td>
                                  <td>
                                      <a style="color: white"
                                         class="btn btn-success font-w-600 my-auto text-nowrap ml-auto add-event"
                                         data-post="<?= url("/app/to_manager/{$student->id}/training_sheet"); ?>"
                                         data-action="active" data-training="<?= $trainingsInactive->id ?>">
                                          <i class="fa fa-plus">
                                          </i>
                                          Ativar Treino
                                      </a>
                                  </td>
                              </tr>
                          <?php endforeach; ?>

                          </tbody>
                      </table>
                  <?php endif; ?>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="duplicateexercise" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1"
         aria-hidden="true">

        <div class="row">

            <div class="modal-dialog modal-dialog-centered col-6" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle1">Clonar Exercício</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="<?= url("app/clone_exercise"); ?>">

                        <div class="modal-body">

                            <div class="row">

                                <div class="card-body">
                                    <div class="col-12">

                                        <input type="hidden" name="action" value="create"/>

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="clone_exercise_id">Clonar do exercício:</label>
                                                <select name="clone_exercise_id" class="selectpicker form-control"
                                                        id="clone_exercise_id"
                                                        data-container="body" data-live-search="true"
                                                        data-hide-disabled="true">
                                                  <?php foreach ($exercisesCreates as $exercisesCreate) : ?>
                                                      <option value="<?= $exercisesCreate->id ?>"><?= $exercisesCreate->exercise()->title ?></option>
                                                  <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>


                                        <label class="mt-3">Opções a serem clonadas</label>
                                        <div class="form-row">
                                            <div class="form-group col-md-2">
                                                <label for="optionSerie">Séries</label>
                                                <input onclick="displayForm()" id="optionSerie" name="optionSerie"
                                                       type="checkbox">
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label for="optionMinimalRepetition">Repetições</label>
                                                <input onclick="displayForm()" id="optionMinimalRepetition"
                                                       name="optionMinimalRepetition"
                                                       type="checkbox">
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label for="optionrest">Descanso</label>
                                                <input onclick="displayForm()" id="optionrest" name="optionrest"
                                                       type="checkbox">
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label for="optionObservation">Observação</label>
                                                <input onclick="displayForm()" id="optionObservation"
                                                       name="optionObservation" type="checkbox">
                                            </div>

                                            <div class="form-group col-md-12">
                                                <label for="optionIntensificationMethod">Método de
                                                    Intensificação</label>
                                                <input onclick="displayForm()" id="optionIntensificationMethod"
                                                       name="optionIntensificationMethod"
                                                       type="checkbox">
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="exercise_id">Nome do exercício</label>
                                                <select name="exercise_id" class="selectpicker form-control"
                                                        id="exercise_id"
                                                        data-container="body" data-live-search="true"
                                                        data-hide-disabled="true">
                                                  <?php foreach ($exercises as $exercise) : ?>
                                                      <option value="<?= $exercise->exercises_id ?>"><?= $exercise->title ?></option>
                                                  <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-12" id="divseries" style="display: block">
                                                <label for="series">Séries</label>
                                                <input type="text" class="form-control rounded" name="series"
                                                       id="series"
                                                       placeholder="Séries">
                                            </div>

                                            <div class="form-group col-md-6" id="divminimal_repetition"
                                                 style="display: block">
                                                <label for="minimal_repetition">Repetições</label>
                                                <input type="text" class="form-control rounded"
                                                       name="minimal_repetition"
                                                       id="minimal_repetition" placeholder="Repetições min">
                                            </div>
                                        </div>

                                        <div class="form-row" id="divrest" style="display: block">
                                            <div class="form-group col-md-6">
                                                <label for="rest">Descanso</label>
                                                <input type="text" class="form-control rounded" name="rest" id="rest"
                                                       placeholder="Descanso" value="50">
                                            </div>
                                        </div>

                                        <div class="form-row" id="divobservation" style="display: block">
                                            <div class="form-group col-md-12">
                                                <label for="observation">Observação</label>
                                                <textarea name="observation" id="observation" rows="5"
                                                          class="form-control"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-row" id="divintensification_method" style="display: block">
                                            <div class="form-group col-md-12">
                                                <label for="intensification_method">Métodos de Intensificação</label>
                                                <select name="intensification_method" class="selectpicker form-control"
                                                        id="number" data-container="body" data-live-search="true"
                                                        data-hide-disabled="true">
                                                  <?php foreach ($intensification_methods as $item) : ?>
                                                      <option value="<?= $item->id ?>" <?= $item->id == 23 ? "selected" : "" ?> ><?= $item->intensification_method ?></option>
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


            <!--            <div class="modal-dialog modal-dialog-centered col-6" role="document" id="divdetail">-->
            <!--                <div class="modal-content">-->
            <!--                    <div class="modal-header">-->
            <!--                        <h5 class="modal-title" id="exampleModalLongTitle1">Clonar Exercício</h5>-->
            <!--                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
            <!--                            <span aria-hidden="true">&times;</span>-->
            <!--                        </button>-->
            <!--                    </div>-->
            <!---->
            <!---->
            <!--                    <div class="modal-body">-->
            <!---->
            <!--                        <div class="row">-->
            <!---->
            <!--                            <div class="card-body">-->
            <!--                                <div class="col-12">-->
            <!---->
            <!--                                    <div class="form-row">-->
            <!--                                        <div class="form-group col-md-6">-->
            <!--                                            <label for="series">Séries</label>-->
            <!--                                            <input type="text" class="form-control rounded" name="series" id="series">-->
            <!--                                        </div>-->
            <!--                                    </div>-->
            <!---->
            <!--                                    <div class="form-row" id="divrest" style="display: block">-->
            <!--                                        <div class="form-group col-md-6">-->
            <!--                                            <label for="minimal_repetition">Repetições</label>-->
            <!--                                            <input type="text" class="form-control rounded" name="minimal_repetition"-->
            <!--                                                   id="minimal_repetition"-->
            <!--                                                   placeholder="Descanso">-->
            <!--                                        </div>-->
            <!--                                    </div>-->
            <!---->
            <!--                                    <div class="form-row" id="divrest" style="display: block">-->
            <!--                                        <div class="form-group col-md-6">-->
            <!--                                            <label for="rest">Descanso</label>-->
            <!--                                            <input type="text" class="form-control rounded" name="rest" id="rest"-->
            <!--                                                   placeholder="Descanso" value="50">-->
            <!--                                        </div>-->
            <!--                                    </div>-->
            <!---->
            <!--                                    <div class="form-row" id="divobservation" style="display: block">-->
            <!--                                        <div class="form-group col-md-12">-->
            <!--                                            <label for="observation">Observação</label>-->
            <!--                                            <textarea name="observation" id="observation" rows="5"-->
            <!--                                                      class="form-control"></textarea>-->
            <!--                                        </div>-->
            <!--                                    </div>-->
            <!---->
            <!--                                    <div class="form-row" id="divobservation" style="display: block">-->
            <!--                                        <div class="form-group col-md-12">-->
            <!--                                            <label for="intensification_method">Método de Intensificação</label>-->
            <!--                                            <textarea name="intensification_method" id="intensification_method" rows="5"-->
            <!--                                                      class="form-control"></textarea>-->
            <!--                                        </div>-->
            <!--                                    </div>-->
            <!---->
            <!--                                    <div class="form-row" id="divrest" style="display: block">-->
            <!--                                        <div class="form-group col-md-6">-->
            <!--                                            <label for="intensification_method">Método de Intensificação</label>-->
            <!--                                            <input type="text" class="form-control rounded"-->
            <!--                                                   name="intensification_method" id="intensification_method"-->
            <!--                                                   placeholder="Descanso" value="50">-->
            <!--                                        </div>-->
            <!--                                    </div>-->
            <!---->
            <!---->
            <!--                                </div>-->
            <!--                            </div>-->
            <!---->
            <!--                        </div>-->
            <!---->
            <!--                    </div>-->
            <!---->
            <!--                </div>-->
            <!--            </div>-->

        </div>
    </div>

    <div class="modal fade" id="cloneTraining" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle1">Clonar Treino</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="<?= url("app/clone_training"); ?>">

                    <div class="modal-body">

                        <div class="row">

                            <div class="card-body">
                                <div class="col-12">

                                    <input type="hidden" name="current_workout" value="<?= $training_id ?>"/>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="training_selected_id">Treino</label>
                                            <select name="training_selected_id" class="selectpicker form-control"
                                                    id="training_selected_id" data-container="body"
                                                    data-live-search="true"
                                                    data-hide-disabled="true">
                                              <?php foreach ($trainingsList as $item) : ?>
                                                  <option value="<?= $item->id ?>"><?= $item->name_training ?></option>
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

<?php $v->start("scripts"); ?>

    <script src="<?= theme("/assets/js/script.js", CONF_VIEW_APP); ?>"></script>

    <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>


    <!--    <script src="--><? //= theme("/assets/js/jquery.ui.touch-punch.js", CONF_VIEW_APP); ?><!--"></script>-->
    <script>
        //$(function () {
        //    $("#sortable").sortable({
        //        animation: 150,
        //        update: function () {
        //            var ordem_atual = $(this).sortable("serialize");
        //            $.post("<?//= url("app/to_manager/{$student->id}/training_sheet/{$trainingSheet->id}/exercises/order"); ?>//", ordem_atual, function (retorno) {
        //
        //            });
        //        }
        //    });
        //    $("#sortable").disableSelection();
        //});

        $('#updateExercise').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var title = button.data('title');
            var series = button.data('series');
            var minimal_repetition = button.data('minimal_repetition');
            var maximum_repetition = button.data('maximum_repetition');
            var rest = button.data('rest');
            var observation = button.data('observation')
            var intensification_method = button.data('intensification_method');

            // $('#intensification_method').selectpicker('val', intensification_method);

            var modal = $(this);
            modal.find('#id').val(id);
            modal.find('#title').val(title);
            modal.find('#series').val(series);
            modal.find('#minimal_repetition').val(minimal_repetition);
            modal.find('#maximum_repetition').val(maximum_repetition);
            modal.find('#rest').val(rest);
            modal.find('#observation').val(observation);
            modal.find('#intensification_method').selectpicker('val', intensification_method);

            // $("#Circuito").prop("selected", true);


        });

        function displayForm() {
            let optionSerie = document.getElementById('optionSerie');
            let optionMinimalRepetition = document.getElementById('optionMinimalRepetition');
            let optionrest = document.getElementById('optionrest');
            let optionObservation = document.getElementById('optionObservation');
            let optionIntensificationMethod = document.getElementById('optionIntensificationMethod');

            if (optionSerie.checked) {
                document.getElementById("divseries").style.display = "none";
            } else {
                document.getElementById("divseries").style.display = "block";
            }

            if (optionMinimalRepetition.checked) {
                document.getElementById("divminimal_repetition").style.display = "none";
            } else {
                document.getElementById("divminimal_repetition").style.display = "block";
            }

            if (optionrest.checked) {
                document.getElementById("divrest").style.display = "none";
            } else {
                document.getElementById("divrest").style.display = "block";
            }

            if (optionObservation.checked) {
                document.getElementById("divobservation").style.display = "none";
            } else {
                document.getElementById("divobservation").style.display = "block";
            }

            if (optionIntensificationMethod.checked) {
                document.getElementById("divintensification_method").style.display = "none";
            } else {
                document.getElementById("divintensification_method").style.display = "block";
            }

        }

    </script>


<?php $v->end(); ?>