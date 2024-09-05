<?php

require "dbh.inc.php";
$comment=$_POST['com'];
$post=$_POST['id'];
$query="INSERT INTO comments (comments,:postid) VALUES (:comment,:post)";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':comment', $comment);
$stmt->bindParam(':post', $post);
$stmt->execute();
