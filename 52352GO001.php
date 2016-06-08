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
$news_id='52352GO001';
?>

  <!-- BEGIN content -->
  <div id="content">
	<h3> Allied forces storm Normandy, James Meredith shot: Today in history  </h3>
	<p>
	<br><br>
	
Today is Monday, June 6, the 158th day of 2016. There are 208 days left in the year. <br><br>

Today's Highlight in History:  <br><br>

On June 6, 1944, during World War II, Operation Overlord, aimed at liberating German-occupied western Europe, commenced as Allied forces stormed the beaches of Normandy, France, on "D-Day."  <br><br>

On this date:  <br><br>

In 1799, American politician and orator Patrick Henry died at Red Hill Plantation in Virginia.  <br><br>

In 1816, a snowstorm struck the northeastern U.S., heralding what would become known as the "Year Without a Summer."  <br><br>

In 1844, the Young Men's Christian Association was founded in London.  <br><br>

In 1925, Walter Percy Chrysler founded the Chrysler Corp.  <br><br>

In 1939, the first Little League game was played as Lundy Lumber defeated Lycoming Dairy 23-8 in Williamsport, Pennsylvania.  <br><br>

In 1955, the U.S. Post Office introduced regular certified mail service.  <br><br>

In 1966, black activist James Meredith was shot and wounded as he walked along a Mississippi highway to encourage black voter registration.  <br><br>

In 1968, Sen. Robert F. Kennedy died at Good Samaritan Hospital in Los Angeles, a day after he was shot by Sirhan Bishara Sirhan.  <br><br>

In 1978, California voters overwhelmingly approved Proposition 13, a primary ballot initiative calling for major cuts in property taxes.  <br><br>

In 1985, authorities in Brazil exhumed a body later identified as the remains of Dr. Josef Mengele, the notorious "Angel of Death" of the Nazi Holocaust.  <br><br>

In 1994, President Bill Clinton joined leaders from America's World War II allies to mark the 50th anniversary of the D-Day invasion of Normandy. A China Northwest Airlines passenger jet crashed near Xian (SHEE'-ahn), killing all 160 people on board.  <br><br>

In 2001, Democrats formally assumed control of the U.S. Senate after the decision of Vermont Republican James Jeffords to become an independent.  <br><br>

Ten years ago: Veterans Affairs Secretary Jim Nicholson acknowledged a stolen computer contained personal data on about 2.2 million active-duty military, Guard and Reserve personnel - not just 50,000 as initially believed. Iran and the United States had a rare moment of agreement, using similar language to describe "positive steps" toward an accord on a package of incentives aimed at persuading Tehran to suspend uranium enrichment. Soul musician Billy Preston died in Scottsdale, Arizona, at age 59. <br><br> 
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
