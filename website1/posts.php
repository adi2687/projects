<?php
session_start();
require 'dbh.inc.php'; // Include your database connection file

$name2 = $_SESSION['username'];
$cap = $_POST['cap'];

// Check if form is submitted via POST and process file upload
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if a file is uploaded
    if ($_FILES["posts"]["error"] === 4) {
        echo "<script>alert('Select a file');</script>";
        echo "<script>window.location='profilevisit.php';</script>";
        exit(); // Exit script if no file selected
    } else {
        // File upload handling
        $filename = $_FILES["posts"]["name"];
        $tmpname = $_FILES["posts"]["tmp_name"];
        $imageextension = pathinfo($filename, PATHINFO_EXTENSION);
        $newimagename = uniqid() . '.' . $imageextension;

        // Validate file extension (optional)
        $allowed_extensions = array("jpg", "jpeg", "png", "gif");
        if (!in_array(strtolower($imageextension), $allowed_extensions)) {
            echo "<script>alert('Invalid file type. Allowed types: jpg, jpeg, png, gif');</script>";
            echo "<script>window.location='profilevisit.php';</script>";
            exit(); // Exit script if invalid file type
        }

        // Move uploaded file to img directory
        move_uploaded_file($tmpname, 'img/' . $newimagename);

        // Insert image details into database
        $query = "INSERT INTO posts (username, posts, cap) VALUES (:name2, :newimagename, :cap)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':name2', $name2);
        $stmt->bindParam(':newimagename', $newimagename);
        $stmt->bindParam(':cap', $cap);
        $stmt->execute();

        // Redirect to profilevisit.php after successful upload
        header("Location: ../website1/profilevisit.php");
        exit(); // Exit script after redirect
    }
}
?>
