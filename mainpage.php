<?php
require_once('connect.php');
require('layout.html');
session_start();
$username=$_SESSION['user'];
// dis dont work
$sql=$conn->prepare("SELECT email FROM user WHERE pkuser = :username");
$sql->bindValue(":username", $username);
$result=$sql->execute();
$rows = $sql->fetchAll(PDO::FETCH_ASSOC);
echo('<div id="logoutBanner"><span id="showUser" style="float:left;">User: '.$rows[0]["email"].'</span> <a href="logout.php">Log Out </a> </div><br>');
$sql=$conn->prepare("SELECT * FROM tblChars WHERE userID = :user");
$sql->bindValue(":user", $username);
$result=$sql->execute();


$rows = $sql->fetchAll(PDO::FETCH_ASSOC);
if(isset($_GET['deleted'])){
echo("successfully deleted character ". $_GET['deleted']);}
else{
  echo("select or delete a character below");
}
echo("<table> <tr> <th>characters:</th> </tr>");
foreach($rows as $row){
  echo("<tr>");
  echo("<th>");
  echo($row['id']);
  echo("</th>");
  echo("<th>");
  echo($row['firstname'] );
  echo("</th>");
  echo("<th>");
  echo($row['lastname'] );
  echo("</th>");
  echo("<th>");
  echo("<a href=selectchar.php?id=".$row['id'].">select</a>");
  echo("</th>");
  echo("<th>");
  echo("<a href=deletechar.php?id=".$row['id'].">delete</a>");
  echo("</th>");
  echo("</th>");}

//creation form
echo("</table>");
echo('<form method=POST action="results.php">');
echo('<header id="loginhead">create character</header>');
echo('<div id="inputBox">');
echo('<input type=text name="firstname" placeholder="first name"> <br>');
echo('<input type=text name="lastname" placeholder="last name"><br>');
echo('<input type=text name="race" placeholder="race/species"><br>');
echo('<input type=text name="age" placeholder="age"><br>');
echo('<input type=text name="sex" placeholder="gender/sex"><br>');
echo('<input type=text name="info" placeholder="main/important info"><br>');
echo('</div>');
echo('<input type=submit id="submitButton"> ');
echo('</form>');