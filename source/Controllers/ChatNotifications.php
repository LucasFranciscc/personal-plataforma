<?php

namespace Source\Controllers;

use Source\Models\Auth;
use Source\Models\ChatNotification;
use Source\Models\PosturalEvaluation;
use Source\Models\Request;

class ChatNotifications extends App
{
  public function __construct()
  {
    parent::__construct();
  }

  public function notifications(?array $data)
  {
    $user = Auth::user();

    $notifications = (new ChatNotification())->find("received = :a and visualized = 0", "a={$user->id}")->fetch(true);

    $head = $this->seo->render(
      CONF_SITE_NAME . " | Video 1",
      CONF_SITE_DESC,
      url("/admin"),
      url("/admin/assets/images/image.jpg"),
      false
    );

    echo $this->view->render("views/chat_notifications", [
      "head" => $head,
      "notifications" => $notifications
    ]);
  }

  public function alert()
  {
    $user = Auth::user();

    $notifications = (new ChatNotification())->find("received = :a and visualized = 0", "a={$user->id}")->fetch();

    echo json_encode(["res" => $notifications]);
  }

  public function alertRequest()
  {
    $requests = (new Request())->find("status = 'Solicitado'")->fetch(true);

    echo json_encode(["res" => $requests]);
  }

  public function alertPostural()
  {
    $pending = (new PosturalEvaluation())->find("status = 0")->fetch(true);

    echo json_encode(["res" => $pending]);
  }
}