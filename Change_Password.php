<!DOCTYPE html>
<html>
<head>
	<title>CS 340 Final Project</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="style.css" />
	<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
	<script type="text/javascript" src="js/jquery.cycle.all.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<script src="http://maps.googleapis.com/maps/api/js"></script>
</head>
<body>
	<?php 
	include("header.php");
	$cookie_name="user";
	?>
  <!-- BEGIN content -->
  <div id="content">
		<form  action = "update.php" method="post" id = "update">
			<p class="form_text">Enter Your New Password:</p>
			<input type="password" id ="ps" name="new_password" onkeyup ="valid_password()" required><br><br>
			<p class="form_text">Enter Your New Password Again: </p>
			<input type="password" id ="ps_a" name="new_password_a" required>
			<br>
			<p id = "check_password" class="form_text"></p>
			<p id = "check_password_1" class="form_text"></p>
		</form>
		<button class="check" type="button" onclick = "submit_form()" id="sb" disabled>Submit</button>
			<?php
				$message = $_GET["mesg"];
				if ($message !=null){
					echo "<p class='form_text'> Update ".$message."</p>";
				}
			?>
  </div>
	<!--end content-->
	<div id="sidebar">
		<div class="box">
		<?php
			include("user_box.php");
		?>
		</div>
	<!-- begin popular posts -->
	<div class="box">
      <h2>Popular Posts</h2>
      <ul class="popular">
        <li> <a href="31542DB001.php">Welcome Back Todd Stansbury</a>
          <p>Todd Stansbury is back for OSU sports...</p>
        </li>
        <li> <a href="31543DB001.php">Safe Spaces and HIV Prevention</a>
          <p>Safe space plays an improtant role in HIV Prevention...</p>
        </li>
        <li> <a href="31541DB001.php">Stricter Transfer Admissions Policy in OSU</a>
          <p>OSU posts a stricter rules on transfer admissions...</p>
        </li>
      </ul>
    </div>
    <!-- end popular posts -->

    <!-- begin featured video -->
    <div class="box">
      <h2>Corvallis Video</h2>
      <div class="video"> 
        <iframe width="290" height="300"
          src="https://www.youtube.com/embed/dWM6SUEaGf4">
        </iframe>
      </div>
    </div>

  </div>
  <!-- END sidebar -->
<?php 
include("footer.php");
?>

</body>
</html>
<script>

function valid_password (){
	var regular_expression="^[A-Z].*[0-9]{2}$";
	var check=new RegExp(regular_expression);
	var user_password=document.getElementById("ps").value;
	var msg=check.test(user_password);
	if (msg == false )
	{
		document.getElementById("check_password").innerHTML="Password must start with an uppercase letter and end with two digits";
		document.getElementById("check_password").style.color="red";	
		document.getElementById("sb").disabled= true;
	}
	else {
		document.getElementById("check_password").innerHTML="Valid password";
		document.getElementById("check_password").style.color="green";	
		document.getElementById("sb").disabled= false;	
	}
}
function submit_form (){
	var form = document.getElementById("update");
	var user_password=document.getElementById("ps").value;
	var user_password_a=document.getElementById("ps_a").value;
	if (user_password == user_password_a){
		document.getElementById("check_password_1").innerHTML="Valid password";
		document.getElementById("check_password_1").style.color="green";
		form.submit ();
	}
	else {
		document.getElementById("check_password_1").innerHTML="Two inputs are different";
		document.getElementById("check_password_1").style.color="red";
	}
}
</script >