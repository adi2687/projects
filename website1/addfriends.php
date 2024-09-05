<?php
session_start();
require "dbh.inc.php";

$username=$_SESSION['username'];
$query = "SELECT username FROM cyberusers WHERE username!=:username";
$stmt = $pdo->prepare($query);
$stmt->execute(["username"=>$username]);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

$baseUrl = "http://localhost/website1/friends.php?username=";
$query="SELECT COUNT(*) AS count FROM cyberusers";
$stmt=$pdo->prepare($query);
$stmt->execute();
$result2=$stmt->fetch(PDO::FETCH_ASSOC);
$count=$result2['count'];
// echo $count;
$random=rand(1,$count);
// echo $randnum;
$query3="SELECT username FROM cyberusers WHERE id=:random";
$stmt3=$pdo->prepare($query3);
$stmt3->bindParam(":random",$random);
$stmt3->execute();
$result4=$stmt3->fetch(PDO::FETCH_ASSOC);
echo $result4['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Friends</title>
</head>
<body>
    <?php foreach ($result as $r): ?>
        <a href="<?php echo $baseUrl . urlencode($r['username']); ?>">Add <?php echo htmlspecialchars($r['username']); ?></a><br>
    <?php endforeach; ?>
</body>
</html>
