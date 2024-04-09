<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_uploadConn = "localhost";
$database_uploadConn = "upload";
$username_uploadConn = "root";
$password_uploadConn = "";
$uploadConn = mysql_pconnect($hostname_uploadConn, $username_uploadConn, $password_uploadConn) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_query("set names utf8");
?>