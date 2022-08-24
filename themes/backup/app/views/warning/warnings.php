<?php $v->layout("_theme"); ?>

<div class="row ">
    <div class="col-12  align-self-center">
        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
            <div class="w-sm-100 mr-auto">
                <h4 class="mb-0">Avisos</h4>
            </div>

            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                <li class="breadcrumb-item"><a href="<?= url("/app/"); ?>">Home</a></li>
                <li class="breadcrumb-item">Avisos</li>
            </ol>
        </div>
    </div>
</div>

<div class="row row-eq-height">
    <div class="col-12 col-md-12 mt-3">

        <div class="card">
            <div class="card-body d-md-flex text-center">

                <form action="<?= url("/app/warnings"); ?>">
                    <div class="  d-flex  ">
                        <input type="text" class="form-control col-md-12" placeholder="Pesquisar ..." name="s" value="<?= $search ?>" />
                        <button class="btn btn-primary font-w-600 " style="position: initial; line-height: 15px; margin-left: 5px">
                            <i class="fas fa-search align-middle"></i>
                        </button>
                    </div>
                </form>

                <a href="#" class="btn btn-primary font-w-600 my-auto text-nowrap ml-auto add-event" data-toggle="modal" data-target="#createWarning"><i class="fa fa-plus"></i> Cadastrar Aviso</a>

            </div>
        </div>

    </div>
</div>

<?php if (!empty($warnings)) : ?>

    <div class="row row-eq-height">

        <div class="col-12 col-lg-112 mt-3 ">
            <div class="card border h-100 contact-list-section">

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Avisos</th>
                                <th scope="col">Postado em</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($warnings as $warning) : ?>
                                <tr>
                                    <td>
                                        <?= $warning->warning ?>
                                    </td>
                                    <td>
                                        <?= date_fmt($warning->created_at); ?>
                                    </td>
                                    <td>

                                        <div class="col-6">
                                            <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#updateWarning" data-id="<?= $warning->id ?>" data-warning="<?= $warning->warning ?>">
                                                <i class="fa fa-pen"></i> <span class="d-none d-xl-inline-block">Editar</span>
                                            </button>
                                        </div>

                                        <div class="col-6">

                                                <a class="btn btn-danger mb-2" style="color: white"
                                                   data-post="<?= url("/app/warnings/warning"); ?>"
                                                   data-action="delete"
                                                   data-confirm="Você deseja excluir esse aviso?"
                                                   data-id="<?= $warning->id; ?>">
                                                    <i class="fas fa-cogs"></i> Excluir
                                                </a>

                                        </div>

                                    </td>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>

                <?= $paginator; ?>

            </div>
        </div>
    </div>

<?php else : ?>

    <div class="row row-eq-height">

        <div class="col-12 col-lg-112 mt-3 ">


            <div class="row">
                <div class="col-12 mt-12">
                    <div class="alert alert-primary text-center" role="alert">
                        Não existe avisos cadastrados.
                    </div>
                </div>
            </div>



        </div>

    </div>

<?php endif; ?>

<div class="modal fade" id="createWarning" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle1">Cadastrar Aviso</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= url("app/warnings/warning"); ?>">

                <div class="modal-body">

                    <div class="row">

                        <div class="card-body">
                            <div class="col-12">

                                <input type="hidden" name="action" value="create" />

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="warning">Aviso</label>
                                        <textarea name="warning" id="warning" class="form-control" rows="5"></textarea>
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

<div class="modal fade" id="updateWarning" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle1">Editar Aviso</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= url("app/warnings/warning"); ?>">

                <div class="modal-body">

                    <div class="row">

                        <div class="card-body">
                            <div class="col-12">

                                <input type="hidden" name="action" value="update" />
                                <input type="hidden" id="id" name="id" />

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="warning">Aviso</label>
                                        <textarea name="warning" id="warning" class="form-control" rows="5"></textarea>
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
    $('#updateWarning').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var warning = button.data('warning');

        var modal = $(this);
        modal.find('#id').val(id);
        modal.find('#warning').val(warning);
    });
</script>

<?php $v->end(); ?>