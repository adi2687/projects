<?php
session_start();

if (isset($_SESSION['username'])) {
    // Include database configuration
    $dsn = "mysql:host=localhost;dbname=database";
    $dbusername = "root";
    $dbpassword = "";

    try {
        $pdo = new PDO($dsn, $dbusername, $dbpassword);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Enable error reporting
        // echo "Database connected successfully<br>";
    } catch (PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
    }

    // Retrieve form data using $_POST
    $outgoing_name = $_SESSION['username']; // Assuming this is the sender's username from session
    $incoming_name = $_POST['incoming_name']; // Assuming this is the recipient's name
    $message1 = $_POST['message']; // Assuming this is the message content
// echo $incoming_name;
    // Check if message content is not empty
    if (!empty($message1)) {
        // Prepare and execute the SQL query to insert message into database
        $query = "INSERT INTO messages1 (msg_sender, msg_reciever, msg) VALUES (:outgoing_name, :incoming_name, :message1)";
        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":outgoing_name", $outgoing_name);
        $stmt->bindParam(":incoming_name", $incoming_name);
        $stmt->bindParam(":message1", $message1); // Use :message1 for the msg column
        $stmt->execute();

        // Execute the insert query
        // try {
        //     $stmt->execute();
        //     // echo "Message sent successfully<br>";

            // Retrieve recipient's ID from cyberusers table
            $query1 = "SELECT id FROM cyberusers WHERE username = :incoming_name";
            $stmt1 = $pdo->prepare($query1);
            $stmt1->bindParam(":incoming_name", $incoming_name);
            $stmt1->execute();
            $result = $stmt1->fetch(PDO::FETCH_ASSOC);

        //     if ($result) {
        // Redirect to chat.php with recipient's ID as query parameter
        $recipient_id = $result['id'];       
        echo "Message sent successfully";
        header("Location: ../website1/chat.php?id=$recipient_id");
        // exit(); // Ensure script execution stops after redirection
        // } else {
        //     echo "Recipient not found";
        // }
        // } catch (PDOException $e) {
        //     die("Error inserting message: " . $e->getMessage());
        // }
    } else {
        echo "Message cannot be empty!";
    }
} else {
    echo "User session not found. Please login.";
}