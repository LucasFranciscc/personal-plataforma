<?php $v->layout("_theme"); ?>

<div class="row ">
    <div class="col-12  align-self-center">
        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
            <div class="w-sm-100 mr-auto">
                <h4 class="mb-0">Exercícios</h4>
            </div>

            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                <li class="breadcrumb-item"><a href="<?= url(" /app/"); ?>">Home</a></li>
                <li class="breadcrumb-item">Exercícios</li>
            </ol>
        </div>
    </div>
</div>


    <div class="row row-eq-height">
        <div class="col-12 col-md-12 mt-3">

            <div class="card">
                <div class="card-body d-md-flex text-center">

                    <a href="#" class="btn btn-primary font-w-600 my-auto text-nowrap ml-auto add-event"
                       data-toggle="modal" data-target="#createExercise"><i class="fa fa-plus"></i>
                        Cadastrar execicio
                    </a>

                </div>
            </div>

        </div>
    </div>


<?php if (!empty($exercises)): ?>

    <div class="row">
        <div class="col-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="display table dataTable table-striped table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">Titulo</th>
                                <th scope="col">Código do vídeo</th>
                                <th scope="col">Ações</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php foreach ($exercises as $exercise) : ?>
                                <tr>
                                    <td>
                                      <?= $exercise->title ?>
                                    </td>
                                    <td>
                                      <?= $exercise->video_code ?>
                                    </td>
                                    <td>

                                        <a class="btn btn-success mb-2" href="<?= url("/app/exercises/view/{$exercise->id}"); ?>">
                                            <i class="fas fa-eye"></i>
                                            <span class="d-none d-xl-inline-block">
                                                Visualizar
                                            </span>
                                        </a>

                                        <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#updateExercise" data-id="<?= $exercise->id ?>" data-title="<?= $exercise->title ?>" data-description="<?= $exercise->description ?>" data-video_code="<?= $exercise->video_code ?>">
                                            <i class="fa fa-pen"></i>
                                            <span class="d-none d-xl-inline-block">
                                                Editar
                                            </span>
                                        </button>

                                        <a class="btn btn-secondary mb-2" href="<?= url("/app/exercises/{$exercise->id}/muscle_groups"); ?>">
                                            <i class="fas fa-retweet"></i>
                                            <span class="d-none d-xl-inline-block">
                                                Vincular categorias
                                            </span>
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
                    <span>Não existem exercícios cadastrados!</span>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>


























<div class="modal fade" id="createExercise" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle1">Cadastrar novo exercício</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= url("app/exercises/exercise"); ?>" method="POST" enctype="multipart/form-data">

                <div class="modal-body">

                    <div class="row">

                        <div class="card-body">
                            <div class="col-12">

                                <input type="hidden" name="action" value="create" />

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="title">Título</label>
                                        <input type="text" class="form-control rounded" name="title" id="title" autofocus placeholder="Título">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="description">Descrição</label>
                                        <textarea name="description" id="description" class="form-control"></textarea>

                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="video_code">Código do video</label>
                                        <input type="text" class="form-control rounded" name="video_code" id="video_code" autofocus placeholder="Código do video">
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



<div class="modal fade" id="updateExercise" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle1">Editar execicio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= url("app/exercises/exercise"); ?>">

                <div class="modal-body">

                    <div class="row">

                        <div class="card-body">
                            <div class="col-12">

                                <input type="hidden" name="action" value="update" />
                                <input type="hidden" id="id" name="id" />

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="title">Título</label>
                                        <input type="text" class="form-control rounded" name="title" id="title" autofocus placeholder="Título">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="description">Descrição</label>
                                        <textarea name="description" id="description" class="form-control"></textarea>

                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="video_code">Código do video</label>
                                        <input type="text" class="form-control rounded" name="video_code" id="video_code" autofocus placeholder="Código do video">
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

<script>
    $('#updateExercise').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var title = button.data('title');
        var description = button.data('description');
        var videoCode = button.data('video_code');

        var modal = $(this);
        modal.find('#id').val(id);
        modal.find('#title').val(title);
        modal.find('#description').val(description);
        modal.find('#video_code').val(videoCode);
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