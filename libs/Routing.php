<?php

class Routing {

  function __construct() {

    //get controllerName, action, paramAction from URL
    $url = $_SERVER['REQUEST_URI'];
    $url = explode('/', $url);
    $controllerName = 'main';
    $action = 'index';
    $paramAction = '';
    if (!empty($url[1])) {
      $controllerName = $url[1];
    }
    if (!empty($url[2])) {
      $action = $url[2];
    }
    if (!empty($url[3])) {
      $paramAction = $url[3];
    }

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
