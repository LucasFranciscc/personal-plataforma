<?php


namespace Source\Models;


use Source\Core\Model;

class Par_q extends Model
{
  public function __construct()
  {
    parent::__construct("par_q", ["id"], ["user_id", "question1", "question2", "question3", "question4", "question5", "question6", "question7", "question8", "question9", "question10", "term", "creation_date"]);
  }
}