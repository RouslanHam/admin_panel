<?php

class Users_Model extends Model
{

  function __construct()
  {
    parent::__construct();
  }

  function getUserList($data) {
    //return list users = array[id, login, 'fullName', 'email', role] from Database
    //return loggedUser = array[Idmin: true/false] from Session
    $sql = 'SELECT id, login, fullName, email, role FROM my_users';
    if (!empty($data)) {
      $sqlFilterOn = false;
      if (!empty($data['filterLogin'])) {
        $sqlFilterOn = true;
        $sql .= " WHERE login LIKE '%{$data['filterLogin']}%'";
      }
      if (!empty($data['filterFullName'])) {
        $sql .= $sqlFilterOn? " AND " : " WHERE ";
        $sqlFilterOn = true;
        $sql .= "fullName LIKE '%{$data['filterFullName']}%'";
      }
      if (!empty($data['filterRole'])) {
        $sql .= $sqlFilterOn? " AND " : " WHERE ";
        $sql .= "role = '{$data['filterRole']}'";
      }
      if (!empty($data['sortby'])) $sql .= " ORDER BY {$data['sortby']}";
    }
    $stm = $this -> db -> prepare($sql);
    $stm -> execute();
    $data = $stm -> fetchAll();
    return $data;
  }

  function getUserProfile($id){
    //return data user_id = array[id, login, 'fullName', 'email', role] from Database
    $stm = $this -> db -> prepare('SELECT id, login, password, fullName, email, role FROM my_users WHERE id = :id');
    $stm -> execute(array(':id' => $id));
    return $stm -> fetch();
  }

  function delUser($id) {
    //delete user_id from Database
    $stm = $this -> db -> prepare('DELETE FROM my_users WHERE id = :id');
    $stm -> execute(array(':id' => $id));
  }

  function createUser($data) {
    //$data['login', 'password', 'fullName', 'email', 'role']
    //add new user into Database
    $stm = $this -> db -> prepare('INSERT INTO my_users (login, password, fullName, email, role)
                                  VALUES (:login, :password, :fullName, :email, :role)');
    $stm -> execute(array(
      ':login' => $data['login'],
      ':password' => $data['password'],
      ':fullName' => $data['fullName'],
      ':email' => $data['email'],
      ':role' => $data['role']
    ));
  }

  function editSave($data) {
    //$data['id', 'login', 'password', 'fullName', 'email', 'role']
    //check e-mail
    $email = $data['email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) && $email !== "") {
      return "emailError";
    }
    //update data user_id into Database
    $stm = $this -> db -> prepare('UPDATE my_users SET login = :login, password = :password, fullName = :fullName,
                      email = :email, role = :role WHERE id = :id');
    $stm -> execute(array(
      ':id' => $data['id'],
      ':login' => $data['login'],
      ':password' => $data['password'],
      ':fullName' => $data['fullName'],
      ':email' => $data['email'],
      ':role' => $data['role']
    ));
  }


}
