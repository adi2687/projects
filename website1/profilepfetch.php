<?php
session_start();
require "dbh.inc.php";

$username = $_GET['username'];
$query = "SELECT image1 FROM cyberusers WHERE username=:username";
$stmt = $pdo->prepare($query);
$stmt->bindParam(":username", $username); // Colon was missing here
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if a valid image URL is retrieved from the database
if ($result && !empty($result['image1'])) {
    $imagesrc = "img/" . htmlspecialchars($result['image1']);
    echo '<img src="' . $imagesrc . '" class="profilephoto">';
} 
?>
