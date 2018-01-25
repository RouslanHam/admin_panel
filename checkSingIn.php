<?php
header('Content-Type: text/html; charset=utf-8');
setlocale(LC_ALL,'ru_RU.65001','rus_RUS.65001','Russian_Russia.65001','russian');
session_start();
//установка переменных логин и пароль
if (isset($_POST['login'])) { 
	$login = $_POST['login']; 
	if ($login == '') { unset($login);} 
}
if (isset($_POST['password'])) { 
	$password=$_POST['password']; 
	if ($password =='') { unset($password);} 
}
if (empty($login) or empty($password)){
    exit ("<body><div align='center'><br/><br/><br/><h3>Вы ввели не всю информацию, вернитесь назад и заполните все поля!" . 
		"<a href='index.php'> <b>Log in</b> </a></h3></div></body>");
}
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
    $login = trim($login);
    $password = trim($password);
//подключение к базе данных
require "config.php";
    $dbcon = mysql_connect($dbhost, $dbuser, $dbpasswd); 
    mysql_select_db($dbname);
	mysql_query("SET NAMES 'utf8'");
	
	if (!$dbcon)
	{
    echo "<p>Произошла ошибка при подсоединении к MySQL!</p>".mysql_error(); exit();
    } else {
    if (!mysql_select_db($dbname))
    {
    echo("<p>Выбранной базы данных не существует!</p>");exit();
    }
	}

// проверка пароля и переход на страницу
$result = mysql_query("SELECT * FROM userssheet2 WHERE login='$login'");
    $myrow = mysql_fetch_array($result);
    if (empty($myrow["password"])) {
		exit ("<body><div align='center'><br/><br/><br/>
		<h3>Извините, введённый вами login или пароль неверный." . "<a href='index.php'> <b>Назад</b> </a></h3></div></body>");
    }
    else {
		if ($myrow["password"]==$password) {
			$_SESSION['login']=$myrow["login"]; 
			$_SESSION['id']=$myrow["id"];
			header("Location:userpanel.php");
		}
		else {
			exit ("<body><div align='center'><br/><br/><br/>
			<h3>Извините, введённый вами login или пароль неверный." . "<a href='index.php'> <b>Назад</b> </a></h3></div></body>");
		}
    }
?>