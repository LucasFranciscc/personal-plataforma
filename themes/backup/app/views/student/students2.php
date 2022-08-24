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


<div class="row row-eq-height">
    <div class="col-12 col-md-12 mt-3">

        <div class="card">
            <div class="card-body d-md-flex text-center">

                <form action="<?= url("/app/students"); ?>" method="post" enctype="multipart/form-data">
                    <div class="  d-flex  ">
                        <input type="text" class="form-control col-md-12" placeholder="Pesquisar ..." name="s" id="s" value="<?= $search ?>" autocomplete="off" />
                        <button class="btn btn-primary font-w-600 " style="position: initial; line-height: 15px; margin-left: 5px">
                            <i class="fas fa-search align-middle"></i>
                        </button>
                    </div>
                    <div id="list"></div>
                </form>

                <a href="#" class="btn btn-primary font-w-600 my-auto text-nowrap ml-auto add-event" data-toggle="modal" data-target="#createStudent"><i class="fa fa-plus"></i> Cadastrar aluno</a>


            </div>
        </div>

    </div>
</div>

<div class="row ">

    <?php if (!empty($students)) : ?>

        <?php foreach ($students as $student) : ?>

            <div class="col-12 col-lg-4 col-xl-3 mt-3">
                <div class="card">
                    <div class="card-content">


                        <div class="card-image business-card">
                            <div class="background-image-maker"></div>
                            <div class="holder-image">
                                <img src="<?= image($student->photo, 260, 260) ?>" alt="" class="img-fluid" style="max-width: 75%;">
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title mb-3 mt-2"><?= $student->name ?></h5>
                            <p class="card-text">
                                <b><i class="far fa-envelope"></i>
                                    E-mail
                                </b>
                                <br>
                                <?= $student->email ?>
                            </p>
                            <p class="card-text">
                                <b><i class="fas fa-phone"></i>
                                    Telefone
                                </b>
                                <br>
                                <span class="mask-phone"><?= $student->phone ?></span>
                            </p>
                            <div class="row mt-4 mb-3">
                                <div class="col-5">
                                    <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#updateStudent" data-id="<?= $student->id ?>" data-name="<?= $student->name ?>" data-birth="<?= $student->birth ?>" data-phone="<?= $student->phone ?>" data-cpf="<?= $student->cpf ?>" data-sex="<?= $student->sex ?>" data-level="<?= $student->access_level_id ?>" data-profession="<?= $student->profession ?>" data-email="<?= $student->email ?>" data-zip_code="<?php if (!empty($student->student_address())) : ?><?= $student->student_address()->zip_code ?><?php else : ?><?php endif ?>" data-address="<?php if (!empty($student->student_address())) : ?><?= $student->student_address()->address ?><?php else : ?><?php endif ?>" data-number="<?php if (!empty($student->student_address())) : ?><?= $student->student_address()->number ?><?php else : ?><?php endif ?>" data-complement="<?php if (!empty($student->student_address())) : ?><?= $student->student_address()->complement ?><?php else : ?><?php endif ?>" data-district="<?php if (!empty($student->student_address())) : ?><?= $student->student_address()->district ?><?php else : ?><?php endif ?>" data-state="<?php if (!empty($student->student_address())) : ?><?= $student->student_address()->state ?><?php else : ?><?php endif ?>" data-city="<?php if (!empty($student->student_address())) : ?><?= $student->student_address()->city ?><?php else : ?><?php endif ?>">
                                        <i class="fa fa-pen"></i> Editar
                                    </button>
                                </div>
                                <div class="col-7">
                                    <a class="btn btn-primary mb-2" style="color: white;" href="<?= url("app/to_manager/{$student->id}/training_sheet"); ?>">
                                        <i class="fas fa-cogs"></i> Gerenciar
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
                        Não existe alunos cadastrados
                    </div>
                </div>

            </div>
        </div>

    <?php endif; ?>

</div>

<?= $paginator; ?>

