<?php $v->layout("_theme"); ?>

    <div class="mce_upload" style="z-index: 997">
        <div class="mce_upload_box">
            <form class="app_form" action="<?= url("/app/blogs/create"); ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="upload" value="true"/>
                <label>
                    <label class="legend">Selecione uma imagem JPG ou PNG:</label>
                    <input accept="image/*" type="file" name="image" required/>
                </label>
                <button class="btn btn-blue icon-upload">Enviar Imagem</button>
            </form>
        </div>
    </div>

<div class="row ">
    <div class="col-12  align-self-center">
        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
            <div class="w-sm-100 mr-auto">
                <h4 class="mb-0">Criar blog</h4>
            </div>

            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                <li class="breadcrumb-item"><a href="<?= url("/app/"); ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?= url("/app/blogs"); ?>">Blogs</a></li>
                <li class="breadcrumb-item active"><a href="#">Criar blog</a></li>
            </ol>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 mt-4">
        <div class="card">
            <div class="card-header">
                <h6 class="card-title">Criar blog</h6>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <form action="<?= url("/app/blogs/create"); ?>" method="post">

                                <input type="hidden" name="action" value="create"/>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="title">Título</label>
                                        <input type="text" class="form-control rounded" name="title" id="title"
                                               placeholder="Título" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="subtitle">Subtítulo</label>
                                    <textarea name="subtitle" id="subtitle" class="form-control" required></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="inputAddress2">Imagem de capa</label>
                                    <div class="custom-file overflow-hidden">
                                        <input accept="image/*" type="file" name="cover" required/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="category_id">Categoria</label>
                                    <select id="category_id" name="category_id" class="form-control" required>
                                        <?php foreach ($blogCategories as $blogCategory): ?>
                                            <option value="<?= $blogCategory->id ?>"><?= $blogCategory->category ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="content">Conteúdo</label>
                                    <textarea class="mce" name="content"></textarea>
                                </div>

                                <button type="submit" class="btn btn-success">Cadastrar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $v->start("scripts"); ?>

    <script src="<?= theme("/assets/js/script.js", CONF_VIEW_APP); ?>"></script>

<?php $v->end(); ?>