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
$news_id='42382CG001';
?>

  <!-- BEGIN content -->
  <div id="content">
	<h3> Illustrated man </h3>
	<p>
	<br><br>
	On his first day in California’s Pelican Bay State Prison in 1997, Christopher McFarland noticed a bald, middle-aged inmate with a swastika carved into his forehead. It was Charles Manson, one of America’s most notorious mass murderers.<br><br>

	During his first week inside, he saw eight men get stabbed and one man get shot.<br><br>

	To avoid getting shanked himself, he learned to stuff books down the front and back of his pants and never to leave his cell without a homie to watch his back.<br><br>

	And he made himself a promise.<br><br>

	“I am not f---ing coming back here,” he told himself. “I need to change my ways — now!”<br><br>

	And that’s exactly what he did.<br><br>

	McFarland kicked his intravenous drug habit at Pelican Bay, despite plenty of opportunities to continue using, and after serving 3½ years of a seven-year sentence for grand theft auto and transportation of marijuana, he got out of prison and got busy reconstructing his life.

	He complied with the terms of his parole. He got a job. He stayed off drugs. He reconnected with his kids, who by then were living in Philomath, and moved to Oregon. He got his GED. He continued his education, first at Linn-Benton Community College, then at Oregon State University.

	And on Saturday, he will graduate from OSU with a master’s degree in public health.<br><br>

	Sometimes, even he can’t believe the transformation he’s undergone.<br><br>

	“Trying to align my life now with that life, it reads like a gnarly book,” said McFarland, a wiry man with a close-trimmed beard, black-rimmed glasses and tattoos sleeving both arms. “It’s hard to make that connection between that person in the ’90s and the person I am today.”

	Even so, it’s a connection he comes back to frequently. The new McFarland spends a lot of time talking to people about the old McFarland in an effort to keep others from making the same mistakes that almost destroyed him.<br><br>

	In addition to giving talks to student groups at OSU, he served for awhile as a peer counselor with Student Health Services and worked with at-risk youth at the Yes House in Corvallis. He has a paid internship with the Benton County Health Department, where he works with intravenous drug users to prevent fatal overdoses.

	“I’ve never shied away from my past,” McFarland said. “I’ve kind of embraced it. Like anybody who’s survived a rough experience, you want to share it.”<br><br>

	McFarland’s life was rough from the get-go. His mother gave him up at birth, and he went through a succession of foster homes until he was adopted at the age of 3. While he describes his adoptive parents as good people, he had serious behavioral problems that got him kicked out of the house at 17.<br><br>

	After a short, inglorious stint in the Army, McFarland found himself homeless and living on the streets of Los Angeles. That’s when the drugs began to take hold.<br><br>

	“My primary drug of choice was meth, but I’d shoot up just about anything,” he said.<br><br>

	The long list of substances that went into McFarland’s veins includes heroin, cocaine, liquid LSD, even alcohol. He also smoked crack cocaine and methamphetamine and sold crack for the Crips street gang.<br><br>

	He was locked in a downward spiral that could have ended in death if he hadn’t gone to prison, which he calls “the best thing that ever happened to me.”<br><br>

	While his incarceration also could have killed him — he was stabbed twice in the legs and slashed once across the stomach with a razor during his time behind bars — it turned out to be the wake-up call he needed to turn his life around.

	The day he got paroled in 2000, the guards assured him he’d be back, because “everybody comes back,” McFarland recalled. But every day for the last 16 years, he’s been proving them wrong.<br><br>

	And that’s the message he tries to deliver when he talks to troubled teens or drug users now.<br><br>

	“I just make it simple: This does not define who you are. This is just who you are today,” he said.<br><br>

	As always, McFarland uses his own life to illustrate his point.<br><br>

	“I used to be a drug addict,” he said. “I used to have a drug problem. But I am not a drug addict today. I’m a friggin’ college graduate.”<br><br>
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