<!-- Create -->

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
                                    <div class="form-group col-md-4">
                                        <label for="cpf">CPF</label>
                                        <input type="text" class="form-control mask-doc" id="cpf" name="cpf" placeholder="CPF">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="sex">Sexo</label>
                                        <select id="sex" name="sex" class="form-control">
                                            <option value="Masculino">Masculino</option>
                                            <option value="Feminino">Feminino</option>
                                            <option value="Outro">Outro</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="profession">Profissão</label>
                                        <input type="text" class="form-control" id="profession" name="profession" placeholder="Profissão">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="email">E-mail</label>
                                        <input type="email" class="form-control" id="email" name="email">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="cep">CEP</label>
                                        <input type="text" class="form-control mask-cep" id="cep" name="zip_code" value="" placeholder="CEP" onblur="pesquisacep(this.value);">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="address">Endereço</label>
                                        <input type="text" class="form-control" id="address" name="address" placeholder="Endereço">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="district">Bairro</label>
                                        <input type="text" class="form-control" id="district" name="district" placeholder="Bairro">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="city">Cidade</label>
                                        <input type="text" class="form-control" id="city" name="city" placeholder="Cidade">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="state">Estado</label>
                                        <input type="text" class="form-control" id="state" name="state" placeholder="Estado">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="complement">Complemento</label>
                                        <input type="text" class="form-control" id="complement" name="complement" placeholder="Complemento">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="number">Número</label>
                                        <input type="text" class="form-control" id="number" name="number" placeholder="Número">
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
                                    <div class="form-group col-md-4">
                                        <label for="cpf">CPF</label>
                                        <input type="text" class="form-control mask-doc" id="cpf" name="cpf" placeholder="CPF">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="sex">Sexo</label>
                                        <select id="sex" name="sex" class="form-control">
                                            <option value="Masculino">Masculino</option>
                                            <option value="Feminino">Feminino</option>
                                            <option value="Outro">Outro</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="profession">Profissão</label>
                                        <input type="text" class="form-control" id="profession" name="profession" placeholder="Profissão">
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

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="cep">CEP</label>
                                        <input type="text" class="form-control mask-cep" id="cep" name="zip_code" value="" placeholder="CEP" onblur="pesquisacepUpdate(this.value);">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="address">Endereço</label>
                                        <input type="text" class="form-control" id="addressUpdate" name="address" placeholder="Endereço">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="district">Bairro</label>
                                        <input type="text" class="form-control" id="districtUpdate" name="district" placeholder="Bairro">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="city">Cidade</label>
                                        <input type="text" class="form-control" id="cityUpdate" name="city" placeholder="Cidade">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="state">Estado</label>
                                        <input type="text" class="form-control" id="stateUpdate" name="state" placeholder="Estado">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="complement">Complemento</label>
                                        <input type="text" class="form-control" id="complementUpdate" name="complement" placeholder="Complemento">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="number">Número</label>
                                        <input type="text" class="form-control" id="numberUpdate" name="number" placeholder="Número">
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
        var cpf = button.data('cpf');
        var sex = button.data('sex');
        var level = button.data('level');
        var profession = button.data('profession');
        var email = button.data('email');
        var zip_code = button.data('zip_code');
        var address = button.data('address');
        var number = button.data('number');
        var complement = button.data('complement');
        var district = button.data('district');
        var state = button.data('state');
        var city = button.data('city');

        var modal = $(this);
        modal.find('#id').val(id);
        modal.find('#name').val(name);
        modal.find('#birth').val(birth);
        modal.find('#phone').val(phone);
        modal.find('#cpf').val(cpf);
        modal.find('#sex').val(sex);
        modal.find('#access_level_id').val(level).selected = true;
        modal.find('#profession').val(profession);
        modal.find('#email').val(email);
        modal.find('#cep').val(zip_code);
        modal.find('#addressUpdate').val(address);
        modal.find('#numberUpdate').val(number);
        modal.find('#complementUpdate').val(complement);
        modal.find('#districtUpdate').val(district);
        modal.find('#stateUpdate').val(state);
        modal.find('#cityUpdate').val(city);
    });
</script>

<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<script>
    $(document).ready(function() {
        $('#s').keyup(function() {
            var query = $(this).val();

            if (query != '') {
                $.ajax({
                    url: "<?= url("app/search_student"); ?>",
                    method: "POST",
                    data: {
                        query: query
                    },
                    success: function(data) {
                        $('#list').fadeIn();
                        $('#list').html(data)
                    }
                });
            } else {
                $('#list').fadeOut();
                $('#list').html("");
            }
        });
        $(document).on('click', 'li', function() {
            $('#s').val($(this).text());
            $('#list').fadeOut();
        })
    })
</script>

<script type="text/javascript">
    function limpa_formulário_cep() {
        //Limpa valores do formulário de cep.
        document.getElementById('address').value = ("");
        document.getElementById('district').value = ("");
        document.getElementById('city').value = ("");
        document.getElementById('state').value = ("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('address').value = (conteudo.logradouro);
            document.getElementById('district').value = (conteudo.bairro);
            document.getElementById('city').value = (conteudo.localidade);
            document.getElementById('state').value = (conteudo.uf);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }

    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if (validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('address').value = "...";
                document.getElementById('district').value = "...";
                document.getElementById('city').value = "...";
                document.getElementById('state').value = "...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = '//viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };

    function limpa_formulário_cep_update() {
        //Limpa valores do formulário de cep.
        document.getElementById('addressUpdate').value = ("");
        document.getElementById('districtUpdate').value = ("");
        document.getElementById('cityUpdate').value = ("");
        document.getElementById('stateUpdate').value = ("");
    }

    function meu_callback_update(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('addressUpdate').value = (conteudo.logradouro);
            document.getElementById('districtUpdate').value = (conteudo.bairro);
            document.getElementById('cityUpdate').value = (conteudo.localidade);
            document.getElementById('stateUpdate').value = (conteudo.uf);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep_update();
            alert("CEP não encontrado.");
        }
    }

    function pesquisacepUpdate(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if (validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('addressUpdate').value = "...";
                document.getElementById('districtUpdate').value = "...";
                document.getElementById('cityUpdate').value = "...";
                document.getElementById('stateUpdate').value = "...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = '//viacep.com.br/ws/' + cep + '/json/?callback=meu_callback_update';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep_update();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep_update();
        }
    };
</script>

<?php $v->end(); ?>