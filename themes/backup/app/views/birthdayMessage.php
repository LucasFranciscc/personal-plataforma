<?php $v->layout("_theme"); ?>

    <div class="mce_upload" style="z-index: 997">
        <div class="mce_upload_box">
            <form class="app_form" action="<?= url("/app/blogs/create"); ?>" method="post"
                  enctype="multipart/form-data">
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
                <!--            <div class="w-sm-100 mr-auto">-->
                <!--                <h4 class="mb-0">Mensagem de Aniversário</h4>-->
                <!--            </div>-->

                <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                    <li class="breadcrumb-item"><a href="<?= url("/app/"); ?>">Home</a></li>
                    <li class="breadcrumb-item active"><a href="#">Mensagem de Aniversário</a></li>
                </ol>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title">Mensagem de Aniversário</h6>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <form action="<?= url("/app/birthday_message"); ?>" method="post">

                                    <input type="hidden" name="action" value="createAndUpdate"/>
                                    <input type="hidden" name="id"
                                           value="<?= $msg != null ? $msg->id : null ?>"/>

                                    <br>
                                    <div class="form-group">
                                        <textarea class="mce" name="msg" id="content">
                                          <?= $msg != null ? $msg->msg : null ?>
                                        </textarea>
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