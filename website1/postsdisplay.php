<?php
// session_start();
require "dbh.inc.php";
$username=$_SESSION['username'];
$query="SELECT posts FROM posts WHERE username=:username";

$stmt=$pdo->prepare($query);

$stmt->bindParam(":username",$username);

$stmt->execute();

$result=$stmt->fetchAll(PDO::FETCH_ASSOC);


foreach($result as $row)
{
    echo "<div class='displayimages'><img src=img/".$row['posts']."></div>";
}