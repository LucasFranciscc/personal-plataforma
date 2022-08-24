<?php $v->layout("_theme"); ?>

    <div class="row ">
        <div class="col-12  align-self-center">
            <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                <div class="w-sm-100 mr-auto">
                    <h4 class="mb-0">Depoimentos</h4>
                </div>

                <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                    <li class="breadcrumb-item"><a href="<?= url("/app/"); ?>">Home</a></li>
                    <li class="breadcrumb-item">Depoimentos</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="row row-eq-height">
        <div class="col-12 col-md-12 mt-3">

            <div class="card">
                <div class="card-body d-md-flex text-center">

                    <a href="#" class="btn btn-primary font-w-600 my-auto text-nowrap ml-auto add-event"
                       data-toggle="modal" data-target="#create"><i class="fa fa-plus"></i>
                        Cadastrar Depoimento
                    </a>

                </div>
            </div>

        </div>
    </div>

<?php if (!empty($depositions)): ?>

    <div class="row">
        <div class="col-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="display table dataTable table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Depoimento</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php foreach ($depositions as $a) : ?>
                                <tr>
                                    <td><?= $a->name ?></td>
                                    <td><?= str_limit_chars($a->testimonial, 100) ?></td>
                                    <td>

                                        <button class="btn btn-info" data-toggle="modal" data-target="#update"
                                                data-id="<?= $a->id ?>" data-testimonial="<?= $a->testimonial ?>"
                                                data-image="<?= $a->photo ?>" data-name="<?= $a->name ?>">
                                            <i class="fa fa-edit"></i> Editar
                                        </button>

                                        <button class="btn btn-danger" data-toggle="modal"
                                                data-post="<?= url("app/depositions/delete") ?>"
                                                data-confirm="Você deseja deletar esse depoimento?"
                                                data-id="<?= $a->id ?>"><i class="fa fa-times"></i> Excluir
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

<?php else: ?>

    <div class="row">
        <div class="col-12 mt-3">
            <div class="card" style="background-color: #cecece">
                <div class="card-body">
                    <span>Não existem depoimentos cadastrados!</span>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>

    <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle1">Editar Depoimento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="<?= url("app/depositions/update"); ?>">

                    <input type="hidden" id="id" name="id">

                    <div class="modal-body">

                        <div class="row">

                            <div class="card-body">
                                <div class="col-12">

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="description">Imagem</label>
                                            <div class="custom-file overflow-hidden">
                                                <input id="photo" name="photo" type="file"
                                                       class="custom-file-input file">
                                                <label for="photo" class="custom-file-label">Selecionar imagem</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="name">Nome</label>
                                            <input type="text" class="form-control rounded" name="name" id="name"
                                                   placeholder="Nome">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="testimonial">Depoimento</label>
                                            <textarea name="testimonial" id="testimonial" rows="5"
                                                      class="form-control"></textarea>
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


    <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle1">Cadastrar Depoimento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="<?= url("app/depositions/create"); ?>">

                    <div class="modal-body">

                        <div class="row">

                            <div class="card-body">
                                <div class="col-12">

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="description">Imagem</label>
                                            <div class="custom-file overflow-hidden">
                                                <input id="photo" name="photo" type="file"
                                                       class="custom-file-input file">
                                                <label for="photo" class="custom-file-label">Selecionar imagem</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="name">Nome</label>
                                            <input type="text" class="form-control rounded" name="name" id="name"
                                                   placeholder="Nome">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="testimonial">Depoimento</label>
                                            <textarea name="testimonial" id="testimonial" rows="5"
                                                      class="form-control"></textarea>
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
            var testimonial = button.data('testimonial');
            var name = button.data("name")

            var modal = $(this);
            modal.find('#id').val(id);
            modal.find('#testimonial').val(testimonial);
            modal.find('#name').val(name)
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