<?php

require "dbh.inc.php";

$query="SELECT image1 FROM posts123";
$stmt=$pdo->prepare($query);
$stmt->execute();
$result12=$stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        div{
            /* border:3px solid red; */
            width:97vw;
            height: 100vh;
            display: flex;
            flex-direction:column;
            gap:1%
        }
        div img{
            width:100%;
            height:auto;
            border-radius:39px;
            border:5px solid grey;
            
        }
        h2{
            position: relative;
            /* top:0%; */
           
            left:0%;
            font-size: 330%;
            
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
    </style>
</head>
<body>
    <h2>Online image gallery</h2>
    <div>
    <?php
foreach($result12 as $row){
    echo "<img src='img/".$row['image1'] ."'>";}
    ?>
    </div>
</body>
</html>