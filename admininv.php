<?php
require_once('connect.php');

//show all users in db (works)
// SELECT  user.pkuser, user.email
// FROM user 

//show all characters in db with username (works)
// SELECT user.email,tblChars.id,tblChars.firstname,tblChars.lastname
// FROM tblChars 
// LEFT JOIN user
// ON tblChars.userID = user.pkuser;

//show all items regardless of character (works)
// SELECT tblChars.id,tblChars.firstname,tblinv.itemname,tblinv.itemtype,tblinv.amt
// FROM tblChars 
// RIGHT JOIN tblinv
// ON tblChars.id = tblinv.fkchar;


