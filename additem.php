<?php
require_once('connect.php');
session_start();
$charid=$_GET['id'];
$sql=$conn->prepare("SELECT userID FROM tblChars WHERE id=:charid");
$sql->bindValue(":charid", $charid);
$result=$sql->execute();
$rows = $sql->fetchAll(PDO::FETCH_ASSOC);
$userid=$rows[0]["userID"];
$username=$_SESSION['user'];
$name=$_POST['itemName'];
$user=$_POST['type'];
$lastname=$_POST['amt'];
  $sql = $conn->prepare("INSERT INTO tblinv (fkuser, fkchar, itemtype, itemname, amt)
  VALUES (:user, :id, :userID, :firstname, :lastname)");
  $sql->bindValue(":user", $userid);
  $sql->bindValue(":id", $charid);
  $sql->bindValue(":userID", $user);
  $sql->bindValue(":firstname", $name);
  $sql->bindValue(":lastname", $lastname);
$sql->execute();
echo("success");
header("location:selectchar.php?id=".$charid."");
