<?php
session_start();
require 'connection.php';
$dsn = "mysql:host=localhost;dbname=database";
$dbusername = "root";
$dbpassword = "";
$pdo = new PDO($dsn, $dbusername, $dbpassword);

$name2 = $_SESSION['username']; // Corrected typo

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    // Corrected REQUEST_METHOD
    if($_FILES["file"]["error"]===4){
        echo "No file selected";    
    }
    $filename = $_FILES["coverphoto"]["name"];
    $tmpname = $_FILES["coverphoto"]["tmp_name"]; // Corrected tmp_name
    $imageextension = pathinfo($filename, PATHINFO_EXTENSION);
    $newimagename = uniqid() . '.' . $imageextension;
    move_uploaded_file($tmpname, 'img/' . $newimagename);
    
    $count = $pdo->prepare("SELECT COUNT(*) FROM cyberusers WHERE username=:name2");
    $count->bindParam(":name2", $name2); // Corrected binding parameter name
    $count->execute();
    $count1 = $count->fetchColumn(); // Corrected typo and assignment
    
    if ($count1 > 0) {
        $query = "UPDATE cyberusers SET coverphoto=:newimagename WHERE username=:name2"; // Corrected table name
    } else {
        $query = "INSERT INTO cyberusers (name1, coverphoto) VALUES (:name2, :newimagename)"; // Corrected table name
    }
    
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":name2", $name2);
    $stmt->bindParam(":newimagename", $newimagename);
    $stmt->execute();
    header("Location: ../website1/profilevisit.php");
    exit();
} else {
    header("Location: ../website1/index1.html");
}

