<?php
require_once('connect.php');
require('layout.html');
session_start();
$username=$_SESSION['user'];
$sql=$conn->prepare("SELECT email FROM user WHERE pkuser = :username");
$sql->bindValue(":username", $username);
$result=$sql->execute();
$rows = $sql->fetchAll(PDO::FETCH_ASSOC);
echo('<div id="logoutBanner"><span id="showUser" style="float:left;">User: '.$rows[0]["email"].' <a href="mainpage.php">Go Back? </a> </span> <a href="logout.php">Log Out </a> </div><br>');
$sql=$conn->prepare("SELECT * FROM tblChars WHERE userID = :user");
$sql->bindValue(":user", $username);
$result=$sql->execute();

$charid=$_GET['id'];
echo("selected character id: ".$charid."<br>");
$sql=$conn->prepare("SELECT * FROM tblChars WHERE id = :charid");
$sql->bindValue(":charid", $charid);
$result=$sql->execute();
$rows = $sql->fetchAll(PDO::FETCH_ASSOC);
echo("<table> <tr> <th>selected</th> </tr>");
foreach($rows as $row){
  echo("<tr>");
  echo("<th>");
  echo($row["firstname"]);
  echo("</th>");
  echo("<th>");
  echo($row["lastname"]);
  echo("</th>");
  echo("</th>");}
echo("</table>");

echo("<div id='charInfoBox'
<table>");
foreach($rows as $row){
  echo("<tr>");
  echo("<th>");
  echo($row["firstname"]." ");
  echo("</th>");
  echo("<th>");
  echo($row["lastname"]." <br>");
  echo("</th>");
  echo("<th>");
  echo($row["race"].", ");
  echo("</th>");
  echo("<th>");
  echo($row["age"].", ");
  echo("</th>");
  echo("<th>");
  echo($row["sex"]."<br>");
  echo("</th>");
  echo("<th>");
  echo($row["info"]."<br>");
  echo("</th>");
  echo("</th>");}
echo("</table>");

echo('</div>');