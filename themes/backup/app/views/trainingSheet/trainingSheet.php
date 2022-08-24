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

                    <li class="nav-item ml-0">
                        <a href="<?= url("/editor?user_id={$student->id}"); ?>"
                           class="btn btn-success font-w-600 my-auto text-nowrap ml-auto add-event"><i
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

                                      <?php if ($trainingSheet->status != 'inactive'): ?>
                                          <a class="btn btn-success mb-2"
                                             href="<?= url("/app/to_manager/{$student->id}/training_sheet/{$trainingSheet->id}/trainings/{$training->id}"); ?>">
                                              <i class="fas fa-plus"></i> <span class="d-none d-xl-inline-block">Criar Treino</span>
                                          </a>
                                      <?php else: ?>

                                      <?php endif; ?>

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
                                                <select multiple name="muscle_group_id[]" required>
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

<?php $v->start("scripts"); ?>

    <script src="<?= theme("/assets/js/script.js", CONF_VIEW_APP); ?>"></script>

<?php $v->end(); ?>