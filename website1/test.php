<?php
require "dbh.inc.php"; // Include your database connection file

$query = "SELECT * FROM cyberusers";
$stmt = $pdo->prepare($query);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($result as $row) {
    // Assuming 'image1' column contains the image file names or paths
    $imagePath = 'img/' . $row['image1'];
    echo "<img src='$imagePath' alt='User Image'>"; // Output the image tag
}
?>
