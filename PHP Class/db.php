<?php

class Connection {
    
    private $connection;
    //Forgot to add this column once I was creating the table and now I have to add it subsequently//

    function __construct() {
        //Connecting to MySQL database, and creating a new one in case it doesn't already exist//
        $this->connection = new mysqli("localhost","root","");

        if($this->connection->error) {
            die("Error connecting to database: $this->connection->error");
        }

        //Creating a new database, in case one doesn't already exist//
        $this->connection->query("CREATE DATABASE IF NOT EXISTS `projekat`");

        $this->connection->select_db("projekat");

        //Creating a "user" table, in case one doesn't already exist//
        $this->connection->query("CREATE TABLE IF NOT EXISTS `projekat`.`user` ( `id` INT NOT NULL AUTO_INCREMENT , `username` VARCHAR(50) UNIQUE NOT NULL , `password` VARCHAR(50) NOT NULL , PRIMARY KEY (`id`)) ENGINE = MyISAM");

        //INSERT IGNORE ignores duplicates for the UNIQUE column (username), so there won't be two admins in the table//
        $this->connection->query("INSERT IF NOT EXISTS INTO `user` (`username`,`password`) VALUES ('admin@admin','adminpass')");

        $this->connection->query("CREATE TABLE IF NOT EXISTS `projekat`.`products` ( `id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(50) NOT NULL , `size` VARCHAR(50) NOT NULL , `price` DECIMAL NOT NULL , PRIMARY KEY (`id`)) ENGINE = MyISAM");

        //Namenjeno da oni koji kodiraju ubacuju proizvode u bazu//
        function push_to_db($name,$size,$price,$url) {
            $query = "INSERT IGNORE INTO `products`(`name`,`size`,`price`,`url`) VALUES (?,?,?,?)";
            $statement = $this->connection->prepare($query);
            $statement->bind_param("sdds",$name,$size,$price,$url);
            $statement->execute();
        }
    }

    //Forgot to add this column when I was creating the table so I have to add it subsequently//
    // function create_url_column() {
    //     $query = "ALTER TABLE IF NOT EXISTS `products` ADD ? VARCHAR (255) NOT NULL;";
    //     $var = "\`url\`";
    //     $statement = $this->connection->prepare($query);
    //     $statement = bind_param("s",$var);
    //     $statement->execute();
    // }
    //Won't work -- ne mogu imena kolona da se dodaju preko prepared statement; uradicu u MySQL. Nije potrebno IF NOT EXISTS zato sto ce svakako samo jednom da promeni tabelu?????//

    function prepare_select_user() {
        return $this->connection->prepare("SELECT * FROM `user` WHERE `password` = ? AND `username` = ?");
    }

    function user_check($username, $password): bool {
        $prepared = $this->prepare_select_user();
        $prepared->bind_param("ss",$password,$username);
        $prepared->execute();
        return $prepared->get_result()->num_rows == 1;
    }
    //Namenjeno adminima da ubacuju preko koda u SQL//
    function push_to_db_hardcode($name,$size,$price,$url) {
        $query = "INSERT INTO `products`(`name`,`size`,`price`,`url`) VALUES (?,?,?,?)";
        $statement = $this->connection->prepare($query);
        $statement->bind_param("sdds",$name,$size,$price,$url);
        $statement->execute();
    }

    function select_all() {
        $query = "SELECT * FROM `products` LIMIT 3";
        return $this->connection->query($query);
    }

    function select_all_page_2() {
        $query = "SELECT * FROM `products` LIMIT 4,6";
        return $this->connection->query($query);
    }

    //Ubacivanje novoih korisnika u bazu podataka//
    function prepare_insert_user() {
        return $this->connection->prepare("INSERT IGNORE INTO `user`(`username`,`password`) VALUES (?, ?)");
    }

    function insert_user($username_new,$password_new_1) {
        $prepared = $this->prepare_insert_user();
        $prepared->bind_param("ss",$username_new,$password_new_1);
        $prepared->execute();
    }

}

$connection = new Connection();

class Product {

    protected $name;
    protected $size;
    protected $price;
    protected $url;

    function __construct($name,$size,$price,$url) {

        $this->name=$name;
        $this->size=$size;
        $this->price=$price;
        $this->url = $url;
    }

    function getName() {
        return $this->name;
    }

    function getPrice() {
        return $this->price;
    }

    function getSize() {
        return $this->size;
    }

    function getUrl() {
        return $this->url;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setPrice($price) {
        $this->price = $price;
    }

    function setSize($size) {
        $this->size = $size;
    }
    
    function setUrl($url) {
        $this->url = $url;
    }
}

?>