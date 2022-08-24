<?php

namespace Source\Controllers;

use Source\Core\Connect;
use Source\Models\Anamnese;
use Source\Models\IntensificationMethod;
use Source\Models\MuscleGroups;
use Source\Models\MuscleGroupTraining;
use Source\Models\Par_q;
use Source\Models\PosturalAnalysis;
use Source\Models\PosturalAnalysisImages;
use Source\Models\PosturalEvaluation;
use Source\Models\PostureAnalysisReport;
use Source\Models\PostureAnalysisReportNew;
use Source\Models\Training;
use Source\Models\TrainingExercise;
use Source\Models\TrainingSheet;
use Source\Models\User;
use Source\Support\Thumb;
use Source\Support\Upload;

class TrainingSheets extends App
{
  public function __construct()
  {
    parent::__construct();
  }

  public function TrainingSheet(?array $data): void
  {
    $muscleGroups = (new MuscleGroups())->find()->fetch(true);

    $head = $this->seo->render(
      CONF_SITE_NAME . " | Fichas de Treino",
      CONF_SITE_DESC,
      url("/admin"),
      url("/admin/assets/images/image.jpg"),
      false
    );

    echo $this->view->render("views/trainingSheet/trainingSheet", [
      "head" => $head,
      "student" => (new User)->findById($data["user_id"]),
      "trainingSheets" => (new TrainingSheet)->find("user_id = :user_id", "user_id={$data["user_id"]}")->order("id desc")->fetch(true),
      "muscleGroups" => $muscleGroups,
    ]);
  }

  public function TrainingSheets(?array $data): void
  {
    //create
    if (!empty($data["action"]) && $data["action"] == "create") {
      $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

      $end_date = date('Y-m-d', strtotime('+7 week', strtotime($data["start_date"])));

      $traininSheetCreate = new TrainingSheet();
      $traininSheetCreate->record_name = $data["name"];
      $traininSheetCreate->user_id = $data["user_id"];
      $traininSheetCreate->start_date = $data["start_date"];;
      $traininSheetCreate->end_date = $end_date;

      if (!$traininSheetCreate->save()) {
        $json["message"] = $traininSheetCreate->message()->render();
        echo json_encode($json);
        return;
      }

      $trainingCreate = new Training();
      $trainingCreate->name_training = $data["name_training"];
      $trainingCreate->training_sheet_id = $traininSheetCreate->id;
      $trainingCreate->user_id = $data["user_id"];

      if (!$trainingCreate->save()) {
        $json["message"] = $trainingCreate->message()->render();
        echo json_encode($json);
        return;
      }

      for ($i = 0; $i < count($data["muscle_group_id"]); ++$i) {

        $muscleGroupTrainingCreate = new MuscleGroupTraining();
        $muscleGroupTrainingCreate->training_id = $trainingCreate->id;
        $muscleGroupTrainingCreate->muscle_group_id = $data["muscle_group_id"][$i];

        if (!$muscleGroupTrainingCreate->save()) {
          $json["message"] = $muscleGroupTrainingCreate->message()->render();
          echo json_encode($json);
          return;
        }
      }

      $this->message->success("Ficha criada com sucesso...")->flash();
      echo json_encode(["reload" => true]);
      return;
    }

    //Inactive
    if (!empty($data["action"]) && $data["action"] == "inactive") {
      $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

      $traininSheetInactive = (new Training())->findById($data["training"]);

      $traininSheetInactive->status = "inactive";

      if (!$traininSheetInactive->save()) {
        $json["message"] = $traininSheetInactive->message()->render();
        echo json_encode($json);
        return;
      }

      $this->message->success("Treino desativado com sucesso...")->flash();
      echo json_encode(["reload" => true]);
      return;
    }

    //Active
    if (!empty($data["action"]) && $data["action"] == "active") {
      $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

      $traininSheetInactive = (new Training())->findById($data["training"]);

      $traininSheetInactive->status = "active";

      if (!$traininSheetInactive->save()) {
        $json["message"] = $traininSheetInactive->message()->render();
        echo json_encode($json);
        return;
      }

      $this->message->success("Treino ativado com sucesso...")->flash();
      echo json_encode(["reload" => true]);
      return;
    }
  }

