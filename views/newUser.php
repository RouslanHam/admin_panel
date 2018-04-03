<form action="/users/createUser" method="post">
  <h1>Добавить пользователя</h1>
  <div class="form-group row">
    <label for="login" class="col-md-2 col-form-label text-md-right">Логин</label>
    <div class="col-md-4">
      <input type="text" class="form-control" id="login" name="login">
    </div>
  </div>
  <div class="form-group row">
    <label for="password" class="col-md-2 col-form-label text-md-right">Пароль</label>
    <div class="col-md-4">
      <input type="text" class="form-control" id="password" name="password">
    </div>
  </div>
  <div class="form-group row">
    <label for="fullName" class="col-md-2 col-form-label text-md-right">ФИО</label>
    <div class="col-md-4">
      <input type="text" class="form-control" id="fullName" name="fullName">
    </div>
  </div>
  <div class="form-group row">
    <label for="email" class="col-md-2 col-form-label text-md-right">E-mail</label>
    <div class="col-md-4">
      <input type="text" class="form-control" id="email" name="email">
    </div>
  </div>
  <div class="form-group row">
    <label for="role" class="col-md-2 col-form-label text-md-right">Роль</label>
    <div class="col-md-4">
      <select class="form-control" id="role" name="role">
        <option value="admin">Администратор</option>
        <option selected value="user">Пользователь</option>
      </select>
    </div>
  </div>
  <div class="offset-md-2">
    <input type="submit" value="Добавить" class="btn btn-primary">
  </div>
</form>
