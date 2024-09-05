<?php
require_once 'config.php';
require_once 'signup_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            justify-content: center;
            text-align: center;
            font-size: 180%;;
        }
        form>.login{
            position: absolute;
            top:20%;
            left:44%;
        }
    </style>
</head>
<body>
    <form action="./login.inc.php" method="post" class="login">
        <h3>LOGIN</h3>
        <input type="text" name="username" placeholder="username"><br>
        <input type="password" name="password" placeholder="password"><br>
        <button>LOGIN</button>
    </form>
    <form action="./signup.inc.php">
    <h3>SIGNUP</h3>
        <input type="text" name="username" placeholder="username"><br>
        <input type="password" name="password" placeholder="password"><br>
        <input type="email" name="email" placeholder="email"><br>
        <button>SIGNUP</button>
    </form>
    <?php
checksignuperrors();
    ?>
</body>
</html>