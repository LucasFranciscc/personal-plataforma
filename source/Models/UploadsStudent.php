<?php

namespace Source\Models;

use Source\Core\Connect;
use Source\Core\Model;

class UploadsStudent extends Model
{
    public function __construct()
    {
        parent::__construct("uploads_students", ["id"], ["user_id", "name", "upload", "type"]);
    }

    /**
     * @param User $user
     * @return object
     */
    public function filesUpload(User $user): object
    {
        $filesUpload = new \stdClass();
        $filesUpload->name = '';
        $filesUpload->upload = '';
        $filesUpload->type = '';

        $find = Connect::getInstance()->query("
        select * from uploads_students where id = (select max(id) from uploads_students) and user_id = {$user->id} and type = 'file'
        ")->fetch();

        if ($find) {
            $filesUpload->name = $find->name;
            $filesUpload->upload = $find->upload;
            $filesUpload->type = $find->type;
        }

        return $filesUpload;
    }
}
