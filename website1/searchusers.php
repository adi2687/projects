<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usersearch = $_POST["usersearch"];
    $pass = $_POST["pass"];

    try {
        require_once "dbh.inc.php";   //*

        $query = "SELECT * FROM cyberusers WHERE username=:usersearch AND pass=:pass";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":usersearch", $usersearch);
        $stmt->bindParam(":pass", $pass);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $pdo = null;
        $stmt = null;


    } catch (PDOException $e) {
        die("FAILED " . $e->getMessage());
    }

} else {
    // header("Location: ../website1/homepage.php");
}
$_SESSION['username']=$usersearch;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>
    <?php
    if (empty($results)) {

        header("Location: ../website1/redirec.php");
        exit();
    } else {
        header("Location: ../website1/homepage.php");
    }

    ?>

</body>

</html>