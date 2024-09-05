<?php
require 'connection.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .image {
            position: absolute;
            top: 53%;
            left: 17%;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            z-index: 1;
        }

        body {
            background-color: rgb(28, 30, 32);
            color: white;
            font-family: "Segoe UI Historic", "Segoe UI", Helvetica, Arial, sans-serif;
        }

        .username {
            position: absolute;
            top: 62%;
            left: 31%;
            font-size: 250%;
            font-weight: bolder;
        }

        .coverphoto {
            position: absolute;
            top: 10%;
            left: 15%;
            width: 70%;
            border-bottom-left-radius: 17px;
            height: 56%;
            border-bottom-right-radius: 17px;
        }

        .allthestuff {
            position: absolute;
            top: 86%;
            left: 14.3%;
            display: flex;
            gap: 0%;
            font-weight: bolder;
            font-family: monospace;
            font-size: 140%;
            white-space: nowrap;
        }

        .allthestuff p {
            margin: 0;
            padding: 10px;
            /* border:1px solid red */
        }

        .allthestuff p:hover {
            cursor: pointer;
            background-color: rgba(176, 179, 184, 0.2);
            border-radius: 10px;
        }

        .nav {
            display: flex;
            flex-direction: row;
            width: 100%;
            position: absolute;
            left: 0%;
            top: 00%;
            height: 10%;
            /* bordeR: 0.1px solid red; */
            background-color: rgba(176, 178, 184, 0.1);
            border-bottom-right-radius,
            border-bottom-left-radius: 40%;
        }

        .nav .logo {
            width: 27%;
        }

        .searchfriends {
            position: absolute;
            left: 18%;
            width: 14%;
            top: 27%;
            height: 20%;
            border-radius: 30px;
            color: black;
            font-weight: bold;
            font-size: 80%;
            border: none;
            padding: 10px
        }

        .icons {
            display: flex;
            position: absolute;
            top: 99%;
            font-size: 100%;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            left: 50%;
            color: white;
            gap: 5%;
            font-weight: bolder;
            white-space: nowrap;
            width: 40%;
            height: 40%;

            /* background-color: rgba(176, 179, 184, 0.8); */
        }

        .icons p {
            width: 30px;
            /* background-color: red; */
            height: 100%;
            padding: 10px 20px
        }

        .icons1 svg:hover {
            background-color: rgba(176, 179, 184, 0.1);
            cursor: pointer;
            border-radius: 12px;
        }

        .icons1 {
            display: flex;
            gap: 10%;
            position: relative;
            left: -14%;
            top: -10%;
        }

        .icons1 svg {
            width: 30px;
            /* background-color: red; */
            height: 100%;
            padding: 10px 20px
        }

        .friendscount {
            position: absolute;
            top: 73%;
            left: 31%;
            font-size: 110%;
            color: gray;
            font-weight: bolder;
        }

        .searchfriends {
            position: absolute;
            left: 18%;
            width: 14%;
            top: 27%;
            height: 20%;
            border-radius: 30px;
            color: black;
            font-weight: bold;
            font-size: 80%;
            border: none;
            padding: 10px
        }

        .image {
            border: 6px solid rgb(28, 30, 32);
            left: 16%;
        }

        hr {
            position: absolute;
            top: 84%;
            left: 15%;
            width: 70%;
            color: gray;
        }

        ::placeholder {
            font-size: 120%;
        }

        .intro {
            position: absolute;
            left: 15%;
            top: 94%;
            height: 30%;
            border: 1px solid rgb(19, 19, 20);
            border-radius: 11px;
            width: 30%;
            padding: 0px 10px 0px;
            background-color: #242526;
        }

        .biodis {

            font-weight: bold;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            justify-content: center;
            text-align: center;
            position: relative;
            top: -20%;
            width: 60%;
            left: 20%;
            font-size: 120%;
            border: none
        }

        .end {
            position: absolute;
            top: 400%;
        }

        .head {
            font-size: 160%;
            font-weight: bolder;
            font-family: "Segoe UI Historic", "Segoe UI", Helvetica, Arial, sans-serif;
        }

        .biodis {
            font-weight: bold;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            justify-content: center;
            text-align: center;
            position: absolute;
            top: 104%;
            width: 60%;
            left: 1%;
            z-index: 1;
            border: none
        }

        .whatsonyour {
            position: absolute;
            top: 94%;
            left: 48.7%;
            border: 1px solid black;
            width: 36%;
            border-radius: 12px;
            background-color: #242526;
            height: 30%
        }

        .whatsonyour img {
            width: 8%;
            border-radius: 50%;
            position: absolute;
            top: 16%;
            left: 5%
        }

        .whatsonyour input {
            width: 80%;
            position: absolute;

            top: 6%;
            left: 15%;
            height: 24%;
            border-radius: 12px;
            color: white;
            font-weight: bold;
            background-color: rgba(176, 178, 184, 0.1);
            border: none;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .whatsonyour input::placeholder {
            color: white;
            opacity: 0.8;
            position: absolute;
            left: 2%;
        }

        .whatsonyour hr {
            width: 90%;
            position: absolute;
            top: 47%;
            left: 5%;
        }

        .icons {
            display: flex;
            position: absolute;
            top: 64%;
            font-size: 100%;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            left: 5%;
            color: white;
            gap: 5%;
            font-weight: bolder;
            white-space: nowrap;
            width: 90%;
            height: 25%;
        }

        .fir {
            /* border:1px solid blue; */
            width: 40%;
            border-radius: 13px;
            justify-content: center;
            text-align: center;
            padding: 10px
                /* height: */
        }

        .fir svg {
            width: 40%;
            /* border: 4px solid red; */
            height: 80%;
            position: relative;
            top: 10%;
            left: -42%
        }


        .fir p {
            position: absolute;
            left: 6%;
            font-size: 120%;
            top: -30%
        }

        .fir:hover,
        .sec:hover,
        .thi:hover {
            cursor: pointer;
            background-color: rgba(176, 179, 184, 0.2);
            border-radius: 10px;
        }

        .sec {
            width: 34%;
            padding: 10px;
            border-radius: 13px;
            justify-content: center;
            text-align: center;
            font-weight: bolder;
            font-size: 110%;
        }

        .sec p {
            position: absolute;
            top: -20%;
            left: 43%;
        }

        .sec svg {
            position: absolute;
            left: 40%;
            top: 28%
        }

        .thi {
            width: 34%;
            position: relative;
            border-radius: 12px;
            font-size: 110%;
        }

        .thi svg {
            position: absolute;
            top: 30%;
            left: 10%;
        }

        .thi p {
            position: absolute;
            left: 34%;
            top: -19%;
        }

        .whatsonyour hr {
            top: 60%
        }

        .whatsonyour .input2 {
            position: absolute;
            top: 36%;
            left: 15%;
        }

        .displayposts {
            width: 80%;
            left: 10%;
            position: absolute;
            top: 140%;
            /* border: 1px solid black; */
            border-radius: 12px;
        }

        .displayposts img {
            width: 33.32%;
            height: 320px;
            gap: 0.3%;
        }

        .displayposts img:hover {
            opacity: 0.8;
            animation: rad 0.7s 1;
            border-radius: 63px;
        }

        @keyframes rad {
            from {
                border-radius: 0px;
            }

            to {
                border-radius: 63px;
            }
        }



        #woym {
            position: absolute;
            top: 97%;
            left: 55%;
            z-index: 2;
            padding: 10px;
            background-color: rgba(176, 179, 184, 0.1);
            color: white;
            font-weight: bold;
            border-radius: 19px;
            height: 4%;
            border: none;
            width: 26%
        }

        .input2 {
            position: absolute;
            top: 105%;
            left: 55%;
            z-index: 2;
            padding: 10px;
            background-color: rgba(176, 179, 184, 0.1);
            color: white;
            font-weight: bold;
            border-radius: 19px;
            height: 4%;
            border: none;
            width: 26%
        }

        #woym::placeholder,
        .input2::placeholder {
            color: whitesmoke;
            font-weight: bolder;
            opacity: 0.7;
            font-size: 105%;
        }

        .nameforposts,
        .postsdisplay1 {

            position: absolute;
            font-weight: bold;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 150%;

            justify-content: center;
            text-align: center;
        }

        .postsdisplay1 {
            justify-content: center;
            text-align: center;
            left: 46%;
            /* top: 130%; */
            top: 150%;
            /* left:26%; */
        }

        .nameforposts {
            left: 46.7%;
            top: 130%;
        }

        .nobio {
            position: absolute;
            top: 103%;
            left: 26%;
            font-weight: bold;
            z-index: 2;
            font-size: 140%;
        }

        .nav .logo {
            /* border:5px solid red; */
            width: 36%;
            margin-top: -5%
        }

        .nav {
            z-index: 2;
            opacity: 1;
            height: 11.6%
        }

        .coverphoto{
            top:11.6%
        }

        .icons1 {
            margin-left: 14%
        }
    </style>
