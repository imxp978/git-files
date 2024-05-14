<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_cart1 = "localhost";
$database_cart1 = "cart";
$username_cart1 = "root";
$password_cart1 = "";
$cart1 = mysql_pconnect($hostname_cart1, $username_cart1, $password_cart1) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_query("SET NAMES utf8");
?>