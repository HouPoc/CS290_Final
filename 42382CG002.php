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
$news_id='42382CG002';
?>

  <!-- BEGIN content -->
  <div id="content">
	<h3> OSU graduate David Gilkey, and translator killed in Afghanistan </h3>
	<p>
	<br><br>
	WASHINGTON (AP) — David Gilkey, a veteran news photographer and video editor for National Public Radio, and an Afghan translator, Zabihullah Tamanna, were killed while on assignment in southern Afghanistan on Sunday, a network spokeswoman said.<br><br>

	Gilkey and Tamanna were traveling with an Afghan army unit near Marjah in Helmand province when the convoy came under fire and their vehicle was struck, the network's spokeswoman, Isabel Lara, said in a statement. Two other NPR journalists, Tom Bowman and producer Monika Evstatieva, were traveling with them and were unharmed.<br><br>

	Gilkey had covered conflict and war in Iraq and Afghanistan since the Sept. 11, 2001, attacks on Washington and New York and was committed to helping the public see the wars and the people caught up in them, NPR's senior vice president of news and editorial director, Michael Oreskes, said in a statement<br><br>

	"As a man and as a photojournalist, David brought out the humanity of all those around him. He let us see the world and each other through his eyes," Oreskes said.<br><br>

	Tamanna was a freelancer who often worked for NPR, Lara, the spokeswoman, said in an email, but offered few details.<br><br>

	Gilkey covered both national and international news for the radio network and its website and had made numerous trips to Afghanistan and Iraq, according to NPR's website.<br><br>

	His work has been recognized with numerous awards, including the prestigious George Polk Award and a national Emmy. The White House Photographers Association named Gilkey Still Photographer of the Year in 2011. In 2015 he became the first multimedia journalist to receive the Edward R. Murrow Award for his coverage of international

	breaking news, military conflicts and natural disasters. Gilkey studied journalism at Oregon State University according to the network's website. <br><br>

	"The things to do were amazing and the places to see were epic," Gilkey once said of his work. "But the people, the people are what made it all worth the effort."<br><br>
	</p>

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
	<br>
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
