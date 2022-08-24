<?php

namespace Source\Controllers;

use Source\Core\Connect;
use Source\Models\AccessLevel;
use Source\Models\Auth;
use Source\Models\FormFilling;
use Source\Models\Message;
use Source\Models\PhysicalForm;
use Source\Models\StudentAddress;
use Source\Models\UploadsStudent;
use Source\Models\User;
use Source\Support\Email;
use Source\Support\Pager;
use Source\Support\Upload;

class Students extends App
{
  public function __construct()
  {
    parent::__construct();
  }

  public function students(?array $data): void
  {
    //search redirect
    if (!empty($data["s"])) {
      $s = $data["s"];
      echo json_encode(["redirect" => url("/app/students/{$s}/1")]);
      return;
    }

    $search = null;
    $students = (new User())->find();

    if (!empty($data["search"]) && $data["search"] != "all") {
      $search = $data["search"];
      $students = (new User())->find("MATCH(name, email, phone) AGAINST(:s)", "s={$search}");
      if (!$students) {
        $this->message->info("Sua pesquisa não retornou resultados")->flash();
        redirect("/app/students");
      }
    }

    $all = ($search ?? "all");
    $pager = new Pager(url("/app/students/{$all}/"));
    $pager->pager($students->count(), 8, (!empty($data["page"]) ? $data["page"] : 1));

    $level = (new AccessLevel)->find()->order("level desc")->fetch(true);

    $head = $this->seo->render(
      CONF_SITE_NAME . " | Alunos",
      CONF_SITE_DESC,
      url("/admin"),
      url("/admin/assets/images/image.jpg"),
      false
    );

    echo $this->view->render("views/student/students2", [
      "head" => $head,
      "search" => $search,
      "students" => $students->order("name")->limit($pager->limit())->offset($pager->offset())->fetch(true),
      "paginator" => $pager->render(),
      "levels" => $level
    ]);
  }

