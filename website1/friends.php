<?php
// session_start();
// require 'connection.php';
$username = $_GET['username'];
// || $_POST['username'];
// Validate and sanitize the input
if (isset($username) && !empty($username)) {
    // $username = htmlspecialchars($_GET['username'], ENT_QUOTES, 'UTF-8');

    // Database connection parameters
    require "dbh.inc.php";
    // $pdo = new PDO($dsn, $dbusername, $dbpassword);
    try {
        // Establish a PDO connection
        $pdo = new PDO($dsn, $dbusername, $dbpassword);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Query to fetch user details and profile image
        $query = "SELECT username, image1, coverphoto FROM cyberusers WHERE username = :username";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Initialize variables for display
        $displayUsername = '';
        $displayImageURL = '';
        $displayCoverPhotoURL = '';

        // Check if user is found
        if ($result) {
            $displayUsername = htmlspecialchars($result['username'], ENT_QUOTES, 'UTF-8');

            // Check if profile image is found
            if (!empty($result['image1'])) {
                $displayImageURL = 'img/' . htmlspecialchars($result['image1'], ENT_QUOTES, 'UTF-8');
            } else {
                $displayImageURL = 'default_profile.png';
            }

            // Check if cover photo is found
            if (!empty($result['coverphoto'])) {
                $displayCoverPhotoURL = 'img/' . htmlspecialchars($result['coverphoto'], ENT_QUOTES, 'UTF-8');
            } else {
                $displayCoverPhotoURL = 'default_cover.png';
            }
        } else {
            $displayUsername = 'User not found.';

        }
    } catch (PDOException $e) {
        $displayUsername = "Error: " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8');
    }
} else {
    $displayUsername = 'Username parameter is missing or empty.';
}

