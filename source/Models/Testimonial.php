<?php

namespace Source\Models;

use Source\Core\Model;

class Testimonial extends Model
{
    public function __construct()
    {
        parent::__construct("depositions", ["id"], ["name", "photo", "testimonial"]);
}
}