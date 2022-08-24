<?php $v->layout("_login"); ?>

<div class="container">
    <div class="row vh-100 justify-content-between align-items-center">
        <div class="col-12">
            <form action="<?= url("/recover/reset"); ?>" class="row row-eq-height lockscreen  mt-5 mb-5">
                <div class="lock-image col-12 col-sm-5"></div>
                <div class="login-form col-12 col-sm-7">

                    <div class="text-center">
                        <h4 class="mb-0">Para recuperar sua senha, digite uma nova.</h4>
                    </div>

                    <div class="ajax_response"><?= flash(); ?></div>

                    <input type="hidden" name="code" value="<?= $code; ?>"/>

                    <?= csrf_input(); ?>

                    <div class="form-group mb-3">
                        <label for="password">Nova Senha:</label>
                        <input class="form-control" type="password" name="password" id="password" required autofocus placeholder="Nova senha:">
                    </div>

                    <div class="form-group mb-3">
                        <label for="password_re">Repita a nova senha:</label>
                        <input class="form-control" type="password" name="password_re" id="password_re" required autofocus placeholder="Repita a nova senha:">
                    </div>

                    <div class="form-group mb-0">
                        <button class="btn btn-primary" type="submit"> Alterar sua senha </button>
                    </div>

                </div>
            </form>
        </div>

    </div>
</div>
