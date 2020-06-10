<?php
	$login = filter_var(trim($_POST['login']),
	FILTER_SANITIZE_STRING);
	
	$password = filter_var(trim($_POST['password']),
	FILTER_SANITIZE_STRING);
	
	//$password = md5($password."lfggeg8734jjh45kl7");
	
	require "connect.php";
	
    
	//$mysql->query("INSERT INTO `users`(`login`, `password`) VALUES('$login', '$password')");
	//$password = md5($password."lfggeg8734jjh45kl7");
	$result = $mysql -> query("SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password' ");
	

	//$user = $result -> fetch(PDO::FETCH_ASSOC);
	$user = $result->fetch_assoc();
	//$user = $result -> FETCH_ASSOC();
	if (count($user) == 0 ) {
		echo "the password was entered incorrectly";
		exit();	
	}
	

	
session_start();
setcookie('user', $user['name'], time() + 3600*4, "/");

	
$mysql->close();
header('Location: main.php');

?>