<?php $v->layout("_theme"); ?>

<div class="row ">
    <div class="col-12  align-self-center">
        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
            <div class="w-sm-100 mr-auto">
                <h4 class="mb-0">Exercício</h4>
            </div>

            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                <li class="breadcrumb-item"><a href="<?= url(" /app/"); ?>">Home</a></li>
                <li class="breadcrumb-item"><?= $exercises->title ?></li>
            </ol>
        </div>
    </div>
</div>

<div class="row">

    <div class="card-body">
        <div class="col-12">

            <input type="hidden" name="action" value="create" />

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="title">Título</label>
                    <input type="text" class="form-control rounded" name="title" id="title" value="<?= $exercises->title ?>" autofocus placeholder="Título">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="description">Descrição</label>
                    <textarea name="description" id="description" class="form-control"><?= $exercises->description ?></textarea>

                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <iframe width="512" height="281" src="<?= url("storage/$exercises->video_code") ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>



        </div>
    </div>

    <div class="col-12 col-sm-6 mt-3">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">Grupos musculares vinculados</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>

                                <th scope="col">Grupo muscular</th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($muscleGroups as $muscleGroup) : ?>
                                <tr>
                                    <td><?= $muscleGroup->muscle_group ?></td>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

</div>

<?php $v->start("scripts"); ?>

<script src="<?= theme("/assets/js/script.js", CONF_VIEW_APP); ?>"></script>

<?php $v->end(); ?>