<?php

require "dbh.inc.php";
$username=$_GET['username'];
$query="SELECT bio FROM cyberusers WHERE username=:username";
$stmt=$pdo->prepare($query);

$stmt->bindParam(":username",$username);
$stmt->execute();
$resultbio=$stmt->fetch(PDO::FETCH_ASSOC);