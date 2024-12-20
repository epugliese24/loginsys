<?php
require_once('connect.php');


try {
$email=$_POST['email'];
$password=password_hash($_POST['pass'],PASSWORD_DEFAULT);
  $sql = $conn->prepare("INSERT INTO user (email, pass)
  VALUES (:email, :pass)");
  $sql->bindValue(":email", $email);
  $sql->bindValue(":pass", $password);
$result=$sql->execute();
echo("account successfully created");
} catch(PDOException $e) {
    echo "<br>" . $e->getMessage();
  
  }