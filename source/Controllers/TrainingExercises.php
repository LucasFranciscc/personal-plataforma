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

      $trainingExercisePositionUpdate = (new TrainingExercise())->find("training_id = :training_id", "training_id={$data["training_id"]}")->order("position")->fetch(true);

      if (!empty($trainingExercisePositionUpdate)) {
        for ($a = 1; $a <= count($trainingExercisePositionUpdate); $a++) {
          $positionUpdate = $a - 1;

          $trainingExercisePositionUpdate[$positionUpdate]->position = $a;

          $trainingExercisePositionUpdate[$positionUpdate]->save();
        }
      }


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
      $trainingExerciseUpdate->maximum_repetition = 0;
      $trainingExerciseUpdate->rest = $data["rest"];
      $trainingExerciseUpdate->observation = $data["observation"];
      $trainingExerciseUpdate->intensification_method = $data["intensification_method"];

      $trainingExerciseUpdate->save();

      $this->message->success("Exercício atualizado com sucesso...")->flash();
      echo json_encode(["reload" => true]);
      return;
    }
  }
}