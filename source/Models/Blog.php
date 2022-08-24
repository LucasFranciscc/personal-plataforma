<?php


namespace Source\Models;


use Source\Core\Model;

class Blog extends Model
{
    public function __construct()
    {
        parent::__construct("blogs", ["id"], ["author", "category_id", "title", "subtitle", "content", "cover"]);
    }

    public function findByUri(string $uri, string $columns = "*"): ?Blog
    {
        $find = $this->find("uri = :uri", "uri={$uri}", $columns);
        return $find->fetch();
    }

    public function author(): ?User
    {
        if ($this->author) {
            return (new User())->findById($this->author);
        }
        return null;
    }
}