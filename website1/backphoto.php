<?php
require 'connection.php';

if($_SERVER["REQUEST_METHOD"]=="POST") {
    $name = $_POST['name'];
    if($_FILES["image"]["error"] === 4) {
        echo "<script>alert('Image does not exist');</script>";
    } else {
        $filename = $_FILES["image"]["name"];
        // $filesize = $_FILES["image"]["size"];
        $tmpname = $_FILES["image"]["tmp_name"];
        // $validimageextension = ['jpg', 'jpeg', 'png'];
        $imageextension = explode('.', $filename);
        $imageextension = strtolower(end($imageextension));
        // if(!in_array($imageextension, $validimageextension)) {
        //     echo "<script>alert('Invalid image extension')</script>";
        // } elseif($filesize > 1000000) {
        //     echo "<script>alert('Image size is too big')</script>";
        // } else {
            $newimagename = uniqid() . '.' . $imageextension;
            move_uploaded_file($tmpname, 'img/' . $newimagename);
            $query = "INSERT INTO backphoto VALUES('', '$name', '$newimagename')";
            mysqli_query($conn, $query);
            echo "<script>alert('File added successfully')</script>";
        }
    }
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="./backphoto.php" method="post" autocomplete="off" enctype="multipart/form-data">
        <input type="text" name="name" id=""><br>
        <input type="file" name="image" accept=".jpg,.jpeg,.png">
        <button type="submit" name="submit">Submit</button>
    </form>
    <a href="data.php">Data</a>
</body>
</html>
