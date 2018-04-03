<?php

class View
{

  function __construct()
  {

  }

  function display($name) {
    require_once('views/_header.php');
    require_once($name);
    require_once('views/_footer.php');
  }
}
