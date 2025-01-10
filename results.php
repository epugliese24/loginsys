<?php
require_once('connect.php');
session_start();
$user=$_SESSION['user'];
$name=$_POST['firstname'];
$lastname=$_POST['lastname'];
$race=$_POST['race'];
$age=$_POST['age'];
$sex=$_POST['sex'];
$info=$_POST['info'];
  $sql = $conn->prepare("INSERT INTO tblChars (userID, firstname, lastname, race, age, sex, info)
  VALUES (:userID, :firstname, :lastname, :race, :age, :sex, :info)");
  $sql->bindValue(":userID", $user);
  $sql->bindValue(":firstname", $name);
  $sql->bindValue(":lastname", $lastname);
  $sql->bindValue(":race", $race);
  $sql->bindValue(":age", $age);
  $sql->bindValue(":sex", $sex);
  $sql->bindValue(":info", $info);


$sql->execute();
echo("success");
header("location:mainpage.php");