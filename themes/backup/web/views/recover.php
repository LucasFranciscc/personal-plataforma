<?php $v->layout("_login"); ?>

<div class="container">
    <div class="row vh-100 justify-content-between align-items-center">
        <div class="col-12">
            <form action="<?= url("/recover"); ?>" class="row row-eq-height lockscreen  mt-5 mb-5">
                <div class="lock-image col-12 col-sm-5"></div>
                <div class="login-form col-12 col-sm-7">

                    <div class="text-center">
                        <h4 class="mb-0">Esqueceu sua senha?</h4>
                        <br>
                        <h4 class="mb-0">Digite seu e-mail para recuperar.</h4>
                    </div>

                    <div class="ajax_response"><?= flash(); ?></div>

                    <?= csrf_input(); ?>

                    <div class="form-group mb-3">
                        <label for="emailaddress">E-mail</label>
                        <input class="form-control" type="email" name="email" id="emailaddress" required autofocus placeholder="E-mail">
                    </div>

                    <div class="form-group mb-0">
                        <button class="btn btn-primary" type="submit"> Recuperar </button>
                    </div>

                </div>
            </form>
        </div>

    </div>
</div>
