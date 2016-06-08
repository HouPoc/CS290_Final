<?php
	include("db.php");
	//Include database acces infmormation
	$UN=$_POST["username_s"];
	$PW=$_POST["password_0"];
	$EM=$_POST["E_Mail"];
	$FP=$_POST["Favorite_Publisher"];
	//Get form data include Username, Password. Email, and Favorite Publisher.
	$pw=sha1($PW);
	//Encrypt Password
	$sql = "INSERT INTO `Users`(`User_Name`, `Password`, `Email`, `Publisher_ID`) VALUES ('$UN', '$pw','$EM','$FP')";
	$connection->query($sql);
	//Insert user infmormation into table Users 
	$cookie_name="user";
	setcookie($cookie_name, $UN, 0, '/');
	//Set cookie with logged (signed up) user name
	header("Location: main.php");
	//header to main page of our website
	$sql->free();
	$connection->close();
?>