<?php
require "dbh.inc.php";
session_start();

$logininfo = trim($_POST['emailorusername']);
$password = $_POST['password'];

// Fetch user data based on email or username
$query = "SELECT * FROM users WHERE email = :logininfo OR username = :logininfo";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':logininfo', $logininfo);
$stmt->bindParam(":password",$password);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user ) {
    $_SESSION['user_id'] = $user['user_id'];
    echo "User logged in successfully.";
} else {
    echo "Invalid login credentials.";
}
?>
