<?php
//data: ['login', 'fullName', 'email', 'role']
$login = $this->data['login'];
$fullName = $this->data['fullName'];
$email = $this->data['email'];
$role = $this->data['role'];
?>

<form action="/users/myProfileSave" method="post">
  <h1>Мой профиль</h1>
  <div class="form-group row">
    <label class="col-md-2 col-form-label">Логин</label>
    <div class="col-md-4">
      <input type="text" class="form-control" value="<?=$login?>" disabled>
    </div>
  </div>
  <div class="form-group row">
    <label for="password" class="col-md-2 col-form-label">Пароль</label>
    <div class="col-md-4">
      <input type="text" class="form-control" id="password" name="password">
    </div>
  </div>
  <div class="form-group row">
    <label for="fullName" class="col-md-2 col-form-label">ФИО</label>
    <div class="col-md-4">
      <input type="text" class="form-control" id="fullName" name="fullName" value="<?=$fullName?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="email" class="col-md-2 col-form-label">E-mail</label>
    <div class="col-md-4">
      <input type="text" class="form-control" id="email" name="email" value="<?=$email?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="password" class="col-md-2 col-form-label">Роль</label>
    <div class="col-md-4">
      <input type="text" class="form-control" value="<?php echo($role=="admin" ? 'Администратор' : 'Пользователь')?>" disabled />
    </div>
  </div>
  <div class="offset-2">
    <input type="submit" class="btn btn-primary" value="Сохранить" />
  </div>
</form>
