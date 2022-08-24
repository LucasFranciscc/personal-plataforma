<?php $v->layout("_theme"); ?>

<div class="inner-heading">
    <div class="container">
        <h1>Blogs</h1>
    </div>
</div>

<div class="inner-content">



    <!--Blog Start-->
    <div class="blog-wrap">
        <div class="container">
            <div class="row">

                <?php if (empty(!$blogs)): ?>
                <div class="col-lg-9">
                    <ul class="row">
                        <?php foreach ($blogs as $blog): ?>

                            <?php
                            setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                            $month = ucfirst( utf8_encode( strftime("%B", strtotime($blog->created_at) ) ) );
                            $day = ucfirst( utf8_encode( strftime("%e", strtotime($blog->created_at) ) ) );
                            ?>

                        <li class="col-lg-6 col-md-6">
                            <div class="blogImg"><img src="<?= image($blog->cover, 600, 340); ?>" alt=""></div>
                            <div class="blogInfo">
                                <div class="blog_dete"><?= $month ?> <span><?= $day ?></span></div>
                                <h3><a href="<?= url("blog/{$blog->uri}") ?>"><?= $blog->title ?></a></h3>
                                <p><?= $blog->subtitle ?></p>
                                <div class="readmore viewbtn">
                                    <a href="<?= url("blog/{$blog->uri}") ?>">Saber mais</a>
                                </div>
                            </div>
                        </li>
                        <?php endforeach; ?>

                    </ul>
                    <?= $paginator ?>
                </div>
                <?php else: ?>

                <div class="col-lg-9">
                    <div class="row">
                            <div class="col-12 mt-12">
                                <div class="alert alert-primary" role="alert">
                                    Não foi encontrado nenhum artigo.
                                </div>
                            </div>

                        </div>
                    </div>

                <?php endif; ?>
                <div class="col-lg-3">
                    <div class="sidebar">

                        <div class="service-details">
                            <div class="widget">
                                <h3 class="widget-title">Categories</h3>
                                <ul class="service-menu">
                                    <?php foreach ($categories as $category): ?>
                                    <li>
                                        <a href="<?= url("/blog/em/{$category->id}"); ?>"><?= $category->category ?></a>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Blog End-->

</div>
