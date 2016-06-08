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
	include("db.php");
	
	$category = "Health";
	$category = $_GET['c'];
	$sql = "SELECT `News_ID`, `Title`, `Name`, `Summary` FROM `News`, `Author` WHERE Author. Author_ID = News.Author_ID AND News.Category = '$category'";
	$result=$connection->query($sql);
	echo "<div id='content'>\n";
		echo "<div class = 'recent'>\n";
			while($row=$result->fetch_assoc()) {
				$news_link = $row["News_ID"];
				$news_title = $row["Title"];
				$news_author = $row["Name"];
				$news_content = $row["Summary"];
				echo "\t<div class = 'o post'>\n";
					echo "\t\t<h2><a href='".$news_link.".php' >".$news_title."</a></h2>\n";
					echo "\t\t<p>".$news_content."</p>\n";
					echo "\t\t<p class='readmore'> [ <a href='".$news_link.".php'> read more </a> ]</p>\n";
					echo "\t\t<div class='break'> </div>\n";
				echo "\t</div>\n";
			}
		echo "</div>\n";
	echo "</div>\n";
	?>
	
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
