<?php
$id = $_GET['id'];

session_start();
$login=$_SESSION['login'];

//подключение к базе данных
require "config.php";
$dbcon = mysql_connect($dbhost, $dbuser, $dbpasswd); 
mysql_select_db($dbname);
	
//проверка на роль администратора
$result = mysql_query("SELECT * FROM userssheet2 WHERE login='$login'");
$myrow = mysql_fetch_array($result);
if ($myrow["role"]=='admin') $isadmin=true;
	else $isadmin=false;
	
//если редакирование своего профиля - загрузка из базы своего id
if ($id=="me") {
	$me=true;
	$id=$myrow['id'];
}
else $me=false;

//загрузка данных пользователя с $id
$result = mysql_query("SELECT * FROM userssheet2 WHERE id='$id'");
$myrow = array();
$myrow = mysql_fetch_array($result);

//если новый пользователь
if ($id=="new") $newUser=true;
else $newUser=false;

//вывод страницы	
require_once "template.php";
use function template\render;
$html = render("editProfile.phtml", ['isadmin' => $isadmin, 'newuser' => $newUser, 'me' => $me, 'user' => $myrow]);
print_r($html);
?>