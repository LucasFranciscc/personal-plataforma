<?php


namespace Source\Models;


use Source\Core\Model;

class BirthdayMessage extends Model
{
  public function __construct()
  {
    parent::__construct("birthday_message", ["id"], ["msg"]);
  }
}