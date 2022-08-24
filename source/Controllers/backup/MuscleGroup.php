<?php

namespace Source\Controllers;

use Source\Core\Connect;
use Source\Models\Category;
use Source\Models\MuscleGroups;
use Source\Support\Pager;

class MuscleGroup extends App
{
    public function __construct()
    {
        parent::__construct();
    }

    public function muscleGroups(?array $data): void
    {
        //search redirect
        if (!empty($data["s"])) {
            $s = str_search($data["s"]);
            echo json_encode(["redirect" => url("/app/muscle_groups/{$s}/1")]);
            return;
        }

        $search = null;
        $categories = (new MuscleGroups())->find();

        if (!empty($data["search"]) && str_search($data["search"]) != "all") {
            $search = str_search($data["search"]);
            $categories = (new MuscleGroups())->find("MATCH(muscle_group) AGAINST(:s)", "s={$search}");
            if (!$categories->count()) {
                $this->message->info("Sua pesquisa não retornou resultados")->flash();
                redirect("/app/muscle_groups");
            }
        }

        $all = ($search ?? "all");
        $pager = new Pager(url("/app/muscle_groups/{$all}/"));
        $pager->pager($categories->count(), 10, (!empty($data["page"]) ? $data["page"] : 1));



        $head = $this->seo->render(
            CONF_SITE_NAME . " | Grupos musculares",
            CONF_SITE_DESC,
            url("/admin"),
            url("/admin/assets/images/image.jpg"),
            false
        );

        echo $this->view->render("views/muscleGroups", [
            "head" => $head,
            "search" => $search,
            "muscleGroups" => $categories->order("muscle_group")->limit($pager->limit())->offset($pager->offset())->fetch(true),
            "paginator" => $pager->render()
        ]);
    }

    public function muscleGroup(?array $data): void
    {
        //create
        if (!empty($data["action"]) && $data["action"] == "create") {
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

            $muscleGroupCreate = (new MuscleGroups);
            $muscleGroupCreate->muscle_group = $data["muscle_group"];

            $muscleGroupCreate->save();

            if (!$muscleGroupCreate->save()) {
                $json["message"] = $muscleGroupCreate->message()->render();
                echo json_encode($json);
                return;
            }

            $this->message->success("Grupo muscular cadastrado com sucesso...")->flash();
            echo json_encode(["reload" => true]);
            return;
        }

        //Update
        if (!empty($data["action"]) && $data["action"] == "update") {
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
            $MuscleUpdate = (new MuscleGroups())->findById($data["id"]);

            if (!$MuscleUpdate) {
                $this->message->error("Você tentou gerenciar uma categoria que não existe")->flash();
                echo json_encode(["redirect" => url("/app/muscle_groups")]);
                return;
            }

            $MuscleUpdate->muscle_group = $data["muscle_group"];

            if (!$MuscleUpdate->save()) {
                $json["message"] = $MuscleUpdate->message()->render();
                echo json_encode($json);
                return;
            }

            $this->message->success("Grupo muscular atualizado com sucesso...")->flash();
            echo json_encode(["reload" => true]);
            return;
        }

        //Delete
        if (!empty($data["action"]) && $data["action"] == "delete") {
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
            $muscleGroupDelete = (new MuscleGroups())->findById($data["muscle_group_id"]);

            if (!$muscleGroupDelete) {
                $this->message->error("Você tentou excluir um grupo muscular que não existe ou já foi removido")->flash();
                echo json_encode(["reload" => true]);
                return;
            }

            $muscleGroupDelete->destroy();

            if ($muscleGroupDelete->destroy() == false) {
                $this->message->info("O grupo muscular não pode ser deletado por que está vinculado a exercícios...")->flash();
                echo json_encode(["reload" => true]);
                return;
            } else {
                $this->message->success("Grupo muscular deletado com sucesso...")->flash();
                echo json_encode(["reload" => true]);
                return;
            }


        }
    }
}
