<?php $v->layout("_theme"); ?>

<div class="row ">
    <div class="col-12  align-self-center">
        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
            <div class="w-sm-100 mr-auto">
                <h4 class="mb-0">Métodos de Intensificação</h4>
            </div>

            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                <li class="breadcrumb-item"><a href="<?= url("/app/"); ?>">Home</a></li>
                <li class="breadcrumb-item">Métodos de Intensificação</li>
            </ol>
        </div>
    </div>
</div>

<div class="row row-eq-height">
    <div class="col-12 col-md-12 mt-3">

        <div class="card">
            <div class="card-body d-md-flex text-center">

                <a href="#" class="btn btn-primary font-w-600 my-auto text-nowrap ml-auto add-event" data-toggle="modal" data-target="#create"><i class="fa fa-plus"></i> Cadastrar Método de
                    Intensificação</a>

            </div>
        </div>

    </div>
</div>

<?php if (!empty($intensification_methods)) : ?>

    <div class="row row-eq-height">

        <div class="col-12 col-lg-112 mt-3 ">
            <div class="card border h-100 contact-list-section">

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Método de Intensificação</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($intensification_methods as $item) : ?>
                                <tr>
                                    <td>
                                        <?= $item->intensification_method ?>
                                    </td>
                                    <td>

                                        <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#update" data-id="<?= $item->id ?>" data-intensification_method="<?= $item->intensification_method ?>" data-description="<?= $item->description ?>">
                                            <i class="fa fa-pen"></i> <span class="d-none d-xl-inline-block">Editar</span>
                                        </button>

                                        <a class="btn btn-danger mb-2" style="color: white" data-confirm="Você deseja excluir esse método de itensificação?" data-post="<?= url("/app/intensification_methods"); ?>" data-action="delete" data-id="<?= $item->id ?>">
                                            <i class="fas fa-close"></i> Excluir
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

<?php else : ?>

    <div class="row row-eq-height">

        <div class="col-12 col-lg-112 mt-3 ">


            <div class="row">
                <div class="col-12 mt-12">
                    <div class="alert alert-primary text-center" role="alert">
                        Não existem métodos de intensificação cadastrados.
                    </div>
                </div>
            </div>


        </div>

    </div>

<?php endif; ?>

<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle1">Cadastrar Método de Intensificação</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= url("app/intensification_methods"); ?>">

                <div class="modal-body">

                    <div class="row">

                        <div class="card-body">
                            <div class="col-12">

                                <input type="hidden" name="action" value="create" />

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="intensification_method">Método de Intesificação</label>
                                        <input type="text" class="form-control rounded" name="intensification_method" id="intensification_method" placeholder="Método de Intesificação">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="description">Descrição</label>
                                        <textarea name="description" id="description" class="form-control"></textarea>

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

<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle1">Editar Método de Intensificação</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= url("app/intensification_methods"); ?>">

                <div class="modal-body">

                    <div class="row">

                        <div class="card-body">
                            <div class="col-12">

                                <input type="hidden" name="action" value="update" />
                                <input type="hidden" id="id" name="id" />

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="intensification_method">Método de Intesificação</label>
                                        <input type="text" class="form-control rounded" name="intensification_method" id="intensification_method" placeholder="Método de Intesificação">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="description">Descrição</label>
                                        <textarea name="description" id="description" class="form-control"></textarea>

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
    $('#update').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var intensification_method = button.data('intensification_method');
        var description = button.data('description');

        var modal = $(this);
        modal.find('#id').val(id);
        modal.find('#intensification_method').val(intensification_method);
        modal.find('#description').val(description);
    });
</script>

<?php $v->end(); ?>