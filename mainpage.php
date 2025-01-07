<?php
require_once('connect.php');
require('layout.html');
session_start();
$user=($sql=$conn->prepare("SELECT email FROM user WHERE userID = 
:id"));
$sql->bindValue(":id", $_SESSION['user']);
$sql->execute();
// $_SESSION['user']

echo('<div id="logoutBanner"><span id="showUser" style="text-align:left;">User: '.$user.'</span> <a href="logout.php">Log Out </a> </div><br>');
echo("<br> you logged in<br>");
$sql=$conn->prepare("SELECT * FROM tblChars WHERE userID = :user");
$sql->bindValue(":user", $user);
$result=$sql->execute();
$rows = $sql->fetchAll(PDO::FETCH_ASSOC);
echo("<table> <tr> <th>delete</th><th>first name</th> <th>last name</th> <th>race</th> <th>age</th></tr>");
foreach($rows as $row){
  echo("<tr>");
  echo("<th>");
  echo("<a href=deletechar.php?id=".$row['id'].">delete</a>");
  echo("</th>");
  echo("<th>");
  echo($row['firstname'] );
  echo("</th>");
  echo("<th>");
  echo($row['lastname'] );
  echo("</th>");
  echo("<th>");
  echo($row['race'] );
  echo("</th>");
  echo("<th>");
  echo($row['age'] );
  echo("</th>");}
echo("</table>");
echo('<form method=POST action="results.php">');
echo('<header id="loginhead">create character</header>');
echo('<div id="inputBox">');
echo('<input type=text name="firstname" placeholder="first name here"> <br>');
echo('<input type=text name="lastname" placeholder="last name here"><br>');
echo('<input type=text name="race" placeholder="race here"><br>');
echo('<input type=text name="age" placeholder="age here (must be an int)"><br>');
echo('</div>');
echo('<input type=submit id="submitButton"> ');
echo('</form>');