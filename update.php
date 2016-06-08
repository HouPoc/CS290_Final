<?php
	include("db.php");
	$cookie_name="user";
	$user_name=$_COOKIE[$cookie_name];
	$user_password=$_POST["new_password"];
	$publisher =$_POST["Favorite_Publisher"];
	if ($user_password != NULL) {
		$User_Password=sha1($user_password);
		$sql = "CALL Update_Password('$user_name', '$User_Password')";
		$connection->query($sql);
		$connection->close();
		header("Location: Change_Password.php?mesg=Succesfully");
	}
	else {
		$sql = "CALL Update_Publisher('$user_name', '$publisher')";
		$connection->query($sql);
		$connection->close();
		header("Location: Change_Publisher.php?mesg=Succesfully");
	}
?>