$query2 = "SELECT COUNT(*) AS total FROM cyberusers";
$stmt2 = $pdo->prepare($query2);
$stmt2->execute();
$result7 = $stmt2->fetch(PDO::FETCH_ASSOC);
$displayFriendsCount = $result7['total'] - 1;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="friend12.css">
    <style>
        .profile123 {
            top: 56%;
            width: 14vw;
            height: 32vh;
            left: 18%;
            border-radius: 49%;
            border: 8px solid rgb(28, 30, 31)
        }

        .username {
            position: absolute;
            top: 74%;
            left: 36%
        }

        .friendscount {
            position: absolute;
            top: 84%;
            font-weight: bold;
            left: 36%
        }

        .buttons {
            position: absolute;
            top: 82%;

        }

        .buttons button {
            width: 9vw;
            padding: 0px;
            height: 6vh
        }

        .buttons button svg {
            fill: none;

            stroke-width: 1px;
            stroke: white
        }

        .posts {
            width: 80vw;
            height: auto;
            margin-left: 10vw;
            /* border: 1px solid blue; */
            position: absolute;
            top: 153vh;
            /* display: flex; */
            /* flex-direction: row; */
        }

        .posts img {
            width: 30%;
            height: 40vh;
            padding: 12px;
            border-radius: 22px;
        }

        .posts img:hover {
            animation: image 0.4s ease-out;
            border-radius: 41px;
            cursor: pointer;
        }

        @keyframes image {
            from {
                border-radius: 22px;
            }

            to {
                border-radius: 40px;
            }
        }

        body {
            scrollbar-width: thin;
            scrollbar-color: grey red;
            /* Track color is grey and Thumb color is red */
        }

        body::-webkit-scrollbar {
            width: 12px;
            /* Width of the scrollbar */
        }

        body::-webkit-scrollbar-track {
            background: grey;
            /* Track color */
        }

        body::-webkit-scrollbar-thumb {
            background-color: red;
            /* Thumb color */
            border-radius: 6px;
            /* Border radius of the thumb */
        }


        .info {
            margin-top: 83vh;
            /* border:3px solid red; */
            height: auto;
            color: white;
            display: flex;
            flex-direction: row;
            gap: 10px;
            margin-left: 15vw;
        }

        .info p {
            padding: 14px;

        }

        .info p {
            font-size: 16px;
            font-weight: bolder;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .info p:hover {
            background-color: rgba(176, 179, 185, 0.3);
            border-radius: 12px;
            cursor: pointer;
        }

        .buttons #addfriend svg {
            width: 30px;
            margin-left: -2%;
            stroke-width: 8px;
            /* margin-top: 1%; */
        }

        hr {
            border: 1px solid grey
        }

        ::placeholder {
            color: black
        }

        ::-webkit-scrollbar {
            visibility: hidden;
        }

        nav {
            width: 100vw
        }

        .main {
            display: flex;
            flex-direction: row;
            /* border: 3px solid green; */
            width: 70%;
            height: auto;
            margin-left: 16%;
            gap: 10%
        }

        .bio,
        .message {
            /* border: 2px solid red; */
            width: 45%;
            background-color: rgba(174, 178, 184, 0.3);

            height: 30vh;

            font-weight: bold;
            font-size: 130%;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            border-radius: 27px;
            border: 2px solid black
        }

        .message form {
            margin-top: 7%;
            display: flex;
            gap: 10px;
            margin-left: 5%;
            flex-direction: column;
        }

        .message input {
            /* border: 2px solid blue; */
            width: 90%;
            /* flex-direction: column; */
            padding: 12px;
            /* margin-left: 13%; */
            /* margin-top:12% */
            background-color: rgba(10, 10, 16, 0.6);
            /* back */
            border-radius: 12px;
            color: white;
            font-weight: bold;
            border: 1px solid black;


        }

        /* .message input: */

        ::placeholder {
            color: white;
            opacity: 0.8;
        }

        .profile123 {
            top: 59vh
        }

        .bio,
        .message {
            padding: 7px
        }

        .bio p {
            /* margin-top:0%; */
            /* margin-left: 15%; */
            /* border:3px solid red; */
            justify-content: center;
            text-align: center;
        }

        .main .message .intro {
            /* border:2px solid red; */
            /* font-size: 90%; */
            display: flex;
            flex-direction: row;
            gap: 3%;
            margin-top: 12px;
        }

        .intro div {
            padding: 16px;
            width: auto;
            /* border:2px solid blue; */
            font-size: 80%;
            display: flex;
            flex-direction: row;
            gap: 10%;
            justify-content: center;
            cursor: pointer;
            border-radius: 23px;
            /* text-align: center; */
            height: 35px
        }

        .intro div:hover {
            background-color: rgba(176, 179, 185, 0.3);
        }

        .intro div img {
            width: 24px;
            /* height:40px; */
            height: 27px
        }

        .posts img::after {
            border-radius: 122px;
        }

        #message {
            display: flex;
            flex-direction: row;
            justify-content: center;
            text-align: center;
            gap: 10%;
            font-size: 90%;
            height:90%;
        }

        #message img {
            margin-top: 10%;

            /* border:4px solid red */
        }

        .buttons {
            display: flex;
            flex-direction: row;
            gap: 10%;
            width: 20%;
            bordeR: 3px solid transparent;
            /* margin-left: 100px */

        }

        .buttons button {
cursor:pointer;
            width: 60%
            
        }
#message{
    height:44px
}
        #message p {
            /* position: relative; */
            margin-top: 8.8%;
        }
    </style>
</head>

