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
    session_start();
    include_once("../Nav, header, foot/header.php");
    include_once("../PHP Class/db.php");

    //Checking if the session has already started for the user logged under this username//
    if(isset($_SESSION['username'])) {
        header('Location: ./home.php');
    }

    //Checking whether the user's data has already been picked up by cookies//
    if(isset($_COOKIE['username'])) {
        $_SESSION['username'] = $_COOKIE['username'];
        header('Location: ./home.php');
    }

    //For when the user has just logged in//
    if(isset($_POST['username']) && isset($_POST['password'])) {
        if($connection->user_check($_POST['username'],$_POST['password'])) {
            //If "Keep me logged in" input field is checked//
            if(isset($_POST['keep'])) {
                setcookie("username",$_POST['username'],time()+60*60*24);
            }
            $_SESSION['username'] = $_POST['username'];
            header('Location: ./home.php');
    }
    $error = true;
}
    ?>
</header>
<main>
    <form action="./login.php" method="post" id="login_form">
        <fieldset>
            <legend>Enter login credentials to unlock special features</legend>
            <br>
            <label for="username">Enter username:</label>
            <input type="text" id="username" name="username" placeholder="Your username" required minlength="15" maxlength="30">
            <br>
            <br>
            <label for="password">Enter password:</label>
            <input type="password" id="password" name="password" placeholder="Your password" required minlength="15" maxlength="30">
            <br>
            <br>
            <label for="keep" >Keep me logged in: </label>
            <input type="checkbox" name="keep" id="keep" />
            <br>
            <br>
            <input type="submit" value="Log in">
        </fieldset>
        <p>Not a member? <a href="./signup.php">Register!</a>
</div>
    </form>
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