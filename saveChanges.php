<?php

$id = $_POST['id']; 
$login = $_POST['login']; 
$fullname = $_POST['fullname']; 
$email = $_POST['email'];
$password = $_POST['password'];
$role = $_POST['role'];
if (isset($_GET['id'])) $newUser=true;
else $newUser=false;

require "config.php";
$dbcon = mysql_connect($dbhost, $dbuser, $dbpasswd);
mysql_select_db($dbname);

    if (!mysql_select_db($dbname)) echo "baaazaaa";
	
//$result = mysql_query("DELETE FROM userssheet2 WHERE id=$id");
if (isset($_POST['save'])) {
	if (!$newUser) {
		$result = mysql_query("UPDATE `userssheet2` SET `fullname`='$fullname', `e-mail`='$email', `login`='$login', `password`='$password', `role`='$role' WHERE id=$id");
		echo "Профиль обновлен";
	}
	else {
		$result = mysql_query("INSERT INTO `userssheet2` (`login`, `password`, `fullname`, `e-mail`, `role`) VALUES ('$login', '$password', '$fullname', '$email', '$role') ");
		echo $result;
	}
}
if (isset($_POST['delete'])){
	$result=mysql_query("DELETE FROM `userssheet2` WHERE `id`=$id");
	echo "Удален пользователь $login";
}

header("Location:userpanel.php");
?> 
