<?php

namespace Source\Controllers;

use Source\Core\Controller;
use Source\Models\Anamnese;
use Source\Models\Auth;
use Source\Models\Blog;
use Source\Models\BlogCategory;
use Source\Models\FormFilling;
use Source\Models\Par_q;
use Source\Models\PosturalEvaluation;
use Source\Models\Presentation;
use Source\Models\Status;
use Source\Models\Testimonial;
use Source\Support\Pager;
use Source\Support\Upload;

class Web extends Controller
{
  public function __construct()
  {
    parent::__construct(__DIR__ . "/../../themes/" . CONF_VIEW_THEME . "/");
  }

  public function home(): void
  {

    $depoiments = (new Testimonial())->find()->order("name")->fetch(true);

    $head = $this->seo->render(
      CONF_SITE_NAME . " | Home",
      CONF_SITE_DESC,
      url("/admin"),
      theme("/assets/images/logo3.png"),
      false
    );

    echo $this->view->render("views/landing2", [
      "head" => $head,
      "depoiments" => $depoiments
    ]);
  }

  public function blog(?array $data): void
  {
    $blogs = (new Blog())->find();
    $pager = new Pager(url("/blog/p/"));
    $pager->pager($blogs->count(), 6, ($data['page'] ?? 1));

    $categories = (new BlogCategory())->find()->order("category DESC")->fetch(true);

    $head = $this->seo->render(
      CONF_SITE_NAME . " | Blogs",
      CONF_SITE_DESC,
      url("/admin"),
      theme("/assets/images/image.jpg"),
      false
    );

    echo $this->view->render("views/blog", [
      "head" => $head,
      "blogs" => $blogs->order("created_at DESC")->limit($pager->limit())->offset($pager->offset())->fetch(true),
      "paginator" => $pager->render(),
      "categories" => $categories
    ]);
  }

  public function blogCategory(array $data): void
  {
    $category = (new BlogCategory())->findById($data["category_id"]);

    if (!$category) {
      redirect("/blog");
    }

    $blogCategory = (new Blog())->find("category_id = :c", "c={$category->id}");
    $page = (!empty($data['page']) && filter_var($data['page'], FILTER_VALIDATE_INT) >= 1 ? $data['page'] : 1);
    $pager = new Pager(url("/blog/em/{$category->id}/"));
    $pager->pager($blogCategory->count(), 6, $page);

    $head = $this->seo->render(
      CONF_SITE_NAME . " | Categorias",
      CONF_SITE_DESC,
      theme("/assets/images/image.jpg"),
      false
    );

    $categories = (new BlogCategory())->find()->order("category DESC")->fetch(true);

    echo $this->view->render("views/blog", [
      "head" => $head,
      "title" => "Artigos em {$category->title}",
      "desc" => $category->description,
      "blogs" => $blogCategory
        ->limit($pager->limit())
        ->offset($pager->offset())
        ->order("created_at DESC")
        ->fetch(true),
      "paginator" => $pager->render(),
      "categories" => $categories
    ]);
  }

  public function blogPost(array $data): void
  {
    $post = (new Blog())->findByUri($data['uri']);
    if (!$post) {
      redirect("/404");
    }

    $user = Auth::user();
    if (!$user || $user->level > 1) {
      $post->views += 1;
      $post->save();
    }

    $categories = (new BlogCategory())->find()->order("category DESC")->fetch(true);

    $head = $this->seo->render(
      "{$post->title} - " . CONF_SITE_NAME,
      $post->subtitle,
      url("/blog/{$post->uri}"),
      ($post->cover ? image($post->cover, 1200, 628) : theme("/assets/images/share.jpg"))
    );

    echo $this->view->render("views/blog_post", [
      "head" => $head,
      "post" => $post,
      "categories" => $categories
    ]);
  }

  public function landingPage(?array $data): void
  {
    $head = $this->seo->render(
      CONF_SITE_NAME . " | Página de venda",
      CONF_SITE_DESC,
      theme("/assets/images/image.jpg"),
      false
    );

    echo $this->view->render("views/landing1", [
      "head" => $head
    ]);
  }

  public function landingPage2(?array $data): void
  {
    $head = $this->seo->render(
      CONF_SITE_NAME . " | Página de venda",
      CONF_SITE_DESC,
      theme("/assets/images/image.jpg"),
      false
    );

    echo $this->view->render("views/landing2", [
      "head" => $head
    ]);
  }

