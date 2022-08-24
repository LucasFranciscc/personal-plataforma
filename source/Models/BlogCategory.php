<?php


namespace Source\Models;


use Source\Core\Model;

class BlogCategory extends Model
{
    public function __construct()
    {
        parent::__construct("blog_categories", ["id"], ["category"]);
    }
}