<?php


namespace Source\Controllers;


use Source\Models\BlogCategory;
use Source\Support\Pager;

class BlogCategories extends App
{
    public function __construct()
    {
        parent::__construct();
    }

    public function categories(?array $data): void
    {
        $blogCategories = (new BlogCategory())->find();
        $all = ($search ?? "all");
        $pager = new Pager(url("/app/blog_categories/{$all}/"));
        $pager->pager($blogCategories->count(), 5, (!empty($data["page"]) ? $data["page"] : 1));



        $head = $this->seo->render(
            CONF_SITE_NAME . " | Categorias",
            CONF_SITE_DESC,
            url("/admin"),
            url("/admin/assets/images/image.jpg"),
            false
        );

        echo $this->view->render("views/blogCategories/categories", [
            "head" => $head,
            "categories" => $blogCategories->order("category")->limit($pager->limit())->offset($pager->offset())->fetch(true),
            "paginator" => $pager->render()
        ]);
    }

    public function category(?array $data): void
    {
        //create
        if (!empty($data["action"]) && $data["action"] == "create") {
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

            $blogCategoryCreate = new BlogCategory();
            $blogCategoryCreate->category = $data["category"];

            $blogCategoryCreate->save();

            $this->message->success("Categoria cadastrada com sucesso...")->flash();
            echo json_encode(["reload" => true]);
            return;
        }

        //Update
        if (!empty($data["action"]) && $data["action"] == "update") {
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
            $blogCategoryUpdate = (new BlogCategory())->findById($data["id"]);

            if (!$blogCategoryUpdate) {
                $this->message->error("Você tentou gerenciar uma categoria que não existe")->flash();
                echo json_encode(["redirect" => url("/app/blog_categories")]);
                return;
            }

            $blogCategoryUpdate->category = $data["category"];

            $blogCategoryUpdate->save();

            $this->message->success("Categoria atualizada com sucesso...")->flash();
            echo json_encode(["reload" => true]);
            return;
        }
    }
}