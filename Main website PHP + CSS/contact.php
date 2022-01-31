<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emily's Kingdom - Contact</title>
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
<p>Emily's Kingdom <br><br>
14 Young Drive <br><br>
Fairport, NY 14450 <br><br>
Mon - Sat, 9AM - 17PM <br><br>
<?php
date_default_timezone_set("CET");
$hours = (integer)date("H");
$minutes = (integer)date("i");
$hours_until_closing = 17 - $hours;
$minutes_until_closing = 60 - $minutes;
$hours_until_opening = (24 - $hours) + 8;
$day = date("D");
if ($day == "Sat") {
    $hours_until_opening_weekend = (48 - $hours) + 8;
} else {
    $hours_until_opening_weekend = $hours_until_opening;
}
if ($day == "Sat" || $day == "Sun") {
    $declaration = "It's the <span class='open'>weekend</span>! We open 9AM on Monday! $hours_until_opening_weekend hour(s) and $minutes_until_closing minute(s) until opening!";
} elseif ($hours > 9 && $hours < 17) {
    $declaration = "We are currently <span class='open'>open</span>! $hours_until_closing hour(s) and $minutes_until_closing minute(s) until closing.";
} else {
    $declaration = "We are currently <span class='closed'>closed</span>! We open in $hours_until_opening hour(s) and $minutes_until_closing minute(s).";
}
echo $declaration;
?>
</p>
<form action="./contact.php" method="post" id="contact">
        <fieldset>
            <legend>Contact us</legend>
            Use the form below to send us a message. We reply within 24 hours by email (so be sure to include one)! <br><br>
            <label for="email">Enter email:</label>
            <input type="email" id="email" name="email" placeholder="Your email here" required> <br><br>
            <label for="name">Your name:</label>
            <input type="text" id="name" name="name" placeholder="Your name here" required> <br><br>
            <label for="query">I am writing because:</label>
            <select name="query" id="query" required>
                <option value="cancel">I wish to cancel my order</option>
                <option value="not_received">I haven't received my order</option>
                <option value="other" selected>Other</option>
            </select> <br><br>
            <label for="textarea">Describe your issue:</label>
            <textarea name="textarea" id="textarea" cols="30" rows="10" placeholder="Further describe your inconveniences in greater detail..." maxlength="300"></textarea> <br> <br>
            <input type="submit" value="Send!">
        </fieldset>
    </form>
    <br>
    If speed is of the essence, you may call us on: <br>
    <ul>
        <li>+44 116 496 0149 (international)</li>
        <li>0116 496 0149 (US only)</li>
    </ul>
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