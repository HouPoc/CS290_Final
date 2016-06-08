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
$news_id='31543DB001';
?>

  <!-- BEGIN content -->
  <div id="content">
<h3> Safe spaces play important role in community-based HIV prevention, research finds </h3>
<p> <br><br>
11/16/2015 <br>
CORVALLIS, Ore. – The creation and sustainment of “safe spaces” may play a critical role in community-based HIV prevention efforts by providing social support and reducing environmental barriers for vulnerable populations, a new study from an Oregon State University researcher has found. <br><br>

Safe spaces often are run by community-based organizations working with vulnerable populations. They can be used to provide social support and services such as job and education assistance and health testing and treatment. Such spaces appear to be an important but under-used public health tool for prevention and treatment of HIV, said Jonathan Garcia, lead author of the study and an assistant professor in OSU’s College of Public Health and Human Sciences. <br><br>

“These safe spaces serve as surrogate homes, creating an environment with a brotherhood or family undertone for men who have often been marginalized by their families and communities and do not trust public institutions such as churches, schools or law enforcement agencies,” he said. “Often they have no other place to go.” <br><br>

Garcia studies how social experiences influence health, with a focus on developing new public health approaches to address needs of vulnerable populations and communities. His latest research was published recently in the journal PLOS ONE. <br><br>

Co-authors of the paper are Caroline Parker, Richard G. Parker and Patrick A. Wilson and Jennifer S. Hirsch of Columbia University and Morgan M. Philbin of the HIV Center for Clinical and Behavioral Studies at the New York State Psychiatric Institute. The research was supported by a grant from the National Institute of Mental Health.
<br><br>
For the study, researchers spent nearly a year conducting observations and in-depth interviews with 31 black men who were gay or bisexual, or who may not have identified as such but who had sex with other men. They also interviewed 17 others with knowledge of the men and the safe spaces they frequented in the New York City area. 
<br><br>
They focused on black men who have sex with other men because that population is considered particularly vulnerable to HIV, Garcia said. While these men make up just 2 percent of the U.S. population, they accounted for about 75 percent of new HIV infections between 2008 and 2010.
<br><br>
About half of the men interviewed were homeless or were living in unstable housing situations and nearly half were unemployed. About two-thirds of the men had some kind of health insurance, with 17 receiving federal Medicaid. 
<br><br>
The researchers found that these men were using safe spaces as places to hang out and connect, but they also served to address vulnerabilities, including exposure to violence; lack of social support; feelings of fear or mistrust against institutions or law enforcement; and limited employment opportunities.
<br><br>
Addressing those issues and providing a safe, community environment provides a better basis for which men are open and amenable to seeking HIV testing and treatment, Garcia said. 
<br><br>
“The meaning of safety is different for people who don’t feel like they are safe at home, or that the police are on their side,” Garcia said. “Safe spaces help create that feeling of security not found elsewhere.”
<br><br>
The findings are already being used to help shape a clinical trial that is now under way. Men who are at substantial risk of exposure to HIV are given daily HIV medication even though they have not contracted the disease. The goal of this pre-exposure prophylaxis, or PREP, is to prevent HIV infection from taking hold if the person is exposed. The trial incorporates the use of safe spaces, both in person and in online settings, for the men receiving the treatment, Garcia said. 
<br><br>
Safe spaces also could be used in prevention and treatment of other diseases that carry a stigma, including sexually-transmitted infections and Hepatitis C, which is common among intravenous drug users, he said.
<br><br>
One problem facing organizations that operate safe spaces is funding, Garcia said. The safe spaces often are the first thing eliminated when a group or organization experiences a funding shortfall. The rationale is to use funds first on treatment or prevention services. 
<br><br>
“Safe spaces are recognized as something important but are more unofficial,” he said. But the spaces can play such a critical role in educating and providing health services to the affected men that eliminating the spaces could reduce the effectiveness of health programs, Garcia said.
<br><br>
“If that support is what they are lacking, then providing it is likely to help them continue to seek treatment and services,” he said.<br><br>
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
		<textarea id="comment" rows="4" cols="50" name="user_comment" form="upload_comment" maxlength="200" placeholder="Leave your comment here..(200 character max)"></textarea>
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

<?php 
include("footer.php");
?>

</body>
</html>