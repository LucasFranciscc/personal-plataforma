<?php $v->layout("_theme"); ?>

<div class="inner-heading">
    <div class="container">
        <h1>DETALHES DO BLOG</h1>
    </div>
</div>

<div class="inner-content">

    <!--Blog Start-->

    <div class="blog-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="serviceWrp">
                        <div class="serviceImg"><img src="<?= image($post->cover, 1280); ?>" alt=""></div>
                        <div class="classInfo">
                            <h3>
                                <a href="#"><?= $post->title ?></a>
                            </h3>

                            <div class="author">
                                <span>
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <?= $post->author()->name ?>
                                </span>
                                <span>
                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    <?= date_fmt($post->created_at) ?>
                                </span>
                            </div>

                            <p>
                                <br />
                                <?= $post->content ?>
                            </p>

                        </div>
                    </div>
                </div>
                <div  class="col-lg-3">
                    <div class="sidebar">

                        <div class="service-details">
                            <div class="widget">
                                <h3 class="widget-title">Categorias</h3>
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
