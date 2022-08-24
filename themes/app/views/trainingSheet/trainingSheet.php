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
                        <a class="nav-link  py-2 px-3 px-lg-4  active"
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
                        <a class="nav-link  py-2 px-4 px-lg-4 "
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

    <div class="row row-eq-height">
        <div class="col-12 col-md-12 mt-3">

            <div class="card">
                <div class="card-body d-md-flex text-center">

                    <!-- <a href="<?= url("app/to_manager/{$student->id}"); ?>" class="btn btn-secondary font-w-600"><i class="fas fa-arrow-left"></i> Voltar para o chat</a> -->

                    <a href="#" class="btn btn-primary font-w-600 my-auto text-nowrap ml-auto add-event"
                       data-toggle="modal" data-target="#trainingSheet"><i class="fa fa-plus"></i> Criar ficha de treino</a>

                </div>
            </div>

        </div>
    </div>

<?php if (!empty($trainingSheets)) : ?>

    <div class="row row-eq-height">
        <div class="col-12 col-sm-12 mt-3">
            <div class="card">

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Aluno</th>
                                <th scope="col">Status</th>
                                <th scope="col">Início</th>
                                <th scope="col">Fim</th>
                                <th scope="col">Ações</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php foreach ($trainingSheets as $trainingSheet) : ?>
                                <tr>
                                    <td> <?= $trainingSheet->record_name ?> </td>
                                    <td><?= $student->name ?></td>
                                    <td><?php if ($trainingSheet->status == "active") : ?> Ativo <?php elseif ($trainingSheet->status == "inactive") : ?> Inativo <?php endif; ?></td>
                                    <td><?= date_fmt($trainingSheet->start_date, "d/m/Y") ?></td>
                                    <td><?= date_fmt($trainingSheet->end_date, "d/m/Y") ?></td>
                                    <td>

                                      <?php
                                      $training = \Source\Core\Connect::getInstance()->query("select min(id) as id from training where training_sheet_id = {$trainingSheet->id} and user_id = {$student->id}")->fetch();
                                      ?>

                                      <?php if ($trainingSheet->status != 'inactive') : ?>
                                          <a class="btn btn-success mb-2"
                                             href="<?= url("/app/to_manager/{$student->id}/training_sheet/{$trainingSheet->id}/trainings/{$training->id}"); ?>">
                                              <i class="fas fa-plus"></i> <span class="d-none d-xl-inline-block">Criar Treino</span>
                                          </a>

                                          <a class="btn btn-danger mb-2"
                                             data-post="<?= url("/app/to_manager/{$trainingSheet->id}/change_status") ?>"
                                             style="color: #fff;">
                                              <i class="fas fa-minus"></i> <span class="d-none d-xl-inline-block">Desativar Ficha</span>
                                          </a>
                                      <?php else : ?>
                                          <a class="btn btn-success mb-2"
                                             data-post="<?= url("/app/to_manager/{$trainingSheet->id}/change_status") ?>"
                                             style="color: #fff;">
                                              <i class="fas fa-plus"></i> <span class="d-none d-xl-inline-block">Ativar Ficha</span>
                                          </a>
                                      <?php endif; ?>



                                      <?php $evolution = (new \Source\Models\LoadEvolution())->find("training_sheet_id = :a", "a={$trainingSheet->id}")->fetch(); ?>

                                        <a class="btn btn-primary mb-2" data-toggle="modal" data-target="#evolucao"
                                           style="color: #FFFFFF"
                                          <?php if ($evolution != null): ?>
                                           data-id="<?= $evolution->id ?>"
                                           data-training_sheet_id="<?= $trainingSheet->id ?>"
                                           data-week_1="<?= $evolution->week_1 ?>"
                                           data-week_2="<?= $evolution->week_2 ?>"
                                           data-week_3="<?= $evolution->week_3 ?>"
                                           data-week_4="<?= $evolution->week_4 ?>"
                                           data-week_5="<?= $evolution->week_5 ?>"
                                           data-week_6="<?= $evolution->week_6 ?>"
                                           data-week_7="<?= $evolution->week_7 ?>">
                                          <?php else: ?>
                                              data-training_sheet_id="<?= $trainingSheet->id ?>">
                                          <?php endif; ?>

                                            <i class="fas fa-signal"></i> <span class="d-none d-xl-inline-block">Evolução Cargas</span>
                                        </a>

                                        <a class="btn btn-dark mb-2" data-toggle="modal" data-target="#observation"
                                           style="color: #FFFFFF"
                                           data-id="<?= $trainingSheet->id ?>"
                                           data-observation="<?= $trainingSheet->observation ?>">
                                            <i class="fas fa-search"></i> Observação</a>

                                        <!-- <a class="btn btn-danger mb-2" style="color: white;">
                                        <i class=" fa fa-trash"></i> <span class="d-none d-xl-inline-block">Criar treino</span>
                                    </a> -->
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

<?php else : ?>