  public function recover(?array $data): void
  {
    if (Auth::user()) {
      redirect("/app");
    }


    if (!empty($data['csrf'])) {
      //            if (!csrf_verify($data)) {
      //                $json['message'] = $this->message->error("Erro ao enviar, favor use o formulário")->render();
      //                echo json_encode($json);
      //                return;
      //            }

      if (empty($data["email"])) {
        $json['message'] = $this->message->info("Informe seu e-mail para continuar")->render();
        echo json_encode($json);
        return;
      }

      if (request_repeat("webforget", $data["email"])) {
        $json['message'] = $this->message->error("Ooops! Você já tentou este e-mail antes")->render();
        echo json_encode($json);
        return;
      }

      $auth = new Auth();
      if ($auth->forget($data["email"])) {
        $json["message"] = $this->message->success("Acesse seu e-mail para recuperar a senha")->render();
      } else {
        $json["message"] = $auth->message()->before("Ooops! ")->render();
      }

      echo json_encode($json);
      return;
    }

    $head = $this->seo->render(
      CONF_SITE_NAME . " | Recuperar senha",
      CONF_SITE_DESC,
      theme("/assets/images/image.jpg"),
      false
    );

    echo $this->view->render("views/recover", [
      "head" => $head
    ]);
  }

  public function reset(?array $data): void
  {
    if (Auth::user()) {
      redirect("/app");
    }

    if (!empty($data['csrf'])) {
      if (!csrf_verify($data)) {
        $json['message'] = $this->message->error("Erro ao enviar, favor use o formulário")->render();
        echo json_encode($json);
        return;
      }

      if (empty($data["password"]) || empty($data["password_re"])) {
        $json["message"] = $this->message->info("Informe e repita a senha para continuar")->render();
        echo json_encode($json);
        return;
      }

      list($email, $code) = explode("|", $data["code"]);
      $auth = new Auth();

      if ($auth->reset($email, $code, $data["password"], $data["password_re"])) {
        $this->message->success("Senha alterada com sucesso")->flash();
        $json["redirect"] = url("/login");
      } else {
        $json["message"] = $auth->message()->before("Ooops! ")->render();
      }

      echo json_encode($json);
      return;
    }

    $head = $this->seo->render(
      CONF_SITE_NAME . " | Recuperar senha",
      CONF_SITE_DESC,
      theme("/assets/images/image.jpg"),
      false
    );

    echo $this->view->render("views/reset", [
      "head" => $head,
      "code" => $data["code"]
    ]);
  }

  public function par_q(?array $data): void
  {
//    $formFilling = (new FormFilling())->find("user_id = :user_id", "user_id={$data["user_id"]}")->order("id desc")->fetch();
//
//    if ($formFilling->status == "não preenchido" and $formFilling->par_q_id != null) {
//      header('Location: ' . url("/avaliacao_postural/{$data["user_id"]}"));
//    } elseif ($formFilling->status == "preenchido") {
//      header('Location: ' . urlExterna("/login"));
//    }

    $head = $this->seo->render(
      CONF_SITE_NAME . " | Par-q",
      CONF_SITE_DESC,
      url("/admin"),
      theme("/assets/images/image.jpg"),
      false
    );

    echo $this->view->render("views/forms/par-q", [
      "head" => $head,
      "user_id" => $data["user_id"]
    ]);
  }

  public function anamnese(?array $data): void
  {
//    $formFilling = (new FormFilling())->find("user_id = :user_id", "user_id={$data["user_id"]}")->order("id desc")->fetch();
//
//    $formFillingCount = (new FormFilling())->find("user_id = :user_id", "user_id={$data["user_id"]}")->count();
//
//    if ($formFillingCount == 1 && $formFilling->status == "não preenchido") {
//      header('Location: ' . url("/par_q/{$data["user_id"]}"));
//    }
//
//
//    if ($formFilling->status == "não preenchido" and $formFilling->anamnese_id != null) {
//      header('Location: ' . url("/par_q/{$data["user_id"]}"));
//    } elseif ($formFilling->status == "preenchido" && $formFilling->anamnese_id == null) {
//      header('Location: ' . url("/anamnese/{$data["user_id"]}"));
//    }

    $head = $this->seo->render(
      CONF_SITE_NAME . " | Par-q",
      CONF_SITE_DESC,
      url("/admin"),
      theme("/assets/images/image.jpg"),
      false
    );

    echo $this->view->render("views/forms/anamnese", [
      "head" => $head,
      "user_id" => $data["user_id"]
    ]);
  }

