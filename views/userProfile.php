<?php
//data: ['id', 'login', 'fullName', 'email', 'role']
$id = $this->data['id'];
$login = $this->data['login'];
$fullName = $this->data['fullName'];
$email = $this->data['email'];
$role = $this->data['role'];
?>

<form action="/users/editSave/<?=$id?>" method="post">
  <h1>Профиль пользователя</h1>
  <div class="form-group row">
    <label for="login" class="col-md-2 col-form-label">Логин</label>
    <div class="col-md-4">
      <input type="text" class="form-control" name="login" id="login" value="<?=$login?>" />
    </div>
  </div>
  <?php if($this->iAdmin) echo '
  <div class="form-group row">
    <label for="password" class="col-md-2 col-form-label">Пароль</label>
    <div class="col-md-4">
      <input type="text" class="form-control" name="password" id="password">
    </div>
  </div>';
  ?>
  <div class="form-group row">
    <label for="fullName" class="col-md-2 col-form-label">ФИО</label>
    <div class="col-md-4">
      <input type="text" class="form-control" name="fullName" id="fullName" value="<?=$fullName?>" />
    </div>
  </div>
  <div class="form-group row">
    <label for="email" class="col-md-2 col-form-label">E-mail</label>
    <div class="col-md-4">
      <input type="email" class="form-control" name="email" id="email" value="<?=$email?>" />
    </div>
  </div>
  <div class="form-group row">
    <label class="col-md-2 col-form-label">Роль</label>
    <div class="col-md-4">
      <select class="form-control" name="role">
        <option value="admin" <?php if ($role=='admin') echo 'selected'?> >Администратор</option>
        <option value="user" <?php if ($role=='user') echo 'selected'?> >Пользователь</option>
      </select>
    </div>
  </div>
  <div class="offset-md-2">
    <input type="button" class="btn btn-default" onclick="history.back();" value="Назад"/>
    <?php if($this->iAdmin) echo '
    <input type="submit" class="btn btn-primary" value="Сохранить"/>';
    ?>
  </div>
</form>
