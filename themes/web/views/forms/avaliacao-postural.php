<?php $v->layout("_themeForm"); ?>

<div class="ugf-bg ufg-main-container">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="ugf-form">
                    <form action="<?= url("forms"); ?>">
                        <div class="input-block">

                            <h4>Avaliação Postural</h4>

                            <div class="row">
                                <div class="col-md-12">
                                    <p><strong>Vídeo explicativo de como você deve tirar às fotos: Parte 1 / Parte 2</strong></p>
                                </div>

                                <div class="col-md-6">

                                    <iframe src="https://www.youtube.com/embed/LC06DdPeE2M"
                                            title="YouTube video player" frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen>
                                    </iframe>
                                </div>

                                <div class="col-md-6">
                                    <iframe src="https://www.youtube.com/embed/0wx-3te-30I"
                                            title="YouTube video player" frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen>
                                    </iframe>
                                </div>
                            </div>

                            <div class="row">

                                <input type="hidden" name="user_id" value="<?= $user_id ?>"/>
                                <input type="hidden" name="form" value="avaliacao_postural"/>

                                <div class="col-md-12">
                                    <br>
                                    <h4><strong>Anexe todas as fotos abaixo:</strong></h4>
                                    <br>
                                </div>

                                <div class="col-md-12">
                                    <label for="photo1"><strong>Imagem 1 </strong></label>
                                    <input type="file" id="photo1" name="photo1" class="input-file" required/>
                                </div>

                                <div class="col-md-12">
                                    <label for="photo2"><strong>Imagem 2 </strong></label>
                                    <input type="file" id="photo2" name="photo2" class="input-file" required/>
                                </div>

                                <div class="col-md-12">
                                    <label for="photo3"><strong>Imagem 3 </strong></label>
                                    <input type="file" id="photo3" name="photo3" class="input-file" required/>
                                </div>

                                <div class="col-md-12">
                                    <label for="photo4"><strong>Imagem 4 </strong></label>
                                    <input type="file" id="photo4" name="photo4" class="input-file" required/>
                                </div>

                                <div class="col-md-12">
                                    <label for="photo5"><strong>Imagem 5 </strong></label>
                                    <input type="file" id="photo5" name="photo5" class="input-file" required/>
                                </div>

                                <div class="col-md-12">
                                    <label for="photo6"><strong>Imagem 6 </strong></label>
                                    <input type="file" id="photo6" name="photo6" class="input-file" required/>
                                </div>

                                <div class="col-md-12">
                                    <label for="photo7"><strong>Imagem 7 </strong></label>
                                    <input type="file" id="photo7" name="photo7" class="input-file" required/>
                                </div>

                                <div class="col-md-12">
                                    <label for="photo8"><strong>Imagem 8 </strong></label>
                                    <input type="file" id="photo8" name="photo8" class="input-file" required/>
                                </div>

                                <div class="col-md-12">
                                    <label for="photo9"><strong>Imagem 9 </strong></label>
                                    <input type="file" id="photo9" name="photo9" class="input-file" required/>
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="btn">Cadastrar</button>
                                </div>

                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>