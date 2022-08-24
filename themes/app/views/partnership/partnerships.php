<?php $v->layout("_theme"); ?>

<div class="row ">
    <div class="col-12  align-self-center">
        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
            <div class="w-sm-100 mr-auto">
                <h4 class="mb-0">Parcerias</h4>
            </div>

            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                <li class="breadcrumb-item"><a href="<?= url("/app/"); ?>">Home</a></li>
                <li class="breadcrumb-item">Parcerias</li>
            </ol>
        </div>
    </div>
</div>

<div class="row row-eq-height">
    <div class="col-12 col-md-12 mt-3">

        <div class="card">
            <div class="card-body d-md-flex text-center">

                <form action="<?= url("/app/partnerships"); ?>">
                    <div class="  d-flex  ">
                        <input type="text" class="form-control col-md-12" placeholder="Pesquisar ..." name="s" value="<?= $search ?>" />
                        <button class="btn btn-primary font-w-600 " style="position: initial; line-height: 15px; margin-left: 5px">
                            <i class="fas fa-search align-middle"></i>
                        </button>
                    </div>
                </form>

                <a href="#" class="btn btn-primary font-w-600 my-auto text-nowrap ml-auto add-event" data-toggle="modal" data-target="#createPartnership"><i class="fa fa-plus"></i> Cadastrar Parceria</a>

            </div>
        </div>

    </div>
</div>

<div class="row ">

    <?php if (!empty($partnerships)) : ?>

        <?php foreach ($partnerships as $partnership) : ?>

            <div class="col-12 col-lg-3 col-xl-3 mt-3">
                <div class="card">
                    <div class="card-content">


                        <div class="card-image business-card">
                            <div class="background-image-maker"></div>
                            <div class="holder-image">
                                <img src="<?= image($partnership->image, 260, 260) ?>" alt="" class="img-fluid" style="max-width: 75%;">
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title mb-3 mt-2"><?= $partnership->name ?></h5>
                            <p class="card-text">
                                <b><i class="far fa-envelope"></i>
                                    Endereço
                                </b>
                                <br>
                                <?= $partnership->address ?>
                            </p>
                            <p class="card-text">
                                <b><i class="fas fa-phone"></i>
                                    Telefone
                                </b>
                                <br>
                                <span class="mask-phone"><?= $partnership->phone ?></span>
                            </p>
                            <div class="row mt-4 mb-3">
                                <div class="col-5">
                                    <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#updatePartnership" data-id="<?= $partnership->id ?>" data-name="<?= $partnership->name ?>" data-image="<?= $partnership->image ?>" data-phone="<?= $partnership->phone ?>" data-address="<?= $partnership->address ?>" data-description="<?= $partnership->description ?>">
                                        <i class="fa fa-pen"></i> Editar
                                    </button>
                                </div>
                                <div class="col-7">
                                    <form action="<?= url("/app/partnerships/partnership"); ?>" id="parnershipRemove">

                                        <input type="hidden" name="action" value="delete" />
                                        <input type="hidden" name="id" value="<?= $partnership->id ?>" />

                                        <button class="btn btn-danger mb-2" onclick="return confirm('Você deseja excluir esse parceiro?');">
                                            <i class="fas fa-cogs"></i> Excluir
                                        </button>
                                    </form>
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
                        Não existe parcerias cadastrados
                    </div>
                </div>

            </div>
        </div>

    <?php endif; ?>

</div>

<?= $paginator; ?>

<div class="modal fade" id="createPartnership" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle1">Cadastrar nova parceria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= url("app/partnerships/partnership"); ?>">

                <div class="modal-body">

                    <div class="row">

                        <div class="card-body">
                            <div class="col-12">

                                <input type="hidden" name="action" value="create" />

                                <div class="form-row">
                                    <div class="form-group col-md-7">
                                        <label for="name">Nome</label>
                                        <input type="text" class="form-control rounded" name="name" id="name" placeholder="Nome">
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label for="phone">Telefone</label>
                                        <input type="text" class="form-control mask-phone" id="phone" name="phone" placeholder="Telefone">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="description">Descrição</label>
                                        <textarea name="description" id="description" class="form-control"></textarea>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-8">
                                        <label for="address">Endereço</label>
                                        <input type="text" class="form-control" id="address" name="address" placeholder="Endereço">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="description">Imagem</label>
                                        <div class="custom-file overflow-hidden  mb-5">
                                            <input id="image" name="image" type="file" class="custom-file-input file">
                                            <label for="image" class="custom-file-label">Choose file</label>
                                        </div>
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

<div class="modal fade" id="updatePartnership" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle1">Editar parceiro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= url("app/partnerships/partnership"); ?>">

                <div class="modal-body">

                    <div class="row">

                        <div class="card-body">
                            <div class="col-12">

                                <input type="hidden" name="action" value="update" />
                                <input type="hidden" id="id" name="id" />

                                <div class="form-row">
                                    <div class="form-group col-md-7">
                                        <label for="name">Nome</label>
                                        <input type="text" class="form-control rounded" name="name" id="name" placeholder="Nome">
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label for="phone">Telefone</label>
                                        <input type="text" class="form-control mask-phone" id="phone" name="phone" placeholder="Telefone">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="description">Descrição</label>
                                        <textarea name="description" id="description" class="form-control"></textarea>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-8">
                                        <label for="address">Endereço</label>
                                        <input type="text" class="form-control" id="address" name="address" placeholder="Endereço">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="description">Imagem</label>
                                        <div class="custom-file overflow-hidden  mb-5">
                                            <input id="image" name="image" type="file" class="custom-file-input file">
                                            <label for="image" class="custom-file-label">Choose file</label>
                                        </div>
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
    $('#updatePartnership').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var name = button.data('name');
        // var imageDB = button.data('imageDB');
        var phone = button.data('phone');
        var address = button.data('address');
        var description = button.data('description');

        var modal = $(this);
        modal.find('#id').val(id);
        modal.find('#name').val(name);
        // modal.find('#imageDB').val(imageDB);
        modal.find('#phone').val(phone);
        modal.find('#address').val(address);
        modal.find('#description').val(description);
    });

    // $(document).ready(function($) {
    //     $('#parnershipRemove').submit(function(e) {
    //         var fileInput = document.getElementById('parnershipRemove');
    //         var formData = new FormData(fileInput);

    //         $(".ajax_load").fadeIn(200).css("display", "flex").find(".ajax_load_box_title").text("Excluindo parceria...");

    //         console.log(fileInput);

    //         $.ajax({
    //             url: "<?= url("/app/partnerships/partnership"); ?>",
    //             type: "POST",
    //             data: formData,
    //             dataType: 'json',
    //             processData: false,
    //             contentType: false,
    //             success: function(retorno) {
    //                 if (retorno.status == '1') {
    //                     $('.mensagem').html(retorno.mensagem);
    //                 } else {
    //                     $('.mensagem').html(retorno.mensagem)
    //                 }
    //             }
    //         })

    //         // e.preventDefault();
    //     });

    //     return false;
    // });
</script>

<?php $v->end(); ?>