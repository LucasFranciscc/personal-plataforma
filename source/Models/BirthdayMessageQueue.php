<?php


namespace Source\Models;


use Source\Core\Model;

class BirthdayMessageQueue extends Model
{
  public function __construct()
  {
    parent::__construct("birthday_message_queue", ["id"], ["body"]);
  }
}