  public function Training(?array $data): void
  {

    if (!empty($data["action"]) && $data["action"] == "create") {
      $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

      $training = (new Training())->find("training_sheet_id = :training_sheet_id and user_id = :user_id and status = 'active'", "training_sheet_id={$data["training_sheet_id"]}&user_id={$data["user_id"]}")->fetch();

      $trainingCreate = new Training();
      $trainingCreate->name_training = $data["name_training"];
      $trainingCreate->training_sheet_id = $data["training_sheet_id"];
      $trainingCreate->user_id = $data["user_id"];

      if (!$trainingCreate->save()) {
        $json["message"] = $trainingCreate->message()->render();
        echo json_encode($json);
        return;
      }

      for ($i = 0; $i < count($data["muscle_group_id"]); ++$i) {

        $muscleGroupTrainingCreate = new MuscleGroupTraining();
        $muscleGroupTrainingCreate->training_id = $trainingCreate->id;
        $muscleGroupTrainingCreate->muscle_group_id = $data["muscle_group_id"][$i];

        if (!$muscleGroupTrainingCreate->save()) {
          $json["message"] = $muscleGroupTrainingCreate->message()->render();
          echo json_encode($json);
          return;
        }
      }


      $this->message->success("Treino criado com sucesso...")->flash();
      echo json_encode(["reload" => true]);
      return;
    }

    if (!empty($data["action"]) && $data["action"] == "createExercise") {
      $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

      $trainingExerciseCreate = new TrainingExercise();
      $trainingExerciseCreate->training_id = $data["training_id"];
      $trainingExerciseCreate->exercise_id = $data["exercise_id"];
      $trainingExerciseCreate->series = $data["series"];
      $trainingExerciseCreate->minimal_repetition = $data["minimal_repetition"];
      $trainingExerciseCreate->maximum_repetition = 0;
      $trainingExerciseCreate->rest = $data["rest"];
      $trainingExerciseCreate->observation = $data["observation"];
      $trainingExerciseCreate->intensification_method = $data["intensification_method"];
      $trainingExerciseCreate->position = 1000000000;

      $trainingExerciseCreate->save();

//            $trainingExercise = Connect::getInstance()->query("
//                select max(position) as position from training_exercises
//                where training_id = {$data["training_id"]}
//            ")->fetch();

//            if (!empty($trainingExercise)) {
//                $trainingExerciseCreate->position = $trainingExercise->position + 1;
//            } else {
//                $trainingExerciseCreate->position = 1;
//            }

//            if (!$trainingExerciseCreate->save()) {
//                $json["message"] = $trainingExerciseCreate->message()->render();
//                echo json_encode($json);
//                return;
//            }

      $trainingExercisePositionUpdate = (new TrainingExercise())->find("training_id = :training_id", "training_id={$data["training_id"]}")->order("position")->fetch(true);

      for ($a = 1; $a <= count($trainingExercisePositionUpdate); $a++) {
        $positionUpdate = $a - 1;

        $trainingExercisePositionUpdate[$positionUpdate]->position = $a;

        $trainingExercisePositionUpdate[$positionUpdate]->save();
      }


      $this->message->success("Exercício criado com sucesso...")->flash();
      echo json_encode(["reload" => true]);
      return;
    }
  }

  public function TrainingOrder(?array $data)
  {
    $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

    $array = $data["ordem"];

    $cont_ordem = 1;

    foreach ($array as $id) {
      $result = (new TrainingExercise)->findById($id);
      $result->position = $cont_ordem;
      $result->save();
      $cont_ordem++;
    }
  }

