<?php

require __DIR__ . "/../vendor/autoload.php";

$emailQueue = new \Source\Support\Email();
$emailQueue->sendMessageEmail();