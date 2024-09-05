<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $pass = $_POST["pass"];
    
    try {
        require_once "dbh.inc.php";
        $query = "DELETE FROM users WHERE username=:username AND pass=:pass ;";
        $stmt = $pdo->prepare($query);
        $stmt ->bindParam(":username",$username);
        $stmt ->bindParam(":pass",$pass);
        
        $stmt->execute();
        $pdo = null;
        $stmt = null;
        header("Location: ../website1/index.php");
        die();
    } catch (PDOException $e) {
        die ("FAILED " . $e->getMessage());
    }
} else {
    header("Location: ../website1/index.php");
}