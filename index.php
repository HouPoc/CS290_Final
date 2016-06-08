<html>
<head>
  <title>CS 340 Final Project</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript" src="js/check_input.js"></script>
</head>

<body> 
	<div id="wrapper">
		<div id="header">
			<ul class="pages">
				<li><a href="index.php">Home</a></li>
				<li><a href="about.php">About Us</a></li>
				<li><a href="help.php">Help</a></li>
			</ul>
			<img id="weblogo" src="images/logo.png"  alt="Logo" />
			<div class="break"></div>
			<div class="logo">
				<h1>Corvallis News Center</h1>
				<p>CS 340 Final Project</p>
			</div>
			<ul class="categories">
				<li><a href="#">News</a></li>
				<li><a href="#">Sports</a></li>
				<li><a href="#">Entertainment</a></li>
				<li><a href="#">Health</a></li>
				<li><a href="#">OSU Special</a></li>
			</ul>
		</div>
		
		<b> You must log in to read news and leave comment.
		Sign up, if you dont have an account </b>
		<div class="box">
			<form id="sign_up" action="sign_up.php" method="post">
			<p class="form_text"> 
					<p id="check_user_name_sign"> Enter a username</p>
				<input id="u_n_s" type="text" name="username_s" required/> 
				
				<p class="form_text">
 					<p id="check_password_sign"> Enter a password</p> </p>
				<input id="u_n_p" type="password" name="password_0" required/> </p>
				
				<p class="form_text">
					<p id="check_password_1_sign"> Retype your password</p>
				<input id="u_n_p_1"type="password" name="password_1" required/> </p>
				<br>
				<p class="form_text"> 
					<p id="check_e_mail_sign">&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Enter your E-mail</p>
				<input id="u_n_e_m" type="email" name="E_Mail" required/></p>
				<br>
					<p id="check_favorite_publisher_sign">&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Choose your Favority publisher</p><br>
					&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="Favorite_Publisher" form="sign_up" required>
						<option value="4238">Corvallis Gazette-Times</option>
						<option value="3154">Daily Barometer</option>
						<option value="5235">Government Official</option>
						<option value="9527">OregonLive.com</option>
					</select>
			</form>
				<button class="check" onclick="check_sign_up()"> Sign up ! </button>
				</div>
		
		<div class="box">
			<form id="log_in" action="log_in.php" method="post">
				<p class="form_text">
					<p id="check_user_name_log">Enter your username to log in</p>
				<input id="u_n_l" type="text" name="username_l" />  </p>
				
				<p class="form_text">
					<p id="check_password_log"> Enter your password to log in</p>
				<input id="u_p_l" type="password" name="password_l" /> </p>
		</p>
			</form>
			<button class="check" onclick="check_log_in()"> Log in ! </button>
		</div>	
<?php 
	include("footer.php");
	?>		
	</div>
</body>
</html>