<?php
require "dbh.inc.php"; // Ensure this file contains the correct PDO connection details

// session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] === 0) {
        $filename = $_FILES["image"]["name"];
        $tmpname = $_FILES["image"]["tmp_name"];
        $imageextension = pathinfo($filename, PATHINFO_EXTENSION);
        $newimagename = uniqid() . '.' . $imageextension;

        // Ensure the 'img' directory exists and is writable
        if (!is_dir('img')) {
            mkdir('img', 0777, true);
        }

        // Validate the file type
        $valid_extensions = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array(strtolower($imageextension), $valid_extensions)) {
            echo "<script>alert('Invalid file type');</script>";
            exit;
        }

        // Validate the file size (e.g., max 2MB)
        

        // Move uploaded file to destination directory
        if (move_uploaded_file($tmpname, 'img/' . $newimagename)) {
            try {
                // Insert new profile image into the database
                $query = "INSERT INTO posts123 (image1) VALUES (:newimagename)";
                
                $stmt_insert = $pdo->prepare($query);
                $stmt_insert->bindParam(":newimagename", $newimagename);
                $stmt_insert->execute();

                // Redirect after successful upload
                header("Location: ./display.php");
                exit;
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        } else {
            echo "<script>alert('Failed to move uploaded file');</script>";
        }
    } else {
        echo "<script>alert('No image uploaded or there was an error uploading the image');</script>";
    }
    // header("Location: ./test12.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image</title>
    <style>

    </style>
</head>
<body>
    <?php
    session_start();
echo $_SESSION['username'];
    ?>
    <h1>Upload pictures and share with friends</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="image" required>
        <input type="text" name="captionmain">
        <input type="submit" value="Upload">
    </form>
</body>
</html>
