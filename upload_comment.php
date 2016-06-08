<?php
	include("db.php");
	//Include database access information
	$cookie_name = "user";
	$user_name = $_COOKIE[$cookie_name];
	//Access  cookie to get username.
	$comment = $_POST["user_comment"];
	$news = $_POST["news_id"];
	$comment_date = $_POST["comments_date"];
	//Use post to get comment, news_id, and comment date infor
	$sql = "SELECT * FROM `Comments` WHERE 1";
	$result = $connection->query($sql);
	$count = $result->num_rows;
	$count = $count + 1;
	//Access to Table 'Comments' to get the count of total comments to generate comment_id
	$comment_id =$news.$count;
	//Use comment_count and news_id to generate the comment_id
	$sql = "INSERT INTO `Comments`(`Comment_ID`,`User_Name`, `Comments`, `News_ID`, `comments_date`) 
	VALUES ('$comment_id', '$user_name','$comment','$news', '$comment_date')";
	$connection->query($sql);
	//Update the Comments table with news id, comment, user name, comment date. 
	header("Location:".$news.".php");
	//header back to the news page
	$sql->free();
	$connection->close();
?>