<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emily's Kingdom - Browse</title>
    <link rel="stylesheet" href="./stylesheet.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sansita&display=swap" rel="stylesheet">
</head>
<body>
<header>
    <?php
    include_once("../Nav, header, foot/header.php");
    ?>
</header>
<main>
    <?php 
    session_start();

    unset($_COOKIE['username']);
    setcookie('username','',time()-3600);

    session_destroy();
    ?>
    <p>You have successfully been logged out. Click <a href="./login.php">here</a> to log back in.
</main>
<nav>
    <?php
    include_once("../Nav, header, foot/nav.php");
    ?>
</nav>
<footer>
    <h2>Emily's Kingdom</h2>
    <article>
            <?php
            include_once("../Nav, header, foot/foot.php");
            ?>
    </article>
    <br>
    <div>
        14 Young Drive <br>
        Fairport, NY 14450
    </div>
    <div id="float">
        All Rights Reserved.
    </div>
</footer>
</body>
</html>