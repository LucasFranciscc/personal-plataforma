<?php

namespace Source\Controllers;

use Source\Models\TrainingSheet;

class ObservationCreate extends App
{
  public function __construct()
  {
    parent::__construct();
  }

  public function createObservation(?array $data): void
  {
    $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

    $trainingSheetUpdate = (new TrainingSheet())->findById($data["id"]);

    $trainingSheetUpdate->observation = $data["observation"];

    $trainingSheetUpdate->save();

    $this->message->success("Observação adicionada com sucesso...")->flash();
    echo json_encode(["reload" => true]);
    return;
  }
}