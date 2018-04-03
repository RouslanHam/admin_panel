<?php

class Users extends Controller
{

  function __construct()
  {
    parent::__construct();
    Session::init();
    $logged = Session::get('loggedIn');
    if ($logged) {
      $this->loadModel('users_model');
    } else {
      header('location: /login');
    }
  }

  function index() {
    //get parameters filter and sort from sortButton on users list
    //get users list, get role logged user (iAdmin)
    //load page 'users'
    if (isset($_POST['apply'])) {
      $data['filterLogin'] = $_POST['login'];
      $data['filterFullName'] = $_POST['fullName'];
      switch ($_POST['role']) {
        case 'Администратор': $data['filterRole'] = 'admin'; break;
        case 'Пользователь': $data['filterRole'] = 'user'; break;
        default: $data['filterRole'] = '';
      }
      switch ($_POST['sortby']) {
        case 'Логин': $data['sortby'] = 'login'; break;
        case 'ФИО': $data['sortby'] = 'fullName'; break;
        case 'Роль': $data['sortby'] = 'role'; break;
        default: $data['sortby'] = '';
      }
    } else {
      $data['filterLogin'] = '';
      $data['filterFullName'] = '';
      $data['filterRole'] = '';
      $data['sortby'] = '';
    }

    $this->view->filter = $data;
    $this->view->data = $this->model->getUserList($data);
    Session::init();
    $this->view->iAdmin = Session::get('role') == 'admin'? true : false;
    $this->loadView('users');
  }

  function userProfile($id) {
    //call from page 'users' link 'edit'/'profile'
    //get selected User's data (model getUserProfile)
    //get role logged user (iAdmin)
    //load page 'userProfile' - form edit user's profile
    $this->view->data = $this->model->getUserProfile($id);
    Session::init();
    $this->view->iAdmin = Session::get('role') == 'admin'? true : false;
    $this->loadView('userProfile');
  }

  function editSave($id){
    //call from page 'edit profile user' button 'save'
    //save changed user's profile (model editSave)
    //load page 'users'
    //check for role loggedUser == admin
    $this->checkIadmin();
    $data = $this->getPost();
    $data['id'] = $id;
    if ($this->model->editSave($data) == "emailError") {
      $this->loadView('emailError');
    } else {
      header('location: /users');
    }
  }

  function myProfileSave(){
    //call from page 'edit profile user' button 'save'
    //save changed user's profile (model editSave)
    //load page 'users'
    Session::init();
    $id = Session::get('id');
    $data = $this->getPost();
    $data['id'] = $id;
    $data['login'] = $this->model->getUserProfile($id)['login'];
    $data['role'] = $this->model->getUserProfile($id)['role'];
    if ($this->model->editSave($data) == "emailError") {
      $this->loadView('emailError');
    } else {
      header('location: /users');
    }
  }

  function delUser($id){
    //call from page 'users' link 'delete'
    //delete selected user
    //check for role loggedUser == admin
    $this->checkIadmin();
    $this->model->delUser($id);
    header('location: /users');
  }

  function newUser(){
    //load page - form add new User
    //check for role loggedUser == admin
    $this->checkIadmin();
    $this->loadView('newUser');
  }

  function createUser() {
    //call from page 'add User' button 'add'
    //add new User in Database
    //load page 'users'
    //check for role loggedUser == admin
    $this->checkIadmin();
    $data = $this->getPost();
    $this->model->createUser($data);
    header('location: /users');
  }

  function myProfile() {
    //get my data
    //load page edit my profile
    Session::init();
    $id = Session::get('id');
    $this->view->data = $this->model->getUserProfile($id);
    $this->loadView('myProfile');
  }

  function getPost() {
    $data['login'] = isset($_POST['login']) ? $_POST['login'] : '';
    $data['password'] = isset($_POST['password']) ? md5($_POST['password']) : '';
    $data['fullName'] = isset($_POST['fullName']) ? $_POST['fullName'] : '';
    $data['email'] = isset($_POST['email']) ? $_POST['email'] : '';
    $data['role'] = isset($_POST['role']) ? $_POST['role'] : '';
    $data['id'] = isset($_POST['id']) ? $_POST['id'] : '';
    return $data;
  }

  function checkIadmin() {
    Session::init();
    $role = Session::get('role');
    if ($role !== 'admin') {
      header('location: /users');
      die();
    }
  }

}
