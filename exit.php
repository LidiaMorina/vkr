<?php

setcookie('user', $user['name'], time() - 3600*4, "/");
header('Location: index.php');
exit();
?>