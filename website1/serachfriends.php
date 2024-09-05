<?php


function findSimilarNamesFromDatabase($input, $pdo)
{
    // Prepare a query to fetch all usernames
    $query = "SELECT username FROM cyberusers";
    $stmt = $pdo->query($query);
    $allUsernames = $stmt->fetchAll(PDO::FETCH_COLUMN);

    // Calculate the length of the input string
    $inputLength = strlen($input);

    // Calculate the length of each username and count the occurrences of the input in each username
    $similarNames = [];
    foreach ($allUsernames as $username) {
        $usernameLength = strlen($username);
        $occurrences = 0;
        for ($i = 0; $i < min($inputLength, $usernameLength); $i++) {
            if ($input[$i] === $username[$i]) {
                $occurrences++;
            }
        }
        $similarityPercentage = round(($occurrences / max($inputLength, $usernameLength)) * 100);

        // Consider a similarity threshold, for example, 20%
        if ($similarityPercentage >= 25 ) {
            $similarNames[] = [
                'username' => $username,
                'similarity_percentage' => $similarityPercentage
            ];
        }
    }

    return $similarNames;
}

// Connect to the database
$pdo = new PDO("mysql:host=localhost;dbname=database", "root", "");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["username"];

    // Call the function to find similar names from the database
    $similarNames = findSimilarNamesFromDatabase($name, $pdo);

    // Output the results
    echo "Similar names for '{$name}':<br>";
    foreach ($similarNames as $row) {
        echo "{$row['username']} (Similarity: {$row['similarity_percentage']}%)<br>";
    }
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
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="text" name="username" id="input">
        <button type="submit">Search</button>
    </form>
</body>

</html>