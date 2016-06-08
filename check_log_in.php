<?php
	include("db.php");
	$user_name=$_GET["username"];
	$user_password=$_GET["password"];
	$User_Password=sha1($user_password);
	$sql="SELECT * FROM `Users` WHERE 1";
	$result=$connection->query($sql);
	$check_signal=0;
	if ($result->num_rows > 0) {
		while($row=$result->fetch_assoc()) {
			if ($user_name==$row["User_Name"])
			{
				if ($User_Password==$row["Password"])
				{
					$check_signal=1;
				}
			}
		}
	}
	$connection->close();
	echo $check_signal;
?>