<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emily's Kingdom - About Us</title>
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
    We aim to appease our customers' sweet tooth in the best way possible, with homemade treats for every age. <a href="./contact.php">Contact us here</a>. View our address below to find us:
    <br><br> 
<iframe
 src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11653.310021982708!2d-77.45085875795806!3d43.09763178454515!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89d1332d718c8633%3A0x839d6c901b5fad43!2sFairport%2C%20NY%2014450%2C%20USA!5e0!3m2!1sen!2srs!4v1641819383665!5m2!1sen!2srs" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
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