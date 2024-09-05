<?php
session_start();
require 'connection.php';

$username = $_SESSION['username'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newusername = $_POST["newusername"];
    $pass = $_POST["pass"];
    $bio = $_POST["bio"]; // Retrieve bio from POST data
    
    try {
        require_once "dbh.inc.php";
        
        // Update username in cyberusers table
        $query = "UPDATE cyberusers SET username=:newusername WHERE username=:username AND pass=:pass";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":newusername", $newusername);
        $stmt->bindParam(":pass", $pass);
        $stmt->execute();
        
        // Update name1 in profileimage123 table
        $query1 = "UPDATE profileimage123 SET name1=:newusername WHERE name1=:username";
        $stmt1 = $pdo->prepare($query1);
        $stmt1->bindParam(":username", $username);
        $stmt1->bindParam(":newusername", $newusername);
        $stmt1->execute();
        
        // Update bio in intro table
        $query2 = "UPDATE intro SET name1=:newusername WHERE name1=:username";
        $stmt2 = $pdo->prepare($query2);
        $stmt2->bindParam(":username", $username);
        $stmt2->bindParam(":newusername", $newusername);
        $stmt2->execute();
        
        // Closing the connection and statement objects
        $pdo = null;
        $stmt = null;
        $stmt1 = null;
        $stmt2 = null;
        
        // Redirecting to the appropriate page after successful update
        header("Location: ../website1/index1.html");
        exit();
    } catch (PDOException $e) {
        die("FAILED " . $e->getMessage());
    }
} else {
    // Redirecting to the profile visit page if the request method is not POST
    header("Location: ../website1/index1.html");
    exit();
}
