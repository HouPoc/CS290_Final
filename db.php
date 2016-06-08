<?php
$dbhost = 'mysql.cs.orst.edu';
$dbname = 'cs340_liujiaw';
$dbuser = 'cs340_liujiaw';
$dbpass = '3066';
$connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($connection->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>