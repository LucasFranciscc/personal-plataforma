<?php $v->layout("_themeForm"); ?>

<div class="ugf-bg ufg-main-container">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="ugf-form">
                    <form action="<?= url("forms"); ?>">
                        <div class="input-block">


                            <h4>QUESTIONÁRIO DE PRONTIDÃO PARA ATIVIDADE FÍSICA</h4>
                            <p>Este Questionário tem por objetivo identificar a necessidade de
                                avaliação por um médico antes do início ou do aumento de nível da
                                atividade física. Por favor, assinale "sim" ou "não" às seguintes
                                perguntas:</p>

                            <div class="row">

                                <input type="hidden" name="user_id" value="<?= $user_id ?>"/>
                                <input type="hidden" name="form" value="par_q"/>

                                <div class="col-md-12">
                                    <div class="form-group country-select">
                                        <label for="question1">
                                            1) Algum médico já disse que você possui algum problema de coração
                                            ou pressão arterial, e que somente deveria realizar atividade física
                                            supervisionado por profissionais de saúde?
                                        </label>
                                        <div class="select-input choose-country">
                                            <span></span>
                                            <select id="question1" class="form-control" name="question1">
                                                <option value="sim">Sim</option>
                                                <option value="não">Não</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group country-select">
                                        <label for="question2">
                                            2) Você sente dores no peito quando pratica atividade física?
                                        </label>
                                        <div class="select-input choose-country">
                                            <span></span>
                                            <select id="question2" class="form-control" name="question2">
                                                <option value="sim">Sim</option>
                                                <option value="não">Não</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group country-select">
                                        <label for="question3">
                                            3) No último mês, você sentiu dores no peito ao praticar atividade
                                            física?
                                        </label>
                                        <div class="select-input choose-country">
                                            <span></span>
                                            <select id="question3" class="form-control" name="question3">
                                                <option value="sim">Sim</option>
                                                <option value="não">Não</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group country-select">
                                        <label for="question4">
                                            4) Você apresenta algum desequilíbrio devido à tontura e/ou perda
                                            momentânea da consciência?
                                        </label>
                                        <div class="select-input choose-country">
                                            <span></span>
                                            <select id="question4" class="form-control" name="question4">
                                                <option value="sim">Sim</option>
                                                <option value="não">Não</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group country-select">
                                        <label for="question5">
                                            5) Você possui algum problema ósseo ou articular, que pode ser
                                            afetado ou agravado pela atividade física?
                                        </label>
                                        <div class="select-input choose-country">
                                            <span></span>
                                            <select id="question5" class="form-control" name="question5">
                                                <option value="sim">Sim</option>
                                                <option value="não">Não</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group country-select">
                                        <label for="question6">
                                            6) Você toma atualmente algum tipo de medicação de uso contínuo?
                                        </label>
                                        <div class="select-input choose-country">
                                            <span></span>
                                            <select id="question6" class="form-control" name="question6">
                                                <option value="sim">Sim</option>
                                                <option value="não">Não</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group country-select">
                                        <label for="question7">
                                            7) Você realiza algum tipo de tratamento médico para pressão arterial
                                            ou problemas cardíacos?
                                        </label>
                                        <div class="select-input choose-country">
                                            <span></span>
                                            <select id="question7" class="form-control" name="question7">
                                                <option value="sim">Sim</option>
                                                <option value="não">Não</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group country-select">
                                        <label for="question8">
                                            8) Você realiza algum tratamento médico contínuo, que possa ser
                                            afetado ou prejudicado com a atividade física?
                                        </label>
                                        <div class="select-input choose-country">
                                            <span></span>
                                            <select id="question8" class="form-control" name="question8">
                                                <option value="sim">Sim</option>
                                                <option value="não">Não</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group country-select">
                                        <label for="question9">
                                            9) Você já se submeteu a algum tipo de cirurgia, que comprometa de
                                            alguma forma a atividade física?
                                        </label>
                                        <div class="select-input choose-country">
                                            <span></span>
                                            <select id="question9" class="form-control" name="question9">
                                                <option value="sim">Sim</option>
                                                <option value="não">Não</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group country-select">
                                        <label for="question10">
                                            10) Sabe de alguma outra razão pela qual a atividade física possa
                                            eventualmente comprometer sua saúde?
                                        </label>
                                        <div class="select-input choose-country">
                                            <span></span>
                                            <select id="question10" class="form-control" name="question10">
                                                <option value="sim">Sim</option>
                                                <option value="não">Não</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="term"
                                                   id="term"
                                                   required="">
                                            <label class="custom-control-label" for="term">
                                                TERMO DE RESPONSABILIDADE PARA PRÁTICA DE ATIVIDADE FÍSICA
                                                <a type="button" class="" data-toggle="modal"
                                                   data-target="#ExemploModalCentralizado">
                                                    Termos &amp; Condições
                                                </a>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="btn">Cadastrar</button>
                                </div>

                            </div>

                            <div class="modal fade" id="ExemploModalCentralizado" tabindex="-1" role="dialog"
                                 aria-labelledby="TituloModalCentralizado" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="TituloModalCentralizado">TERMO DE
                                                RESPONSABILIDADE PARA PRÁTICA DE ATIVIDADE FÍSICA</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Fechar">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Declaro que estou ciente de que é recomendável conversar com um
                                            médico, antes de iniciar ou aumentar o nível de atividade física
                                            pretendido, assumindo plena responsabilidade pela realização de
                                            qualquer atividade física sem o atendimento desta recomendação.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                Fechar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!---->
                            <!--                            <br>-->
                            <!--                            <br>-->
                            <!--                            <br>-->
                            <!--                            <br>-->
                            <!--                            <br>-->
                            <!--                            <br>-->
                            <!--                            <br>-->
                            <!---->
                            <!---->
                            <!--                            <div class="row">-->
                            <!--                                <div class="col-md-6">-->
                            <!--                                    <div class="form-group">-->
                            <!--                                        <label for="inputFname">First Name</label>-->
                            <!--                                        <input type="text" class="form-control" id="inputFname"-->
                            <!--                                               placeholder="e.g. Robert">-->
                            <!--                                    </div>-->
                            <!--                                </div>-->
                            <!--                                <div class="col-md-6">-->
                            <!--                                    <div class="form-group">-->
                            <!--                                        <label for="inputLname">Last Name</label>-->
                            <!--                                        <input type="text" class="form-control" id="inputLname"-->
                            <!--                                               placeholder="e.g. Smith">-->
                            <!--                                    </div>-->
                            <!--                                </div>-->
                            <!--                                <div class="col-md-6">-->
                            <!--                                    <div class="form-group country-select">-->
                            <!--                                        <label for="inputCountry">Country of Nationality</label>-->
                            <!--                                        <div class="select-input choose-country">-->
                            <!--                                            <span></span>-->
                            <!--                                            <select id="inputCountry" class="form-control">-->
                            <!--                                                <option value="">Country</option>-->
                            <!--                                                <option value="">USA</option>-->
                            <!--                                                <option value="">Russia</option>-->
                            <!--                                                <option value="">China</option>-->
                            <!--                                                <option value="">England</option>-->
                            <!--                                                <option value="">France</option>-->
                            <!--                                                <option value="">Germany</option>-->
                            <!--                                                <option value="">Spain</option>-->
                            <!--                                                <option value="">Netherland</option>-->
                            <!--                                                <option value="">Singapur</option>-->
                            <!--                                            </select>-->
                            <!--                                        </div>-->
                            <!--                                    </div>-->
                            <!--                                </div>-->
                            <!--                                <div class="col-md-6">-->
                            <!--                                    <div class="form-group">-->
                            <!--                                        <label for="inputDate">Date of Birth</label>-->
                            <!--                                        <div class="birth-date">-->
                            <!--                                            <div class="select-input birth-date-input">-->
                            <!--                                                <span></span>-->
                            <!--                                                <select id="inputDate" class="form-control">-->
                            <!--                                                    <option value="">Date</option>-->
                            <!--                                                    <option value="">01</option>-->
                            <!--                                                    <option value="">02</option>-->
                            <!--                                                    <option value="">03</option>-->
                            <!--                                                    <option value="">04</option>-->
                            <!--                                                    <option value="">05</option>-->
                            <!--                                                    <option value="">06</option>-->
                            <!--                                                    <option value="">07</option>-->
                            <!--                                                    <option value="">08</option>-->
                            <!--                                                    <option value="">09</option>-->
                            <!--                                                    <option value="">10</option>-->
                            <!--                                                    <option value="">11</option>-->
                            <!--                                                    <option value="">12</option>-->
                            <!--                                                    <option value="">13</option>-->
                            <!--                                                    <option value="">14</option>-->
                            <!--                                                    <option value="">15</option>-->
                            <!--                                                    <option value="">16</option>-->
                            <!--                                                    <option value="">17</option>-->
                            <!--                                                    <option value="">18</option>-->
                            <!--                                                    <option value="">19</option>-->
                            <!--                                                    <option value="">20</option>-->
                            <!--                                                    <option value="">21</option>-->
                            <!--                                                    <option value="">22</option>-->
                            <!--                                                    <option value="">23</option>-->
                            <!--                                                    <option value="">24</option>-->
                            <!--                                                    <option value="">25</option>-->
                            <!--                                                    <option value="">26</option>-->
                            <!--                                                    <option value="">27</option>-->
                            <!--                                                    <option value="">28</option>-->
                            <!--                                                    <option value="">29</option>-->
                            <!--                                                    <option value="">30</option>-->
                            <!--                                                </select>-->
                            <!--                                            </div>-->
                            <!--                                            <div class="select-input birth-date-input">-->
                            <!--                                                <span></span>-->
                            <!--                                                <select id="inputDate" class="form-control">-->
                            <!--                                                    <option value="">Month</option>-->
                            <!--                                                    <option value="">01</option>-->
                            <!--                                                    <option value="">02</option>-->
                            <!--                                                    <option value="">03</option>-->
                            <!--                                                    <option value="">04</option>-->
                            <!--                                                    <option value="">05</option>-->
                            <!--                                                    <option value="">06</option>-->
                            <!--                                                    <option value="">07</option>-->
                            <!--                                                    <option value="">08</option>-->
                            <!--                                                    <option value="">09</option>-->
                            <!--                                                    <option value="">10</option>-->
                            <!--                                                    <option value="">11</option>-->
                            <!--                                                    <option value="">12</option>-->
                            <!--                                                </select>-->
                            <!--                                            </div>-->
                            <!--                                            <div class="select-input birth-date-input">-->
                            <!--                                                <span></span>-->
                            <!--                                                <select id="inputDate" class="form-control">-->
                            <!--                                                    <option value="">Year</option>-->
                            <!--                                                    <option value="">1990</option>-->
                            <!--                                                    <option value="">1991</option>-->
                            <!--                                                    <option value="">1992</option>-->
                            <!--                                                    <option value="">1993</option>-->
                            <!--                                                    <option value="">1994</option>-->
                            <!--                                                    <option value="">1995</option>-->
                            <!--                                                    <option value="">1996</option>-->
                            <!--                                                    <option value="">1997</option>-->
                            <!--                                                    <option value="">1998</option>-->
                            <!--                                                    <option value="">1999</option>-->
                            <!--                                                    <option value="">2001</option>-->
                            <!--                                                    <option value="">2002</option>-->
                            <!--                                                    <option value="">2003</option>-->
                            <!--                                                    <option value="">2004</option>-->
                            <!--                                                    <option value="">2005</option>-->
                            <!--                                                    <option value="">2006</option>-->
                            <!--                                                    <option value="">2007</option>-->
                            <!--                                                    <option value="">2008</option>-->
                            <!--                                                    <option value="">2009</option>-->
                            <!--                                                    <option value="">2010</option>-->
                            <!--                                                </select>-->
                            <!--                                            </div>-->
                            <!--                                        </div>-->
                            <!--                                    </div>-->
                            <!--                                </div>-->
                            <!--                                <div class="col-md-6">-->
                            <!--                                    <div class="form-group country-select">-->
                            <!--                                        <label for="inputCountry">Country of Residence</label>-->
                            <!--                                        <div class="select-input choose-country">-->
                            <!--                                            <span></span>-->
                            <!--                                            <select id="inputCountry" class="form-control">-->
                            <!--                                                <option value="">Country</option>-->
                            <!--                                                <option value="">USA</option>-->
                            <!--                                                <option value="">Russia</option>-->
                            <!--                                                <option value="">China</option>-->
                            <!--                                                <option value="">England</option>-->
                            <!--                                                <option value="">France</option>-->
                            <!--                                                <option value="">Germany</option>-->
                            <!--                                                <option value="">Spain</option>-->
                            <!--                                                <option value="">Netherland</option>-->
                            <!--                                                <option value="">Singapur</option>-->
                            <!--                                            </select>-->
                            <!--                                        </div>-->
                            <!--                                    </div>-->
                            <!--                                </div>-->
                            <!--                                <div class="col-md-6">-->
                            <!--                                    <div class="form-group">-->
                            <!--                                        <label for="state">State/Province</label>-->
                            <!--                                        <input type="text" class="form-control" id="state" placeholder="e.g. Smith">-->
                            <!--                                    </div>-->
                            <!--                                </div>-->
                            <!--                                <div class="col-md-6">-->
                            <!--                                    <div class="form-group">-->
                            <!--                                        <label for="address1">Address Line 1</label>-->
                            <!--                                        <input type="text" class="form-control" id="address1"-->
                            <!--                                               placeholder="e.g. 2707 Par Drive">-->
                            <!--                                    </div>-->
                            <!--                                </div>-->
                            <!--                                <div class="col-md-6">-->
                            <!--                                    <div class="form-group">-->
                            <!--                                        <label for="address2">Address Line 2</label>-->
                            <!--                                        <input type="text" class="form-control" id="address2"-->
                            <!--                                               placeholder="e.g. Los Angeles, CA 90013">-->
                            <!--                                    </div>-->
                            <!--                                </div>-->
                            <!--                                <div class="col-md-6">-->
                            <!--                                    <div class="form-group">-->
                            <!--                                        <label for="city">City</label>-->
                            <!--                                        <input type="text" class="form-control" id="city" placeholder="e.g. New York">-->
                            <!--                                    </div>-->
                            <!--                                </div>-->
                            <!--                                <div class="col-md-6">-->
                            <!--                                    <div class="form-group">-->
                            <!--                                        <label for="zip">Post Code</label>-->
                            <!--                                        <input type="text" class="form-control" id="zip" placeholder="e.g. 0000">-->
                            <!--                                    </div>-->
                            <!--                                </div>-->
                            <!--                            </div>-->
                            <!--                            <div class="form-group">-->
                            <!--                                <label for="">Gender</label>-->
                            <!--                                <div class="check-gender">-->
                            <!--                                    <div class="custom-radio">-->
                            <!--                                        <input type="radio" name="gender" class="custom-control-input" id="Gmale"-->
                            <!--                                               required>-->
                            <!--                                        <label class="custom-control-label" for="Gmale">Male</label>-->
                            <!--                                    </div>-->
                            <!--                                    <div class="custom-radio">-->
                            <!--                                        <input type="radio" name="gender" class="custom-control-input" id="Gfemale"-->
                            <!--                                               required>-->
                            <!--                                        <label class="custom-control-label" for="Gfemale">Female</label>-->
                            <!--                                    </div>-->
                            <!--                                </div>-->
                            <!--                            </div>-->
                            <!--                        </div>-->
                            <!--                        <div class="input-block">-->
                            <!--                            <h4>Personal Documents</h4>-->
                            <!--                            <p>Upload any of the following personal document.</p>-->
                            <!--                            <div class="documents-upload-wrap">-->
                            <!--                                <div class="label">Select Document type</div>-->
                            <!--                                <ul class="nav nav-tabs" id="myTab" role="tablist">-->
                            <!--                                    <li class="nav-item" role="presentation">-->
                            <!--                                        <a class="nav-link active" id="passport-tab" data-toggle="tab" href="#passport"-->
                            <!--                                           role="tab" aria-controls="passport" aria-selected="true"><i-->
                            <!--                                                    class="fas fa-passport size"> </i> passport</a>-->
                            <!--                                    </li>-->
                            <!--                                    <li class="nav-item" role="presentation">-->
                            <!--                                        <a class="nav-link" id="nid-tab" data-toggle="tab" href="#nid" role="tab"-->
                            <!--                                           aria-controls="nid" aria-selected="false"><img src="images/nid.png" alt="">National-->
                            <!--                                            id</a>-->
                            <!--                                    </li>-->
                            <!--                                    <li class="nav-item" role="presentation">-->
                            <!--                                        <a class="nav-link" id="driver-tab" data-toggle="tab" href="#driver" role="tab"-->
                            <!--                                           aria-controls="driver" aria-selected="false"><img src="images/driving.png"-->
                            <!--                                                                                             alt="">Driver’s License</a>-->
                            <!--                                    </li>-->
                            <!--                                </ul>-->
                            <!--                                <div class="tab-content" id="myTabContent">-->
                            <!--                                    <div class="tab-pane fade show active" id="passport" role="tabpanel"-->
                            <!--                                         aria-labelledby="home-tab">-->
                            <!--                                        <div class="documents-upload">-->
                            <!--                                            <div class="upload-item">-->
                            <!--                                                <input type="file" id="input1" class="input-file" accept="image/*"-->
                            <!--                                                       hidden/>-->
                            <!--                                                <label class="btn-upload" for="input1" role="button">-->
                            <!--                                                    <i class="fas fa-upload"></i>-->
                            <!--                                                    <div id="p-input1" class="preview-box"></div>-->
                            <!--                                                </label>-->
                            <!--                                                <div class="upload-direction"><span class="text">Passport Cover</span><a-->
                            <!--                                                            href="#"><i class="fas fa-upload"></i></a></div>-->
                            <!--                                            </div>-->
                            <!--                                            <div class="upload-item">-->
                            <!--                                                <input type="file" id="input2" class="input-file" accept="image/*"-->
                            <!--                                                       hidden/>-->
                            <!--                                                <label class="btn-upload" for="input2" role="button">-->
                            <!--                                                    <i class="fas fa-upload"></i>-->
                            <!--                                                    <div id="p-input2" class="preview-box"></div>-->
                            <!--                                                </label>-->
                            <!--                                                <div class="upload-direction"><span-->
                            <!--                                                            class="text">Passport Data Page</span><a href="#"><i-->
                            <!--                                                                class="fas fa-upload"></i></a></div>-->
                            <!--                                            </div>-->
                            <!--                                            <div class="upload-item">-->
                            <!--                                                <input type="file" id="input3" class="input-file" accept="image/*"-->
                            <!--                                                       hidden/>-->
                            <!--                                                <label class="btn-upload" for="input3" role="button">-->
                            <!--                                                    <i class="fas fa-upload"></i>-->
                            <!--                                                    <div id="p-input3" class="preview-box"></div>-->
                            <!--                                                </label>-->
                            <!--                                                <div class="upload-direction"><span-->
                            <!--                                                            class="text">Selfie With Passport</span><a href="#"><i-->
                            <!--                                                                class="fas fa-upload"></i></a></div>-->
                            <!--                                            </div>-->
                            <!--                                        </div>-->
                            <!--                                        <div class="conditions">-->
                            <!--                                            <ul>-->
                            <!--                                                <li class="complete">File accepted: JPEG/JPG/PNG (Max size: 250 KB)</li>-->
                            <!--                                                <li>Document should be good condition</li>-->
                            <!--                                                <li>Document must be valid period</li>-->
                            <!--                                                <li>Face must be clear visible</li>-->
                            <!--                                                <li>Note has today’s date</li>-->
                            <!--                                            </ul>-->
                            <!--                                        </div>-->
                            <!--                                    </div>-->
                            <!--                                    <div class="tab-pane fade" id="nid" role="tabpanel" aria-labelledby="nid-tab">-->
                            <!--                                        <div class="documents-upload">-->
                            <!--                                            <div class="upload-item">-->
                            <!--                                                <input type="file" id="input4" class="input-file" accept="image/*"-->
                            <!--                                                       hidden/>-->
                            <!--                                                <label class="btn-upload" for="input4" role="button">-->
                            <!--                                                    <i class="fas fa-upload"></i>-->
                            <!--                                                    <div id="p-input4" class="preview-box"></div>-->
                            <!--                                                </label>-->
                            <!--                                                <div class="upload-direction"><span-->
                            <!--                                                            class="text">National ID Front</span><a href="#"><i-->
                            <!--                                                                class="fas fa-upload"></i></a></div>-->
                            <!--                                            </div>-->
                            <!--                                            <div class="upload-item">-->
                            <!--                                                <input type="file" id="input5" class="input-file" accept="image/*"-->
                            <!--                                                       hidden/>-->
                            <!--                                                <label class="btn-upload" for="input5" role="button">-->
                            <!--                                                    <i class="fas fa-upload"></i>-->
                            <!--                                                    <div id="p-input5" class="preview-box"></div>-->
                            <!--                                                </label>-->
                            <!--                                                <div class="upload-direction"><span class="text">National ID Back</span><a-->
                            <!--                                                            href="#"><i class="fas fa-upload"></i></a></div>-->
                            <!--                                            </div>-->
                            <!--                                            <div class="upload-item">-->
                            <!--                                                <input type="file" id="input6" class="input-file" accept="image/*"-->
                            <!--                                                       hidden/>-->
                            <!--                                                <label class="btn-upload" for="input6" role="button">-->
                            <!--                                                    <i class="fas fa-upload"></i>-->
                            <!--                                                    <div id="p-input6" class="preview-box"></div>-->
                            <!--                                                </label>-->
                            <!--                                                <div class="upload-direction"><span-->
                            <!--                                                            class="text">Selfie With National ID</span><a href="#"><i-->
                            <!--                                                                class="fas fa-upload"></i></a></div>-->
                            <!--                                            </div>-->
                            <!--                                        </div>-->
                            <!--                                        <div class="conditions">-->
                            <!--                                            <ul>-->
                            <!--                                                <li class="complete">File accepted: JPEG/JPG/PNG (Max size: 250 KB)</li>-->
                            <!--                                                <li>Document should be good condition</li>-->
                            <!--                                                <li>Document must be valid period</li>-->
                            <!--                                                <li>Face must be clear visible</li>-->
                            <!--                                                <li>Note has today’s date</li>-->
                            <!--                                            </ul>-->
                            <!--                                        </div>-->
                            <!--                                    </div>-->
                            <!--                                    <div class="tab-pane fade" id="driver" role="tabpanel" aria-labelledby="driver-tab">-->
                            <!--                                        <div class="documents-upload">-->
                            <!--                                            <div class="upload-item">-->
                            <!--                                                <input type="file" id="input7" class="input-file" accept="image/*"-->
                            <!--                                                       hidden/>-->
                            <!--                                                <label class="btn-upload" for="input7" role="button">-->
                            <!--                                                    <i class="fas fa-upload"></i>-->
                            <!--                                                    <div id="p-input7" class="preview-box"></div>-->
                            <!--                                                </label>-->
                            <!--                                                <div class="upload-direction"><span class="text">License Front</span><a-->
                            <!--                                                            href="#"><i class="fas fa-upload"></i></a></div>-->
                            <!--                                            </div>-->
                            <!--                                            <div class="upload-item">-->
                            <!--                                                <input type="file" id="input8" class="input-file" accept="image/*"-->
                            <!--                                                       hidden/>-->
                            <!--                                                <label class="btn-upload" for="input8" role="button">-->
                            <!--                                                    <i class="fas fa-upload"></i>-->
                            <!--                                                    <div id="p-input8" class="preview-box"></div>-->
                            <!--                                                </label>-->
                            <!--                                                <div class="upload-direction"><span class="text">License Back</span><a-->
                            <!--                                                            href="#"><i class="fas fa-upload"></i></a></div>-->
                            <!--                                            </div>-->
                            <!--                                            <div class="upload-item">-->
                            <!--                                                <input type="file" id="input9" class="input-file" accept="image/*"-->
                            <!--                                                       hidden/>-->
                            <!--                                                <label class="btn-upload" for="input9" role="button">-->
                            <!--                                                    <i class="fas fa-upload"></i>-->
                            <!--                                                    <div id="p-input9" class="preview-box"></div>-->
                            <!--                                                </label>-->
                            <!--                                                <div class="upload-direction"><span-->
                            <!--                                                            class="text">Selfie With License</span><a href="#"><i-->
                            <!--                                                                class="fas fa-upload"></i></a></div>-->
                            <!--                                            </div>-->
                            <!--                                        </div>-->
                            <!--                                        <div class="conditions">-->
                            <!--                                            <ul>-->
                            <!--                                                <li class="complete">File accepted: JPEG/JPG/PNG (Max size: 250 KB)</li>-->
                            <!--                                                <li>Document should be good condition</li>-->
                            <!--                                                <li>Document must be valid period</li>-->
                            <!--                                                <li>Face must be clear visible</li>-->
                            <!--                                                <li>Note has today’s date</li>-->
                            <!--                                            </ul>-->
                            <!--                                        </div>-->
                            <!--                                    </div>-->
                            <!--                                </div>-->
                            <!--                            </div>-->
                            <!--                            <div class="form-group">-->
                            <!--                                <div class="custom-checkbox">-->
                            <!--                                    <input type="checkbox" class="custom-control-input" id="customControlValidation1"-->
                            <!--                                           required="">-->
                            <!--                                    <label class="custom-control-label" for="customControlValidation1">I accept the <a-->
                            <!--                                                href="#">Terms &amp; Conditions</a> and <a href="#">Privacy-->
                            <!--                                            policy</a></label>-->
                            <!--                                </div>-->
                            <!--                            </div>-->
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>