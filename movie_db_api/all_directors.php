<?php

// Initialize variable for database credentials
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'movies_db';

//Create database connection
$dblink = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

//Check connection was successful
if ($dblink->connect_errno) {
  printf("Failed to connect to database");
  exit();
}

//Fetch all rows from directors table
$result = $dblink->query("SELECT * FROM directors");

//Initialize array variable
$dbdata = [];

// $dirs = [];
// $dbdata = [];



//Fetch into associative array
while ($row = $result->fetch_assoc()) {
  $dbdata[] = $row;
  // $dirs["dirs"] = $row;

  // $dirs = array(
  //   'dirs' => array(
  //       $row
  //   )
  // );

}

//Print array in JSON format
echo json_encode($dbdata);

?>