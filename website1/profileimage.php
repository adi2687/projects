<?php
require "dbh.inc.php";
// session_start();

$username = $_SESSION['username'];
$query = "SELECT image1 FROM cyberusers WHERE username = :username";
$stmt = $pdo->prepare($query);
$stmt->bindParam(":username", $username);
$stmt->execute();
$resultimage = $stmt->fetch(PDO::FETCH_ASSOC);

// Return the image path or a default image
// echo $resultimage && !empty($resultimage['image1']) ? $resultimage['image1'] : 'default_profile.jpg';
