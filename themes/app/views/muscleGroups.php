<?php $v->layout("_theme"); ?>

<div class="row ">
    <div class="col-12  align-self-center">
        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
            <div class="w-sm-100 mr-auto">
                <h4 class="mb-0">Grupos musculares</h4>
            </div>

            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                <li class="breadcrumb-item"><a href="<?= url("/app/"); ?>">Home</a></li>
                <li class="breadcrumb-item">Grupos musculares</li>
            </ol>
        </div>
    </div>
</div>

<?php if (!empty($muscleGroups)) : ?>

    <div class="row row-eq-height">

        <div class="col-12 col-lg-112 mt-3 ">
            <div class="card border h-100 contact-list-section">
                <div class="card-header border-bottom p-1 d-flex">

                    <form action="<?= url("/app/muscle_groups"); ?>" class="col-md-6">
                        <input type="text" name="s" value="<?= $search ?>" class="form-control border-0 p-2 w-100 h-100 contact-search" placeholder="Pesquisar ...">
                    </form>

                    <a href="#" class="bg-primary py-2 px-2 rounded ml-auto text-white w-100 text-center" data-toggle="modal" data-target="#createMuscleGroup">
                        <i class="icon-plus align-middle text-white"></i> <span class="d-none d-xl-inline-block">Adicionar
                            grupo muscular</span>
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Grupo muscular</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($muscleGroups as $muscleGroup) : ?>
                                <tr>
                                    <td>
                                        <?= $muscleGroup->muscle_group ?>
                                    </td>
                                    <td>

                                        <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#updateMuscleGroup" data-id="<?= $muscleGroup->id ?>" data-muscle_group="<?= $muscleGroup->muscle_group ?>">
                                            <i class="fa fa-pen"></i> <span class="d-none d-xl-inline-block">Editar</span>
                                        </button>

                                        <a class="btn btn-danger mb-2" style="color: white" data-confirm="Você deseja excluir esse grupo muscular?" data-post="<?= url("/app/muscle_groups/muscle_group"); ?>" data-action="delete" data-muscle_group_id="<?= $muscleGroup->id ?>">
                                            <i class="fas fa-close"></i> Excluir
                                        </a>

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
            <div class="card border h-100 contact-list-section">
                <div class="card-header border-bottom p-1 d-flex">

                    <form action="<?= url("/app/muscle_groups"); ?>">
                        <input type="text" name="s" value="<?= $search; ?>" class="form-control border-0 p-2 w-100 h-100 contact-search" placeholder="Pesquisar ...">
                    </form>

                    <a href="#" class="bg-primary py-2 px-2 rounded ml-auto text-white w-100 text-center" data-toggle="modal" data-target="#createMuscleGroup">
                        <i class="icon-plus align-middle text-white"></i> <span class="d-none d-xl-inline-block">Adicionar
                            grupo muscular</span>
                    </a>
                </div>


                <div class="row">
                    <div class="col-12 mt-12">
                        <div class="alert alert-primary text-center" role="alert">
                            Não existe grupos musculares cadastrados
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>

<?php endif; ?>

<div class="modal fade" id="createMuscleGroup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle1">Cadastrar novo grupo muscular</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= url("app/muscle_groups/muscle_group"); ?>">

                <div class="modal-body">

                    <div class="row">

                        <div class="card-body">
                            <div class="col-12">

                                <input type="hidden" name="action" value="create" />

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="muscle_group">Grupo muscular</label>
                                        <input type="text" class="form-control rounded" name="muscle_group" id="muscle_group" autofocus placeholder="Grupo muscular">
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



<div class="modal fade" id="updateMuscleGroup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle1">Editar grupo muscular</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= url("app/muscle_groups/muscle_group"); ?>">

                <div class="modal-body">

                    <div class="row">

                        <div class="card-body">
                            <div class="col-12">

                                <input type="hidden" name="action" value="update" />
                                <input type="hidden" id="id" name="id" />

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="muscle_group">Grupo muscular</label>
                                        <input type="text" class="form-control rounded" name="muscle_group" id="muscle_group" placeholder="Grupo muscular">
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
    $('#updateMuscleGroup').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var muscleGroup = button.data('muscle_group');

        var modal = $(this);
        modal.find('#id').val(id);
        modal.find('#muscle_group').val(muscleGroup);
    });

    //$("[data-remove]").click(function(e) {
    //    var clicked = $(this);
    //    var dataset = clicked.data();
    //
    //    var alert = window.confirm("Você deseja excluir esse grupo muscular?");
    //
    //    if (alert === true) {
    //
    //        $(".ajax_load").fadeIn(200).css("display", "flex").find(".ajax_load_box_title").text("Aguarde carregando...");
    //
    //        setTimeout(function() {
    //            $.post("<? //= url("/app/muscle_groups/muscle_group"); 
                            ?>//", dataset);
    //        }, 200)
    //
    //    }
    //
    //
    //});
</script>

<?php $v->end(); ?>