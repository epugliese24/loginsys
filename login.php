<?php
echo('<form method=POST action="checkuser.php">');
echo('<header>login</header><br>');
echo('<div id="inputBox">');
echo('<label for="email">email:<br>');
echo('<input type=text name="email" placeholder="enter email"> <br>');
echo('<label for="pass">password:<br>');
echo('<input type=password name="pass" placeholder="enter password"><br>');
echo('</div>');
echo('<input type=submit id="submitButton"> ');
echo('</form><br> <a href="http://localhost:8888/loginsys/signup.php">go to sign up</a>');