</head>

<body>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        require "dbh.inc.php";
        $name1 = $_POST["name"];

        $query="SELECT * FROM cyberusers WHERE username=:name1";
        $stmt1 = $pdo->prepare($query);
        $stmt1->bindParam(":name1", $name1);
        $stmt1->execute();
        $result = $stmt1->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            echo "<p class='username'>" . $result['username'] . "</p>";
            $query1 = "SELECT * FROM profileimage123 WHERE name1=:name1";
            $stmt2 = $pdo->prepare($query1);
            $stmt2->bindParam(":name1", $name1);
            $stmt2->execute();
            $result1 = $stmt2->fetch(PDO::FETCH_ASSOC);
            if ($result1) {
                echo "<img src='img/" . $result1['image1'] . "' class='image'>";
            } else {
                echo "<img src='if_not_profile.jpg' class='image'>";
            }
            $query2 = "SELECT coverphoto FROM profileimage123 WHERE name1=:name1";
            $stmt3 = $pdo->prepare($query2);
            $stmt3->bindParam(":name1", $name1);
            $stmt3->execute();
            $result2 = $stmt3->fetch(PDO::FETCH_ASSOC);
            if ($result2) {
                echo "<img src='img/" . $result2["coverphoto"] . "'class='coverphoto'>";
            } else {
                echo "<img src='covr.png' class='coverphoto'>";
            }
            $query3 = "SELECT COUNT(*) AS total FROM cyberusers";
            $stmt4 = $pdo->prepare($query3);
            $stmt4->execute();
            $result3 = $stmt4->fetch(PDO::FETCH_ASSOC);
            $count = $result3['total'] - 1;
            echo "<p class='friendscount'>" . $count . " friends" . "</p>";
            $query4 = "SELECT bio FROM intro WHERE name1=:name1";
            $stmt4 = $pdo->prepare($query4);
            $stmt4->bindParam(":name1", $name1);
            $stmt4->execute();
            $result4 = $stmt4->fetch(PDO::FETCH_ASSOC);
            // $bio_with_linebreaks = nl2br($result4['bio']);
            if (($result4)) {
                foreach ($result4 as $row) {
                    echo "<p class='biodis' id='biodis'>" . nl2br($result4['bio']) . "</p>";
                }
            } else {
                echo "<p class='nobio'>No bio entered</p>";
            }
            echo "<form action='/' method='post'>
                <input type='text' name='woym'  id='woym' placeholder='Message " . htmlspecialchars($name1) . " ...'>
                <input type='text' name='woym2' class='input2' placeholder='Poke " . htmlspecialchars($name1) . " ...'>
            </form>";
            echo "<p class='nameforposts'>" .
            htmlspecialchars($name1) . "'s Posts</p>";
        } else {
            echo "No user found<br>";
            echo "<script> setTimeout(function (){ window.location.href='../website1/profilevisit.php';},2000);" . "</script>";
            exit();
        }
    }
    ?>
    <hr>
    <div class="allthestuff">
        <p>Posts</p>
        <p>About</p>
        <p>Friends</p>
        <p>Photos</p>
        <p>Videos</p>
        <p>Check-ins</p>
        <p>Hobbies</p>
    </div>
    <div class="nav">
        <a href="homepage.php"><img src="logo.png" alt="logo" class="logo"></a>
        <form action="./data.php" method="post">
            <input type="text" placeholder="Search cybernexus" class="searchfriends" name="name">
        </form>
        <div class="icons1">
            <p><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-house"
                    viewBox="0 0 16 16">
                    <path
                        d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z" />
                </svg></p>
            <p><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="none" viewBox="0 0 16 16">
                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="1.5"
                        d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
                </svg>
            </p>
            <p><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-tv"
                    viewBox="0 0 16 16">
                    <path
                        d="M2.5 13.5A.5.5 0 0 1 3 13h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5M13.991 3l.024.001a1.5 1.5 0 0 1 .538.143.76.76 0 0 1 .302.254c.067.1.145.277.145.602v5.991l-.001.024a1.5 1.5 0 0 1-.143.538.76.76 0 0 1-.254.302c-.1.067-.277.145-.602.145H2.009l-.024-.001a1.5 1.5 0 0 1-.538-.143.76.76 0 0 1-.302-.254C1.078 10.502 1 10.325 1 10V4.009l.001-.024a1.5 1.5 0 0 1 .143-.538.76.76 0 0 1 .254-.302C1.498 3.078 1.675 3 2 3zM14 2H2C0 2 0 4 0 4v6c0 2 2 2 2 2h12c2 0 2-2 2-2V4c0-2-2-2-2-2" />
                </svg></p>
            <p><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-compass"
                    viewBox="0 0 16 16">
                    <path
                        d="M8 16.016a7.5 7.5 0 0 0 1.962-14.74A1 1 0 0 0 9 0H7a1 1 0 0 0-.962 1.276A7.5 7.5 0 0 0 8 16.016m6.5-7.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0" />
                    <path d="m6.94 7.44 4.95-2.83-2.83 4.95-4.949 2.83 2.828-4.95z" />
                </svg>
            </p>
            <p><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-bell"
                    viewBox="0 0 16 16">
                    <path
                        d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2M8 1.918l-.797.161A4 4 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4 4 0 0 0-3.203-3.92zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5 5 0 0 1 13 6c0 .88.32 4.2 1.22 6" />
                </svg></p>
        </div>
    </div>
    <div class="intro">
        <p class="head">Intro</p>
        <br>
    </div>
    <p class="end">mndkwdmn</p>
    <div class="whatsonyour">
        <?php

        $pdo = new PDO($dsn, $dbusername, $dbpassword);
        $name1 = $_SESSION['username'];
        $stmt = $pdo->prepare("SELECT image1 FROM profileimage123 WHERE name1=:name1");
        $stmt->bindParam(":name1", $name1);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row && $row['image1']) {
            echo "<img src='img/" . $row['image1'] . "' class='image4' >";
        } else {
            echo "<img src='if_not_profile.jpg'  class='image4' >";
        }
        ?>

        <hr>
        <div class="icons">
            <div class="fir">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="27" fill="currentColor" class="bi bi-image"
                    viewBox="0 0 16 16">
                    <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                    <path
                        d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1z" />
                </svg>
                <p>Photo/video</p>
            </div>
            <div class="sec">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="27" fill="currentColor"
                    class="bi bi-camera-video" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M0 5a2 2 0 0 1 2-2h7.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 4.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 13H2a2 2 0 0 1-2-2zm11.5 5.175 3.5 1.556V4.269l-3.5 1.556zM2 4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h7.5a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1z" />
                </svg>
                <p>Live Video</p>
            </div>
            <div class="thi">
                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor"
                    class="bi bi-music-note-list" viewBox="0 0 16 16">
                    <path d="M12 13c0 1.105-1.12 2-2.5 2S7 14.105 7 13s1.12-2 2.5-2 2.5.895 2.5 2" />
                    <path fill-rule="evenodd" d="M12 3v10h-1V3z" />
                    <path d="M11 2.82a1 1 0 0 1 .804-.98l3-.6A1 1 0 0 1 16 2.22V4l-5 1z" />
                    <path fill-rule="evenodd"
                        d="M0 11.5a.5.5 0 0 1 .5-.5H4a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5m0-4A.5.5 0 0 1 .5 7H8a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5m0-4A.5.5 0 0 1 .5 3H8a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5" />
                </svg>
                <p>Music</p>
            </div>
        </div>
    </div>
    <div class="displayposts">

        <?php

        $name1 = $_POST['name'];
        $query = "SELECT * FROM posts WHERE name1=:name1";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":name1", $name1);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Troubleshooting: Dump the contents of $rows to check if it contains any data
        
        if (empty($rows)) {
            echo "<p class='postsdisplay1'> No posts yet</p>";
        } else {
            foreach ($rows as $row) {
                echo "<img src='img/" . $row['posts'] . "'>";
            }
        }
        ?>




    </div>
</body>

</html>