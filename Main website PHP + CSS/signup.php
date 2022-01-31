<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emily's Kingdom - Login</title>
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
    include_once("../PHP Class/db.php");
?>
    <form action="./signup.php" method="post" id="login_form">
        <fieldset>
            <legend>Fill in the registration form below to create a new account</legend>
                <br><br>
                <label for="username_new">NEW USERNAME:</label>
                <input type="text" placeholder="Your username..." id="username_new" name="username_new" minlength="15" maxlength="30" required>
                <br><br>
                <label for="password_new_1">NEW PASSWORD:</label>
                <input type="password" id="password_new_1" name="password_new_1" placeholder="Your password..." minlength="15" maxlength="30" required>
                <br><br>
                <label for="password_new_2">RE-TYPE PASSWORD:</label>
                <input type="password" id="password_new_2" name="password_new_2" placeholder="Your password..." minlength="15" maxlength="30" required>
                <br><br>
                <label for="tos">I agree to the Terms of Service.</label>
                <input type="checkbox" name="tos" id="tos" required>
                <br><br>
                <input type="submit" value="Register!">
        </fieldset>
    </form>
<?php
    if(isset($_POST["username_new"]) && isset($_POST["password_new_1"]) && isset($_POST["password_new_2"]) && isset($_POST["tos"])) {
        $username_new = $_POST["username_new"];
        $password_1 = $_POST["password_new_1"];
        $password_2 = $_POST["password_new_2"];
        $tos = $_POST["tos"];
    } else {
        $username_new = false;
        $password_1 = false;
        $password_2 = false;
        $tos = false;
    }
    $username_length = strlen($username_new);
    $password_length = strlen($password_1);
    $first_letter = substr($username_new, 0, 1);
    if (ord($first_letter) >= 65 && ord($first_letter) <= 90 && $password_1 === $password_2 && $tos) {
        $connection->insert_user($_POST["username_new"],$_POST["password_new_1"]);
        $declaration = "<br> The data entered is valid! You can now <a href='./login.php'>LOGIN</a> into the website!";
    } elseif (ord($first_letter) < 65 || ord($first_letter) > 90) {
        $declaration = "<br> The first character of the username must be a capital letter!";
    } elseif ($password_1 != $password_2) {
        $declaration = "<br> The passwords don't match! Try again.";
    } else {
        $declaration = "<br> An error occurred upon upon trying to register your credentials. Please try again later!";
    }
    if(isset($_POST["username"]) && isset($_POST["password"])) {
        echo $declaration;
    }
?>
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