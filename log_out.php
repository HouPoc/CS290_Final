<?php
	$cookie_name="user";
	unset($_COOKIE[$cookie_name]);
	setcookie($cookie_name, "", time()-36000, '/');
	header("Location: index.php");
?>