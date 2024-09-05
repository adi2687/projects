<?php
session_start();
require "dbh.inc.php";


// Assuming you have retrieved the user ID from the session or any other source
$user_id = $_SESSION['username'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bio = $_POST["bio"];
    $count = $pdo->prepare("SELECT COUNT(*) FROM cyberusers WHERE username=:user_id");
    // $count1=$pdo->prepare($count);
    $count->bindParam(":user_id", $user_id);
    $count->execute();
    $count1=$count->fetchcolumn();
    if ($count1 > 0) {
        $query = "UPDATE cyberusers SET bio=:bio WHERE username=:user_id";

    } else {
        // Update the bio using the user ID
        // $query = "UPDATE intro SET bio = :bio WHERE name1 = :user_id";
        $query = "INSERT INTO cyberusers (bio) VALUES (:bio)  WHERE username=:user_id";
    }
    // $query="UPDATE intro SET bio=:bio WHERE name1=:user_i"
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->bindParam(":bio", $bio);
    $stmt->execute();

    // Redirect to the profile visit page
    header("Location: ../website1/profilevisit.php");
} else {
    header("Location: ../website1/index1.html");
}
