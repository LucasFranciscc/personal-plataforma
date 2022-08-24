<?php $v->layout("_theme"); ?>

    <div class="row ">
        <div class="col-12  align-self-center">
            <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                <div class="w-sm-100 mr-auto">
                    <h4 class="mb-0">Vídeos</h4>
                </div>

                <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                    <li class="breadcrumb-item"><a href="<?= url("/app/"); ?>">Home</a></li>
                    <li class="breadcrumb-item">Vídeos</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">

                        <div class="ml-3" style="float: right;">
                            <a class="btn btn-success" style="color: #FFFFFF" data-toggle="modal" data-target="#create"><i class="fa fa-plus"></i> Cadastrar</a>
                        </div>

                        <table id="example" class="display table dataTable table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Código do Vídeo</th>
                                <th>Tipo</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php foreach ($posture_analysis_videos as $a) : ?>
                                <tr>
                                    <td><?= $a->name ?></td>
                                    <td><?= $a->video_code ?></td>
                                    <td><?= $a->option_select ?></td>
                                    <td>

                                        <button class="btn btn-info" data-toggle="modal" data-target="#update"
                                                data-id="<?= $a->id ?>" data-video_code="<?= $a->video_code ?>"
                                                data-name="<?= $a->name ?>" data-option_select="<?= $a->option_select ?>">
                                            <i class="fa fa-edit"></i> Editar
                                        </button>
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

    <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle1">Editar Vídeo de Analise Postural</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="<?= url("app/posture_analysis_videos/update"); ?>">

                    <div class="modal-body">

                        <div class="row">

                            <div class="card-body">
                                <div class="col-12">

                                    <input type="hidden" name="action" value="update"/>
                                    <input type="hidden" id="id" name="id"/>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="name">Nome</label>
                                            <input type="text" class="form-control rounded"
                                                   name="name" id="name">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="video_code">Código do Vídeo</label>
                                            <input type="text" class="form-control rounded" name="video_code"
                                                   id="video_code">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="cabeca">Cabeça</label>
                                            <input type="radio"
                                                   name="option_select" id="cabeca" value="cabeca">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="coluna">Coluna</label>
                                            <input type="radio"
                                                   name="option_select" id="coluna" value="coluna">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="costas">Costas</label>
                                            <input type="radio"
                                                   name="option_select" id="costas" value="costas">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="ombros">Ombros</label>
                                            <input type="radio"
                                                   name="option_select" id="ombros" value="ombros">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="escapulas">Escapulas</label>
                                            <input type="radio"
                                                   name="option_select" id="escapulas" value="escapulas">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="quadril">Quadril</label>
                                            <input type="radio"
                                                   name="option_select" id="quadril" value="quadril">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="joelhos">Joelhos</label>
                                            <input type="radio"
                                                   name="option_select" id="joelhos" value="joelhos">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="tibias">Tíbias</label>
                                            <input type="radio"
                                                   name="option_select" id="tibias" value="tibias">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label for="pes">Pés</label>
                                            <input type="radio"
                                                   name="option_select" id="pes" value="pes">
                                        </div>

                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button class="btn btn-primary">Editar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle1">Cadastrar Vídeo de Analise Postural</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="<?= url("app/posture_analysis_videos/create"); ?>">

                    <div class="modal-body">

                        <div class="row">

                            <div class="card-body">
                                <div class="col-12">

                                    <input type="hidden" name="action" value="create"/>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="name">Nome</label>
                                            <input type="text" class="form-control rounded"
                                                   name="name" id="name">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="video_code">Código do Vídeo</label>
                                            <input type="text" class="form-control rounded" name="video_code"
                                                   id="video_code">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="cabeca">Cabeça</label>
                                            <input type="radio"
                                                   name="option_select" id="cabeca" value="cabeca">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="coluna">Coluna</label>
                                            <input type="radio"
                                                   name="option_select" id="coluna" value="coluna">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="costas">Costas</label>
                                            <input type="radio"
                                                   name="option_select" id="costas" value="costas">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="ombros">Ombros</label>
                                            <input type="radio"
                                                   name="option_select" id="ombros" value="ombros">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="escapulas">Escapulas</label>
                                            <input type="radio"
                                                   name="option_select" id="escapulas" value="escapulas">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="quadril">Quadril</label>
                                            <input type="radio"
                                                   name="option_select" id="quadril" value="quadril">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="joelhos">Joelhos</label>
                                            <input type="radio"
                                                   name="option_select" id="joelhos" value="joelhos">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="tibias">Tíbias</label>
                                            <input type="radio"
                                                   name="option_select" id="tibias" value="tibias">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label for="pes">Pés</label>
                                            <input type="radio"
                                                   name="option_select" id="pes" value="pes">
                                        </div>

                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button class="btn btn-success">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php $v->start("scripts"); ?>

    <script src="<?= theme("/assets/js/script.js", CONF_VIEW_APP); ?>"></script>

    <script>
        $('#update').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var videoCode = button.data('video_code');
            var name = button.data('name');
            var option = button.data('option_select');

            var modal = $(this);
            modal.find('#id').val(id);
            modal.find('#video_code').val(videoCode);
            modal.find('#name').val(name)

            if (option == "cabeca") {
                $("#cabeca").prop("checked", true);
            } else if (option == "coluna") {
                $("#coluna").prop("checked", true);
            } else if (option == "costas") {
                $("#costas").prop("checked", true);
            } else if (option == "ombros") {
                $("#ombros").prop("checked", true);
            } else if (option == "escapulas") {
                $("#escapulas").prop("checked", true);
            } else if (option == "quadril") {
                $("#quadril").prop("checked", true);
            } else if (option == "joelhos") {
                $("#joelhos").prop("checked", true);
            } else if (option == "tibias") {
                $("#tibias").prop("checked", true);
            } else if (option == "pes") {
                $("#pes").prop("checked", true);
            } else {
                $("#cabeca").prop("checked", false);
                $("#coluna").prop("checked", false);
                $("#ombros").prop("checked", false);
                $("#escapulas").prop("checked", false);
                $("#quadrilPelve").prop("checked", false);
                $("#joelhos").prop("checked", false);
                $("#tibias").prop("checked", false);
                $("#pes").prop("checked", false);
            }
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