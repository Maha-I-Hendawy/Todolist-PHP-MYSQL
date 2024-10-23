<?php 

// Connection details
$server = "localhost";
$username = "root";
$password = "a@y@12387!@#";


try {
  $conn = new PDO("mysql:host=$server;dbname=todolist", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}


?>