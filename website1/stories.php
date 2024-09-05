<?php

require "dbh.inc.php";
session_start();
$username=$_SESSION['username'];
$query="SELECT * FROM cyberusers WHERE username=:username";
$stmt=$pdo->prepare($query);
$stmt->bindParam(":username",$username);
$stmt->execute();
$result=$stmt->fetch(PDO::FETCH_ASSOC);
if($result){
    echo "<img src='img/".$result['image1']."'>";
    echo "<p class='username'>".$result['username']."</p>";
}
else{
    echo "Couldnt fetch";
}
