<?php
session_start();
$login=$_SESSION['login'];

//подключение к базе данных                       я тебя люблю 1!!!!!!!!!!
require "config.php";
$dbcon = mysql_connect($dbhost, $dbuser, $dbpasswd); 
mysql_select_db($dbname);
	
//проверка логина
$result = mysql_query("SELECT * FROM userssheet2 WHERE login='$login'");
$myrow = mysql_fetch_array($result);
if ($myrow["role"]!=='user' && $myrow["role"]!=='admin') {
	echo "<p>Вы не пользователь и не администратор</p>".mysql_error(); exit();
}
if ($myrow["role"]=='admin') $isadmin=1;
	else $isadmin=false;

require_once "template.php";


use function template\render;
//вывод базы данных в таблицу + сортировка
if (!isset($_GET['sort'])) $p="not";
	else $p = $_GET['sort'];
$result = mysql_query("SELECT * FROM userssheet2");
if ($p=="login") $result = mysql_query("SELECT * FROM userssheet2 ORDER BY login");
if ($p=="username") $result = mysql_query("SELECT * FROM userssheet2 ORDER BY fullname");
if ($p=="role") $result = mysql_query("SELECT * FROM userssheet2 ORDER BY role");
$myrow=array();
while ($irow=mysql_fetch_array($result)){
	$myrow[] = $irow;
}
//$myrow = mysql_fetch_array($result);
$html = render('userpanel.phtml', ['isadmin' => $isadmin, 'users' => $myrow]);
	
print_r($html);

?>