  public function avaliacao_postural(?array $data): void
  {
//    $formFilling = (new FormFilling())->find("user_id = :user_id", "user_id={$data["user_id"]}")->order("id desc")->fetch();
//
//    if ($formFilling->status == "preenchido") {
//      header('Location: ' . urlExterna("/login"));
//    }

    $head = $this->seo->render(
      CONF_SITE_NAME . " | Par-q",
      CONF_SITE_DESC,
      url("/admin"),
      theme("/assets/images/image.jpg"),
      false
    );

    echo $this->view->render("views/forms/avaliacao-postural", [
      "head" => $head,
      "user_id" => $data["user_id"]
    ]);
  }


  public function formControl(?array $data): void
  {
    $formFilling = (new FormFilling())->find("user_id = :user_id", "user_id={$data["user_id"]}")->order("id desc")->fetch();

    $formFillingCount = (new FormFilling())->find("user_id = :user_id", "user_id={$data["user_id"]}")->count();

    $status = (new Status())->find("user_id = :user_id", "user_id={$data["user_id"]}")->fetch();

    if ($formFilling == null) {
      $formFillingNew = new FormFilling();
      $formFillingNew->user_id = $data["user_id"];
      $formFillingNew->status = "não preenchido";
      $formFillingNew->validity = date('Y-m-d', strtotime('+8 week'));
      $formFillingNew->save();

      if ($status == null) {
        $statusCreate = new Status();
        $statusCreate->user_id = $data["user_id"];
        $statusCreate->status = "processando";
        $statusCreate->save();
      }

      header('Location: ' . urlExterna("/login"));
      return;
    }

    if ($formFillingCount == 1 && $formFilling->status == "não preenchido") {
      if ($formFilling->anamnese_id == null) {
        header('Location: ' . url("/anamnese/{$data["user_id"]}"));
        return;
      } elseif ($formFilling->par_q_id == null) {
        header('Location: ' . url("/par_q/{$data["user_id"]}"));
        return;
      } elseif ($formFilling->postural_evaluation_id == null) {
        header('Location: ' . url("/avaliacao_postural/{$data["user_id"]}"));
        return;
      } else {
        $formFilling->status = "preenchido";
        $formFilling->save();
        header('Location: ' . urlExterna("/login"));
        return;
      }
    }

    if ($formFillingCount > 1 && $formFilling->status == "não preenchido") {
      if ($formFilling->anamnese_id == null) {
        header('Location: ' . url("/anamnese/{$data["user_id"]}"));
        return;
      } elseif ($formFilling->postural_evaluation_id == null) {
        header('Location: ' . url("/avaliacao_postural/{$data["user_id"]}"));
        return;
      } else {
        $formFilling->status = "preenchido";
        $formFilling->save();
        header('Location: ' . urlExterna("/login"));
        return;
      }
    }

    if ($formFilling->status == "preenchido" and date_fmt($formFilling->validity, "Y/m/d") <= date('Y/m/d')) {
      $formFillingNew = new FormFilling();
      $formFillingNew->user_id = $data["user_id"];
      $formFillingNew->status = "não preenchido";
      $formFillingNew->validity = date('Y-m-d', strtotime('+8 week'));
      $formFillingNew->save();

      header('Location: ' . urlExterna("/login"));
      return;
    }

    if ($formFilling->status == "preenchido") {
      if ($formFilling->anamnese_id == null){
        header('Location: ' . url("/anamnese/{$data["user_id"]}"));
        return;
      } elseif ($formFilling->postural_evaluation_id == null) {
        header('Location: ' . url("/avaliacao_postural/{$data["user_id"]}"));
        return;
      }
    }

    $status->status = "ok";
    $status->save();

    header('Location: ' . urlExterna("/home"));
  }

