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
    //DUPLIRAJU SE U BAZI!
    // $connection->push_to_db("Chocolate treats - small box",3.5,10.99,"../Pictures/0.jpg");
    // $connection->push_to_db("Chocolate treats - middle box",10.5,20.99,"../Pictures/0.jpg");
    // $connection->push_to_db("Chocolate treats - ultimate box",20,39.99,"../Pictures/0.jpg");
    // $connection->push_to_db("Chocolate treats - Box o' Candy",15,19.99,"../Pictures/0.jpg");
    // $connection->push_to_db("Crisps Bundle",50,49.99,"../Pictures/0.jpg");
    // $connection->push_to_db("Caramel smores",30,59.99,"../Pictures/0.jpg");
    //$connection->create_url_column(); Moj propali pokusaj da dodam kolonu preko PHP koda//
    $res = $connection->select_all();
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
            <input type='button' onclick='order()' id='add' name='add_to_cart' value='Add to Cart'>";
            //Closing div//
            echo "</div>";
        }
    }
    echo '</form>';
    echo "<div id='buttons'> <input type='button' value='1' style='color: #ffd700;'> <form action='./browse2.php' method='get'> <input type='submit' value='2' style='color: white;'> </form> </div>";

    //Stari kod//
    // $array2 = [
    //     [new Product("Chocolate treats - small box","$10.99","(3.5 oz)","../Pictures/0.jpg")],
    //     [new Product("../Pictures/0.jpg","Chocolate treats - middle box","$20.99","(10.5 oz)","../Pictures/0.jpg")],
    //     [new Product("../Pictures/0.jpg","Chocolate treats - ultimate box","$39.99","(20 oz)","../Pictures/0.jpg")],
    //     [new Product("../Pictures/0.jpg","Box o' Candy","$19.99","(15 oz)","../Pictures/0.jpg")],
    //     [new Product("../Pictures/0.jpg","Crisps budle","$49.99","(50 oz)","../Pictures/0.jpg")],
    //     [new Product("../Pictures/0.jpg","Caramel smores","$59.99","(30 oz)","../Pictures/0.jpg")]
    // ];

    // $small = $array[0][0];
    // $middle = $array[1][0];
    // $large = $array[2][0];
    // $candy = $array[3][0];
    // $crisps = $array[4][0];
    // $smores = $array[5][0];
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