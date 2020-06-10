<?php 
// $serverName = 'localhost';
// $username = 'root';
// $password = '';
// $nameDB = 'authbd';

//$mysql = new mysqli($serverName, $username, $password, $nameDB);
//$mysql = new mysqli('localhost', 'm61727_dbuser', '>5SP$_aE$*dZpnCp', 'm61727_db');
$mysql = new mysqli('localhost', 'root', '', 'authbd');
$mysql -> set_charset("utf8"); 
// if ($mysql->connect_error){
// 	die("Connection failed: " .$mysql->connect_error);
// }
/*try {
	$mysql = new PDO("mysql:host=$serverName; dbname=$nameDB", $username, $password);
	
}catch(PDOException $e){
	echo "Connection failed: " . $e->getMessage();
}*/
?>