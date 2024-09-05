<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        
        body{
            /* justify-content: center; */
            /* text-align: center; */
            /* font-size: 220%; */
            font-family:monospace;
            font-weight: bold;
            /* position: relative; */
            /* top:140px; */
        }
        .logo{
            top:0%;
            position: absolute;
            left:0%;
            width:99vw;
            
        }
        .wrong{
            position: absolute;
            top:40%;
            left:33%;
            justify-content: center;text-align: center;
            font-size: 240%;
        }
        .redire{
            position: absolute;
            top:50%;
            left:24%;
            font-size: 240%;
        }
        .head{
            position: absolute;
            top:-5%;
            left:60%;
            font-size: 540%;
            font-weight: bolder;
color:lightblue
        }
    </style>
</head>
<body>

</body>
</html>
<?php
echo "<img src='header.png' class='logo'>";
echo "<script> setTimeout(function (){ window.location.href='../website1/index1.html';},5000);"."</script>";

if(empty($username) || empty($password)){
echo "<p class='wrong'>OOPS!! Wrong username or password</p>";
}
elseif(empty($results)){
    echo "<p class='wrong'> OOPS!! WRONG USERNAME OR PASSWORD</p>";
}
echo "<p class='redire'>Redirecting you back to the login page in 5 seconds</p>";
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p class="head">CYBERNEXUS</p>
</body>
</html>