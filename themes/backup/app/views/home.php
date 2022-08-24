<?php $v->layout("_theme"); ?>

    <div class="row ">
        <!-- <div class="col-12  align-self-center">
            <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                <div class="w-sm-100 mr-auto">
                    <h4 class="mb-0">Blank Page</h4>
                </div>

                <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">Page</li>
                    <li class="breadcrumb-item active"><a href="#">Blank Page</a></li>
                </ol>
            </div>
        </div> -->
    </div>

    <div class="row">

<!--        <div class="col-md-6 col-lg-4 mt-3">-->
<!--            <div class="card overflow-hidden">-->
<!--                <div class="card-header d-flex justify-content-between align-items-center">-->
<!--                    <h6 class="card-title">Aniversariantes do dia</h6>-->
<!--                </div>-->
<!--                <div class="card-content">-->
<!--                    <div class="card-body p-0">-->
<!--                        <ul class="list-group list-unstyled">-->

                            <?php if ($birthdays): ?>

                                <?php foreach ($birthdays as $birthday): ?>
<!--                                    <li class="p-2 border-bottom zoom">-->
<!--                                        <div class="media d-flex w-100">-->
<!--                                            <a href="#"><img src="--><?//= image($birthday->photo, 30, 30) ?><!--" alt=""-->
<!--                                                             class="img-fluid ml-0 mt-2  rounded-circle" width="40"></a>-->
<!--                                            <div class="media-body align-self-center pl-2">-->
<!--                                                <span class="mb-0 font-w-600">--><?//= $birthday->name ?><!--</span>-->
<!--                                                <br>-->
<!--                                                <p class="mb-0 font-w-500 tx-s-12">--><?//= birth($birthday->birth) ?><!--</p>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </li>-->
                                <?php endforeach; ?>

                            <?php else: ?>

<!--                                <li class="p-2 border-bottom zoom">-->
<!--                                    <div class="media d-flex w-100">-->
<!--                                        <div class="alert alert-primary" role="alert">-->
<!--                                            Não existe nenhum aniversariante para hoje.-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </li>-->

                            <?php endif; ?>

