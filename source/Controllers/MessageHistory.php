<?php

namespace Source\Controllers;

use Source\Core\Connect;
use Source\Models\Auth;

class MessageHistory extends App
{
  public function __construct()
  {
    parent::__construct();
  }

  public function messageHistory()
  {
    $user = Auth::user();

    $messages = Connect::getInstance()->query("
        select distinct(incoming_msg_id) from messages
        where outgoing_msg_id = {$user->id} or incoming_msg_id = {$user->id};
    ")->fetchAll();

    $head = $this->seo->render(
      CONF_SITE_NAME . " | Exercícios",
      CONF_SITE_DESC,
      url("/admin"),
      url("/admin/assets/images/image.jpg"),
      false
    );

    echo $this->view->render("views/messageHistory", [
      "head" => $head,
      "messages" => $messages
    ]);
  }
}