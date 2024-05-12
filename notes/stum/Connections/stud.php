<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_stud = "localhost";
$database_stud = "student";
$username_stud = "chun";
$password_stud = "0";
$stud = mysql_pconnect($hostname_stud, $username_stud, $password_stud) or trigger_error(mysql_error(),E_USER_ERROR);
MYSQL_query('SET names UTF8'); 
?>


