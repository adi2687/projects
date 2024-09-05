<?php

require "dbh.inc.php";
$username=$_GET['username'];
$query="SELECT * FROM posts WHERE username=:username";
$stmt=$pdo->prepare($query);
$stmt->bindParam(":username",$username);
$stmt->execute();
$resultposts=$stmt->fetchAll(PDO::FETCH_ASSOC);
