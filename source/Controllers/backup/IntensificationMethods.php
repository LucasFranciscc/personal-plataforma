<?php


namespace Source\Controllers;


use Source\Models\IntensificationMethod;

class IntensificationMethods extends App
{
  public function __construct()
  {
    parent::__construct();
  }

  public function intensification_methods(?array $data): void
  {

    //create
    if (!empty($data["action"]) && $data["action"] == "create") {
      $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

      $intesificationMethodCreate = new IntensificationMethod();

      $intesificationMethodCreate->intensification_method = $data["intensification_method"];
      $intesificationMethodCreate->save();

      $this->message->success("Cadastrado com sucesso!")->flash();
      echo json_encode(["reload" => true]);
      return;

    } elseif (!empty($data["action"]) && $data["action"] == "update") {
      $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

      $intesificationMethodUpdate = (new IntensificationMethod())->findById($data["id"]);

      $intesificationMethodUpdate->intensification_method = $data["intensification_method"];
      $intesificationMethodUpdate->save();

      $this->message->success("Atualizado com sucesso!")->flash();
      echo json_encode(["reload" => true]);
      return;
    } elseif (!empty($data["action"]) && $data["action"] == "delete") {
      $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

      $intesificationMethodDelete = (new IntensificationMethod())->findById($data["id"]);

      $intesificationMethodDelete->destroy();

      $this->message->success("Deletado com sucesso!")->flash();
      echo json_encode(["reload" => true]);
      return;
    }

    $intesificationMethods = (new IntensificationMethod())->find()->fetch(true);

    $head = $this->seo->render(
      CONF_SITE_NAME . " | Blogs",
      CONF_SITE_DESC,
      url("/admin"),
      url("/admin/assets/images/image.jpg"),
      false
    );

    echo $this->view->render("views/intensification_methods", [
      "head" => $head,
      "intensification_methods" => $intesificationMethods
    ]);
  }
}