<?php

namespace Source\Controllers;

use Source\Core\Connect;
use Source\Models\User;

class NewStudents extends App
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index(): void
  {
    $students = Connect::getInstance()->query("
        select *
        from users as a
        where a.id not in (select user_id from postural_analysis)
        and status = 1
        ")->fetchAll();

    $head = $this->seo->render(
      CONF_SITE_NAME . " | Novos Alunos",
      CONF_SITE_DESC,
      url("/admin"),
      url("/admin/assets/images/image.jpg"),
      false
    );

    echo $this->view->render("views/NewStudents/index", [
      "head" => $head,
      "students" => $students
    ]);
  }

  public function students(?array $data): void
  {
//    $students = (new User())->find("created_at >= :a and created_at <= :b and id not in (select user_id from postural_analysis)", "a={$data["start"]}&b={$data["end"]}")->fetch(true);

    $students = Connect::getInstance()->query("
        select *
        from users as a
        where a.created_at >= '{$data["start"]}'
        and a.created_at <= '{$data["end"]}'
        and id not in (select user_id from postural_analysis)
        and status = 1
        ")->fetchAll();

    $head = $this->seo->render(
      CONF_SITE_NAME . " | Novos Alunos",
      CONF_SITE_DESC,
      url("/admin"),
      url("/admin/assets/images/image.jpg"),
      false
    );

    echo $this->view->render("views/NewStudents/_students", [
      "head" => $head,
      "students" => $students
    ]);
  }
}
