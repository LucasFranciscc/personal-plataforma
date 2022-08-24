<?php $v->layout("_theme"); ?>

    <div class="row ">
        <div class="col-12  align-self-center">
            <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                <div class="w-sm-100 mr-auto">
                    <h4 class="mb-0">Mensagens</h4>
                </div>

                <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                    <li class="breadcrumb-item"><a href="<?= url(" /app/"); ?>">Home</a></li>
                    <li class="breadcrumb-item">Mensagens</li>
                </ol>
            </div>
        </div>
    </div>


    <!--  <div class="row row-eq-height">-->
    <!--    <div class="col-12 col-md-12 mt-3">-->
    <!---->
    <!--      <div class="card">-->
    <!--        <div class="card-body d-md-flex text-center">-->
    <!---->
    <!--          <a href="#" class="btn btn-primary font-w-600 my-auto text-nowrap ml-auto add-event"-->
    <!--             data-toggle="modal" data-target="#createExercise"><i class="fa fa-plus"></i>-->
    <!--            Cadastrar execicio-->
    <!--          </a>-->
    <!---->
    <!--        </div>-->
    <!--      </div>-->
    <!---->
    <!--    </div>-->
    <!--  </div>-->


<?php if (!empty($messages)): ?>

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
                                <th scope="col">Ultima mensagem</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php foreach ($messages as $item) : ?>

                              <?php

                              $userLogado = \Source\Models\Auth::user();

                              $messageHistory = \Source\Core\Connect::getInstance()->query("
                                select * from messages where incoming_msg_id = {$item->incoming_msg_id} and outgoing_msg_id = {$userLogado->id} or outgoing_msg_id = {$item->incoming_msg_id} and incoming_msg_id = {$userLogado->id} order by id desc limit 1;
                              ")->fetch();

                              $user = null;

                              if ($messageHistory->incoming_msg_id == $userLogado->id) {
                                $user = \Source\Core\Connect::getInstance()->query("
                                select * from users where id = {$messageHistory->outgoing_msg_id}
                            ")->fetch();
                              } else {
                                $user = \Source\Core\Connect::getInstance()->query("
                                select * from users where id = {$messageHistory->incoming_msg_id}
                            ")->fetch();
                              }

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
                                      <?= $messageHistory->msg ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" href="<?= url("/app/to_manager/{$user->id}/chat"); ?>">
                                            <i class="fas fa-comment"></i>
                                            Chat
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
                    <span>Não existem mensagens!</span>
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