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
$news_id='52351GO001';
?>

  <!-- BEGIN content -->
  <div id="content">
	<h3> New logo unveiled for Corvallis Parks and Recreation </h3>
	<p>
	<br><br>
	With a warm, inviting color palette and a crisp graphic layout, the Corvallis Parks and Recreation Department’s new logo is a significant departure from its previous brand identifier – and that’s a good thing.<br><br>

	"From hikers to swimmers to theater-goers, we serve a varied group of customers throughout the community," said Parks and Recreation Director Karen Emery. "It was very important to us to create a strong visual identity to help unite our programs and services together behind the Parks and Recreation brand."<br><br>

	The logo, developed by Dock No. 2 Design, draws inspiration from the bountiful natural features that are ubiquitous to Corvallis. Three colorful leaves overlaid with gentle lines suggest water, trees and mountains. The text below strengthens the relationship between the Department and the City, helping customers and community members understand the interconnectedness of the entire organization.<br><br>
		Parks and Recreation staff – the folks who prune trees, build trails, organize events and connect with the community – provided valuable input throughout the design process.

	"Working with the team at Parks and Recreation was a great experience," said Mary Susan Weldon, owner of Dock No. 2 Design. "They are a fun group who clearly care passionately about their work. They understood from the get-go that the job of a logo is not to illustrate everything an organization does, but rather it serves as a symbol of the organization that becomes imbued with meaning as people interact with it."<br><br>

	The community will begin to see the new logo start popping up around town this summer – on signs, flyers, staff uniforms, publications, websites and more.<br><br>
	</p>

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
