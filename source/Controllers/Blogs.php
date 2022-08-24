<?php


namespace Source\Controllers;


use Source\Models\Auth;
use Source\Models\Blog;
use Source\Models\BlogCategory;
use Source\Support\Pager;
use Source\Support\Thumb;
use Source\Support\Upload;

class Blogs extends App
{
    public function __construct()
    {
        parent::__construct();
    }

    public function blogs(?array $data): void
    {
        //search redirect
        if (!empty($data["s"])) {
            $s = str_search($data["s"]);
            echo json_encode(["redirect" => url("/app/blogs/{$s}/1")]);
            return;
        }

        $search = null;
        $blogs = (new Blog())->find();

        if (!empty($data["search"]) && str_search($data["search"]) != "all") {
            $search = str_search($data["search"]);
            $blogs = (new blog())->find("MATCH(title) AGAINST(:s)", "s={$search}");
            if (!$blogs->count()) {
                $this->message->info("Sua pesquisa não retornou resultados")->flash();
                redirect("/app/blogs");
            }
        }

        $all = ($search ?? "all");
        $pager = new Pager(url("/app/blogs/{$all}/"));
        $pager->pager($blogs->count(), 10, (!empty($data["page"]) ? $data["page"] : 1));


        $head = $this->seo->render(
            CONF_SITE_NAME . " | Blogs",
            CONF_SITE_DESC,
            url("/admin"),
            url("/admin/assets/images/image.jpg"),
            false
        );

        echo $this->view->render("views/blog/blogs", [
            "head" => $head,
            "search" => $search,
            "blogs" => $blogs->order("created_at DESC")->limit($pager->limit())->offset($pager->offset())->fetch(true),
            "paginator" => $pager->render()
        ]);
    }

    public function blogCreate(?array $data): void
    {
        //MCE Upload
        if (!empty($data["upload"]) && !empty($_FILES["image"])) {
            $files = $_FILES["image"];
            $upload = new Upload();
            $image = $upload->image($files, "post-" . time());

            if (!$image) {
                $json["message"] = $upload->message()->render();
                echo json_encode($json);
                return;
            }

            $json["mce_image"] = '<img style="width: 100%;" src="' . url("/storage/{$image}") . '" alt="{title}" title="{title}">';
            echo json_encode($json);
            return;
        }

        //create
        if (!empty($data["action"]) && $data["action"] == "create") {
            $content = $data["content"];
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

            $blogCategoryCreate = new Blog();
            $blogCategoryCreate->author = Auth::user()->id;
            $blogCategoryCreate->category_id = $data["category_id"];
            $blogCategoryCreate->title = $data["title"];
            $blogCategoryCreate->uri = str_slug($blogCategoryCreate->title);
            $blogCategoryCreate->subtitle = $data["subtitle"];
            $blogCategoryCreate->content = $content;

            //upload cover
            if (!empty($_FILES["cover"])) {
                $files = $_FILES["cover"];
                $upload = new Upload();
                $image = $upload->image($files, $blogCategoryCreate->title);

                if (!$image) {
                    $json["message"] = $upload->message()->render();
                    echo json_encode($json);
                    return;
                }

                $blogCategoryCreate->cover = $image;
            }

            $blogCategoryCreate->save();

            $this->message->success("Blog publicado com sucesso...")->flash();
            $json["redirect"] = url("/app/blogs/update/{$blogCategoryCreate->id} ");

            echo json_encode($json);
            return;
        }

        $blogCategories = (new BlogCategory())->find()->fetch(true);

        $head = $this->seo->render(
            CONF_SITE_NAME . " | Novo artigo",
            CONF_SITE_DESC,
            url("/admin"),
            url("/admin/assets/images/image.jpg"),
            false
        );

        echo $this->view->render("views/blog/create", [
            "head" => $head,
            "blogCategories" => $blogCategories
        ]);
    }

    public function blogUpdate(?array $data): void
    {
        //MCE Upload
        if (!empty($data["upload"]) && !empty($_FILES["image"])) {
            $files = $_FILES["image"];
            $upload = new Upload();
            $image = $upload->image($files, "post-" . time());

            if (!$image) {
                $json["message"] = $upload->message()->render();
                echo json_encode($json);
                return;
            }

            $json["mce_image"] = '<img style="width: 100%;" src="' . url("/storage/{$image}") . '" alt="{title}" title="{title}">';
            echo json_encode($json);
            return;
        }

        //update
        if (!empty($data["action"]) && $data["action"] == "update") {
            $content = $data["content"];
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
            $blogUpdate = (new Blog())->findById($data["id"]);

            if (!$blogUpdate) {
                $this->message->error("Você tentou atualizar um blog que não existe ou foi removido")->flash();
                echo json_encode(["redirect" => url("/app/blog/create")]);
                return;
            }

            //blogUpdate->author = Auth::user()->id;
            $blogUpdate->category_id = $data["category_id"];
            $blogUpdate->title = $data["title"];
            $blogUpdate->uri = str_slug($blogUpdate->title);
            $blogUpdate->subtitle = $data["subtitle"];
            $blogUpdate->content = $content;


            $blogUpdate->save();

            //upload cover
            if (!empty($_FILES["cover"])) {
                if ($blogUpdate->cover && file_exists(__DIR__ . "/../../" . CONF_UPLOAD_DIR . "/{$blogUpdate->cover}")) {
                    unlink(__DIR__ . "/../../" . CONF_UPLOAD_DIR . "/{$blogUpdate->cover}");
                    (new Thumb())->flush($blogUpdate->cover);
                }

                $files = $_FILES["cover"];
                $upload = new Upload();
                $image = $upload->image($files, $blogUpdate->title);

                if (!$image) {
                    $json["message"] = $upload->message()->render();
                    echo json_encode($json);
                    return;
                }

                $blogUpdate->cover = $image;
            }

            if (!$blogUpdate->save()) {
                $json["message"] = $blogUpdate->message()->render();
                echo json_encode($json);
                return;
            }

            $this->message->success("Blog atualizado com sucesso...")->flash();
            echo json_encode(["reload" => true]);
            return;
        }

        $blogEdit = (new Blog())->findById($data["id"]);
        $blogCategories = (new BlogCategory())->find()->fetch(true);

        $head = $this->seo->render(
            CONF_SITE_NAME . " | Editar artigo",
            CONF_SITE_DESC,
            url("/admin"),
            url("/admin/assets/images/image.jpg"),
            false
        );

        echo $this->view->render("views/blog/update", [
            "head" => $head,
            "blog" => $blogEdit,
            "blogCategories" => $blogCategories
        ]);
    }

    public function blogDelete(?array $data): void
    {
        //delete
        if (!empty($data["action"]) && $data["action"] == "delete") {
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
            $blogDelete = (new Blog())->findById($data["id"]);


            if (!$blogDelete) {
                $this->message->error("Você tentou excluir um blog que não existe ou já foi removido")->flash();
                echo json_encode(["reload" => true]);
                return;
            }

            if ($blogDelete->cover && file_exists(__DIR__ . "/../../" . CONF_UPLOAD_DIR . "/{$blogDelete->cover}")) {
                unlink(__DIR__ . "/../../" . CONF_UPLOAD_DIR . "/{$blogDelete->cover}");
                (new Thumb())->flush($blogDelete->cover);
            }

            $blogDelete->destroy();
            $this->message->success("O blog foi excluído com sucesso...")->flash();

            echo json_encode(["reload" => true]);
            return;
        }
    }
}
