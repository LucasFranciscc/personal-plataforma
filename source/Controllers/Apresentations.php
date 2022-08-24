<?php

namespace Source\Controllers;

use Source\Models\Auth;
use Source\Models\Presentation;

class Apresentations extends App
{
    public function __construct()
    {
        parent::__construct();
    }

    public function video1(?array $data): void
    {
        $user = Auth::user();

        if (!empty($data) && $data["action"] == "update") {
            $presentation = (new Presentation())->find("user_id = :a", ":a={$user->id}")->fetch();

            $presentation->video1 = "Assistido";

            $presentation->save();

            echo json_encode(["redirect" => url("/video2/{$user->id}")]);
            return;
        }

        $head = $this->seo->render(
            CONF_SITE_NAME . " | Video 1",
            CONF_SITE_DESC,
            url("/admin"),
            url("/admin/assets/images/image.jpg"),
            false
        );

        echo $this->view->render("views/video1", [
            "head" => $head,
        ]);
    }
}