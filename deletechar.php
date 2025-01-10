<?php
require_once('connect.php');
require('layout.html');
session_start();
$user=$_SESSION['user'];
echo($user."<br>");
$charid=$_GET['id'];
echo($charid);
$sql=$conn->prepare("DELETE FROM tblChars WHERE id = :charid AND userID=:userid");
$sql->bindValue(":charid", $charid);
$sql->bindValue(":userid", $user);
$result=$sql->execute();
header("location:mainpage.php?deleted=".$charid);