<!DOCTYPE>
<html>
<head>
<title>CS 340 Final Project</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/jquery.cycle.all.min.js"></script>
<script type="text/javascript" src="js/comment.js"></script>
</head>
<body>

<?php 
include("header.php");
include("db.php");
$news_id='42381CG001';
?>

  <!-- BEGIN content -->
  <div id="content">
	<h3> Local golfers fail to qualify for U.S. Open </h3>
	<p>
	<br><br>
	VANCOUVER, Wash. — Former Oregon golfer Aaron Wise won Monday’s U.S. Open section qualifier
	at Royal Oaks Country Club. <br> <br> 
	Wise, who was the individual champion at this year’s NCAA championships at 
	Eugene Country Club, fired a 9-under 67-68—135 to win the 36-hole tournament by two strokes over Travis Howe
	(7-under 70-67—137). Wise is turning pro later this summer.<br><br> 
	Matt Marshall won a playoff with Austin
	Connelly for the third and final spot in 116th U.S. Open, which runs June 16-19 at Oakmont Country Club in 
	Pennsylvania. Marshall (6-under 67-71—138) won with a par on the third playoff hole.<br><br> 
	Crescent Valley High and Idaho alum Justin Kadin tied for 31st with a 3-over 74-73—147 in the 55-man field. Kadin won last 
	year’s Oregon Mid-Amateur Championship. <br><br> 
	Conner Kumpula, a West Albany graduate and senior-to-be at Oregon State, tied for 43rd with a 9-over 76-77—153. <br><br> 
	Oregon’s Sulman Raza, who will also be a senior next year, tied for 48th with a 12-over 77-79—156. The Eugene native helped
	the Ducks win their first team title during the NCAA championships. <br><br> 
	Raza is the reigning Oregon Men’s Stroke Play champion while Kumpula won the event in 2014. <br><br> 
</p>
	<br><br>
	<h3>Source:</h3>
	<br>
	<?php 
	$sql="SELECT * FROM Author WHERE Author.Author_ID = (SELECT News.Author_ID FROM `News` WHERE News.News_ID ='$news_id')";
	$result=$connection->query($sql);	
	$row=$result->fetch_assoc();
	$Author = $row["Name"];
	$TEL = $row["Phone"];
	$EM = $row["Email"];
	echo "<p>".$Author.", ".$TEL."<br>".$EM."<br></p>";
	?>
	<br><br>
	<h3>Comment :</h3>
	<br><br>
	<div id="show_comment">
	<?php

		$comment_date = date('Y-m-d');
		$sql="SELECT * FROM `Comments` WHERE News_ID ='$news_id'";
		$result=$connection->query($sql);
		if ($result->num_rows > 0) {
			while($row=$result->fetch_assoc()) {
				echo '<div class="comment_box">';
				echo '<div class="msg">';
				echo "<h4>";
				echo $row["Comments"];
				echo "</h4>";
				echo '</div>';
				echo "<p>";
				echo "&nbsp";
				echo "<strong>";
				echo $row["User_Name"];
				echo "</strong>";
				echo "&nbsp";
				echo "at ";
				echo $row["comments_date"];
				echo "</p>";
				echo "</div>";
			}
		}
		$connection->close();
		?>
	</div>
	<div id="write_comment">
		<textarea id="comment" rows="4" cols="50" name="user_comment" form="upload_comment" maxlength="200" placeholder="Leave your comment here.. (200 characters max)"></textarea>
		<form id="upload_comment" action="upload_comment.php" method="POST">
			<input id ='nid' name="news_id"  type="text" value=<?php echo $news_id;?>  hidden>
			<input id ='cdate' name="comments_date" type="date" value=<?php echo $comment_date;?> hidden>
		</form>
		<button class="check" id="u_comment" onclick="check_comment()"> submit</button>
		<p id="check_error"></p>
	</div>
	
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
