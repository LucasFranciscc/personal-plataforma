<?php

namespace Source\Controllers;

use Source\Models\Testimonial;
use Source\Support\Thumb;
use Source\Support\Upload;

class Depositions extends App
{
    public function __construct()
    {
        parent::__construct();
    }

    public function depositions(): void
    {
        $depositions = (new Testimonial())->find()->order("name")->fetch(true);

        $head = $this->seo->render(
            CONF_SITE_NAME . " | Videos",
            CONF_SITE_DESC,
            url("/admin"),
            url("/admin/assets/images/image.jpg"),
            false
        );

        echo $this->view->render("views/depositions", [
            "head" => $head,
            "depositions" => $depositions
        ]);
    }

    public function create(?array $data): void
    {
        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        $depoimentsCreate = new Testimonial();

        $depoimentsCreate->name = $data["name"];
        $depoimentsCreate->testimonial = $data["testimonial"];

        if (!empty($_FILES["photo"])) {
            $min = 1;
            $max = 100000000000;
            $namePhoto = rand($min, $max);

            $dataFile = $_FILES["photo"];
            $upload = new Upload();
            $image = $upload->image($dataFile, $namePhoto);

            $depoimentsCreate->photo = $image;

            if (!$image) {
                $json["message"] = $upload->message()->render();
                echo json_encode($json);
                return;
            }
        }

        $depoimentsCreate->save();

        $this->message->success("Depoimento cadastrado com sucesso!")->flash();
        echo json_encode(["reload" => true]);
        return;

    }

    public function update(?array $data): void
    {
        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        $depoimentsUpdate = (new Testimonial())->findById($data["id"]);

        $depoimentsUpdate->name = $data["name"];
        $depoimentsUpdate->testimonial = $data["testimonial"];

        if (!empty($_FILES["photo"])) {

            if ($depoimentsUpdate->photo && file_exists(__DIR__ . "/../../" . CONF_UPLOAD_DIR . "/{$depoimentsUpdate->photo}")) {
                unlink(__DIR__ . "/../../" . CONF_UPLOAD_DIR . "/{$depoimentsUpdate->photo}");
                (new Thumb())->flush($depoimentsUpdate->photo);
            }

            $min = 1;
            $max = 100000000000;
            $namePhoto = rand($min, $max);

            $files = $_FILES["photo"];
            $upload = new Upload();
            $image = $upload->image($files, $namePhoto);

            if (!$image) {
                $json["message"] = $upload->message()->render();
                echo json_encode($json);
                return;
            }

            $depoimentsUpdate->photo = $image;
        }

        $depoimentsUpdate->save();

        $this->message->success("Depoimento atualizado com sucesso!")->flash();
        echo json_encode(["reload" => true]);
        return;

    }

    public function delete(?array $data): void
    {
        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        $depoimentsDelete = (new Testimonial())->findById($data["id"]);

        if ($depoimentsDelete->photo && file_exists(__DIR__ . "/../../" . CONF_UPLOAD_DIR . "/{$depoimentsDelete->photo}")) {
            unlink(__DIR__ . "/../../" . CONF_UPLOAD_DIR . "/{$depoimentsDelete->photo}");
            (new Thumb())->flush($depoimentsDelete->photo);
        }

        $depoimentsDelete->destroy();

        $this->message->success("Depoimento deletado com sucesso!")->flash();
        echo json_encode(["reload" => true]);
        return;

    }
}