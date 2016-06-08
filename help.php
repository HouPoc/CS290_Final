<!DOCTYPE>
<html>
<head>
<title>CS 290 Final Project</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/jquery.cycle.all.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</head>
<body>

<?php 
include("header.php");
?>

  <!-- BEGIN content -->
  <div id="content">
<h3> Help Center </h3>
<p>
<br><br>
You must log in or sign up first before review the website. <br>
If you have more questions, please email us. Email address is in "About Us" page.<br>
Enjoy! :)
</p>


 </div>
  <!-- END content -->
   <!-- BEGIN sidebar -->
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
        <li> <a href="new3.php">Welcome Back Todd Stansbury</a>
          <p>Todd Stansbury is back for OSU sports...</p>
        </li>
        <li> <a href="new2.php">Safe Spaces and HIV Prevention</a>
          <p>Safe space plays an improtant role in HIV Prevention...</p>
        </li>
        <li> <a href="new1.php">Stricter Transfer Admissions Policy in OSU</a>
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
</div>

<?php 
include("footer.php");
?>

</body>
</html>
