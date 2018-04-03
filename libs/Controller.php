<?php

class Controller
{

  function __construct()  {
    $this->view = new View();
  }

  function loadModel($name) {
    //require file model
    //defind new object class model
    $path = 'models/' . $name . ".php";
    if(file_exists($path)) {
      require_once($path);
      $this->model = new $name();
    }
  }

  function loadView($name) {
    //require file view
    //display view page
    $path = 'views/' . $name . '.php';
    if(file_exists($path)) {
      $this->view->display($path);
    } else {
      $this->view->display('views/error.php');
    }
  }

}
