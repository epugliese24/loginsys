<?php
require_once('connect.php');
$sql=$conn->prepare('SELECT * from user WHERE email=:email');
$email=$_POST['email'];
$password=$_POST['pass'];
$sql->bindValue(":email", $email);
$result=$sql->execute();
$rows = $sql->fetchAll(PDO::FETCH_ASSOC);
echo("<table> <tr> <th>email</th><th>pass</th></tr>");
foreach($rows as $row){
  echo("<tr>");
  echo("<th>");
  echo($row['email'] . ": " );
  echo("</th>");
  echo("<td>");
  echo($row['pass']);
  echo("</td>");
  echo("<td>");
  $valid=password_verify($password, $row['pass']);
echo($valid); 
echo("</td>");
  echo("</tr>");


}
echo("</table>");
if($valid){
    echo("yes");
    session_start();
    $_SESSION['user']=$row['pkuser'];
    header("location: mainpage.php");
}
else{
    echo("no");
    header("location: login.php");
}