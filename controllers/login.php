<?php

class Login extends Controller
{

  function __construct()
  {
    parent::__construct();
    Session::init();
    $this->loadModel('login_model');
  }

  function index($arg) {
    //page login
    $this->view->data = true;
    $this->loadView('login');
  }

  function errorLogin() {
    //page login
    $this->view->data = false;
    $this->loadView('login');
  }

  function submitLogin() {
    //call from page 'login' -> button 'login'
    //load model 'login' - check login, password
    $data['login'] = $_POST['login'];
    $data['password'] = md5($_POST['password']);
    $this->model->login($data);
  }

  function logout() {
    //call from header menu link 'logout'. Load page login
    $this->model->logout();
    header('location: /login');
  }

}