  public function Trainings(?array $data): void
  {
    $training = (new Training())->find("training_sheet_id = :training_sheet_id and user_id = :user_id and id = :id", "training_sheet_id={$data["training_sheet_id"]}&user_id={$data["user_id"]}&id={$data["training_id"]}")->fetch(true);
    $trainings = (new Training())->find("training_sheet_id = :training_sheet_id and user_id = :user_id and status = 'active'", "training_sheet_id={$data["training_sheet_id"]}&user_id={$data["user_id"]}")->fetch(true);
    $trainingsInactive = (new Training())->find("training_sheet_id = :training_sheet_id and user_id = :user_id and status = 'inactive'", "training_sheet_id={$data["training_sheet_id"]}&user_id={$data["user_id"]}")->fetch(true);

    $muscleGroupsTraining = (new MuscleGroupTraining())->find("training_id = :a", "a={$training[0]->id}")->fetch(true);

    $muscleGroups = (new MuscleGroups())->find()->fetch(true);
    $exercisesCreates = (new TrainingExercise())->find("training_id = :training_id", "training_id={$data["training_id"]}")->order("position asc")->fetch(true);

    $intesificationMethods = (new IntensificationMethod())->find()->fetch(true);

    $trainingsList = (new Training())->find("user_id = :a and training_sheet_id = :b and id != :c", "a={$data["user_id"]}&b={$data["training_sheet_id"]}&c={$data["training_id"]}")->fetch(true);

    if ($training) {
      $exercises = Connect::getInstance()->query("
        select b.exercises_id, c.title from muscle_group_training as a
        inner join muscle_groups_exercise as b
        on a.muscle_group_id = b.muscle_group_id
        inner join exercises as c
        on b.exercises_id = c.id
        where a.training_id = {$data["training_id"]}
        ")->fetchAll();
    } else {
      $exercises = null;
    }

    $latestPosition = Connect::getInstance()->query("
        select max(position) as position from training_exercises where training_id = {$data["training_id"]}
        ")->fetch();

    $head = $this->seo->render(
      CONF_SITE_NAME . " | Fichas de Treino",
      CONF_SITE_DESC,
      url("/admin"),
      url("/admin/assets/images/image.jpg"),
      false
    );

    echo $this->view->render("views/trainingSheet/trainings", [
      "head" => $head,
      "student" => (new User)->findById($data["user_id"]),
      "training" => $training,
      "trainings" => $trainings,
      "trainingSheet" => (new TrainingSheet)->findById($data["training_sheet_id"]),
      "muscleGroups" => $muscleGroups,
      "exercisesCreates" => $exercisesCreates,
      "training_id" => $data["training_id"],
      "exercises" => $exercises,
      "intensification_methods" => $intesificationMethods,
      "muscleGroupsTrainings" => $muscleGroupsTraining,
      "trainingsInactives" => $trainingsInactive,
      "latestPosition" => $latestPosition,
      "trainingsList" => $trainingsList
    ]);
  }

  public function anamnese(?array $data): void
  {

    $anamnese = (new Anamnese())->find("user_id = :user_id", "user_id={$data["user_id"]}")->fetch(true);

    $head = $this->seo->render(
      CONF_SITE_NAME . " | Anamnese",
      CONF_SITE_DESC,
      url("/admin"),
      url("/admin/assets/images/image.jpg"),
      false
    );

    echo $this->view->render("views/forms/anamnese", [
      "head" => $head,
      "student" => (new User)->findById($data["user_id"]),
      "anamnese" => $anamnese
    ]);
  }

  public function postural_evaluation(?array $data): void
  {

    $postural_evaluation = (new PosturalEvaluation())->find("user_id = :user_id", "user_id={$data["user_id"]}")->fetch(true);

    $head = $this->seo->render(
      CONF_SITE_NAME . " | Avaliação Postural",
      CONF_SITE_DESC,
      url("/admin"),
      url("/admin/assets/images/image.jpg"),
      false
    );

    echo $this->view->render("views/forms/postural_evaluation", [
      "head" => $head,
      "student" => (new User)->findById($data["user_id"]),
      "postural_evaluation" => $postural_evaluation
    ]);
  }

  public function par_q(?array $data): void
  {

    $par_q = (new Par_q())->find("user_id = :user_id", "user_id={$data["user_id"]}")->fetch(true);

    $head = $this->seo->render(
      CONF_SITE_NAME . " | Par-Q",
      CONF_SITE_DESC,
      url("/admin"),
      url("/admin/assets/images/image.jpg"),
      false
    );

    echo $this->view->render("views/forms/par_q", [
      "head" => $head,
      "student" => (new User)->findById($data["user_id"]),
      "par_q" => $par_q
    ]);
  }

  public function posture_analysis(?array $data): void
  {

    $posturalAnalysis = (new PosturalAnalysis())->find("user_id = :user_id", "user_id={$data["user_id"]}")->order("id desc")->fetch(true);

    $user = (new User())->findById($data["user_id"]);

    $posturalAnalysisOne = (new PosturalAnalysis())->findById($data["postural_analysis_id"]);

    $posturalAnalysisImage = (new PosturalAnalysisImages())->find("postural_analysis_id = :item", "item={$data["postural_analysis_id"]}")->fetch(true);

    $image = Connect::getInstance()->query("select * from postural_analysis_images where postural_analysis_id = {$data["postural_analysis_id"]}  limit 1")->fetch();

    $postureAnalysisReport = (new PostureAnalysisReportNew())->find("postural_analysis_id = :a", "a={$data["postural_analysis_id"]}")->fetch(true);

    $options = Connect::getInstance()->query("
            SELECT DISTINCT option_select FROM posture_analysis_video
        ")->fetchAll();

    $head = $this->seo->render(
      CONF_SITE_NAME . " | Análise Postural",
      CONF_SITE_DESC,
      url("/admin"),
      url("/admin/assets/images/image.jpg"),
      false
    );

    echo $this->view->render("views/posture_analysis", [
      "head" => $head,
      "postural_analysis" => $posturalAnalysis,
      "postural_analysis_one" => $posturalAnalysisOne,
      "posturalAnalysisImage" => $posturalAnalysisImage,
      "postureAnalysisReport" => $postureAnalysisReport,
      "user" => $user,
      "image" => $image,
      "postural_analysis_id" => $data["postural_analysis_id"],
      "options" => $options
    ]);
  }

  public function postural_analysis_images(?array $data): void
  {
    if (!empty($data["action"]) && $data["action"] == "createAndUpdate") {
      $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

      $photos = $_FILES["photo"];

      //name, type, tmp_name, error, size

      if (isset($data["postural_analysis_id"]) == false) {
        $posturalAnalysisCreate = new PosturalAnalysis();

        $posturalAnalysisCreate->user_id = $data["user_id"];
        $posturalAnalysisCreate->date_posture_analysis = date('m/Y');
        $posturalAnalysisCreate->save();
      } else {
        $posturalAnalysisCreate = $data["postural_analysis_id"];
      }

      $teste = $posturalAnalysisCreate;

      for ($a = 0; $a < count($photos["name"]); $a++) {
        $posturalAnalysisImageCreate = new PosturalAnalysisImages();

        $item = isset($data["postural_analysis_id"]) == true ? $posturalAnalysisCreate : $posturalAnalysisCreate->id;

        $position = null;

        $postural = Connect::getInstance()->query("
                    select max(position) as position from postural_analysis_images where postural_analysis_id = {$item}
                ")->fetch();

        if (!$postural) {
          $position = $a;
        } else {
          $position = $postural->position;
        }

        $posturalAnalysisImageCreate->postural_analysis_id = $item;
        $posturalAnalysisImageCreate->position = $position + 1;

        $image = array(
          "name" => $photos["name"][$a],
          "type" => $photos["type"][$a],
          "tmp_name" => $photos["tmp_name"][$a],
          "error" => $photos["error"][$a],
          "size" => $photos["size"][$a],
        );

        $upload = new Upload();
        $imageRender = $upload->image($image, uniqid());

        $posturalAnalysisImageCreate->image = $imageRender;
        $posturalAnalysisImageCreate->save();
      }

      $this->message->success("Cadastrado com sucesso!")->flash();
      echo json_encode(["reload" => true]);
      return;
    }

    if (!empty($data["action"]) && $data["action"] == "delete") {
      $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

      $posturalAnalysisImageDelete = (new PosturalAnalysisImages())->findById($data["id"]);

      unlink(__DIR__ . "/../../" . CONF_UPLOAD_DIR . "/{$posturalAnalysisImageDelete->image}");

      $posturalAnalysisImageDelete->destroy();

      $this->message->success("Deletado com sucesso!")->flash();
      echo json_encode(["reload" => true]);
      return;
    }

    $posturalAnalysisImages = (new PosturalAnalysis())->find("user_id = :user_id", "user_id={$data["user_id"]}")->order("id desc")->fetch(true);

    $head = $this->seo->render(
      CONF_SITE_NAME . " | Imagens de Análise Postural",
      CONF_SITE_DESC,
      url("/admin"),
      url("/admin/assets/images/image.jpg"),
      false
    );

    echo $this->view->render("views/posturalAnalysisImages", [
      "head" => $head,
      "student" => (new User)->findById($data["user_id"]),
      "data" => $posturalAnalysisImages
    ]);
  }


  public function ExercisesSunday(?array $data): void
  {
    $muscleGroups = (new MuscleGroups())->find()->fetch(true);

    $trainings = (new Training())->find("training_sheet_id = :training_sheet_id and user_id = :user_id and day_of_the_week = 'sunday' and status = 'active'", "training_sheet_id={$data["training_sheet_id"]}&user_id={$data["user_id"]}")->order("id desc")->fetch(true);
    $training = (new Training())->find("training_sheet_id = :training_sheet_id and user_id = :user_id and day_of_the_week = 'sunday' and status = 'active'", "training_sheet_id={$data["training_sheet_id"]}&user_id={$data["user_id"]}")->order("id desc")->fetch();

    if ($training) {
      $exercises = Connect::getInstance()->query("
        select DISTINCT b.exercises_id, c.title from muscle_group_training as a
        inner join muscle_groups_exercise as b
        on a.muscle_group_id = b.muscle_group_id
        inner join exercises as c
        on b.exercises_id = c.id
        where a.training_id = {$training->id}
        ")->fetchAll();
    } else {
      $exercises = null;
    }

    if ($training) {
      $exercisesCreates = (new TrainingExercise())->find("training_id = :training_id", "training_id={$training->id}")->order("position asc")->fetch(true);
    } else {
      $exercisesCreates = null;
    }


    $head = $this->seo->render(
      CONF_SITE_NAME . " | Fichas de Treino",
      CONF_SITE_DESC,
      url("/admin"),
      url("/admin/assets/images/image.jpg"),
      false
    );

    echo $this->view->render("views/trainingSheet/exercisesSunday", [
      "head" => $head,
      "muscleGroups" => $muscleGroups,
      "student" => (new User)->findById($data["user_id"]),
      "trainingSheet" => (new TrainingSheet)->findById($data["training_sheet_id"]),
      "trainings" => $trainings,
      "exercises" => $exercises,
      "training" => $training,
      "exercisesCreates" => $exercisesCreates
    ]);
  }

  public function ExercisesMonday(?array $data): void
  {
    $muscleGroups = (new MuscleGroups())->find()->fetch(true);

    $trainings = (new Training())->find("training_sheet_id = :training_sheet_id and user_id = :user_id and day_of_the_week = 'monday' and status = 'active'", "training_sheet_id={$data["training_sheet_id"]}&user_id={$data["user_id"]}")->order("id desc")->fetch(true);
    $training = (new Training())->find("training_sheet_id = :training_sheet_id and user_id = :user_id and day_of_the_week = 'monday' and status = 'active'", "training_sheet_id={$data["training_sheet_id"]}&user_id={$data["user_id"]}")->order("id desc")->fetch();

    if ($training) {
      $exercises = Connect::getInstance()->query("
        select DISTINCT b.exercises_id, c.title from muscle_group_training as a
        inner join muscle_groups_exercise as b
        on a.muscle_group_id = b.muscle_group_id
        inner join exercises as c
        on b.exercises_id = c.id
        where a.training_id = {$training->id}
        ")->fetchAll();
    } else {
      $exercises = null;
    }

    if ($training) {
      $exercisesCreates = (new TrainingExercise())->find("training_id = :training_id", "training_id={$training->id}")->order("position asc")->fetch(true);
    } else {
      $exercisesCreates = null;
    }

    $head = $this->seo->render(
      CONF_SITE_NAME . " | Fichas de Treino",
      CONF_SITE_DESC,
      url("/admin"),
      url("/admin/assets/images/image.jpg"),
      false
    );

    echo $this->view->render("views/trainingSheet/exercisesMonday", [
      "head" => $head,
      "muscleGroups" => $muscleGroups,
      "student" => (new User)->findById($data["user_id"]),
      "trainingSheet" => (new TrainingSheet)->findById($data["training_sheet_id"]),
      "trainings" => $trainings,
      "exercises" => $exercises,
      "training" => $training,
      "exercisesCreates" => $exercisesCreates
    ]);
  }

  public function ExercisesTuesday(?array $data): void
  {
    $muscleGroups = (new MuscleGroups())->find()->fetch(true);

    $trainings = (new Training())->find("training_sheet_id = :training_sheet_id and user_id = :user_id and day_of_the_week = 'tuesday' and status = 'active'", "training_sheet_id={$data["training_sheet_id"]}&user_id={$data["user_id"]}")->order("id desc")->fetch(true);
    $training = (new Training())->find("training_sheet_id = :training_sheet_id and user_id = :user_id and day_of_the_week = 'tuesday' and status = 'active'", "training_sheet_id={$data["training_sheet_id"]}&user_id={$data["user_id"]}")->order("id desc")->fetch();

    if ($training) {
      $exercises = Connect::getInstance()->query("
        select DISTINCT b.exercises_id, c.title from muscle_group_training as a
        inner join muscle_groups_exercise as b
        on a.muscle_group_id = b.muscle_group_id
        inner join exercises as c
        on b.exercises_id = c.id
        where a.training_id = {$training->id}
        ")->fetchAll();
    } else {
      $exercises = null;
    }

    if ($training) {
      $exercisesCreates = (new TrainingExercise())->find("training_id = :training_id", "training_id={$training->id}")->order("position asc")->fetch(true);
    } else {
      $exercisesCreates = null;
    }

    $head = $this->seo->render(
      CONF_SITE_NAME . " | Fichas de Treino",
      CONF_SITE_DESC,
      url("/admin"),
      url("/admin/assets/images/image.jpg"),
      false
    );

    echo $this->view->render("views/trainingSheet/exercisesTuesday", [
      "head" => $head,
      "muscleGroups" => $muscleGroups,
      "student" => (new User)->findById($data["user_id"]),
      "trainingSheet" => (new TrainingSheet)->findById($data["training_sheet_id"]),
      "trainings" => $trainings,
      "exercises" => $exercises,
      "training" => $training,
      "exercisesCreates" => $exercisesCreates
    ]);
  }

  public function ExercisesWednesday(?array $data): void
  {
    $muscleGroups = (new MuscleGroups())->find()->fetch(true);

    $trainings = (new Training())->find("training_sheet_id = :training_sheet_id and user_id = :user_id and day_of_the_week = 'wednesday' and status = 'active'", "training_sheet_id={$data["training_sheet_id"]}&user_id={$data["user_id"]}")->order("id desc")->fetch(true);
    $training = (new Training())->find("training_sheet_id = :training_sheet_id and user_id = :user_id and day_of_the_week = 'wednesday' and status = 'active'", "training_sheet_id={$data["training_sheet_id"]}&user_id={$data["user_id"]}")->order("id desc")->fetch();

    if ($training) {
      $exercises = Connect::getInstance()->query("
        select DISTINCT b.exercises_id, c.title from muscle_group_training as a
        inner join muscle_groups_exercise as b
        on a.muscle_group_id = b.muscle_group_id
        inner join exercises as c
        on b.exercises_id = c.id
        where a.training_id = {$training->id}
        ")->fetchAll();
    } else {
      $exercises = null;
    }

    if ($training) {
      $exercisesCreates = (new TrainingExercise())->find("training_id = :training_id", "training_id={$training->id}")->order("position asc")->fetch(true);
    } else {
      $exercisesCreates = null;
    }

    $head = $this->seo->render(
      CONF_SITE_NAME . " | Fichas de Treino",
      CONF_SITE_DESC,
      url("/admin"),
      url("/admin/assets/images/image.jpg"),
      false
    );

    echo $this->view->render("views/trainingSheet/exercisesWednesday", [
      "head" => $head,
      "muscleGroups" => $muscleGroups,
      "student" => (new User)->findById($data["user_id"]),
      "trainingSheet" => (new TrainingSheet)->findById($data["training_sheet_id"]),
      "trainings" => $trainings,
      "exercises" => $exercises,
      "training" => $training,
      "exercisesCreates" => $exercisesCreates
    ]);
  }

  public function ExercisesThursday(?array $data): void
  {
    $muscleGroups = (new MuscleGroups())->find()->fetch(true);

    $trainings = (new Training())->find("training_sheet_id = :training_sheet_id and user_id = :user_id and day_of_the_week = 'thursday' and status = 'active'", "training_sheet_id={$data["training_sheet_id"]}&user_id={$data["user_id"]}")->order("id desc")->fetch(true);
    $training = (new Training())->find("training_sheet_id = :training_sheet_id and user_id = :user_id and day_of_the_week = 'thursday' and status = 'active'", "training_sheet_id={$data["training_sheet_id"]}&user_id={$data["user_id"]}")->order("id desc")->fetch();

    if ($training) {
      $exercises = Connect::getInstance()->query("
        select DISTINCT b.exercises_id, c.title from muscle_group_training as a
        inner join muscle_groups_exercise as b
        on a.muscle_group_id = b.muscle_group_id
        inner join exercises as c
        on b.exercises_id = c.id
        where a.training_id = {$training->id}
        ")->fetchAll();
    } else {
      $exercises = null;
    }

    if ($training) {
      $exercisesCreates = (new TrainingExercise())->find("training_id = :training_id", "training_id={$training->id}")->order("position asc")->fetch(true);
    } else {
      $exercisesCreates = null;
    }

    $head = $this->seo->render(
      CONF_SITE_NAME . " | Fichas de Treino",
      CONF_SITE_DESC,
      url("/admin"),
      url("/admin/assets/images/image.jpg"),
      false
    );

    echo $this->view->render("views/trainingSheet/exercisesThursday", [
      "head" => $head,
      "muscleGroups" => $muscleGroups,
      "student" => (new User)->findById($data["user_id"]),
      "trainingSheet" => (new TrainingSheet)->findById($data["training_sheet_id"]),
      "trainings" => $trainings,
      "exercises" => $exercises,
      "training" => $training,
      "exercisesCreates" => $exercisesCreates
    ]);
  }

  public function ExercisesFriday(?array $data): void
  {
    $muscleGroups = (new MuscleGroups())->find()->fetch(true);

    $trainings = (new Training())->find("training_sheet_id = :training_sheet_id and user_id = :user_id and day_of_the_week = 'friday' and status = 'active'", "training_sheet_id={$data["training_sheet_id"]}&user_id={$data["user_id"]}")->order("id desc")->fetch(true);
    $training = (new Training())->find("training_sheet_id = :training_sheet_id and user_id = :user_id and day_of_the_week = 'friday' and status = 'active'", "training_sheet_id={$data["training_sheet_id"]}&user_id={$data["user_id"]}")->order("id desc")->fetch();

    if ($training) {
      $exercises = Connect::getInstance()->query("
        select DISTINCT b.exercises_id, c.title from muscle_group_training as a
        inner join muscle_groups_exercise as b
        on a.muscle_group_id = b.muscle_group_id
        inner join exercises as c
        on b.exercises_id = c.id
        where a.training_id = {$training->id}
        ")->fetchAll();
    } else {
      $exercises = null;
    }

    if ($training) {
      $exercisesCreates = (new TrainingExercise())->find("training_id = :training_id", "training_id={$training->id}")->order("position asc")->fetch(true);
    } else {
      $exercisesCreates = null;
    }

    $head = $this->seo->render(
      CONF_SITE_NAME . " | Fichas de Treino",
      CONF_SITE_DESC,
      url("/admin"),
      url("/admin/assets/images/image.jpg"),
      false
    );

    echo $this->view->render("views/trainingSheet/exercisesFriday", [
      "head" => $head,
      "muscleGroups" => $muscleGroups,
      "student" => (new User)->findById($data["user_id"]),
      "trainingSheet" => (new TrainingSheet)->findById($data["training_sheet_id"]),
      "trainings" => $trainings,
      "exercises" => $exercises,
      "training" => $training,
      "exercisesCreates" => $exercisesCreates
    ]);
  }

  public function ExercisesSaturday(?array $data): void
  {
    $muscleGroups = (new MuscleGroups())->find()->fetch(true);

    $trainings = (new Training())->find("training_sheet_id = :training_sheet_id and user_id = :user_id and day_of_the_week = 'saturday' and status = 'active'", "training_sheet_id={$data["training_sheet_id"]}&user_id={$data["user_id"]}")->order("id desc")->fetch(true);
    $training = (new Training())->find("training_sheet_id = :training_sheet_id and user_id = :user_id and day_of_the_week = 'saturday' and status = 'active'", "training_sheet_id={$data["training_sheet_id"]}&user_id={$data["user_id"]}")->order("id desc")->fetch();

    if ($training) {
      $exercises = Connect::getInstance()->query("
        select DISTINCT b.exercises_id, c.title from muscle_group_training as a
        inner join muscle_groups_exercise as b
        on a.muscle_group_id = b.muscle_group_id
        inner join exercises as c
        on b.exercises_id = c.id
        where a.training_id = {$training->id}
        ")->fetchAll();
    } else {
      $exercises = null;
    }

    if ($training) {
      $exercisesCreates = (new TrainingExercise())->find("training_id = :training_id", "training_id={$training->id}")->order("position asc")->fetch(true);
    } else {
      $exercisesCreates = null;
    }

    $head = $this->seo->render(
      CONF_SITE_NAME . " | Fichas de Treino",
      CONF_SITE_DESC,
      url("/admin"),
      url("/admin/assets/images/image.jpg"),
      false
    );

    echo $this->view->render("views/trainingSheet/exercisesSaturday", [
      "head" => $head,
      "muscleGroups" => $muscleGroups,
      "student" => (new User)->findById($data["user_id"]),
      "trainingSheet" => (new TrainingSheet)->findById($data["training_sheet_id"]),
      "trainings" => $trainings,
      "exercises" => $exercises,
      "training" => $training,
      "exercisesCreates" => $exercisesCreates
    ]);
  }

  public function changeStatus(?array $data): void
  {
    $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

    $changeStatus = (new TrainingSheet())->findById($data["training_sheet_id"]);

    if ($changeStatus->status == "active") {
      $changeStatus->status = "inactive";
      $changeStatus->save();
    } else {
      $changeStatus->status = "active";
      $changeStatus->save();
    }

    $this->message->success("Status alterado com sucesso!")->flash();
    echo json_encode(["reload" => true]);
    return;
  }

  public function exclude_postural_analysis(?array $data): void
  {
    $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

    $posturalAnalysisImageDelete = (new PosturalAnalysisImages())->find("postural_analysis_id = :a", "a={$data["postural_analysis_id"]}")->fetch(true);


    if (!empty($posturalAnalysisImageDelete)) {
      for ($a = 0; $a < count($posturalAnalysisImageDelete); $a++) {
        // if ($posturalAnalysisImageDelete[$a]->image && file_exists(__DIR__ . "/../../" . CONF_UPLOAD_DIR . "/{$posturalAnalysisImageDelete[$a]->image}")) {
        //   unlink(__DIR__ . "/../../" . CONF_UPLOAD_DIR . "/{$posturalAnalysisImageDelete[$a]->image}");
        //   (new Thumb())->flush($posturalAnalysisImageDelete[$a]->image);
        // }

        $posturalAnalysisImageDelete[$a]->destroy();
      }
    }

    $posturalAnalysisDelete = (new PosturalAnalysis())->findById($data["postural_analysis_id"]);

    $posturalAnalysisDelete->destroy();

    $this->message->success("Deletado com sucesso!")->flash();
    echo json_encode(["reload" => true]);
    return;
  }

  public function update(?array $data): void
  {
    $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);


    $muscleGroupTrainings = (new MuscleGroupTraining())->find("training_id = :a", "a={$data["training_id"]}")->fetch(true);

    $trainingUpdate = (new Training())->findById($data["training_id"]);

    $trainingUpdate->name_training = $data["name_training"];
    $trainingUpdate->save();

    if (!empty($muscleGroupTrainings)) {
      foreach ($muscleGroupTrainings as $muscleGroupTraining) {
        $muscleGroupTraining->destroy();
      }
    }

    foreach ($data["muscle_group_id"] as $item) {
      $muscleGroupTraininCreate = (new MuscleGroupTraining());

      $muscleGroupTraininCreate->training_id = $data["training_id"];
      $muscleGroupTraininCreate->muscle_group_id = $item;

      $muscleGroupTraininCreate->save();
    }

    $this->message->success("Atualizado com sucesso!")->flash();
    echo json_encode(["reload" => true]);
    return;
  }

  public function delete(?array $data): void
  {
    $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

    $muscleGroupTrainings = (new MuscleGroupTraining())->find("training_id = :a", "a={$data["training_id"]}")->fetch(true);

    foreach ($muscleGroupTrainings as $muscleGroupTraining) {
      $muscleGroupTraining->destroy();
    }


  }

  public function positions(?array $data): void
  {
    $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

    if ($data["action"] == "up") {

      $newPosition = $data["position"] - 1;

      $training1 = (new TrainingExercise())->find("training_id = :a and position = :b", "a={$data["training_id"]}&b={$data["position"]}")->fetch();
      $training2 = (new TrainingExercise())->find("training_id = :a and position = :b", "a={$data["training_id"]}&b={$newPosition}")->fetch();

      $training1->position = $newPosition;
      $training2->position = $data["position"];

      $training1->save();
      $training2->save();

      echo json_encode(["reload" => true]);
      return;

    } else {
      $newPosition = $data["position"] + 1;

      $training1 = (new TrainingExercise())->find("training_id = :a and position = :b", "a={$data["training_id"]}&b={$data["position"]}")->fetch();
      $training2 = (new TrainingExercise())->find("training_id = :a and position = :b", "a={$data["training_id"]}&b={$newPosition}")->fetch();

      $training1->position = $newPosition;
      $training2->position = $data["position"];

      $training1->save();
      $training2->save();

      echo json_encode(["reload" => true]);
      return;
    }

  }

  public function positionPosturalAnalysis(?array $data): void
  {
    $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

    if ($data["action"] == "up") {

      $newPosition = $data["position"] - 1;

      $training1 = (new PosturalAnalysisImages())->find("postural_analysis_id = :a and position = :b", "a={$data["postural_analysis_id"]}&b={$data["position"]}")->fetch();
      $training2 = (new PosturalAnalysisImages())->find("postural_analysis_id = :a and position = :b", "a={$data["postural_analysis_id"]}&b={$newPosition}")->fetch();

      $training1->position = $newPosition;
      $training2->position = $data["position"];

      $training1->save();
      $training2->save();

      echo json_encode(["reload" => true]);
      return;

    } else {
      $newPosition = $data["position"] + 1;

      $training1 = (new PosturalAnalysisImages())->find("postural_analysis_id = :a and position = :b", "a={$data["postural_analysis_id"]}&b={$data["position"]}")->fetch();
      $training2 = (new PosturalAnalysisImages())->find("postural_analysis_id = :a and position = :b", "a={$data["postural_analysis_id"]}&b={$newPosition}")->fetch();

      $training1->position = $newPosition;
      $training2->position = $data["position"];

      $training1->save();
      $training2->save();

      echo json_encode(["reload" => true]);
      return;
    }
  }

  public function CloneExercise(?array $data)
  {
    $trainingExerciseSearch = (new TrainingExercise())->findById($data["clone_exercise_id"]);

    $trainingExerciseCreate = new TrainingExercise();

    $trainingExerciseCreate->training_id = $trainingExerciseSearch->training_id;
    $trainingExerciseCreate->exercise_id = $data["exercise_id"];
    $trainingExerciseCreate->series = isset($data["optionSerie"]) == false ? $data["series"] : $trainingExerciseSearch->series;
    $trainingExerciseCreate->minimal_repetition = isset($data["optionMinimalRepetition"]) == false ? $data["minimal_repetition"] : $trainingExerciseSearch->minimal_repetition;
    $trainingExerciseCreate->maximum_repetition = 0;
    $trainingExerciseCreate->rest = isset($data["optionrest"]) == false ? $data["rest"] : $trainingExerciseSearch->rest;
    $trainingExerciseCreate->observation = isset($data["optionObservation"]) == false ? $data["observation"] : $trainingExerciseSearch->observation;
    $trainingExerciseCreate->intensification_method = isset($data["optionIntensificationMethod"]) == false ? $data["intensification_method"] : $trainingExerciseSearch->intensification_method;
    $trainingExerciseCreate->position = 1000000000;

    $trainingExerciseCreate->save();

    $trainingExercisePositionUpdate = (new TrainingExercise())->find("training_id = :training_id", "training_id={$trainingExerciseSearch->training_id}")->order("position")->fetch(true);

    for ($a = 1; $a <= count($trainingExercisePositionUpdate); $a++) {
      $positionUpdate = $a - 1;

      $trainingExercisePositionUpdate[$positionUpdate]->position = $a;

      $trainingExercisePositionUpdate[$positionUpdate]->save();
    }


    $this->message->success("Exercício criado com sucesso...")->flash();
    echo json_encode(["reload" => true]);
    return;

  }

  public function CloneTraining(?array $data): void
  {
    $trainingExercises = (new TrainingExercise())->find("training_id = :a", "a={$data["training_selected_id"]}")->fetch(true);

    $postion = 10000000;
    for ($a = 0; $a < count($trainingExercises); $a++) {
      $trainingExercisesCreate = new TrainingExercise();

      $trainingExercisesCreate->training_id = $data["current_workout"];
      $trainingExercisesCreate->exercise_id = $trainingExercises[$a]->exercise_id;
      $trainingExercisesCreate->series = $trainingExercises[$a]->series;
      $trainingExercisesCreate->minimal_repetition = $trainingExercises[$a]->minimal_repetition;
      $trainingExercisesCreate->maximum_repetition = $trainingExercises[$a]->maximum_repetition;
      $trainingExercisesCreate->rest = $trainingExercises[$a]->rest;
      $trainingExercisesCreate->observation = $trainingExercises[$a]->observation;
      $trainingExercisesCreate->position = $trainingExercises[$a]->position + $postion;
      $trainingExercisesCreate->video = $trainingExercises[$a]->video;
      $trainingExercisesCreate->intensification_method = $trainingExercises[$a]->intensification_method;

      $trainingExercisesCreate->save();
    }

    $trainingExercisePositionUpdate = (new TrainingExercise())->find("training_id = :training_id", "training_id={$data["current_workout"]}")->order("position")->fetch(true);

    for ($b = 1; $b <= count($trainingExercisePositionUpdate); $b++) {
      $positionUpdate = $b - 1;

      $trainingExercisePositionUpdate[$positionUpdate]->position = $b;

      $trainingExercisePositionUpdate[$positionUpdate]->save();
    }

    $muscleGroupTrainingDelete = (new MuscleGroupTraining())->find("training_id = :a", "a={$data["current_workout"]}")->fetch(true);

    for ($c = 0; $c < count($muscleGroupTrainingDelete); $c++) {
      $muscleGroupTrainingDeleteSelected = (new MuscleGroupTraining())->findById($muscleGroupTrainingDelete[$c]->id);
      $muscleGroupTrainingDeleteSelected->destroy();
    }

    $muscleGroupTraining = (new MuscleGroupTraining())->find("training_id = :a", "a={$data["training_selected_id"]}")->fetch(true);

    for ($d = 0; $d < count($muscleGroupTraining); $d++) {
      $muscleGroupTrainingCreate = new MuscleGroupTraining();

      $muscleGroupTrainingCreate->training_id = $data["current_workout"];
      $muscleGroupTrainingCreate->muscle_group_id = $muscleGroupTraining[$d]->muscle_group_id;

      $muscleGroupTrainingCreate->save();
    }


    $this->message->success("Treino clonado com sucesso...")->flash();
    echo json_encode(["reload" => true]);
    return;
  }
  
}
