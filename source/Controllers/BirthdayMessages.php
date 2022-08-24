<?php


namespace Source\Controllers;


use Source\Models\BirthdayMessage;

class BirthdayMessages extends App
{
  public function __construct()
  {
    parent::__construct();
  }

  public function message(?array $data): void
  {
    //create and update
    if (!empty($data["action"]) && $data["action"] == "createAndUpdate") {


      if (!empty($data["id"])) {
        $messageUpdate = (new BirthdayMessage())->findById($data["id"]);

        $messageUpdate->msg = $data["msg"];

        $messageUpdate->save();
      } else {
        $messageCreate = new BirthdayMessage();

        $messageCreate->msg = $data["msg"];

        $messageCreate->save();
      }

      $this->message->success("Mensagem registrada com sucesso!")->flash();
      echo json_encode(["reload" => true]);
      return;

    }

    $msg = (new BirthdayMessage())->find()->fetch();

    $head = $this->seo->render(
      CONF_SITE_NAME . " | Mensagem de Aniversário",
      CONF_SITE_DESC,
      url("/admin"),
      url("/admin/assets/images/image.jpg"),
      false
    );

    echo $this->view->render("views/birthdayMessage", [
      "head" => $head,
      "msg" => $msg
    ]);
  }
}