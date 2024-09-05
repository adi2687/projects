<?php

$dsn = "mysql:host=localhost;dbname=form";
$dbusername = "root";
$dbpass = "";
$pdo = new PDO($dsn, $dbusername, $dbpass);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $hobb = $_POST["hobbies"];
    $sql = "INSERT INTO table1 (fname, lname, interest) VALUES (:fname, :lname, :hobb)"; // Corrected the SQL query
    $stmt = $pdo->prepare($sql);
   
    $stmt->bindParam(":fname", $fname); // Corrected the parameter binding
    $stmt->bindParam(":lname", $lname); // Corrected the parameter binding
    $stmt->bindParam(":hobb", $hobb);   // Corrected the parameter binding
    $stmt->execute();
}
?>

