<?php

namespace Source\Controllers;

use Source\Models\Auth;
use Source\Models\Warning;
use Source\Support\Pager;

class Warnings extends App
{
    public function __construct()
    {
        parent::__construct();
    }

    public function warnings(?array $data): void
    {
        //search redirect
        if (!empty($data["s"])) {
            $s = str_search($data["s"]);
            echo json_encode(["redirect" => url("/app/warnings/{$s}/1")]);
            return;
        }

        $search = null;
        $warnings = (new Warning())->find();

        if (!empty($data["search"]) && str_search($data["search"]) != "all") {
            $search = str_search($data["search"]);
            $warnings = (new Warning())->find("MATCH(warning) AGAINST(:s)", "s={$search}");
            if (!$warnings->count()) {
                $this->message->info("Sua pesquisa não retornou resultados")->flash();
                redirect("/app/warnings");
            }
        }

        $all = ($search ?? "all");
        $pager = new Pager(url("/app/warnings/{$all}/"));
        $pager->pager($warnings->count(), 8, (!empty($data["page"]) ? $data["page"] : 1));

        $head = $this->seo->render(
            CONF_SITE_NAME . " | Alunos",
            CONF_SITE_DESC,
            url("/admin"),
            url("/admin/assets/images/image.jpg"),
            false
        );

        echo $this->view->render("views/warning/warnings", [
            "head" => $head,
            "search" => $search,
            "warnings" => $warnings->order("created_at desc")->limit($pager->limit())->offset($pager->offset())->fetch(true),
            "paginator" => $pager->render()
        ]);
    }

    public function warning(?array $data): void
    {
        //create
        if (!empty($data["action"]) && $data["action"] == "create") {
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

            $warningCreate = new Warning();
            $warningCreate->warning = $data["warning"];
            $warningCreate->user_id = Auth::user()->id;

            $warningCreate->save();

            $this->message->success("Aviso cadastrado com sucesso...")->flash();
            $json["redirect"] = url("/app/warnings");

            echo json_encode($json);
            return;
        }

        //Update
        if (!empty($data["action"]) && $data["action"] == "update") {
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
            $WarningUpdate = (new Warning())->findById($data["id"]);

            if (!$WarningUpdate) {
                $this->message->error("Você tentou gerenciar um aviso que não existe")->flash();
                echo json_encode(["redirect" => url("/app/warnings")]);
                return;
            }

            $WarningUpdate->warning = $data["warning"];

            $WarningUpdate->save();

            $this->message->success("Aviso atualizada com sucesso...")->flash();
            echo json_encode(["reload" => true]);
            return;
        }

        //delete
        if (!empty($data["action"]) && $data["action"] == "delete") {
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
            $warningDelete = (new Warning())->findById($data["id"]);

            if (!$warningDelete) {
                $this->message->error("Você tentnou deletar um aviso que não existe")->flash();
                echo json_encode(["redirect" => url("/admin/warnings/warning")]);
                return;
            }

            $warningDelete->destroy();

            $this->message->success("Aviso deletado com sucesso...")->flash();
            echo json_encode(["reload" => true]);
            return;
        }
    }
}
