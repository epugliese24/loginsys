<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "database1";
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "<br>" . $e->getMessage();
  die();
  }
  ?>