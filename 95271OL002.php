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
$news_id='95271OL002';
?>

  <!-- BEGIN content -->
  <div id="content">
	<h3> Fiery Oregon oil train crash derails young couple's wedding plans — for a weekend </h3>
	<p>
	<br><br>
	LYLE, Wash. — Travis Dumas and Tory Sansonetti were trying to make it to downtown Portland by closing time Friday. <br><br>

	The young Utah couple, having met online about three months ago, decided on eloping to Oregon. They had a tiny window to drive to the Multnomah County Courthouse and back to the Salt Lake City area, where Sansonetti had planned to return to work Monday.<br><br>

	But a 96-car oil train near the Columbia River Gorge town of Mosier derailed their plans — at least for a weekend.<br><br>

	Dumas and Sansonetti left the Salt Lake City area on Thursday and slept that night in her Nissan Versa at a rest stop outside Boise. And it was about noon Friday by the time they broke for gas and a shower east of The Dalles.<br><br>

	When they got back on the road, Interstate 84 near The Dalles was gridlocked. The GPS that previously told them they'd be in Portland by 4:25 p.m. was trumped by the clock that read 4:57 p.m. as they crossed into rural Washington.<br><br>

	"And I turned to him and I said, 'We're not going to be able to pick up our license," said Sansonetti, 29.<br><br>

	The holdup: A Union Pacific train jumped its tracks and four rail cars caught fire, closing a long stretch of I-84. Six hours after leaving their shower spot, the couple had made it about 15 miles to the bedroom community of Lyle, where they spent the night.

	The choice to elope, too, started as a simple joke.<br><br>

	"But when the laughing kind of died down, I think both of us knew it wasn't a joke anymore," Sansonetti said. "And especially once we started driving up here, we knew it was just a matter of time." <br><br>

	They met on dating site OkCupid and went hiking for their first date. Dumas, an interior designer and sales consultant, and Sansonetti, who works for Freddie Mac, clicked like a backpack buckle.<br><br>

	"She absolutely brings out the 100 percent best in me." said Dumas, 25. "When you know it's right, it's right."<br><br>

	Dumas and Sansonetti looked every bit the lovebirds they are Friday night at the Lyle Hotel & Restaurant, where they sipped sparkling apple-cranberry and ate ice cream before retiring to the queen bed they secured for the night. <br><br>

	They made the most of their Oregon rendezvous, spending much of Saturday at the Evergreen Aviation & Space Museum in McMinnville and checking out The Grotto in Portland on Sunday morning.<br><br>

	The couple were planning to camp in Astoria on Sunday, figuring a fiery train derailment was a fine reason for Sansonetti to miss work the next day.<br><br>

	They'll head to the Multnomah County Courthouse in the morning and plan to get married there.<br><br>

	Then it's back out I-84, past the site of the derailment that almost bungled their wedding plans, this time as a married couple.<br><br>
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
