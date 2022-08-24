<?php if (!empty($notifications)): ?>

  <?php foreach ($notifications as $item): ?>

    <?php $user = (new \Source\Models\User())->findById($item->sent_by) ?>
        <li>
            <a class="dropdown-item px-2 py-2 border border-top-0 border-left-0 border-right-0"
               href="<?= url("/app/to_manager/{$item->sent_by}/chat"); ?>">
                <div class="media">
                    <img src="<?= url("/storage/{$user->photo}"); ?>" alt=""
                         class="d-flex mr-3 img-fluid rounded-circle w-50">
                    <div class="media-body">
                        <p class="mb-0 text-success"><?= $user->name ?></p>
                      <?= date_fmt($item->created_at) ?>
                    </div>
                </div>
            </a>
        </li>
  <?php endforeach; ?>

<?php else: ?>
    <p class="mb-0 bold ml-2 mr-2">Você não tem nenhuma mensagem</p>
<?php endif; ?>