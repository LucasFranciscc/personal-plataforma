<?php


namespace Source\Models;


use Source\Core\Model;

class Anamnese extends Model
{
  public function __construct()
  {
    parent::__construct("anamnese", ["id"], ["user_id", "question1", "question2", "question3", "question4", "question5", "question6", "question7", "question8", "creation_date"]);
  }
}