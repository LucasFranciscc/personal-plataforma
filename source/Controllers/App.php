<?php

namespace Source\Controllers;

use Source\Core\Controller;
use Source\Models\AnsweredForm;
use Source\Models\Auth;
use Source\Models\FormFilling;
use Source\Models\PhysicalForm;
use Source\Models\User;
use Source\Support\Thumb;
use Source\Support\Upload;

class App extends Controller
{
  /** @var User */
  private $user;

  public function __construct()
  {
    parent::__construct(__DIR__ . "/../../themes/" . CONF_VIEW_APP . "/");

    if (!$this->user = Auth::user()) {
      $this->message->warning("Efetue login para acessar.")->flash();
      redirect("/login");
    }
  }

  public function editor(): void
  {

    $url = $_SERVER["REQUEST_URI"];

    $components = parse_url($url);
    parse_str($components["query"], $user_id);

    $head = $this->seo->render(
      CONF_SITE_NAME . " | Editor",
      CONF_SITE_DESC,
      url("/admin/assets/images/image.jpg"),
      false
    );

    echo $this->view->render("editor", [
      "head" => $head,
      "user_id" => $user_id["user_id"]
    ]);
  }

  public function logout(): void
  {
    $this->message->info("Você saiu com sucesso " . Auth::user()->name . ". Volte logo :)")->flash();

    Auth::logout();
    redirect("/login");
  }

  public function physical_form(?array $data): void
  {

    if (!empty($data["action"]) && $data["action"] == "create") {
      $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

      $physicalForm = (new PhysicalForm)->find("user_id = :user_id and status = 'not sent'", "user_id={$this->user->id}")->fetch();

      $answeredForm = new AnsweredForm;

      $answeredFormCreate = new AnsweredForm();
      $answeredFormCreate->physical_form_id = $physicalForm->id;
      $answeredFormCreate->answer_1 = isset($data["answer-1"]) ? $data["answer-1"] : null;
      $answeredFormCreate->answer_2 = isset($data["answer-2"]) ? $data["answer-2"] : null;
      $answeredFormCreate->answer_3 = isset($data["answer-3"]) ? $data["answer-3"] : null;
      $answeredFormCreate->answer_4 = isset($data["answer-4"]) ? $data["answer-4"] : null;
      $answeredFormCreate->answer_5 = isset($data["answer-5"]) ? $data["answer-5"] : null;
      $answeredFormCreate->answer_6 = isset($data["answer-6"]) ? $data["answer-6"] : null;
      $answeredFormCreate->answer_7 = isset($data["answer-7"]) ? $data["answer-7"] : null;
      $answeredFormCreate->answer_8 = isset($data["answer-8"]) ? $data["answer-8"] : null;
      $answeredFormCreate->answer_9 = isset($data["answer-9"]) ? $data["answer-9"] : null;
      $answeredFormCreate->answer_10 = isset($data["answer-10"]) ? $data["answer-10"] : null;
      $answeredFormCreate->answer_11 = isset($data["answer-11"]) ? $data["answer-11"] : null;
      $answeredFormCreate->answer_12 = isset($data["answer-12"]) ? $data["answer-12"] : null;
      $answeredFormCreate->answer_13 = isset($data["answer-13"]) ? $data["answer-13"] : null;
      $answeredFormCreate->answer_14 = isset($data["answer-14"]) ? $data["answer-14"] : null;
      $answeredFormCreate->answer_15 = isset($data["answer-15"]) ? $data["answer-15"] : null;
      $answeredFormCreate->answer_16 = isset($data["answer-16"]) ? $data["answer-16"] : null;
      $answeredFormCreate->answer_17 = isset($data["answer-17"]) ? $data["answer-17"] : null;
      $answeredFormCreate->answer_18 = isset($data["answer-18"]) ? $data["answer-18"] : null;
      $answeredFormCreate->answer_19 = isset($data["answer-19"]) ? $data["answer-19"] : null;
      $answeredFormCreate->answer_20 = isset($data["answer-20"]) ? $data["answer-20"] : null;
      $answeredFormCreate->answer_21 = isset($data["answer-21"]) ? $data["answer-21"] : null;
      $answeredFormCreate->answer_22 = isset($data["answer-22"]) ? $data["answer-22"] : null;
      $answeredFormCreate->answer_23 = isset($data["answer-23"]) ? $data["answer-23"] : null;
      $answeredFormCreate->answer_25 = isset($data["answer-25"]) ? $data["answer-25"] : null;
      $answeredFormCreate->answer_26 = isset($data["answer-26"]) ? $data["answer-26"] : null;
      $answeredFormCreate->answer_27 = isset($data["answer-27"]) ? $data["answer-27"] : null;
      $answeredFormCreate->answer_28 = isset($data["answer-28"]) ? $data["answer-28"] : null;
      $answeredFormCreate->answer_29 = isset($data["answer-29"]) ? $data["answer-29"] : null;
      $answeredFormCreate->answer_30 = isset($data["answer-30"]) ? $data["answer-30"] : null;
      $answeredFormCreate->answer_31 = isset($data["answer-31"]) ? $data["answer-31"] : null;
      $answeredFormCreate->answer_32 = isset($data["answer-32"]) ? $data["answer-32"] : null;
      $answeredFormCreate->answer_33 = isset($data["answer-33"]) ? $data["answer-33"] : null;
      $answeredFormCreate->answer_34 = isset($data["answer-34"]) ? $data["answer-34"] : null;
      $answeredFormCreate->answer_35 = isset($data["answer-35"]) ? $data["answer-35"] : null;
      $answeredFormCreate->answer_36 = isset($data["answer-36"]) ? $data["answer-36"] : null;
      $answeredFormCreate->answer_37 = isset($data["answer-37"]) ? $data["answer-37"] : null;
      $answeredFormCreate->answer_38 = isset($data["answer-38"]) ? $data["answer-38"] : null;
      $answeredFormCreate->answer_39 = isset($data["answer-39"]) ? $data["answer-39"] : null;
      $answeredFormCreate->answer_40 = isset($data["answer-40"]) ? $data["answer-40"] : null;
      $answeredFormCreate->answer_41 = isset($data["answer-41"]) ? $data["answer-41"] : null;
      $answeredFormCreate->answer_42 = isset($data["answer-42"]) ? $data["answer-42"] : null;
      $answeredFormCreate->answer_43 = isset($data["answer-43"]) ? $data["answer-43"] : null;
      $answeredFormCreate->answer_44 = isset($data["answer-44"]) ? $data["answer-44"] : null;
      $answeredFormCreate->answer_45 = isset($data["answer-45"]) ? $data["answer-45"] : null;
      $answeredFormCreate->answer_46 = isset($data["answer-46"]) ? $data["answer-46"] : null;
      $answeredFormCreate->answer_47 = isset($data["answer-47"]) ? $data["answer-47"] : null;
      $answeredFormCreate->answer_48 = isset($data["answer-48"]) ? $data["answer-48"] : null;
      $answeredFormCreate->answer_49 = isset($data["answer-49"]) ? $data["answer-49"] : null;
      $answeredFormCreate->answer_50 = isset($data["answer-50"]) ? $data["answer-50"] : null;

      if (!empty($_FILES["answer-24"])) {
        $files = $_FILES["answer-24"];
        $upload = new Upload();
        $name = "exame-medico-" . $this->user->id . "-" . date('d-m-Y');
        $file1 = $upload->file($files, $name);

        $answeredFormCreate->answer_24 = $file1;
      }

      if (!empty($_FILES["answer-51"])) {
        $files = $_FILES["answer-51"];
        $upload = new Upload();
        $name = "avaliacao-fisica-" . $this->user->id . "-" . date('d/m/Y');
        $file2 = $upload->file($files, $name);

        $answeredFormCreate->answer_51 = $file2;
      }

      if (!empty($_FILES["answer-52"])) {
        $files = $_FILES["answer-52"];
        $upload = new Upload();
        $name = "plano-nutricional-" . $this->user->id . "-" . date('d/m/Y');
        $file3 = $upload->file($files, $name);

        $answeredFormCreate->answer_52 = $file3;
      }

      $answeredFormCreate->save();

      $physicalForm->status = "sent";
      $physicalForm->next_fill = date("Y-m-d", strtotime($physicalForm->next_fill . "+6month"));

      $physicalForm->save();

      $this->message->success("Formulário enviado com sucesso...")->flash();
      echo json_encode(["reload" => true]);
      return;

      return;
    }

    $head = $this->seo->render(
      CONF_SITE_NAME . " | Formuçário físico",
      CONF_SITE_DESC,
      url("/admin/assets/images/image.jpg"),
      false
    );

    echo $this->view->render("views/physicalForm/physicalForm", [
      "head" => $head,
    ]);
  }

