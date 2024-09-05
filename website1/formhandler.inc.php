<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["pass"];
    $email = $_POST["email"];
    try {
        require_once "dbh.inc.php";

        // Hash the password
        $password_hash = password_hash($password, PASSWORD_BCRYPT);

        if (!empty($username) && !empty($password) && !empty($email)) {
            $checkquery = "SELECT COUNT(*) AS count FROM cyberusers WHERE username=:username";
            $checkstmt = $pdo->prepare($checkquery);
            $checkstmt->bindParam(":username", $username);
            $checkstmt->execute();
            $result = $checkstmt->fetch(PDO::FETCH_ASSOC);

            $checkquery1 = "SELECT COUNT(*) AS count FROM cyberusers WHERE email=:email";
            $checkstmt1 = $pdo->prepare($checkquery1);
            $checkstmt1->bindParam(":email", $email);
            $checkstmt1->execute();
            $result1 = $checkstmt1->fetch(PDO::FETCH_ASSOC);

            if ($result['count'] > 0) {
                header("Location: ../website1/emailinuse.php");
                exit();
            } elseif ($result1['count'] > 0) {
                header("Location: ../website1/emailinuse.php");
                exit();
            } else {
                // Insert user data including hashed password
                $query = "INSERT INTO cyberusers (username, pass, email, image1, coverphoto) VALUES (:username, :password, :email, '6667cf3ead21c.jpg', '6667cf35c7bf7.png')";
                $stmt = $pdo->prepare($query);
                $stmt->bindParam(":username", $username);
                $stmt->bindParam(":password", $password_hash); // Use the hashed password
                $stmt->bindParam(":email", $email);
                $stmt->execute();

                header("Location: ../website1/index.html");
                exit();
            }
        } else {
            echo "<h2>Enter all fields</h2>";
        }
    } catch (PDOException $e) {
        die("FAILED " . $e->getMessage());
    }
} else {
    header("Location: ../website1/index.html");
    exit();
}
?>