  public function forms(?array $data): void
  {

//    $formFilling = (new FormFilling())->find("user_id = :user_id", "user_id={$data["user_id"]}")->order("id desc")->fetch();
//
//    if ($formFilling->status == "preenchido") {
//      $formFillingCreate = new FormFilling();
//
//      $formFillingCreate->user_id = $data["user_id"];
//      $formFillingCreate->validity = date('Y-m-d', strtotime('+12 month', strtotime(date('Y-m-d'))));
//
//      $formFillingCreate->save();
//    }

    if ($data["form"] == "anamnese") {
      $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

      $anamneseCreate = new Anamnese();

      $anamneseCreate->user_id = $data["user_id"];
      $anamneseCreate->question1 = $data["question1"];
      $anamneseCreate->question2 = $data["question2"];
      $anamneseCreate->question3 = $data["question3"];
      $anamneseCreate->question4 = $data["question4"];
      $anamneseCreate->question5 = $data["question5"];
      $anamneseCreate->question6 = $data["question6"];
      $anamneseCreate->question7 = $data["question7"];
      $anamneseCreate->creation_date = date("Y-m-d");

      $anamneseCreate->save();

      $formFillingUpdate = (new FormFilling())->find("user_id = :user_id and status = 'não preenchido'", "user_id={$data["user_id"]}")->fetch();

      if ($formFillingUpdate != null) {
        $formFillingUpdate->anamnese_id = $anamneseCreate->id;

        $formFillingUpdate->save();
      } else {
        $formFilling = (new FormFilling())->find("user_id = :user_id", "user_id={$data["user_id"]}")->order("id desc")->fetch();

        $formFilling->anamnese_id = $anamneseCreate->id;
        $formFilling->save();
      }

      echo json_encode(["redirect" => url("/formControl/{$data["user_id"]}")]);
      return;
    } elseif ($data["form"] == "par_q") {
      $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

      $parqCreate = new Par_q();

      $parqCreate->user_id = $data["user_id"];
      $parqCreate->question1 = $data["question1"];
      $parqCreate->question2 = $data["question2"];
      $parqCreate->question3 = $data["question3"];
      $parqCreate->question4 = $data["question4"];
      $parqCreate->question5 = $data["question5"];
      $parqCreate->question6 = $data["question6"];
      $parqCreate->question7 = $data["question7"];
      $parqCreate->question8 = $data["question8"];
      $parqCreate->question9 = $data["question9"];
      $parqCreate->question10 = $data["question10"];
      $parqCreate->term = "Concordado";
      $parqCreate->creation_date = date("Y-m-d");

      $parqCreate->save();

      $formFillingUpdate = (new FormFilling())->find("user_id = :user_id and status = 'não preenchido'", "user_id={$data["user_id"]}")->fetch();

      $formFillingUpdate->par_q_id = $parqCreate->id;
      $formFillingUpdate->validity = date('Y-m-d', strtotime('+12 month', strtotime(date('Y-m-d'))));

      $formFillingUpdate->save();

      echo json_encode(["redirect" => url("/formControl/{$data["user_id"]}")]);
      return;
    } elseif ($data["form"] == "avaliacao_postural") {
      $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

      $avaliacaoPosturalCreate = new PosturalEvaluation();

      $avaliacaoPosturalCreate->user_id = $data["user_id"];

      if (!empty($_FILES["photo1"])) {
        $files = $_FILES["photo1"];
        $upload = new Upload();
        $image = $upload->image($files, uniqid(), 1000);

        $avaliacaoPosturalCreate->photo1 = $image;
      }
      if (!empty($_FILES["photo2"])) {
        $files = $_FILES["photo2"];
        $upload = new Upload();
        $image = $upload->image($files, uniqid(), 1000);

        $avaliacaoPosturalCreate->photo2 = $image;
      }
      if (!empty($_FILES["photo3"])) {
        $files = $_FILES["photo3"];
        $upload = new Upload();
        $image = $upload->image($files, uniqid(), 1000);

        $avaliacaoPosturalCreate->photo3 = $image;
      }
      if (!empty($_FILES["photo4"])) {
        $files = $_FILES["photo4"];
        $upload = new Upload();
        $image = $upload->image($files, uniqid(), 1000);

        $avaliacaoPosturalCreate->photo4 = $image;
      }
      if (!empty($_FILES["photo5"])) {
        $files = $_FILES["photo5"];
        $upload = new Upload();
        $image = $upload->image($files, uniqid(), 1000);

        $avaliacaoPosturalCreate->photo5 = $image;
      }
      if (!empty($_FILES["photo6"])) {
        $files = $_FILES["photo6"];
        $upload = new Upload();
        $image = $upload->image($files, uniqid(), 1000);

        $avaliacaoPosturalCreate->photo6 = $image;
      }
      if (!empty($_FILES["photo7"])) {
        $files = $_FILES["photo7"];
        $upload = new Upload();
        $image = $upload->image($files, uniqid(), 1000);

        $avaliacaoPosturalCreate->photo7 = $image;
      }
      if (!empty($_FILES["photo8"])) {
        $files = $_FILES["photo8"];
        $upload = new Upload();
        $image = $upload->image($files, uniqid(), 1000);

        $avaliacaoPosturalCreate->photo8 = $image;
      }
      if (!empty($_FILES["photo9"])) {
        $files = $_FILES["photo9"];
        $upload = new Upload();
        $image = $upload->image($files, uniqid(), 1000);

        $avaliacaoPosturalCreate->photo9 = $image;
      }

      $avaliacaoPosturalCreate->creation_date = date("Y-m-d");

      $avaliacaoPosturalCreate->save();

      $formFillingUpdate = (new FormFilling())->find("user_id = :user_id and status = 'não preenchido'", "user_id={$data["user_id"]}")->fetch();

      if ($formFillingUpdate != null) {
        $formFillingUpdate->postural_evaluation_id = $avaliacaoPosturalCreate->id;
        $formFillingUpdate->status = "preenchido";
        $formFillingUpdate->save();
      } else {
        $formFilling = (new FormFilling())->find("user_id = :user_id", "user_id={$data["user_id"]}")->order("id desc")->fetch();

        $formFilling->postural_evaluation_id = $avaliacaoPosturalCreate->id;
        $formFilling->save();
      }


      echo json_encode(["redirect" => url("/formControl/{$data["user_id"]}")]);
      return;
    }
  }

