<!--
$this->data: ['id', 'login', 'fullName', 'email', 'role']
$this->iAdmin: true, false
$this->filter: [filter: 'login', 'fillName', 'role'; sort: 'sortby']
-->

<h1>Список пользователей</h1>
<?php if ($loggedIn && $role=='admin'):?>
  <a href="/users/newUser">Добавить нового пользователя</a>
<?php endif ?>
<table class="table table-hover">
  <thead>
    <tr>
      <th>id</th>
      <th>Логин</th>
      <th>ФИО</th>
      <th>E-mail</th>
      <th>Роль</th>
      <th></th>
      <?php if ($role == 'admin'):?>
        <th></th>
      <?php endif ?>
    </tr>
  </thead>

    <form action="/users" method="post">
      <tr>
        <td><span class="text-success">Фильтр</span></td>
        <td><input type="text" class="form-control form-control-sm" name="login" value="<?=$this->filter['filterLogin']?>"></td>
        <td><input type="text" class="form-control form-control-sm" name="fullName" value="<?=$this->filter['filterFullName']?>"></td>
        <td></td>
        <td>
          <select class="form-control form-control-sm" name="role">
            <option></option>
            <option <?php if ($this->filter['filterRole'] == 'admin'):?> selected <?php endif ?> >Администратор</option>
            <option <?php if ($this->filter['filterRole'] == 'user'):?> selected <?php endif ?> >Пользователь</option>
          </select>
        </td>
        <td rowspan="2" colspan="2" style="vertical-align: middle">
          <input type="submit" class="btn btn-success" name="apply" value="Применить"><br />
          <input type="submit" class="btn btn-default" value="Сбросить">
        </td>
      </tr>
      <tr>
        <td colspan="2"><span class="text-success">Сортировать по полю:</span></td>
        <td>
          <select class="form-control form-control-sm" name="sortby">
            <option></option>
            <option <?php if ($this->filter['sortby'] == 'login'):?> selected <?php endif ?> >Логин</option>
            <option <?php if ($this->filter['sortby'] == 'fullName'):?> selected <?php endif ?> >ФИО</option>
            <option <?php if ($this->filter['sortby'] == 'email'):?> selected <?php endif ?> >Роль</option>
          </select>
        </td>
        <td></td>
        <td></td>
      </tr>
    </form>
  <?php foreach ($this->data as $value):?>
    <tr>
      <td><?=$value['id']?></td>
      <td><?=$value['login']?></td>
      <td><?=$value['fullName']?></td>
      <td><?=$value['email']?></td>
      <td><?=($value['role'] == 'admin' ? 'Администратор' : 'Пользователь')?></td>
      <?php if ($this->iAdmin):?>
        <td> <a href="users/userProfile/<?=$value['id']?>">Edit</a> </td>
        <td> <a class="alert-danger" href="users/delUser/<?=$value['id']?>">Delete</a> </td>
      <?php else: ?>
        <td> <a href="users/userProfile/<?=$value['id']?>">Profile</a> </td>
      <?php endif ?>
    </tr>
  <?php endforeach ?>
</table>
