<?php
	$count = 0;
	include("db.php");
	$cookie_name="user";
	$user_name=$_COOKIE[$cookie_name];
	$comment_table = array(
    array('empty', 'empty', 15, 0), array('empty', 'empty', 15, 0), array('empty', 'empty', 15, 0), array('empty', 'empty', 15, 0), array('empty', 'empty', 15, 0),
	array('empty', 'empty', 15, 0), array('empty', 'empty', 15, 0), array('empty', 'empty', 15, 0), array('empty', 'empty', 15, 0), array('empty', 'empty', 15, 0),
	array('empty', 'empty', 15, 0), array('empty', 'empty', 15, 0), array('empty', 'empty', 15, 0), array('empty', 'empty', 15, 0), array('empty', 'empty', 15, 0),
	array('empty', 'empty', 15, 0), array('empty', 'empty', 15, 0), array('empty', 'empty', 15, 0), array('empty', 'empty', 15, 0), array('empty', 'empty', 15, 0),
	);
	$sql = "CALL show_user_comments ('$user_name')";
	$result = $connection->query($sql);
	while($row=$result->fetch_assoc()) {
		$comment_table[$count][0] = $row["Title"];
		$comment_table[$count][1] = "Winter Is Coming";
		$comment_table[$count][2] = $row["News_ID"];
		$comment_table[$count][3] = $count;
		$count += 1;
	}
	$comment_table[0][3] = $count;
	echo json_encode($comment_table);
?>