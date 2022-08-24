<?php


namespace Source\Models;


use Source\Core\Model;

class PosturalEvaluation extends Model
{
  public function __construct()
  {
    parent::__construct("postural_evaluation", ["id"], ["user_id", "photo1", "photo2", "photo3", "photo4", "photo5", "photo6", "photo7", "photo8", "photo9", "creation_date"]);
  }
}