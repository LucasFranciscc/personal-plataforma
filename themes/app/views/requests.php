<?php $v->layout("_theme"); ?>

    <div class="row ">
        <div class="col-12  align-self-center">
            <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                <div class="w-sm-100 mr-auto">
                    <h4 class="mb-0">Solicitações</h4>
                </div>

                <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                    <li class="breadcrumb-item"><a href="<?= url("/app/"); ?>">Home</a></li>
                    <li class="breadcrumb-item">Solicitações</li>
                </ol>
            </div>
        </div>
    </div>

<?php if (!empty($requests)): ?>

    <div class="row">
        <div class="col-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="display table dataTable table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Aluno</th>
                                <th>Ficha</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php foreach ($requests as $a) : ?>

                                <?php

                                $user = (new \Source\Models\User())->findById($a->user_id);
                                $token = (new \Source\Models\TrainingSheet())->findById($a->training_sheet_id);
                                $training = (new \Source\Models\Training())->find("user_id = :a and training_sheet_id = :b", "a={$a->user_id}&b={$a->training_sheet_id}")->fetch();

                                ?>

                                <tr>
                                    <td>
                                        <a href="<?= url("/app/to_manager/{$a->user_id}/training_sheet") ?>"
                                           target="_blank"><?= $user->name ?></a>
                                    </td>
                                    <td>
                                        <a href="<?= url("/app/to_manager/{$a->user_id}/training_sheet/{$a->training_sheet_id}/trainings/{$training->id}") ?>"
                                           target="_blank">
                                            <?= $token->record_name ?>
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn btn-success" style="color: #FFFFFF"
                                           data-post="<?= url("/app/requests") ?>" data-id="<?= $a->id ?>"
                                           data-action="aprovado" data-confirm="Aprovar solicitação?">
                                            <i class="fa fa-check"></i> Aprovar</a>
                                        <a class="btn btn-danger" style="color: #FFFFFF" data-toggle="modal"
                                           data-target="#rejeitado" data-id="<?= $a->id ?>" data-user_id="<?= $a->user_id ?>"><i class="fa fa-ban"></i>
                                            Rejeitar</a>
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

<?php else: ?>

    <div class="row">
        <div class="col-12 mt-3">
            <div class="card" style="background-color: #cecece">
                <div class="card-body">
                    <span>Não existe solicitações a serem aprovadas!</span>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>

    <div class="modal fade" id="rejeitado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle1">Rejeitar Solicitação</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="<?= url("app/requests"); ?>">

                    <div class="modal-body">

                        <div class="row">

                            <div class="card-body">
                                <div class="col-12">

                                    <input type="hidden" name="action" value="rejeitado"/>
                                    <input type="hidden" id="id" name="id"/>
                                    <input type="hidden" id="user_id" name="user_id"/>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="description">Descrição</label>
                                            <textarea type="text" class="form-control rounded" name="description"
                                                      id="description"></textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php $v->start("scripts"); ?>

    <script src="<?= theme("/assets/js/script.js", CONF_VIEW_APP); ?>"></script>

    <script>
        $('#rejeitado').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var user_id = button.data('user_id');

            var modal = $(this);
            modal.find('#id').val(id);
            modal.find('#user_id').val(user_id);
        });

        (function ($) {
            "use strict";
            var editor;
            $('#example').DataTable({

                responsive: true,
                "scrollY": "385px",
                "scrollCollapse": true,
                language: {
                    "sEmptyTable": "Nenhum registro encontrado",
                    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sInfoThousands": ".",
                    "sLengthMenu": "_MENU_ resultados por página",
                    "sLoadingRecords": "Carregando...",
                    "sProcessing": "Processando...",
                    "sZeroRecords": "Nenhum registro encontrado",
                    "sSearch": "Pesquisar",
                    "oPaginate": {
                        "sNext": "Próximo",
                        "sPrevious": "Anterior",
                        "sFirst": "Primeiro",
                        "sLast": "Último"
                    }
                }
            });


        })(jQuery);
    </script>

<?php $v->end(); ?>