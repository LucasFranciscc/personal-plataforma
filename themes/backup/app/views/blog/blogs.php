<?php $v->layout("_theme"); ?>

    <div class="row ">
        <div class="col-12  align-self-center">
            <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                <div class="w-sm-100 mr-auto">
                    <h4 class="mb-0">Blogs</h4>
                </div>

                <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                    <li class="breadcrumb-item"><a href="<?= url("/app/"); ?>">Home</a></li>
                    <li class="breadcrumb-item">Blogs</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="row row-eq-height">
        <div class="col-12 col-md-12 mt-3">

            <div class="card">
                <div class="card-body d-md-flex text-center">

<!--                    <form action="--><?//= url("/app/blogs"); ?><!--">-->
<!--                        <div class="  d-flex  ">-->
<!--                            <input type="text" class="form-control col-md-12" placeholder="Pesquisar ..." name="s" value="--><?//= $search ?><!--" />-->
<!--                            <button class="btn btn-primary font-w-600 " style="position: initial; line-height: 15px; margin-left: 5px">-->
<!--                                <i class="fas fa-search align-middle"></i>-->
<!--                            </button>-->
<!--                        </div>-->
<!--                    </form>-->

                    <a href="<?= url("/app/blogs/create"); ?>" class="btn btn-primary font-w-600 my-auto text-nowrap ml-auto add-event"><i class="fa fa-plus"></i> Novo Blog</a>

                </div>
            </div>

        </div>
    </div>

    <div class="row ">

        <?php if (!empty($blogs)) : ?>

            <?php foreach ($blogs as $blog) : ?>

                <div class="col-12 col-lg-3 col-xl-3 mt-3">
                    <div class="card">
                        <div class="card-content">


                            <div class="card-image business-card">
                                <div class="background-image-maker"></div>
                                <div class="holder-image">
                                    <img src="<?= image($blog->cover, 260, 260) ?>" alt="" class="img-fluid" style="max-width: 75%;">
                                </div>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title mb-3 mt-2"><?= $blog->title ?></h5>
                                <p class="card-text">
                                    <b><i class="far fa-user"></i>
                                        Author
                                    </b>
                                    <br>
                                    <?= $blog->author()->name ?>
                                </p>
                                <p class="card-text">
                                    <b><i class="fas fa-clock"></i>
                                        Publicação
                                    </b>
                                    <br>
                                    <span class="mask-datetime"><?= $blog->created_at ?></span>
                                </p>

                                <div class="row mt-4 mb-3">
                                    <div class="col-5">
                                        <a class="btn btn-primary mb-2" style="color: white;" href="<?= url("/app/blogs/update/{$blog->id}"); ?>">
                                            <i class="fa fa-pen"></i> Editar
                                        </a>
                                    </div>
                                    <div class="col-5">
                                        <a class="btn btn-danger mb-2" style="color: white;" href=""
                                           data-confirm="Você deseja excluir esse blog?"
                                           data-post="<?= url("/app/blogs/delete"); ?>"
                                           data-action="delete"
                                           data-id="<?= $blog->id ?>">
                                            <i class="fas fa-cogs"></i> Excluir
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>

        <?php else : ?>



            <div class="col-12 col-lg-12 mt-3 ">

                <div class="row">
                    <div class="col-12 mt-12">
                        <div class="alert alert-primary" role="alert">
                            Não existe blogs cadastrados!
                        </div>
                    </div>

                </div>
            </div>

        <?php endif; ?>

    </div>

<?= $paginator; ?>

<?php $v->start("scripts"); ?>

<script src="<?= theme("/assets/js/script.js", CONF_VIEW_APP); ?>"></script>

<?php $v->end(); ?>
