<?php

include('connect.php');


$userName = $_POST['username'];
$comment = $_POST['comment'];
$insert = mysql_query("INSERT INTO Comments (Username, Comment) VALUES ('$userName', '$comment')");
//header("Location: comments.php");



