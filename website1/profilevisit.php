<?php
session_start();
require 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>friendify.com</title>
    <link rel="icon" href="logomain1.png">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="profile.css">
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            padding-top: 70px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.9);
            /* bordeR:2px solid red */
        }

        .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            /* max-width: 700px; */
            max-height: 80%;
            position: relative;
            /* d */
            padding-left: 20%;
            display: flex;
            border: 5px solid blue
        }



        .modal-content img {
            width: 50%;
            height: 500px;
            /* padding-left: ; */
            position: relative;
            left: -20%;
            border: 4px solid red;
            border-radius: 13px;
        }

        /* Close button */
        .close {
            color: white;
            position: absolute;
            top: 10px;
            right: 25px;
            font-size: 35px;
            font-weight: bold;
            transition: 0.3s;
        }

        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }

        .thumbnail {
            cursor: pointer;
        }

        #caption {
            position: relative;
            margin-top: 10%;
            left: 0%
        }

        .addtosto p {
            margin-top: 12px;
        }

        .image1 {
            top: 51%;
            z-index: 2;
            border: 9px solid rgb(28, 30, 33)
        }

        #editProfileBox {
            height: 52vh
        }

        .editbi {
            visibility: hidden;
        }

        .info {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 50%;
            height: 50%;
            z-index: 3;
        }
.postsdisplay{
    color:White;
    font-size:120%;
    font-weight: bold;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    /* bordeR:1px solid red; */
    padding:20px;
    background-color: rgb(28, 30, 33);
    z-index: 1;
    border-radius: 19px;
}
        .postsdisplay img {
            width: 33%;
            height: 200px;
            /* display: none */
            border-radius: 12px;
            cursor: pointer;
        }

        .postsdisplay.active {
            display: block
        }

        .postsdisplay {
            display: none;
        }
        .displayimages{
            display: flex;
            flex-direction: row;
            /* border:1px solid red */
        }
        .image1{
            z-index: 2;
        }
    </style>

</head>


