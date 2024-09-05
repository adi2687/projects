<?php
// Start the session
session_start();


// Use the username from the session
$username = $_SESSION['username'];



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Friendify.com</title>
    <link rel="icon" href="logo.png">

    <style>
        body {
            color: white;
            background-color: rgb(27, 30, 33);
        }



        ::placeholder {
            color: white;
            font-weight: bold;
            font-size: 140%;
            font-family: monospace;
        }

        .display {
            width: 50%;
            left: 22%;
            top: 38%;

            position: absolute;

        }

        .display img {
            height: 500px;
            width: 100%;
            border-radius: 19px
        }

        .posts1 {
            width: 100%;
            border-radius: 18px;
            /* height:3 */
            padding: 0px 30px 60px 30px;
            background-color: rgba(174, 178, 184, 0.2);
        }

        .posts1 img {
            border-radius: 12px;
            padding: 0px 0px 0px 0px
        }


        .main {
            display: flex;
            flex-direction: column;
            gap: 40px;
            font-weight: bolder;
            font-family: 'Segoe UI', Tahoma, Verdana, sans-serif;
        }



        .nav {
            display: flex;
            border-radius: 13px;
            width: 100vw;
            position: fixed;
            z-index: 1;
            left: 0%;
            /* bordeR: 0.1px solid red */
            /* background-color: rgba(174, 178, 184, 0.2); */
            background-color: black;

            opacity: 0.8;
            height: 12vh
        }



        .logo {
            width: 20vw;
            height: 20vh;
            margin-left: 0%;
            margin-top: -6%;
        }

        .nav input {
            margin-top: 4vh;
            width: 16vw;
            height: 3vh;
            border-radius: 12px;
            margin-left: 0%;
            border: none;
            background-color: rgba(174, 178, 184, 0.2);
            color: white;
            font-weight: bold;
            font-size: 100%;
            padding: 10px;
        }

        ::placeholder {
            font-size: 120%;
        }

        .profile {
            width: 10px
        }



        .nav .logoutbutton {
            margin-left: 33vw;
            /* border:4px solid red; */
            width: 20%
        }

        .nav .logoutbutton button {
            width: 70%;
            font-weight: bold;
            height: 30%;
            color: white;
            background-color: rgba(174, 178, 184, 0.2);
            border-radius: 12px;
            border: 12px;
            margin-top: 4vh;
            cursor: pointer;
        }

        .greet {
            position: absolute;
            display: flex;
            width: 20%;
            top: 17%;
            left: 2%;
            gap: 2%;
            font-weight: bold;
            font-size: 120%;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            /* border:3px solid red */
        }

        .name {
            font-size: 130%;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }

        .greet p {
            /* border:4px solid red; */
        }

        .friends {
            position: fixed;
            left: 76%;
            width: 22.4%;
            top: 14%;
            display: flex;
            flex-direction: column;
            gap: 2px;
            /* background-color: ; */
            padding: 10px;
            max-height: 80vh;
            overflow-y: auto;
            overflow-x: hidden;
            /* bordeR: 1px solid blue */
        }

        .friends::webkit-scrollbar {
            width: 1px;
        }

        .friends img {
            width: 40px;
            height: 40px;
            border-radius: 49%;
        }

        .friends .Head {
            position: relative;
            left: 8%;
            font-weight: bold;
            font-size: 130%;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: white;
            opacity: 0.7;
        }

        .friends p {
            font-size: 100%;
        }

        .friends1 {

            flex-direction: row;
            gap: 10%;
            border-radius: 10px;
            padding: 6px 6px 6px 6px;
            display: flex;
            font-weight: bold;
            /* font-size: 120%; */
            font-size: 110%;
        }

        .friends1 img {
            margin-left: 18px;
            margin-top: 6px;
        }

        .friends1:hover {
            cursor: pointer;
            background-color: rgba(174, 178, 184, 0.2);
        }

        .friends::-webkit-scrollbar-track {
            background: rgba(27, 30, 33, 0.7);
            /* Track color */
        }

        .friends::-webkit-scrollbar-thumb {
            background: rgba(174, 178, 184, 0.5);
            /* Thumb color */
            border-radius: 10px;
        }

        .friends::-webkit-scrollbar-thumb:hover {
            background: rgba(174, 178, 184, 0.8);
            /* Thumb hover color */
        }

        .friends::-webkit-scrollbar {
            width: 10px;
        }

        .writesomething {
            width: 54%;
            /* left:20%; */
            /* border: 1px solid red; */
            height: 24%;
            position: absolute;
            top: 13.6%;
            left: 22%;
            border-radius: 12px;
            background-color: rgba(174, 178, 184, 0.2);
        }

        .writesomething img {
            width: 7%;
            height: 26%;
            border-radius: 49%;
            position: relative;
            left: 10%;
            top: 13%;
            /* background-color:rgba(174, 178, 184, 0.2); */
            padding: 1%0px
        }

        .writesomething input {
            width: 70%;
            height: 19%;
            left: 12%;
            top: -1%;
            position: relative;
            color: White;
            background-color: rgb(27, 30, 33);
            border: none;
            text-align: center;
            border-radius: 22px;
            color: white;
            font-weight: bold;
            padding: 4px
        }

        .writesomething ::placeholder {
            color: ghostwhite;
            font-weight: bold;
            position: relative;
            left: 12px;
            opacity: 0.7;
            text-align: center;
        }

        hr {
            color: grey;
            width: 80%;
            position: relative;
            left: 0%;
            top: 10%;
        }


        /* .writesomething div{
            width:80%;
            position: relative;
            left: 10%;top:10%;
            border:0.2px solid blue
        } */
        .options {
            width: 80%;
            position: relative;
            left: 10%;
            top: 10%;
            height: 28%;
            display: flex;
            gap: 4.8%;
            /* border: 0.2px solid blue */
        }

        .options div img {
            height: 70%;
            width: 19%;
            position: relative;
            left: 5%;
            top: 10%;
        }

        .options div {
            display: flex;
            width: 30%;
            position: relative;
            top: 0%;
            height: 100%;
            border-radius: 12px;
            /* border: 1px solid red */
        }

        .options div:hover {
            cursor: pointer;
            background-color: rgba(174, 178, 184, 0.2);
        }

        .options div p {
            position: relative;
            top: -5px;
            left: 40px;
            font-weight: 700;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            /* justify-content:  center;t */
            /* color: red; */
        }

        .main .posts1 img.img2 {
            position: relative;
            left: 0%;
            top: 30px;
            width: 52px;
            height: 52px;
            /* border:3px solid blue; */
            border-radius: 60%;
            /* border-top-left-radius: 32px;
            border-bottom-right-radius: 64px; */
        }

        .display .main .posts1 .name {
            position: relative;
            top: -33px;
            left: 10%;
            font-size: 120%;
        }

        .display .main img.post {
            /* padding:10px; */
            /* border: 4px solid red; */
        }

        .caption1 {
            position: relative;
            top: -50px;
            left: 0%;
            color: white;
            font-weight: 600
        }

        .posts1 .post {
            position: relative;
            top: -60px;
            border: none
        }

        .posts1 .time {
            position: relative;
            top: -53px;
            color: grey;
            font-size: 80%;
            left: 10%;
        }

        .posts1 .react {
            width: 90%;
            left: 7%;
            /* border: 0.1px solid red; */

            gap: 10%;
            top: -40px;
            position: relative;
            display: flex;
        }

        .posts1 .react div {
            padding: 10px;
            display: flex;
            gap: 20%;
            border-radius: 12px;
            height: 100%;
            width: 23%
        }

        .posts1 .react div:hover {
            background-color: rgba(174, 178, 184, 0.2);
            cursor: pointer;
        }

        .posts1 .react div svg {
            height: 25px;
            width: 25px;
        }

        .posts1 hr {
            width: 90%;
            position: relative;
            left: 0%;
        }

        .messagefriends {
            width: 20%;
            height: 20%;
            /* border:3px solid blue; */
            position: absolute;
            top: 40%;
            left: 5%;
        }

        .messagefriends img {
            width: 60%;
            height: 100%
        }

        .messagefriends p {
            opacity: 1;
            position: relative;
            top: 3%
        }

        .nav a img.profile {
            width: 100%;
            margin-top: 34%;
            height: 60%;
            margin-left: 1090%;
            border-radius: 45%;
        }

        .nav button:hover {
            background-color: red;
        }

        .nav button {
            margin-left: 20%;
        }

        .nav svg {
            position: relative;
            left: 516%;
            top: 34%;
            color: white;
        }

        .main form {
            width: 100%;
            height: 10%;
            /* border:4px solid red; */
        }

        .main form img {
            width: 50px;
            height: 50px;
            border-radius: 49%;
        }

        .profile1 {
            width: 14%;
            height: 70%;
            margin-top: -4%;
            /* border: 4px solid red; */
            border-radius: 50%;
            /* position: relative; */
            margin-left: 700px;
        }

        body::-webkit-scrollbar {
            display: none;
        }

        .leftdiv {
            position: fixed;
            left: 0%;
            top: 30%;
            width: 45vh;
            height: 60vh;
            display: flex;
            flex-direction: column;
            /* border:4px solid red; */
            text-decoration: none;
            gap: 2%;
            font-size: 100%;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-weight: bolder;
            padding: 10px
        }

        .leftdiv div {
            /* position: absolute; */
            width: 100%;
            /* border:1px solid blue; */
            display: flex;
            border-radius: 20px;
            padding: 1px;
            cursor: pointer;
            text-decoration: none;
            /* margin-left: 10%; */
        }

        .leftdiv div:hover {
            background-color: rgba(174, 178, 184, 0.3);
        }

        .leftdiv div svg {
            width: 30px;
            height: 60px;
            position: relative;
            left: 10%;
            fill: white;
        }

        .leftdiv div p {
            position: relative;
            left: 20%;
            text-decoration: none;
        }

        .friends1 .name {
            text-decoration: none;
            color: white;
            opacity: 0.9;
        }

        nav {
            width: 100%;
            height: 12vh;
            position: fixed;
            /* top:0%; */
            /* border: 1px solid blue; */
            display: flex;
            background-color: rgba(0, 0, 0, 0.6);
            z-index: 2;
            gap: 32px;
        }

        nav .logo {
            margin-top: 0px;
            height: 100%;
            border: none;
            border: 2px solid black;
            margin-left: 2px
                /* border: 3px solid blue */
        }

        nav input {
            margin-top: 5%;
            padding: 10px;
            background-color: rgba(174, 178, 184, 0.3);
            /* color:whoie; */
            font-size: 120%;
            font-weight: bold;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: white;
            border: none;
            border-radius: 12px;
            height: 27px;
            color: white;
            width: 100%;
        }

        nav form {
            display: flex;
            /* border: 2px solid red;    */
            width: 20%
        }

        nav form button {
            border: none;
            background-color: transparent;
            margin-left: -42px;
            cursor: pointer;

        }

        nav form svg {
            margin-top: -4px;
            fill: white
        }

        nav .messageicon {
            margin-top: 1%;
            fill: white;
            stroke: white;
            stroke-width: 0.4px;
            /* colo:white; */
            margin-left: 27%;
            width: 29px;
            cursor: pointer;
            height: 40px
        }

        nav .profileimage {
            width: 47%;
            height: 79%;
            border-radius: 47%;
            /* border:3px solid blue */
            margin-left: 30%;
            margin-top: 4%
        }

        nav #log {
            width: 10%;
            height: 40%;
            margin-top: 0%;
            border: none;
            border-radius: 12px;
            color: white;
            padding: 10px;
            background-color: rgba(174, 178, 184, 0.5);
            margin-top: 1.4%
        }

        nav #log:hover {
            background-color: red;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <?php
    require "dbh.inc.php";
    // echo $username;
    $name1 = $_SESSION['username'];
    $stmt = $pdo->prepare("SELECT image1 FROM cyberusers WHERE username=:name1");
    $stmt->bindParam(":name1", $name1);
    $stmt->execute();
    $result5 = $stmt->fetch(PDO::FETCH_ASSOC);
    ;
    ?>

    <nav>
        <a href="homepage.php"><img src="logo.png" class="logo"></a>
        <form action="friends.php" method="get" onclick="search()">
            <input type="text" name="username" placeholder="Search friends">
            <button type="submit">
                <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path
                        d="M21.53 20.47l-5.517-5.517a7.472 7.472 0 001.611-4.756c0-4.136-3.364-7.5-7.5-7.5s-7.5 3.364-7.5 7.5 3.364 7.5 7.5 7.5c1.789 0 3.444-.634 4.756-1.611l5.517 5.517a.75.75 0 001.06-1.06zM4.5 10.197a5.697 5.697 0 1111.394 0 5.697 5.697 0 01-11.394 0z" />
                </svg>
            </button>
        </form>
        <svg class="messageicon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
            viewBox="0 0 16 16">
            <path
                d="M2.678 11.894a1 1 0 0 1 .287.801 11 11 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8 8 0 0 0 8 14c3.996 0 7-2.807 7-6s-3.004-6-7-6-7 2.808-7 6c0 1.468.617 2.83 1.678 3.894m-.493 3.905a22 22 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a10 10 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9 9 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105" />
        </svg>
        <a href="profilevisit.php">
            <?php
            require 'profileimage.php';
            ?>
            <img src="img/<?php echo $resultimage['image1'] ?>" alt="Profile Image" class="profileimage">
        </a>
        <button id="log">Log out</button>
    </nav>
    <script>
        document.getElementById("log").addEventListener("click", () => {
            window.location.href = "index.html";
        })
        document.getElementsByClassName("messageicon")[0].addEventListener("click", () => {
            window.location.href = "chatapp/login.php";
        })
    </script>

    <div class="display">
        <?php

        $query = "SELECT posts.*, cyberusers.image1 
              FROM posts 
              LEFT JOIN cyberusers ON posts.username = cyberusers.username
              ORDER BY posts.id DESC";
        // $query = "SELECT posts,cap,username FROM posts ORDER BY id DESC ";
        // Prepare and execute the query
        $stmt = $pdo->prepare($query);
        $stmt->execute();

        // Fetch all the posts along with their authors' profile images
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($results) {
            echo "<div class='main'>";

            foreach ($results as $row) {
                // Display the post and its author along with the profile image
                // if ($row['image1']) {
        

                echo "<div class='posts1'>" .
                    "<img src='img/" . $row['image1'] . "' class='img2'>" .
                    "<p class='name'>" . $row['username'] . "</p>"
                    . "<p class='time'>" . $row['datepost'] . "</p>" .
                    "<p class='caption1'>" . $row['cap'] . "</p>" .
                    "<img src='img/" . $row['posts'] . "' class='post'>";
                ?>

                <div class='react'>
                    <div><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-hand-thumbs-up" viewBox="0 0 16 16">
                            <path
                                d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2 2 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a10 10 0 0 0-.443.05 9.4 9.4 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a9 9 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.2 2.2 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.9.9 0 0 1-.121.416c-.165.288-.503.56-1.066.56z" />
                        </svg> Like</div>
                    <div><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat"
                            viewBox="0 0 16 16">
                            <path
                                d="M2.678 11.894a1 1 0 0 1 .287.801 11 11 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8 8 0 0 0 8 14c3.996 0 7-2.807 7-6s-3.004-6-7-6-7 2.808-7 6c0 1.468.617 2.83 1.678 3.894m-.493 3.905a22 22 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a10 10 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9 9 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105" />
                        </svg>Comment</div>
                    <div><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-share"
                            viewBox="0 0 16 16">
                            <path
                                d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3M11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.5 2.5 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5m-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3m11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3" />
                        </svg>Share</div>
                </div>
                <?php
                require "dbh.inc.php";

                $username1 = $_SESSION['username'];

                $query6 = "SELECT * FROM cyberusers WHERE username=:username1";
                $stmt3 = $pdo->prepare($query6);
                $stmt3->bindParam(":username1", $username1);

                if ($stmt3->execute()) {
                    $result6 = $stmt3->fetch(PDO::FETCH_ASSOC);
                    if ($result6) {
                        $imagePath = 'img/' . $result6['image1'];
                    }
                }
                ?>
                <?php
                $query6 = "SELECT  id  FROM posts WHERE username=:username";
                $stmt6 = $pdo->prepare($query6);
                $stmt6->bindParam(":username", $username);
                $stmt6->execute();
                $result6 = $stmt6->fetchAll(PDO::FETCH_ASSOC);
                foreach ($result6 as $id) {
                    ?>


                    <!-- <form action="./comments.php" method="post">
                                    <img src="<?php echo htmlspecialchars($imagePath, ENT_QUOTES, 'UTF-8'); ?>" alt="Profile Image">
                                    <input type="text" name="com" placeholder="Comment something">
                                    <button type="submit">Submit</button> -->
                    <input type="hidden" name="id" value="<?php echo $id['id'] ?>">
                    </form>

                <?php } ?>



                <!-- ?> -->
            </div>
            <?php
            }
            echo "</div>";
        } else {
            echo "No feed for you to view` yet...";
        }
        ?>

    </div>
    <div class="greet">
        <p class="darkmode" id="timegreet"></p>

        <script>
            let a = new Date();

            let b = a.getHours();
            if (b > 0 && b < 12) {
                document.getElementById('timegreet').innerHTML = 'Good Morning';
            }
            else if (b >= 12 && b < 17) {
                document.getElementById('timegreet').innerHTML = 'Good afternoon';
            }
            else {
                document.getElementById('timegreet').innerHTML = 'Good evening';
            }
        </script>
        <?php

        echo "<p>, " . $username . "</p>";

        ?>
    </div>
    <div class="friends">
        <p class="Head">Friends</p>
        <?php

        require "dbh.inc.php";
        $username = $_SESSION['username'];

        $query = "SELECT username,image1 FROM cyberusers WHERE cyberusers.username!=:username";
        $stmt = $pdo->prepare($query);

        $stmt->bindParam(':username', $username, PDO::PARAM_STR);

        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);


        if ($result) {
            // echo "<div class='friends1'>";
            foreach ($result as $row) {
                echo "<a href='http://localhost/website1/friends.php?username=" . htmlspecialchars($row['username']) . "' class='link'>
        <div class='friends1'>";

                echo "<img src='img/" . htmlspecialchars($row['image1']) . "'>";
                echo "<p class='name'>" . htmlspecialchars($row['username']) . "</p>";
                echo "</div></a>";
            }

        } else {
            // Handle case where no profile image is found for the user
            echo "No profile image found.";
        }
        ?>


    </div>
    <?php
    // echo $username;
    $query1 = "SELECT image1 FROM cyberusers WHERE username=:username";
    $stmt2 = $pdo->prepare($query1);
    $stmt2->bindParam(':username', $username);
    $stmt2->execute();
    $result = $stmt2->fetch(PDO::FETCH_ASSOC);
    ?>
    <div class="writesomething">
        <a href="profilevisit.php">
            <?php echo "<img src='img/" . $result['image1'] . "'>" ?>
        </a>
        <input type="text" name="whats" placeholder="What's on your mind , <?php echo $username ?> ?">
        <hr>
        <div class='options'>
            <div>
                <img class="video" height="16" width="16" alt="" class="xz74otr"
                    referrerpolicy="origin-when-cross-origin"
                    src="https://static.xx.fbcdn.net/rsrc.php/v3/yF/r/v1iF2605Cb5.png">
                <p>Live Video</p>
            </div>
            <div>
                <img height="24" width="24" alt="" class="xz74otr" referrerpolicy="origin-when-cross-origin"
                    src="https://static.xx.fbcdn.net/rsrc.php/v3/yC/r/a6OjkIIE-R0.png">
                <p>Photo/video
            </div>
            <div class="thirddiv">
                <img height="24" width="24" alt="" class="xz74otr" referrerpolicy="origin-when-cross-origin"
                    src="https://static.xx.fbcdn.net/rsrc.php/v3/yk/r/yMDS19UDsWe.png">
                <p>Feeling</p>

            </div>
        </div>
    </div>


    </a>
    <div class="leftdiv">
        <a href="addfriends.php">
            <div><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-person-fill" viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                </svg>
                <p>Add friends</p>
            </div>
        </a>
        <div><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart"
                viewBox="0 0 16 16">
                <path
                    d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15" />
            </svg>
            <p>Notification</p>
        </div>
        <div><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-question-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                <path
                    d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286m1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94" />
            </svg>
            <p>Ask a question</p>
        </div>
        <div><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear"
                viewBox="0 0 16 16">
                <path
                    d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492M5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0" />
                <path
                    d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115z" />
            </svg>
            <p>Settings</p>
        </div>
    </div>
</body>

</html>