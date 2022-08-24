<?php

use Source\Models\Auth;

$v->layout("_theme");
?>

<div class="row ">
    <div class="col-12  align-self-center">
        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
            <div class="w-sm-100 mr-auto">
                <h4 class="mb-0"><?= $student->name ?></h4>
            </div>

            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                <li class="breadcrumb-item"><a href="<?= url("/app/"); ?>">Home</a></li>
                <li class="breadcrumb-item">Chat</li>
            </ol>
        </div>
    </div>
</div>

<div class="profile-menu mt-4 theme-background border  z-index-1 p-2">
    <div class="d-sm-flex">
        <div class="align-self-center">
            <ul class="nav nav-pills flex-column flex-sm-row" id="myTab" role="tablist">
                <li class="nav-item ml-0">
                    <a class="nav-link  py-2 px-3 px-lg-4" href="<?= url("app/to_manager/{$student->id}/training_sheet"); ?>"> Fichas de treinos</a>
                </li>
                <li class="nav-item ml-0">
                    <a class="nav-link  py-2 px-4 px-lg-4 active" href="<?= url("app/to_manager/{$student->id}/chat"); ?>">
                        Chat</a>
                </li>
                <li class="nav-item ml-0">
                    <a class="nav-link  py-2 px-4 px-lg-4 " href="<?= url("app/to_manager/{$student->id}/anamnese"); ?>">
                        Anamnese</a>
                </li>
                <li class="nav-item ml-0">
                    <a class="nav-link  py-2 px-4 px-lg-4 " href="<?= url("app/to_manager/{$student->id}/postural_evaluation"); ?>">
                        Avaliação Postural</a>
                </li>
                <li class="nav-item ml-0">
                    <a class="nav-link  py-2 px-4 px-lg-4 " href="<?= url("app/to_manager/{$student->id}/par_q"); ?>">
                        Par-Q</a>
                </li>
                <li class="nav-item ml-0">
                    <a class="nav-link  py-2 px-4 px-lg-4 " href="<?= url("app/to_manager/{$student->id}/postural_analysis_images"); ?>">
                        Imagens de análise postural</a>
                </li>

            </ul>
        </div>

    </div>
</div>

<div class="chat-screen">
    <div class="row row-eq-height">

        <div class="col-12 col-lg-12 col-xl-12 mt-3 ">
            <div class="card border h-100 rounded-0">
                <div class="card-body p-0">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                            <ul class="nav flex-column chat-menu" id="myTab3" role="tablist">
                                <li class="nav-item active px-3 px-md-1 px-xl-3">
                                    <div class="media d-block d-flex text-left py-2">
                                        <img class="img-fluid  mr-3 rounded-circle" src="<?= image($student->photo, 260, 260) ?>" width="54" alt="">
                                        <div class="media-body align-self-center mt-0  d-flex">
                                            <div class="message-content">
                                                <h6 class="mb-1 font-weight-bold d-flex" style="margin-top: 5px;"><?= $student->name ?></h6>
                                            </div>

                                            <div style="margin-left: 10px;">
                                                <a class="btn btn-secondary mb-2" href="<?= url("app/to_manager/{$student->id}/chat/files"); ?>" style="color: white;">
                                                    <i class="fas fa-file"></i> <span class="d-none d-xl-inline-block">Arquivos</span>
                                                </a>

                                                <a class="btn btn-secondary mb-2" href="<?= url("app/to_manager/{$student->id}/chat/photos"); ?>" style="color: white;">
                                                    <i class="fas fa-file-image"></i> <span class="d-none d-xl-inline-block">Imagens</span>
                                                </a>

                                                <a class="btn btn-secondary mb-2" href="<?= url("app/to_manager/{$student->id}/chat/videos"); ?>" style="color: white;">
                                                    <i class="fas fa-file-video"></i> <span class="d-none d-xl-inline-block">Videos</span>
                                                </a>
                                            </div>

                                            <!-- <div class="call-button ml-auto">

                                                    <a href="#" class="call" data-toggle="modal" data-target="#uploadFile">
                                                        <i class="far fa-file"></i>
                                                    </a>
                                                    <a href="#" class="video-call h4 mb-0" data-toggle="modal" data-target="#uploadPhoto">
                                                        <i class="fas fa-file-image"></i>
                                                    </a>
                                                    <a href="#" class="video-call h4 mb-0" data-toggle="modal" data-target="#uploadVideo">
                                                        <i class="fas fa-file-video"></i>
                                                    </a>
                                                    <a href="#" class="video-call h4 mb-0" data-toggle="modal" data-target="#uploadAudio">
                                                        <i class="fas fa-file-audio"></i>
                                                    </a>
                                                </div> -->
                                        </div>
                                    </div>
                                </li>
                            </ul>


                            <div class="scrollerchat p-3">


                            </div>
                            <form class="typing-area" autocomplete="off">
                                <div class="border-top theme-border px-2 py-3 d-flex position-relative chat-box">
                                    <input type="text" name="outgoing_id" value="<?= Auth::user()->id ?>" hidden />
                                    <input type="text" name="incoming_id" class="incoming_id" value="<?= $student->id ?>" hidden />
                                    <input type="text" class="form-control mr-2 input-field" require id="message" name="message" placeholder="Digite sua mensagem aqui ..." autocomplete="off" />
                                    <button class="p-2 ml-2 rounded line-height-21 bg-primary text-white">
                                        <i class="icon-cursor align-middle"></i>
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


