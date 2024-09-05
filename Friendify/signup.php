<?php
require "dbh.inc.php";
session_start();

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$password = $_POST['password'];

// Check for duplicate email
$query = "SELECT * FROM users WHERE email = :email OR (fname = :fname AND lname = :lname)";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':fname', $fname);
$stmt->bindParam(':lname', $lname);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if ($result) {
    if ($result['email'] == $email) {
        echo "Email already exists.";
    } elseif ($result['fname'] == $fname && $result['lname'] == $lname) {
        echo "Name already exists.";
    }
    exit(); // Stop execution if email or name already exists
}

// Hash the password before storing it
// $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$status = "Active now";
$randomid = rand(time(), 10000000);
$lastse = "Active";
$username=$fname." ".$lname;
// Insert the user into the database
$query = "INSERT INTO users (unique_id,username,fname, lname, email, password, status, lastse) VALUES (:randomid,:username, :fname, :lname, :email, :password, :status, :lastse)";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':randomid', $randomid);
$stmt->bindParam(':fname', $fname);
$stmt->bindParam(':lname', $lname);
$stmt->bindParam(":username",$username);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $password);
$stmt->bindParam(':status', $status);
$stmt->bindParam(':lastse', $lastse);

if ($stmt->execute()) {
    $_SESSION['unique_id'] = $randomid;
    echo "User registered successfully.";
} else {
    echo "An unknown error occurred. Please try again.";
}
?>
