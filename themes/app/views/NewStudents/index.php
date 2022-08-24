<?php $v->layout("_theme"); ?>

<div class="row ">
    <div class="col-12  align-self-center">
        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
            <div class="w-sm-100 mr-auto">
                <h4 class="mb-0">Novos Alunos</h4>
            </div>

            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                <li class="breadcrumb-item"><a href="<?= url("/app/"); ?>">Home</a></li>
                <li class="breadcrumb-item">Novos Alunos</li>
            </ol>
        </div>
    </div>
</div>

<!--<div class="row row-eq-height">-->
<!--    <div class="col-12 col-md-12 mt-3">-->
<!---->
<!--        <div class="card">-->
<!--            <div class="card-body d-md-flex text-center">-->
<!---->
<!--                <div class="form-group col-md-2">-->
<!--                    <label for="start">Início</label>-->
<!--                    <input type="date" class="form-control" name="start" id="start" />-->
<!--                </div>-->
<!---->
<!--                <div class="form-group col-md-2">-->
<!--                    <label for="end">Fim</label>-->
<!--                    <input type="date" class="form-control" name="end" id="end" />-->
<!--                </div>-->
<!---->
<!--                <div class="form-group col-md-1">-->
<!--                    <a onclick="students()" class="btn btn-primary mt-4" style="color: #FFFFFF"> Filtrar</a>-->
<!--                </div>-->
<!---->
<!--            </div>-->
<!--        </div>-->
<!---->
<!--    </div>-->
<!--</div>-->

<div class="row" id="students">

  <?php if (!empty($students)) : ?>

    <?php foreach ($students as $student) : ?>

          <div class="col-12 col-lg-4 col-xl-3 mt-3">
              <div class="card">
                  <div class="card-content">


                      <!--                    <div class="card-image business-card">-->
                      <!--                        <div class="background-image-maker"></div>-->
                      <!--                        <div class="holder-image">-->
                      <!--                            <img src="--><?//= image($student->photo, 260, 260) ?><!--" alt="" class="img-fluid" style="max-width: 75%;">-->
                      <!--                        </div>-->
                      <!--                    </div>-->
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
                          <span>Status: <?= $student->status == 1 ? "Ativo" : "Inativo" ?></span>
                          <div class="row mt-4 mb-3">
                              <div class="col-7">
                                  <a class="btn btn-primary mb-2" style="color: white;" href="<?= url("app/to_manager/{$student->id}/training_sheet"); ?>">
                                      <i class="fas fa-cogs"></i> Detalhes
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
                      Não existe alunos novos nesse periodo
                  </div>
              </div>

          </div>
      </div>

  <?php endif; ?>

</div>


<?php $v->start("scripts"); ?>

<script>
    function students() {
        var startResult = document.querySelector("#start").value;
        var endResult = document.querySelector("#end").value;

        var load = $(".ajax_load");
        load.fadeIn(200).css("display", "flex");
        $.ajax({
            url: "/app/new_students/students",
            type: "POST",
            data: {
                start: startResult,
                end: endResult
            },
            success: function(obj) {
                document.getElementById("students").innerHTML = "";
                $('#students').html(obj);
            }
        }).done(function() {
            load.fadeOut();
        });

    }
</script>

<?php $v->end(); ?>