<!--                        </ul>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->


        <?php if (!empty($warnings)): ?>
        <div class="col-md-6 col-lg-12 mt-3">
            <div class="card overflow-hidden">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="card-title">Avisos</h6>
                </div>
                <div class="card-content">
                    <div class="card-body p-0">
                        <ul class="list-group list-unstyled">

                            <?php foreach ($warnings as $warning) : ?>
                                <li class="p-2  zoom">
                                    <div class="card mt-3 border-bottom-0">
                                        <div class="card-content border-bottom border-warning border-w-5">
                                            <div class="card-body p-4">
                                                <p class="mb-3 font-w-600"><?= $warning->warning ?></p>
                                                <p class="font-w-500 tx-s-12"><i
                                                            class="icon-calendar"></i> <?= date_fmt_br($warning->created_at) ?>
                                                </p>

                                                <div class="d-flex">
                                                    <img src="<?= image($warning->user()->photo, 30, 30) ?>"
                                                         alt="author" width="30" class="rounded-circle">


                                                    <div class="media-body align-self-center pl-3">
                                                        <span class="mb-0 font-w-600"><?= $warning->user()->name ?></span><br>
                                                    </div>


                                                    <?php if (date_fmt($warning->created_at, "d-m-Y") == date("d-m-Y")) : ?>
                                                        <div class="ml-auto media-body align-self-center pl-3">
                                                            <span class="badge outline-badge-success ml-2">Novo aviso</span>
                                                        </div>
                                                    <?php else : ?>

                                                    <?php endif; ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach; ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <?php else: ?>

        <?php endif; ?>

        <div class="col-md-6 col-lg-12 mt-3">
            <div class="card border  h-100 notes-list-section">

                <div class="card">
                    <a href="#" class="btn btn-outline-primary font-w-900 my-auto  add-event" data-toggle="modal"
                       data-target="#createEvent"><i class="fa fa-plus"></i> Criar Evento</a>
                </div>

                <div class="row notes">

                    <?php if ($events): ?>

                        <?php foreach ($events as $event): ?>

                            <div class="col-12  col-md-6 col-lg-4 my-3 note <?= $event->priority ?>"
                                 data-type="business-note">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body p-4">
                                            <div class="note-content mb-4 font-w-600">
                                                <?= $event->event ?>
                                            </div>
                                            <p class="font-w-500 tx-s-12"><i class="icon-calendar"></i> <span
                                                        class="note-date"><?= date_fmt($event->date_event, 'd/m/Y') ?> <?= $event->hour_event ?></span>
                                            </p>


                                            <div class="d-flex notes-tool">

                                                <div class="skin skin-flat">
                                                    <a class="text-success edit-note" data-toggle="modal"
                                                       data-target="#updateEvent"
                                                       data-id="<?= $event->id ?>" data-event="<?= $event->event ?>"
                                                       data-date="<?= $event->date_event ?>"
                                                       data-hour="<?= $event->hour_event ?>"
                                                       data-priority="<?= $event->priority ?>">
                                                        <i class="icon-pencil"></i>
                                                    </a>

                                                    <a class="text-danger delete-note" href="#"
                                                       data-confirm="Você deseja deletar esse evento?"
                                                       data-post="<?= url("/app/events/event"); ?>"
                                                       data-action="delete"
                                                       data-event_id="<?= $event->id ?>">
                                                        <i class="icon-trash"></i>
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        <?php endforeach; ?>

                    <?php else: ?>

                    <?php endif; ?>

                </div>

                <div class="card">
                    <a href="<?= url("/app/events"); ?>" class="btn btn-info font-w-900 my-auto  add-event">
                        <i class="fa fa-eye"></i>
                        Ver mais
                    </a>
                </div>

            </div>
        </div>

    </div>


    <div class="modal fade" id="createEvent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle1">Criar Evento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="<?= url("app/events/event"); ?>">

                    <div class="modal-body">

                        <div class="row">

                            <div class="card-body">
                                <div class="col-12">

                                    <input type="hidden" name="action" value="create"/>


                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="event">Evento</label>
                                            <textarea name="event" id="event" rows="7" class="form-control"
                                                      required></textarea>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-5">
                                            <label for="date">Data</label>
                                            <input type="date" class="form-control"
                                                   id="date" name="date" required>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="hour">Hora</label>
                                            <input type="time" class="form-control"
                                                   id="hour" name="hour" required>
                                        </div>

                                        <div style="margin-top: 30px; margin-left: 5px">
                                            <ul class="list list-unstyled mr-3">
                                                <li>
                                                    <input tabindex="4" type="checkbox" id="priority" name="priority">
                                                    <label class="note-content mb-0 font-w-300" for="priority"
                                                           style="font-size: 15px">Prioridade</label>
                                                </li>
                                            </ul>
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

    <div class="modal fade" id="updateEvent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle1">Criar Evento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="<?= url("app/events/event"); ?>">

                    <div class="modal-body">

                        <div class="row">

                            <div class="card-body">
                                <div class="col-12">

                                    <input type="hidden" name="action" value="update"/>
                                    <input type="hidden" id="id" name="id"/>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="event">Evento</label>
                                            <textarea name="event" id="event" rows="7" class="form-control"
                                                      required></textarea>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-5">
                                            <label for="date">Data</label>
                                            <input type="date" class="form-control"
                                                   id="date" name="date" required>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="hour">Hora</label>
                                            <input type="time" class="form-control"
                                                   id="hour" name="hour" required>
                                        </div>

                                        <div style="margin-top: 30px; margin-left: 5px">
                                            <ul class="list list-unstyled mr-3">
                                                <li>
                                                    <input tabindex="4" type="checkbox" id="priority" name="priority">
                                                    <label class="note-content mb-0 font-w-300" for="priority"
                                                           style="font-size: 15px">Prioridade</label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Editar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php $v->start("scripts"); ?>

    <script src="<?= theme("/assets/js/script.js", CONF_VIEW_APP); ?>"></script>

    <script>
        $('#updateEvent').on('show.bs.modal', function (e) {
            var button = $(e.relatedTarget);
            var id = button.data('id');
            var event = button.data('event');
            var date_event = button.data('date');
            var hour_event = button.data('hour');
            var priority = button.data('priority');

            var modal = $(this);
            modal.find('#id').val(id);
            modal.find('#event').val(event);
            modal.find('#date').val(date_event);
            modal.find('#hour').val(hour_event);

            if (priority == 'private-note all important') {
                modal.find('#priority').attr('checked', true);
            } else {
                modal.find('#priority').attr('checked', false);
            }


        });
    </script>

<?php $v->end(); ?>