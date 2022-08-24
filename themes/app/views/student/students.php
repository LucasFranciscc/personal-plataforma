<?php $v->layout("_theme"); ?>

<div class="row ">
    <div class="col-12  align-self-center">
        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
            <div class="w-sm-100 mr-auto">
                <h4 class="mb-0">Alunos</h4>
            </div>

            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                <li class="breadcrumb-item"><a href="<?= url("/app/"); ?>">Home</a></li>
                <li class="breadcrumb-item">Alunos</li>
            </ol>
        </div>
    </div>
</div>


<?php if (!empty($students)) : ?>

    <div class="row row-eq-height">


        <div class="col-12 col-lg-112 mt-3 ">
            <div class="card border h-100 contact-list-section">
                <div class="card-header border-bottom p-1 d-flex">

                    <form action="<?= url("/app/students"); ?>" class="col-md-6">
                        <input type="text" name="s" value="<?= $search ?>" class="form-control border-0 p-2 w-100 h-100 contact-search" placeholder="Pesquisar ...">
                    </form>

                    <a class="bg-primary py-2 px-2 rounded ml-auto text-white w-100 text-center" data-toggle="modal" data-target="#createStudent">
                        <i class="icon-plus align-middle text-white"></i>
                        <span class="d-none d-xl-inline-block">Adicionar aluno</span>
                    </a>
                </div>



                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Nome</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Telefone</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($students as $student) : ?>
                                <tr>
                                    <th scope="row"><img src="<?= image($student->photo, 50, 50) ?>" alt="avatar" class="img-fluid rounded-circle"></th>
                                    <td><?= $student->name ?></td>
                                    <td><?= $student->email ?></td>
                                    <td class="mask-phone"><?= $student->phone ?></td>
                                    <td>

                                        <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#updateStudent" data-id="<?= $student->id ?>" data-name="<?= $student->name ?>" data-birth="<?= $student->birth ?>" data-phone="<?= $student->phone ?>" data-level="<?= $student->access_level_id ?>" data-email="<?= $student->email ?>">
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
                <div class="card-header border-bottom p-1 d-flex">

                    <form action="<?= url("/app/categories"); ?>">
                        <input type="text" name="s" value="<?= $search; ?>" class="form-control border-0 p-2 w-100 h-100 contact-search" placeholder="Pesquisar ...">
                    </form>

                    <a href="#" class="bg-primary py-2 px-2 rounded ml-auto text-white w-100 text-center" data-toggle="modal" data-target="#createCategory">
                        <i class="icon-plus align-middle text-white"></i> <span class="d-none d-xl-inline-block">Adicionar
                            categoria</span>
                    </a>
                </div>


                <div class="row">
                    <div class="col-12 mt-12">
                        <div class="alert alert-primary text-center" role="alert">
                            Não existe alunos cadastrados
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>

<?php endif; ?>

<div class="modal fade" id="createStudent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle1">Cadastrar novo Aluno</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= url("app/students/student"); ?>">

                <div class="modal-body">

                    <div class="row">

                        <div class="card-body">
                            <div class="col-12">

                                <input type="hidden" name="action" value="create" />

                                <div class="form-row">
                                    <div class="form-group col-md-7">
                                        <label for="name">Nome e sobrenome</label>
                                        <input type="text" class="form-control rounded" name="name" id="name" placeholder="Nome e sobrenome">
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label for="birth">Data de nascimento</label>
                                        <input type="date" class="form-control" id="birth" name="birth" placeholder="Data de nascimento">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="phone">Telefone</label>
                                        <input type="text" class="form-control mask-phone" id="phone" name="phone" placeholder="Telefone">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="access_level_id">Nível de acesso</label>
                                        <select id="access_level_id" name="access_level_id" class="form-control">
                                            <?php foreach ($levels as $level) : ?>
                                                <option value="<?= $level->id ?>"><?= $level->level ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="email">E-mail</label>
                                        <input type="email" class="form-control" id="email" name="email">
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





<!-- Edit Student -->

<div class="modal fade" id="updateStudent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle1">Editar Aluno</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= url("app/students/student"); ?>">

                <div class="modal-body">

                    <div class="row">

                        <div class="card-body">
                            <div class="col-12">

                                <input type="hidden" name="action" value="update" />
                                <input type="hidden" id="id" name="id" />

                                <div class="form-row">
                                    <div class="form-group col-md-7">
                                        <label for="name">Nome e sobrenome</label>
                                        <input type="text" class="form-control rounded" name="name" id="name" placeholder="Nome e sobrenome">
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label for="birth">Data de nascimento</label>
                                        <input type="date" class="form-control" id="birth" name="birth" placeholder="Data de nascimento">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="phone">Telefone</label>
                                        <input type="text" class="form-control mask-phone" id="phone" name="phone" placeholder="Telefone">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="access_level_id">Nível de acesso</label>
                                        <select id="access_level_id" name="access_level_id" class="form-control">
                                            <?php foreach ($levels as $level) : ?>
                                                <option value="<?= $level->id ?>"><?= $level->level ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="email">E-mail</label>
                                        <input type="email" class="form-control" id="email" name="email">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="password">Senha</label>
                                        <input type="password" class="form-control" id="password" name="password">
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
    $('#updateStudent').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var name = button.data('name');
        var birth = button.data('birth');
        var phone = button.data('phone');
        var level = button.data('level');
        var email = button.data('email');

        var modal = $(this);
        modal.find('#id').val(id);
        modal.find('#name').val(name);
        modal.find('#birth').val(birth);
        modal.find('#phone').val(phone);
        modal.find('#access_level_id').val(level).selected = true;
        modal.find('#email').val(email);
    });
</script>

<?php $v->end(); ?>