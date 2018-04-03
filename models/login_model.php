<?php

class Login_Model extends Model
{

  function __construct()
  {
    parent::__construct();
  }

  function login($data){
    //$data: [login, password]
    //check user password
    //correct: start SESSION: id, role, loggedIn. Load page users.php
    //uncorrect: SESSION destroy, load page login.php
    $stm = $this->db->prepare('SELECT id, role FROM my_users WHERE login = :login AND password = :password');
    $stm->execute(array(
      ':login'=>$data['login'],
      ':password'=>$data['password']
    ));
    $user = $stm->fetch();
    $isCorrect = $stm->rowCount();
    if ($isCorrect>0) {
      Session::init();
      Session::set('id', $user['id']);
      Session::set('role', $user['role']);
      Session::set('loggedIn', true);
      header('location: /users');
    } else {
      Session::destroy();
      header('location: /login/errorLogin');
    }
  }

  function logout() {
    Session::destroy();
  }

}
