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
    session_start();
    include_once("../Nav, header, foot/header.php");
    ?>
</header>
<main id="browse">
<h1>Browse our offers below!</h1>
    <?php
    include_once("../PHP Class/db.php");
    $res = $connection->select_all_page_2();
    $array = [];
    echo '<form action="./browse.php" method="get">';
    if ($res-> num_rows > 0) {
        // output data of each row
        while($row = $res->fetch_assoc()) {
            $el = new Product($row["name"],$row["size"],$row["price"],$row["url"]);
            array_push($array,$el);
            echo 
            //div
            "<div class='browse'>" . 
            //img
            "<img src='" . $el->getUrl() . "' alt='" . $el->getName() . "'/>" . 
            //h2 x2
            "<h2>" . $el->getName() ."<br>". $el->getSize()."oz" . "</h2>" . 
            "<h2>" . "$".$el->getPrice() . "</h2>" . 
            //label and input
            "<label for='qty'>Qty:</label>
            <input type='number' id='qty' name='qty' max='10' min='0'> <br> <br>
            <input type='button' id='add' name='add_to_cart' value='Add to Cart'>";
            //Closing div//
            echo "</div>";
        }
    }
    echo '</form>';
    echo "<div id='buttons'> <form action='./browse.php' method='get'> <input type='submit' value='1' style='color: white;'>  </form> <input type='button' value='2' style='color: #ffd700;'> </div>";
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