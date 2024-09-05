<?php

require "dbh.inc.php";

$query="SELECT * FROM posts";
$stmt=$pdo->prepare($query);
$stmt->execute();

$result=$stmt->fetchAll(PDO::FETCH_ASSOC);

foreach($result as $row)
{echo "<br>";
    
    echo $row['username'];

    echo "<img src='img/".$row['posts']."'>";
}