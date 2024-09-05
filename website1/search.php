<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .container {
        margin-top: 3px;
    }

    .text-dark {
        color: black;
        text-decoration: none;
    }
</style>

<body>
    <?php include_once "config1.php"; ?>


    <div class="container">
        <h1>Search Results for <?php echo $_GET['search'] ?></h1>
        <?php
        $noresults = true;
        $search = $_GET['search'];
        $sql = "SELECT * FROM cyberusers WHERE MATCH username AGAINST ('$search')";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $name = $row['username'];
            $id = $row['id'];

            $url = "chat.php";

            $noresults = false;

            // Display the search results
            echo '<div class="result">
            <h3><a href="'. $url .'" class="text-dark">' . $name . '</a></h3>
        </div>';
        }
        if($noresults) {
            echo '<div class="jumbotron jumbotron-fluid">
            <div class="container">
                <p class="display-4">No Results Found</p>
                <p class="lead"> Suggestions: <ul>
                        <li>Make sure that all words are spelled correctly.</li>
                        <li>Try different keywords.</li>
                        <li>Try more general keywords. </li></ul>
                </p>
            </div>
         </div>';
        }

        ?>
    </div>
</body>

</html>