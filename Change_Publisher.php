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
	?>
  <!-- BEGIN content -->
  <div id="content">
		<form action="update.php" method="post" id="update">
			<p class="form_text">Choose a Publisher</p><br>
			<select name="Favorite_Publisher" form="update" required>
				<option value="4238">Corvallis Gazette-Times</option>
				<option value="3154">Daily Barometer</option>
				<option value="5235">Government Official</option>
				<option value="9527">OregonLive.com</option>
			</select>
			<br>
			<input type="submit" value="Submit" class = "check">
		</form>
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