  public function student_list(): void
  {
    $student = Connect::getInstance()->query("
            select * from users where id = {$_POST["student_id"]}
        ")->fetch();

    echo json_encode($student);
    return;
  }

  public function UploadFiles(?array $data): void
  {
    //search redirect
    if (!empty($data["s"])) {
      $s = str_search($data["s"]);
      echo json_encode(["redirect" => url("/app/to_manager/{$data["user_id"]}/chat/files/{$s}/1")]);
      return;
    }

    $search = null;
    $files = (new UploadsStudent())->find("user_id = :user_id and type='file'", "user_id={$data["user_id"]}");

    if (!empty($data["search"]) && str_search($data["search"]) != "all") {
      $search = str_search($data["search"]);
      $files = (new UploadsStudent())->find("MATCH(name) AGAINST(:s)", "s={$search}");
      if (!$files->count()) {
        $this->message->info("Sua pesquisa não retornou resultados")->flash();
        redirect("/app/to_manager/{$data["user_id"]}/chat/files");
      }
    }

    $all = ($search ?? "all");
    $pager = new Pager(url("/app/to_manager/{$data["user_id"]}/chat/files/{$all}/"));
    $pager->pager($files->count(), 5, (!empty($data["page"]) ? $data["page"] : 1));

    $head = $this->seo->render(
      CONF_SITE_NAME . " | Arquivos",
      CONF_SITE_DESC,
      url("/admin"),
      url("/admin/assets/images/image.jpg"),
      false
    );

    echo $this->view->render("views/student/files", [
      "head" => $head,
      "student" => (new User)->findById($data["user_id"]),
      "search" => $search,
      "files" => $files->order("id desc")->limit($pager->limit())->offset($pager->offset())->fetch(true),
      "paginator" => $pager->render()

    ]);
  }

  public function UploadPhotos(?array $data): void
  {
    //search redirect
    if (!empty($data["s"])) {
      $s = str_search($data["s"]);
      echo json_encode(["redirect" => url("/app/to_manager/{$data["user_id"]}/chat/photos/{$s}/1")]);
      return;
    }

    $search = null;
    $photos = (new UploadsStudent())->find("user_id = :user_id and type='photo'", "user_id={$data["user_id"]}");

    if (!empty($data["search"]) && str_search($data["search"]) != "all") {
      $search = str_search($data["search"]);
      $photos = (new UploadsStudent())->find("MATCH(name) AGAINST(:s)", "s={$search}");
      if (!$photos->count()) {
        $this->message->info("Sua pesquisa não retornou resultados")->flash();
        redirect("/app/to_manager/{$data["user_id"]}/chat/photos");
      }
    }

    $all = ($search ?? "all");
    $pager = new Pager(url("/app/to_manager/{$data["user_id"]}/chat/photos/{$all}/"));
    $pager->pager($photos->count(), 5, (!empty($data["page"]) ? $data["page"] : 1));

    $head = $this->seo->render(
      CONF_SITE_NAME . " | Imagens",
      CONF_SITE_DESC,
      url("/admin"),
      url("/admin/assets/images/image.jpg"),
      false
    );

    echo $this->view->render("views/student/photos", [
      "head" => $head,
      "student" => (new User)->findById($data["user_id"]),
      "search" => $search,
      "photos" => $photos->order("id desc")->limit($pager->limit())->offset($pager->offset())->fetch(true),
      "paginator" => $pager->render()

    ]);
  }

  public function UploadVideos(?array $data): void
  {
    //search redirect
    if (!empty($data["s"])) {
      $s = str_search($data["s"]);
      echo json_encode(["redirect" => url("/app/to_manager/{$data["user_id"]}/chat/videos/{$s}/1")]);
      return;
    }

    $search = null;
    $videos = (new UploadsStudent())->find("user_id = :user_id and type='video'", "user_id={$data["user_id"]}");

    if (!empty($data["search"]) && str_search($data["search"]) != "all") {
      $search = str_search($data["search"]);
      $videos = (new UploadsStudent())->find("MATCH(name) AGAINST(:s)", "s={$search}");
      if (!$videos->count()) {
        $this->message->info("Sua pesquisa não retornou resultados")->flash();
        redirect("/app/to_manager/{$data["user_id"]}/chat/videos");
      }
    }

    $all = ($search ?? "all");
    $pager = new Pager(url("/app/to_manager/{$data["user_id"]}/chat/videos/{$all}/"));
    $pager->pager($videos->count(), 5, (!empty($data["page"]) ? $data["page"] : 1));

    // $files = (new UploadsStudent())->find("user_id = :user_id and type='file'", "user_id={$data["user_id"]}")->order("id desc")->fetch(true);

    // $photos = (new UploadsStudent())->find("user_id = :user_id and type='photo'", "user_id={$data["user_id"]}")->order("id desc")->fetch(true);

    // $videos = (new UploadsStudent())->find("user_id = :user_id and type='video'", "user_id={$data["user_id"]}")->order("id desc")->fetch(true);

    $head = $this->seo->render(
      CONF_SITE_NAME . " | Vídeos",
      CONF_SITE_DESC,
      url("/admin"),
      url("/admin/assets/images/image.jpg"),
      false
    );

    echo $this->view->render("views/student/videos", [
      "head" => $head,
      "student" => (new User)->findById($data["user_id"]),
      "search" => $search,
      "videos" => $videos->order("id desc")->limit($pager->limit())->offset($pager->offset())->fetch(true),
      "paginator" => $pager->render()

    ]);
  }

  public function student(?array $data): void
  {
    //create
    if (!empty($data["action"]) && $data["action"] == "create") {
      $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

      $dataBirt = str_replace("/", "-", $data["birth"]);
      $birth = date('Y-m-d', strtotime($dataBirt));

      $phone = preg_replace("/[^0-9]/", "", $data["phone"]);

      $studentCreate = new User();
      $studentCreate->name = $data["name"];
      $studentCreate->birth = $birth;
      $studentCreate->phone = $phone;
      $studentCreate->cpf = preg_replace("/[^0-9]/", "", $data["cpf"]);
      $studentCreate->sex = $data["sex"];
      $studentCreate->email = $data["email"];
      $studentCreate->password = "aluno12345";
      $studentCreate->access_level_id = $data["access_level_id"];
      $studentCreate->profession = $data["profession"];

      if (!$studentCreate->save()) {
        $json["message"] = $studentCreate->message()->render();
        echo json_encode($json);
        return;
      }

//            $physicalFormCreate = new PhysicalForm();
//            $physicalFormCreate->user_id = $studentCreate->id;
//            $physicalFormCreate->next_fill = date("Y-m-d");
//
//            $physicalFormCreate->save();

      $formFillingCreate = new FormFilling();

      $formFillingCreate->user_id = $studentCreate->id;
      $formFillingCreate->validity = date('Y-m-d', strtotime('+12 month', strtotime(date('Y-m-d'))));

      $formFillingCreate->save();


      if (!empty($data["zip_code"])) {
        $studentAddressCreate = new StudentAddress();
        $studentAddressCreate->zip_code = $data["zip_code"];
        $studentAddressCreate->address = $data["address"];
        $studentAddressCreate->number = $data["number"];
        $studentAddressCreate->complement = $data["complement"];
        $studentAddressCreate->district = $data["district"];
        $studentAddressCreate->state = $data["state"];
        $studentAddressCreate->city = $data["city"];
        $studentAddressCreate->user_id = $studentCreate->id;

        $studentAddressCreate->save();
      }

      (new Email)->bootstrap(
        "Conta criada na " . CONF_SITE_NAME,
        "Sua senha é aluno12345",
        $data["email"],
        "{$data["name"]}"
      )->send();

      $this->message->success("Cadastrado com sucesso...")->flash();
      $json["redirect"] = url("/app/students");

      echo json_encode($json);
      return;
    };

    //Update
    if (!empty($data["action"]) && $data["action"] == "update") {
      $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
      $studentUpdate = (new User())->findById($data["id"]);
      $studentAddressUpdate = (new StudentAddress)->find("user_id = :user_id", "user_id={$data["id"]}")->fetch();

      if (!$studentUpdate) {
        $this->message->error("Você tentou gerenciar um aluno que não existe")->flash();
        echo json_encode(["redirect" => url("/app/students")]);
        return;
      }

      $dataBirt = str_replace("/", "-", $data["birth"]);
      $birth = date('Y-m-d', strtotime($dataBirt));

      $phone = preg_replace("/[^0-9]/", "", $data["phone"]);

      $studentUpdate->name = $data["name"];
      $studentUpdate->birth = $birth;
      $studentUpdate->phone = $phone;
      $studentUpdate->cpf = preg_replace("/[^0-9]/", "", $data["cpf"]);
      $studentUpdate->sex = $data["sex"];
      $studentUpdate->email = $data["email"];
      $studentUpdate->password = (!empty($data["password"]) ? $data["password"] : $studentUpdate->password);
      $studentUpdate->access_level_id = $data["access_level_id"];
      $studentUpdate->profession = $data["profession"];

      if (!$studentUpdate->save()) {
        $json["message"] = $studentUpdate->message()->render();
        echo json_encode($json);
        return;
      }
      if (!empty($studentAddressUpdate)) {
        $studentAddressUpdate->zip_code = $data["zip_code"];
        $studentAddressUpdate->address = $data["address"];
        $studentAddressUpdate->number = $data["number"];
        $studentAddressUpdate->complement = $data["complement"];
        $studentAddressUpdate->district = $data["district"];
        $studentAddressUpdate->state = $data["state"];
        $studentAddressUpdate->city = $data["city"];

        $studentAddressUpdate->save();
      } else {
        $studentAddressCreate = new StudentAddress();
        $studentAddressCreate->zip_code = $data["zip_code"];
        $studentAddressCreate->address = $data["address"];
        $studentAddressCreate->number = $data["number"];
        $studentAddressCreate->complement = $data["complement"];
        $studentAddressCreate->district = $data["district"];
        $studentAddressCreate->state = $data["state"];
        $studentAddressCreate->city = $data["city"];
        $studentAddressCreate->user_id = $data["id"];

        $studentAddressCreate->save();
      }

      $this->message->success(" Atualizado com sucesso...")->flash();
      echo json_encode(["reload" => true]);
      return;
    }
  }

  public function student_detail(?array $data)
  {
    $student = (new User())->find("id = :id", "id={$data["user_id"]}")->fetch();

    $messageIncoming = (new Message())->find("incoming_msg_id = :incoming_msg_id", "incoming_msg_id={$data["user_id"]}")->fetch(true);

    $head = $this->seo->render(
      CONF_SITE_NAME . " | Alunos",
      CONF_SITE_DESC,
      url("/admin"),
      url("/admin/assets/images/image.jpg"),
      false
    );

    echo $this->view->render("views/student/student_detail", [
      "head" => $head,
      "student" => $student,
      "incomings" => $messageIncoming
    ]);
  }

  public function video(?array $data): void
  {

    var_dump($data);

    if (!empty($_FILES["video-blob"])) {
      $files = $_FILES["video-blob"];

      array_shift($files);

      $files["name"] = "video.mp4";

      $title = passwd($files["name"]);

      $upload = new Upload();
      $video = $upload->media($files, $title);

      if (!$video) {
        $json["message"] = $upload->message()->render();
        echo json_encode($json);
        return;
      }

      var_dump($video);
      exit();
    }

    $head = $this->seo->render(
      CONF_SITE_NAME . " | Video",
      CONF_SITE_DESC,
      url("/admin"),
      url("/admin/assets/images/image.jpg"),
      false
    );

    echo $this->view->render("views/student/video", [
      "head" => $head,
      "student_id" => $data["user_id"]
    ]);
  }

  public function student_physical_form(?array $data): void
  {
    $student = (new User())->find("id = :id", "id={$data["user_id"]}")->fetch();

    $physicalForm = Connect::getInstance()->query("
            SELECT * FROM physical_form as a 
            inner join answered_form as b 
            on a.id = b.physical_form_id 
            where a.user_id = {$data["user_id"]} and a.status = 'sent'
            order by a.updated_at desc
        ");

    $head = $this->seo->render(
      CONF_SITE_NAME,
      CONF_SITE_DESC,
      url("/admin/assets/images/image.jpg"),
      false
    );

    echo $this->view->render("views/student/student_physical_form", [
      "head" => $head,
      "student" => $student,
      "physicalForms" => $physicalForm
    ]);
  }

  public function search_student(?array $data): void
  {
    $students = (new User())->find("name like '%{$_POST["query"]}%'")->limit(4)->fetch(true);

    $output = '';
    $output = '<ul class="list" style="background-color: #eeeeee; cursor: pointer;">';
    if (isset($students)) {

      foreach ($students as $student) {
        $output .= '<li style="padding: 12px;">' . $student->name . '</li>';
      }
    } else {
      $output .= '<p>Nenhum aluno encontrado</p>';
    }
    $output .= '</ul>';
    echo $output;
  }
}
