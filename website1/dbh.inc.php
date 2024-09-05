<?php

// $dsn="mysql:host=sql206.infinityfree.com;dbname=if0_36586891_database";
// $dbusername="if0_36586891";
// $dbpassword="2e2dLMFK0lx"; 
$dsn="mysql:host=localhost;dbname=database";
$dbusername="root";
$dbpassword=""; 
try{
    $pdo=new PDO($dsn,$dbusername,$dbpassword);
}
catch(PDOException $e){
die("Connection failed" .$e->getMessage());
}
