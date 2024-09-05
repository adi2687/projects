<?php

$dsn = "mysql:host=localhost;dbname=chat";
$dbusername = "root";
$dbpa = "";

try {
    $pdo = new PDO($dsn, $dbusername, $dbpa);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "done bro";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
