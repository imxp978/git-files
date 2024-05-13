<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_cart_conn = "localhost";
$database_cart_conn = "cart";
$username_cart_conn = "root";
$password_cart_conn = "";
$cart_conn = mysql_pconnect($hostname_cart_conn, $username_cart_conn, $password_cart_conn) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_query("SET NAMES utf8");
?>