<body>
    <?php
    require "dbh.inc.php";
    $name1 = $_SESSION['username'];
    $stmt = $pdo->prepare("SELECT image1 FROM cyberusers WHERE username=:name1");
    $stmt->bindParam(":name1", $name1);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row && $row['image1']) {
        echo "<img src='img/" . $row['image1'] . "' class='image1' onclick='return toggleEditProfile()'>";
    } else {
        echo "<img src='if_not_profile.jpg'  class='image1' >";
    }

    $stmt1 = $pdo->prepare("SELECT coverphoto FROM cyberusers WHERE username=:name1");
    $stmt1->bindParam(":name1", $name1);
    $stmt1->execute();
    $row1 = $stmt1->fetch(PDO::FETCH_ASSOC);

    if ($row1 && $row1['coverphoto']) {
        echo "<img src='img/" . $row1['coverphoto'] . "' class='image3' onclick=''>";
    } else {
        echo "<img src='covr.png'  class='image3' >";
    }
    ?>
    <p class="darkmode" id="username">
        <?php echo $_SESSION['username']; ?>
    </p>

    <?php

    $query = "SELECT COUNT(*) AS total FROM cyberusers";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $count = $result['total'] - 1;
    echo "<p class='friendscount'>" . $count . " friends" . "</p>"
        ?>
    <div class="nav">
        <a href="homepage.php"><img src="logo.png" alt="logo" class="logo"></a>
        <form action="./data.php" method="post">
            <input type="text" placeholder="Search friendify" class="searchfriends" name="name">
        </form>
        <div class="icons1">
            <a href="homepage.php">
                <p><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                        class="bi bi-house" viewBox="0 0 16 16">
                        <path
                            d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z" />
                    </svg></p>
            </a>
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
    <div class="buttons">
        <button class="addtosto"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-plus-lg" viewBox="0 0 16 16" style="color:smokewhite;">
                <path fill-rule="evenodd"
                    d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2" />
            </svg>
            <p>Add to story</p>
        </button>
        <button class="editprofile" onclick="return toggleEditProfile()"><svg xmlns="http://www.w3.org/2000/svg"
                width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                <path
                    d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z" />
            </svg>
            <p>Edit profile</p>
        </button>
    </div>
    <hr>
    <div id="editProfileBox" style="display: none;" class="editprofilebox">
        <p class="editprofilemain">Edit Profile</p>

        <!--  -->
        <!-- <br> -->
        <p class="updateuser">Update Profile Photo</p>
        <form action="./image.php" method="post" autocomplete="off" enctype="multipart/form-data">
            <!-- <input type="text" name="name" id="name" placeholder="Enter your username" class="name1"><br><br> -->
            <input type="file" name="image" accept=".jpg,.jpeg,.png" id="input" class="image2"><br>
            <button type="submit" name="submit">Update Profile Picture</button><br>
        </form>
        <p class="updateuser">Update Cover Photo</p>
        <form action="./coverphoto.php" method="post" enctype="multipart/form-data">
            <!-- <br> -->
            <input type="file" name="coverphoto" id="cp" accept=".jpg,.jpeg,.png" class="image2"><br>
            <button type="submit" name="submit1">Update coverphoto</button>
        </form>
    </div>
    <div class="allthestuff">
        <p id="posts">Posts</p>
        <p id="about">About</p>
        <p id="friends">Friends</p>
        <p id="photos">Photos</p>
        <p id="videos">Videos</p>
        <p id="check-ins">Check-ins</p>
        <p id="hobbies">Hobbies</p>
    </div>

    



    <div class="intro">
        <p class="head">Intro</p>



        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="edit" id="editsvg"
            viewBox="0 0 16 16">
            <path
                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
            <path fill-rule="evenodd"
                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
        </svg>
        <!-- <p id="editbio1">edit bio</p> -->
        <!-- <p class=>hii</p> -->
        <form action="./intro.php" method="post">
            <!-- <input type="text" name="name1" class="nameforbio" placeholder="Enter your username"> -->
            <textarea name="bio" class="bioedit" placeholder="" onclick="return biohide()" id="bio"></textarea>
            <!-- <input type="text" name="pronouns" class="pronouns" onclick="" id="pronouninput" onclick="return pronounhihde1()"> -->
            <button class="editbi" id="editbio">Edit Bio</button>
        </form>


        <?php
        $name1 = $_SESSION['username'];
        $stmt = mysqli_prepare($conn, "SELECT bio FROM cyberusers WHERE username=? ");
        mysqli_stmt_bind_param($stmt, "s", $name1);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)):
                // $bio_with_linebreaks = nl2br($bio);
                // echo "<p class='biodis' id='biodis'</p>" . $row['bio'];
                $bio_with_linebreaks = nl2br($row['bio']); // Replace newline characters with <br> tags
                echo "<p class='biodis' id='biodis'>" . $bio_with_linebreaks . "</p>";
            endwhile;
        }
        ?>
    </div>
    <div class="whatsonyour">
        <?php

        $pdo = new PDO($dsn, $dbusername, $dbpassword);
        $name1 = $_SESSION['username'];
        $stmt = $pdo->prepare("SELECT image1 FROM cyberusers WHERE username=:name1");
        $stmt->bindParam(":name1", $name1);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row && $row['image1']) {
            echo "<img src='img/" . $row['image1'] . "' class='image4' >";
        } else {
            echo "<img src='if_not_profile.jpg'  class='image4' >";
        }
        ?>
        <form action="./status.php" method="post">
            <input type="text" name="woym" class="" id="woym" placeholder="What's on your mind ?">
        </form>
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
    <!-- <p class="end">HIII</p> -->
    <div class="posts">
        <h3>POSTS</h3>
        <form action="./posts.php" method="post" enctype="multipart/form-data">
            <input type="file" name="posts" id="post" accept=".jpeg,.jpg,.png,.mp4">
            <input type="text" name="cap" id="cap" placeholder="Caption..">
            <button type="submit">Post</button>
        </form>
    </div>
    <div class="displayposts">
        <?php
        $name1 = $_SESSION['username'];
        $query = "SELECT * FROM posts WHERE username=:name1 ORDER BY id DESC";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":name1", $name1);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($rows) {
            foreach ($rows as $row) {
                // Extract file extension
                $file_extension = pathinfo($row['posts'], PATHINFO_EXTENSION);
                // echo "File extension: $file_extension<br>";
                // Display image if it's an image post
        
                echo "<img src='img/" . $row['posts'] . "' class='thumbnail' onclick='image12()'>";
                "<p id='imageid' > " . $row['id'] . "</p>";

                // You can add more conditions for other types of posts (if any)
            }
        } else {
            echo "<p class='postsdisplay1'>What're you waiting for ? POST SOMETHING</p>";
        }
        ?>
    </div>

    <div id="myModal" class="modal">
        <span class="close">&times;</span>
        <div class="modal-content">
            <img id="modalImg" src="">
            <?php echo $name1 ?>
            <?php

            ?>
        </div>
    </div>

    <script src="profilemain.js"></script>
</body>

</html>