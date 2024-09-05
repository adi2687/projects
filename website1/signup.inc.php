<?php 
if($_SERVER["REQUEST_METHOD"=="POST"]){
    $username=$_POST["username"];
$pwd=$_POST["password"];
$email=$_POST["email"];
try {
require_once 'dbh.inc.php';
require_once 'signup_model.inc.php';
require_once 'signup_controller.inc.php';
$errors=[];
if(isinputempty($username,$pwd,$email)){
$errors["emptyinput"]="Fill in all fields";
}
if(isemailvalid($email)){
$errors["invalidemail"]="INVALID EMAIL";
}
if(isusernametaken($pdo,$username)){
$errors["usernametaken"]="username already used";
}
if(isemailregistered($pdo,$email)){
$errors["emailused"]="Email alerady in use";
}
require_once 'config.php';
if($errors){
    $_SESSION["errors_signup"]=$errors;
    header("Location: ../website1/login.php");
}
}
catch (PDOException $e) {
    die("connection failed :".$e->getMessage());
}

}else{
    header("Location: ../website1/login.php");
    die();
}