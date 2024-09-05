<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username1 = $_POST["name"];

    try {
        require_once "dbh.inc.php";
        $query = "SELECT username,email FROM cyberusers WHERE username=:username1";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":username1", $username1);

        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $pdo = null;
        $stmt = null;


    } catch (PDOException $e) {
        die("FAILED " . $e->getMessage());
    }
}

// Assign session variable after checking if $results is not empty
if (!empty($results)) {
    $_SESSION['username'] = $username1;
    $_SESSION['email']= $results[0]['email'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!-- <form action="./searchfriends.php" method="post">
    <input type="text" class="search" placeholder="Search friends" name="usersearch"><button type="submit">Search</button>
    </form> -->
    <?php
    if (!empty($results)) {
        echo $_SESSION['username']."<br>";
        echo $_SESSION['email'];
    }
    else{
        echo "no username found";
    }
    ?>
</body>
</html>
