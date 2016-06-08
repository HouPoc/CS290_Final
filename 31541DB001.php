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
$news_id='31541DB001';
?>

  <!-- BEGIN content -->
  <div id="content">
	<h3> OSU adopts stricter student transfer admissions policy to address sexual violence, campus safety </h3>
	<p>
	<br><br>
	11/23/2015 <br>
	CORVALLIS, Ore. – Oregon State University will increase its efforts to address sexual violence and increase campus safety by requiring undergraduate and graduate students seeking to transfer to OSU to disclose whether they are ineligible to re-enroll at an institution they attended in the past seven years due to student conduct reasons.<br><br>

	Oregon State has a policy of denying admission to transfer students ineligible to return to their previous institution, but immediately will strengthen and better enforce the policy by requiring full disclosure from transfer students.<br><br>

	“We are committed to combatting sexual violence in society and to improving safety on the Oregon State University campus,” said OSU President Ed Ray. “This is an important step to strengthen the university’s  admission policies for transfer students related to conduct that is not consistent with creating a safe and inclusive community at Oregon State."<br><br>

	Ray is sharing Oregon State’s new policy with the leaders of other Pacific-12 Conference universities and encouraging them to consider similar policies. OSU’s new guidelines apply to all transfer students, officials say, and are not aimed exclusively at student-athletes.<br><br>

	“I recognize that transfer policies are a very complex subject and that universities should craft admission policies that serve their respective institutional mission while also addressing efforts to improve safety and combat sexual violence,” Ray said.<br><br>

	“The bottom line is, that if students seeking to transfer to OSU are ineligible at another institution because of student conduct violations, they automatically will be declined admission to Oregon State,” said Steve Clark, OSU’s vice president for University Relations and Marketing.<br><br>

	If students are ineligible at another institution because of academic reasons, Clark said they may be admitted if they meet Oregon State’s minimum academic requirements. All transfer students who are denied admission will have the right to appeal that decision with appeals being reviewed on a case-by-case basis.<br><br>

	Meanwhile, Oregon State will continue to adhere to all NCAA requirements regarding student-athletes who seek to transfer to OSU from another institution, Clark said.<br><br>

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
</div>

<?php 
include("footer.php");
?>

</body>
</html>
