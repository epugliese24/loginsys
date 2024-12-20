<?php
require_once('connect.php');
echo('<a href="logout.php">log out</a><br>');
session_start();
$user=$_SESSION['user'];
echo($_SESSION['user']);
echo("<br> you logged in<br>");
$sql=$conn->prepare("SELECT * FROM tblChars WHERE userID = :user");
$sql->bindValue(":user", $user);
$result=$sql->execute();
$rows = $sql->fetchAll(PDO::FETCH_ASSOC);
echo("<table> <tr> <th>first name</th> <th>last name</th> <th>race</th> <th>age</th></tr>");
foreach($rows as $row){
  echo("<tr>");
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

echo('<form method=POST action="results.php">');
echo('<header>create character</header>');
echo('<div id="inputBox">');
echo('<input type=text name="firstname" placeholder="first name here"> <br>');
echo('<input type=text name="lastname" placeholder="last name here"><br>');
echo('<input type=text name="race" placeholder="race here"><br>');
echo('<input type=text name="age" placeholder="age here (must be an int)"><br>');
echo('</div>');
echo('<input type=submit id="submitButton"> ');
echo('</form>');