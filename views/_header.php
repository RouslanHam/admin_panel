<?php
Session::init();
$role = Session::get('role');
$loggedIn = Session::get('loggedIn');
?>

<!DOCTYPE html>
<html>
<head>
  <title>mvc</title>
  <meta charset="utf-8">
  <link href="/public/css/bootstrap.css" rel="stylesheet" test="text/css" />
  <link href="/public/css/default.css" rel="stylesheet" text="text/css" />
  <script src="/public/js/jquery-3.3.1.min.js"></script>
  <script src="/public/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  <nav class="nav" role="navigation">
    <a class="nav-link" href="/main">Главная</a>
    <?php if(!$loggedIn) echo '
      <a class="nav-link" href="/login">Войти</a>'
    ?>
    <?php if ($loggedIn) echo '
      <a class="nav-link" href="/users">Пользователи</a>
      <a class="nav-link" href="/users/myProfile">Мой профиль</a>
      <a class="nav-link" href="/login/logout">Выйти</a>'
    ?>
  </nav>
  <div>
