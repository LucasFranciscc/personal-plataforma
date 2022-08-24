<?php
$v->layout("_theme");
?>

<div class="row ">
    <div class="col-12  align-self-center">
        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
            <div class="w-sm-100 mr-auto">
                <h4 class="mb-0">Imagens</h4>
            </div>

            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                <li class="breadcrumb-item"><a href="<?= url("/app/"); ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?= url("/app/to_manager/{$student->id}"); ?>">Chat</a></li>
                <li class="breadcrumb-item">Imagens</li>
            </ol>
        </div>
    </div>
</div>

<div class="row row-eq-height">
    <div class="col-12 col-md-12 mt-3">

        <div class="card">
            <div class="card-body d-md-flex text-center">

                <a href="<?= url("app/to_manager/{$student->id}/chat"); ?>" class="btn btn-secondary font-w-600"><i class="fas fa-arrow-left"></i> Voltar para o chat</a>

                <a href="#" class="btn btn-primary font-w-600 my-auto text-nowrap ml-auto add-event" data-toggle="modal" data-target="#createphoto"><i class="fa fa-plus"></i> Enviar Imagem</a>

            </div>
        </div>

    </div>
</div>

<?php if (!empty($photos)) : ?>

    <div class="row row-eq-height">
        <div class="col-12 col-sm-12 mt-3">
            <div class="card">

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Enviado</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($photos as $photo) : ?>
                                    <tr>
                                        <td>
                                            <img src="<?= image($photo->upload, 60, 100) ?>" alt="avatar" class="user-image img-fluid">
                                        </td>
                                        <td>Imagem</td>
                                        <td><?= date_fmt($photo->created_at) ?></td>
                                        <td>

                                            <a class="btn btn-success mb-2" href="<?= url("/storage/{$photo->upload}"); ?>" style="color: white;" download>
                                                <i class="fas fa-download"></i> <span class="d-none d-xl-inline-block">Download</span>
                                            </a>

                                            <a class="btn btn-danger mb-2" data-post="<?= url("/app/chat-get/{$photo->id}/file"); ?>" data-confirm="Tem certeza que deseja deletar essa imagem?" data-action="remove" data-upload="<?= $photo->id ?>" style="color: white;">
                                                <i class=" fa fa-trash"></i> <span class="d-none d-xl-inline-block">Excluir</span>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                        <?= $paginator ?>
                    </div>
                </div>
            </div>

        </div>
    </div>

<?php else : ?>

<?php endif; ?>

<div class="modal fade" id="createphoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle1">Enviar Imagem</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= url("app/chat-get/{$student->id}/file"); ?>">

                <div class="modal-body">

                    <div class="row">

                        <div class="card-body">
                            <div class="col-12">

                                <input type="hidden" name="action" value="photo" />

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <input id="photo" name="photo" type="file" class="custom-file-input file">
                                        <label for="customFile" class="custom-file-label">Enviar imagem</label>
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

<?php $v->start("scripts"); ?>

<script src="<?= theme("/assets/js/script.js", CONF_VIEW_APP); ?>"></script>

<?php $v->end(); ?>