<?php $v->layout("_landing2"); ?>

<section class="position-relative xs-bg-cover parallaxie" id="home"
         style="background-image: url(<?= url("/shared/landing1/images/banner/dark-banner.jpg"); ?>);" data-scrollax-parent="true">
    <div class="xs-shape xs-banner-dark-shape" data-scrollax="properties: { translateY: '-250px' }"
         style="background-image: url(<?= url("/shared/landing1/images/shape/triangle_dots_01.png"); ?>);"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="xs-banner-dark">
                    <h2 class="xs-banner-title">The healthy way of life <span>Company</span></h2>
                    <a href="#" class="btn btn-primary xs-mt-15">Join Classes <span
                                class="icon icon-plus"></span></a>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="about-wrap" id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="title">
                    <h1><span>Bem-vindo(a) ao</span> Mundo Fit Online</h1>
                </div>
                <p><strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ac magna nec mauris mattis semper. In cursus purus arcu, vitae auctor enim blandit arcu vel.</strong></p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ac erat a diam rutrum laoreet. Cras vitae fringilla turpis. In laoreet nunc vel lacinia luctus. Nullam suscipit volutpat magna, vel tempus mauris auctor non. Duis nec orci egestas, hendrerit purus non, egestas diam. Donec viverra arcu quam, vel aliquam libero sagittis ut. Aenean non mauris vel nisl pulvinar malesuada ut non dui. Praesent ante nisi, varius vitae tincidunt rutrum, suscipit id mauris. Nunc et porta quam, et porttitor lorem. In sagittis nisl non quam varius, iaculis scelerisque urna bibendum. </p>
                <div class="readmore"><a href="#">Read More <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></a></div>
            </div>
            <div class="col-lg-5">
                <div class="aboutImg"><img src="<?= url("/shared/web/images/aboutImg.jpg"); ?>"></div>
            </div>
        </div>
    </div>
</div>

<section class="xs-black-bg xs-section-padding-lg" data-scrollax-parent="true" id="health">
    <div class="xs-help xs-health">

        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="xs-section-heading2">
                        <h2>Por que o treino é bom para sua<br />
                            <span>saúde?</span>
                        </h2>
                    </div>
                    <p style="color: white">O exercício físico regular aumenta a taxa metabólica, ajudando seu corpo a queimar mais
                        calorias e perder peso mais rápido. Além disso, estudos demonstram que a combinação de
                        exercícios aeróbicos com treinamento de resistência é fundamental para maximizar a
                        perda de gordura e a manutenção da massa muscular.</p>
                    <a href="#" class="btn btn-primary">Join Classes <span class="icon icon-plus"></span></a>
                </div>
                <div class="col-lg-6">
                    <div class="xs-video-wraper">
                        <div class='twentytwenty-container xs-image-comparison'>
                            <img src="<?= url("/shared/landing1/images/before.png"); ?>" class="twentytwenty-before" alt="health">
                            <img src="<?= url("/shared/landing1/images/after.png"); ?>" class="twentytwenty-after" alt="health-2">
                        </div>
                        <div class="xs-video-shape" data-scrollax="properties: { translateY: '250px' }"
                             style="background-image: url(<?= url("/shared/landing1/images/shape/help-shape.png"); ?>);"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="xs-bg-cover xs-pt-50 xs-pb-sm parallaxie parallaxie"
         style="background-image: url(<?= url("/shared/landing1/images/bmi-bg.png"); ?>);" id="imc">
    <div class="container">
        <div class="xs-bmi">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="xs-colummn-heading2">
                        <h2>Tabela de <span>IMC</span></h2>
                    </div>
                    <div class="table-responsive xs-bmi-table">
                        <table class="table table-bordered">
                            <caption>Taxa metabólica corporal / gasto de energia por unidade de tempo</caption>
                            <thead>
                            <tr>
                                <th scope="col">IMC</th>
                                <th scope="col">ESTADO DE PESO</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Abaixo de 18.5</td>
                                <td>Abaixo do peso</td>
                            </tr>
                            <tr>
                                <td>18.5 - 24.9</td>
                                <td>Saudável</td>
                            </tr>
                            <tr>
                                <td>25.0 - 29.9</td>
                                <td>Sobrepeso</td>
                            </tr>
                            <tr>
                                <td>30 e acima</td>
                                <td>Obeso(a)</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="xs-colummn-heading2">
                        <h2>Calcular <span>seu IMC</span></h2>
                        <p>O índice de massa corporal (IMC), é uma medida reconhecida internacionalmente que permite
                            avaliar o nível de gordura em cada pessoa, indo a sua escala de subnutrição até obesidade
                            de grau três.</p>
                    </div>
                    <form action="#" class="xs-form xs-form-dark">
                        <div class="row">
                            <div class="col-md-6">
                                <div id="heightWrap" class="form-group xs-form-anim">
                                    <label class="input-label" for="xs-height">Altura / cm</label>
                                    <input type="number" min="1" max="500" id="xs-height" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div id="weightWrap" class="form-group xs-form-anim">
                                    <label class="input-label" for="xs-weight">Peso / kg</label>
                                    <input type="number" min="1" max="500" id="xs-weight" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group xs-form-anim">
                                    <label class="input-label" for="xs-age">Idade</label>
                                    <input type="number" min="1" max="200" id="xs-age" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6 align-self-end">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadio1" name="sex" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio1">Masculino</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadio2" name="sex" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio2">Feminino</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group xs-mt-20">
                                    <!--                                    <button type="submit" id="calculate" class="btn btn-primary">Calculate</button>-->
                                    <div class="readmore viewbtn"><a type="submit" id="calculate" style="color: white">Calcular</a></div>
                                </div>
                                <div id="xs-bmi-info" class="clearfix">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="pricing-wrap" id="price">
    <div class="container">
        <div class="title">
            <h1>Nossa tabela de preços</h1>
        </div>
        <ul class="row pricing-table">
            <li class="col-lg-4">
                <div class="pricingWrp">
                    <h3>Basic</h3>
                    <div class="dollarPrice">R$99/<span>Month</span></div>
                    <ul class="tableList">
                        <li>Gym Fitness</li>
                        <li>Yoga</li>
                        <li>Running</li>
                        <li>Body Building</li>
                    </ul>
                    <div class="readmore viewbtn"><a href="#">
                            Ver detalhes
                        </a></div>
                </div>
            </li>
            <li class="col-lg-4">
                <div class="pricingWrp">
                    <h3>Standard</h3>
                    <div class="dollarPrice">R$99/<span>Month</span></div>
                    <ul class="tableList">
                        <li>Gym Fitness</li>
                        <li>Yoga</li>
                        <li>Running</li>
                        <li>Body Building</li>
                    </ul>
                    <div class="readmore viewbtn"><a href="#">
                            Ver detalhes</a></div>
                </div>
            </li>
            <li class="col-lg-4">
                <div class="pricingWrp">
                    <h3>Premium</h3>
                    <div class="dollarPrice">R$99/<span>Month</span></div>
                    <ul class="tableList">
                        <li>Gym Fitness</li>
                        <li>Yoga</li>
                        <li>Running</li>
                        <li>Body Building</li>
                    </ul>
                    <div class="readmore viewbtn"><a href="#">
                            Ver detalhes</a></div>
                </div>
            </li>
        </ul>
    </div>
</div>