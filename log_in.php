<?php 
	$UN=$_POST["username_l"];
	$cookie_name="user";
	setcookie($cookie_name, $UN, 0, '/');
	header("Location: main.php");

?>