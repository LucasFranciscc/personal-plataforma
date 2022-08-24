<?php

namespace Source\Models;

use Source\Core\Model;

class AnsweredForm extends Model
{
    public function __construct()
    {
        parent::__construct("answered_form", ["id"], ["physical_form_id"]);
    }
}
