<?php

class _setNameController_ extends Controller
{

  function __construct()
  {
    parent::__construct();
  }

  function index($arg) {
    //load view, model
    //view->data => model->getData
    $this->loadModel('set name_model');
    $this->loadView('set name');
  }


}
