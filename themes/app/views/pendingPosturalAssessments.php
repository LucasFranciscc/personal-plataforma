<?php $v->layout("_theme"); ?>

<div class="row ">
    <div class="col-12  align-self-center">
        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
            <div class="w-sm-100 mr-auto">
                <h4 class="mb-0">Avaliações Pendentes</h4>
            </div>

            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                <li class="breadcrumb-item"><a href="<?= url(" /app/"); ?>">Home</a></li>
                <li class="breadcrumb-item">Avaliações Pendentes</li>
            </ol>
        </div>
    </div>
</div>

<?php if (!empty($pending)): ?>

    <div class="row">
        <div class="col-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="display table dataTable table-striped table-bordered">
                            <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Nome</th>
                                <th scope="col">Data</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php foreach ($pending as $item) : ?>

                              <?php

                              $user = (new \Source\Models\User())->findById($item->user_id)

                              ?>

                                <tr>
                                    <td>
                                        <img src="<?= url("storage/" . $user->photo) ?>" alt=""
                                             class="img-fluid ml-0 mt-2  rounded-circle" width="40">
                                    </td>
                                    <td>
                                      <?= $user->name ?>
                                    </td>
                                    <td>
                                      <?= $item->creation_date ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-primary"
                                           href="<?= url("/app/to_manager/{$user->id}/postural_evaluation"); ?>">
                                            <i class="fas fa-clipboard"></i>
                                            Avaliações
                                        </a>
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
                    <span>Não existem avaliações pendentes!</span>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>

<?php $v->start("scripts"); ?>

<script src="<?= theme("/assets/js/script.js", CONF_VIEW_APP); ?>"></script>

<script>


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
