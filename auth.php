<?php
	$login = filter_var(trim($_POST['login']),
	FILTER_SANITIZE_STRING);
	
	$password = filter_var(trim($_POST['password']),
	FILTER_SANITIZE_STRING);
	
	//$password = md5($password."lfggeg8734jjh45kl7");
	
	require "connect.php";
	
    
	//$mysql->query("INSERT INTO `users`(`login`, `password`) VALUES('$login', '$password')");
	
	$result = $mysql -> query("SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password' ");
	
	$user = $result -> fetch_assoc();
	if (count($user) == 0 ) {
		echo "Taкой пользователь не найден";
		exit();	
	}
	
	//setcookie('user', $user['name'], time() +60);
	
	
	
	$mysql->close();
	
	header('Location: main.html');

?>