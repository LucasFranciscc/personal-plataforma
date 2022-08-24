<?php 

namespace Source\Models;

use Source\Core\Model;

class StudentAddress extends Model {
    public function __construct()
    {
        parent::__construct("student_address", ["id"], ["zip_code", "address", "number", "complement", "district", "state", "city", "user_id"]);
    }
}