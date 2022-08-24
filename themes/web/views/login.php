<?php $v->layout("_login"); ?>

<div class="container">
    <div class="row vh-100 justify-content-between align-items-center">
        <div class="col-12">
            <form action="<?= url("/login"); ?>" style="background-color: #f1f1f1;"
                  class="row row-eq-height lockscreen  mt-5 mb-5">
                <div class="lock-image col-12 col-sm-5"></div>
                <div class="login-form col-12 col-sm-7">

                    <div class="ajax_response"><?= flash(); ?></div>

                    <?= csrf_input(); ?>

                    <div class="form-group mb-3">
                        <label for="emailaddress">E-mail</label>
                        <input class="form-control" type="email" name="email" id="emailaddress" required autofocus
                               placeholder="E-mail" value="<?= ($cookie ?? null); ?>">
                    </div>

                    <div class="form-group mb-3">
                        <label for="password">Senha</label>
                        <input class="form-control" type="password" name="password" required id="password"
                               placeholder="Senha">
                    </div>

                    <div class="form-group mb-3">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input"
                                   id="checkbox-signin" <?= (!empty($cookie) ? "checked" : ""); ?> name="save">
                            <label class="custom-control-label" for="checkbox-signin">Lembrar de mim</label>
                        </div>
                    </div>

                    <div class="form-group mb-0">
                        <button class="btn btn-primary" type="submit"> Acessar</button>
                    </div>

                    <div class="mt-2"><a href="<?= url("/recover"); ?>">Esqueceu sua senha?</a>
                    </div>

                </div>
            </form>
        </div>

    </div>
</div>