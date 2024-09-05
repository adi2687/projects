<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

        * {
            margin: 0;
            padding: 0;
        }

        .img {
            width: 100vw;
        }

        .intro {
            position: absolute;
            right: 43%;
            top: 50%;
        }

        .email {
            position: absolute;
            left: 34%;
        }

        .button {
            position: absolute;
            right: 46%;
            top: 53%;
        }

        .email {
            position: absolute;
            top: 43%;
        }

        .login {
            position: absolute;
            top: 56%;
            left: 45%;
        }

        .heading {
            font-size: 320%;
            position: absolute;
            left: 65%;
            top: 7%;
            color: lightblue;
            font-weight: bold;
            height: 10px;
            font-family: 'Montserrat', sans-serif;
        }

    </style>
</head>

<body>
<img class="img" src="header.png" alt="">
    <div class="container">
        <h1 class="heading">CYBERNEXUS</h1>
        <p class="intro">Click here to go to Login page</p>
        <a href="index.html"><button class="button">Go to login page</button></a>
    </div>

</body>

</html>
<?php

echo "<h1 class='email'>This email or username is already in use</h1>" . "<br>" . "<p class='login'> Login using another email </p>";