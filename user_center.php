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
		<div id = "user_action">
			<h3><a href="Change_Password.php">Change Your Password</a></h3> <br><br>
			<h3><a href="Change_Publisher.php">Change Your Favorite Publisher</a></h3><br><br>
			<h3><a href="#" onclick="show_comments()">Show Commentted News</a></h3>
		</div>
		<br><br>
		<div id = "comment_table">
			
		</div>
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
function show_comments (){
	var xmlhttp = new XMLHttpRequest();
	var url = "getcomment.php";
	
	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			myFunction(xmlhttp.responseText);
		}
	}
	xmlhttp.open("GET", url, true);
	xmlhttp.send();
	function myFunction (response) {
		var comment_table = JSON.parse(response);
		var i;
		var length;
		var display ="<p>";
		length = comment_table[0][3];
		console.info(response);
		for (i = 0; i < length; i ++){
			display += "<a href = '";
			display += comment_table[i][2];
			display += ".php'>"
			display += comment_table[i][0];
			display += "</a></p>";
			display += "<br>";
		}
		display +="</p>";
		document.getElementById("comment_table").innerHTML = display;
	}
}
</script>



