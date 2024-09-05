<?php

require "dbh.inc.php";



session_start();
// Assuming you have retrieved the user ID from the session or any other source
// $user_id = $_SESSION['username'];
$name1 = $_SESSION['username'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_FILES["image"]["error"] === 4) {
        echo "<script>alert('Image does not exist');</script>";
    } else {
        $filename = $_FILES["image"]["name"];
        $tmpname = $_FILES["image"]["tmp_name"];
        $imageextension = pathinfo($filename, PATHINFO_EXTENSION); // Get file extension
        $newimagename = uniqid() . '.' . $imageextension;

        // Move uploaded file to destination directory
        move_uploaded_file($tmpname, 'img/' . $newimagename);

        try {
            // Check if user already has a profile image
            $stmt_count = $pdo->prepare("SELECT COUNT(*) FROM cyberusers WHERE username = :name1");
            $stmt_count->bindParam(":name1", $name1);
            $stmt_count->execute();
            $count = $stmt_count->fetchColumn();

            if ($count > 0) {
                // Update existing profile image
                $query = "UPDATE cyberusers SET image1 = :newimagename WHERE username = :name1";
            } else {
                // Insert new profile image
                $query = "INSERT INTO cyberusers (image1) VALUES (:newimagename)";
            }

            $stmt_insert = $pdo->prepare($query);
            $stmt_insert->bindParam(":name1", $name1);
            $stmt_insert->bindParam(":newimagename", $newimagename);
            $stmt_insert->execute();

            // Redirect after successful upload
            header("Location: ../website1/profilevisit.php");
            exit;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

