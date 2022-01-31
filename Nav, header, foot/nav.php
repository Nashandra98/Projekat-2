<?php
    include_once("../PHP Class/db.php");
    echo "<p><a href='../Main Website PHP + CSS/home.php'>&#8962;&nbsp;Home</a></p>";
    if (isset($_SESSION['username'])) {
        echo "<p><a href='../Main Website PHP + CSS/logout.php'>&iscr;&nbsp;
        Logout</a></p>";
    } else {
        echo "<p><a href='../Main Website PHP + CSS/login.php'>&iscr;&nbsp;
        Login</a></p>";
    }
    echo "<p><a href='../Main Website PHP + CSS/browse.php'>&star;&nbsp;
    Browse</a></p>";
    echo "<p><a href='../Main Website PHP + CSS/contact.php'>&#10697;&nbsp;Contact us</a></p>";
    echo "<p><a href='../Main Website PHP + CSS/o_nama.php'>&#10003;&nbsp;About Us</a></p>";
    echo "<p><a href='../Main Website PHP + CSS/cart.php'>&pound;&nbsp;Cart</p>";
?>