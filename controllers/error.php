<?php

class Errors extends Controller
{

  function __construct()
  {
    parent::__construct();
  }

  function index($arg) {
    //load page Error
    $this->loadView('error');
  }

}
