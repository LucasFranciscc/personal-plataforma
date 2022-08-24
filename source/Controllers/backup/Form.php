<?php


namespace Source\Controllers;


use Source\Core\Controller;

class Form extends Controller
{
  public function __construct()
  {
    parent::__construct(__DIR__ . "/../../themes/" . CONF_VIEW_THEME . "/");
  }


}