<div class="modal fade bd-example-modal-lgg" id="uploadFile" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel10" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle1">Arquivos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="files">
                <div class="modal-body">

                    <div class="form-row">

                        <input type="hidden" name="action" value="file" />

                        <div class="form-group col-md-6">
                            <div class="custom-file overflow-hidden  mb-5">
                                <input id="file" name="file" type="file" class="custom-file-input file">
                                <label for="customFile" class="custom-file-label">Enviar arquivo</label>
                            </div>
                        </div>

                        <div class="form-group col-md-3">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </div>

                    <?php if (!empty($files)) : ?>

                        <div class="documents list">

                            <?php foreach ($files as $file) : ?>
                                <div class="document folder-documents">
                                    <div class="document-content">
                                        <div class="document-profile">
                                            <i class="icon-doc"></i>
                                            <div class="document-info">
                                                <p class="document-name mt-3"><?= $file->name ?></p>
                                            </div>
                                        </div>
                                        <div class="document-email">
                                            <p class="mb-0 small">Tipo: </p>
                                            <p class="user-email">Documento</p>
                                        </div>

                                        <div class="document-phone">
                                            <p class="mb-0 small">Enviado </p>
                                            <p class="user-phone"><?= date_fmt($file->created_at) ?></p>
                                        </div>
                                        <div class="line-h-1 h5">
                                            <a class="text-success edit-document" href="<?= url("/storage/{$file->upload}"); ?>" download>
                                                <i class="fas fa-download"></i>
                                            </a>

                                            <a class="text-danger delete-document" id="remove" data-remove="<?= url("/app/chat-get/{$student->id}/file"); ?>" data-action="remove" data-upload="<?= $file->id ?>">
                                                <i class="icon-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                        </div>

                    <?php else : ?>

                    <?php endif; ?>

                </div>
            </form>


            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Editar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lgg" id="uploadPhoto" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel10" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle1">Imagens</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="photos">
                <div class="modal-body">

                    <div class="form-row">

                        <input type="hidden" name="action" value="photo" />

                        <div class="form-group col-md-6">
                            <div class="custom-file overflow-hidden  mb-5">
                                <input id="photo" name="photo" type="file" class="custom-file-input file">
                                <label for="customFile" class="custom-file-label">Enviar imagem </label>
                            </div>
                        </div>

                        <div class="form-group col-md-3">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </div>

                    <?php if (!empty($photos)) : ?>

                        <div class="documents list">

                            <?php foreach ($photos as $photo) : ?>
                                <div class="document folder-documents">
                                    <div class="document-content">
                                        <div class="document-profile">
                                            <img src="<?= image($photo->upload, 60, 100) ?>" alt="avatar" class="user-image img-fluid">
                                            <div class="document-info">
                                                <p class="document-name mt-3"><?= $photo->name ?></p>
                                            </div>
                                        </div>
                                        <div class="document-email">
                                            <p class="mb-0 small">Tipo: </p>
                                            <p class="user-email">Imagem</p>
                                        </div>

                                        <div class="document-phone">
                                            <p class="mb-0 small">Enviado </p>
                                            <p class="user-phone"><?= date_fmt($photo->created_at) ?></p>
                                        </div>
                                        <div class="line-h-1 h5">
                                            <a class="text-success edit-document" href="<?= url("/storage/{$photo->upload}"); ?>" download>
                                                <i class="fas fa-download"></i>
                                            </a>

                                            <a class="text-danger delete-document" id="remove" data-remove="<?= url("/app/chat-get/{$photo->id}/file"); ?>" data-action="remove" data-upload="<?= $photo->id ?>">
                                                <i class="icon-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                        </div>

                    <?php else : ?>

                    <?php endif; ?>

                </div>
            </form>


            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Editar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lgg" id="uploadVideo" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel10" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle1">Vídeos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="videos">
                <div class="modal-body">

                    <div class="form-row">

                        <input type="hidden" name="action" value="video" />

                        <div class="form-group col-md-6">
                            <div class="custom-file overflow-hidden  mb-5">
                                <input id="video" name="video" type="file" class="custom-file-input file">
                                <label for="video" class="custom-file-label">Enviar vídeo </label>
                            </div>
                        </div>

                        <div class="form-group col-md-3">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </div>

                    <?php if (!empty($videos)) : ?>

                        <div class="documents list">

                            <?php foreach ($videos as $video) : ?>
                                <div class="document folder-documents">
                                    <div class="document-content">
                                        <div class="document-profile">
                                            <i class="icon-camrecorder"></i>
                                            <div class="document-info">
                                                <p class="document-name mt-3"><?= $video->name ?></p>
                                            </div>
                                        </div>
                                        <div class="document-email">
                                            <p class="mb-0 small">Tipo: </p>
                                            <p class="user-email">Vídio</p>
                                        </div>

                                        <div class="document-phone">
                                            <p class="mb-0 small">Enviado </p>
                                            <p class="user-phone"><?= date_fmt($video->created_at) ?></p>
                                        </div>
                                        <div class="line-h-1 h5">
                                            <a class="text-success edit-document" href="<?= url("/storage/{$video->upload}"); ?>" download>
                                                <i class="fas fa-download"></i>
                                            </a>

                                            <a class="text-danger delete-document" id="remove" data-remove="<?= url("/app/chat-get/{$video->id}/file"); ?>" data-action="remove" data-upload="<?= $photo->id ?>">
                                                <i class="icon-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                        </div>

                    <?php else : ?>

                    <?php endif; ?>

                </div>
            </form>


            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Editar</button>
            </div>
        </div>
    </div>
