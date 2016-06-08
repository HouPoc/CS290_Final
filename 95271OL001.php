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
$news_id='95271OL001';
?>

  <!-- BEGIN content -->
  <div id="content">
	<h3> Hey, kids, turn down the music: study reports hearing damage in youth </h3>
	<p>
	<br><br>
	A new study of adolescents found that more than a quarter of those exposed to loud music already reported early hearing damage. <br><br>

	A study published Monday in the journal Scientific Reports focused on the prevalence of tinnitus, or a buzzing or ringing in the ears, in students between the ages of 11 and 17, according to a news release. The study found that 29 percent of participants had developed persistent tinnitus, which typically affects those over the age of 50. <br><br>

	"It's a growing problem and I think it's going to get worse," study author Larry Roberts of McMaster University in Ontario said in a statement. "My personal view is that there is a major public health challenge coming down the road in terms of difficulties with hearing."<br><br>

	For the study researchers interviewed and tested 170 adolescents that attend the same school in Sao Paulo, Brazil. Researchers at the University of Sao Paulo School of Medicine also conducted the study. <br><br>

	Students were asked about if they have already experienced tinnitus and their listening habits, including how often they were exposed to noisy environments. Students also had their hearing assessed inside an acoustic chamber, according to the study. <br><br>

	Almost all of the students had taken part in activities in too-loud settings, such as parties, clubs or listening through headphones, according to a statement. About 55 percent had experienced tinnitus within the past 12 months. <br><br>

	Those students with tinnitus could still hear as well as their peers who didn't have it, but had a far lower tolerance for loud noise, the study found. <br><br>

	It's likely for a person to briefly hear ringing after listening to loud music, Roberts said, but it can be an early indictor of the damaging effects of noise exposure. And low noise tolerance can point to hidden damages to the nerves that process sound, and lead to worse hearing impairment when the person is older. <br><br>

	"The levels of sound exposure that are quite commonplace in our environment, particularly among youth, appear to be sufficient to produce hidden cochlear injuries." Roberts said in a statement. "The message is, 'protect your ears.'"<br><br>

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
