<?php $v->layout("_theme"); ?>

    <div class="row ">
        <div class="col-12  align-self-center">
            <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                <div class="w-sm-100 mr-auto">
                    <h4 class="mb-0">Categorias</h4>
                </div>

                <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                    <li class="breadcrumb-item"><a href="<?= url("/app/"); ?>">Home</a></li>
                    <li class="breadcrumb-item">Categorias</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="row row-eq-height">
        <div class="col-12 col-md-12 mt-3">

            <div class="card">
                <div class="card-body d-md-flex text-center">

                    <!--                <form action="--><? //= url("/app/blog_categories"); ?><!--">-->
                    <!--                    <div class="  d-flex  ">-->
                    <!--                        <input type="text" class="form-control col-md-12" placeholder="Pesquisar ..." name="s" value="-->
                    <? //= $search ?><!--" />-->
                    <!--                        <button class="btn btn-primary font-w-600 " style="position: initial; line-height: 15px; margin-left: 5px">-->
                    <!--                            <i class="fas fa-search align-middle"></i>-->
                    <!--                        </button>-->
                    <!--                    </div>-->
                    <!--                </form>-->

                    <a href="#" class="btn btn-primary font-w-600 my-auto text-nowrap ml-auto add-event"
                       data-toggle="modal" data-target="#createCategory"><i class="fa fa-plus"></i> Cadastrar Categoria</a>

                </div>
            </div>

        </div>
    </div>

<?php if (!empty($categories)) : ?>

    <div class="row row-eq-height">

        <div class="col-12 col-lg-112 mt-3 ">
            <div class="card border h-100 contact-list-section">


                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Categoria</th>
                            <th scope="col">Ações</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($categories as $categorie) : ?>
                            <tr>
                                <td>
                                    <?= $categorie->category ?>
                                </td>
                                <td>

                                    <button class="btn btn-primary mb-2" data-toggle="modal"
                                            data-target="#updateCategory" data-id="<?= $categorie->id ?>"
                                            data-category="<?= $categorie->category ?>">
                                        <i class="fa fa-pen"></i> <span class="d-none d-xl-inline-block">Editar</span>
                                    </button>

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


                <div class="row">
                    <div class="col-12 mt-12">
                        <div class="alert alert-primary text-center" role="alert">
                            Não existe categorias cadastradas!
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

<?php endif; ?>

    <div class="modal fade" id="createCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle1">Cadastrar Categoria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="<?= url("app/blog_categories"); ?>">

                    <div class="modal-body">

                        <div class="row">

                            <div class="card-body">
                                <div class="col-12">

                                    <input type="hidden" name="action" value="create"/>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="category">Categoria</label>
                                            <input type="text" class="form-control rounded" name="category"
                                                   id="category" autofocus="" placeholder="Categoria">
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

    <div class="modal fade" id="updateCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle1">Editar grupo muscular</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="<?= url("app/blog_categories"); ?>">

                    <div class="modal-body">

                        <div class="row">

                            <div class="card-body">
                                <div class="col-12">

                                    <input type="hidden" name="action" value="update"/>
                                    <input type="hidden" id="id" name="id"/>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="category">Categoria</label>
                                            <input type="text" class="form-control rounded" name="category"
                                                   id="category" placeholder="Categoria">
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
        $('#updateCategory').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var category = button.data('category');

            var modal = $(this);
            modal.find('#id').val(id);
            modal.find('#category').val(category);
        });
    </script>

<?php $v->end(); ?>