<?php
require_once('connect.php');
require('layout.html');
session_start();
$username=$_SESSION['user'];
if($username != 1){
    header("location:mainpage.php");
}
$sql=$conn->prepare("SELECT email FROM user WHERE pkuser = :username");
$sql->bindValue(":username", $username);
$result=$sql->execute();
$rows = $sql->fetchAll(PDO::FETCH_ASSOC);
echo('<div id="logoutBanner"><span id="showUser" style="float:left;">User: '.$rows[0]["email"].' [ADMIN]  <a href="mainpage.php">Go Back? </a> </span> <a href="logout.php">Log Out </a> </div><br>');

$sql=$conn->prepare(" SELECT user.pkuser, user.email
FROM user
");
$result=$sql->execute();
$rows = $sql->fetchAll(PDO::FETCH_ASSOC);
echo("<div class='adminbox'>");
echo("users <br>");

foreach($rows as $row){
    echo("<strong>".$row['pkuser']."</strong> ");
    echo($row['email'] ."<br>");
};
echo("</div>");
$sql=$conn->prepare(" SELECT user.email,tblChars.id,tblChars.firstname,tblChars.lastname
FROM tblChars 
 LEFT JOIN user
ON tblChars.userID = user.pkuser;
");
$result=$sql->execute();
$rows = $sql->fetchAll(PDO::FETCH_ASSOC);
echo("<div class='adminbox'>");
echo("chars <br>");
foreach($rows as $row){
    echo("<strong>".$row['email']."</strong> ");
    echo("<strong>".$row['id']."</strong> ");
    echo($row['firstname']." ");
    echo($row['lastname'] ."<br>");
}
echo("</div>");
$sql=$conn->prepare("SELECT tblChars.id,tblChars.firstname,tblinv.itemname,tblinv.itemtype,tblinv.amt
FROM tblChars 
RIGHT JOIN tblinv
ON tblChars.id = tblinv.fkchar;
");
$result=$sql->execute();
$rows = $sql->fetchAll(PDO::FETCH_ASSOC);
echo("<div class='adminbox'>");
echo("items <br>");
foreach($rows as $row){
    echo("<strong>".$row['id']."</strong> ");
    echo("<strong>".$row['firstname']."</strong> ");
    echo($row['itemname']." ");
    echo($row['itemtype']." ");
    echo("[".$row['amt'] ."] <br>");
}
echo("</div>");
