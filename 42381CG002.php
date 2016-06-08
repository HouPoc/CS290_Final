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
$news_id='42381CG002';
?>

  <!-- BEGIN content -->
  <div id="content">
	<h3> Stahlbush plans Saturday cleanup at OSU </h3>
	<p>
	<br><br>
	Stahlbush Island Farms is organizing a litter and garbage cleanup for Saturday at the Oregon State University campus 
	and invites members of the public to join in what's billed as a low-key "keep campus clean and green" effort.<br><br>

	The effort begins at 1 p.m. on the Quad between the Jefferson and 26th Street intersection by the Memorial Union, 
	the Women's Building and Strand Agriculture Hall.<br><br>

	Stahlbush representatives will be there rain or shine and will provide garbage bags and gloves. There will be teams of 
	two or more, which will be instructed to cover specific locations on campus.<br><br>

	The cleanup follows a visit from two OSU alumni who wrote a letter to the Gazette-Times about the state of the campus.<br><br>

	The cleanup effort is timed in part for next weekend's Moms and Family Weekend at OSU.<br><br>
	</p>
	<br><br><br><br><br><br>
	<h3>Source:</h3>
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
	<br>
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
