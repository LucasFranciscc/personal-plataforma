<?php

namespace Source\Controllers;

use Source\Core\Connect;
use Source\Models\Exercise;
use Source\Models\MuscleGroups;
use Source\Models\MuscleGroupsExercise;
use Source\Support\Pager;
use Source\Support\Upload;

class Exercises extends App
{
    public function __construct()
    {
        parent::__construct();
    }

    public function exercise_list(?array $data): void
    {


      $exercise = (new Exercise())->find()->order("title")->fetch(true);

        $head = $this->seo->render(
            CONF_SITE_NAME . " | Exercícios",
            CONF_SITE_DESC,
            url("/admin"),
            url("/admin/assets/images/image.jpg"),
            false
        );

        echo $this->view->render("views/exercises/exercise", [
            "head" => $head,
            "exercises" => $exercise
        ]);
    }

    public function exercisePost(?array $data): void
    {
        //create
        if (!empty($data["action"]) && $data["action"] == "create") {
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

            $ExerciseCreate = new Exercise();
            $ExerciseCreate->title = $data["title"];
            $ExerciseCreate->description = $data["description"];
            $ExerciseCreate->video_code = $data["video_code"];


//            if (!empty($_FILES["file"])) {
//                $dataFile = $_FILES["file"];
//                $upload = new Upload();
//                $file = $upload->media($dataFile, $dataFile["name"]);
//
//                $ExerciseCreate->video_code = $file;
//
//                if (!$file) {
//                    $json["message"] = $upload->message()->render();
//                    echo json_encode($json);
//                    return;
//                }
//            }

            if (!$ExerciseCreate->save()) {
                $json["message"] = $ExerciseCreate->message()->render();
                echo json_encode($json);
                return;
            }

            $this->message->success("Exercício cadastrado com sucesso...")->flash();
            echo json_encode(["reload" => true]);
            return;
        }

        //Update
        if (!empty($data["action"]) && $data["action"] == "update") {
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
            $exerciseUpdate = (new Exercise())->findById($data["id"]);

            if (!$exerciseUpdate) {
                $this->message->error("Você tentou gerenciar um treino que não existe")->flash();
                echo json_encode(["redirect" => url("/app/exercises")]);
                return;
            }

            $exerciseUpdate->title = $data["title"];
            $exerciseUpdate->description = $data["description"];
            $exerciseUpdate->video_code = $data["video_code"];

            if (!$exerciseUpdate->save()) {
                $json["message"] = $exerciseUpdate->message()->render();
                echo json_encode($json);
                return;
            }

            $this->message->success("Exercício atualizado com sucesso...")->flash();
            echo json_encode(["reload" => true]);
            return;
        }
    }

    public function exercise_view(?array $data): void
    {
        $exercise = (new Exercise)->findById($data["exercise_id"]);

        $muscleGroup = Connect::getInstance()->query("
            select * from muscle_groups as a 
            inner join muscle_groups_exercise as b
            on a.id = b.muscle_group_id
            where b.exercises_id = {$data["exercise_id"]}
        ")->fetchAll();

        $head = $this->seo->render(
            CONF_SITE_NAME . " | Exercícios",
            CONF_SITE_DESC,
            url("/admin"),
            url("/admin/assets/images/image.jpg"),
            false
        );

        echo $this->view->render("views/exercises/exerciseView", [
            "head" => $head,
            "exercises" => $exercise,
            "muscleGroups" => $muscleGroup
        ]);
    }

    public function muscle_groups_exercise_list(?array $data): void
    {
        $muscleGroupExerciseLinked = (new MuscleGroups())->find(" id in(select a.id from muscle_groups a inner join muscle_groups_exercise b on a.id = b.muscle_group_id where b.exercises_id = :exercises_id)", "exercises_id={$data["exercise_id"]}")->limit(1)->fetch(true);
        $muscleGroupExerciseNotLinked = (new MuscleGroups())->find(" id not in(select a.id from muscle_groups a inner join muscle_groups_exercise b on a.id = b.muscle_group_id where b.exercises_id = :exercises_id)", "exercises_id={$data["exercise_id"]}")->fetch(true);

        if (!empty($muscleGroupExerciseLinked)) {
            if (count($muscleGroupExerciseLinked) >= 1) {
                $muscleGroupExerciseLinkedAll = (
                new MuscleGroups())
                    ->find(
                        " id in(select a.id from muscle_groups a 
                        inner join muscle_groups_exercise b 
                        on a.id = b.muscle_group_id 
                        where b.exercises_id = :exercises_id 
                        and a.id != :a and a.id != :b )",
                        "exercises_id={$data["exercise_id"]}
                        &a={$muscleGroupExerciseLinked[0]->id}
                        &b={$muscleGroupExerciseLinked[0]->id}")
                    ->fetch(true);
            } else {
                $muscleGroupExerciseLinkedAll = null;
            }
        } else {
            $muscleGroupExerciseLinkedAll = null;
        }


        $head = $this->seo->render(
            CONF_SITE_NAME . " | Vincular categorias ao treino",
            CONF_SITE_DESC,
            url("/admin"),
            url("/admin/assets/images/image.jpg"),
            false
        );

        echo $this->view->render("views/exercises/muscleGroupExercise", [
            "head" => $head,
            "muscleGroupExerciseLinked" => $muscleGroupExerciseLinked,
            "muscleGroupExerciseLinkedAll" => $muscleGroupExerciseLinkedAll,
            "muscleGroupExerciseNotLinked" => $muscleGroupExerciseNotLinked,
            "exercises" => (new Exercise)->findById($data["exercise_id"])
        ]);
    }

    public function muscle_groups_exercise(?array $data): void
    {
        /** Add exercise */
        if (!empty($data["action"]) && $data["action"] == "add") {
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

            $MuscleGroupsExerciseAdd = new MuscleGroupsExercise();
            $MuscleGroupsExerciseAdd->muscle_group_id = $data["muscle_group_id"];
            $MuscleGroupsExerciseAdd->exercises_id = $data["exercise_id"];

            if (!$MuscleGroupsExerciseAdd->save()) {
                $json["message"] = $MuscleGroupsExerciseAdd->message()->render();
                echo json_encode($json);
                return;
            }

            $this->message->success("Grupo muscular vinculado com sucesso...")->flash();
            echo json_encode(["reload" => true]);
            return;
        }

        /** Remove exercise */
        if (!empty($data["action"]) && $data["action"] == "remove") {
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
            $MuscleGroupsExerciseRemove = (new MuscleGroupsExercise())->find("exercises_id = :exercises_id and muscle_group_id = :muscle_group_id", "exercises_id={$data["exercise_id"]}&muscle_group_id={$data["muscle_group_id"]}")->fetch();

            $MuscleGroupsExerciseRemove->destroy();

            $this->message->success("Grupo muscular desvinculado com sucesso...")->flash();
            echo json_encode(["reload" => true]);
            return;
        }
    }
}