  public function user_edit(?array $data): void
  {
    //update
    if (!empty($data["action"]) && $data["action"] == "update") {
      $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
      $userUpdate = (new User())->findById($data["id"]);

      if (!$userUpdate) {
        $this->message->error("Você tentou atualizar um usuário que não existe ou foi removido")->flash();
        echo json_encode(["redirect" => url("/app/user_edit")]);
        return;
      }

      $dataBirt = str_replace("/", "-", $data["birth"]);
      $birth = date('Y-m-d', strtotime($dataBirt));

      $phone = preg_replace("/[^0-9]/", "", $data["phone"]);

      $userUpdate->name = $data["name"];
      $userUpdate->birth = $birth;
      $userUpdate->phone = $phone;
      $userUpdate->cpf = preg_replace("/[^0-9]/", "", $data["cpf"]);
      $userUpdate->sex = $data["sex"];
      $userUpdate->email = $data["email"];
      $userUpdate->password = (!empty($data["password"]) ? $data["password"] : $userUpdate->password);

      //upload cover
      if (!empty($_FILES["cover"])) {
        if ($userUpdate->photo && file_exists(__DIR__ . "/../../" . CONF_UPLOAD_DIR . "/{$userUpdate->photo}")) {
          unlink(__DIR__ . "/../../" . CONF_UPLOAD_DIR . "/{$userUpdate->photo}");
          (new Thumb())->flush($userUpdate->photo);
        }

        $files = $_FILES["cover"];
        $upload = new Upload();
        $image = $upload->image($files, $userUpdate->email);

        if (!$image) {
          $json["message"] = $upload->message()->render();
          echo json_encode($json);
          return;
        }

        $userUpdate->photo = $image;
      }

      if (!$userUpdate->save()) {
        $json["message"] = $userUpdate->message()->render();
        echo json_encode($json);
        return;
      }

      $this->message->success("Perfil atualizado com sucesso...")->flash();
      echo json_encode(["reload" => true]);
      return;
    }

    $head = $this->seo->render(
      CONF_SITE_NAME . " | Editar usuário",
      CONF_SITE_DESC,
      url("/admin/assets/images/image.jpg"),
      false
    );

    echo $this->view->render("views/user_edit", [
      "head" => $head,
    ]);
  }
}
