<?php

class Main extends Controller
{

  function __construct()
  {
    parent::__construct();
  }

  function index($arg) {
    //load main page
    $this->loadView('main');
  }


}
