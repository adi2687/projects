<?php
// Check if session is already active
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Start the session if not already started
}

// Retrieve the username from session
$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';

// Retrieve the user ID from URL parameter (ensure it's an integer)
$id = ($_GET["id"]);
// echo $id;
// Database connection parameters (replace with secure credentials)
$hostname = "localhost";
$dbusername = "root";
$dbpassword = "";
$database = "database";

try {
    // Create a PDO connection
    $dsn = "mysql:host=$hostname;dbname=$database";
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Enable error reporting

    // Prepare and execute SQL query to fetch messages for the given ID
    $query = "SELECT username FROM cyberusers WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    // Fetch all messages as an associative array
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    echo $result['username'];
} catch (PDOException $e) {
    die("Error: " . $e->getMessage()); // Handle any database errors
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Application</title>
    <link rel="stylesheet" href=""> <!-- Include your CSS file -->
    <style>
        .logo {
            width: 100vw;
            height: 17%;
            position: absolute;
            top: 8%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .heading {
            font-size: 300%;
            position: absolute;
            left: 58%;
            top: 4%;
            color: lightblue;
            font-weight: bold;
            height: 10px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Montserrat', sans-serif;
        }

        body {
            background-color: #c9d6ff;
            background: url(back-4.jpg);
            background-repeat: no-repeat;
            background-size: 100% 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            border-radius: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.35);
            position: absolute;
            left: 47%;
            top: 21%;
            overflow: hidden;
            /* width:696px; */
            /* max-width: 100%;
    min-height: 480px; */
            width: 50%;
            height: 65%;
        }

        .container p {
            font-size: 14px;
            line-height: 20px;
            letter-spacing: 0.3px;
            margin: 20px 0;
        }

        .container span {
            font-size: 12px;
        }

        .container a {
            color: #333;
            font-size: 13px;
            text-decoration: none;
            margin: 15px 0 10px;
        }

        .container button {
            background-color: #3A5892;
            color: #fff;
            font-size: 12px;
            padding: 12px 45px;
            border: 1px solid transparent;
            border-radius: 8px;
            font-weight: 600;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            margin-top: 10px;
            cursor: pointer;
        }

        .container button.hidden {
            background-color: transparent;
            border-color: #fff;
        }

        .container form {
            background-color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 40px;
            height: 100%;
        }

        .container input {
            background-color: #eee;
            border: none;
            margin: 8px 0;
            padding: 10px 15px;
            font-size: 13px;
            border-radius: 8px;
            width: 100%;
            outline: none;
        }

        .form-container {
            position: absolute;
            top: 0;
            height: 100%;
            transition: all 0.6s ease-in-out;
        }

        .sign-in {
            left: 0;
            width: 50%;
            z-index: 2;
        }

        .container.active .sign-in {
            transform: translateX(100%);
        }

        .sign-up {
            left: 0;
            width: 50%;
            opacity: 0;
            z-index: 1;
        }

        .container.active .sign-up {
            transform: translateX(100%);
            opacity: 1;
            z-index: 5;
            animation: move 0.6s;
        }

        @keyframes move {

            0%,
            49.99% {
                opacity: 0;
                z-index: 1;
            }

            50%,
            100% {
                opacity: 1;
                z-index: 5;
            }
        }

        .social-icons {
            margin: 20px 0;
        }

        .social-icons img {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            margin: 0 3px;
            width: 40px;
            height: 40px;
        }

        .toggle-container {
            position: absolute;
            top: 0;
            left: 50%;
            width: 50%;
            height: 100%;
            overflow: hidden;
            transition: all 0.6s ease-in-out;
            border-radius: 150px 0 0 100px;
            z-index: 1000;
        }

        .container.active .toggle-container {
            transform: translateX(-100%);
            border-radius: 0 150px 100px 0;
        }

        .toggle {
            background-color: #3A5892;
            height: 100%;
            background-color: #3A5892;
            color: #fff;
            position: relative;
            left: -100%;
            height: 100%;
            width: 200%;
            transform: translateX(0);
            transition: all 0.6s ease-in-out;
        }

        .container.active .toggle {
            transform: translateX(50%);
        }

        .toggle-panel {
            position: absolute;
            width: 50%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 30px;
            text-align: center;
            top: 0;
            transform: translateX(0);
            transition: all 0.6s ease-in-out;
        }

        .toggle-left {
            transform: translateX(-200%);
        }

        .container.active .toggle-left {
            transform: translateX(0);
        }

        .toggle-right {
            right: 0;
            position: absolute;
            top: 10%;

            transform: translateX(0);
        }

        .container.active .toggle-right {
            transform: translateX(200%);
        }

        .line {
            line-height: 15px;
            position: absolute;
            top: 49%;
        }

        .laptop {
            position: absolute;
            top: 23%;
            left: 2%;
            width: 40%;
            height: 60%;
        }

        .inthelaptop {
            width: 24.6%;
            height: 26.9%;
            position: absolute;
            top: 29.7%;
            left: 9.5%;
            /* border: 0.1px solid red; */
        }

        .change {
            position: absolute;
            left: 10%;
            top: 40%;
        }

        .foot {
            position: absolute;
            top: 92%;
            left: 40%;
            display: flex;
            gap: 30%;
            color: black;
            transform: translate(-50%, -50%);
            font-size: 90%;
            font-weight: 700;
            cursor: pointer;
            font-family: serif;
        }

        .info {
            position: absolute;
            top: 95%;
            left: 50%;
            font-weight: 800;
            color: black;
            font-size: 90%;
            transform: translate(-50%, -50%);
        }

        .copyright {
            position: absolute;
            top: 98%;
            left: 50%;
            font-weight: 800;
            color: Black;
            font-size: 100%;
            transform: translate(-50%, -50%);
        }

        .toggle-panel>h1 {
            position: absolute;
            top: 15%;
        }

        .intro1 {

            font-weight: bolder;
            /* font-size: 10%; */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 120%;
            position: absolute;
            top: 37%;
        }

        .hidden {
            position: absolute;
            top: 55%;
        }

        .metbefore {
            position: absolute;
            top: 30px;
        }

        .toggle-panel .toggle-left .hidden {
            position: absolute;
            top: 40%;
        }

        #login {
            position: absolute;
            top: 60%;
        }

        .button1 {
            position: absolute;
            top: 40%;
            width: 40%;

        }

        /* .logomain{
    width:28%;
    height:18%;
    position: absolute;top:-1%;
    left:59%
} */

        .users {
            height: 500px;
            width: 400px;
            border: 1px solid black;
            margin: 10px;
            padding: 5px;
        }

        .users-list a {
            text-decoration: none;
            margin-bottom: 10px;
            padding-right: 15px;
            cursor: pointer;
        }

        .wrapper {
            background: #fff;
            max-width: 450px;
            width: 100%;
            border-radius: 16px;
            box-shadow: 0 0 128px 0 rgba(0, 0, 0, 0.1),
                0 32px 64px -48px rgba(0, 0, 0, 0.5);
        }

        .chat-area header {
            display: flex;
            align-items: center;
            padding: 18px 30px;
        }

        .chat-area header span {
            font-size: 17px;
            font-weight: 500;
        }

        .chat-box {
            overflow-y: auto;
            height: 500px;
            background: #f7f7f7;
            padding: 10px 30px 20px 10px;
            box-shadow: inset 0 32px 32px -32px rgb(0 0 0 / 5%),
                inset 0 -32px 32px -32px rgb(0 0 0 / 5%);
        }

        .chat-box .chat {
            margin: 15px 0;
        }

        .chat-box .chat p {
            word-wrap: break-word;
            padding: 8px 16px;
            box-shadow: 0 0 32px rgb(0 0 0 / 8%),
                0rem 16px 16px -16px rgb(0 0 0 / 10%);
        }

        .chat-box .outgoing {
            display: flex;
        }

        .outgoing .details {
            margin-left: auto;
            max-width: calc(100% - 130px);
        }

        .outgoing .details p {
            background: blue;
            color: #fff;
            border-radius: 18px 18px 0px 18px;
        }

        .chat-box .incoming {
            display: flex;
            align-items: flex-end;
        }

        .incoming .details {
            margin-left: 10px;
            margin-right: auto;
            max-width: calc(100% - 130px);
        }

        .incoming .details p {
            background: #fff;
            color: #333;
            border-radius: 18px 18px 18px 0;
        }

        .chat-area .typing-area {
            padding: 18px 30px;
            display: flex;
            justify-content: space-between;
        }

        .typing-area input {
            height: 45px;
            width: calc(100% - 60px);
            font-size: 17px;
            border: 1px solid #ccc;
            padding: 0 13px;
            border-radius: 5px;
            outline: none;
        }

        .typing-area button {
            width: 55px;
            border: none;
            outline: none;
        }

        .send{
            background-color: #154998;
            color: whitesmoke;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <section class="chat-area">
            <header>
                <div class="details">
                    <!-- Display the username in the header -->
                    
                        <span><?php 
                           
                            echo $result['username']; ?></span>
                    
                    <!-- <p>Active Now</p> -->
                </div>
            </header>


            <div class="chat-box">
                <?php
                $id = $_GET['id'];
                $query3 = "SELECT * FROM cyberusers where id=:id";
                $stmt3 = $pdo->prepare($query3);
                $stmt3->bindParam(":id", $id);
                // $stmt3->bindParam(":username", $username);
                $stmt3->execute();
                $result3 = $stmt3->fetch(PDO::FETCH_ASSOC);
                // echo $result3['username'];
                
                $name1 = $result['username'];
                $query4 = "SELECT * FROM messages1 WHERE msg_sender=:username AND msg_reciever=:name1 OR msg_sender=:name1 AND msg_reciever=:username";
                $stmt4 = $pdo->prepare($query4);
                $stmt4->bindParam(":username", $username);
                $stmt4->bindParam(":name1", $name1);
                // $stmt4->bindParam(":n")
                $stmt4->execute();
                $result4 = $stmt4->fetchAll(PDO::FETCH_ASSOC);
                // $result5 =$stmt4->fetch(PDO::FETCH_ASSOC);
                // $sender = $result4['msg_sender'];
                // echo $sender;
                foreach ($result4 as $row) {
                    // echo $row['msg']."<br>";
                    if ($name1 === $row['msg_sender']) {
                        echo '<div class="chat incoming">
                        <div class="details">
                            <p>' . $row['msg'] . '</p>
                        </div>
                        </div>';
                        // header("Locarion: ../chat.php?id=<?php")
                    } else {
                        echo '<div class="chat outgoing">
                        <div class="details">
                            <p>'. $row['msg'] .'</p>
                        </div>
                        </div>';
                    }

                }

                ?>


            </div>
            <form action="insert-chat.php" class="typing-area" method="POST">
                <!-- Hidden fields for outgoing and incoming names -->
                <input type="hidden" name="outgoing_name" value="<?php echo htmlspecialchars($username); ?>">
                <input type="hidden" name="incoming_name" value="<?php echo htmlspecialchars($result['username']); ?>">
                <!-- Input field for new message -->
                <input type="text" name="message" class="input_field" placeholder="Type a message here...">
                <!-- Submit button -->
                <button type="submit" class="send">Send</button>
            </form>
        </section>
    </div>
    <script src="chat.js"></script>
</body>

</html>