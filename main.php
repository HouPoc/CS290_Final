<!DOCTYPE html5>
<html>
<head>
<title>CS 340 Final Project</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/jquery.cycle.all.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</head>
<body>
<!-- BEGIN content -->

  <!-- begin recent posts -->
<?php 
	include("header.php");
	include("db.php");
	$count = 0;
	$cookie_name="user";
	$user = $_COOKIE[$cookie_name];
	$sql = "SELECT `News_ID`, `Title`, `P_Date`, `Name`, `Summary` FROM `News`, `Author` WHERE News.Publisher_ID =
	 (SELECT `Publisher_ID` FROM `Users` WHERE `User_Name` = '$user') AND Author. Author_ID = News.Author_ID ORDER BY Comments_Count DESC";
	$result=$connection->query($sql);
	echo "<div id='content'>\n";
		echo "<div id = 'featured'>\n";
			while(($row=$result->fetch_assoc()) && ($count < 2)) {
				$news_link = $row["News_ID"];
				$news_title = $row["Title"];
				$news_date = $row["P_Date"];
				$news_author = $row["Name"];
				$news_content = $row["Summary"];
				$count = $count + 1;
				echo '<div class="post">';
					echo '<h2><a href="'.$news_link.'.php">'.$news_title.'</a></h2>';
					echo '<p class="details">'.$news_date.' | '.$news_author.'</p>';
					echo '<div class="thumb"><a href ="'.$news_link.'.php"><img src ="images/'.$news_link.'.jpg"/></a> </div>';
					echo '<p>'.$news_content.'</p>';
					echo '<p class="readmore"> [ <a href ="'.$news_link.'.php"> readmore </a>]</p>';
					echo '<div class=“break"></div>';
				echo '</div>';
			}
		echo "</div>\n";
	$sql_1 = "SELECT `News_ID`, `Title`, `Name`, `Summary` FROM `News`, `Author` WHERE News.Publisher_ID =
	 (SELECT `Publisher_ID` FROM `Users` WHERE `User_Name` = '$user') AND Author. Author_ID = News.Author_ID";
	$result_1=$connection->query($sql_1);
		echo "<div class = 'recent'>\n";
			while($row_1=$result_1->fetch_assoc()) {
				$news_link = $row_1["News_ID"];
				$news_title = $row_1["Title"];
				$news_author = $row_1["Name"];
				$news_content = $row_1["Summary"];
				echo "\t<div class = 'o post'>\n";
					echo "\t\t<h2><a href='".$news_link.".php' >".$news_title."</a></h2>\n";
					echo "\t\t<p>".$news_content."</p>\n";
					echo "\t\t<p class='readmore'> [ <a href '".$news_link.".php'> read more </a> ]</p>\n";
					echo "\t\t<div class='break'> </div>\n";
				echo "\t</div>\n";
			}
		echo "</div>\n";
	echo "</div>\n";
?>

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