<body>

    <p class="username"><?php echo $displayUsername; ?></p>
    <p class="friendscount"><?php echo $displayFriendsCount; ?> Friends</p>
    <div class="buttons">
        <button id="addfriend">Add friend</button>
        <button id="message" class="message" onclick="message()">
            <img class="x1b0d499 xaj1gnb" src="https://static.xx.fbcdn.net/rsrc.php/v3/y9/r/YjBUcSAL8TC.png" alt aria-hidden="true" height="16" width="16">
            <p>Message</p>
        </button>
    </div>
    <?php if (!empty($displayImageURL)): ?>
        <img src="<?php echo $displayImageURL; ?>" alt="Profile Image" class="profile123">
    <?php endif; ?>
    <?php if (!empty($displayCoverPhotoURL)): ?>
        <img src="<?php echo $displayCoverPhotoURL; ?>" class="coverphoto1">
    <?php endif; ?>

    <?php require "profilepfetch.php"; ?>

    <nav>
        <a href="homepage.php"><img src="friendify.png" alt="Friendify Logo" class="logoinnav"></a>
        <form action="./friends.php" method="get">
            <input type="text" name="username" placeholder="Search for friends" class="searchbar">
        </form>
        <a href="users.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="30" fill="white" stroke="white"
                class="bi bi-chat" viewBox="0 0 16 16">
                <path
                    d="M2.678 11.894a1 1 0 0 1 .287.801 11 11 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8 8 0 0 0 8 14c3.996 0 7-2.807 7-6s-3.004-6-7-6-7 2.808-7 6c0 1.468.617 2.83 1.678 3.894m-.493 3.905a22 22 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a10 10 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9 9 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105" />
            </svg>
        </a>
    </nav>
    <hr>
    <div class="info">
        <p>Posts</p>
        <p>About</p>
        <p>Friends</p>
        <p>Photos</p>
        <p>Videos</p>
        <p>Hobbies</p>

    </div>

    <hr>
    <br>
    <div class="main">
        <div class="bio">
            <h2>Intro</h2>
            <?php require "biofriends.php" ?>
            <p><?php echo $resultbio['bio'] ?></p>
        </div>
        <div class="message">
            <form action="">
                <input type="text" name="message" placeholder="Message something to <?php echo $username ?>">
                <input type="text" name="message" placeholder="Poke <?php echo $username ?> !!!">
            </form>
            <div class="intro">
                <div>
                    <img class="video" height="16" width="16" alt="" class="xz74otr"
                        referrerpolicy="origin-when-cross-origin"
                        src="https://static.xx.fbcdn.net/rsrc.php/v3/yF/r/v1iF2605Cb5.png">
                    Photo/Video
                </div>
                <div><img height="24" width="24" alt="" class="xz74otr" referrerpolicy="origin-when-cross-origin"
                        src="https://static.xx.fbcdn.net/rsrc.php/v3/yC/r/a6OjkIIE-R0.png">
                    Tag people
                </div>
                <div><img height="24" width="24" alt="" class="xz74otr" referrerpolicy="origin-when-cross-origin"
                        src="https://static.xx.fbcdn.net/rsrc.php/v3/yk/r/yMDS19UDsWe.png">
                    Feeling Activity
                </div>
            </div>
        </div>
    </div>
    <br>
    <hr>
    <div class="posts">

        <?php
        // Include the PHP script to fetch posts
        require "postsfriends.php";

        // Counter to keep track of images
        $count = 0;

        // Loop through each post and display it along with an image
        foreach ($resultposts as $post) {
            // Assuming $post is an associative array with a 'posts' key
            $postContent = $post['posts'];

            // Output the image
            echo "<img src='img/$postContent'>"; // Adjust the image source path as needed
        
            // Increment counter
            $count++;

            // Check if the total number of images is greater than three before starting a new row
            if ($count >= 3 && $count % 3 == 0) {
                echo "<br>";
            }
        }

        ?>
    </div>



    <script >
        document.getElementById("addfriend").addEventListener("click", function() {
    // When the element with ID "addfriend" is clicked, execute this function
    if(this.textContent==="Request Sent"){
        this.textContent="Add friend"
    }
    else{
    // Change the text content of the element to "Request Sent"
    this.textContent = "Request Sent";

    // Add an SVG image directly into the HTML content
    this.innerHTML += "<svg xmlns='http://www.w3.org/2000/svg' width='100' height='100' viewBox='0 0 50 50'>" +
        "<path d='M 42.875 8.625 C 42.84375 8.632813 42.8125 8.644531 42.78125 8.65625 C 42.519531 8.722656 42.292969 8.890625 42.15625 9.125 L 21.71875 40.8125 L 7.65625 28.125 C 7.410156 27.8125 7 27.675781 6.613281 27.777344 C 6.226563 27.878906 5.941406 28.203125 5.882813 28.597656 C 5.824219 28.992188 6.003906 29.382813 6.34375 29.59375 L 21.25 43.09375 C 21.46875 43.285156 21.761719 43.371094 22.050781 43.328125 C 22.339844 43.285156 22.59375 43.121094 22.75 42.875 L 43.84375 10.1875 C 44.074219 9.859375 44.085938 9.425781 43.875 9.085938 C 43.664063 8.746094 43.269531 8.566406 42.875 8.625 Z'></path>" +
        "</svg>";
    }
});
function message() {
    window.location.href = "users.php";
}

</script>
</body>

</html>