<?php
// Start the session
session_start();

$username = $_SESSION['username'];

?>


<style>
    .logo {
        width: 15%;
        height: 16%;

    }

    .logo img {
        width: 100%;
        border-radius: 62px;
        border: 1px solid gray;
        background: none;
        height: 100%
    }

    .users-list {
        /* border:4px solid red; */
        width: 40%;
        height: 10%;
        margin-top: -90px;
        position: absolute;
        left: 30%;
    }
</style>

<body>
    <div class="logo">
        <a href="homepage.php"><img src="friendify.png"></a>
    </div>
    <div class="wrapper">
        <section class="users">
            <header>
                
            </header>

            <div class="users-list">
                <?php require_once "display_data.php"; ?>
            </div>

        </section>
    </div>

</body>

</html>