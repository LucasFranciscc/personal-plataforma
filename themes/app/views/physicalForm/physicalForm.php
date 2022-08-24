<?php $v->layout("_theme"); ?>

<div class="row ">
    <div class="col-12  align-self-center">
        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
            <div class="w-sm-100 mr-auto">
                <h4 class="mb-0">Formulário físico</h4>
            </div>

            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                <li class="breadcrumb-item"><a href="<?= url("/app/"); ?>">Home</a></li>
                <li class="breadcrumb-item">Formulário Físico</li>
            </ol>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 mt-4">
        <div class="card">
            <div class="card-header">
                <h6 class="card-title">Formulário físico</h6>
            </div>

            <div class="card-content">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <form action="<?= url("app/physical-form"); ?>">

                                <input type="hidden" name="action" value="create" />

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="category" style="margin-bottom: -10px;">1. Um médico já disse que você tinha alguns dos problemas que se seguem?</label>
                                    </div>
                                </div>

                                <div class="custom-control custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="1" name="answer-1" value="Doença cardíaca reumática">
                                    <label class="custom-control-label" for="1">Doença cardíaca reumática</label>
                                </div>

                                <div class="custom-control custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="2" name="answer-2" value="Derrame cerebral">
                                    <label class="custom-control-label" for="2">Derrame cerebral</label>
                                </div>

                                <div class="custom-control custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="3" name="answer-3" value="Doença cardíaca congênita">
                                    <label class="custom-control-label" for="3">Doença cardíaca congênita</label>
                                </div>

                                <div class="custom-control custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="4" name="answer-4" value="Batimentos cardíacos irregulares">
                                    <label class="custom-control-label" for="4">Batimentos cardíacos irregulares</label>
                                </div>

                                <div class="custom-control custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="5" name="answer-5" value="Diabetes">
                                    <label class="custom-control-label" for="5">Diabetes</label>
                                </div>

                                <div class="custom-control custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="6" name="answer-6" value="Problemas nas válvulas cardiacas">
                                    <label class="custom-control-label" for="6">Problemas nas válvulas cardiacas</label>
                                </div>

                                <div class="custom-control custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="7" name="answer-7" value="Hipertensão">
                                    <label class="custom-control-label" for="7">Hipertensão</label>
                                </div>

                                <div class="custom-control custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="8" name="answer-8" value="Murmúrios cardíacos">
                                    <label class="custom-control-label" for="8">Murmúrios cardíacos</label>
                                </div>

                                <div class="custom-control custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="9" name="answer-9" value="Câncer">
                                    <label class="custom-control-label" for="9">Câncer</label>
                                </div>

                                <div class="custom-control custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="10" name="answer-10" value="Outros">
                                    <label class="custom-control-label" for="10">Outros</label>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="11" style="margin-top: 5px;">Por favor, explique:</label>
                                        <textarea name="answer-11" id="11" class="form-control"></textarea>

                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="category" style="margin-bottom: -10px;">2. Você tem algum dos sintomas abaixo?</label>
                                    </div>
                                </div>

                                <div class="custom-control custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="12" name="answer-12" value="Dor nas costas">
                                    <label class="custom-control-label" for="12">Dor nas costas</label>
                                </div>

                                <div class="custom-control custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="13" name="answer-13" value="Dor nas articilações, tendões ou músculo">
                                    <label class="custom-control-label" for="13">Dor nas articilações, tendões ou músculo</label>
                                </div>

                                <div class="custom-control custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="14" name="answer-14" value="Doença pulmonar (asma, enfisema, outra)">
                                    <label class="custom-control-label" for="14">Doença pulmonar (asma, enfisema, outra)</label>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="15" style="margin-top: 5px;">Por favor, explique:</label>
                                        <textarea name="answer-15" id="15" class="form-control"></textarea>

                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="16" style="margin-top: 5px;">3. Liste os medicamentos que você está tomando (nome e motivo)</label>
                                        <textarea name="answer-16" id="16" class="form-control"></textarea>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="category" style="margin-bottom: -10px;">4. Algum parente próximo (pai, mãe, irmão ou irmã) teve ataque cardíaco ou outro problema relacionado com o coração antes dos 50 anos?</label>
                                    </div>
                                </div>

                                <div class="custom-control custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="17" name="answer-17" value="Sim">
                                    <label class="custom-control-label" for="17">Sim</label>
                                </div>

                                <div class="custom-control custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="18" name="answer-18" value="Não">
                                    <label class="custom-control-label" for="18">Não</label>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="category" style="margin-bottom: -10px; margin-top: 10px;">5. Algum médico disse que você tinha alguma restrição à prática de exercício físico (inclusive cirurgia)?</label>
                                    </div>
                                </div>

                                <div class="custom-control custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="19" name="answer-19" value="Sim">
                                    <label class="custom-control-label" for="19">Sim</label>
                                </div>

                                <div class="custom-control custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="20" name="answer-20" value="Não">
                                    <label class="custom-control-label" for="20">Não</label>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="21" style="margin-top: 5px;">Por favor, explique:</label>
                                        <textarea name="answer-21" id="21" class="form-control"></textarea>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="category" style="margin-bottom: -10px; margin-top: 10px;">6. Você possui algum exame médico que posso adicionar no planejamento do seu treino?</label>
                                    </div>
                                </div>

                                <div class="custom-control custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="22" name="answer-22" value="Sim">
                                    <label class="custom-control-label" for="22">Sim</label>
                                </div>

                                <div class="custom-control custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="23" name="answer-23" value="Não">
                                    <label class="custom-control-label" for="23">Não</label>
                                </div>

                                <div class="custom-control custom-control-inline">
                                    <label for="answer-24" class="file-upload btn btn-primary btn-block">
                                        <i class="fa fa-upload mr-2"></i>
                                        Anexo
                                        <input id="answer-24" type="file" name="answer-24">
                                    </label>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="category" style="margin-bottom: -10px; margin-top: 10px;">7. Você está grávida?</label>
                                    </div>
                                </div>

                                <div class="custom-control custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="25" name="answer-25" value="Sim">
                                    <label class="custom-control-label" for="25">Sim</label>
                                </div>

                                <div class="custom-control custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="26" name="answer-26" value="Não">
                                    <label class="custom-control-label" for="26">Não</label>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="category" style="margin-bottom: -10px; margin-top: 10px;">8. Você já teve alguma lesão muscular ocea ou artilcular?</label>
                                    </div>
                                </div>

                                <div class="custom-control custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="27" name="answer-27" value="Sim">
                                    <label class="custom-control-label" for="27">Sim</label>
                                </div>

                                <div class="custom-control custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="28" name="answer-28" value="Não">
                                    <label class="custom-control-label" for="28">Não</label>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="21" style="margin-top: 5px;">Por favor, explique:</label>
                                        <textarea name="answer-29" id="29" class="form-control"></textarea>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="category" style="margin-bottom: -10px; margin-top: 10px;">9. Você pratica alguma atividade física? Se sim qual?</label>
                                    </div>
                                </div>

                                <div class="custom-control custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="30" name="answer-30" value="Sim">
                                    <label class="custom-control-label" for="30">Sim</label>
                                </div>

                                <div class="custom-control custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="31" name="answer-31" value="Não">
                                    <label class="custom-control-label" for="31">Não</label>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="32" style="margin-top: 5px;">Por favor, explique:</label>
                                        <textarea name="answer-32" id="32" class="form-control"></textarea>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="category" style="margin-bottom: -10px; margin-top: 10px;">10. Você tem acompanhamento nutricional (com profissional).</label>
                                    </div>
                                </div>

                                <div class="custom-control custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="33" name="answer-33" value="Sim">
                                    <label class="custom-control-label" for="33">Sim</label>
                                </div>

                                <div class="custom-control custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="34" name="answer-34" value="Não">
                                    <label class="custom-control-label" for="34">Não</label>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="category" style="margin-bottom: -10px; margin-top: 10px;">11. Onde você vai realizar seu treino?</label>
                                    </div>
                                </div>

                                <div class="custom-control custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="35" name="answer-35" value="Academia">
                                    <label class="custom-control-label" for="35">Academia</label>
                                </div>

                                <div class="custom-control custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="36" name="answer-36" value="Clube/Estúdio/Condomínio">
                                    <label class="custom-control-label" for="36">Clube/Estúdio/Condomínio</label>
                                </div>

                                <div class="custom-control custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="37" name="answer-37" value="Praça">
                                    <label class="custom-control-label" for="37">Praça</label>
                                </div>

                                <div class="custom-control custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="38" name="answer-38" value="Casa">
                                    <label class="custom-control-label" for="38">Casa</label>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="39" style="margin-top: 5px;">12. Quantas vezes na semana você pretende treinar?</label>
                                        <textarea name="answer-39" id="39" class="form-control"></textarea>

                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="category" style="margin-bottom: -10px; margin-top: 10px;">13. Liste dois objetivos que você procura com o treinamento.</label>
                                    </div>
                                </div>

                                <div class="custom-control custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="40" name="answer-40" value="Melhorar a postura">
                                    <label class="custom-control-label" for="40">Melhorar a postura</label>
                                </div>

                                <div class="custom-control custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="41" name="answer-41" value="Emagrecer">
                                    <label class="custom-control-label" for="41">Emagrecer</label>
                                </div>

                                <div class="custom-control custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="42" name="answer-42" value="Definir">
                                    <label class="custom-control-label" for="42">Definir</label>
                                </div>

                                <div class="custom-control custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="43" name="answer-43" value="Hipertrofia">
                                    <label class="custom-control-label" for="43">Hipertrofia</label>
                                </div>

                                <div class="custom-control custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="44" name="answer-44" value="Saúde e qualidade de vida">
                                    <label class="custom-control-label" for="44">Saúde e qualidade de vida</label>
                                </div>

                                <div class="custom-control custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="45" name="answer-45" value="Performance">
                                    <label class="custom-control-label" for="45">Performance</label>
                                </div>

                                <div class="custom-control custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="46" name="answer-46" value="Outros">
                                    <label class="custom-control-label" for="46">Outros</label>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="category" style="margin-bottom: -10px; margin-top: 10px;">14. Quanto tempo você pretende passar em sua sessão de treino.</label>
                                    </div>
                                </div>

                                <div class="custom-control custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="47" name="answer-47" value="45 minutos">
                                    <label class="custom-control-label" for="47">45 minutos</label>
                                </div>

                                <div class="custom-control custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="48" name="answer-48" value="1 hora">
                                    <label class="custom-control-label" for="48">1 hora</label>
                                </div>

                                <div class="custom-control custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="49" name="answer-49" value="mais de 1 hora">
                                    <label class="custom-control-label" for="49">mais de 1 hora</label>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="category" style="margin-bottom: -10px; margin-top: 10px;">15. O que você pretende com o trabalho de consultoria online?</label>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="50" style="margin-top: 5px;">Por favor, explique:</label>
                                        <textarea name="answer-50" id="50" class="form-control"></textarea>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="category" style="margin-bottom: -10px; margin-top: 10px;">16. Anexar sua última avaliação física.</label>
                                    </div>
                                </div>

                                <div class="custom-control-inline">
                                    <label for="answer-51" class="file-upload btn btn-primary btn-block">
                                        <i class="fa fa-upload mr-2"></i>
                                        Anexo
                                        <input id="answer-51" type="file" name="answer-51">
                                    </label>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="category" style="margin-bottom: -10px; margin-top: 10px;">17. Possui plano nutricional? Anexar aqui sua dieta atual.</label>
                                    </div>
                                </div>

                                <div class="custom-control-inline">
                                    <label for="answer-52" class="file-upload btn btn-primary btn-block">
                                        <i class="fa fa-upload mr-2"></i>
                                        Anexo
                                        <input id="answer-52" type="file" name="answer-52">
                                    </label>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-success" style="margin-top: 10px;">Cadastrar</button>
                                    </div>
                                </div>

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