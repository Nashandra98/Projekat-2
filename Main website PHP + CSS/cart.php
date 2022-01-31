<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emily's Kingdom - My Cart</title>
    <meta charset="UTF-8">
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
    <?php
    include_once("../PHP Class/db.php");
    
    class Cart {
        function __construct() {
            if(!isset($_SESSION['item_cart'])) { 
                $_SESSION['item_cart'] = [];
            }
        }

        function addToCart($id,$amount) {
            if(isset($_SESSION['item_cart'][$id])) {
                $_SESSION['item_cart'][$id] += $amount;
            } else {
                $_SESSION['item_cart'][$id] = $amount;
            }
        }

        function displayCart() {
            foreach ($_SESSION['item_cart'] as $id => $amount) {
                echo "Stavka $id je u korpi $amount puta<br>";
            }
        }

        function emptyCart() {
            $_SESSION['item_cart'] = [];
        }
    }

    $cart = new Cart();
    ?>
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