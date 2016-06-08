<?php	
				echo "<h3>";
				if (isset($_COOKIE[$cookie_name])){										//Show greeting info if the user is logged in
					echo  "Hello,";
					echo $_COOKIE[$cookie_name];
					echo "<br>";
					echo "<br>";
					echo "<a href ='user_center.php'> User Center </a>";
					echo "<br>";
					echo "<br>";
					echo "<a href='log_out.php'> log out </a>";
				}
				echo "</h3>";
		?>