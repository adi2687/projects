<?php 
// var_dump($_SERVER["REQUEST_METHOD"])
if ($_SERVER["REQUEST_METHOD"]=="POST"){
$firstname=htmlspecialchars($_POST["fname"]);
$lastname=htmlspecialchars($_POST["lname"]);
if(empty($firstname) || empty($lastname)){
    
    header("Location: ../website1/formhandler.php");
    exit();
}
$favouritepet=htmlspecialchars($_POST["favouritepet"]);
echo "these are the data that the user submitted <br>". $firstname."<br>" . $lastname ."<br>". $favouritepet;
header("Location: ../webfsite1/index.php");
}
else{
    header("Location: ../website1/index.php");
}