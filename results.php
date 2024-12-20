<?php
require_once('connect.php');
session_start();
$user=$_SESSION['user'];
$name=$_POST['firstname'];
$lastname=$_POST['lastname'];
$race=$_POST['race'];
$age=$_POST['age'];
  $sql = $conn->prepare("INSERT INTO tblChars (userID, firstname, lastname, race, age)
  VALUES (:userID, :firstname, :lastname, :race, :age)");
  $sql->bindValue(":userID", $user);
  $sql->bindValue(":firstname", $name);
  $sql->bindValue(":lastname", $lastname);
  $sql->bindValue(":race", $race);
  $sql->bindValue(":age", $age);


$sql->execute();
echo("success");