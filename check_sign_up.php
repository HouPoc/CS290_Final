<?php
	include("db.php");
	$user_name=$_GET["username"];
	$sql="SELECT * FROM `Users` WHERE 1";
	$result=$connection->query($sql);
	$check_signal=0;
	if ($result->num_rows > 0) {
		while($row=$result->fetch_assoc()) {
			if ($user_name==$row["User_Name"])
			{		
				$check_signal=1;
			}
		}
	}
	$connection->close();
	echo $check_signal;
?>