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
echo("users
<table>
<tr> <th>user id</th><th>username</th> </tr>");
foreach($rows as $row){
    echo("<tr><th><strong>".$row['pkuser']."</strong></th>");

    echo("<th>".$row['email']."</th>");

}
echo("</table>");
echo("</div>");

$sql=$conn->prepare(" SELECT user.email,tblChars.id,tblChars.firstname,tblChars.lastname
FROM tblChars 
 LEFT JOIN user
ON tblChars.userID = user.pkuser;
");
$result=$sql->execute();
$rows = $sql->fetchAll(PDO::FETCH_ASSOC);
echo("<div class='adminbox'>");
echo("chars
<table>
<tr> <th>email</th><th>character id</th><th>fname</th><th>lname</th> </tr>");
foreach($rows as $row){
    echo("<tr><th><strong>".$row['email']."</strong></th>");
    echo("<th><strong>".$row['id']."</strong> </th>");
    echo("<th>".$row['firstname']."</th>");
    echo("<th>".$row['lastname'] ."</th></tr>");
}
echo("</table>");
echo("</div>");
$sql=$conn->prepare("SELECT tblChars.id,tblChars.firstname,tblinv.itemname,tblinv.itemtype,tblinv.amt
FROM tblChars 
RIGHT JOIN tblinv
ON tblChars.id = tblinv.fkchar;
");
$result=$sql->execute();
$rows = $sql->fetchAll(PDO::FETCH_ASSOC);


echo("<div class='adminbox'>");
echo("items
<table>
<tr> <th>char id</th><th>char fname</th><th>item name</th><th>item type</th><th>item amt</th> </tr>");
foreach($rows as $row){
    echo("<tr><th><strong>".$row['id']."</strong></th>");
    echo("<th><strong>".$row['firstname']."</strong> </th>");
    echo("<th>".$row['itemname']."</th>");
    echo("<th>".$row['itemtype']."</th>");
    echo("<th>[".$row['amt'] ."]</th></tr>");
}
echo("</table>");
echo("</div>");
