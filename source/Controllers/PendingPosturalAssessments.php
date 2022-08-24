<?php

namespace Source\Controllers;

use Source\Models\PosturalEvaluation;

class PendingPosturalAssessments extends App
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index(): void
  {
    $pending = (new PosturalEvaluation())->find("status = 0")->fetch(true);

    $head = $this->seo->render(
      CONF_SITE_NAME . " | Exercícios",
      CONF_SITE_DESC,
      url("/admin"),
      url("/admin/assets/images/image.jpg"),
      false
    );

    echo $this->view->render("views/pendingPosturalAssessments", [
      "head" => $head,
      "pending" => $pending
    ]);
  }
}