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
$news_id='95272OL002';
?>

  <!-- BEGIN content -->
  <div id="content">
	<h3> Vote for the 2016 People's Choice: The best burger in Portland </h3>
	<p>
	<br><br>
	We are on a mission to determine what our readers believe is Portland's best burger.  <br><br>

We nominated some of our favorite burger spots, and our favorite.<br><br>

You nominated some of your favorite burger spots. OK, honestly, you nominated a lot. We started with a list of about 25 and ended with more than 100 places that serve a tasty burger. In our poll, the category of other garnered 133 votes, most of those for individual burgers. And the number of votes hit 3,026. <br><br>

One thing we found, people are passionate about their burgers. Many burgers. Burgers in places we didn't know had burgers. And they know what they love. A few readers have emailed us. Others left their praise in the comments. For example:  <br><br>

heismanmariota <br><br>

The Double Brie Burger at Little Bird is the best burger in Portland now that Gruner is not around... Also you can get it for $5 on their late night happy hour. They have to be losing money at that price! <br><br>

jonnisixx <br><br>

Agree!  Had one yesterday.  Yakuza lounge is another excellent one. <br><br>

Portland 1976 <br><br>

There are many great burgers in Portland, but the burger at Toro Bravo beats them all. <br><br>

Now, it's time for the final step: choosing No. 1. We've taken the top 10 vote-getters from the nomination process and listed them here. Now it's your turn to pick the winner. Vote for just one, then help get out the vote by sharing this post with your friends, family and co-workers.  <br><br>

We'll announce the People's Choice winner on Thursday, June 9. The winning restaurant will receive a "Best of Oregon" badge for all to see. (See full terms and conditions.) <br><br>

Finally, and this is important, tell us in the comments why you recommend the restaurants and the burgers you've nominated. Or, send me an email at sjepsen@oregonian.com explaining what makes your favorite burger joint great. <br><br>
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
