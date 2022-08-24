<?php $v->layout("_theme"); ?>

<div class="row ">
    <div class="col-12  align-self-center">
        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
            <div class="w-sm-100 mr-auto">
                <h4 class="mb-0">Exercicios</h4>
            </div>

            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                <li class="breadcrumb-item"><a href="<?= url(" /app/"); ?>">Home</a></li>
                <li class="breadcrumb-item">Exercicios</li>
            </ol>
        </div>
    </div>
</div>

<?php if (!empty($exercises)) : ?>

    <div class="row row-eq-height">

        <div class="col-12 col-lg-112 mt-3 ">
            <div class="card border h-100 contact-list-section">
                <div class="card-header border-bottom p-1 d-flex">

                    <form action="<?= url("/app/exercises"); ?>" class="col-md-6">
                        <input type="text" name="s" value="<?= $search ?>" class="form-control border-0 p-2 w-100 h-100 contact-search" placeholder="Pesquisar ...">
                    </form>

                    <a href="#" class="bg-primary py-2 px-2 rounded ml-auto text-white w-100 text-center" data-toggle="modal" data-target="#createExercise">
                        <i class="icon-plus align-middle text-white"></i> <span class="d-none d-xl-inline-block">Adicionar
                            execicio</span>
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Titulo</th>
                                <th scope="col">Código do vídio</th>
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

                <?= $paginator; ?>

            </div>
        </div>
    </div>

<?php else : ?>

    <div class="row row-eq-height">

        <div class="col-12 col-lg-112 mt-3 ">
            <div class="card border h-100 contact-list-section">
                <div class="card-header border-bottom p-1 d-flex">

                    <form action="<?= url("/app/exercises"); ?>">
                        <input type="text" name="s" value="<?= $search; ?>" class="form-control border-0 p-2 w-100 h-100 contact-search" placeholder="Pesquisar ...">
                    </form>

                    <a href="#" class="bg-primary py-2 px-2 rounded ml-auto text-white w-100 text-center" data-toggle="modal" data-target="#createExercise">
                        <i class="icon-plus align-middle text-white"></i> <span class="d-none d-xl-inline-block">Adicionar
                            execicio</span>
                    </a>
                </div>


                <div class="row">
                    <div class="col-12 mt-12">
                        <div class="alert alert-primary text-center" role="alert">
                            Não existe execicios cadastrados
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>

<?php endif; ?>

<div class="modal fade" id="createExercise" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle1">Cadastrar novo execicio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= url("app/exercises/exercise"); ?>">

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
</script>

<?php $v->end(); ?>