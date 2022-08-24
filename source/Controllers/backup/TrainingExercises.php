<?php


namespace Source\Controllers;

use Source\Models\TrainingExercise;

class TrainingExercises extends App
{
  public function __construct()
  {
    parent::__construct();
  }

  public function Exercises(?array $data): void
  {
    // Delete
    if (!empty($data["action"]) && $data["action"] == "delete") {
      $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
      $trainingExerciseDelete = (new TrainingExercise())->findById($data["exercise_id"]);

      $trainingExerciseDelete->destroy();

      $this->message->success("Exercício deletado com sucesso")->flash();
      echo json_encode(["reload" => true]);
      return;
    }

    //Update
    if (!empty($data["action"]) && $data["action"] == "update") {
      $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
      $trainingExerciseUpdate = (new TrainingExercise())->findById($data["id"]);

      $trainingExerciseUpdate->series = $data["series"];
      $trainingExerciseUpdate->minimal_repetition = $data["minimal_repetition"];
      $trainingExerciseUpdate->maximum_repetition = $data["maximum_repetition"];
      $trainingExerciseUpdate->rest = $data["rest"];
      $trainingExerciseUpdate->intensification_method = $data["intensification_method"];

      $trainingExerciseUpdate->save();

      $this->message->success("Exercício atualizado com sucesso...")->flash();
      echo json_encode(["reload" => true]);
      return;
    }
  }
}