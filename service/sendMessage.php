<?php

use \Source\Core\Connect;
use \Source\Models\BirthdayMessageQueue;

require __DIR__ . "/../vendor/autoload.php";

$day = date('d');
$month = date('m');

$users = Connect::getInstance()->query("select * from users where day(birth) = {$day} and month(birth) = {$month}")->fetchAll();

$msg = (new \Source\Models\BirthdayMessage())->find()->fetch();

foreach ($users as $user) {
  $queueCreate = new BirthdayMessageQueue();

  $queueCreate->subject = "Parabéns ". $user->name . "! Hoje é um dia mais do que especial :)";
  $queueCreate->body = $msg->msg;
  $queueCreate->from_email = CONF_MAIL_SENDER['address'];
  $queueCreate->from_name = CONF_MAIL_SENDER['name'];
  $queueCreate->recipient_email = $user->email;
  $queueCreate->recipient_name = $user->name;
  $queueCreate->status = "Agendado";

  $queueCreate->save();
}