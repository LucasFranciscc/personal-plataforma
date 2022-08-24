<?php

namespace Source\Controllers;

use Source\Models\Partnership;
use Source\Support\Pager;
use Source\Support\Thumb;
use Source\Support\Upload;

class Partnerships extends App
{

    public function __construct()
    {
        parent::__construct();
    }

    public function partnerships(?array $data): void
    {
        //search redirect
        if (!empty($data["s"])) {
            $s = str_search($data["s"]);
            echo json_encode(["redirect" => url("/app/partnerships/{$s}/1")]);
            return;
        }

        $search = null;
        $partnerships = (new Partnership())->find();

        if (!empty($data["search"]) && str_search($data["search"]) != "all") {
            $search = str_search($data["search"]);
            $partnerships = (new Partnership())->find("MATCH(name, address) AGAINST(:s)", "s={$search}");
            if (!$partnerships->count()) {
                $this->message->info("Sua pesquisa não retornou resultados")->flash();
                redirect("/app/partnerships");
            }
        }

        $all = ($search ?? "all");
        $pager = new Pager(url("/app/partnerships/{$all}/"));
        $pager->pager($partnerships->count(), 10, (!empty($data["page"]) ? $data["page"] : 1));



        $head = $this->seo->render(
            CONF_SITE_NAME . " | Categorias",
            CONF_SITE_DESC,
            url("/admin"),
            url("/admin/assets/images/image.jpg"),
            false
        );

        echo $this->view->render("views/partnership/partnerships", [
            "head" => $head,
            "search" => $search,
            "partnerships" => $partnerships->order("name")->limit($pager->limit())->offset($pager->offset())->fetch(true),
            "paginator" => $pager->render()
        ]);
    }

    public function partnership(?array $data): void
    {
        //create
        if (!empty($data["action"]) && $data["action"] == "create") {
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

            $partnershipCreate = new Partnership();
            $partnershipCreate->name = $data["name"];
            $partnershipCreate->phone = preg_replace("/[^0-9]/", "", $data["phone"]);
            $partnershipCreate->address = $data["address"];
            $partnershipCreate->description = $data["description"];

            if (!empty($_FILES["image"])) {
                $dataFile = $_FILES["image"];
                $upload = new Upload();
                $image = $upload->image($dataFile, $dataFile["name"]);

                $partnershipCreate->image = $image;

                if (!$image) {
                    $json["message"] = $upload->message()->render();
                    echo json_encode($json);
                    return;
                }
            }

            $partnershipCreate->save();

            $this->message->success("Parceria cadastrada com sucesso...")->flash();
            echo json_encode(["reload" => true]);
            return;
        }

        //update
        if (!empty($data["action"]) && $data["action"] == "update") {
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
            $partnershipUpdate = (new Partnership())->findById($data["id"]);

            if (!$partnershipUpdate) {
                $this->message->error("Você tentou gerenciar um parceiro que não existe")->flash();
                echo json_encode(["redirect" => url("/app/partnerships/partnership")]);
                return;
            }

            $partnershipUpdate->name = $data["name"];
            $partnershipUpdate->phone = preg_replace("/[^0-9]/", "", $data["phone"]);
            $partnershipUpdate->address = $data["address"];
            $partnershipUpdate->description = $data["description"];

            //upload photo
            if (!empty($_FILES["image"])) {
                if ($partnershipUpdate->image && file_exists(__DIR__ . "/../../" . CONF_UPLOAD_DIR . "/{$partnershipUpdate->image}")) {
                    unlink(__DIR__ . "/../../" . CONF_UPLOAD_DIR . "/{$partnershipUpdate->image}");
                    (new Thumb())->flush($partnershipUpdate->image);
                }

                $files = $_FILES["image"];
                $upload = new Upload();
                $image = $upload->image($files, $files["name"]);

                if (!$image) {
                    $json["message"] = $upload->message()->render();
                    echo json_encode($json);
                    return;
                }

                $partnershipUpdate->image = $image;
            }

            $partnershipUpdate->save();

            $this->message->success("Parceria atualizada com sucesso...")->flash();
            echo json_encode(["reload" => true]);
            return;
        }

        //delete
        if (!empty($data["action"]) && $data["action"] == "delete") {
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
            $PartnershipDelete = (new Partnership())->findById($data["id"]);

            if (!$PartnershipDelete) {
                $this->message->error("Você tentnou deletar uma parceria que não existe")->flash();
                echo json_encode(["redirect" => url("/admin/partnerships/partnership")]);
                return;
            }

            if ($PartnershipDelete->image && file_exists(__DIR__ . "/../../" . CONF_UPLOAD_DIR . "/{$PartnershipDelete->image}")) {
                unlink(__DIR__ . "/../../" . CONF_UPLOAD_DIR . "/{$PartnershipDelete->image}");
                (new Thumb())->flush($PartnershipDelete->image);
            }

            $PartnershipDelete->destroy();

            $this->message->success("Parceria deletada com sucesso...")->flash();
            echo json_encode(["reload" => true]);
            return;
        }
    }
}