  public function error(array $data): void
  {
    $error = new \stdClass();

    switch ($data['errcode']) {
      case "problemas":
        $error->code = "OPS";
        $error->title = "Estamos enfrentando problemas!";
        $error->message = "Parece que nosso serviço não está diponível no momento. Já estamos vendo isso mas caso precise, envie um e-mail :)";
        $error->linkTitle = "ENVIAR E-MAIL";
        $error->link = "mailto:" . CONF_MAIL_SUPPORT;
        break;

      case "manutencao":
        $error->code = "OPS";
        $error->title = "Desculpe. Estamos em manutenção!";
        $error->message = "Voltamos logo! Por hora estamos trabalhando para melhorar nosso conteúdo para você controlar melhor as suas contas :P";
        $error->linkTitle = null;
        $error->link = null;
        break;

      default:
        $error->code = $data['errcode'];
        $error->title = "Ooops. Conteúdo indispinível :/";
        $error->message = "Sentimos muito, mas o conteúdo que você tentou acessar não existe, está indisponível no momento ou foi removido :/";
        $error->linkTitle = "Continue navegando!";
        $error->link = url_back();
        break;
    }

    $head = $this->seo->render(
      "{$error->code} | {$error->title}",
      $error->message,
      url("/ops/{$error->code}"),
      theme("/assets/images/share.jpg"),
      false
    );

    echo $this->view->render("views/error", [
      "head" => $head,
      "error" => $error
    ]);
  }

  public function video1(?array $data)
  {
    $user = Auth::user();

    if (isset($data) && $data["action"] == "update") {
      $presentation = (new Presentation())->find("user_id = :a", ":a={$data["user_id"]}")->fetch();

      $presentation->video1 = "Assistido";

      $presentation->save();

      $result['status'] = "Alterado";

      return json_encode($result);
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
      "user_id" => $data["user_id"]
    ]);
  }

  public function video2(?array $data): void
  {
    $user = Auth::user();

    if (!isset($data) && $data["action"] == "update") {
      $presentation = (new Presentation())->find("user_id = :a", ":a={$user->id}")->fetch();

      $presentation->video1 = "Assistido";

      $presentation->save();

      echo json_encode(["redirect" => url("/video2/{$user->id}")]);
      return;
    }

    $head = $this->seo->render(
      CONF_SITE_NAME . " | Video 2",
      CONF_SITE_DESC,
      url("/admin"),
      url("/admin/assets/images/image.jpg"),
      false
    );

    echo $this->view->render("views/video2", [
      "head" => $head,
    ]);
  }

  public function plans(): void
  {
    $head = $this->seo->render(
      CONF_SITE_NAME . " | Planos",
      CONF_SITE_DESC,
      url("/admin"),
      theme("/assets/images/logo3.png"),
      false
    );

    echo $this->view->render("views/plans", [
      "head" => $head
    ]);
  }
}
