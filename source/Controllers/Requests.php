<?php

namespace Source\Controllers;

use Source\Models\FormFilling;
use Source\Models\Request;
use Source\Models\Status;
use Source\Models\TrainingSheet;

class Requests extends App
{
  public function __construct()
  {
    parent::__construct();
  }

  public function requests(): void
  {
    $requests = (new Request())->find("status = 'Solicitado'")->fetch(true);

    $head = $this->seo->render(
      CONF_SITE_NAME . " | Solicitações",
      CONF_SITE_DESC,
      url("/admin"),
      url("/admin/assets/images/image.jpg"),
      false
    );

    echo $this->view->render("views/requests", [
      "head" => $head,
      "requests" => $requests
    ]);
  }

  public function status(?array $data): void
  {
    $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

    if ($data["action"] == "rejeitado") {
      $request = (new Request())->findById($data["id"]);

      $request->status = "Rejeitado";
      $request->description = $data["description"];

      $request->save();

      $formFillingCreate = new FormFilling();

      $formFillingCreate->user_id = $data["user_id"];
      $formFillingCreate->validity = date('Y-m-d', strtotime('+8 week'));

      $formFillingCreate->save();

      $status = (new Status())->find("user_id = :user_id", "user_id={$data["user_id"]}")->fetch();

      $status->status = "processando";
      $status->save();

      $this->message->success("Rejeitado com sucesso!")->flash();
      echo json_encode(["reload" => true]);
      return;
    } else {
      $request = (new Request())->findById($data["id"]);

      $request->status = "Aprovado";

      $request->save();

      $training_sheet = (new TrainingSheet())->findById($request->training_sheet_id);

      $training_sheet->end_date = date('Y-m-d', strtotime('+1 week', strtotime(date("Y-m-d"))));

      $training_sheet->save();

      $this->message->success("Aprovado com sucesso!")->flash();
      echo json_encode(["reload" => true]);
      return;
    }
  }
}