</div>

<?php $v->start("scripts"); ?>

<script src="<?= theme("/assets/js/script2.js", CONF_VIEW_APP); ?>"></script>

<script>
    const form = document.querySelector(".typing-area"),
        incoming_id = form.querySelector(".incoming_id").value,
        inputField = form.querySelector(".input-field"),
        sendBtn = form.querySelector("button"),
        chatBox = document.querySelector(".scrollerchat");

    form.onsubmit = (e) => {
        e.preventDefault();
    }

    sendBtn.onclick = () => {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "<?= url("/app/chat-insert"); ?>", true);
        xhr.onload = () => {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    inputField.value = "";
                    scrollToBottom();
                }
            }
        }
        let formData = new FormData(form);
        xhr.send(formData);
    }

    chatBox.onmouseenter = () => {
        chatBox.classList.add("active");
    }

    chatBox.onmouseleave = () => {
        chatBox.classList.remove("active");
    }

    setInterval(() => {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "<?= url("/app/chat-get/{$student->id}"); ?>", true);
        xhr.onload = () => {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    let data = xhr.response;
                    chatBox.innerHTML = data;
                    if (!chatBox.classList.contains("active")) {
                        // scrollToBottom();
                    }

                }
            }
        }
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("incoming_id=" + incoming_id);
    }, 500);

    // function scrollToBottom() {
    //     chatBox.scrollTop = chatBox.scrollHeight;
    // }
</script>

<script>
    $(document).ready(function($) {
        $('#files').submit(function(e) {
            var fileInput = document.getElementById('files');
            var formData = new FormData(fileInput);

            $(".ajax_load").fadeIn(200).css("display", "flex").find(".ajax_load_box_title").text("Enviando arquivo...");

            $.ajax({
                url: "<?= url("/app/chat-get/{$student->id}/file"); ?>",
                type: "POST",
                data: formData,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function(retorno) {
                    if (retorno.status == '1') {
                        $('.mensagem').html(retorno.mensagem);
                    } else {
                        $('.mensagem').html(retorno.mensagem)
                    }
                }
            })

            // e.preventDefault();
        });

        $('#photos').submit(function(e) {
            var fileInput = document.getElementById('photos');
            var formData = new FormData(fileInput);

            $(".ajax_load").fadeIn(200).css("display", "flex").find(".ajax_load_box_title").text("Enviando Foto...");

            $.ajax({
                url: "<?= url("/app/chat-get/{$student->id}/file"); ?>",
                type: "POST",
                data: formData,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function(retorno) {
                    if (retorno.status == '1') {
                        $('.mensagem').html(retorno.mensagem);
                    } else {
                        $('.mensagem').html(retorno.mensagem)
                    }
                }
            })

            // e.preventDefault();
        });

        $('#videos').submit(function(e) {
            var fileInput = document.getElementById('videos');
            var formData = new FormData(fileInput);

            $(".ajax_load").fadeIn(200).css("display", "flex").find(".ajax_load_box_title").text("Enviando Vídeo...");

            $.ajax({
                url: "<?= url("/app/chat-get/{$student->id}/file"); ?>",
                type: "POST",
                data: formData,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function(retorno) {
                    if (retorno.status == '1') {
                        $('.mensagem').html(retorno.mensagem);
                    } else {
                        $('.mensagem').html(retorno.mensagem)
                    }
                }
            })

            // e.preventDefault();
        });

        return false;
    });

    $("[data-remove]").click(function(e) {
        var clicked = $(this);
        var dataset = clicked.data();

        setTimeout(function() {
            $.post("<?= url("/app/chat-get/{$student->id}/file"); ?>", dataset);
        }, 200)
    });
</script>

<?php $v->end(); ?>