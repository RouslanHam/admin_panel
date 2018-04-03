<!--
$this->data: true - correct, false - incorrect
-->

  <form action="/login/submitLogin" method="post">
    <?php
    if ($this->data == false) echo '
    <div>
      <small class="alert-danger">Введен неправильный логин или пароль</small>
    </div>';
    ?>
    <div class="form-group">
      <label class="col-form-label">Login<input class="form-control" type="text" name="login" /></label>
    </div>
    <div class="form-group">
      <label  class="col-form-label">Password<input class="form-control" type="password" name="password" /></label>
    </div>
    <input class="btn btn-primary" type="submit" value="Войти"/>
  </form>
