<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emily's Kingdom - Home</title>
    <link rel="stylesheet" href="./stylesheet.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sansita&display=swap" rel="stylesheet">
</head>
<body>
<header>
    <?php
    session_start();
    include_once("../Nav, header, foot/header.php");
    ?>
</header>
<main>
    <h1>Hello there! Today is 
    <?php
    date_default_timezone_set("CET");
    $today = date("D, M j, G:i.");
    echo $today;
    ?></h1>
    <form action="./login.php">
    <div id="special_offer">
    <img src="../pictures/special offer" alt="Special offer" id="star_sign">
    <h2>We have a one-time special offer for you!</h2>
    <p>It's the time of giving. Get up to 50% discount on your first order!</p>
    <br>
    <input type="submit" value="Claim now!">
    </div>
    </form>
    <br>
    <h2>Check out our gallery and customer contribution snippet:</h2>
    <img src="../pictures/three" alt="Gallery image" id="three">
</main>
<nav>
    <?php
    include_once("../Nav, header, foot/nav.php");
    ?>
</nav>
<footer>
    <h2>Emily's Kingdom</h2>
    <div>
        <article>
            <?php
            include_once("../Nav, header, foot/foot.php");
            ?>
        </article>
        <br>
        14 Young Drive <br>
        Fairport, NY 14450
    </div>
    <div id="float">
        All Rights Reserved.
        </div>
    </div>
</footer>
</body>
</html>