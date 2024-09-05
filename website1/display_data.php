<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <style>
        .content {
            border: 1px solid grey;
            padding: 10px;
            width: 300px;
            margin: 0 auto;
            /* margin-top: 298px; */
            box-shadow: 2px 2px 5px black;
            border-radius: 12px;
            position: absolute;
            left: -75%;
            top: 140%;
            background-color: rgba(174, 178, 184, 0.9);
        }

        .content p {
            position: absolute;
            left: 30%;
            /* top:10%; */

        }

        .content img {
            width: 60px;
            height: 60px;
            /* bordeR:1px solid grey; */
            border-radius:40%;
        }

        .details1 {
            font-size: 18px;
            text-decoration: none;
            display: block;
            /* margin-bottom: 5px; */
            color: white;
            font-weight: bold;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;

        }

        .details1:hover {
            color: red;
        }

        


        .chatwithfriends {
            display: flex;
            flex-wrap: wrap;

            justify-content: flex-start;

            /* bordeR:2px solid grey; */

            
        }

        .chatwithfriends .details1 {
            position: relative;
        
            width: 100px;
            
            height: 70px;
        
            text-align: center;
           
        }
        .chatwithfriends .details1 p{
            margin-top:-45px;
            font-size: 20px;position: relative;
            left:120%;
        }
    </style>
</head>

<body>
    <div class="content">
        <?php

        $username = isset($_SESSION['username']) ? $_SESSION['username'] : null;

        if (!$username) {
            echo "<p>Error: Username not found in session.</p>";
        } else {

            $hostname = "localhost";
            $dbusername1 = "root";
            $password = "";
            $database = "database";


            $dsn = "mysql:host=$hostname;dbname=$database";
            $dbusername = "root";
            $dbpassword = "";

            try {

                $pdo = new PDO($dsn, $dbusername, $dbpassword);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // echo $username;
                // $query = "SELECT * FROM cyberusers WHERE username != :username ";
                // $stmt = $pdo->prepare($query);
                // $stmt->bindParam(":username", $username);
                // $stmt->execute();
        
                // // Fetch all records as an associative array
                // $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                //         $pdo = new PDO($dsn, $dbusername, $dbpassword   );
                // $username = $_SESSION['username'];
                $query = "SELECT username, image1,coverphoto,id 
                  FROM cyberusers 
                   
                  WHERE username != :username";

                $stmt = $pdo->prepare($query);

                $stmt->bindParam(':username', $username);

                $stmt->execute();

                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                // Display users as clickable links
                if ($result) {
                    foreach ($result as $res) {
                        echo "<div class='chatwithfriends'>";




                        echo '<a href="chat.php?id=' . $res['id'] . '" class="details1">' . "<img src='img/" . $res["image1"] . "' class='images'> <p> " . htmlspecialchars($res['username']) . "</p> " . " </a>";
                        ?>
                    </div>
                    <?php
                    }
                } else {
                    echo "<p>No friends yet.</p>";
                }
            } catch (PDOException $e) {
                echo "<p>Database error: " . $e->getMessage() . "</p>";
            }
        }
        ?>
    </div>
</body>

</html>