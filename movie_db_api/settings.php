<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "movies_db";

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'movies_db');

    // $GLOBALS['conn'] = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
    $GLOBALS['conn'] = mysqli_connect($servername, $username, $password, $dbname);


?>