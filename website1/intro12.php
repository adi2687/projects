<?php

require "dbh.inc.php";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $name=$_POST["name"];;
    header("Location: ./test12.php");
    $_SESSION['username']=$name;
}

?>

