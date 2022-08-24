<?php $v->layout("_themeForm"); ?>

<div class="ugf-bg ufg-main-container">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="ugf-form">
                    <form action="<?= url("forms"); ?>">
                        <div class="input-block">

                            <h4>ANAMNESE</h4>
                            <p>
                                Bem vindo ao <strong>Time Edu Behring!</strong>
                                <br>
                                Para iniciarmos o seu planejamento é necessário que você responda as anamneses a
                                seguir.
                                <br>
                                <strong>
                                    LEMBRE-SE QUE SEU TREINO SERÁ PLANEJADO CONFORME SUAS RESPOSTAS,
                                    SEJA SINCERO E RESPONDA ATENTAMENTE CADA UMA:
                                </strong>
                            </p>

                            <div class="row">

                                <input type="hidden" name="user_id" value="<?= $user_id ?>" />
                                <input type="hidden" name="form" value="anamnese" />

                                <!-- Apagado -->
                                <!-- <div class="col-md-12">
                                    <div class="form-group country-select">

                                        <label for="question1">
                                            1) Você possui algum problema de saúde ou restrição?
                                        </label>

                                        <textarea name="question1" id="question1" class="form-group"></textarea>
                                    </div>
                                </div> -->

                                <div class="col-md-12">
                                    <div class="form-group country-select">

                                        <label for="question1">
                                            1) Você possui alguma lesão ou limitação muscular ou óssea? Se sim, qual?
                                        </label>

                                        <textarea name="question1" id="question1" class="form-group" required></textarea>
                                    </div>
                                </div>

                                <!-- Apagado -->
                                <!-- <div class="col-md-12">
                                    <div class="form-group country-select">

                                        <label for="question3">
                                            3) Já passou por algum procedimento cirúrgico?
                                        </label>

                                        <textarea name="question3" id="question3" class="form-group"></textarea>
                                    </div>
                                </div> -->

                                <div class="col-md-12">
                                    <div class="form-group country-select">

                                        <label for="question2">
                                            2) Você pratica ou já praticou alguma atividade física regularmente? Se sim, qual e por quanto tempo?
                                        </label>

                                        <textarea name="question2" id="question2" class="form-group" required></textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group country-select">

                                        <label for="question3">
                                            3) Segue algum plano alimentar feito por nutricionista?
                                        </label>

                                        <textarea name="question3" id="question3" class="form-group" required></textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group country-select">

                                        <label for="question4">
                                            4) Em qual local você realizará seus treinos? E quantas vezes na semana?
                                        </label>

                                        <textarea name="question4" id="question4" class="form-group" required></textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group country-select">

                                        <label for="question5">
                                            5) Quais os dois principais objetivos com o treinamento? Especifique.
                                        </label>

                                        <textarea name="question5" id="question5" class="form-group" required></textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group country-select">

                                        <label for="question6">
                                            6) Qual o tempo máximo que você tem para realizar cada sessão de treino?
                                        </label>

                                        <textarea name="question6" id="question6" class="form-group" required></textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group country-select">

                                        <label for="question7">
                                            7) Qual horário exato você pretende treinar? A academia é muito cheia nesse horário?
                                        </label>

                                        <textarea name="question7" id="question7" class="form-group" required></textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="btn">Cadastrar</button>
                                </div>


                                <!--                                    <div class="col-md-12">-->
                                <!--                                        <div class="form-group country-select">-->
                                <!--                                            <label for="quest1">-->
                                <!--                                                1) Você prática atividade física?-->
                                <!--                                            </label>-->
                                <!--                                            <div class="">-->
                                <!--                                                <span></span>-->
                                <!--                                                <select id="quest1" name="quest1"-->
                                <!--                                                        data-placeholder="Selecione uma ou mais opções" multiple-->
                                <!--                                                        class="form-control chosen-select" tabindex="8">-->
                                <!--                                                    <option value="Musculação">Musculação</option>-->
                                <!--                                                    <option value="Corrida">Corrida</option>-->
                                <!--                                                    <option value="CROSS">CROSS</option>-->
                                <!--                                                    <option value="Bike">Bike</option>-->
                                <!--                                                    <option value="Pilates">Pilates</option>-->
                                <!--                                                    <option value="Outro">Outro</option>-->
                                <!--                                                </select>-->
                                <!--                                            </div>-->
                                <!--                                        </div>-->
                                <!--                                    </div>-->
                                <!---->
                                <!--                                    <div class="col-md-12">-->
                                <!--                                        <div class="form-group country-select">-->
                                <!--                                            <label for="quest2">-->
                                <!--                                                2) Com que frequência?-->
                                <!--                                            </label>-->
                                <!--                                            <div class="">-->
                                <!--                                                <span></span>-->
                                <!--                                                <select id="quest2" name="quest2" data-placeholder="Selecione uma opção"-->
                                <!--                                                        class="form-control">-->
                                <!--                                                    <option value="Menos que três vezes">Menos que três vezes</option>-->
                                <!--                                                    <option value="Mais que três vezes">Mais que três vezes</option>-->
                                <!--                                                </select>-->
                                <!--                                            </div>-->
                                <!--                                        </div>-->
                                <!--                                    </div>-->
                                <!---->
                                <!--                                    <div class="col-md-12">-->
                                <!--                                        <div class="form-group country-select">-->
                                <!--                                            <label for="quest3">-->
                                <!--                                                3) Você possui alguma doença ou patologia? Quais.-->
                                <!--                                            </label>-->
                                <!--                                            <div class="">-->
                                <!--                                                <span></span>-->
                                <!--                                                <select id="quest3" name="quest3" data-placeholder="Selecione uma opção"-->
                                <!--                                                        class="form-control">-->
                                <!--                                                    <option value="Sim">Sim</option>-->
                                <!--                                                    <option value="Não" selected>Não</option>-->
                                <!--                                                </select>-->
                                <!--                                            </div>-->
                                <!--                                        </div>-->
                                <!--                                    </div>-->
                                <!---->
                                <!---->
                                <!--                                    <div class="col-md-12" id="questDiv3_1" style="display: none">-->
                                <!--                                        <div class="form-group country-select">-->
                                <!--                                            <label for="quest3_1">-->
                                <!--                                                3.1) Quais doenças ou patologias?-->
                                <!--                                            </label>-->
                                <!--                                            <div class="">-->
                                <!--                                                <span></span>-->
                                <!--                                                <select id="quest3_1" name="quest3_1"-->
                                <!--                                                        data-placeholder="Selecione uma opçãooo" multiple-->
                                <!--                                                        class="form-control chosen-select" tabindex="8">-->
                                <!--                                                    <option value="Hipertensão">Hipertensão</option>-->
                                <!--                                                    <option value="Diabetes">Diabetes</option>-->
                                <!--                                                    <option value="Osteoporose">Osteoporose</option>-->
                                <!--                                                    <option value="Hérnia de disco">Hérnia de disco</option>-->
                                <!--                                                </select>-->
                                <!--                                            </div>-->
                                <!---->
                                <!--                                            <label for="quest3_1_outros">-->
                                <!--                                                3.2) Outros.-->
                                <!--                                            </label>-->
                                <!---->
                                <!--                                            <textarea name="quest3_1_outros" id="quest3_1_outros"-->
                                <!--                                                      class="form-group"></textarea>-->
                                <!---->
                                <!--                                            <label for="quest3_1">-->
                                <!--                                                3.3) Anexos.-->
                                <!--                                            </label>-->
                                <!---->
                                <!--                                            <br>-->
                                <!---->
                                <!--                                            <input type="file" id="anexo1" name="anexo1" class="input-file"/>-->
                                <!--                                            <input type="file" id="anexo2" name="anexo2" class="input-file"/>-->
                                <!--                                            <input type="file" id="anexo3" name="anexo3" class="input-file"/>-->
                                <!--                                            <input type="file" id="anexo4" name="anexo4" class="input-file"/>-->
                                <!--                                            <input type="file" id="anexo5" name="anexo5" class="input-file"/>-->
                                <!--                                            <input type="file" id="anexo6" name="anexo6" class="input-file"/>-->
                                <!---->
                                <!--                                        </div>-->
                                <!--                                    </div>-->
                                <!---->
                                <!--                                    <div class="col-md-12">-->
                                <!--                                        <div class="form-group country-select">-->
                                <!--                                            <label for="quest4">-->
                                <!--                                                4) Quais seus principais objetivos com o treinamneto personalizado?-->
                                <!--                                            </label>-->
                                <!--                                            <div class="">-->
                                <!--                                                <span></span>-->
                                <!--                                                <select id="quest4" name="quest4"-->
                                <!--                                                        data-placeholder="Selecione várias opções" multiple-->
                                <!--                                                        class="form-control chosen-select" tabindex="8">-->
                                <!--                                                    <option value="Hipertrofia">Hipertrofia</option>-->
                                <!--                                                    <option value="Definição">Definição</option>-->
                                <!--                                                    <option value="Emagrecimento">Emagrecimento</option>-->
                                <!--                                                    <option value="Estilo de vida">Estilo de vida</option>-->
                                <!--                                                    <option value="Melhorar hábitos">Melhorar hábitos</option>-->
                                <!--                                                    <option value="Saúde">Saúde</option>-->
                                <!--                                                    <option value="Melhora Postural">Melhora Postural</option>-->
                                <!--                                                    <option value="Pós reabilitação">Pós reabilitação</option>-->
                                <!--                                                </select>-->
                                <!--                                            </div>-->
                                <!---->
                                <!--                                            <label for="quest4_1outros">-->
                                <!--                                                4.1) Outros.-->
                                <!--                                            </label>-->
                                <!---->
                                <!--                                            <textarea name="quest4_1outros" id="quest4_1outros"-->
                                <!--                                                      class="form-group"></textarea>-->
                                <!--                                        </div>-->
                                <!--                                    </div>-->
                                <!---->
                                <!--                                    <div class="col-md-12">-->
                                <!--                                        <div class="form-group country-select">-->
                                <!--                                            <label for="quest5">-->
                                <!--                                                5) Onde você pretende treinar?-->
                                <!--                                            </label>-->
                                <!--                                            <div class="">-->
                                <!--                                                <span></span>-->
                                <!--                                                <select id="quest5" name="quest5"-->
                                <!--                                                        data-placeholder="Selecione várias opções" multiple-->
                                <!--                                                        class="form-control chosen-select" tabindex="8">-->
                                <!--                                                    <option value="Academia">Academia</option>-->
                                <!--                                                    <option value="Academia de condominio">Academia de condominio-->
                                <!--                                                    </option>-->
                                <!--                                                    <option value="Em casa">Em casa</option>-->
                                <!--                                                    <option value="Parque/Praça">Parque/Praça</option>-->
                                <!--                                                </select>-->
                                <!--                                            </div>-->
                                <!---->
                                <!--                                            <label for="quest5_1outros">-->
                                <!--                                                5.1) Outros.-->
                                <!--                                            </label>-->
                                <!---->
                                <!--                                            <textarea name="quest5_1outros" id="quest5_1outros"-->
                                <!--                                                      class="form-group"></textarea>-->
                                <!--                                        </div>-->
                                <!--                                    </div>-->
                                <!---->
                                <!--                                    <div class="col-md-12">-->
                                <!--                                        <div class="form-group country-select">-->
                                <!---->
                                <!--                                            <label for="quest6">-->
                                <!--                                                6) Há alguma informação adicional que possa influênciar na prescrição-->
                                <!--                                                do seu treino e que você queira informar? escreva abaixo.-->
                                <!--                                            </label>-->
                                <!---->
                                <!--                                            <textarea name="quest6" id="quest6"-->
                                <!--                                                      class="form-group"></textarea>-->
                                <!---->
                                <!--                                        </div>-->
                                <!--                                    </div>-->


                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $v->start("scripts"); ?>


<script>
    $('#quest3').change(function() {
        var option = $('#quest3').find(":selected").text();

        if (option == "Sim") {
            $("#questDiv3_1").show()
        } else {
            $("#questDiv3_1").hide()
        }
    });
</script>

<?php $v->end(); ?>