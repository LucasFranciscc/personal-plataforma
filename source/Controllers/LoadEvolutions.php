<?php

namespace Source\Controllers;

use Source\Models\LoadEvolution;

class LoadEvolutions extends App
{
  public function __construct()
  {
    parent::__construct();
  }

  public function createAndUpdate(?array $data): void
  {
    $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
    if (empty($data["id"])) {
      $evolutionCreate = new LoadEvolution();

      $evolutionCreate->training_sheet_id = $data["training_sheet_id"];
      $evolutionCreate->week_1 = $data["week_1"];
      $evolutionCreate->week_2 = $data["week_2"];
      $evolutionCreate->week_3 = $data["week_3"];
      $evolutionCreate->week_4 = $data["week_4"];
      $evolutionCreate->week_5 = $data["week_5"];
      $evolutionCreate->week_6 = $data["week_6"];
      $evolutionCreate->week_7 = $data["week_7"];

      $evolutionCreate->save();

      $this->message->success("Cadastrado com sucesso...")->flash();
      echo json_encode(["reload" => true]);
      return;
    } else {
      $evolutionUpdate = (new LoadEvolution())->findById($data["id"]);

      $evolutionUpdate->week_1 = $data["week_1"];
      $evolutionUpdate->week_2 = $data["week_2"];
      $evolutionUpdate->week_3 = $data["week_3"];
      $evolutionUpdate->week_4 = $data["week_4"];
      $evolutionUpdate->week_5 = $data["week_5"];
      $evolutionUpdate->week_6 = $data["week_6"];
      $evolutionUpdate->week_7 = $data["week_7"];

      $evolutionUpdate->save();

      $this->message->success("Alterado com sucesso...")->flash();
      echo json_encode(["reload" => true]);
      return;
    }
  }
}