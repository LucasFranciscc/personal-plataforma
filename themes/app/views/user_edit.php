<?php $v->layout("_theme"); ?>

<div class="row ">
    <div class="col-12  align-self-center">
        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
            <div class="w-sm-100 mr-auto">
                <h4 class="mb-0">Editar perfil</h4>
            </div>

            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                <li class="breadcrumb-item"><a href="<?= url("/app/"); ?>">Home</a></li>
                <li class="breadcrumb-item active"><a href="#">Editar perfil</a></li>
            </ol>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 mt-4">
        <div class="card">
            <div class="card-header">
                <h6 class="card-title">Editar perfil</h6>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <form action="<?= url("/app/user_edit"); ?>" method="post">

                                <input type="hidden" name="action" value="update"/>
                                <input type="hidden" name="id" value="<?= \Source\Models\Auth::user()->id ?>"/>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <div class="position-relative px-3 py-5">
                                            <div class="media d-md-flex d-block">
                                                <a>
                                                    <img src="<?= image(\Source\Models\Auth::user()->photo, 1000, 1000) ?>" width="100" alt=""
                                                                 class="img-fluid rounded-circle"></a>
                                                <div class="media-body z-index-1">
                                                    <div class="pl-4">
                                                        <label for="inputAddress2">Imagem de perfil</label>
                                                        <div class="custom-file overflow-hidden">
                                                            <input accept="image/*" type="file" name="cover" placeholder="Escolher foto"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="name">Nome</label>
                                        <input type="text" class="form-control rounded" name="name" id="name"
                                               placeholder="Nome" value="<?= \Source\Models\Auth::user()->name ?>" required>
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="birth">Data de Nascimento</label>
                                        <input type="text" class="form-control rounded mask-date" name="birth" id="birth"
                                               placeholder="Nascimento" value="<?= date_fmt(\Source\Models\Auth::user()->birth, 'd/m/Y') ?>" required>
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="phone">Telefone</label>
                                        <input type="text" class="form-control rounded mask-phone" name="phone" id="phone"
                                               placeholder="Telefone" value="<?= \Source\Models\Auth::user()->phone?>" required>
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="cpf">CPF</label>
                                        <input type="text" class="form-control rounded mask-doc" name="cpf" id="cpf"
                                               placeholder="CPF" value="<?= \Source\Models\Auth::user()->cpf?>" required>
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="sex">Sexo</label>
                                        <select id="sex" name="sex" class="form-control">
                                            <?php $select = \Source\Models\Auth::user()->sex?>
                                            <option <?= $select == 'Masculino' ? "selected" : "" ?> value="Masculino">Masculino</option>
                                            <option <?= $select == 'Feminino' ? "selected" : "" ?> value="Feminino">Feminino</option>
                                            <option <?= $select == 'Outro' ? "selected" : "" ?> value="Outro">Outro</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="email">E-mail</label>
                                        <input type="text" class="form-control rounded" name="email" id="email"
                                               placeholder="E-mail" value="<?= \Source\Models\Auth::user()->email ?>" required>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="password">Senha</label>
                                        <input type="password" class="form-control rounded" name="password" id="password"
                                               placeholder="Senha">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-success">Editar</button>
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