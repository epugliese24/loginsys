<?php
require_once('connect.php');
require('layout.html');
session_start();
$user=$_SESSION['user'];
echo('<div id="logoutBanner"><span id="showUser" style="text-align:left;">User: '.$user.'</span> <a href="logout.php">Log Out </a> </div><br>');
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