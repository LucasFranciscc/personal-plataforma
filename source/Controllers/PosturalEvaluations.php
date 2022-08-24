<?php

namespace Source\Controllers;

use Source\Models\PosturalEvaluation;

class PosturalEvaluations extends App
{
  public function __construct()
  {
    parent::__construct();
  }

  public function avaliado(?array $data)
  {
    $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

    $posturalEvaluation = (new PosturalEvaluation())->findById($data["id"]);

    $posturalEvaluation->status = 1;

    $posturalEvaluation->save();

    $this->message->success("Salvo com sucesso.")->flash();
    echo json_encode(["reload" => true]);
    return;
  }

  public function naoAvaliado(?array $data)
  {
    $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

    $posturalEvaluation = (new PosturalEvaluation())->findById($data["id"]);

    $posturalEvaluation->status = 0;

    $posturalEvaluation->save();

    $this->message->success("Salvo com sucesso.")->flash();
    echo json_encode(["reload" => true]);
    return;
  }
}