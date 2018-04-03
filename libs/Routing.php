<?php

class Routing {

  function __construct() {

    //get controllerName, action, paramAction from URL
    $url = $_SERVER['REQUEST_URI'];
    $url = explode('/', $url);
    $controllerName = (empty($url[1]) ? 'main' : $url[1]);
    $action = (empty($url[2]) ? 'index' : $url[2]);
    $paramAction = (empty($url[3]) ? '' : $url[3]);

    //load controller
    $controllerPath = 'controllers/' . $controllerName . '.php';
    if (file_exists($controllerPath)) {
      require_once($controllerPath);
      $controller = new $controllerName();
    } else {
      $this->error();
    }

    //start controller's action
    if (method_exists($controller, $action)) {
      $controller->$action($paramAction);
    } else {
      $this->error();
    }

  }

  // load page error
  function error() {
    require_once('controllers/error.php');
    $error = new Errors();
    $error->index('');
    die();
  }
}