<?php endif; ?>

    <div class="modal fade" id="trainingSheet" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle1">Criar Ficha</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="<?= url("app/to_manager/{$student->id}/training_sheet"); ?>">

                    <div class="modal-body">

                        <div class="row">

                            <div class="card-body">
                                <div class="col-12">

                                    <input type="hidden" name="action" value="create"/>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="name">Nome da ficha de treino</label>
                                            <input type="text" class="form-control rounded" name="name" id="name"
                                                   required placeholder="Nome da ficha de treino">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="name">Data de início</label>
                                            <input type="date" class="form-control rounded" required name="start_date"
                                                   id="start_date">
                                        </div>
                                    </div>

                                    <h5 class="modal-title" id="exampleModalLongTitle1">Criar primeiro treino</h5>
                                    <br/>


                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="name_training">Nome do treino</label>
                                            <input type="text" class="form-control rounded" name="name_training"
                                                   id="name_training" required placeholder="Nome do treino">
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

    <div class="modal fade" id="evolucao" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle1">Evolução de Cargas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="<?= url("app/evolution"); ?>">

                    <div class="modal-body">

                        <div class="row">

                            <div class="card-body">
                                <div class="col-12">

                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <div style="width: 0; border-style: solid; border-color: #00ff0e; border-width: 10px 10px 10px 10px;"></div>
                                            <label>Leve</label>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <div style="width: 0; border-style: solid; border-color: #ffd600; border-width: 10px 10px 10px 10px;"></div>
                                            <label>Moderado</label>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <div style="width: 0; border-style: solid; border-color: #ff7500; border-width: 10px 10px 10px 10px;"></div>
                                            <label>Pesado</label>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <div style="width: 0; border-style: solid; border-color: #ff0000; border-width: 10px 10px 10px 10px;"></div>
                                            <label>Muito Pesado</label>
                                        </div>

                                    </div>

                                    <input type="hidden" id="training_sheet_id" name="training_sheet_id">
                                    <input type="hidden" id="id" name="id">

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="week_1">Semana 1</label>
                                            <select id="week_1" name="week_1" class="form-control" required>
                                                <option value="Leve">Leve</option>
                                                <option value="Moderado">Moderado</option>
                                                <option value="Pesado">Pesado</option>
                                                <option value="Muito Pesado">Muito Pesado</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="week_2">Semana 2</label>
                                            <select id="week_2" name="week_2" class="form-control" required>
                                                <option value="Leve">Leve</option>
                                                <option value="Moderado">Moderado</option>
                                                <option value="Pesado">Pesado</option>
                                                <option value="Muito Pesado">Muito Pesado</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="week_3">Semana 3</label>
                                            <select id="week_3" name="week_3" class="form-control" required>
                                                <option value="Leve">Leve</option>
                                                <option value="Moderado">Moderado</option>
                                                <option value="Pesado">Pesado</option>
                                                <option value="Muito Pesado">Muito Pesado</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="week_4">Semana 4</label>
                                            <select id="week_4" name="week_4" class="form-control" required>
                                                <option value="Leve">Leve</option>
                                                <option value="Moderado">Moderado</option>
                                                <option value="Pesado">Pesado</option>
                                                <option value="Muito Pesado">Muito Pesado</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="week_5">Semana 5</label>
                                            <select id="week_5" name="week_5" class="form-control" required>
                                                <option value="Leve">Leve</option>
                                                <option value="Moderado">Moderado</option>
                                                <option value="Pesado">Pesado</option>
                                                <option value="Muito Pesado">Muito Pesado</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="week_6">Semana 6</label>
                                            <select id="week_6" name="week_6" class="form-control" required>
                                                <option value="Leve">Leve</option>
                                                <option value="Moderado">Moderado</option>
                                                <option value="Pesado">Pesado</option>
                                                <option value="Muito Pesado">Muito Pesado</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="week_7">Semana 7</label>
                                            <select id="week_7" name="week_7" class="form-control" required>
                                                <option value="Leve">Leve</option>
                                                <option value="Moderado">Moderado</option>
                                                <option value="Pesado">Pesado</option>
                                                <option value="Muito Pesado">Muito Pesado</option>
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

    <div class="modal fade" id="observation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle1">Criar Observação</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="<?= url("app/observationUpdate"); ?>">

                    <div class="modal-body">

                        <div class="row">

                            <div class="card-body">
                                <div class="col-12">

                                    <input type="hidden" name="id" id="id"/>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="observation">Observação</label>
                                            <textarea name="observation" id="observation"
                                                      class="form-control"></textarea>
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
        $('#evolucao').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var training_sheet_id = button.data('training_sheet_id');
            var week_1 = button.data('week_1');
            var week_2 = button.data('week_2');
            var week_3 = button.data('week_3');
            var week_4 = button.data('week_4');
            var week_5 = button.data('week_5');
            var week_6 = button.data('week_6');
            var week_7 = button.data('week_7');

            var modal = $(this);
            modal.find('#id').val(id);
            modal.find('#training_sheet_id').val(training_sheet_id);
            modal.find('#week_1').val(week_1).selected = true;
            modal.find('#week_2').val(week_2).selected = true;
            modal.find('#week_3').val(week_3).selected = true;
            modal.find('#week_4').val(week_4).selected = true;
            modal.find('#week_5').val(week_5).selected = true;
            modal.find('#week_6').val(week_6).selected = true;
            modal.find('#week_7').val(week_7).selected = true;

        });

        $('#observation').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var observation = button.data('observation');

            var modal = $(this);
            modal.find('#id').val(id);
            modal.find('#observation').val(observation);
        });
    </script>


    <!--    <script src="--><? //= url("/shared/app/vendors/select2/js/select2.full.min.js"); ?><!--"></script>-->

<?php $v->end(); ?>