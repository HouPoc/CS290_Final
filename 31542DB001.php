<!DOCTYPE>
<html>
<head>
<title>CS 290 Final Project</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/jquery.cycle.all.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/comment.js"></script>

</head>
<body>

<?php 
include("header.php");
include("db.php");
$news_id='31542DB001';
?>

  <!-- BEGIN content -->
  <div id="content">
<h3> OSU names Todd Stansbury athletic director, vice president </h3>
<p>
<br><br>
06/18/2015<br>
CORVALLIS, Ore. – Todd Stansbury, a former executive associate athletic director at Oregon State University, 
has been named vice president and director of intercollegiate athletics at OSU. 
He will begin his new duties on Aug. 1.<br><br>
Stansbury, who has 25 years of athletics administration experience, has spent the last three-plus years as vice president and athletic director at the University of Central Florida. 
He previously was at Oregon State from 2003-12 before taking the UCF position.<br><br>
He succeeds Bob De Carolis, who resigned as OSU athletic director in May after nearly 17 years at Oregon State, 
including nearly 13 as athletic director. Effective July 1, Marianne Vydra, senior associate athletic director/senior woman administrator, 
will serve as interim director of OSU intercollegiate athletics.<br><br>
“I am very pleased that Todd Stansbury is rejoining Oregon State University,” said OSU President Edward J. Ray. 
“He is prepared to hit the ground running and will help propel OSU’s men’s and women’s athletics. He is very skilled at growing fan excitement and engagement, 
and will guide the success of our student-athletes in sports, academics and community.”<br><br>
“He is committed to high-level athletics achievement by competing and 
winning championships the right way – the Oregon State way.”<br><br>
Stansbury was selected following a national search that attracted extensive interest and several high-level finalists for the position, 
Ray said. Stansbury will be welcomed to OSU on Wednesday, June 24, at a news conference.<br><br>
A native of Ontario, Canada, Stansbury graduated with a degree in industrial management 
from Georgia Tech in 1984, where he played linebacker for the Yellow Jackets’ football team. 
 He went on to earn a master’s degree in sports administration from Georgia State University in 1993.<br><br>
Before coming to Oregon State, Stansbury worked in athletics administration at Georgia Tech (1990-95), 
where he was assistant athletic director; the University of Houston (1997-2000), as associate athletic director; 
and East Tennessee State (2000-03), where he was director of athletics.<br><br>
During his three-and-a-half years at Central Florida, Stansbury transformed a department that increased its donor base by 47 percent; 
won 12 CUSA and American Athletic Conference championships in eight different sports; 
and has had the highest graduation success rate of any public Division I higher education institution in the United States.<br><br>
Those attributes will enable Stansbury to seamlessly fit into the Oregon State culture, President Ray said.<br><br>
“Todd will be an excellent and effective contributor to the remarkable transformation that is occurring throughout 
Oregon State as the university continues to strive for excellence in the classroom, on the field of competition and in our service impact to Oregon, the nation and the world. 
Good is not good enough at Oregon State University.” Ray said.<br><br>
Stansbury will provide leadership for an Oregon State intercollegiate athletics program that has 17 NCAA sports, 
more than 500 student-athletes and a $73 million budget.<br><br>
The University of Central Florida has 16 NCAA sports, more than 450 student athletes, and a $47 million budget.<br><br>
Stansbury will be joined in Corvallis by his wife, Karen.<br><br>
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
		<textarea id="comment" rows="4" cols="50" placeholder="Leave your comment here..(200 character max)" name="user_comment" form="upload_comment" maxlength="200"></textarea>
		<form id="upload_comment" action="upload_comment.php" method="post">	
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
</div>

<?php 
include("footer.php");
?>

</body>
</html>