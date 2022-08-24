<?php

namespace Source\Controllers;

use Source\Core\Connect;
use Source\Models\Exercise;
use Source\Models\MuscleGroups;
use Source\Models\MuscleGroupsExercise;
use Source\Support\Pager;

class Exercises extends App
{
    public function __construct()
    {
        parent::__construct();
    }
 
    public function exercise_list(?array $data): void
    {
        //search redirect
        if (!empty($data["s"])) {
            $s = str_search($data["s"]);
            echo json_encode(["redirect" => url("/app/exercises/{$s}/1")]);
            return;
        }

        $search = null;
        $exercise = (new Exercise())->find();

        if (!empty($data["search"]) && str_search($data["search"]) != "all") {
            $search = str_search($data["search"]);
            $exercise = (new Exercise())->find("MATCH(title, video_code) AGAINST(:s)", "s={$search}");
            if (!$exercise->count()) {
                $this->message->info("Sua pesquisa não retornou resultados")->flash();
                redirect("/app/exercises");
            }
        }

        $all = ($search ?? "all");
        $pager = new Pager(url("/app/exercises/{$all}/"));
        $pager->pager($exercise->count(), 10, (!empty($data["page"]) ? $data["page"] : 1));


        $head = $this->seo->render(
            CONF_SITE_NAME . " | Exercícios",
            CONF_SITE_DESC,
            url("/admin"),
            url("/admin/assets/images/image.jpg"),
            false
        );

        echo $this->view->render("views/exercises/exercise", [
            "head" => $head,
            "search" => $search,
            "exercises" => $exercise->order("title")->limit($pager->limit())->offset($pager->offset())->fetch(true),
            "paginator" => $pager->render()
        ]);
    }

    public function exercise(?array $data): void
    {
        //create
        if (!empty($data["action"]) && $data["action"] == "create") {
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

            $ExerciseCreate = new Exercise();
            $ExerciseCreate->title = $data["title"];
            $ExerciseCreate->description = $data["description"];
            $ExerciseCreate->video_code = $data["video_code"];

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
        $muscleGroupExerciseLinked = (new MuscleGroups())->find(" id in(select a.id from muscle_groups a inner join muscle_groups_exercise b on a.id = b.muscle_group_id where b.exercises_id = :exercises_id)", "exercises_id={$data["exercise_id"]}");
        $muscleGroupExerciseNotLinked = (new MuscleGroups())->find(" id not in(select a.id from muscle_groups a inner join muscle_groups_exercise b on a.id = b.muscle_group_id where b.exercises_id = :exercises_id)", "exercises_id={$data["exercise_id"]}");

        $head = $this->seo->render(
            CONF_SITE_NAME . " | Vincular categorias ao treino",
            CONF_SITE_DESC,
            url("/admin"),
            url("/admin/assets/images/image.jpg"),
            false
        );

        echo $this->view->render("views/exercises/muscleGroupExercise", [
            "head" => $head,
            "muscleGroupExerciseLinked" => $muscleGroupExerciseLinked->fetch(true),
            "muscleGroupExerciseNotLinked" => $muscleGroupExerciseNotLinked->fetch(true),
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
